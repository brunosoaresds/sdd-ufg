<?php $this->assign('title', 'Docentes'); ?>
<?php $this->start('breadcrumb'); ?>
<li><?= $this->Html->link('<i class="fa fa-dashboard"></i>' . __('Dashboard'), '/', ['escape' => false]) ?></li>
<li><?= $this->Html->link(__('Docentes'), ['action' => 'index']) ?></li>
<li class="active">Editar #<?= $teacher->id ?></li>
<?php $this->end(); ?>

<?= $this->Form->create($teacher) ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editar docente #<?= $teacher->id ?></h3>
				<div class="pull-right box-tools">
					<?= $this->Html->link(
						'',
						['action' => 'edit', $teacher->id],
						[
							'title' => __('Ir para informações do docente'),
							'class' => 'btn btn-sm btn-default glyphicon glyphicon-education',
							'data-toggle' => 'tooltip',
							'data-original-title' => __('Cadastro do Docente'),
						]
					) ?>
				</div>
            </div>
            <div class="box-body">
				
			</div>
            <div class="box-footer clearfix">
                <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div> 
</div>
<?= $this->Form->end() ?>
<?php 
	$this->Html->scriptStart(['block' => true]);
	echo "function filtrar() {	";
	echo "	var formdata = $('form').serialize();";
	echo "	$.ajax({
				type:'GET',
				url:'" . $teacher->id . "',
				dataType: 'json',
				data : $('#filtros input'),
				success: function(tab){
					alert('success');
				},
				error: function (tab) {
					alert('error');
				}
			});";
	echo "};	";
	$this->Html->scriptEnd();
?>
