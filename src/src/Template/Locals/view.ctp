<?php $this->assign('title', 'Local: '.$local->name); ?>
<?php $this->start('breadcrumb'); ?>
    <li><?= $this->Html->link('<i class="fa fa-dashboard"></i>' . __('Dashboard'), '/', ['escape' => false]) ?></li>
    <li><?= $this->Html->link(__('Locais'), ['action' => 'index']) ?></li>
    <li class="active"><?= $local->name ?></li>
<?php $this->end(); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Informações da local</h3>
                <div class="pull-right box-tools">
                    <?= $this->Html->link(
                        __('Editar'),
                        ['action' => 'edit', $local->id],
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
                        <th><?= __('#ID') ?></th>
                        <td><?= $this->Number->format($local->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Nome') ?></th>
                        <td><?= h($local->name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Localização') ?></th>
                        <td><?= h($local->address) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Capacidade') ?></th>
                        <td><?= $this->Number->format($local->capacity) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Turmas do local</h3>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-striped table-valign-middle">
                    <thead>
                    <tr>
                        <th><?= __('#ID') ?></th>
                        <th><?= __('Nome') ?></th>
                        <th><?= __('Vagas') ?></th>
                        <th><?= __('Processo de distribuição') ?></th>
                        <th width="200px"><?= __('Ações') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(count($local->clazzes) < 1): ?>
                        <tr>
                            <td colspan="6" class="text-center">Essa local não possui nenhuma turma associada</td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach ($clazzesSchedulesLocals as $clazzesSchedulesLocal): ?>
                        <tr>
                            <td><?= h($clazzesSchedulesLocal->clazz->id) ?></td>
                            <td><?= h($clazzesSchedulesLocal->clazz->name) ?></td>
                            <td><?= h($clazzesSchedulesLocal->clazz->vacancies) ?></td>
                            <td><?= h($clazzesSchedulesLocal->clazz->process->name) ?></td>
                            <td>
                                <?= $this->Html->link(
                                    '',
                                    ['controller' => 'Clazzes', 'action' => 'view', $clazz->id],
                                    [
                                        'title' => __('Visualizar'),
                                        'class' => 'btn btn-sm btn-default glyphicon glyphicon-search',
                                        'data-toggle' => 'tooltip',
                                        'data-original-title' => __('Visualizar'),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
