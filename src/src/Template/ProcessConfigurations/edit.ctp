<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $processConfiguration->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $processConfiguration->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Process Configurations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Processes'), ['controller' => 'Processes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Process'), ['controller' => 'Processes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="processConfigurations form large-9 medium-8 columns content">
    <?= $this->Form->create($processConfiguration) ?>
    <fieldset>
        <legend><?= __('Edit Process Configuration') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('value');
            echo $this->Form->input('data_type');
            echo $this->Form->input('type');
            echo $this->Form->input('processes._ids', ['options' => $processes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
