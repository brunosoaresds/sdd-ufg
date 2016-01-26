<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Processes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clazzes'), ['controller' => 'Clazzes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clazze'), ['controller' => 'Clazzes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Process Configurations'), ['controller' => 'ProcessConfigurations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Process Configuration'), ['controller' => 'ProcessConfigurations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="processes form large-9 medium-8 columns content">
    <?= $this->Form->create($process) ?>
    <fieldset>
        <legend><?= __('Add Process') ?></legend>
        <?php
            echo $this->Form->input('initial_date');
            echo $this->Form->input('teacher_intent_date');
            echo $this->Form->input('primary_distribution_date');
            echo $this->Form->input('substitute_intent_date');
            echo $this->Form->input('secondary_distribution_date');
            echo $this->Form->input('final_date');
            echo $this->Form->input('process_configurations._ids', ['options' => $processConfigurations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
