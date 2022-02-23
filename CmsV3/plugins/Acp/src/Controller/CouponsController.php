<?php
namespace Acp\Controller;

use Acp\Controller\AppController;
// Custom
use Cake\Utility\Text;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
use Cake\I18n\I18n;
/**
 * Coupons Controller
 *
 * @property \Acp\Model\Table\CouponsTable $Coupons
 *
 * @method \Acp\Model\Entity\Coupon[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CouponsController extends AppController
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
        $order = ['Coupons.id' => 'DESC'];

        if (!empty($requestQuery['keyword'])) {
            $conditions['Coupons_slug_translation.content like'] = '%' . $requestQuery['keyword'] . '%';


        }

        $this->paginate = [
            'contain' => ['Users'],
            'order' => $order,
            'limit' => $limit,
            'conditions' => $conditions
        ];
        $coupons = $this->paginate($this->Coupons->find('translations'));


        $this->set(compact('coupons', 'requestQuery'));
    }

    /**
     * View method
     *
     * @param string|null $id Coupon id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coupon = $this->Coupons->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('coupon', $coupon);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $coupon = $this->Coupons->newEntity();
        if ($this->request->is('post')) {
            $coupon = $this->Coupons->patchEntity($coupon, $this->request->getData());
            $coupon->user_id = $this->getRequest()->getSession()->read('Auth.User.id');

            if ($this->Coupons->save($coupon)) {
                $uploadPath = 'uploads' . DS . 'coupons'. DS . $coupon->uuid .DS;
                if(is_dir($uploadPath)){
                    rename($uploadPath, str_replace($coupon->uuid,$coupon->id,$uploadPath));
                }
                $this->Flash->success(__d('acp', 'The coupon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The coupon could not be saved. Please, try again.'));
        }
        $this->set(compact('coupon', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Coupon id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->Coupons->setlocale($getQueryLanguageId);
        }
        
        $coupon = $this->Coupons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coupon = $this->Coupons->patchEntity($coupon, $this->request->getData());
            $coupon->slug = strtolower(Text::slug($coupon->title));
            $coupon->slug_custom = strtolower(Text::slug($coupon->slug_custom));
            if ($this->Coupons->save($coupon)) {
                $this->Flash->success(__d('acp', 'The coupon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The coupon could not be saved. Please, try again.'));
        }
        $this->set(compact('coupon', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Coupon id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coupon = $this->Coupons->get($id);
        if ($this->Coupons->delete($coupon)) {
            $this->Flash->success(__d('acp', 'The coupon has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The coupon could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
