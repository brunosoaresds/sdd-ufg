<?php $this->assign('title', 'Processos de distribuição'); ?>
<?php $this->start('breadcrumb'); ?>
    <li><?= $this->Html->link('<i class="fa fa-dashboard"></i>' . __('Dashboard'), '/', ['escape' => false]) ?></li>
    <li class="active">Processos de distribuição</li>
<?php $this->end(); ?>


<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Processos de distribuição</h3>
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
                            <th><?= $this->Paginator->sort('id',__('#ID')) ?></th>
                            <th><?= $this->Paginator->sort('initial_date',__('Data Inicial')) ?></th>
                            <th><?= $this->Paginator->sort('final_date',__('Data Final')) ?></th>
                            <th width="200px"><?= __('Ações') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($processes->isEmpty()): ?>
                            <tr>
                                <td colspan="5" class="text-center">Não existe nenhum processo de distribuição cadastrado</td>
                            </tr>
                        <?php endif; ?>

                        <?php foreach ($processes as $process): ?>
                        <tr>
                            <td><?= $this->Number->format($process->id) ?></td>
                            <td><?= h($process->initial_date) ?></td>
                            <td><?= h($process->final_date) ?></td>
                            <td>
                                <?= $this->Html->link(
                                    '',
                                    ['action' => 'view', $process->id],
                                    [
                                        'title' => __('Visualizar'),
                                        'class' => 'btn btn-sm btn-default glyphicon glyphicon-search',
                                        'data-toggle' => 'tooltip',
                                        'data-original-title' => __('Visualizar'),
                                    ]
                                ) ?>
                                <?= $this->Html->link(
                                    '',
                                    ['action' => 'edit', $process->id],
                                    [
                                        'title' => __('Editar'),
                                        'class' => 'btn btn-sm btn-primary glyphicon glyphicon-pencil',
                                        'data-toggle' => 'tooltip',
                                        'data-original-title' => __('Editar'),
                                    ]
                                ) ?>
                                <?= $this->Form->postLink(
                                    '',
                                    ['action' => 'delete', $process->id],
                                    [
                                        'confirm' => __('Você tem certeza de que deseja remover o processo "{0}"?', $process->id),
                                        'title' => __('Remover'),
                                        'class' => 'btn btn-sm btn-danger glyphicon glyphicon-trash',
                                        'data-toggle' => 'tooltip',
                                        'data-original-title' => __('Remover'),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
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
