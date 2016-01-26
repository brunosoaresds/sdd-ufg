<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Clazzes Teacher'), ['action' => 'edit', $clazzesTeacher->clazz_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Clazzes Teacher'), ['action' => 'delete', $clazzesTeacher->clazz_id], ['confirm' => __('Are you sure you want to delete # {0}?', $clazzesTeacher->clazz_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Clazzes Teachers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clazzes Teacher'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clazzes'), ['controller' => 'Clazzes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clazze'), ['controller' => 'Clazzes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teachers'), ['controller' => 'Teachers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Teacher'), ['controller' => 'Teachers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clazzesTeachers view large-9 medium-8 columns content">
    <h3><?= h($clazzesTeacher->clazz_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Clazze') ?></th>
            <td><?= $clazzesTeacher->has('clazze') ? $this->Html->link($clazzesTeacher->clazze->name, ['controller' => 'Clazzes', 'action' => 'view', $clazzesTeacher->clazze->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Teacher') ?></th>
            <td><?= $clazzesTeacher->has('teacher') ? $this->Html->link($clazzesTeacher->teacher->id, ['controller' => 'Teachers', 'action' => 'view', $clazzesTeacher->teacher->id]) : '' ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Status') ?></h4>
        <?= $this->Text->autoParagraph(h($clazzesTeacher->status)); ?>
    </div>
</div>
