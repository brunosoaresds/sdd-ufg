<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Knowledges Teacher'), ['action' => 'edit', $knowledgesTeacher->teacher_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Knowledges Teacher'), ['action' => 'delete', $knowledgesTeacher->teacher_id], ['confirm' => __('Are you sure you want to delete # {0}?', $knowledgesTeacher->teacher_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Knowledges Teachers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Knowledges Teacher'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teachers'), ['controller' => 'Teachers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Teacher'), ['controller' => 'Teachers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Knowledges'), ['controller' => 'Knowledges', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Knowledge'), ['controller' => 'Knowledges', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="knowledgesTeachers view large-9 medium-8 columns content">
    <h3><?= h($knowledgesTeacher->teacher_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Teacher') ?></th>
            <td><?= $knowledgesTeacher->has('teacher') ? $this->Html->link($knowledgesTeacher->teacher->id, ['controller' => 'Teachers', 'action' => 'view', $knowledgesTeacher->teacher->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Knowledge') ?></th>
            <td><?= $knowledgesTeacher->has('knowledge') ? $this->Html->link($knowledgesTeacher->knowledge->name, ['controller' => 'Knowledges', 'action' => 'view', $knowledgesTeacher->knowledge->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Level') ?></th>
            <td><?= $this->Number->format($knowledgesTeacher->level) ?></td>
        </tr>
    </table>
</div>
