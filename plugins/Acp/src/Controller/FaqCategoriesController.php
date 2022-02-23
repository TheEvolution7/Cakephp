<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * FaqCategories Controller
 *
 * @property \Acp\Model\Table\FaqCategoriesTable $faqCategories
 *
 * @method \Acp\Model\Entity\faqCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FaqCategoriesController extends AppController
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
            $conditions['FaqCategories_title_translation.content like'] = '%' . $requestQuery['keyword'] . '%';
        }
        if (!empty($requestQuery['parent_faq_category'])) {
            $conditions['FaqCategories.parent_id'] = $requestQuery['parent_faq_category'];
        }

        $faqCategories_id = $this->FaqCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',]
        );

        $this->paginate = [
            'contain' => ['ParentFaqCategories'],
            'conditions' => $conditions
        ];
        $faqCategories = $this->paginate($this->FaqCategories->find('translations'));
        $this->set(compact('faqCategories','faqCategories_id'));
    }

    /**
     * View method
     *
     * @param string|null $id faq Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    
    public function view($id = null)
    {
        $faqCategory = $this->FaqCategories->get($id, [
            'contain' => ['ParentFaqCategories', 'ChildFaqCategories', 'faqs']
        ]);

        $this->set('faqCategory', $faqCategory);
    }
     */

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $faqCategory = $this->FaqCategories->newEntity();
        if ($this->request->is('post')) {
            $faqCategory = $this->FaqCategories->patchEntity($faqCategory, $this->request->getData());
            $faqCategory->uuid = Text::uuid();
            $faqCategory->user_id = $this->getRequest()->getSession()->read('Auth.User.id');
            $faqCategory->slug = strtolower(Text::slug($faqCategory->title));
            if ($this->FaqCategories->save($faqCategory)) {
                $uploadPath = 'uploads' . DS . 'faq_categories'. DS . $faqCategory->uuid .DS;
                if(is_dir($uploadPath)){
                    rename($uploadPath, str_replace($faqCategory->uuid,$faqCategory->id,$uploadPath));
                }
                $this->Flash->success(__d('acp', 'The faq category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The faq category could not be saved. Please, try again.'));
        }
        
        $parentFaqCategories = $this->FaqCategories->ParentFaqCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );

        $this->set(compact('faqCategory', 'parentFaqCategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id faq Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->FaqCategories->setlocale($getQueryLanguageId);
        }

        $faqCategory = $this->FaqCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $faqCategory = $this->FaqCategories->patchEntity($faqCategory, $this->request->getData());
            $faqCategory->slug = strtolower(Text::slug($faqCategory->title));
            if ($this->FaqCategories->save($faqCategory)) {
                $this->Flash->success(__d('acp', 'The faq category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The faq category could not be saved. Please, try again.'));
        }
        
        $parentFaqCategories = $this->FaqCategories->ParentFaqCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );

        $this->set(compact('faqCategory', 'parentFaqCategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id faq Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $faqCategory = $this->FaqCategories->get($id);
        if ($this->FaqCategories->delete($faqCategory)) {
            $this->Flash->warning(__d('acp', 'The faq category has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The faq category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
