<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

// Custom
use Cake\Utility\Text;
use Cake\Routing\Router;
class CoreTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $url = explode('/',$_SERVER['REQUEST_URI']);
        $keyacp = array_search('acp',$url);
        $keyadmin = array_search('admin',$url);
        if (!empty($keyacp)) {
            $controller = isset($url[$keyacp + 1])?$url[$keyacp + 1]:'Pages';
            $action = isset($url[$keyacp + 2])?$url[$keyacp + 2]:'index';
            $action = explode('?',$action)[0];
        }elseif(!empty($keyadmin)){
            $controller = isset($url[$keyadmin + 1])?$url[$keyadmin + 1]:'Pages';
            $action = isset($url[$keyadmin + 2])?$url[$keyadmin + 2]:'index';
            $action = explode('?',$action)[0];
        }else{
            $controller = $url[2];
            $action = isset($url[3]) ? $url[3] : 'index';
        }
        
        if (in_array($controller,['Articles','Albums','Products'])) {
            $this->addBehavior('Josegonzalez/Upload.Upload');
        }else{
            if ($action == 'add') {
                $link = 'webroot{DS}uploads{DS}{table}{DS}{field-value:uuid}{DS}';
            }else{
                $link = 'webroot{DS}uploads{DS}{table}{DS}{field-value:id}{DS}';
            }

            $this->addBehavior('Josegonzalez/Upload.Upload', [
                'image' => [
                    'fields' => [
                        'dir' => 'photo_dir',
                        'size' => 'photo_size',
                        'type' => 'photo_type'
                    ],
                    'nameCallback' => function ($table, $entity, $data, $field, $settings) {
                        $extension = pathinfo($data['name'], PATHINFO_EXTENSION);
                        return strtolower(Text::slug($entity['slug'].'.'.$extension, ['preserve' => '.']));
                    },
                    'path' => $link,
                    'transformer' => function (\Cake\Datasource\RepositoryInterface $table, \Cake\Datasource\EntityInterface $entity, $data, $field, $settings) {
                        $extension = pathinfo($data['name'], PATHINFO_EXTENSION);

                        if ($extension != 'svg') {
                            $image_info = getimagesize($data['tmp_name']);
                            
                            if ($image_info[0] <= 500) {
                                $dataReturn[$data['tmp_name']] =  $entity['slug'] . '.' . $extension;
                                
                            }elseif($image_info[0] > 500 && $image_info[0] <= 1920) {
                                $thumbnail = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;

                                $size = new \Imagine\Image\Box(500, 1000);
                                $mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
                                $imagine = new \Imagine\Gd\Imagine();

                                $imagine->open($data['tmp_name'])
                                    ->thumbnail($size, $mode)
                                    ->save($thumbnail);
                                $dataReturn[$data['tmp_name']] =  $entity['slug'] . '.' . $extension;
                                $dataReturn[$thumbnail] =  'thumbnail' . DS . $entity['slug'] . '.' . $extension;
                            }else{
                                $thumbnail = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;

                                $size = new \Imagine\Image\Box(500, 1000);
                                $mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
                                $imagine = new \Imagine\Gd\Imagine();

                                $imagine->open($data['tmp_name'])
                                    ->thumbnail($size, $mode)
                                    ->save($thumbnail);

                                $dataReturn[$thumbnail] =  'thumbnail' . DS . $entity['slug'] . '.' . $extension;

                                $fullHD = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;
                                $size = new \Imagine\Image\Box(1920, 2000);
                                $mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
                                $imagine = new \Imagine\Gd\Imagine();

                                $imagine->open($data['tmp_name'])
                                    ->thumbnail($size, $mode)
                                    ->save($fullHD);

                                $dataReturn[$fullHD] =  $entity['slug'] . '.' . $extension;
                            }
                            return $dataReturn;

                        }else{
                            return [
                                $data['tmp_name'] => $entity['slug'] . '.' . $extension,
                            ];
                        }
                        
                    },
                    'deleteCallback' => function ($path, $entity, $field, $settings) {
                        // When deleting the entity, both the original and the thumbnail will be removed
                        // when keepFilesOnDelete is set to false
                        return [
                            $path . $entity->{$field},
                            $path . '1920-' . $entity->{$field},
                            $path . '500-' . $entity->{$field}
                        ];
                    },

                    // Event affter delete entity
                    'deleteFolder' => true,

                    'keepFilesOnDelete' => false,
                    'restoreValueOnFailure' => true,
                ]
            ]);
        }
        
        
    }
}
