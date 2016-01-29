<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Clazze'), ['action' => 'edit', $clazze->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Clazze'), ['action' => 'delete', $clazze->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clazze->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Clazzes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clazze'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locals'), ['controller' => 'Locals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Local'), ['controller' => 'Locals', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Processes'), ['controller' => 'Processes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Process'), ['controller' => 'Processes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teachers'), ['controller' => 'Teachers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Teacher'), ['controller' => 'Teachers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clazzes view large-9 medium-8 columns content">
    <h3><?= h($clazze->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($clazze->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Subject') ?></th>
            <td><?= $clazze->has('subject') ? $this->Html->link($clazze->subject->name, ['controller' => 'Subjects', 'action' => 'view', $clazze->subject->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Process') ?></th>
            <td><?= $clazze->has('process') ? $this->Html->link($clazze->process->id, ['controller' => 'Processes', 'action' => 'view', $clazze->process->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($clazze->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Vacancies') ?></th>
            <td><?= $this->Number->format($clazze->vacancies) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Teachers') ?></h4>
        <?php if (!empty($clazze->teachers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Registry') ?></th>
                <th><?= __('Url Lattes') ?></th>
                <th><?= __('Entry Date') ?></th>
                <th><?= __('Formation') ?></th>
                <th><?= __('Workload') ?></th>
                <th><?= __('About') ?></th>
                <th><?= __('Rg') ?></th>
                <th><?= __('Cpf') ?></th>
                <th><?= __('Birth Date') ?></th>
                <th><?= __('Situation') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($clazze->teachers as $teachers): ?>
            <tr>
                <td><?= h($teachers->id) ?></td>
                <td><?= h($teachers->registry) ?></td>
                <td><?= h($teachers->url_lattes) ?></td>
                <td><?= h($teachers->entry_date) ?></td>
                <td><?= h($teachers->formation) ?></td>
                <td><?= h($teachers->workload) ?></td>
                <td><?= h($teachers->about) ?></td>
                <td><?= h($teachers->rg) ?></td>
                <td><?= h($teachers->cpf) ?></td>
                <td><?= h($teachers->birth_date) ?></td>
                <td><?= h($teachers->situation) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Teachers', 'action' => 'view', $teachers->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Teachers', 'action' => 'edit', $teachers->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Teachers', 'action' => 'delete', $teachers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teachers->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
