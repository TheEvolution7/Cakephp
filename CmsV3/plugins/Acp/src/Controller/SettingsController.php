<?php
namespace Acp\Controller;

use Acp\Controller\AppController;

// Custom
use Cake\Utility\Text;

/**
 * Settings Controller
 *
 * @property \Acp\Model\Table\SettingsTable $Settings
 *
 * @method \Acp\Model\Entity\Setting[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SettingsController extends AppController
{
    public function edit($id = null)
    {
        $setting = $this->Settings->get($id, [
            'contain' => []
        ]);
        $this->loadModel('Currencies');

        if ($this->request->is(['patch', 'post', 'put'])) {
            $setting = $this->Settings->patchEntity($setting, $this->request->getData(),['associated'=> ['Currencies']]);
            $currency = $this->Currencies->get($setting->currency_id);
            $setting->currency = $currency->currency;
            $setting->rate = $currency->rate;
            $setting->slug = strtolower(Text::slug($setting->site_title));
            if ($this->Settings->save($setting)) {
                $this->Flash->success(__d('acp', 'The setting has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__d('acp', 'The setting could not be saved. Please, try again.'));
        }
        $languages = $this->Settings->Languages->find('list');
        
        $currencies = $this->Currencies->find('list',['keyField' => 'id','valueField' => 'title']);

        $this->set(compact('setting', 'languages','currencies'));
    }
}
