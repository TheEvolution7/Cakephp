<?php
namespace Acp\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Routing\Router;

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

	public function processImagePath($folder = null, $image = null, $thumbnail = true)
    {
        $imagePath = Router::url('/') . 'img' . DS . 'no_thumb.png';
        if (!empty($image)) {
            
            $imagePath = $folder . DS . $image;

            if (file_exists($imagePath)) {
                list($width, $height, $type, $attr) = getimagesize(WWW_ROOT . $imagePath);
                $imagePath = Router::url('/') . $folder . DS . $image;
            } 

            if ($width > 500 && $thumbnail == true) {
                $imagePath = Router::url('/'). $folder . DS . 'thumbnail' . DS . $image;
            }
        }

        return $imagePath;
    }

    public function getInfoImage($folder = null, $image = null, $thumbnail = true)
    {
    	$width = 0;
        $height = 0;
        $extension = 0;
        if (file_exists($folder . DS . $image)) {
            list($width, $height, $type, $attr) = getimagesize(WWW_ROOT . $folder . DS . $image);
            $extension = pathinfo(WWW_ROOT . $folder . DS . $image, PATHINFO_EXTENSION);
            $results['width'] = $width;
            $results['height'] = $height;
            $results['extension'] = $extension;
        }
        return $results;
    }
}

?>