<?php
namespace Acp\Model\Entity;

use Cake\ORM\Entity;

class Setting extends Entity
{
    protected $_accessible = [
        '*' => true
    ];

    protected function _setMetaKeyword($meta_keyword)
    {
        $decode = json_decode($meta_keyword,true);
        $arr = [];
        foreach ($decode as $value) {
            foreach ($value as $k => $v) {
                $arr[] = $v;
            }
        }
        $meta_keyword = implode(',', $arr);
        
        return $meta_keyword;
    }

    protected function _setIConfig($ip_config)
    {
        $decode = json_decode($ip_config,true);
        $arr = [];
        foreach ($decode as $value) {
            foreach ($value as $k => $v) {
                $arr[] = $v;
            }
        }
        $ip_config = implode(',', $arr);
        
        return $ip_config;
    }
}
