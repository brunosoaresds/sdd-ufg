<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Knowledges Teacher'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teachers'), ['controller' => 'Teachers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Teacher'), ['controller' => 'Teachers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Knowledges'), ['controller' => 'Knowledges', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Knowledge'), ['controller' => 'Knowledges', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="knowledgesTeachers index large-9 medium-8 columns content">
    <h3><?= __('Knowledges Teachers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('teacher_id') ?></th>
                <th><?= $this->Paginator->sort('knowledge_id') ?></th>
                <th><?= $this->Paginator->sort('level') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($knowledgesTeachers as $knowledgesTeacher): ?>
            <tr>
                <td><?= $knowledgesTeacher->has('teacher') ? $this->Html->link($knowledgesTeacher->teacher->id, ['controller' => 'Teachers', 'action' => 'view', $knowledgesTeacher->teacher->id]) : '' ?></td>
                <td><?= $knowledgesTeacher->has('knowledge') ? $this->Html->link($knowledgesTeacher->knowledge->name, ['controller' => 'Knowledges', 'action' => 'view', $knowledgesTeacher->knowledge->id]) : '' ?></td>
                <td><?= $this->Number->format($knowledgesTeacher->level) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $knowledgesTeacher->teacher_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $knowledgesTeacher->teacher_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $knowledgesTeacher->teacher_id], ['confirm' => __('Are you sure you want to delete # {0}?', $knowledgesTeacher->teacher_id)]) ?>
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
