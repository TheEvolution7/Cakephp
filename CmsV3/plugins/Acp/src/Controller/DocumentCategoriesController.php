<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * DocumentCategories Controller
 *
 * @property \Acp\Model\Table\DocumentCategoriesTable $DocumentCategories
 *
 * @method \Acp\Model\Entity\DocumentCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentCategoriesController extends AppController
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
            $conditions['DocumentCategories_title_translation.content like'] = '%' . $requestQuery['keyword'] . '%';
        }
        if (!empty($requestQuery['parent_document_category'])) {
            $conditions['DocumentCategories.parent_id'] = $requestQuery['parent_document_category'];
        }

        $this->paginate = [
            'contain' => ['ParentDocumentCategories'],
            'limit' => 5,
            'order' => ['DocumentCategories.id' => 'DESC'],
            'conditions' => $conditions
        ];
        $documentCategories = $this->paginate($this->DocumentCategories->find('translations'));
        $this->set(compact('documentCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Document Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    
    public function view($id = null)
    {
        $documentCategory = $this->DocumentCategories->get($id, [
            'contain' => ['ParentDocumentCategories', 'ChildDocumentCategories', 'Documents']
        ]);

        $this->set('documentCategory', $documentCategory);
    }
     */

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $documentCategory = $this->DocumentCategories->newEntity();
        if ($this->request->is('post')) {
            $documentCategory = $this->DocumentCategories->patchEntity($documentCategory, $this->request->getData());
            $documentCategory->uuid = Text::uuid();
            $documentCategory->user_id = $this->getRequest()->getSession()->read('Auth.User.id');
            $documentCategory->slug = strtolower(Text::slug($documentCategory->title));
            if ($this->DocumentCategories->save($documentCategory)) {
                $this->Flash->success(__d('acp', 'The document category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The document category could not be saved. Please, try again.'));
        }
        
        $parentDocumentCategories = $this->DocumentCategories->ParentDocumentCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );

        $this->set(compact('documentCategory', 'parentDocumentCategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Document Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->DocumentCategories->setlocale($getQueryLanguageId);
        }

        $documentCategory = $this->DocumentCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $documentCategory = $this->DocumentCategories->patchEntity($documentCategory, $this->request->getData());
            $documentCategory->slug = strtolower(Text::slug($documentCategory->title));
            if ($this->DocumentCategories->save($documentCategory)) {
                $this->Flash->success(__d('acp', 'The document category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The document category could not be saved. Please, try again.'));
        }
        
        $parentDocumentCategories = $this->DocumentCategories->ParentDocumentCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );

        $this->set(compact('documentCategory', 'parentDocumentCategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Document Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $documentCategory = $this->DocumentCategories->get($id);
        if ($this->DocumentCategories->delete($documentCategory)) {
            $this->Flash->warning(__d('acp', 'The document category has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The document category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
