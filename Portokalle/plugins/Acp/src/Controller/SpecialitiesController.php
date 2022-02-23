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
 * Specialities Controller
 *
 * @property \Acp\Model\Table\SpecialitiesTable $Specialities
 *
 * @method \Acp\Model\Entity\Service[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SpecialitiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $requestQuery = $this->request->getQuery();
        $limit = !empty($requestQuery['limit']) ? $requestQuery['limit'] : 16;
        
        $conditions = [];
        $order = ['Specialities.id' => 'DESC'];

        $this->paginate = [
            'contain' => [],
            'order' => $order,
            'limit' => $limit,
            'conditions' => $conditions
        ];
        $specialities = $this->paginate($this->Specialities->find());


        $this->set(compact('specialities', 'requestQuery'));
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
        $speciality = $this->Specialities->get($id, [
            'contain' => ['ServiceCategories', 'Users']
        ]);

        $this->set('speciality', $speciality);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $speciality = $this->Specialities->newEntity();
        if ($this->request->is('post')) {
            $speciality = $this->Specialities->patchEntity($speciality, $this->request->getData());
            $speciality->slug = Text::slug(strtolower($speciality->title));
            $speciality->uuid = Text::uuid();
            if ($this->Specialities->save($speciality)) {
                $uploadPath = 'uploads' . DS . 'specialities'. DS . $speciality->uuid .DS;
                if(is_dir($uploadPath)){
                    rename($uploadPath, str_replace($speciality->uuid,$speciality->id,$uploadPath));
                }
                $this->Flash->success(__d('acp', 'The speciality has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The speciality could not be saved. Please, try again.'));
        }
        $this->set(compact('speciality', 'specialityCategories', 'users'));
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

        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->Specialities->setlocale($getQueryLanguageId);
        }
        
        $speciality = $this->Specialities->get($id, [
            'contain' => ['Services']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $speciality = $this->Specialities->patchEntity($speciality, $this->request->getData());
            $speciality->slug = Text::slug(strtolower($speciality->title));
            if ($this->Specialities->save($speciality)) {
                $this->Flash->success(__d('acp', 'The speciality has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The speciality could not be saved. Please, try again.'));
        }

        $services = $this->Specialities->Services->find('list', [
            'keyField' => 'id',
            'valueField' => 'title'
        ]);
        $this->set(compact('speciality', 'specialityCategories', 'users', 'services'));
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
        $speciality = $this->Specialities->get($id);
        if ($this->Specialities->delete($speciality)) {
            $this->Flash->success(__d('acp', 'The speciality has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The speciality could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
