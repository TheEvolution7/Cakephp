<?php
namespace App\View\Helper;

use Cake\View\Helper;

class CmsHelper extends Helper
{
    public $helpers = ['Html'];

    function moneyExchange ($amount = 0, $currency = '£') {
		$currencies = [
			'£' => [
				'rate' => 1,
			]
		];
		foreach ($currencies as $key => $value) {
			if ($key == $currency) $amount = $amount/$value['rate'];
				
		}
		return round($amount, 2);
	}
	function price_translate($price = null, $first = null, $last = null) {
        if ($first != $last) {
            $mCurrency = TableRegistry::getTableLocator()->get('Acp.Currencies');
            $currency = $mCurrency->find()->where(['Currencies.currency' => $first])->first();

            if (Configure::read('Core.setting.rate') != 1 && Configure::read('Core.setting.rate') <  $currency->rate) {
                return round($price / Configure::read('Core.setting.rate'),2);
            }elseif (Configure::read('Core.setting.rate') != 1 && Configure::read('Core.setting.rate') >  $currency->rate) {
                return round($price * Configure::read('Core.setting.rate'),2);
            }else{
                return round($price / $currency->rate,2);
            }
        }
        return $price;
    }
}
?>