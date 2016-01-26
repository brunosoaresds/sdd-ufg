<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Subject'), ['action' => 'edit', $subject->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Subject'), ['action' => 'delete', $subject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subject->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Subjects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subject'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Knowledges'), ['controller' => 'Knowledges', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Knowledge'), ['controller' => 'Knowledges', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clazzes'), ['controller' => 'Clazzes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clazze'), ['controller' => 'Clazzes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="subjects view large-9 medium-8 columns content">
    <h3><?= h($subject->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($subject->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Knowledge') ?></th>
            <td><?= $subject->has('knowledge') ? $this->Html->link($subject->knowledge->name, ['controller' => 'Knowledges', 'action' => 'view', $subject->knowledge->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Course') ?></th>
            <td><?= $subject->has('course') ? $this->Html->link($subject->course->name, ['controller' => 'Courses', 'action' => 'view', $subject->course->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($subject->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Teoric Workload') ?></th>
            <td><?= $this->Number->format($subject->teoric_workload) ?></td>
        </tr>
        <tr>
            <th><?= __('Practical Workload') ?></th>
            <td><?= $this->Number->format($subject->practical_workload) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Clazzes') ?></h4>
        <?php if (!empty($subject->clazzes)): ?>
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
            <?php foreach ($subject->clazzes as $clazzes): ?>
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
