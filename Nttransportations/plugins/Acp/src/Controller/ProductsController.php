<?php
namespace Acp\Controller;

use Acp\Controller\AppController;
require_once(ROOT . DS . 'src' . DS . "Vendor" . DS . "SimpleXLSX.php");
use SimpleXLSX;
// Custom
use Cake\Utility\Text;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;

use Cake\Http\Client;
use Cake\Datasource\ConnectionManager;
/**
 * Products Controller
 *
 * @property \Acp\Model\Table\ProductsTable $Products
 *
 * @method \Acp\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
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
        
        $conditions_product = [];
        $conditions_product_category = [];
        if (!empty($requestQuery['keyword'])) {
            $conditions_product['Products_slug_translation.content like'] = '%' . $requestQuery['keyword'] . '%';
        }

        if (!empty($requestQuery['product_category_id'])) {
            $productCategory = $this->Products->ProductCategories->get($requestQuery['product_category_id'], [
                'contain' => []
            ]);

            if (!empty($productCategory)) {
                $conditions_product_category['ProductCategories.lft >='] = $productCategory->lft;
                $conditions_product_category['ProductCategories.rght <='] = $productCategory->rght;
            }
        }

        $listProducts = $this->Products
            ->find('list')
            ->where($conditions_product)
            ->matching('ProductCategories', function ($q) use ($conditions_product_category){
                return $q->where($conditions_product_category);
            })
            ->toArray();
        $this->paginate = [
            'order' => ['Products.id' => 'DESC'],
            'maxLimit' => $limit
        ];
        
        $query = $this->Products
            ->find('translations')
            ->contain(['ProductCategories']);

        if ($listProducts) {
           $query = $this->Products
                ->find('translations')
                ->where(['Products.id IN' => array_keys($listProducts)])
                ->contain(['ProductCategories']);
        }

        //pr($query->toArray());exit;

        $products = $this->paginate($query)->toArray();

        $productCategories = $this->Products->ProductCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );

        $this->set(compact('products', 'requestQuery','productCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $product = $this->Products->get($id, [
    //         'contain' => ['ProductCategories', 'Users']
    //     ]);

    //     $this->set('product', $product);
    // }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();

        if ($this->request->is('post')) {
            unset($this->request->data['image_list']);
            unset($this->request->data['image_fix']);
            unset($this->request->data['images_delete']);

            if ($this->request->getData('tags')) {
                
                $decode = json_decode($this->request->getData('tags'),true);
                $changeTags = [];
                foreach ($decode as $value) {
                    foreach ($value as $k => $v) {
                        $changeTags[] = $v;
                    }
                }
                $listTags = [];
                foreach ($changeTags as $key => $value) {
                    if (!empty($value)) {
                        $listTags[$key]['title'] = $value;
                        $listTags[$key]['slug'] = strtolower(Text::slug($value));      
                    }
                }

                $data_tag = [];
                foreach ($listTags as $key => $tag) {
                    $chooseTag = $this->Products->Tags->find()->where(['Tags_slug_translation.content' => $tag['slug'], 'type' => $this->name])->first();

                    if (!empty($chooseTag)) {
                        $data_tag[$key]['id'] = $chooseTag->id;
                    }else{
                        $data_tag[$key]['title'] = $tag['title'];
                        $data_tag[$key]['type'] = $this->name;
                        $data_tag[$key]['slug'] = $tag['slug'];
                    }
                }
                $this->request->data['tags'] = $data_tag;
            }
            
            $product = $this->Products->patchEntity($product, $this->request->getData(), [
                'associated' => ['Tags','AttributeValues','ProductCategories']
            ]);
            
            $product->uuid = Text::uuid();
            $product->user_id = $this->getRequest()->getSession()->read('Auth.User.id');

            if ($this->request->getData('slug') == '') {
                $product->slug = strtolower(Text::slug($product->title));
            }
            
            if ($this->Products->save($product)) {
                $uploadPath = 'uploads' . DS . 'products'. DS . '0' .DS;
                if(is_dir($uploadPath)){
                    rename($uploadPath, str_replace('0',$product->id,$uploadPath));
                }
                $productsTable = TableRegistry::getTableLocator()->get('Products');
                $pro = $productsTable->get($product->id, ['contain' => ['ProductCategories']]);
                $pro->image = $this->request->data['image'];
                $productsTable->save($pro);

                $this->Flash->success(__d('acp', 'The product has been saved.'));

                return $this->redirect([
                    'action' => 'index',
                    '?' => [
                        'product_category_id' => $pro->product_categories[0]->id
                    ]
                ]);
            }
            $this->Flash->error(__d('acp', 'The product could not be saved. Please, try again.'));
        }

        //$products = $this->Product->Tags->find('list');

        $productCategories = $this->Products->ProductCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $brands = $this->Products->Brands->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );

       

        $users = $this->Products->Users->find('list', ['limit' => 200]);

        $this->loadModel('Acp.Attributes');
        if (!empty($getQueryLanguageId)) {
            $this->Attributes->setlocale($getQueryLanguageId);
        }

        $attributes =  $this->Attributes->find('all',[
            'conditions' => ['Attributes.status' => 1],
            'order' => ['sort ASC','Attributes.id DESC'],
            'contain' => ['AttributeValues']
        ])->toArray();

        foreach ($attributes as $key => $attribute) {
            $arr_id = [];
            foreach ($attribute->attribute_values as $attr) {
                $arr_id [] = $attr->id;
            }

            $lists = $this->Products->AttributeValues->find('list',['keyField' => 'id','valueField' => 'title','conditions' => ['status' => 1,'AttributeValues.id IN' => $arr_id]]);
            $list_attribute[$key]['title'] = $attribute->title;
            $list_attribute[$key]['slug'] = $attribute->slug;
            $list_attribute[$key]['list'] = $lists->toArray();
        }

        $this->set(compact('product', 'productCategories', 'users','products','list_attribute','brands'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->Products->setlocale($getQueryLanguageId);
        }
        $product = $this->Products->get($id, [
            'contain' => ['Tags','AttributeValues','ProductCategories','AttributeValuesAmounts','Articles']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            if ($this->request->getData('tags')) {
                
                $decode = json_decode($this->request->getData('tags'),true);
                $changeTags = [];
                foreach ($decode as $value) {
                    foreach ($value as $k => $v) {
                        $changeTags[] = $v;
                    }
                }
                $listTags = [];
                foreach ($changeTags as $key => $value) {
                    if (!empty($value)) {
                        $listTags[$key]['title'] = $value;
                        $listTags[$key]['slug'] = strtolower(Text::slug($value));      
                    }
                }

                $data_tag = [];
                foreach ($listTags as $key => $tag) {
                    $chooseTag = $this->Products->Tags->find()->where(['Tags_slug_translation.content' => $tag['slug'], 'type' => $this->name])->first();

                    if (!empty($chooseTag)) {
                        $data_tag[$key]['id'] = $chooseTag->id;
                    }else{
                        $data_tag[$key]['title'] = $tag['title'];
                        $data_tag[$key]['type'] = $this->name;
                        $data_tag[$key]['slug'] = $tag['slug'];
                    }
                }
                $this->request->data['tags'] = $data_tag;
            }

            $product = $this->Products->patchEntity($product, $this->request->getData(), [
                'associated' => ['Tags','AttributeValues','ProductCategories','Articles']
            ]);

            if ($this->request->getData('slug') == '') {
                $product->slug = strtolower(Text::slug($product->title));
            }
            
            if ($this->Products->save($product)) {

                $productsTable = TableRegistry::getTableLocator()->get('Products');
                $pro = $productsTable->get($product->id);
                $pro->image = $this->request->data['image'];
                $productsTable->save($pro);

                if (empty($product->images)) {
                    $dir = new Folder(WWW_ROOT . DS .'uploads/products/' . DS . $product->id . DS);
                    $dir->delete();
                }
                $this->Flash->success(__d('acp', 'The product has been saved.'));
                return $this->redirect([
                    'action' => 'index',
                    '?' => [
                        'product_category_id' => $product->product_categories[0]->id
                    ]
                ]);
            }
            $this->Flash->error(__d('acp', 'The product could not be saved. Please, try again.'));
        }

        $arr = [];
        foreach ($product->tags as $tag) {
            $arr[$tag->title] = $tag->title;
        }
        $tags = implode(',',$arr);

        $productCategories = $this->Products->ProductCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );

        $brands = $this->Products->Brands->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $articles = $this->Products->Articles->find('list', [
            'keyField' => 'id',
            'valueField' => 'title',
            'spacer' => '--',
            'limit' => 200]
        )->innerJoinWith('ArticleCategories', function ($q) {
            return $q->where(['ArticleCategories.id' => 2]);
        });
        $this->loadModel('Acp.Attributes');
        if (!empty($getQueryLanguageId)) {
            $this->Attributes->setlocale($getQueryLanguageId);
        }

        $attributes =  $this->Attributes->find('all',[
            'conditions' => ['Attributes.status' => 1],
            'order' => ['sort ASC','Attributes.id DESC'],
            'contain' => ['AttributeValues']
        ])->toArray();

        foreach ($attributes as $key => $attribute) {
            $arr_id = [];
            foreach ($attribute->attribute_values as $attr) {
                $arr_id [] = $attr->id;
            }

            $lists = $this->Products->AttributeValues->find('list',['keyField' => 'id','valueField' => 'title','conditions' => ['status' => 1,'AttributeValues.id IN' => $arr_id]]);
            $list_attribute[$key]['id'] = $attribute->id;
            $list_attribute[$key]['title'] = $attribute->title;
            $list_attribute[$key]['slug'] = $attribute->slug;
            $list_attribute[$key]['list'] = $lists->toArray();
        }
        $users = $this->Products->Users->find('list', ['limit' => 200]);
        $this->set(compact('product', 'productCategories', 'users', 'tags','list_attribute','brands','articles'));
    }
    public function reorderImage($id = null)
    {
        $product = $this->Products->get($id);
        if ($this->request->is('post','ajax')) {

            $images = explode('|', $product->images);
            unset($images[count($images) - 1]);
            $imagesT = [];
            if (!empty($this->request->getData('imageIds'))) {
                foreach ($this->request->getData('imageIds') as $k => $ids) {
                    $imagesT[$k] = $images[$ids];
                }
            }
            foreach ($imagesT as $key => $image) {
                $images[$key] = $image;
            }
            $images[] = '';
            $product->images = implode('|', $images);

            if ($this->Products->save($product)) {
                $result['status'] = 1;
            }else{
                $result['status'] = 0;
            }
            $this->response->body(json_encode($result));
            return $this->response;
        }
        $this->set(compact('product'));
    }

    public function copy($id = null)
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post','ajax')) {
            $tmp = $this->Products->get($id, [
                'contain' => ['Tags','AttributeValues','ProductCategories']
            ]);
            $tmpId = $tmp->id;
            $tmpImage = $tmp->image;

            unset($tmp->id);

            $product = $this->Products->patchEntity($product, $tmp->toArray(), [
                'associated' => ['Tags','AttributeValues','ProductCategories']
            ]);
            unset($tmp);
            if ($this->Products->save($product)) {

                $productsTable = TableRegistry::getTableLocator()->get('Products');
                $pro = $productsTable->get($product->id);
                $pro->image = $tmpImage;
                $productsTable->save($pro);

                $dir = new Folder(WWW_ROOT . DS .'uploads' . DS .'products' . DS . $tmpId . DS);
                $dir->copy(WWW_ROOT . DS .'uploads' . DS .'products' . DS . $product->id . DS);

                $this->Flash->set(__d('acp', 'Coppy success'), ['element' => 'fly_success']);
                return $this->redirect([
                    'action' => 'index',
                    '?' => [
                        'product_category_id' => $product->product_categories[0]->id
                    ]
                ]);
            }else{
                $this->Flash->set(__d('acp', 'Coppy error'), ['element' => 'fly_error']);
                return $this->redirect([
                    'action' => 'index',
                    '?' => [
                        'product_category_id' => $tmp->product_categories[0]->id
                    ]
                ]);
            }   
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__d('acp', 'The product has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function checkCode()
    {
        $this->autoRender = false;

        if ($this->request->is('post','ajax')) {
            $lang = $this->request->data['lang'];
            if (!empty($lang)) {
                $this->Products->setlocale($lang);
            }

            $product = $this->Products->find('all', [
                'conditions' => ['code' => $this->request->data['field']]
            ])->first();
            if (!empty($product)) {
                $result['status'] = 0;
                $result['msg'] = __d('acp', 'This code has already been taken');
            }else{
                $result['status'] = 1;
                $result['msg'] = __d('acp', 'Success');
            }
            
            $this->response->body(json_encode($result));
            return $this->response;
        }
    }

    public function jGetAmount($id)
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $listIdAttributeValues = explode(',', $this->request->getData('list_attribute'));
            $attribute_values = $this->Products->AttributeValues->find()
                ->where(['AttributeValues.id IN' => $listIdAttributeValues])
                ->order(['AttributeValues.id' => 'DESC'])
                ->contain('AttributeValuesAmounts', function ($q) {
                    return $q
                        ->where(['AttributeValuesAmounts.product_id' => $this->request->getData('product_id')]);
                })
                ->toArray();
            if ($attribute_values) {
                $data = [];
                foreach ($attribute_values as $key => $value) {
                    $data[$key]['value_title'] = $value->title;
                    if (!empty($value->attribute_values_amount)) {
                        $data[$key]['amount'] = $value->attribute_values_amount->amount;
                        $data[$key]['id'] = $value->attribute_values_amount->id;
                        $data[$key]['attribute_value_id'] = $value->attribute_values_amount->attribute_value_id;
                    }else{
                        $data[$key]['amount'] = 0;
                        $data[$key]['attribute_value_id'] = $value->id;
                        $data[$key]['id'] = null;
                    }
                }

                $response = [
                    'status' => 1,
                    'message' => __d('acp', 'Success'),
                    'data' => $data
                ];

            }else{
                $response = [
                    'status' => 0, 
                    'message' => __d('acp', 'Attribute values empty')
                ];
            }
        }else{
            $response = [
                'status' => 0, 
                'message' => __d('acp', 'Error')
            ];
        }

        echo json_encode($response);
    }

    public function jSaveAmount()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $entities = $this->Products->AttributeValuesAmounts->newEntities($this->request->getData('data'));
            if ($this->Products->AttributeValuesAmounts->saveMany($entities)) {
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
        }else{
            $response = [
                'status' => 0, 
                'message' => __d('acp', 'Error')
            ];
        }

        echo json_encode($response);
    }

    public function imports()
    {
        if ($this->request->is('post')) {

            if ($this->request->getData('type') == 1) {
                $connection = ConnectionManager::get('default');
                $results = $connection->execute('TRUNCATE TABLE products');

                $files = glob(WWW_ROOT . 'uploads' . DS . 'temp' . DS .'*'); //get all file names
                foreach($files as $file){
                    if(is_file($file))
                    unlink($file); //delete file
                };
            }
            $categories = $this->Products->ProductCategories->find('list', [
                'keyField' => 'slug',
                'valueField' => 'id'
            ])->toArray();

            if ($xlsx = SimpleXLSX::parse($_FILES['file']['tmp_name'])) {

                $error = 0;
                $success = 0;

                
                foreach ($xlsx->sheetNames() as $key => $sheet) {
                    if ($key == 0) {
                        foreach ($xlsx->rows($key) as $k => $r) {
                            if ($k > 0) {
                                $data = [];
                                $arr = explode(',', $r[13]);
                                foreach ($arr as $k_arr => $a) {
                                    $data['product_categories'][]['id'] = $categories[strtolower(Text::slug($a))];
                                }
                                $entity = $this->Products->newEntity();

                                $entity->translation('en')->title = $r[0];
                                $entity->translation('vi')->title = $r[1];
                                $entity->translation('en')->slug = strtolower(Text::slug($r[0]));
                                $entity->translation('vi')->slug = strtolower(Text::slug($r[1]));;
                                $entity->translation('en')->description = $r[2];
                                $entity->translation('vi')->description = $r[3];
                                $entity->unit = $r[4];
                                $entity->code = $r[5];
                                $entity->code_s = $r[6];
                                $entity->percent = $r[7];
                                $entity->place = $r[8];
                                $entity->price = $r[9];
                                $entity->discount = $r[10];
                                $entity->status = $r[11];
                                $entity->sort = $r[12];
                                // $arr = explode(',', $r[13]);

                                // $list = [];
                                // foreach ($arr as $k_arr => $a) {
                                //     $list['_ids'][] = $categories[strtolower(Text::slug($a))];
                                // }
                                // $entity->product_categories = [['id' => 1]];
                                $entity->url_image = $r[14];
                                $entity->url_images = $r[15];
                                $entity->currency = 'đ';

                                $entity = $this->Products->patchEntity($entity, $data, ['associated' => ['ProductCategories']]);
                                // $data = [];
                                // foreach ($arrCols as $c => $col) {
                                //     if($c == 7){
                                //         $arr = explode(',', $r[$c]);
                                //         foreach ($arr as $k_arr => $a) {
                                //             $data['product_categories'][]['id'] = $categories[strtolower(Text::slug($a))];
                                //         }
                                //     }else{
                                //         $data[$col] = $r[$c];
                                //     }
                                // }
                                
                                // $entity = $this->Products->patchEntity($entity, $data, ['associated' => ['ProductCategories']]);
                                // $entity->slug = strtolower(Text::slug($data['title']));
                                // $entity->currency = 'đ';

                                if ($this->Products->save($entity)) {
                                    $success++;
                                }else{
                                    $error++;
                                }
                            }
                        }
                    }
                }
                $this->Flash->set(' - ' . __('Number of data success') . ': ' . $success . '<br>' . ' - ' . __('Number of data error'). ': ' . $error , ['element' => 'fly_success']);
                //return $this->redirect(['action' => 'index']);
            } else {
                echo SimpleXLSX::parseError();
            }
        }
    }

    public function getInfo()
    {
    	$this->autoRender = false;
    	if ($this->request->is('post')) {
            if ($xlsx = SimpleXLSX::parse($_FILES['file']['tmp_name'])) {

            	$count = 0;
                foreach ($xlsx->sheetNames() as $key => $sheet) {
                    if ($key == 0) {
                        $count = count($xlsx->rows($key)) - 1;
                    }
                }
                $res['status'] = 1;
                $res['data'] = $count;
            } else {
            	$res['status'] = 0;
                $res['data'] = SimpleXLSX::parseError();
            }
            echo json_encode($res);exit;
        }
    }

    public function import()
    {
        if ($this->request->is('post')) {
            if ($this->request->getData('type') == 1) {
                $connection = ConnectionManager::get('default');
                $results = $connection->execute('TRUNCATE TABLE products');

                $files = glob(WWW_ROOT . 'uploads' . DS . 'temp' . DS .'*'); //get all file names
                foreach($files as $file){
                    if(is_file($file))
                    unlink($file); //delete file
                };
            }
            $categories = $this->Products->ProductCategories->find('list', [
                'keyField' => 'slug',
                'valueField' => 'id'
            ])->toArray();
            if ($xlsx = SimpleXLSX::parse($_FILES['file']['tmp_name'])) {
                foreach ($xlsx->sheetNames() as $key => $sheet) {
                    if ($key == 0) {
                        foreach ($xlsx->rows($key) as $k => $r) {
                            if ($k == $this->request->data['index']) {
                                $data = [];
                                $arr = explode(',', $r[13]);
                                foreach ($arr as $k_arr => $a) {
                                    $data['product_categories'][]['id'] = $categories[strtolower(Text::slug($a))];
                                }
                                $entity = $this->Products->newEntity();

                                $entity->translation('en')->title = $r[0];
                                $entity->translation('vi')->title = $r[1];
                                $entity->translation('en')->slug = strtolower(Text::slug($r[0]));
                                $entity->translation('vi')->slug = strtolower(Text::slug($r[1]));;
                                $entity->translation('en')->description = $r[2];
                                $entity->translation('vi')->description = $r[3];
                                $entity->unit = $r[4];
                                $entity->code = $r[5];
                                $entity->code_s = $r[6];
                                $entity->percent = $r[7];
                                $entity->place = $r[8];
                                $entity->price = $r[9];
                                $entity->discount = $r[10];
                                $entity->status = $r[11];
                                $entity->sort = $r[12];
                                $entity->url_image = $r[14];
                                $entity->url_images = $r[15];
                                $entity->currency = 'đ';

                                $entity = $this->Products->patchEntity($entity, $data, ['associated' => ['ProductCategories']]);

                                if ($this->Products->save($entity)) {
                                    $res['status'] = 1;
                					$res['data'] = (int)$this->request->data['index'];
                                }
                                break;
                            }
                        }
                    }
                }

            } else {
                $res['status'] = 0;
                $res['data'] = SimpleXLSX::parseError();
            }
            echo json_encode($res);exit;
        }
    }
}
