<?php $this->assign('title', 'Processos'); ?>
<?php $this->start('breadcrumb'); ?>
    <li><?= $this->Html->link('<i class="fa fa-dashboard"></i>' . __('Dashboard'), '/', ['escape' => false]) ?></li>
    <li><?= $this->Html->link(__('Processos'), ['action' => 'index']) ?></li>
    <li class="active">Adicionar</li>
<?php $this->end(); ?>

<?= $this->Form->create($process) ?>
<div class="row">
    <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Adicionar processo</h3>
            </div>
            <div class="box-body">
                <?php
                    echo $this->Form->input('name', ['label' => 'Descrição do processo', 'placeholder' => 'Descrição do processo']);
                    echo $this->Form->input('initial_date', [ 'label' => 'Distribuição docentes efetivos', 'type' => 'text', 'class' => 'datepicker', 'data-datepicker-format' => 'd/m/Y']);
                    echo $this->Form->input('teacher_intent_date', [ 'label' => 'até', 'type' => 'text', 'class' => 'datepicker', 'data-datepicker-format' => 'd/m/Y']);
                    echo $this->Form->input('primary_distribution_date', ['label' => 'Distribuição docentes substitutos', 'type' => 'text', 'class' => 'datepicker', 'data-datepicker-format' => 'd/m/Y']);
                    echo $this->Form->input('substitute_intent_date', ['label' => 'até', 'type' => 'text', 'class' => 'datepicker', 'data-datepicker-format' => 'd/m/Y']);
                    echo $this->Form->input('secondary_distribution_date', ['label' => 'Resolução de conflitos', 'type' => 'text', 'class' => 'datepicker', 'data-datepicker-format' => 'd/m/Y']);
                    echo $this->Form->input('final_date', ['label' => 'até', 'type' => 'text', 'class' => 'datepicker', 'data-datepicker-format' => 'd/m/Y']);
                ?>
            </div>
            <div class="box-footer clearfix">
                <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
