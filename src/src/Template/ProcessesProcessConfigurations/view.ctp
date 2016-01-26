<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Processes Process Configuration'), ['action' => 'edit', $processesProcessConfiguration->process_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Processes Process Configuration'), ['action' => 'delete', $processesProcessConfiguration->process_id], ['confirm' => __('Are you sure you want to delete # {0}?', $processesProcessConfiguration->process_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Processes Process Configurations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Processes Process Configuration'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Processes'), ['controller' => 'Processes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Process'), ['controller' => 'Processes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Process Configurations'), ['controller' => 'ProcessConfigurations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Process Configuration'), ['controller' => 'ProcessConfigurations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="processesProcessConfigurations view large-9 medium-8 columns content">
    <h3><?= h($processesProcessConfiguration->process_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Process') ?></th>
            <td><?= $processesProcessConfiguration->has('process') ? $this->Html->link($processesProcessConfiguration->process->id, ['controller' => 'Processes', 'action' => 'view', $processesProcessConfiguration->process->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Process Configuration') ?></th>
            <td><?= $processesProcessConfiguration->has('process_configuration') ? $this->Html->link($processesProcessConfiguration->process_configuration->name, ['controller' => 'ProcessConfigurations', 'action' => 'view', $processesProcessConfiguration->process_configuration->id]) : '' ?></td>
        </tr>
    </table>
</div>
