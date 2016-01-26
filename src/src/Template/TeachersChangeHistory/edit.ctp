<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $teachersChangeHistory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $teachersChangeHistory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Teachers Change History'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Teachers'), ['controller' => 'Teachers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Teacher'), ['controller' => 'Teachers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="teachersChangeHistory form large-9 medium-8 columns content">
    <?= $this->Form->create($teachersChangeHistory) ?>
    <fieldset>
        <legend><?= __('Edit Teachers Change History') ?></legend>
        <?php
            echo $this->Form->input('modification_date');
            echo $this->Form->input('name');
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
            echo $this->Form->input('teacher_id', ['options' => $teachers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
