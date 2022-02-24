<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\Filesystem\File;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;

class MyHtmlHelper extends Helper
{
    public $helpers = ['Url'];

    public function urlAnySize($folder, $resize = null)
    {
        $file_info = pathinfo(WWW_ROOT.$folder);
        $file = $file_info['basename'];
        $lastFolder = $folder;
        $folder = explode('uploads', WWW_ROOT.$folder);
        $folder = '/uploads'.$folder[1];
        $folder = str_replace($file, '', $folder);

    	$getSize = array(
            1 => 'thumb', // 80
            2 => 'small', // 400
            3 => 'medium', // 800
            4 => 'large', // 1024
            5 => 'x-large', // 1200
        );

        if(is_numeric($resize)){
            $size = 's='.$getSize[$resize];
            $crc32_name = $folder.$file.$getSize[$resize];
        }
        else{
            $size = $resize;
            $crc32_name = $folder.$file.preg_replace("/[^0-9]/", '', $resize);
        }

        $folder_file_name_cache = 'img/cache/'.$file_info['filename'].'_'. sprintf('%u.'.$file_info['extension'], crc32($crc32_name));
        // co cau hinh anysize thi chay. khong thi ra link binh thuong.
        if(\Cake\Core\Configure::read('Core.setting.anysize') == 1){

            // kiem tra neu ton tai hinh trong cache thi hien thi link trong cache
            // neu chua co hinh thi chay vao anysize

            if(file_exists(WWW_ROOT.$folder_file_name_cache)){
                $data = $this->Url->assetUrl(DS.$folder_file_name_cache);
            }else{
                if($resize == null)
                    $data = $this->Url->assetUrl('/anysize?folder='.DS.$folder.DS.'&file='.$file);
                else
                    $data = $this->Url->assetUrl('/anysize?folder='.DS.$folder.DS.'&file='.$file.'&'.$size);
            }
        }else{
            $data = $this->Url->build($folder.$file);
        }
        return $data;

    	// $data = $this->Url->build($folder . $file);
    	// if (1 == 1) {
     //        $folder_file_name_cache = 'img/cache/'.$file.'_'. sprintf('%u.'.$file_info['extension'], crc32($crc32_name));
    	// 	if (isset($resize) && is_numeric($resize) ) {
     //            $data = $this->Url->assetUrl('/anysize?folder='.DS.$folder.DS.'&file='.$getSize[$resize] . '-' . $file.'&s='.$getSize[$resize]);
    	// 		// $File = new File(WWW_ROOT.$folder . $getSize[$resize] . '-' . $file, false);
    	// 		// if ($File->exists() == 1) {
	    // 		// 	//$data = $this->Url->build($folder . $getSize[$resize] . '-' . $file);
	    // 		// }
    	// 	}
    	// }
     //    echo crc32($folder.$file.$getSize[$resize]);
        //return $data;
    }

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
        return number_format($price);
    }

    public function processImagePath($folder = null, $image = null, $thumbnail = true)
    {
        $imagePath = DS . 'img' . DS . 'no_thumb.png';

        if (file_exists($folder . DS . $image) && file_get_contents($folder . DS . $image)) {
            $imagePath = $folder . DS . $image;

            if (Configure::read('Core.setting.check_link') == true) {
                if (!empty($image)) {
                
                    $imagePath = URL_UPLOAD . DS . $folder . DS . $image;

                    if (file_get_contents($imagePath)) {
                        list($width, $height, $type, $attr) = getimagesize($imagePath);
                    } 

                    if ($width > 500 && $thumbnail == true) {
                        $imagePath = URL_UPLOAD . DS . $folder . DS . 'thumbnail' . DS . $image;
                    }
                }
            }else{
                list($width, $height, $type, $attr) = getimagesize(WWW_ROOT . $imagePath);
                $imagePath = DS . $folder . DS . $image;

                if ($width > 500 && $thumbnail == true) {
                    $imagePath = DS . $folder . DS . 'thumbnail' . DS . $image;
                }
            }
        }

        return $imagePath;
    }
}
?>