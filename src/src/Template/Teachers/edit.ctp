<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $teacher->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $teacher->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Teachers'), ['action' => 'index']) ?></li>
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
<div class="teachers form large-9 medium-8 columns content">
    <?= $this->Form->create($teacher) ?>
    <fieldset>
        <legend><?= __('Edit Teacher') ?></legend>
        <?php
            echo $this->Form->input('registry');
            echo $this->Form->input('url_lattes');
            echo $this->Form->input('entry_date');
            echo $this->Form->input('formation');
            echo $this->Form->input('workload');
            echo $this->Form->input('about');
            echo $this->Form->input('rg');
            echo $this->Form->input('cpf');
            echo $this->Form->input('birth_date');
            echo $this->Form->input('situation');
            echo $this->Form->input('clazzes._ids', ['options' => $clazzes]);
            echo $this->Form->input('knowledges._ids', ['options' => $knowledges]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
