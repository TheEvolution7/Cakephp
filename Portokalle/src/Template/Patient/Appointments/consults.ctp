<?php 
    $params = $this->request->getParam('pass');
?>

<div class="page2__container">
    <div class="page2__row">
        <div class="page2__col">
            <div class="page6__wrapper">
                <div class="membership-container">
                    <div class="membership-row">
                        <div class="form-build">
                            <ul class="list-unstyled multi-steps">
                                <?php 
                                if ($params[1] == 'confirm' && $session->read('Consults.speciality.type_booking') == 'as_soon_as_possible') {
                                    
                                }else{
                                    unset($list_type[count($list_type) - 1]);
                                }
                                $active = '';
                                foreach ($list_type as $type) {
                                    if (!empty($type['children'])) {
                                        foreach ($type['children'] as $chil) {
                                            if ($params[1] == $chil) {
                                                $active = 'class="is-active"';
                                                break;
                                            }
                                            
                                        }
                                        echo '<li ' . $active . '>' . $type['title'] . '</li>';
                                    }
                                } ?>
                            </ul>
                            <?php
                                echo $this->element('/consults/' . $params[1]);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


