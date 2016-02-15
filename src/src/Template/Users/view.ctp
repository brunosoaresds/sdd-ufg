<?php $this->assign('title', 'Usuário: '.$user->id); ?>
<?php $this->start('breadcrumb'); ?>
<li><?= $this->Html->link('<i class="fa fa-dashboard"></i>' . __('Dashboard'), '/', ['escape' => false]) ?></li>
<li><?= $this->Html->link(__('Usuários'), ['action' => 'index']) ?></li>
<li class="active"><?= $user->id ?></li>
<?php $this->end(); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Informações do usuário</h3>
                <div class="pull-right box-tools">
                    <?= $this->Html->link(
                        __('Editar'),
                        ['action' => 'edit', $user->id],
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
                        <td><?= $this->Number->format($user->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Login') ?></th>
                        <td><?= $user->login ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Email') ?></th>
                        <td><?= $user->email ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Nome') ?></th>
                        <td><?= $user->name ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Administrador') ?></th>
                        <td><?= $user->is_admin ? __('Sim') : __('Não'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
