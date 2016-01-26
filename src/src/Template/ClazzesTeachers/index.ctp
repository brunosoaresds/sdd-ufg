<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Clazzes Teacher'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clazzes'), ['controller' => 'Clazzes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clazze'), ['controller' => 'Clazzes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teachers'), ['controller' => 'Teachers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Teacher'), ['controller' => 'Teachers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clazzesTeachers index large-9 medium-8 columns content">
    <h3><?= __('Clazzes Teachers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('clazz_id') ?></th>
                <th><?= $this->Paginator->sort('teacher_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clazzesTeachers as $clazzesTeacher): ?>
            <tr>
                <td><?= $clazzesTeacher->has('clazze') ? $this->Html->link($clazzesTeacher->clazze->name, ['controller' => 'Clazzes', 'action' => 'view', $clazzesTeacher->clazze->id]) : '' ?></td>
                <td><?= $clazzesTeacher->has('teacher') ? $this->Html->link($clazzesTeacher->teacher->id, ['controller' => 'Teachers', 'action' => 'view', $clazzesTeacher->teacher->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $clazzesTeacher->clazz_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clazzesTeacher->clazz_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clazzesTeacher->clazz_id], ['confirm' => __('Are you sure you want to delete # {0}?', $clazzesTeacher->clazz_id)]) ?>
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
