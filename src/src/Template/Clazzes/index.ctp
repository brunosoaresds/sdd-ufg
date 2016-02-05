<?php $this->assign('title', 'Turmas'); ?>
<?php $this->start('breadcrumb'); ?>
<li><?= $this->Html->link('<i class="fa fa-dashboard"></i>' . __('Dashboard'), '/', ['escape' => false]) ?></li>
<li class="active">Lista de turmas</li>
<?php $this->end(); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Lista de turmas</h3>
                <div class="pull-right box-tools">
                    <?= $this->Html->link(
                        '<i class="fa fa-plus-circle"></i> ' . __('Adicionar'),
                        ['action' => 'add'],
                        [
                            'escape' => false,
                            'data-toggle' => 'tooltip',
                            'data-original-title' => __('Adicionar'),
                            'class' => 'btn btn-sm btn-primary'
                        ]
                    );
                    ?>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-striped table-valign-middle">
                    <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id', __('#ID')) ?></th>
                        <th><?= $this->Paginator->sort('process_id', __('Processo de distribuição')) ?></th>
                        <th><?= $this->Paginator->sort('name', __('Nome')) ?></th>
                        <th><?= $this->Paginator->sort('vacancies', __('N° de vagas')) ?></th>
                        <th><?= $this->Paginator->sort('subject_id', __('Disciplina')) ?></th>
                        <th><?= __('Status') ?></th>
                        <th width="200px"><?= __('Ações') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if($clazzes->isEmpty()): ?>
                        <tr>
                            <td colspan="7" class="text-center">Não existe nenhuma turma cadastrada</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($clazzes as $clazz): ?>
                            <tr>
                                <td><?= $this->Number->format($clazz->id) ?></td>
                                <td><?= $clazz->has('process') ? $this->Html->link($clazz->process->name, ['controller' => 'Processes', 'action' => 'view', $clazz->process->id]) : '' ?></td>
                                <td><?= h($clazz->name) ?></td>
                                <td><?= h($clazz->vacancies) ?></td>
                                <td><?= $clazz->has('subject') ? $this->Html->link($clazz->subject->name, ['controller' => 'Subjects', 'action' => 'view', $clazz->subject->id]) : '' ?></td>
                                <td><?= $clazz->displayStatus ?></td>
                                <td>
                                    <?= $this->Html->link(
                                        '',
                                        ['action' => 'view', $clazz->id],
                                        [
                                            'title' => __('Visualizar'),
                                            'class' => 'btn btn-sm btn-default glyphicon glyphicon-search',
                                            'data-toggle' => 'tooltip',
                                            'data-original-title' => __('Visualizar'),
                                        ]
                                    ) ?>
                                    <?= $this->Html->link(
                                        '',
                                        ['action' => 'edit', $clazz->id],
                                        [
                                            'title' => __('Editar'),
                                            'class' => 'btn btn-sm btn-primary glyphicon glyphicon-pencil',
                                            'data-toggle' => 'tooltip',
                                            'data-original-title' => __('Editar'),
                                        ]
                                    ) ?>
                                    <?= $this->Form->postLink(
                                        '',
                                        ['action' => 'delete', $clazz->id],
                                        [
                                            'confirm' => __('Você tem certeza de que deseja remover a turma "{0}/{1}"?', $clazz->name, $clazz->process->name),
                                            'title' => __('Remover'),
                                            'class' => 'btn btn-sm btn-danger glyphicon glyphicon-trash',
                                            'data-toggle' => 'tooltip',
                                            'data-original-title' => __('Remover'),
                                        ]
                                    ) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <?= $this->Paginator->prev('«') ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next('»') ?>
                </ul>
            </div>
        </div>
    </div>
</div>
