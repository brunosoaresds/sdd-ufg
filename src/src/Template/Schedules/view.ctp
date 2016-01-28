<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Schedule'), ['action' => 'edit', $schedule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Schedule'), ['action' => 'delete', $schedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Schedules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schedule'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clazzes'), ['controller' => 'Clazzes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clazze'), ['controller' => 'Clazzes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="schedules view large-9 medium-8 columns content">
    <h3><?= h($schedule->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($schedule->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($schedule->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Initial Time') ?></th>
            <td><?= h($schedule->initial_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Final Time') ?></th>
            <td><?= h($schedule->final_time) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Clazzes') ?></h4>
        <?php if (!empty($schedule->clazzes)): ?>
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
            <?php foreach ($schedule->clazzes as $clazzes): ?>
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
</div>
