<?php $this->assign('title', 'Cursos'); ?>
<?php $this->start('breadcrumb'); ?>
<li><?= $this->Html->link('<i class="fa fa-dashboard"></i>' . __('Dashboard'), '/', ['escape' => false]) ?></li>
<li><?= $this->Html->link(__('Cursos'), ['action' => 'index']) ?></li>
<li class="active">Adicionar</li>
<?php $this->end(); ?>

<?= $this->Form->create($course) ?>
<div class="row">
    <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Adicionar curso</h3>
            </div>
            <div class="box-body">
                <?php
                echo $this->Form->input('name', ['label' => 'Nome do curso', 'placeholder' => 'Nome do curso']);
                ?>
            </div>
            <div class="box-footer clearfix">
                <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
