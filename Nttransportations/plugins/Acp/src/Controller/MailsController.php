<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;
require dirname(__DIR__) . '/Vendor/SimpleXLSX.php';

use SimpleXLSX;
/**
 * Mails Controller
 *
 * @property \Acp\Model\Table\MailsTable $Mails
 *
 * @method \Acp\Model\Entity\Mail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function smtp($id = null)
    {
        $this->autoRender = false;

        if ($this->request->is(['patch', 'post', 'put']) && !empty($this->request->getData('id'))) {
            $mail = $this->Mails->get($this->request->getData('id'));

            $mail = $this->Mails->patchEntity($mail, $this->request->getData());
            if ($this->Mails->save($mail)) {
                $resutl['status'] = 1;
                $resutl['message'] = __d('acp', 'The mail has been saved.');
                $resutl['data'] = $this->request->getData();
            }else{
                $resutl['status'] = 0;
                $resutl['message'] = __d('acp', 'The mail could not be saved. Please, try again.');
            }
            echo json_encode($resutl);exit;
        }
        
        $mail = $this->Mails->find()->where(['id' => $id])->select(['id','email_user','email_password','email_host','email_port','email_smtpsecure'])->first()->toArray();
        if(!empty($mail)){
            $resutl['status'] = 1;
            $resutl['message'] = __d('acp', 'Success');
            $resutl['data'] = $mail;
        }else{
            $resutl['status'] = 0;
            $resutl['message'] = __d('acp', 'Error');;
            $resutl['data'] = null;
        }
        echo json_encode($resutl);
    }

    public function import($id = null)
    {
        $this->loadModel('Acp.Emails');
        if ($this->request->is('post')) {
        	if ($_FILES == null) {
        		$this->Flash->success(__d('acp', 'List email has been import.'));
				return $this->redirect(['action' => 'import',$id]);
        	}
            if ($xlsx = SimpleXLSX::parse($_FILES['file']['tmp_name'])){
            	$success = 0; 
            	$error = 0; 
            	$result = null;
				foreach ($xlsx->rows() as $row){
					$email = $this->Emails->newEntity();
                    $email->email = $row[0];
                    $email->name = $row[1];
                    $email->mail_category_id = $id;
		            if ($this->Emails->save($email)) {
		                $success++;
		            }else{
		            	$error++;
		            	$result[$row[0]] = $row;
		            	$result[$row[0]]['msg'] = $this->Emails->validationErrors;
		            }
                }
                if ($success > 0) {
                	$mail = $this->Mails->get($id);
                	$mail->count_mail = $mail->count_mail + $success;
                	$mail = $this->Mails->patchEntity($mail,$this->request->getData());
                	$this->Mails->save($mail);
                }
                $data = [
                	'success' => $success,
                	'error' => $error,
                	'result' => $result
                ];
			}else{
				$data = SimpleXLSX::parseError();
			};
        }
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function index()
    {
        $requestQuery = $this->request->getQuery();
        $limit = !empty($requestQuery['limit']) ? $requestQuery['limit'] : 10;
        
        $conditions = [];
        $order = ['Mails.id' => 'DESC'];

        if (!empty($requestQuery['keyword'])) {
            $conditions['Mails_slug_translation.content like'] = '%' . $requestQuery['keyword'] . '%';


        }
        if (!empty($requestQuery['mail_category_id'])) {
            $mailCategory = $this->Mails->MailCategories->get($requestQuery['mail_category_id'], [
                'contain' => []
            ]);

            if (!empty($mailCategory)) {
                $conditions['MailCategories.lft >='] = $mailCategory->lft;
                $conditions['MailCategories.rght <='] = $mailCategory->rght;
            }

            $order = ['Mails.sort' => 'DESC'];
        }

        $this->paginate = [
            'contain' => ['MailCategories', 'Users'],
            'order' => $order,
            'limit' => $limit,
            'conditions' => $conditions
        ];
        $mails = $this->paginate($this->Mails->find('all'));

        $mailCategories = $this->Mails->MailCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );

        $this->set(compact('mails', 'requestQuery', 'mailCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Mail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $mail = $this->Mails->get($id, [
    //         'contain' => ['MailCategories', 'Users']
    //     ]);

    //     $this->set('mail', $mail);
    // }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mail = $this->Mails->newEntity();
        if ($this->request->is('post')) {
            $mail = $this->Mails->patchEntity($mail, $this->request->getData());
            $mail->uuid = Text::uuid();
            $mail->user_id = $this->getRequest()->getSession()->read('Auth.User.id');
            $mail->slug = strtolower(Text::slug($mail->title));
            if ($this->Mails->save($mail)) {
                $this->Flash->success(__d('acp', 'The mail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The mail could not be saved. Please, try again.'));
        }
        $mailCategories = $this->Mails->MailCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $users = $this->Mails->Users->find('list', ['limit' => 200]);
        $this->set(compact('mail', 'mailCategories', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $getQueryLanguageId = $this->getRequest()->getQuery('language_id');
        
        if (!empty($getQueryLanguageId)) {
            $this->Mails->setlocale($getQueryLanguageId);
        }
        
        $mail = $this->Mails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mail = $this->Mails->patchEntity($mail, $this->request->getData());
            $mail->slug = strtolower(Text::slug($mail->title));
            if ($this->Mails->save($mail)) {
                $this->Flash->success(__d('acp', 'The mail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('acp', 'The mail could not be saved. Please, try again.'));
        }
        $mailCategories = $this->Mails->MailCategories->find('treeList', [
            'keyPath' => 'id',
            'valuePath' => 'title',
            'spacer' => '--',
            'limit' => 200]
        );
        $users = $this->Mails->Users->find('list', ['limit' => 200]);
        $this->set(compact('mail', 'mailCategories', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mail = $this->Mails->get($id);
        if ($this->Mails->delete($mail)) {
            $this->Flash->success(__d('acp', 'The mail has been deleted.'));
        } else {
            $this->Flash->error(__d('acp', 'The mail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
