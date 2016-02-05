<?php $this->assign('title', 'Turma: '.$clazz->displayName); ?>
<?php $this->start('breadcrumb'); ?>
<li><?= $this->Html->link('<i class="fa fa-dashboard"></i>' . __('Dashboard'), '/', ['escape' => false]) ?></li>
<li><?= $this->Html->link(__('Turmas'), ['action' => 'index']) ?></li>
<li class="active"><?= $clazz->displayName ?></li>
<?php $this->end(); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Informações da turma</h3>
                <div class="pull-right box-tools">
                    <?= $this->Html->link(
                        __('Editar'),
                        ['action' => 'edit', $clazz->id],
                        [
                            'data-toggle' => 'tooltip',
                            'data-original-title' => __('Editar'),
                            'class' => 'btn btn-sm btn-primary'
                        ]
                    );
                    ?>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-striped table-valign-middle">
                    <tr>
                        <th><?= __('Status') ?></th>
                        <td><?= $clazz->displayStatus ?></td>
                    </tr>
                    <tr>
                        <th><?= __('#ID') ?></th>
                        <td><?= $this->Number->format($clazz->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Nome') ?></th>
                        <td><?= h($clazz->name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Processo de distribuição') ?></th>
                        <td><?= $clazz->has('process') ? $this->Html->link($clazz->process->name, ['controller' => 'Processes', 'action' => 'view', $clazz->process->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Disciplina') ?></th>
                        <td><?= $clazz->has('subject') ? $this->Html->link($clazz->subject->name, ['controller' => 'Subjects', 'action' => 'view', $clazz->subject->id]) : '' ?></td>
                    </tr>
                    <?php if(!empty($clazz->selectedTeachers)): ?>
                    <tr>
                        <th><?= __('Docentes selecionados') ?></th>
                        <td>
                            <?php
                            $index = 0;
                            foreach($clazz->selectedTeachers as $teacher) {
                                if($index > 0) {
                                    echo "<br>";
                                }
                                echo $this->Html->link($teacher->user->name, ['controller' => 'Teachers', 'action' => 'view', $teacher->id]);
                                $index++;
                            }
                            ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Locais/Horários de aula</h3>
            </div>

            <div class="box-body">
                <div class="content week-box">
                    <?php
                    $index = 0;
                    foreach($this->Utils->daysOfWeek() as $week_day => $name):
                        if(!is_numeric($week_day) || $week_day < 2) {
                            continue;
                        }

                        if(($index % 3) == 0) {
                            if($index != 0) {
                                echo '</div>';
                            }
                            echo '<div class="row">';
                        }
                        $index++;
                        ?>
                        <div class="col-sm-4 week-day-box">
                            <div class="week-title"><?= h($name) ?></div>
                            <div class="week-day" data-week-day="<?= $week_day ?>">
                                <?php foreach ($clazz->scheduleLocals as $scheduledLocal): ?>
                                    <?php if($scheduledLocal->week_day == $week_day): ?>
                                        <div class="label label-primary schedule-data-div">
                                            <span class="text-ellipsis" style="max-width: calc(100% - 15px);">
                                                <?= $scheduledLocal->schedule->period ?>: <?= $scheduledLocal->local->fullPath ?>
                                            </span>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Docentes inscritos para ministrar a turma</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                        <tr>
                            <th><?= __('#ID') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Índice de prioridade') ?></th>
                            <th><?= __('Status') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(empty($clazz->intents)): ?>
                            <tr>
                                <td colspan="4" class="text-center">Essa turma não possui nenhuma inscrição</td>
                            </tr>
                        <?php else: ?>
                        <?php foreach ($clazz->intents as $intent): ?>
                            <tr>
                                <td><?= $this->Number->format($intent->teacher_id) ?></td>
                                <td><?= $this->Html->link($intent->teacher->user->name, ['controller' => 'Teachers', 'action' => 'view', $intent->teacher_id]) ?></td>
                                <td><?= $intent->priority ?></td>
                                <td><?= $intent->displayStatus ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
