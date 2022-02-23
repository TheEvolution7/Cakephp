<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * Languages Controller
 *
 * @property \Acp\Model\Table\LanguagesTable $Languages
 *
 * @method \Acp\Model\Entity\Language[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LanguagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $languages = $this->paginate($this->Languages);

        $this->set(compact('languages'));
    }

    /**
     * View method
     *
     * @param string|null $id Language id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $language = $this->Languages->get($id, [
            'contain' => []
        ]);

        $this->set('language', $language);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $language = $this->Languages->newEntity();
        if ($this->request->is('post')) {
            $language = $this->Languages->patchEntity($language, $this->request->getData());
            $language->uuid = Text::uuid();
            $language->slug = strtolower(Text::slug($language->title));
            if ($this->Languages->save($language)) {
                $uploadPath = 'uploads' . DS . 'languages'. DS . $language->uuid .DS;
                if(is_dir($uploadPath)){
                    rename($uploadPath, str_replace($language->uuid,$language->id,$uploadPath));
                }
                $this->Flash->success(__d('acp', 'The language has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The language could not be saved. Please, try again.'));
        }
        $this->set(compact('language'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Language id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $language = $this->Languages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $language = $this->Languages->patchEntity($language, $this->request->getData());
            $language->slug = strtolower(Text::slug($language->title));
            if ($this->Languages->save($language)) {
                $this->Flash->success(__d('acp', 'The language has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The language could not be saved. Please, try again.'));
        }
        $this->set(compact('language'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Language id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $language = $this->Languages->get($id);
        if ($this->Languages->delete($language)) {
            $this->Flash->success(__d('acp', 'The language has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The language could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function translates()
    {
        $languages = $this->paginate($this->Languages);

        $this->set(compact('languages'));
    }
}
