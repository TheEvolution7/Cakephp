<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Mailer\MailerAwareTrait;
use Cake\I18n\Time;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    use MailerAwareTrait;

    public function training()
    {
        $this->loadModel('Products');
        $products = $this->Products
            ->find()
            ->innerJoinWith(
                'OrderDetails.Orders.Users', function ($q) {
                    return $q->where(['Users.id' => $this->Auth->user('id')]);
                }
            )
            ->toArray();
            
        $this->set(compact('products'));
    }
    
    public function trainingView($id = null)
    {
        $this->loadModel('Products');
        $product = $this->Products->get($id, [
            'contain' => [
                'Courses' => [
                    'Lessons' => ['Users'],
                    'Users',
                    'sort' => ['Courses.sort' => 'ASC'],
                    'Quizzes' => ['quizQuestions'],
                ]
            ]
        ]);

        $this->loadModel('Takes');
        $countTrueAnswers = $this->Takes->TakeAnswers
            ->find()
            ->innerJoinWith('Takes', function ($q) {
                return $q->where(['Takes.user_id' => $this->Auth->user('id')]);
            })
            ->innerJoinWith('QuizAnswers', function ($q) {
                return $q->where(['QuizAnswers.correct' => true]);
            })
            ->toArray();

        $title = $product->title;
        $description = $product->description;
        $image =  'uploads' . DS . 'products' . DS . $product->id . DS .$product->image;
        $this->set(compact('title','description','image','product', 'countTrueAnswers'));
    }

    public function courseView($id = null)
    {
        $this->loadModel('Courses');
        $this->loadModel('Takes');

        $course = $this->Courses->get($id, [
            'contain' => [
                'Users',
                'Lessons' => ['Users'],
                'Quizzes' => [
                    'QuizQuestions' => [
                        'QuizAnswers'
                    ],
                    'Takes' => [
                        'TakeAnswers'
                    ]
                ]
            ]
        ]);

        if ($course->type == 'quiz' && empty($course->quiz->take)) {
            $take = $this->Takes->newEntity(null, ['associated' => ['TakeAnswers']]);
            $data = [
                'quiz_id' => $course->quiz->id,
                'user_id' => $this->Auth->user('id')
            ];

            $take = $this->Takes->patchEntity($take, $data);
            if ($this->Takes->save($take)) {
                $this->Flash->success(__('Successfully !'));
            }
        }

        $countTrueAnswers = $this->Takes->TakeAnswers
            ->find()
            ->innerJoinWith('Takes', function ($q) {
                return $q->where(['Takes.user_id' => $this->Auth->user('id')]);
            })
            ->innerJoinWith('QuizAnswers', function ($q) {
                return $q->where(['QuizAnswers.correct' => true]);
            })
            ->toArray();

        $this->loadModel('Products');
        $product = $this->Products
            ->find()
            ->where(['Products.id' => $course->product_id])
            ->first();

        if ($this->request->getQuery('pageid')) {
            $this->loadModel('Lessons');
            $lesson = $this->Lessons
                ->find()
                ->where(['Lessons.id' => $this->request->getQuery('pageid')?$this->request->getQuery('pageid'): $course->lessons[0]->id])
                ->contain(['Users'])
                ->first();
        }else{
            if ($course->type == 'lesson') {
                return $this->redirect([$course->id, '?' => ['pageid' => $course->lessons[0]->id]]);
            }
        }
        
        if ($this->request->is('post')) {
            if ($this->request->getData('next')) {
                $data = [
                    'users' => ['_ids' => [$this->Auth->user('id')]]
                ];
                if ($this->request->getData('page')) {
                    $this->loadModel('Lessons');
                    $lesson = $this->Lessons->get($this->request->getQuery('pageid'));
                    $lesson = $this->Lessons->patchEntity($lesson, $data);

                    $nextLesson = $this->Lessons
                        ->find()
                        ->where(['course_id' => $id, 'Lessons.id >' => $lesson->id])
                        ->first();

                    if ($this->Lessons->save($lesson)) {
                        $this->Flash->success(__('Successfully !'));
                        if (empty($nextLesson)) {
                            return $this->redirect(['action' => 'lessonCompleted', $course->id]);
                        }else{
                            return $this->redirect(['action' => 'courseView', $course->id, '?' => ['pageid' => $nextLesson]]);
                        }   
                    }
                }else{
                    $course = $this->Courses->patchEntity($course, $data);
                    if ($this->Courses->save($course)) {
                        $this->Flash->success(__('Successfully !'));
                        return $this->redirect(['action' => 'trainingView', $product->id]);   
                    }
                }
                
            }else{
                $take = $this->Takes
                    ->find()
                    ->where(['quiz_id' => $course->quiz->id, 'user_id' => $this->Auth->user('id')])
                    ->first();
                $data['status'] = 'Finished';
                foreach ($this->request->getData() as $key => $value) {
                    $data['take_answers'][$key]['question_id'] = $key;
                    $data['take_answers'][$key]['answer_id'] = $value;
                }

                $take = $this->Takes->patchEntity($take, $data, ['associated' => ['TakeAnswers']]);

                if ($this->Takes->save($take)) {
                    $this->Flash->success(__('Successfully !'));
                    return $this->redirect($this->referer());
                }
            }
            
        }
        
        $this->set(compact('course', 'lesson', 'countTrueAnswers'));
    }

    public function lessonCompleted($id = null)
    {
        $this->loadModel('Courses');

        $course = $this->Courses->get($id, [
            'contain' => [
                'Users',
                'Lessons' => ['Users'],
                'Quizzes' => [
                    'QuizQuestions' => [
                        'QuizAnswers'
                    ],
                    'Takes' => [
                        'TakeAnswers'
                    ]
                ]
            ]
        ]);

        $this->loadModel('Products');
        $product = $this->Products
            ->find()
            ->where(['Products.id' => $course->product_id])
            ->first();

        $nextCourse = $this->Courses
            ->find()
            ->where(['product_id' => $product->id, 'Courses.id >' => $id])
            ->first();

        $this->set(compact('course', 'nextCourse'));
    }

    public function register()
    {
        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData(), ['validate' => 'create']);
            if ($this->Users->save($user)) {
                $user = $this->Auth->identify();

                // if ($user) {
                //     $this->Auth->setUser($user);
                // }

                $this->Flash->success(__('Your account has been created successfully !'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Please, correct your mistake.'));
        }else{
            $user->first_name = '';
        }
        
        $this->set(compact('user'));
    }

    /**
     * Login method
     *
     * @param array|null User
     * @return Returns array|boolean User record data, or false, if the user could not be identified.
     */
    public function login() {
        if ($this->Auth->user('id')) {
            $this->Flash->set(__('You are already logged in.'), ['element' => 'fly_info']);
            $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->Flash->set(__('Login success'), ['element' => 'fly_success']);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->set(__('Your username or password was incorrect.'), ['element' => 'fly_error']);
        }else{
            $user = $this->Users->newEntity($this->request->getData());
        }

        $this->set(compact('user'));
    }

    public function profile()
    {
        $user = $this->Users->get($this->Auth->user('id'));
        $this->set(compact('user'));
        
    }

    public function account()
    {
        $user = $this->Users->get($this->Auth->user('id'), ['contain' => ['Orders' => ['OrderDetails' => ['Products']]]]);
        if ($this->request->is('put')) {
            if ($this->request->getData('type') == 'setting') {
                $validate = 'resetPassword';
            }else{
                $validate = 'account';
            }
            $this->Users->patchEntity($user, $this->request->getParsedBody(), ['validate' => $validate]);

            if ($this->Users->save($user)) {
                //$this->request->session()->write('Auth.User.image', $user->image);
                $this->Flash->success(__("Your information has been updated !"));
            }
        }

        $this->set(compact('user'));
    }

    public function forgotPassword()
    {
        if ($this->Auth->user()) {
            return $this->redirect(['controller' => 'pages', 'action' => 'home']);
        }

        if ($this->request->is('post')) {
            $user = $this->Users
                ->find()
                ->where([
                    'Users.email' => $this->request->getData('email')
                ])
                ->first();

            if (is_null($user)) {
                $this->Flash->error(__("This E-mail doesn't exist or the account has been deleted."));

                $this->set(compact('user'));

                return;
            }

            //Generate the unique code
            $code = md5(rand() . uniqid() . time());

            //Update the user's information
            $user->password_code = $code;
            $user->password_code_expire = new Time();


            $this->Users->save($user);

            $viewVars = [
                'userId' => $user->id,
                'name' => $user->full_name,
                'username' => $user->username,
                'code' => $code
            ];

            $this->getMailer('User')->send('forgotPassword', [$user, $viewVars]);

            $this->Flash->success(__("An E-mail has been send to <strong>{0}</strong>. Please follow the instructions in the E-mail.", h($user->email)));
        }

        $this->set(compact('user'));
    }

    public function resetPassword()
    {
        if ($this->Auth->user()) {
            return $this->redirect(['controller' => 'pages', 'action' => 'home']);
        }

        //Prevent for empty code.
        if (empty(trim($this->request->code))) {
            $this->Flash->error(__("This code is not associated with this users or is incorrect."));

            return $this->redirect(['controller' => 'pages', 'action' => 'home']);
        }

        $user = $this->Users
            ->find()
            ->where([
                'Users.password_code' => $this->request->code,
                'Users.id' => $this->request->id
            ])
            ->first();

        if (is_null($user)) {
            $this->Flash->error(__("This code is not associated with this users or is incorrect."));

            return $this->redirect(['controller' => 'pages', 'action' => 'home']);
        }

        $expire = $user->password_code_expire->timestamp + 600;

        if ($expire < time()) {
            $this->Flash->error(__("This code is expired, please ask another E-mail code."));

            return $this->redirect(['action' => 'forgotPassword']);
        }

        if ($this->request->is(['post', 'put'])) {
            $this->Users->patchEntity($user, $this->request->getParsedBody(), ['validate' => 'resetpassword']);

            if ($this->Users->save($user)) {
                $this->Flash->success(__("Your password has been changed !"));

                //Reset the code and the time.
                $user->password_code = '';
                $user->password_code_expire = new Time();
                $user->password_reset_count = $user->password_reset_count + 1;
                $this->Users->save($user);

                return $this->redirect(['controller' => 'users', 'action' => 'login']);
            }
        }

        $this->set(compact('user'));
    }
    /**
     * Logout method
     *
     * @return Returns the logout action to redirect to login.
     */
    public function logout() {
        $this->Flash->success(__('Good-Bye, See you later.'));
        $this->redirect($this->Auth->logout());
    }
}
