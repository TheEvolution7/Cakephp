<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * Lessons Controller
 *
 * @property \Acp\Model\Table\LessonsTable $Lessons
 *
 * @method \Acp\Model\Entity\Lesson[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LessonsController extends AppController
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

        $lessons = $this->Lessons
            ->find()
            ->where($conditions);

        $lessons = $this->paginate($lessons);

        $this->set(compact('lessons'));
    }

    public function add()
    {
        $lesson = $this->Lessons->newEntity();
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lesson = $this->Lessons->patchEntity($lesson, $this->request->getData());
            if ($this->Lessons->save($lesson)) {
                $this->Flash->set(__d('acp', 'The lesson has been saved.'),['element' => 'fly_success']);

                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            $this->Flash->set(__d('acp', 'The lesson could not be saved. Please, try again.'),['element' => 'fly_error']);
        }

        $courses = $this->Lessons->Courses->find('list', [
            'keyField' => 'id',
            'valueField' => 'title'
        ]);

        $this->set(compact('lesson', 'courses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lesson id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->Lessons->setlocale($getQueryLanguageId);
        }
        
        $lesson = $this->Lessons->get($id, [
            'contain' => ['Courses']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lesson = $this->Lessons->patchEntity($lesson, $this->request->getData());
            if ($this->Lessons->save($lesson)) {
                $this->Flash->set(__d('acp', 'The lesson has been saved.'),['element' => 'fly_success']);

                return $this->redirect([
                	'action' => 'index'
                ]);
            }
            $this->Flash->set(__d('acp', 'The lesson could not be saved. Please, try again.'),['element' => 'fly_error']);
        }

        $courses = $this->Lessons->Courses->find('list', [
            'keyField' => 'id',
            'valueField' => 'title'
        ]);

        $this->set(compact('lesson', 'courses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lesson id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lesson = $this->Lessons->get($id);
        if ($this->Lessons->delete($lesson)) {
            $this->Flash->set(__d('acp', 'The lesson has been deleted.'),['element' => 'fly_success']);
        } else {
            $this->Flash->set(__d('acp', 'The lesson could not be deleted. Please, try again.'),['element' => 'fly_error']);
        }

        return $this->redirect(['action' => 'index']);
    }
}
