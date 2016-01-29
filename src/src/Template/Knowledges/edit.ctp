<?php $this->assign('title', 'Núcleos de conhecimento'); ?>
<?php $this->start('breadcrumb'); ?>
<li><?= $this->Html->link('<i class="fa fa-dashboard"></i>' . __('Dashboard'), '/', ['escape' => false]) ?></li>
<li><?= $this->Html->link(__('Núcleos de conhecimento'), ['action' => 'index']) ?></li>
<li class="active">Editar #<?= $knowledge->id ?></li>
<?php $this->end(); ?>

<?= $this->Form->create($knowledge) ?>
<div class="row">
    <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editar núcleo de conhecimento #<?= $knowledge->id ?></h3>
            </div>
            <div class="box-body">
                <?php
                    echo $this->Form->input('name', ['label' => 'Nome do núcleo de conhecimento', 'placeholder' => 'Nome']);
                ?>
            </div>
            <div class="box-footer clearfix">
                <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
