<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Processes Process Configuration'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Processes'), ['controller' => 'Processes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Process'), ['controller' => 'Processes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Process Configurations'), ['controller' => 'ProcessConfigurations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Process Configuration'), ['controller' => 'ProcessConfigurations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="processesProcessConfigurations index large-9 medium-8 columns content">
    <h3><?= __('Processes Process Configurations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('process_id') ?></th>
                <th><?= $this->Paginator->sort('process_configuration_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($processesProcessConfigurations as $processesProcessConfiguration): ?>
            <tr>
                <td><?= $processesProcessConfiguration->has('process') ? $this->Html->link($processesProcessConfiguration->process->id, ['controller' => 'Processes', 'action' => 'view', $processesProcessConfiguration->process->id]) : '' ?></td>
                <td><?= $processesProcessConfiguration->has('process_configuration') ? $this->Html->link($processesProcessConfiguration->process_configuration->name, ['controller' => 'ProcessConfigurations', 'action' => 'view', $processesProcessConfiguration->process_configuration->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $processesProcessConfiguration->process_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $processesProcessConfiguration->process_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $processesProcessConfiguration->process_id], ['confirm' => __('Are you sure you want to delete # {0}?', $processesProcessConfiguration->process_id)]) ?>
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
