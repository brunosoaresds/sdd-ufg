<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Course'), ['action' => 'edit', $course->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Course'), ['action' => 'delete', $course->id], ['confirm' => __('Are you sure you want to delete # {0}?', $course->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="courses view large-9 medium-8 columns content">
    <h3><?= h($course->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($course->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($course->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Subjects') ?></h4>
        <?php if (!empty($course->subjects)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Teoric Workload') ?></th>
                <th><?= __('Practical Workload') ?></th>
                <th><?= __('Knowledge Id') ?></th>
                <th><?= __('Course Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($course->subjects as $subjects): ?>
            <tr>
                <td><?= h($subjects->id) ?></td>
                <td><?= h($subjects->name) ?></td>
                <td><?= h($subjects->teoric_workload) ?></td>
                <td><?= h($subjects->practical_workload) ?></td>
                <td><?= h($subjects->knowledge_id) ?></td>
                <td><?= h($subjects->course_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Subjects', 'action' => 'view', $subjects->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Subjects', 'action' => 'edit', $subjects->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Subjects', 'action' => 'delete', $subjects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subjects->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
