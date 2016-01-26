<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $local->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $local->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Locals'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clazzes'), ['controller' => 'Clazzes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clazze'), ['controller' => 'Clazzes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="locals form large-9 medium-8 columns content">
    <?= $this->Form->create($local) ?>
    <fieldset>
        <legend><?= __('Edit Local') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('address');
            echo $this->Form->input('capacity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
