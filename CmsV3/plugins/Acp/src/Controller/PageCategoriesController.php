<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * PageCategories Controller
 *
 * @property \Acp\Model\Table\PageCategoriesTable $pageCategories
 *
 * @method \Acp\Model\Entity\pageCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PageCategoriesController extends AppController
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
            $conditions['PageCategories_title_translation.content like'] = '%' . $requestQuery['keyword'] . '%';
        }
        if (!empty($requestQuery['parent_page_category'])) {
            $conditions['PageCategories.parent_id'] = $requestQuery['parent_page_category'];
        }

        $pageCategories_id = $this->PageCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',]
        );

        $this->paginate = [
            'contain' => ['ParentPageCategories'],
            'conditions' => $conditions
        ];
        $pageCategories = $this->paginate($this->PageCategories->find('translations'));
        $this->set(compact('pageCategories','pageCategories_id'));
    }

    /**
     * View method
     *
     * @param string|null $id page Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    
    public function view($id = null)
    {
        $pageCategory = $this->PageCategories->get($id, [
            'contain' => ['ParentPageCategories', 'ChildPageCategories', 'pages']
        ]);

        $this->set('pageCategory', $pageCategory);
    }
     */

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pageCategory = $this->PageCategories->newEntity();
        if ($this->request->is('post')) {
            $pageCategory = $this->PageCategories->patchEntity($pageCategory, $this->request->getData());
            $pageCategory->uuid = Text::uuid();
            $pageCategory->user_id = $this->getRequest()->getSession()->read('Auth.User.id');
            $pageCategory->slug = strtolower(Text::slug($pageCategory->title));
            if ($this->PageCategories->save($pageCategory)) {
                $uploadPath = 'uploads' . DS . 'page_categories'. DS . $pageCategory->uuid .DS;
                if(is_dir($uploadPath)){
                    rename($uploadPath, str_replace($pageCategory->uuid,$pageCategory->id,$uploadPath));
                }
                $this->Flash->success(__d('acp', 'The page category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The page category could not be saved. Please, try again.'));
        }
        
        $parentPageCategories = $this->PageCategories->ParentPageCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );

        $this->set(compact('pageCategory', 'parentPageCategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id page Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->PageCategories->setlocale($getQueryLanguageId);
        }

        $pageCategory = $this->PageCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pageCategory = $this->PageCategories->patchEntity($pageCategory, $this->request->getData());
            $pageCategory->slug = strtolower(Text::slug($pageCategory->title));
            if ($this->PageCategories->save($pageCategory)) {
                $this->Flash->success(__d('acp', 'The page category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The page category could not be saved. Please, try again.'));
        }
        
        $parentPageCategories = $this->PageCategories->ParentPageCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );

        $this->set(compact('pageCategory', 'parentPageCategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id page Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pageCategory = $this->PageCategories->get($id);
        if ($this->PageCategories->delete($pageCategory)) {
            $this->Flash->warning(__d('acp', 'The page category has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The page category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
