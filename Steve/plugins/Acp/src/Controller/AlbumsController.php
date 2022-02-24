<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\ORM\TableRegistry;
/**
 * Albums Controller
 *
 * @property \Acp\Model\Table\AlbumsTable $Albums
 *
 * @method \Acp\Model\Entity\Album[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AlbumsController extends AppController
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
        
        $conditions_album = [];
        $conditions_album_category = [];
        if (!empty($requestQuery['keyword'])) {
            $conditions_album['Albums_slug_translation.content like'] = '%' . $requestQuery['keyword'] . '%';
        }

        if (!empty($requestQuery['album_category_id'])) {
            $albumCategory = $this->Albums->AlbumCategories->get($requestQuery['album_category_id'], [
                'contain' => []
            ]);

            if (!empty($albumCategory)) {
                $conditions_album_category['AlbumCategories.lft >='] = $albumCategory->lft;
                $conditions_album_category['AlbumCategories.rght <='] = $albumCategory->rght;
            }
        }

        $listAlbums = $this->Albums
            ->find('list')
            ->where($conditions_album)
            ->matching('AlbumCategories', function ($q) use ($conditions_album_category){
                return $q->where($conditions_album_category);
            })
            ->toArray();
        $this->paginate = [
            'order' => ['Albums.id' => 'DESC'],
            'maxLimit' => $limit
        ];

        $query = $this->Albums
            ->find('translations')
            ->contain(['AlbumCategories']);

        if ($listAlbums) {
           $query = $this->Albums
                ->find('translations')
                ->where(['Albums.id IN' => array_keys($listAlbums)])
                ->contain(['AlbumCategories']);
        }
        
        $albums = $this->paginate($query)->toArray();
        $albumCategories = $this->Albums->AlbumCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );

        $this->set(compact('albums', 'requestQuery','albumCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Album id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $album = $this->Albums->get($id, [
    //         'contain' => ['AlbumCategories', 'Users']
    //     ]);

    //     $this->set('album', $album);
    // }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function jRemoveImage()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $this->loadModel('Acp.AlbumImages');
            $entity = $this->AlbumImages->get($this->request->data['id']);
            $result = $this->AlbumImages->delete($entity);

            $this->loadModel('Acp.Albums');
            $album = $this->Albums->get($entity->album_id);
            $file = new File(WWW_ROOT . 'uploads/albums/'.$album->uuid.'/image_list/'.$entity->image);
            $file->delete();

            $response = [
                'status' => 1,
                'message' => __d('acp', 'Success')
                
            ];
        }else{
            $response = [
                'status' => 0, 
                'message' => __d('acp', 'Error')
            ];
        }

        echo json_encode($response);
    }

    public function add()
    {
        $album = $this->Albums->newEntity(['associated' => ['AlbumCategories']]);

        if ($this->request->is('post')) {

            unset($this->request->data['image_list']);
            unset($this->request->data['image_fix']);
            unset($this->request->data['images_delete']);

            $album = $this->Albums->patchEntity($album, $this->request->getData());
            $album->uuid = Text::uuid();
            $album->user_id = $this->getRequest()->getSession()->read('Auth.User.id');

            if ($this->request->getData('slug') == '') {
                $album->slug = strtolower(Text::slug($album->title));
            }

            if ($this->Albums->save($album)) {
                $uploadPath = 'uploads' . DS . 'albums'. DS . '0' .DS;
                if(is_dir($uploadPath)){
                    rename($uploadPath, str_replace('0',$album->id,$uploadPath));
                }

                $albumsTable = TableRegistry::getTableLocator()->get('Albums');
                $alb = $albumsTable->get($album->id, ['contain' => ['AlbumCategories']]);
                $alb->image = $this->request->data['image'];
                $albumsTable->save($alb);

                $imagestr = rtrim($alb->images,'|');
                $images = explode('|',$imagestr);
                if ($images[0] != '') {
                    $this->loadModel('Acp.AlbumImages');

                    foreach ($images as $key => $img) {

                        $album_image = $this->AlbumImages->newEntity();
                        $album_image->album_id = $album->id;
                        $album_image->title = $this->request->data['title'];
                        $album_image->description = $this->request->data['description']; 
                        $this->AlbumImages->save($album_image);

                        $albumImagesTable = TableRegistry::get('AlbumImages');
                        $albumImagesTable = TableRegistry::getTableLocator()->get('AlbumImages');

                        $save_image = $albumImagesTable->get($album_image->id);

                        $save_image->image = $img;
                        $albumImagesTable->save($save_image); 
                    }
                }
                
                $this->Flash->success(__d('acp', 'The album has been saved.'));

                return $this->redirect([
                    'action' => 'index',
                    '?' => [
                        'album_category_id' => $alb->album_categories[0]->id
                    ]
                ]);
            }
            $this->Flash->error(__d('acp', 'The album could not be saved. Please, try again.'));
        }

        $albumCategories = $this->Albums->AlbumCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $users = $this->Albums->Users->find('list', ['limit' => 200]);
        $this->set(compact('album', 'albumCategories', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Album id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->Albums->setlocale($getQueryLanguageId);
        }

        $album = $this->Albums
            ->find()
            ->where(['Albums.id' => $id])
            ->contain([
                'AlbumImages' => [
                    'sort' => ['AlbumImages.id' => 'DESC']
                ],'AlbumCategories' 
            ])
            ->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $album = $this->Albums->patchEntity($album, $this->request->getData());
            if ($this->request->getData('slug') == '') {
                $album->slug = strtolower(Text::slug($album->title));
            }
            if ($this->Albums->save($album)) {

                $albumsTable = TableRegistry::get('Albums');
                $albumsTable = TableRegistry::getTableLocator()->get('Albums');
                $alb = $albumsTable->get($album->id);
                $alb->image = $this->request->data['image'];
                $albumsTable->save($alb);

                if (empty($album->images)) {
                    $this->loadModel('AlbumImages');
                    $dir = new Folder(WWW_ROOT . DS .'uploads/albums/' . DS . $album->id . DS);
                    $dir->delete();
                    $this->AlbumImages->deleteAll(['AlbumImages.album_id' => $id]);
                }

                $this->Flash->success(__d('acp', 'The album has been saved.'));

                return $this->redirect([
                    'action' => 'index',
                    '?' => [
                        'album_category_id' => $album->album_categories[0]->id
                    ]
                ]);
            }
            $this->Flash->error(__d('acp', 'The album could not be saved. Please, try again.'));
        }
        $albumCategories = $this->Albums->AlbumCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );

        $users = $this->Albums->Users->find('list', ['limit' => 200]);
        $this->set(compact('album', 'albumCategories', 'users'));
    }

    public function reorderImage($id = null)
    {
        $album = $this->Albums->get($id, ['contain' => ['AlbumImages']]);
        if ($this->request->is('post','ajax')) {

            $images = explode('|', $album->images);
            unset($images[count($images) - 1]);
            $imagesT = [];
            $album_images = [];
            if (!empty($this->request->getData('imageIds'))) {
                $album_images = $this->Albums->AlbumImages
                    ->find()
                    ->where(['AlbumImages.id IN' => $this->request->getData('imageIds')])
                    ->toArray();
                foreach ($this->request->getData('imageIds') as $k => $ids) {
                    $imagesT[$k] = $images[$ids];
                    foreach ($album_images as $key => $album_image) {
                        if ($ids == $album_image->id) {
                            $album_images[$key]->sort = $k + 1;
                        }
                    }
                }
            }
            foreach ($imagesT as $key => $image) {
                $images[$key] = $image;
            }
            $images[] = '';
            $album->images = implode('|', $images);
            $album->album_images = $album_images;

            if ($this->Albums->save($album)) {
                $result['status'] = 1;
            }else{
                $result['status'] = 0;
            }
            $this->response->body(json_encode($result));
            return $this->response;
        }
        $this->set(compact('album'));
    }
    /**
     * Delete method
     *
     * @param string|null $id Album id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $album = $this->Albums->get($id);
        if ($this->Albums->delete($album)) {
            $this->Flash->success(__d('acp', 'The album has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The album could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
