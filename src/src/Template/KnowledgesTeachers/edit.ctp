<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $knowledgesTeacher->teacher_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $knowledgesTeacher->teacher_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Knowledges Teachers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Teachers'), ['controller' => 'Teachers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Teacher'), ['controller' => 'Teachers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Knowledges'), ['controller' => 'Knowledges', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Knowledge'), ['controller' => 'Knowledges', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="knowledgesTeachers form large-9 medium-8 columns content">
    <?= $this->Form->create($knowledgesTeacher) ?>
    <fieldset>
        <legend><?= __('Edit Knowledges Teacher') ?></legend>
        <?php
            echo $this->Form->input('level');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
