<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * QuizQuestions Controller
 *
 * @property \Acp\Model\Table\QuizQuestionsTable $QuizQuestions
 *
 * @method \Acp\Model\Entity\QuizQuestion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuizQuestionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['quizAnswers']
        ];
        
        $conditions = $this->request->getQuery();

        $quizQuestions = $this->QuizQuestions
            ->find()
            ->where($conditions);

        $quizQuestions = $this->paginate($quizQuestions);
        
        $this->set(compact('quizQuestions'));
    }

    public function add()
    {
        $quizQuestion = $this->QuizQuestions->newEntity();
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quizQuestion = $this->QuizQuestions->patchEntity($quizQuestion, $this->request->getData());
            if ($this->QuizQuestions->save($quizQuestion)) {
                $this->Flash->set(__d('acp', 'The quizQuestion has been saved.'),['element' => 'fly_success']);

                return $this->redirect([
                    'action' => 'index',
                    '?' => ['quiz_id' => $quizQuestion->quiz_id]
                ]);
            }
            $this->Flash->set(__d('acp', 'The quizQuestion could not be saved. Please, try again.'),['element' => 'fly_error']);
        }

        $quizzes = $this->QuizQuestions->Quizzes->find('list', [
            'keyField' => 'id',
            'valueField' => 'content'
        ]);

        $this->set(compact('quizQuestion', 'quizzes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id QuizQuestion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->QuizQuestions->setlocale($getQueryLanguageId);
        }
        
        $quizQuestion = $this->QuizQuestions->get($id, [
            'contain' => ['Quizzes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quizQuestion = $this->QuizQuestions->patchEntity($quizQuestion, $this->request->getData());
            if ($this->QuizQuestions->save($quizQuestion)) {
                $this->Flash->set(__d('acp', 'The quizQuestion has been saved.'),['element' => 'fly_success']);

                return $this->redirect([
                	'action' => 'index', 
                    '?' => ['quiz_id' => $quizQuestion->quiz_id]
                ]);
            }
            $this->Flash->set(__d('acp', 'The quizQuestion could not be saved. Please, try again.'),['element' => 'fly_error']);
        }

        $quizzes = $this->QuizQuestions->Quizzes->find('list', [
            'keyField' => 'id',
            'valueField' => 'content'
        ]);

        $this->set(compact('quizQuestion', 'quizzes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id QuizQuestion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quizQuestion = $this->QuizQuestions->get($id);
        if ($this->QuizQuestions->delete($quizQuestion)) {
            $this->Flash->set(__d('acp', 'The quizQuestion has been deleted.'),['element' => 'fly_success']);
        } else {
            $this->Flash->set(__d('acp', 'The quizQuestion could not be deleted. Please, try again.'),['element' => 'fly_error']);
        }

        return $this->redirect(['action' => 'index']);
    }
}
