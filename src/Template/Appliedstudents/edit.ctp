<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appliedstudent $appliedstudent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $appliedstudent->PIDM],
                ['confirm' => __('Are you sure you want to delete # {0}?', $appliedstudent->PIDM)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Appliedstudents'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="appliedstudents form large-9 medium-8 columns content">
    <?= $this->Form->create($appliedstudent) ?>
    <fieldset>
        <legend><?= __('Edit Appliedstudent') ?></legend>
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
            echo $this->Form->control('MAIL');
            echo $this->Form->control('CAMPUS');
            echo $this->Form->control('uDCIdentifier');
            echo $this->Form->control('BIRTHDAY');
            echo $this->Form->control('bannerId');
            echo $this->Form->control('AddToGroup');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
