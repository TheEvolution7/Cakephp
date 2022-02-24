<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;

class CmsHelper extends Helper
{
	
	function price_translate($price = null, $first = null, $last = null) {
		if ($first != $last) {
			$mCurrency = TableRegistry::getTableLocator()->get('Acp.Currencies');
			$currency = $mCurrency->find('all',['conditions' => ['Currencies.currency' => $first]])->first();
			if (Configure::read('Core.setting.rate') <  $currency->rate) {
				return round($price / $currency->rate,2);
			}elseif (Configure::read('Core.setting.rate') >  $currency->rate) {
				return round($price * Configure::read('Core.setting.rate'),2);
			}else{
				return $price;
			}
		}
		return $price;
	}
}
?>