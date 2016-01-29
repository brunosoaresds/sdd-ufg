<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Process Configuration'), ['action' => 'edit', $processConfiguration->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Process Configuration'), ['action' => 'delete', $processConfiguration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $processConfiguration->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Process Configurations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Process Configuration'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Processes'), ['controller' => 'Processes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Process'), ['controller' => 'Processes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="processConfigurations view large-9 medium-8 columns content">
    <h3><?= h($processConfiguration->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($processConfiguration->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Value') ?></th>
            <td><?= h($processConfiguration->value) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Type') ?></th>
            <td><?= h($processConfiguration->data_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($processConfiguration->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($processConfiguration->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Type') ?></h4>
        <?= $this->Text->autoParagraph(h($processConfiguration->type)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Processes') ?></h4>
        <?php if (!empty($processConfiguration->processes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Initial Date') ?></th>
                <th><?= __('Teacher Intent Date') ?></th>
                <th><?= __('Primary Distribution Date') ?></th>
                <th><?= __('Substitute Intent Date') ?></th>
                <th><?= __('Secondary Distribution Date') ?></th>
                <th><?= __('Final Date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($processConfiguration->processes as $processes): ?>
            <tr>
                <td><?= h($processes->id) ?></td>
                <td><?= h($processes->initial_date) ?></td>
                <td><?= h($processes->teacher_intent_date) ?></td>
                <td><?= h($processes->primary_distribution_date) ?></td>
                <td><?= h($processes->substitute_intent_date) ?></td>
                <td><?= h($processes->secondary_distribution_date) ?></td>
                <td><?= h($processes->final_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Processes', 'action' => 'view', $processes->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Processes', 'action' => 'edit', $processes->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Processes', 'action' => 'delete', $processes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $processes->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
