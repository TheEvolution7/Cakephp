<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * Takes Controller
 *
 * @property \Acp\Model\Table\TakesTable $Takes
 *
 * @method \Acp\Model\Entity\Take[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TakesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Quizzes', 'Users']
        ];
        
        $conditions = $this->request->getQuery();

        $takes = $this->Takes
            ->find()
            ->where($conditions);

        $takes = $this->paginate($takes);

        $this->set(compact('takes'));
    }

    public function view($id = null)
    {
        
        $take = $this->Takes->get($id, [
            'contain' => ['Users', 'Quizzes' => ['QuizQuestions' => ['QuizAnswers']], 'TakeAnswers']
        ]);

        // pr($take);exit;
        $this->set(compact('take'));
    }

    public function add()
    {
        $quiz = $this->Takes->newEntity();
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quiz = $this->Takes->patchEntity($quiz, $this->request->getData());
            if ($this->Takes->save($quiz)) {
                $this->Flash->set(__d('acp', 'The quiz has been saved.'),['element' => 'fly_success']);

                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            $this->Flash->set(__d('acp', 'The quiz could not be saved. Please, try again.'),['element' => 'fly_error']);
        }

        $quizzes = $this->Takes->Courses->find('list', [
            'keyField' => 'id',
            'valueField' => 'title'
        ]);

        $this->set(compact('quiz', 'quizzes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Take id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->Takes->setlocale($getQueryLanguageId);
        }
        
        $take = $this->Takes->get($id, [
            'contain' => ['Users', 'Quizzes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $take = $this->Takes->patchEntity($take, $this->request->getData());
            if ($this->Takes->save($take)) {
                $this->Flash->set(__d('acp', 'The take has been saved.'),['element' => 'fly_success']);

                return $this->redirect([
                	'action' => 'index'
                ]);
            }
            $this->Flash->set(__d('acp', 'The take could not be saved. Please, try again.'),['element' => 'fly_error']);
        }

        $quizzes = $this->Takes->Quizzes->find('list', [
            'keyField' => 'id',
            'valueField' => 'id'
        ])->toArray();

        $users = $this->Takes->Users->find('list', [
            'keyField' => 'id',
            'valueField' => 'full_name'
        ])->toArray();
        $this->set(compact('take', 'quizzes', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Take id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $take = $this->Takes->get($id);
        if ($this->Takes->delete($take)) {
            $this->Flash->set(__d('acp', 'The take has been deleted.'),['element' => 'fly_success']);
        } else {
            $this->Flash->set(__d('acp', 'The take could not be deleted. Please, try again.'),['element' => 'fly_error']);
        }

        return $this->redirect(['action' => 'index']);
    }
}
