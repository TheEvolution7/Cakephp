<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * Courses Controller
 *
 * @property \Acp\Model\Table\CoursesTable $Courses
 *
 * @method \Acp\Model\Entity\Course[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CoursesController extends AppController
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

        $courses = $this->Courses
            ->find()
            ->where($conditions);

        $courses = $this->paginate($courses);

        $this->set(compact('courses'));
    }

    public function add()
    {
        $course = $this->Courses->newEntity();
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $course = $this->Courses->patchEntity($course, $this->request->getData());
            if ($this->Courses->save($course)) {
                $this->Flash->set(__d('acp', 'The course has been saved.'),['element' => 'fly_success']);

                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            $this->Flash->set(__d('acp', 'The course could not be saved. Please, try again.'),['element' => 'fly_error']);
        }

        $products = $this->Courses->Products->find('list', [
            'keyField' => 'id',
            'valueField' => 'title'
        ]);

        $this->set(compact('course', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Course id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->Courses->setlocale($getQueryLanguageId);
        }
        
        $course = $this->Courses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $course = $this->Courses->patchEntity($course, $this->request->getData());
            
            if ($this->Courses->save($course)) {
                $this->Flash->set(__d('acp', 'The course has been saved.'),['element' => 'fly_success']);

                return $this->redirect([
                	'action' => 'index'
                ]);
            }
            $this->Flash->set(__d('acp', 'The course could not be saved. Please, try again.'),['element' => 'fly_error']);
        }

        $products = $this->Courses->Products->find('list', [
            'keyField' => 'id',
            'valueField' => 'title'
        ]);

        $this->set(compact('course', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Course id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $course = $this->Courses->get($id);
        if ($this->Courses->delete($course)) {
            $this->Flash->set(__d('acp', 'The course has been deleted.'),['element' => 'fly_success']);
        } else {
            $this->Flash->set(__d('acp', 'The course could not be deleted. Please, try again.'),['element' => 'fly_error']);
        }

        return $this->redirect(['action' => 'index']);
    }
}
