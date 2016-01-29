<?php $this->assign('title', 'Processos de distribuição'); ?>
<?php $this->start('breadcrumb'); ?>
    <li><?= $this->Html->link('<i class="fa fa-dashboard"></i>' . __('Dashboard'), '/', ['escape' => false]) ?></li>
    <li><?= $this->Html->link(__('Processos de distribuição'), ['action' => 'index']) ?></li>
    <li class="active"><?= $process->name ?></li>
<?php $this->end(); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Informações do Processo</h3>
                <div class="pull-right box-tools">
                    <?= $this->Html->link(
                        __('Editar'),
                        ['action' => 'edit', $process->id],
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
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($process->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Data Inicial') ?></th>
                        <td><?= h($process->initial_date) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Data de Intenção do Professor') ?></th>
                        <td><?= h($process->teacher_intent_date) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Data de Distribuição primaria') ?></th>
                        <td><?= h($process->primary_distribution_date) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Data de Distribuição para substitutos') ?></th>
                        <td><?= h($process->substitute_intent_date) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Data de Distribuição secundaria') ?></th>
                        <td><?= h($process->secondary_distribution_date) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Data Final') ?></th>
                        <td><?= h($process->final_date) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
