<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Acceptedregistered $acceptedregistered
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Acceptedregistered'), ['action' => 'edit', $acceptedregistered->PIDM]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Acceptedregistered'), ['action' => 'delete', $acceptedregistered->PIDM], ['confirm' => __('Are you sure you want to delete # {0}?', $acceptedregistered->PIDM)]) ?> </li>
        <li><?= $this->Html->link(__('List Acceptedregistered'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Acceptedregistered'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="acceptedregistered view large-9 medium-8 columns content">
    <h3><?= h($acceptedregistered->PIDM) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('PIDM') ?></th>
            <td><?= h($acceptedregistered->PIDM) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('STUDENT ID') ?></th>
            <td><?= h($acceptedregistered->STUDENT_ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SAMAccountName') ?></th>
            <td><?= h($acceptedregistered->sAMAccountName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LAST NAME') ?></th>
            <td><?= h($acceptedregistered->LAST_NAME) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FIRST NAME') ?></th>
            <td><?= h($acceptedregistered->FIRST_NAME) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MI') ?></th>
            <td><?= h($acceptedregistered->MI) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MAJR DESC') ?></th>
            <td><?= h($acceptedregistered->MAJR_DESC) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MAJR CODE') ?></th>
            <td><?= h($acceptedregistered->MAJR_CODE) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UPN') ?></th>
            <td><?= h($acceptedregistered->UPN) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CN') ?></th>
            <td><?= h($acceptedregistered->CN) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PASSWORD') ?></th>
            <td><?= h($acceptedregistered->PASSWORD) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DISPLAY NAME') ?></th>
            <td><?= h($acceptedregistered->DISPLAY_NAME) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mail') ?></th>
            <td><?= h($acceptedregistered->mail) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CAMPUS') ?></th>
            <td><?= h($acceptedregistered->CAMPUS) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UDCIdentifier') ?></th>
            <td><?= h($acceptedregistered->uDCIdentifier) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birthday') ?></th>
            <td><?= h($acceptedregistered->Birthday) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BannerId') ?></th>
            <td><?= h($acceptedregistered->bannerId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('AddToGroup') ?></th>
            <td><?= h($acceptedregistered->AddToGroup) ?></td>
        </tr>
    </table>
</div>
