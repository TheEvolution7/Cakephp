<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

// Custom
use Cake\I18n\I18n;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;

use Cake\Cache\Cache;
use Cake\Utility\Text;
use Cake\Routing\Router;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->setConfig();

        $this->setInit();
    }

    private function setInit()
    {
        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        // $this->loadComponent('Security', [
        //     // 'csrfUseOnce' => false
        // ]);


        // Always enable the CSRF component.
        //$this->loadComponent('Csrf');


        $this->loadComponent('TinyAuth.Auth', [
            'autoClearCache' => true,

            'authorize' => [
                'TinyAuth.Tiny' => [
                    'superAdminRole' => 1,
                    'superAdmin' => 1,
                    'aliasColumn' => 'slug'
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login',
                'plugin' => false
            ],
            'authError' => __('You do not have access'),
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'myAccountDownload'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
                'plugin' => false
            ],
            // 'unauthorizedRedirect' => [
            //     'controller' => 'Users',
            //     'action' => 'login',
            //     'plugin' => false,
            //     'prefix' => false
            // ],
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password']
                ]
            ],
            'flash' => [
                'element' => 'fly_error'
            ]
        ]);
    }

    

    private function setConfig()
    {
        
        // Configure
        $mLanguage = TableRegistry::getTableLocator()->get('Languages');
        $languages = $mLanguage->getAllLanguage();

        Configure::write('Core.languages', $languages);


        
        /*
         *
         * Set language website
         *
         * Language default is in settings
         *
         */
        // $languageId = $this->request->getParam('languageId');
        // if ($languageId) {
            
        //     I18n::setLocale($languageId);
        // } else {

        //     // Read cache settings
        // }
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        //$this->Security->setConfig('unlockedActions', ['uploadFile', 'deleteFile']);

        $this->setCache();

        $requestParams = $this->getRequest()->getAttribute('params');
        $requestQuery = $this->getRequest()->getQuery();
        $this->set(compact('requestParams', 'requestQuery'));

    }


    private function setCache()
    {
        $language = I18n::getLocale();
        $this->set('configs', ['language' => $language]);

        if (($banners = Cache::read('banners_' . $language)) === false) {


            $mBanners = TableRegistry::getTableLocator()->get('Acp.Banners');
            $cacheBanners = $mBanners->getCacheData();

            Cache::write('banners_' . $language, $cacheBanners);
        }

        if (($category_products = Cache::read('category_products_' . $language)) === false) {


            $mProductCategories = TableRegistry::getTableLocator()->get('Acp.ProductCategories');
            $cacheProductCategories = $mProductCategories->getCacheData();

            Cache::write('category_products_' . $language, $cacheProductCategories);
        }

        if (($albums = Cache::read('albums_' . $language)) === false) {


            $mAlbums = TableRegistry::getTableLocator()->get('Acp.Albums');
            $cacheAlbums = $mAlbums->getCacheData();

            Cache::write('albums_' . $language, $cacheAlbums);
        }
    }

    public function clearCache()
    {
        Cache::clear(false);

        $this->Flash->success(__d('acp', 'Cache cleared'));
        $this->redirect($this->referer());
    }

     /**
     *
     * Upload File
     *
     * @return arrray
     */
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
                            'path' => 'webroot{DS}uploads{DS}{table}{DS}{field-value:user_id}{DS}{field}{DS}',
                            'transformer' => function (\Cake\Datasource\RepositoryInterface $table, \Cake\Datasource\EntityInterface $entity, $data, $field, $settings) {
                                $extension = pathinfo($data['name'], PATHINFO_EXTENSION);

                                // Store the thumbnail in a temporary file
                                $tmp = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;

                                // Use the Imagine library to DO THE THING
                                $size = new \Imagine\Image\Box(500, 1000);
                                $mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
                                $imagine = new \Imagine\Gd\Imagine();

                                // Save that modified file to our temp file
                                $imagine->open($data['tmp_name'])
                                    ->thumbnail($size, $mode)
                                    ->save($tmp);

                                // Now return the original *and* the thumbnail
                                return [
                                    $data['tmp_name'] => strtolower($entity['slug'] . $entity->countFile . '.' . $extension),
                                    $tmp => strtolower('thumbnail' . DS . $entity['slug'] . $entity->countFile . '.' . $extension),
                                ];
                            }
                        ]
                    ];

                    $entity = $this->$modelName->newEntity();
                    $entity = $this->$modelName->patchEntity($entity, $requestData);
                    $entity->user_id = $this->getRequest()->getSession()->read('Auth.User.id');
                    $entity->slug = strtolower(Text::slug($entity->title));


                    $table = $this->$modelName->getTable();
                    
                    $countFile = $this->countFileDir(WWW_ROOT . DS . 'uploads' . DS . $table . DS . $entity->user_id . DS . 'image_list' . DS);
                    $entity->countFile = $countFile;

                    $files = $this->$modelName->behaviors()->get('Upload')->uploadFile($entity, $configs);

                    foreach ($files as $key => $file) {

                        $files[$key]['deleteType'] = 'DELETE';
                        $files[$key]['deleteUrl'] = Router::url([
                            'plugin' => $requestParams['plugin'],
                            'action' => 'deleteFile',
                            'file' => $file['name']
                        ]);

                        $files[$key]['url'] = Router::url(DS . 'uploads' . DS . $table . DS . $entity->user_id . DS . $file['field'] . DS . $file['name']);
                        $files[$key]['thumbnailUrl'] = Router::url(DS . 'uploads' . DS . $table . DS . $entity->user_id . DS . $file['field'] . DS . 'thumbnail' . DS . $file['name']);
                    }   

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
                            'path' => 'webroot{DS}uploads{DS}{table}{DS}{field-value:user_id}{DS}{field}{DS}',
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

    public function deleteAll()
    {
        $this->autoRender = false;
        
        $requestParams = $this->getRequest()->getAttribute('params');
        if ($this->request->is('post')) {

            $requestData = $this->request->getData();

            $modelName = $requestParams['controller'];

            if (!empty($requestData['deleteIds']))  {

                $ids = explode(',', $requestData['deleteIds']);
                if (!empty($ids)) {
                    
                    foreach ($ids as $key => $id) {

                        $entity = $this->$modelName->get($id);
                        if ($entity) {

                            $this->$modelName->delete($entity);
                        }

                    }

                    $this->Flash->success(__d('acp', 'Delete success.'));
                }
            }

            $this->redirect($this->referer());
        }
    }

    public function sortAll()
    {
        $this->autoRender = false;
        
        $requestParams = $this->getRequest()->getAttribute('params');
        if ($this->request->is('post')) {

            $requestData = $this->request->getData();
            $modelName = $requestParams['controller'];

            if (!empty($requestData['sortIds']))  {
                $sortIds = json_decode($requestData['sortIds']);
                
                if (!empty($sortIds)) {
                    
                    foreach ($sortIds as $key => $sort) {

                        $entity = $this->$modelName->get($sort->id);
                        $entity->sort = $sort->value;
                        if ($entity) {

                            $this->$modelName->save($entity);
                        }

                    }

                    Cache::clear(false);

                    $this->Flash->success(__d('acp', 'Re-order success.'));
                }
            }
        }
    }

    public function updateStatus()
    {
        $this->autoRender = false;

        $response = [
            'status' => 0, 
            'message' => __d('acp', 'Update error')
        ];

        if ($this->request->is('post')) {

            $requestData = $this->request->getData();

            if (!empty($requestData['model'])) {

                $modelName = $requestData['model'];
            } else {
                $modelName = $this->name;
            }

            $entity = $this->$modelName->get(['id' => $requestData['id']]);
            $oldvalue = $entity->$requestData['key'];

            $entity->$requestData['key'] = $requestData['value'];

            if ($entity) {

                if ($this->$modelName->save($entity)) {
                    $response = [
                        'status' => 1, 
                        'class' => $requestData['class'],
                        'value' => (int)$oldvalue,
                        'message' => __d('acp', 'Update success')
                    ];
                }
            }

        }

        echo json_encode($response);
    }
}
