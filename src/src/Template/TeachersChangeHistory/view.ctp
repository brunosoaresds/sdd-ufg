<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Teachers Change History'), ['action' => 'edit', $teachersChangeHistory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Teachers Change History'), ['action' => 'delete', $teachersChangeHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teachersChangeHistory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Teachers Change History'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Teachers Change History'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teachers'), ['controller' => 'Teachers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Teacher'), ['controller' => 'Teachers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="teachersChangeHistory view large-9 medium-8 columns content">
    <h3><?= h($teachersChangeHistory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($teachersChangeHistory->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Registry') ?></th>
            <td><?= h($teachersChangeHistory->registry) ?></td>
        </tr>
        <tr>
            <th><?= __('Url Lattes') ?></th>
            <td><?= h($teachersChangeHistory->url_lattes) ?></td>
        </tr>
        <tr>
            <th><?= __('Formation') ?></th>
            <td><?= h($teachersChangeHistory->formation) ?></td>
        </tr>
        <tr>
            <th><?= __('About') ?></th>
            <td><?= h($teachersChangeHistory->about) ?></td>
        </tr>
        <tr>
            <th><?= __('Rg') ?></th>
            <td><?= h($teachersChangeHistory->rg) ?></td>
        </tr>
        <tr>
            <th><?= __('Cpf') ?></th>
            <td><?= h($teachersChangeHistory->cpf) ?></td>
        </tr>
        <tr>
            <th><?= __('Situation') ?></th>
            <td><?= h($teachersChangeHistory->situation) ?></td>
        </tr>
        <tr>
            <th><?= __('Teacher') ?></th>
            <td><?= $teachersChangeHistory->has('teacher') ? $this->Html->link($teachersChangeHistory->teacher->id, ['controller' => 'Teachers', 'action' => 'view', $teachersChangeHistory->teacher->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($teachersChangeHistory->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Workload') ?></th>
            <td><?= $this->Number->format($teachersChangeHistory->workload) ?></td>
        </tr>
        <tr>
            <th><?= __('Modification Date') ?></th>
            <td><?= h($teachersChangeHistory->modification_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Entry Date') ?></th>
            <td><?= h($teachersChangeHistory->entry_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Birth Date') ?></th>
            <td><?= h($teachersChangeHistory->birth_date) ?></td>
        </tr>
    </table>
</div>
