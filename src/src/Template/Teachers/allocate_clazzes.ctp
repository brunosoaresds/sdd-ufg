<?php $this->assign('title', 'Docentes'); ?>
<?php $this->start('breadcrumb'); ?>
<li><?= $this->Html->link('<i class="fa fa-dashboard"></i>' . __('Dashboard'), '/', ['escape' => false]) ?></li>
<li><?= $this->Html->link(__('Docentes'), ['action' => 'index']) ?></li>
<li class="active">Alocar Turmas para #<?= $teacher->id ?></li>
<?php $this->end(); ?>

<?= $this->Form->create($teacher) ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Alocar Turmas para docente #<?= $teacher->name ?></h3>
            </div>
            <div class="box-body">
				<div class="row">
					<div class="col-xs-12" id="filtros">
						<fieldset>
							<legend>Filtros</legend>
							<div class="row">
								<div class="col-xs-3">
									<?php 
										echo $this->Form->input('course_name', ['label' => 'Nome do Curso', 'placeholder' => 'Nome do Curso', 'class' => 'col-xs-3']);
									?>
								</div>
								<div class="col-xs-3">
									<?php
										echo $this->Form->input('knowledge_name', ['label' => 'Nome do Núcleo', 'placeholder' => 'Nome do Núcleo', 'class' => 'col-xs-3']);
									?>
								</div>
								<div class="col-xs-3">
									<?php
										echo $this->Form->input('subject_name', ['label' => 'Nome da Disciplina', 'placeholder' => 'Nome da Disciplina', 'class' => 'col-xs-3']);
									?>
								</div>
								<div class="col-xs-3">
									<?php
										echo $this->Form->input('clazz_name', ['label' => 'Nome da Turma', 'placeholder' => 'Nome da Turma', 'class' => 'col-xs-3']);
									?>
								</div>
								<div class="col-xs-3">
									<?php
										echo $this->Form->input('week_day', ['label' => 'Dia da Semana', 'placeholder' => 'Dia da Semana', 'class' => 'col-xs-3']);
									?>
								</div>
								<div class="col-xs-3">
									<?php
										echo $this->Form->input('start_time', ['label' => 'Horário de Início', 'placeholder' => 'Horário de Início', 'class' => 'col-xs-3']);
									?>
								</div>
								<div class="col-xs-3">
									<?php
										echo $this->Form->input('end_time', ['label' => 'Horário de Término', 'placeholder' => 'Horário de Término', 'class' => 'col-xs-3']);
									?>
								</div>
								<div class="col-xs-3">
									<?php
										echo $this->Form->button(__('Filtrar'), ['class' => 'btn btn-primary', 'onclick' => 'filtrar()']);
									?>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-12">
						<fieldset>
							<legend>Turmas em Aberto</legend>
							<table class="table table-striped table-valign-middle">
								<thead>
								<tr>												
									<th><?= $this->Paginator->sort('clazz_id',__('#ID')) ?></th>
									<th><?= $this->Paginator->sort('clazze.subject.name',__('Disciplina')) ?></th>
									<th colspan="3" class="text-center"><?= __('Horário') ?></th>
									<th><?= $this->Paginator->sort(__('local.address', 'Local')) ?></th>
									<th><?= $this->Paginator->sort(__('clazze.subject.knowledge.name', 'Núcleo')) ?></th>
									<th><?= $this->Paginator->sort(__('clazze.subject.course.name', 'Curso')) ?></th>
									<th><?= $this->Paginator->sort(__('name', 'Name')) ?></th>
									<th width="200px"><?= __('Ações') ?></th>
								</tr>
								</thead>
								<tbody>
								<?php if(count($clazzes) < 1): ?>
									<tr>
										<td colspan="10" class="text-center">Ainda não existem turmas cadastradas no Processo</td>
									</tr>
								<?php endif; ?>
								<?php foreach ($clazzes as $clazz): ?>
									<tr>
										<td><?= h($clazz->clazz_id) ?></td>
										<td><?= h($clazz->clazze->subject->name) ?></td>
										<td><?= h($clazz->schedule->week_day) ?></td>
										<td><?= h($clazz->schedule->start_time) ?></td>
										<td><?= h($clazz->schedule->end_time) ?></td>
										<td><?= h($clazz->local->address) ?></td>
										<td><?= h($clazz->clazze->subject->knowledge->name) ?></td>
										<td><?= h($clazz->clazze->subject->course->name) ?></td>
										<td><?= h($clazz->name) ?></td>
										<td>
											<?= $this->Html->link(
												'',
												['controller' => 'Clazzes', 'action' => 'view', $clazz->clazz_id],
												[
													'title' => __('Visualizar'),
													'class' => 'btn btn-sm btn-default glyphicon glyphicon-search',
													'data-toggle' => 'tooltip',
													'data-original-title' => __('Visualizar'),
												]
											) ?>
											<?php 	$has_clazz = false;
													foreach ($teacher->clazzes as $c) : 
														if ($clazz->clazz_id == $c->id) { ?>
											
														<?= $this->Html->link(
															'',
															['controller' => 'Teachers', 'action' => 'allocateClazz', $clazz->clazz_id],
															[
																'title' => __('Cancelar Inscrição'),
																'class' => 'btn btn-sm btn-danger glyphicon glyphicon-remove',
																'data-toggle' => 'tooltip',
																'data-original-title' => __('Cancelar inscrição no processo de distribuição dessa turma'),
															]
														) ?>
														<?php 
																$has_clazz = true;
																break;
															} ?>
														<?php endforeach; ?>
														<?php
														if (!$has_clazz) {
														?>
															<?= $this->Html->link(
																'',
																['controller' => 'Teachers', 'action' => 'allocateClazz', $clazz->clazz_id],
																[
																	'title' => __('Efetuar Inscrição'),
																	'class' => 'btn btn-sm btn-success glyphicon glyphicon-ok',
																	'data-toggle' => 'tooltip',
																	'data-original-title' => __('Efetuar inscrição no processo de distribuição dessa turma'),
																]
															) ?>
														<?php
														}
											?>
										</td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</fieldset>
					</div>
				</div>
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
