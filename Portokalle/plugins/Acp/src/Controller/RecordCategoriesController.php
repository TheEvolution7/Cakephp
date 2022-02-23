<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * RecordCategories Controller
 *
 * @property \Acp\Model\Table\RecordCategoriesTable $RecordCategories
 *
 * @method \Acp\Model\Entity\RecordCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RecordCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $requestQuery = $this->request->getQuery();

        $conditions = [];
        if (!empty($requestQuery['keyword'])) {
            $conditions['RecordCategories_title_translation.content like'] = '%' . $requestQuery['keyword'] . '%';
        }
        if (!empty($requestQuery['parent_record_category'])) {
            $conditions['RecordCategories.parent_id'] = $requestQuery['parent_record_category'];
        }

        $recordCategories_id = $this->RecordCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',]
        );

        $this->paginate = [
            'contain' => ['ParentRecordCategories'],
            'conditions' => $conditions
        ];
        $recordCategories = $this->paginate($this->RecordCategories->find('translations'));
        $this->set(compact('recordCategories','recordCategories_id'));
    }

    /**
     * View method
     *
     * @param string|null $id Record Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    
    public function view($id = null)
    {
        $recordCategory = $this->RecordCategories->get($id, [
            'contain' => ['ParentRecordCategories', 'ChildRecordCategories', 'Records']
        ]);

        $this->set('recordCategory', $recordCategory);
    }
     */

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recordCategory = $this->RecordCategories->newEntity();
        if ($this->request->is('post')) {
            $recordCategory = $this->RecordCategories->patchEntity($recordCategory, $this->request->getData());
            $recordCategory->uuid = Text::uuid();
            $recordCategory->user_id = $this->getRequest()->getSession()->read('Auth.User.id');
            $recordCategory->slug = strtolower(Text::slug($recordCategory->title));
            if ($this->RecordCategories->save($recordCategory)) {
                $uploadPath = 'uploads' . DS . 'record_categories'. DS . $recordCategory->uuid .DS;
                if(is_dir($uploadPath)){
                    rename($uploadPath, str_replace($recordCategory->uuid,$recordCategory->id,$uploadPath));
                }
                $this->Flash->success(__d('acp', 'The record category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The record category could not be saved. Please, try again.'));
        }
        
        $parentRecordCategories = $this->RecordCategories->ParentRecordCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );

        $this->set(compact('recordCategory', 'parentRecordCategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Record Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->RecordCategories->setlocale($getQueryLanguageId);
        }

        $recordCategory = $this->RecordCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recordCategory = $this->RecordCategories->patchEntity($recordCategory, $this->request->getData());
            $recordCategory->slug = strtolower(Text::slug($recordCategory->title));
            if ($this->RecordCategories->save($recordCategory)) {
                $this->Flash->success(__d('acp', 'The record category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The record category could not be saved. Please, try again.'));
        }
        
        $parentRecordCategories = $this->RecordCategories->ParentRecordCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );

        $this->set(compact('recordCategory', 'parentRecordCategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Record Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recordCategory = $this->RecordCategories->get($id);
        if ($this->RecordCategories->delete($recordCategory)) {
            $this->Flash->warning(__d('acp', 'The record category has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The record category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
