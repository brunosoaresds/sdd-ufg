<?php $this->assign('title', 'Processos de distribuição'); ?>
<?php $this->start('breadcrumb'); ?>
    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
    <li class="active">Here</li>
<?php $this->end(); ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Process'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clazzes'), ['controller' => 'Clazzes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clazze'), ['controller' => 'Clazzes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Process Configurations'), ['controller' => 'ProcessConfigurations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Process Configuration'), ['controller' => 'ProcessConfigurations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="processes index large-9 medium-8 columns content">
    <h3><?= __('Processes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('initial_date') ?></th>
                <th><?= $this->Paginator->sort('teacher_intent_date') ?></th>
                <th><?= $this->Paginator->sort('primary_distribution_date') ?></th>
                <th><?= $this->Paginator->sort('substitute_intent_date') ?></th>
                <th><?= $this->Paginator->sort('secondary_distribution_date') ?></th>
                <th><?= $this->Paginator->sort('final_date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($processes as $process): ?>
            <tr>
                <td><?= $this->Number->format($process->id) ?></td>
                <td><?= h($process->initial_date) ?></td>
                <td><?= h($process->teacher_intent_date) ?></td>
                <td><?= h($process->primary_distribution_date) ?></td>
                <td><?= h($process->substitute_intent_date) ?></td>
                <td><?= h($process->secondary_distribution_date) ?></td>
                <td><?= h($process->final_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $process->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $process->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $process->id], ['confirm' => __('Are you sure you want to delete # {0}?', $process->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
