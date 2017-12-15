<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Acceptedregistered[]|\Cake\Collection\CollectionInterface $acceptedregistered
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Acceptedregistered'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="acceptedregistered index large-9 medium-8 columns content">
    <h3><?= __('Acceptedregistered') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('PIDM') ?></th>
                <th scope="col"><?= $this->Paginator->sort('STUDENT_ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sAMAccountName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('LAST_NAME') ?></th>
                <th scope="col"><?= $this->Paginator->sort('FIRST_NAME') ?></th>
                <th scope="col"><?= $this->Paginator->sort('MI') ?></th>
                <th scope="col"><?= $this->Paginator->sort('MAJR_DESC') ?></th>
                <th scope="col"><?= $this->Paginator->sort('MAJR_CODE') ?></th>
                <th scope="col"><?= $this->Paginator->sort('UPN') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CN') ?></th>
                <th scope="col"><?= $this->Paginator->sort('PASSWORD') ?></th>
                <th scope="col"><?= $this->Paginator->sort('DISPLAY_NAME') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mail') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CAMPUS') ?></th>
                <th scope="col"><?= $this->Paginator->sort('uDCIdentifier') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Birthday') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bannerId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('AddToGroup') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($acceptedregistered as $acceptedregistered): ?>
            <tr>
                <td><?= h($acceptedregistered->PIDM) ?></td>
                <td><?= h($acceptedregistered->STUDENT_ID) ?></td>
                <td><?= h($acceptedregistered->sAMAccountName) ?></td>
                <td><?= h($acceptedregistered->LAST_NAME) ?></td>
                <td><?= h($acceptedregistered->FIRST_NAME) ?></td>
                <td><?= h($acceptedregistered->MI) ?></td>
                <td><?= h($acceptedregistered->MAJR_DESC) ?></td>
                <td><?= h($acceptedregistered->MAJR_CODE) ?></td>
                <td><?= h($acceptedregistered->UPN) ?></td>
                <td><?= h($acceptedregistered->CN) ?></td>
                <td><?= h($acceptedregistered->PASSWORD) ?></td>
                <td><?= h($acceptedregistered->DISPLAY_NAME) ?></td>
                <td><?= h($acceptedregistered->mail) ?></td>
                <td><?= h($acceptedregistered->CAMPUS) ?></td>
                <td><?= h($acceptedregistered->uDCIdentifier) ?></td>
                <td><?= h($acceptedregistered->Birthday) ?></td>
                <td><?= h($acceptedregistered->bannerId) ?></td>
                <td><?= h($acceptedregistered->AddToGroup) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $acceptedregistered->PIDM]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $acceptedregistered->PIDM]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $acceptedregistered->PIDM], ['confirm' => __('Are you sure you want to delete # {0}?', $acceptedregistered->PIDM)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
