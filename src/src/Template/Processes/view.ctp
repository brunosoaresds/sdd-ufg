<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Process'), ['action' => 'edit', $process->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Process'), ['action' => 'delete', $process->id], ['confirm' => __('Are you sure you want to delete # {0}?', $process->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Processes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Process'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clazzes'), ['controller' => 'Clazzes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clazze'), ['controller' => 'Clazzes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Process Configurations'), ['controller' => 'ProcessConfigurations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Process Configuration'), ['controller' => 'ProcessConfigurations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="processes view large-9 medium-8 columns content">
    <h3><?= h($process->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($process->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Initial Date') ?></th>
            <td><?= h($process->initial_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Teacher Intent Date') ?></th>
            <td><?= h($process->teacher_intent_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Primary Distribution Date') ?></th>
            <td><?= h($process->primary_distribution_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Substitute Intent Date') ?></th>
            <td><?= h($process->substitute_intent_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Secondary Distribution Date') ?></th>
            <td><?= h($process->secondary_distribution_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Final Date') ?></th>
            <td><?= h($process->final_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Clazzes') ?></h4>
        <?php if (!empty($process->clazzes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Vacancies') ?></th>
                <th><?= __('Subject Id') ?></th>
                <th><?= __('Schedule Id') ?></th>
                <th><?= __('Local Id') ?></th>
                <th><?= __('Process Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($process->clazzes as $clazzes): ?>
            <tr>
                <td><?= h($clazzes->id) ?></td>
                <td><?= h($clazzes->name) ?></td>
                <td><?= h($clazzes->vacancies) ?></td>
                <td><?= h($clazzes->subject_id) ?></td>
                <td><?= h($clazzes->schedule_id) ?></td>
                <td><?= h($clazzes->local_id) ?></td>
                <td><?= h($clazzes->process_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Clazzes', 'action' => 'view', $clazzes->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Clazzes', 'action' => 'edit', $clazzes->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clazzes', 'action' => 'delete', $clazzes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clazzes->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Process Configurations') ?></h4>
        <?php if (!empty($process->process_configurations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Value') ?></th>
                <th><?= __('Data Type') ?></th>
                <th><?= __('Type') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($process->process_configurations as $processConfigurations): ?>
            <tr>
                <td><?= h($processConfigurations->id) ?></td>
                <td><?= h($processConfigurations->name) ?></td>
                <td><?= h($processConfigurations->description) ?></td>
                <td><?= h($processConfigurations->value) ?></td>
                <td><?= h($processConfigurations->data_type) ?></td>
                <td><?= h($processConfigurations->type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProcessConfigurations', 'action' => 'view', $processConfigurations->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProcessConfigurations', 'action' => 'edit', $processConfigurations->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProcessConfigurations', 'action' => 'delete', $processConfigurations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $processConfigurations->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
