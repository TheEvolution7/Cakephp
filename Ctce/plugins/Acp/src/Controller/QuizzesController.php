<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * Quizzes Controller
 *
 * @property \Acp\Model\Table\QuizzesTable $Quizzes
 *
 * @method \Acp\Model\Entity\Quizze[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuizzesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Courses', 'QuizQuestions']
        ];
        
        $conditions = $this->request->getQuery();

        $quizzes = $this->Quizzes
            ->find()
            ->where($conditions);

        $quizzes = $this->paginate($quizzes);

        $this->set(compact('quizzes'));
    }

    public function add()
    {
        $quiz = $this->Quizzes->newEntity();
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quiz = $this->Quizzes->patchEntity($quiz, $this->request->getData());
            if ($this->Quizzes->save($quiz)) {
                $this->Flash->set(__d('acp', 'The quiz has been saved.'),['element' => 'fly_success']);

                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            $this->Flash->set(__d('acp', 'The quiz could not be saved. Please, try again.'),['element' => 'fly_error']);
        }

        $courses = $this->Quizzes->Courses->find('list', [
            'keyField' => 'id',
            'valueField' => 'title'
        ]);

        $this->set(compact('quiz', 'courses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Quizze id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->Quizzes->setlocale($getQueryLanguageId);
        }
        
        $quiz = $this->Quizzes->get($id, [
            'contain' => ['Courses']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quiz = $this->Quizzes->patchEntity($quiz, $this->request->getData());
            if ($this->Quizzes->save($quiz)) {
                $this->Flash->set(__d('acp', 'The quiz has been saved.'),['element' => 'fly_success']);

                return $this->redirect([
                	'action' => 'index'
                ]);
            }
            $this->Flash->set(__d('acp', 'The quiz could not be saved. Please, try again.'),['element' => 'fly_error']);
        }

        $courses = $this->Quizzes->Courses->find('list', [
            'keyField' => 'id',
            'valueField' => 'title'
        ]);

        $this->set(compact('quiz', 'courses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Quizze id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quizze = $this->Quizzes->get($id);
        if ($this->Quizzes->delete($quizze)) {
            $this->Flash->set(__d('acp', 'The quizze has been deleted.'),['element' => 'fly_success']);
        } else {
            $this->Flash->set(__d('acp', 'The quizze could not be deleted. Please, try again.'),['element' => 'fly_error']);
        }

        return $this->redirect(['action' => 'index']);
    }
}
