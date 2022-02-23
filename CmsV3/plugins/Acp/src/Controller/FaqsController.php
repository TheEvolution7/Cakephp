<?php
namespace Acp\Controller;

use Acp\Controller\AppController;
// Custom
use Cake\Utility\Text;
use Cake\ORM\TableRegistry;
/**
 * Faqs Controller
 *
 * @property \Acp\Model\Table\FaqsTable $Faqs
 *
 * @method \Acp\Model\Entity\Faq[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FaqsController extends AppController
{

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.

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
        $order = ['Faqs.id' => 'DESC'];

        if (!empty($requestQuery['keyword'])) {
            $conditions['Faqs_slug_translation.content like'] = '%' . $requestQuery['keyword'] . '%';


        }
        if (!empty($requestQuery['faq_category_id'])) {
            $faqCategory = $this->Faqs->FaqCategories->get($requestQuery['faq_category_id'], [
                'contain' => []
            ]);

            if (!empty($faqCategory)) {
                $conditions['FaqCategories.lft >='] = $faqCategory->lft;
                $conditions['FaqCategories.rght <='] = $faqCategory->rght;
            }

            $order = ['Faqs.sort' => 'DESC'];
        }

        $this->paginate = [
            'contain' => ['FaqCategories', 'Users'],
            'order' => $order,
            'limit' => $limit,
            'conditions' => $conditions
        ];
        $faqs = $this->paginate($this->Faqs->find('translations'));

        $faqCategories = $this->Faqs->FaqCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );

        $this->set(compact('faqs', 'requestQuery', 'faqCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Faq id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $faq = $this->Faqs->get($id, [
            'contain' => ['FaqCategories', 'Users']
        ]);

        $this->set('faq', $faq);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $faq = $this->Faqs->newEntity();
        if ($this->request->is('post')) {
            $faq = $this->Faqs->patchEntity($faq, $this->request->getData());
            $faq->uuid = Text::uuid();
            $faq->user_id = $this->getRequest()->getSession()->read('Auth.User.id');
            $faq->slug = strtolower(Text::slug($faq->title));
            $faq->slug_custom = strtolower(Text::slug($faq->slug_custom));

            if ($this->Faqs->save($faq)) {
                $uploadPath = 'uploads' . DS . 'faqs'. DS . $faq->uuid .DS;
                if(is_dir($uploadPath)){
                    rename($uploadPath, str_replace($faq->uuid,$faq->id,$uploadPath));
                }
                $this->Flash->success(__d('acp', 'The faq has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The faq could not be saved. Please, try again.'));
        }
        $faqCategories = $this->Faqs->FaqCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $this->set(compact('faq', 'faqCategories', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Faq id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->Faqs->setlocale($getQueryLanguageId);
        }
        
        $faq = $this->Faqs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $faq = $this->Faqs->patchEntity($faq, $this->request->getData());
            $faq->slug = strtolower(Text::slug($faq->title));
            $faq->slug_custom = strtolower(Text::slug($faq->slug_custom));
            if ($this->Faqs->save($faq)) {
                $this->Flash->success(__d('acp', 'The faq has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The faq could not be saved. Please, try again.'));
        }
        $faqCategories = $this->Faqs->FaqCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $this->set(compact('faq', 'faqCategories', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Faq id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $faq = $this->Faqs->get($id);
        if ($this->Faqs->delete($faq)) {
            $this->Flash->success(__d('acp', 'The faq has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The faq could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
