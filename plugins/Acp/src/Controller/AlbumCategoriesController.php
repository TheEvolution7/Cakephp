<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * AlbumCategories Controller
 *
 * @property \Acp\Model\Table\AlbumCategoriesTable $AlbumCategories
 *
 * @method \Acp\Model\Entity\AlbumCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AlbumCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $albumCategories_id = $this->AlbumCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',]
        );

        $this->paginate = [
            'contain' => ['ParentAlbumCategories'],
            'order' => ['AlbumCategories.id' => 'DESC']
        ];
        $albumCategories = $this->paginate($this->AlbumCategories->find('translations'));

        $this->set(compact('albumCategories','albumCategories_id'));
    }

    /**
     * View method
     *
     * @param string|null $id Album Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $albumCategory = $this->AlbumCategories->get($id, [
    //         'contain' => ['ParentAlbumCategories', 'ChildAlbumCategories', 'Albums']
    //     ]);

    //     $this->set('albumCategory', $albumCategory);
    // }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $albumCategory = $this->AlbumCategories->newEntity();
        if ($this->request->is('post')) {
            $albumCategory = $this->AlbumCategories->patchEntity($albumCategory, $this->request->getData());
            $albumCategory->uuid = Text::uuid();
            $albumCategory->user_id = $this->getRequest()->getSession()->read('Auth.User.id');
            $albumCategory->slug = strtolower(Text::slug($albumCategory->title));
            if ($this->AlbumCategories->save($albumCategory)) {
                $uploadPath = 'uploads' . DS . 'album_categories'. DS . $albumCategory->uuid .DS;
                if(is_dir($uploadPath)){
                    rename($uploadPath, str_replace($albumCategory->uuid,$albumCategory->id,$uploadPath));
                }
                $this->Flash->success(__d('acp', 'The album category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The album category could not be saved. Please, try again.'));
        }
        $parentAlbumCategories = $this->AlbumCategories->ParentAlbumCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $this->set(compact('albumCategory', 'parentAlbumCategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Album Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->albumCategory->setlocale($getQueryLanguageId);
        }
        
        $albumCategory = $this->AlbumCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $albumCategory = $this->AlbumCategories->patchEntity($albumCategory, $this->request->getData());
            $albumCategory->slug = strtolower(Text::slug($albumCategory->title));
            if ($this->AlbumCategories->save($albumCategory)) {
                $this->Flash->success(__d('acp', 'The album category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The album category could not be saved. Please, try again.'));
        }
        $parentAlbumCategories = $this->AlbumCategories->ParentAlbumCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $this->set(compact('albumCategory', 'parentAlbumCategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Album Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $albumCategory = $this->AlbumCategories->get($id);
        if ($this->AlbumCategories->delete($albumCategory)) {
            $this->Flash->success(__d('acp', 'The album category has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The album category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
