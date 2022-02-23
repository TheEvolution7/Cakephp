<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;

use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\Routing\Router;

/**
 * SummernoteAttachment behavior
 */
class SummernoteAttachmentBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'folder' => WWW_ROOT . DS . 'uploads',
        'fields' => 'content',
    ];

    private $folderPath = null;
    private $aliasEntity = 'default';

    // public function afterSave(Event $event, EntityInterface $entity, ArrayObject $options)
    // {
    // }

    public function beforeSave(Event $event, EntityInterface $entity, ArrayObject $options)
    {
        $tableName = $event->subject()->table();
        $modelName = $event->subject()->alias();
        
        if (!empty($entity->alias)) {
            $this->aliasEntity = $entity->alias;
        }

        $this->folderPath = $this->config('folder') . DS . $tableName . DS . $entity->uuid . DS . $this->config('fields');

        // Base64 Image fetching...
        $entity->content = preg_replace_callback("/src=\"data:([^\"]+)\"/", [$this, 'base64Callback'], $entity->content); 

        // Remote Image fetching...
        $entity->content = preg_replace_callback("/src=\"[\s]*(http|https):\/\/([^\"]+)\"/", [$this, 'httpCallback'], $entity->content);

        if (isset($entity->_i18n) && !empty($entity->_i18n)) {
            foreach ($entity->_i18n as $key => $fieldsTranslate) {
                if ($fieldsTranslate['field'] == 'content') {
                    $entity->_i18n[$key]['content'] = $entity->content;
                }
            };
        }
    }


    public function base64Callback($matches) {
        list($contentType, $encContent) = explode(';', $matches[1]);
        if (substr($encContent, 0, 6) != 'base64') return $matches[0]; // Don't understand, return as is
        
        if (!is_dir($this->folderPath))
            if (mkdir($this->folderPath, 0777, true)) {}

        $imageBase64 = substr($encContent, 6);

        $extension = '';
        switch ($contentType) {
            case 'image/jpeg':  $extension = 'jpg'; break;
            case 'image/gif':   $extension = 'gif'; break;
            case 'image/png':   $extension = 'png'; break;
            default:            return $matches[0]; // Don't understand, return as is
        }

        $imagePath = $this->folderPath . DS . $this->aliasEntity . '-' . uniqid() . '.' . $extension;
        
        if (!file_exists($imagePath)) {
            $imageDecode = base64_decode($imageBase64);
            $file = fopen($imagePath, 'w');
            fwrite($file, $imageDecode);
            fclose($file);
        }
        
        $pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
        $pageURLsub = str_replace($pageURL.$_SERVER['SERVER_NAME'], '', Router::url('/', true));

        return 'src="' . str_replace(WWW_ROOT . DS, $pageURLsub, $imagePath) . '"';
    }

    public function httpCallback($matches) {

        $remoteUrl = sprintf("%s://%s", $matches[1], $matches[2]);

        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        ); 
        $remoteContent = file_get_contents($remoteUrl, false, stream_context_create($arrContextOptions));

        if (!is_dir($this->folderPath)) mkdir($this->folderPath, 0777, true);

        $extension = substr(strrchr($remoteUrl, '.'), 1);

        if (!in_array(strtolower($extension), array('jpg', 'gif', 'png'))) {
            $extension = 'png';
        }
        $imagePath = $this->folderPath . DS . $this->aliasEntity . '-' . uniqid() . '.' . $extension;

        if (!file_exists($imagePath)) {
            $file = fopen($imagePath, 'w');
            fwrite($file, $remoteContent);
            fclose($file);
        }


        $pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
        $pageURLsub = str_replace($pageURL.$_SERVER['SERVER_NAME'], '', Router::url('/', true));

        return 'src="' . str_replace(WWW_ROOT . DS, $pageURLsub, $imagePath) . '"';
    }
}
