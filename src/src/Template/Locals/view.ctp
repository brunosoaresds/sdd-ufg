<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Local'), ['action' => 'edit', $local->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Local'), ['action' => 'delete', $local->id], ['confirm' => __('Are you sure you want to delete # {0}?', $local->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Locals'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Local'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clazzes'), ['controller' => 'Clazzes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clazze'), ['controller' => 'Clazzes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="locals view large-9 medium-8 columns content">
    <h3><?= h($local->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($local->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($local->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($local->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Capacity') ?></th>
            <td><?= $this->Number->format($local->capacity) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Clazzes') ?></h4>
        <?php if (!empty($local->clazzes)): ?>
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
            <?php foreach ($local->clazzes as $clazzes): ?>
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
