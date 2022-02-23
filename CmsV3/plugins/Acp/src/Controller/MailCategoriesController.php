<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * MailCategories Controller
 *
 * @property \Acp\Model\Table\MailCategoriesTable $MailCategories
 *
 * @method \Acp\Model\Entity\MailCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MailCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentMailCategories'],
            'limit' => 5,
            'order' => ['MailCategories.id' => 'DESC']
        ];
        
        $mailCategories_id = $this->MailCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',]
        );
        $this->paginate = [
            'contain' => ['ParentMailCategories'],
            'order' => ['MailCategories.lft' => 'ASC']
        ];
        $mailCategories = $this->paginate($this->MailCategories->find('all',['order' => ['MailCategories.lft' => 'ASC']]));
        $this->set(compact('mailCategories','mailCategories_id'));
    }

    /**
     * View method
     *
     * @param string|null $id Mail Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $mailCategory = $this->MailCategories->get($id, [
    //         'contain' => ['ParentMailCategories', 'ChildMailCategories', 'Mails']
    //     ]);

    //     $this->set('mailCategory', $mailCategory);
    // }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mailCategory = $this->MailCategories->newEntity();
        if ($this->request->is('post')) {
            $mailCategory = $this->MailCategories->patchEntity($mailCategory, $this->request->getData());
            $mailCategory->uuid = Text::uuid();
            $mailCategory->user_id = $this->getRequest()->getSession()->read('Auth.User.id');
            $mailCategory->slug = strtolower(Text::slug($mailCategory->title));
            if ($this->MailCategories->save($mailCategory)) {
                $this->Flash->success(__d('acp', 'The mail category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The mail category could not be saved. Please, try again.'));
        }
        $parentMailCategories = $this->MailCategories->ParentMailCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $this->set(compact('mailCategory', 'parentMailCategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mail Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->mailCategory->setlocale($getQueryLanguageId);
        }
        
        $mailCategory = $this->MailCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mailCategory = $this->MailCategories->patchEntity($mailCategory, $this->request->getData());
            $mailCategory->slug = strtolower(Text::slug($mailCategory->title));
            if ($this->MailCategories->save($mailCategory)) {
                $this->Flash->success(__d('acp', 'The mail category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The mail category could not be saved. Please, try again.'));
        }
        $parentMailCategories = $this->MailCategories->ParentMailCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $this->set(compact('mailCategory', 'parentMailCategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mail Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mailCategory = $this->MailCategories->get($id);
        if ($this->MailCategories->delete($mailCategory)) {
            $this->Flash->success(__d('acp', 'The mail category has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The mail category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function sort($id = null)
    {
        $mailCategory = $this->MailCategories->find('threaded')->toArray();
        $this->set(compact('mailCategory'));
    }
}
