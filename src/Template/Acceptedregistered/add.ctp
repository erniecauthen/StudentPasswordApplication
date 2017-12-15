<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Acceptedregistered $acceptedregistered
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Acceptedregistered'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="acceptedregistered form large-9 medium-8 columns content">
    <?= $this->Form->create($acceptedregistered) ?>
    <fieldset>
        <legend><?= __('Add Acceptedregistered') ?></legend>
        <?php
            echo $this->Form->control('STUDENT_ID');
            echo $this->Form->control('sAMAccountName');
            echo $this->Form->control('LAST_NAME');
            echo $this->Form->control('FIRST_NAME');
            echo $this->Form->control('MI');
            echo $this->Form->control('MAJR_DESC');
            echo $this->Form->control('MAJR_CODE');
            echo $this->Form->control('UPN');
            echo $this->Form->control('CN');
            echo $this->Form->control('PASSWORD');
            echo $this->Form->control('DISPLAY_NAME');
            echo $this->Form->control('mail');
            echo $this->Form->control('CAMPUS');
            echo $this->Form->control('uDCIdentifier');
            echo $this->Form->control('Birthday');
            echo $this->Form->control('bannerId');
            echo $this->Form->control('AddToGroup');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
