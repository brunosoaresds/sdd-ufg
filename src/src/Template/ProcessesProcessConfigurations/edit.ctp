<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $processesProcessConfiguration->process_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $processesProcessConfiguration->process_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Processes Process Configurations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Processes'), ['controller' => 'Processes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Process'), ['controller' => 'Processes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Process Configurations'), ['controller' => 'ProcessConfigurations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Process Configuration'), ['controller' => 'ProcessConfigurations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="processesProcessConfigurations form large-9 medium-8 columns content">
    <?= $this->Form->create($processesProcessConfiguration) ?>
    <fieldset>
        <legend><?= __('Edit Processes Process Configuration') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
