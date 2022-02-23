<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * Documents Controller
 *
 * @property \Acp\Model\Table\DocumentsTable $Documents
 *
 * @method \Acp\Model\Entity\Document[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $requestQuery = $this->request->getQuery();
        $limit = !empty($requestQuery['limit']) ? $requestQuery['limit'] : 10;
        
        $conditions = [];
        if (!empty($requestQuery['keyword'])) {
            $conditions['Documents_slug_translation.content like'] = '%' . $requestQuery['keyword'] . '%';


        }
        if (!empty($requestQuery['document_category_id'])) {
            $documentCategory = $this->Documents->DocumentCategories->get($requestQuery['document_category_id'], [
                'contain' => []
            ]);

            if (!empty($documentCategory)) {
                $conditions['DocumentCategories.lft >='] = $documentCategory->lft;
                $conditions['DocumentCategories.rght <='] = $documentCategory->rght;
            }
        }

        $this->paginate = [
            'contain' => ['DocumentCategories', 'Users'],
            'order' => ['Documents.id' => 'DESC'],
            'limit' => $limit,
            'conditions' => $conditions
        ];
        $documents = $this->paginate($this->Documents->find('translations'));

        $documentCategories = $this->Documents->DocumentCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );

        $this->set(compact('documents', 'requestQuery', 'documentCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $document = $this->Documents->get($id, [
    //         'contain' => ['DocumentCategories', 'Users']
    //     ]);

    //     $this->set('document', $document);
    // }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $document = $this->Documents->newEntity(['associated' => ['Roles']]);
        if ($this->request->is('post')) {
            $document = $this->Documents->patchEntity($document, $this->request->getData());
            $document->uuid = Text::uuid();
            $document->user_id = $this->getRequest()->getSession()->read('Auth.User.id');
            $document->slug = strtolower(Text::slug($document->title));
            if ($this->Documents->save($document)) {
                $this->Flash->success(__d('acp', 'The document has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The document could not be saved. Please, try again.'));
        }

        $roles = $this->Documents->Roles->find('list');

        $documentCategories = $this->Documents->DocumentCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $users = $this->Documents->Users->find('list', ['limit' => 200]);
        $this->set(compact('document', 'documentCategories', 'users', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->Documents->setlocale($getQueryLanguageId);
        }
        
        $document = $this->Documents->get($id, [
            'contain' => ['Roles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $document = $this->Documents->patchEntity($document, $this->request->getData(), ['associated' => ['Roles']]);
            $document->slug = strtolower(Text::slug($document->title));
            if ($this->Documents->save($document)) {
                $this->Flash->success(__d('acp', 'The document has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The document could not be saved. Please, try again.'));
        }

        $roles = $this->Documents->Roles->find('list');

        $documentCategories = $this->Documents->DocumentCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $users = $this->Documents->Users->find('list', ['limit' => 200]);
        $this->set(compact('document', 'documentCategories', 'users', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $document = $this->Documents->get($id);
        if ($this->Documents->delete($document)) {
            $this->Flash->success(__d('acp', 'The document has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The document could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
