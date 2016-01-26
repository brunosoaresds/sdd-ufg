<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Teacher'), ['action' => 'edit', $teacher->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Teacher'), ['action' => 'delete', $teacher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teacher->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Teachers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Teacher'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clazzes'), ['controller' => 'Clazzes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clazze'), ['controller' => 'Clazzes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Knowledges'), ['controller' => 'Knowledges', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Knowledge'), ['controller' => 'Knowledges', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="teachers view large-9 medium-8 columns content">
    <h3><?= h($teacher->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Registry') ?></th>
            <td><?= h($teacher->registry) ?></td>
        </tr>
        <tr>
            <th><?= __('Url Lattes') ?></th>
            <td><?= h($teacher->url_lattes) ?></td>
        </tr>
        <tr>
            <th><?= __('Formation') ?></th>
            <td><?= h($teacher->formation) ?></td>
        </tr>
        <tr>
            <th><?= __('About') ?></th>
            <td><?= h($teacher->about) ?></td>
        </tr>
        <tr>
            <th><?= __('Rg') ?></th>
            <td><?= h($teacher->rg) ?></td>
        </tr>
        <tr>
            <th><?= __('Cpf') ?></th>
            <td><?= h($teacher->cpf) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($teacher->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Workload') ?></th>
            <td><?= $this->Number->format($teacher->workload) ?></td>
        </tr>
        <tr>
            <th><?= __('Entry Date') ?></th>
            <td><?= h($teacher->entry_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Birth Date') ?></th>
            <td><?= h($teacher->birth_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Situation') ?></h4>
        <?= $this->Text->autoParagraph(h($teacher->situation)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Roles') ?></h4>
        <?php if (!empty($teacher->roles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Teacher Id') ?></th>
                <th><?= __('Knowledge Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($teacher->roles as $roles): ?>
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
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($teacher->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Login') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('Is Admin') ?></th>
                <th><?= __('Teacher Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($teacher->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->login) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->name) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->is_admin) ?></td>
                <td><?= h($users->teacher_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Clazzes') ?></h4>
        <?php if (!empty($teacher->clazzes)): ?>
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
            <?php foreach ($teacher->clazzes as $clazzes): ?>
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
        <h4><?= __('Related Knowledges') ?></h4>
        <?php if (!empty($teacher->knowledges)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($teacher->knowledges as $knowledges): ?>
            <tr>
                <td><?= h($knowledges->id) ?></td>
                <td><?= h($knowledges->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Knowledges', 'action' => 'view', $knowledges->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Knowledges', 'action' => 'edit', $knowledges->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Knowledges', 'action' => 'delete', $knowledges->id], ['confirm' => __('Are you sure you want to delete # {0}?', $knowledges->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>