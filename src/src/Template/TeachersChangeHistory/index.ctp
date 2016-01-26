<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Teachers Change History'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teachers'), ['controller' => 'Teachers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Teacher'), ['controller' => 'Teachers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="teachersChangeHistory index large-9 medium-8 columns content">
    <h3><?= __('Teachers Change History') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('modification_date') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('registry') ?></th>
                <th><?= $this->Paginator->sort('url_lattes') ?></th>
                <th><?= $this->Paginator->sort('entry_date') ?></th>
                <th><?= $this->Paginator->sort('formation') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teachersChangeHistory as $teachersChangeHistory): ?>
            <tr>
                <td><?= $this->Number->format($teachersChangeHistory->id) ?></td>
                <td><?= h($teachersChangeHistory->modification_date) ?></td>
                <td><?= h($teachersChangeHistory->name) ?></td>
                <td><?= h($teachersChangeHistory->registry) ?></td>
                <td><?= h($teachersChangeHistory->url_lattes) ?></td>
                <td><?= h($teachersChangeHistory->entry_date) ?></td>
                <td><?= h($teachersChangeHistory->formation) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $teachersChangeHistory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $teachersChangeHistory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $teachersChangeHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teachersChangeHistory->id)]) ?>
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
