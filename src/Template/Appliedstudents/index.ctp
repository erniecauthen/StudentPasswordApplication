<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appliedstudent[]|\Cake\Collection\CollectionInterface $appliedstudents
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Appliedstudent'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appliedstudents index large-9 medium-8 columns content">
    <h3><?= __('Appliedstudents') ?></h3>
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
                <th scope="col"><?= $this->Paginator->sort('MAIL') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CAMPUS') ?></th>
                <th scope="col"><?= $this->Paginator->sort('uDCIdentifier') ?></th>
                <th scope="col"><?= $this->Paginator->sort('BIRTHDAY') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bannerId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('AddToGroup') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appliedstudents as $appliedstudent): ?>
            <tr>
                <td><?= h($appliedstudent->PIDM) ?></td>
                <td><?= h($appliedstudent->STUDENT_ID) ?></td>
                <td><?= h($appliedstudent->sAMAccountName) ?></td>
                <td><?= h($appliedstudent->LAST_NAME) ?></td>
                <td><?= h($appliedstudent->FIRST_NAME) ?></td>
                <td><?= h($appliedstudent->MI) ?></td>
                <td><?= h($appliedstudent->MAJR_DESC) ?></td>
                <td><?= h($appliedstudent->MAJR_CODE) ?></td>
                <td><?= h($appliedstudent->UPN) ?></td>
                <td><?= h($appliedstudent->CN) ?></td>
                <td><?= h($appliedstudent->PASSWORD) ?></td>
                <td><?= h($appliedstudent->DISPLAY_NAME) ?></td>
                <td><?= h($appliedstudent->MAIL) ?></td>
                <td><?= h($appliedstudent->CAMPUS) ?></td>
                <td><?= h($appliedstudent->uDCIdentifier) ?></td>
                <td><?= h($appliedstudent->BIRTHDAY) ?></td>
                <td><?= h($appliedstudent->bannerId) ?></td>
                <td><?= h($appliedstudent->AddToGroup) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appliedstudent->PIDM]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appliedstudent->PIDM]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appliedstudent->PIDM], ['confirm' => __('Are you sure you want to delete # {0}?', $appliedstudent->PIDM)]) ?>
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
