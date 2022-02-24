<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * TakeAnswers Controller
 *
 * @property \Acp\Model\Table\TakeAnswersTable $TakeAnswers
 *
 * @method \Acp\Model\Entity\TakeAnswer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TakeAnswersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['QuizQuestions', 'QuizAnswers', 'Takes' => ['Users']]
        ];

        $conditions = $this->request->getQuery();

        $takeAnswers = $this->TakeAnswers
            ->find()
            ->where($conditions);

        $takeAnswers = $this->paginate($takeAnswers);

        $this->set(compact('takeAnswers'));
    }

    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->TakeAnswers->setlocale($getQueryLanguageId);
        }
        
        $takeAnswer = $this->TakeAnswers->get($id, [
            'contain' => ['Takes', 'QuizQuestions', 'QuizQuestions']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $takeAnswer = $this->TakeAnswers->patchEntity($takeAnswer, $this->request->getData());
            if ($this->TakeAnswers->save($takeAnswer)) {
                $this->Flash->set(__d('acp', 'The takeAnswer has been saved.'),['element' => 'fly_success']);

                return $this->redirect([
                	'action' => 'index'
                ]);
            }
            $this->Flash->set(__d('acp', 'The takeAnswer could not be saved. Please, try again.'),['element' => 'fly_error']);
        }

        $quizQuestions = $this->TakeAnswers->QuizQuestions->find('list', [
            'keyField' => 'id',
            'valueField' => 'content'
        ])->toArray();

        $takes = $this->TakeAnswers->Takes->find('list', [
            'keyField' => 'id',
            'valueField' => 'content'
        ])->toArray();

        $quizAnswers = $this->TakeAnswers->QuizAnswers->find('list', [
            'keyField' => 'id',
            'valueField' => 'content'
        ])->toArray();

        $this->set(compact('takeAnswer', 'quizQuestions', 'takes', 'quizAnswers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id TakeAnswer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $take = $this->TakeAnswers->get($id);
        if ($this->TakeAnswers->delete($take)) {
            $this->Flash->set(__d('acp', 'The take has been deleted.'),['element' => 'fly_success']);
        } else {
            $this->Flash->set(__d('acp', 'The take could not be deleted. Please, try again.'),['element' => 'fly_error']);
        }

        return $this->redirect(['action' => 'index']);
    }
}
