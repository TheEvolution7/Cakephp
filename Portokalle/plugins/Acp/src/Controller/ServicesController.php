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
 * Services Controller
 *
 * @property \Acp\Model\Table\ServicesTable $Services
 *
 * @method \Acp\Model\Entity\Service[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServicesController extends AppController
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
        $order = ['Services.id' => 'DESC'];

        $this->paginate = [
            'contain' => [],
            'order' => $order,
            'limit' => $limit,
            'conditions' => $conditions
        ];
        $services = $this->paginate($this->Services->find());


        $this->set(compact('services', 'requestQuery'));
    }

    /**
     * View method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $service = $this->Services->get($id, [
            'contain' => ['ServiceCategories', 'Users']
        ]);

        $this->set('service', $service);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $service = $this->Services->newEntity();
        if ($this->request->is('post')) {
            $service = $this->Services->patchEntity($service, $this->request->getData());

            if ($this->Services->save($service)) {
                $uploadPath = 'uploads' . DS . 'services'. DS . $service->uuid .DS;
                if(is_dir($uploadPath)){
                    rename($uploadPath, str_replace($service->uuid,$service->id,$uploadPath));
                }
                $this->Flash->success(__d('acp', 'The service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The service could not be saved. Please, try again.'));
        }
        $this->set(compact('service', 'serviceCategories', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $service = $this->Services->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $service = $this->Services->patchEntity($service, $this->request->getData());
            if ($this->Services->save($service)) {
                $this->Flash->success(__d('acp', 'The service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The service could not be saved. Please, try again.'));
        }
        $this->set(compact('service', 'serviceCategories', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $service = $this->Services->get($id);
        if ($this->Services->delete($service)) {
            $this->Flash->success(__d('acp', 'The service has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The service could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
