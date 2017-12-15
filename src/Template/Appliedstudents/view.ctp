<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appliedstudent $appliedstudent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Appliedstudent'), ['action' => 'edit', $appliedstudent->PIDM]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Appliedstudent'), ['action' => 'delete', $appliedstudent->PIDM], ['confirm' => __('Are you sure you want to delete # {0}?', $appliedstudent->PIDM)]) ?> </li>
        <li><?= $this->Html->link(__('List Appliedstudents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Appliedstudent'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appliedstudents view large-9 medium-8 columns content">
    <h3><?= h($appliedstudent->PIDM) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('PIDM') ?></th>
            <td><?= h($appliedstudent->PIDM) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('STUDENT ID') ?></th>
            <td><?= h($appliedstudent->STUDENT_ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SAMAccountName') ?></th>
            <td><?= h($appliedstudent->sAMAccountName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LAST NAME') ?></th>
            <td><?= h($appliedstudent->LAST_NAME) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FIRST NAME') ?></th>
            <td><?= h($appliedstudent->FIRST_NAME) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MI') ?></th>
            <td><?= h($appliedstudent->MI) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MAJR DESC') ?></th>
            <td><?= h($appliedstudent->MAJR_DESC) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MAJR CODE') ?></th>
            <td><?= h($appliedstudent->MAJR_CODE) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UPN') ?></th>
            <td><?= h($appliedstudent->UPN) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CN') ?></th>
            <td><?= h($appliedstudent->CN) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PASSWORD') ?></th>
            <td><?= h($appliedstudent->PASSWORD) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DISPLAY NAME') ?></th>
            <td><?= h($appliedstudent->DISPLAY_NAME) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MAIL') ?></th>
            <td><?= h($appliedstudent->MAIL) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CAMPUS') ?></th>
            <td><?= h($appliedstudent->CAMPUS) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UDCIdentifier') ?></th>
            <td><?= h($appliedstudent->uDCIdentifier) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BIRTHDAY') ?></th>
            <td><?= h($appliedstudent->BIRTHDAY) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BannerId') ?></th>
            <td><?= h($appliedstudent->bannerId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('AddToGroup') ?></th>
            <td><?= h($appliedstudent->AddToGroup) ?></td>
        </tr>
    </table>
</div>
