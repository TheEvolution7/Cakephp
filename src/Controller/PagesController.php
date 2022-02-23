<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 *
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PagesController extends AppController
{

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
   

    public function home()
    {
        $list_id = '8c460072af';
        $api_key = '741ed9d761591154d20c954256e00be4-us2';
        
        // $data = array(
        //     'apikey'        => $api_key,
        //         'email_address' => $email,
        //     'status'        => $status,
        //     'merge_fields'  => $merge_fields
        // );
        $mch_api = curl_init(); // initialize cURL connection
     
        curl_setopt($mch_api, CURLOPT_URL, 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/' . $list_id . '/merge-fields/');
        curl_setopt($mch_api, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic '.base64_encode( 'user:'.$api_key )));
        curl_setopt($mch_api, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
        curl_setopt($mch_api, CURLOPT_RETURNTRANSFER, true); // return the API response
        //curl_setopt($mch_api, CURLOPT_CUSTOMREQUEST, 'PUT'); // method PUT
        curl_setopt($mch_api, CURLOPT_TIMEOUT, 10);
        //curl_setopt($mch_api, CURLOPT_POST, true);
        curl_setopt($mch_api, CURLOPT_SSL_VERIFYPEER, false);
        //curl_setopt($mch_api, CURLOPT_POSTFIELDS, json_encode($data) ); // send data in json
     
        $result = curl_exec($mch_api);
        pr($result);exit;
        $this->set(compact('title_for_layout','homeAlbums','homeArticles'));
    }

    public function selectLanguage() {

        $session = $this->getRequest()->getSession();
        $intro = $session->write('intro',true);
        $this->layout = 'select_language';
        $title_for_layout = __('Select Language');

        $this->set(compact('title_for_layout','meta_keyword', 'meta_description', 'breadcrumb'));
    }

    public function contact() {
        $title_for_layout = __('Contact');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->loadModel('Contacts');
            $contact = $this->Contacts->newEntity($this->request->getData());
            $result = 0;
            if ($this->Contacts->save($contact)) {
                $result = 1;
            }
            echo json_encode($result);exit;
        }
        $this->set(compact('title_for_layout','meta_keyword', 'meta_description'));
    }

    public function storeLocation() {
        $title_for_layout = __('Store Location');
        $this->set(compact('title_for_layout','meta_keyword', 'meta_description'));
    }

    public function aboutThuy() {
        $title_for_layout = __('Thuy');
        $this->set(compact('title_for_layout','meta_keyword', 'meta_description'));
    }

    public function anySize(){
        $this->autoRender = false;
        require dirname(__DIR__) . '/Vendor/anysize.php';
        return false;
    }
}