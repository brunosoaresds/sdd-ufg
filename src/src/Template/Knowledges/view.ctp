<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Knowledge'), ['action' => 'edit', $knowledge->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Knowledge'), ['action' => 'delete', $knowledge->id], ['confirm' => __('Are you sure you want to delete # {0}?', $knowledge->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Knowledges'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Knowledge'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teachers'), ['controller' => 'Teachers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Teacher'), ['controller' => 'Teachers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="knowledges view large-9 medium-8 columns content">
    <h3><?= h($knowledge->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($knowledge->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($knowledge->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Roles') ?></h4>
        <?php if (!empty($knowledge->roles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Teacher Id') ?></th>
                <th><?= __('Knowledge Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($knowledge->roles as $roles): ?>
            <tr>
                <td><?= h($roles->id) ?></td>
                <td><?= h($roles->type) ?></td>
                <td><?= h($roles->teacher_id) ?></td>
                <td><?= h($roles->knowledge_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Roles', 'action' => 'view', $roles->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Roles', 'action' => 'edit', $roles->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Roles', 'action' => 'delete', $roles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roles->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Subjects') ?></h4>
        <?php if (!empty($knowledge->subjects)): ?>
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
            <?php foreach ($knowledge->subjects as $subjects): ?>
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
    <div class="related">
        <h4><?= __('Related Teachers') ?></h4>
        <?php if (!empty($knowledge->teachers)): ?>
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
            <?php foreach ($knowledge->teachers as $teachers): ?>
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
