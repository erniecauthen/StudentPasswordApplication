<?php
use Cake\Utility\Inflector;
use Cake\Core\Configure;

?>
<div class='window_reset_password'>
    <div class='header'>
        <span class="icon_wrap">
            <img src='/img/atc_logo_40.png' class='atclogo'/>
        </span>
        <span class='college_name'>Atlanta Technical College</span>
    </div>
    <div class="content_area">
        <div class="content step_<?= $this->request->params['action']; ?>">
            <?= $this->fetch('content') ?>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
