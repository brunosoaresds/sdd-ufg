<?php $this->assign('title', 'Processos de distribuição'); ?>
<?php $this->start('breadcrumb'); ?>
    <li><?= $this->Html->link('<i class="fa fa-dashboard"></i>' . __('Dashboard'), '/', ['escape' => false]) ?></li>
    <li><?= $this->Html->link(__('Processos de distribuição'), ['action' => 'index']) ?></li>
    <li class="active">Adicionar</li>
<?php $this->end(); ?>


<?= $this->Form->create($process) ?>
<div class="row">
    <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Adicionar processo de distribuição</h3>
            </div>
            <div class="box-body">
                <?php
                    echo $this->Form->input('initial_date', ['label' => 'Data Inicial',]);
                    echo $this->Form->input('teacher_intent_date', ['label' => 'Data de Intenção do Professor',]);
                    echo $this->Form->input('primary_distribution_date', ['label' => 'Data de Distribuição primaria',]);
                    echo $this->Form->input('substitute_intent_date', ['label' => 'Data de Distribuição para substitutos',]);
                    echo $this->Form->input('secondary_distribution_date', ['label' => 'Data de Distribuição secundaria',]);
                    echo $this->Form->input('final_date', ['label' => 'Data Final',]);
                    echo $this->Form->input('process_configurations._ids', ['label' => 'Configuração', 'options' => $processConfigurations]);
                ?>
            </div>
            <div class="box-footer clearfix">
                <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
