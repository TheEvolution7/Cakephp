<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;


$this->layout = 'error';

if (Configure::read('debug')) :
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.ctp');

    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?php Debugger::dump($error->params) ?>
<?php endif; ?>
<?= $this->element('auto_table_warning') ?>
<?php
if (extension_loaded('xdebug')) :
    xdebug_print_function_stack();
endif;

$this->end();
endif;
?>
<section class="ds section_404 background_cover section_padding_top_150 section_padding_bottom_150">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-md-push-6 text-center">
                <p class="not_found highlight">
                    404
                    <span class="oops grey">Ooops!</span>
                </p>
                <h2>Sorry page not found!</h2>
                <p>
                    <a href="<?= $this->Url->build(['controller' => 'Pages','action' => 'home']) ?>" class="theme_button color1">Back To Home</a>
                </p>
            </div>
        </div>
    </div>
</section>