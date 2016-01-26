<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Teacher'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clazzes'), ['controller' => 'Clazzes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clazze'), ['controller' => 'Clazzes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Knowledges'), ['controller' => 'Knowledges', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Knowledge'), ['controller' => 'Knowledges', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="teachers index large-9 medium-8 columns content">
    <h3><?= __('Teachers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('registry') ?></th>
                <th><?= $this->Paginator->sort('url_lattes') ?></th>
                <th><?= $this->Paginator->sort('entry_date') ?></th>
                <th><?= $this->Paginator->sort('formation') ?></th>
                <th><?= $this->Paginator->sort('workload') ?></th>
                <th><?= $this->Paginator->sort('about') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teachers as $teacher): ?>
            <tr>
                <td><?= $this->Number->format($teacher->id) ?></td>
                <td><?= h($teacher->registry) ?></td>
                <td><?= h($teacher->url_lattes) ?></td>
                <td><?= h($teacher->entry_date) ?></td>
                <td><?= h($teacher->formation) ?></td>
                <td><?= $this->Number->format($teacher->workload) ?></td>
                <td><?= h($teacher->about) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $teacher->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $teacher->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $teacher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teacher->id)]) ?>
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
