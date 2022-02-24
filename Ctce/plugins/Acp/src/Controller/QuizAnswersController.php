<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * QuizAnswers Controller
 *
 * @property \Acp\Model\Table\QuizAnswersTable $QuizAnswers
 *
 * @method \Acp\Model\Entity\QuizAnswer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuizAnswersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => []
        ];
        
        $conditions = $this->request->getQuery();

        $quizAnswers = $this->QuizAnswers
            ->find()
            ->where($conditions);

        $quizAnswers = $this->paginate($quizAnswers);

        $this->set(compact('quizAnswers'));
    }

    public function add()
    {
        $quizAnswer = $this->QuizAnswers->newEntity();
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quizAnswer = $this->QuizAnswers->patchEntity($quizAnswer, $this->request->getData());
            if ($this->QuizAnswers->save($quizAnswer)) {
                $this->Flash->set(__d('acp', 'The quizAnswer has been saved.'),['element' => 'fly_success']);

                return $this->redirect([
                    'action' => 'index',
                    '?' => ['quiz_question_id' => $quizAnswer->quiz_question_id]
                ]);
            }
            $this->Flash->set(__d('acp', 'The quizAnswer could not be saved. Please, try again.'),['element' => 'fly_error']);
        }

        $quizzes = $this->QuizAnswers->Quizzes->find('list', [
            'keyField' => 'id',
            'valueField' => 'content'
        ]);

        $quizQuestions = $this->QuizAnswers->quizQuestions->find('list', [
            'keyField' => 'id',
            'valueField' => 'content'
        ]);

        $this->set(compact('quizAnswer', 'quizzes', 'quizQuestions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id QuizAnswer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->QuizAnswers->setlocale($getQueryLanguageId);
        }
        
        $quizAnswer = $this->QuizAnswers->get($id, [
            'contain' => ['Quizzes', 'QuizQuestions']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quizAnswer = $this->QuizAnswers->patchEntity($quizAnswer, $this->request->getData());
            if ($this->QuizAnswers->save($quizAnswer)) {
                $this->Flash->set(__d('acp', 'The quizAnswer has been saved.'),['element' => 'fly_success']);

                return $this->redirect([
                	'action' => 'index',
                    '?' => ['quiz_question_id' => $quizAnswer->quiz_question_id]
                ]);
            }
            $this->Flash->set(__d('acp', 'The quizAnswer could not be saved. Please, try again.'),['element' => 'fly_error']);
        }

        $quizzes = $this->QuizAnswers->Quizzes->find('list', [
            'keyField' => 'id',
            'valueField' => 'content'
        ]);

        $quizQuestions = $this->QuizAnswers->quizQuestions->find('list', [
            'keyField' => 'id',
            'valueField' => 'content'
        ]);

        $this->set(compact('quizAnswer', 'quizzes', 'quizQuestions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id QuizAnswer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quizAnswer = $this->QuizAnswers->get($id);
        if ($this->QuizAnswers->delete($quizAnswer)) {
            $this->Flash->set(__d('acp', 'The quizAnswer has been deleted.'),['element' => 'fly_success']);
        } else {
            $this->Flash->set(__d('acp', 'The quizAnswer could not be deleted. Please, try again.'),['element' => 'fly_error']);
        }

        return $this->redirect(['action' => 'index']);
    }
}
