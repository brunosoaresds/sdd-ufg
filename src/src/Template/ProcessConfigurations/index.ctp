<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Process Configuration'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Processes'), ['controller' => 'Processes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Process'), ['controller' => 'Processes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="processConfigurations index large-9 medium-8 columns content">
    <h3><?= __('Process Configurations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('value') ?></th>
                <th><?= $this->Paginator->sort('data_type') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($processConfigurations as $processConfiguration): ?>
            <tr>
                <td><?= $this->Number->format($processConfiguration->id) ?></td>
                <td><?= h($processConfiguration->name) ?></td>
                <td><?= h($processConfiguration->value) ?></td>
                <td><?= h($processConfiguration->data_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $processConfiguration->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $processConfiguration->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $processConfiguration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $processConfiguration->id)]) ?>
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
