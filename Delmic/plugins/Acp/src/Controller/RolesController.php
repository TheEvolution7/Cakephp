<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;
use Cake\Filesystem\File;

use ReflectionClass;
use ReflectionMethod;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 *
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $roles = $this->paginate($this->Roles);

        $this->set(compact('roles'));
    }

    protected function getControllers()
    {
        $files = scandir('../plugins/Acp/src/Controller/');
        $results = [];
        $ignoreList = [
            '.', 
            '..', 
            'Component', 
            'AppController.php',
        ];
        foreach($files as $file){
            if(!in_array($file, $ignoreList)) {
                $controller = explode('.', $file)[0];
                array_push($results, str_replace('Controller', '', $controller));
            }            
        }

        return $results;
    }

    protected function getActions($controllerName) {
        $className = 'Acp\\Controller\\'.$controllerName.'Controller';
        $class = new ReflectionClass($className);
        $actions = $class->getMethods(ReflectionMethod::IS_PUBLIC);
        //$results = [$controllerName => []];
        $results['name'] = $controllerName;

        $ignoreList = ['beforeFilter', 'afterFilter', 'initialize'];
        foreach($actions as $action){
            if($action->class == $className && !in_array($action->name, $ignoreList)){
                $results['actions'][$action->name] = $action->name;
            }   
        }
        $results['coreActions'] = [
            'updateStatus' => 'updateStatus',
            'deleteFile' => 'deleteFile',
            'uploadFile' => 'uploadFile'
        ];
        return $results;
    }

    public function permission($role_id = null)
    {
        $controllers = $this->getControllers();
        $resources = [];
        foreach($controllers as $controller){
            $actions = $this->getActions($controller);
            $resources[$controller] = $actions;
        }
        $getControllers = $resources;
        $this->set('getControllers', $getControllers);

        $role = $this->Roles->get($role_id, [
            'contain' => []
        ]);

        if ($role->id  == 1) {
            $this->Flash->success(__d('acp', '{0} role is full permission', $role->title));
            $this->redirect(['plugin' => 'Acp', 'controller' => 'Roles', 'action' => 'index']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            $role->permissions = json_encode($this->request->getData('permissions'), JSON_UNESCAPED_UNICODE);
            if ($this->Roles->save($role)) {

                $roles = $this->Roles->find('all')->toArray();

                $content = '';
                foreach ($getControllers as $key => $controllerAction) {
                    $content .= "[Acp." . $key . "]\n";

                    foreach ($roles as $role) {

                        $permissions = json_decode($role->permissions);
                        if (!empty($permissions) && !empty($permissions->$key)) {

                            $actions = [];
                            foreach ($permissions->$key as $key1 => $value) {
                                if ($value) {
                                    $actions[] = $key1;
                                }
                            }

                            if (!empty($actions)) {
                                if (count($actions) == count($controllerAction['actions'])) {

                                    $content .= '* = ' . $role->slug . "\n";    
                                } else {

                                    $content .= implode(',', array_merge($actions, $controllerAction['coreActions'])) . ' = ' . $role->slug . "\n";    
                                }
                            }
                        }
                    }
                    $content .= "\n";
                }

                $file = new File(CONFIG . DS . 'acl.ini');
                $write = $file->write($content);

                $this->Flash->success(__d('acp', 'The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The role could not be saved. Please, try again.'));
        }
        $this->set(compact('role'));
    }

    /**
     * View method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $role = $this->Roles->get($id, [
    //         'contain' => ['Users']
    //     ]);

    //     $this->set('role', $role);
    // }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $role = $this->Roles->newEntity();
        if ($this->request->is('post')) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            $role->slug = strtolower(Text::slug($role->title));

            if ($this->Roles->save($role)) {
                $this->Flash->success(__d('acp', 'The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The role could not be saved. Please, try again.'));
        }
        $this->set(compact('role'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            $role->slug = strtolower(Text::slug($role->title));
            
            if ($this->Roles->save($role)) {
                $this->Flash->success(__d('acp', 'The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The role could not be saved. Please, try again.'));
        }
        $this->set(compact('role'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $role = $this->Roles->get($id);

        if ($role->id  == 1) {
            $this->Flash->success(__d('acp', '{0} role could not be deleted', $role->title));
            return $this->redirect(['plugin' => 'Acp', 'controller' => 'Roles', 'action' => 'index']);

        }


        if ($this->Roles->delete($role)) {
            $this->Flash->success(__d('acp', 'The role has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
