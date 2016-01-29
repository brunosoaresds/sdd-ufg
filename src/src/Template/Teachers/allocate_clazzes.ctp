<?php $this->assign('title', 'Docentes'); ?>
<?php $this->start('breadcrumb'); ?>
<li><?= $this->Html->link('<i class="fa fa-dashboard"></i>' . __('Dashboard'), '/', ['escape' => false]) ?></li>
<li><?= $this->Html->link(__('Docentes'), ['action' => 'index']) ?></li>
<li class="active">Alocar Turmas para #<?= $teacher->id ?></li>
<?php $this->end(); ?>

<?php $this->loadHelper('Utils'); ?>

<?= $this->Form->create('Filtros', array('action' => 'allocateClazzes/' . $teacher->id)) ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Alocar Turmas para docente #<?= $teacher->name ?></h3>
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
				<?php if ($process_exists) { ?>
				<div class="row">
					<div class="col-xs-12" id="filtros">
						<fieldset>
							<legend>Filtros</legend>
							<div class="row">
								<div class="col-xs-2">
									<?php 
										echo $this->Form->input('process', ['label' => 'Processo de Distr.', 'placeholder' => 'Processo de Distribuição', 'class' => 'col-xs-2']);
									?>
								</div>
								<div class="col-xs-2">
									<?php 
										echo $this->Form->input('course_name', ['label' => 'Nome do Curso', 'placeholder' => 'Nome do Curso', 'class' => 'col-xs-2']);
									?>
								</div>
								<div class="col-xs-2">
									<?php
										echo $this->Form->input('knowledge_name', ['label' => 'Nome do Núcleo', 'placeholder' => 'Nome do Núcleo', 'class' => 'col-xs-2']);
									?>
								</div>
								<div class="col-xs-2">
									<?php
										echo $this->Form->input('subject_name', ['label' => 'Nome da Disciplina', 'placeholder' => 'Nome da Disciplina', 'class' => 'col-xs-2']);
									?>
								</div>
								<div class="col-xs-2">
									<?php
										echo $this->Form->input('clazz_name', ['label' => 'Nome da Turma', 'placeholder' => 'Nome da Turma', 'class' => 'col-xs-2']);
									?>
								</div>
								<div class="col-xs-2">
									<?php
										echo $this->Form->input('address', ['label' => 'Local', 'placeholder' => 'Local', 'class' => 'col-xs-2']);
									?>
								</div>
								<div class="col-xs-2">
									<?php
										echo $this->Form->input('week_day', ['label' => 'Dia da Semana', 'placeholder' => 'Dia da Semana', 'class' => 'col-xs-2', 'options' => $this->Utils->daysOfWeek()]);
									?>
								</div>
								<div class="col-xs-2">
									<?php
										echo $this->Form->input('start_time', ['label' => 'Horário de Início', 'placeholder' => 'Horário de Início', 'class' => 'col-xs-2']);
									?>
								</div>
								<div class="col-xs-2">
									<?php
										echo $this->Form->input('end_time', ['label' => 'Horário de Término', 'placeholder' => 'Horário de Término', 'class' => 'col-xs-2']);
									?>
								</div>
								<div class="col-xs-2">
									<?= $this->Form->button(__('Filtrar'), ['class' => 'btn btn-primary']) ?>
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
									<th><?= $this->Paginator->sort('schedule.week_day', __('Dia da Semana')) ?></th>
									<th><?= $this->Paginator->sort('schedule.start_time', __('Horário Início')) ?></th>
									<th><?= $this->Paginator->sort('schedule.end_time', __('Horário Término')) ?></th>
									<th><?= $this->Paginator->sort('local.address', __('Local')) ?></th>
									<th><?= $this->Paginator->sort('clazze.subject.knowledge.name', __('Núcleo')) ?></th>
									<th><?= $this->Paginator->sort('clazze.subject.course.name', __('Curso')) ?></th>
									<th><?= $this->Paginator->sort('name', __('Name')) ?></th>
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
															['controller' => 'Teachers', 'action' => 'allocateClazzes', $teacher->id, $clazz->clazz_id, false],
															[
																'confirm' => __('Tem certeza que deseja cancelar a inscrição?'),
																'title' => __('Cancelar Inscrição'),
																'class' => 'btn btn-sm btn-danger glyphicon glyphicon-remove',
																'data-toggle' => 'tooltip',
																'data-original-title' => __('Cancelar inscrição no processo de distribuição dessa turma'),
															]
														) ?>
														Inscrito
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
																['controller' => 'Teachers', 'action' => 'allocateClazzes', $teacher->id, $clazz->clazz_id, true],
																[
																	'confirm' => __('Tem certeza que deseja efetivar a inscrição?'),
																	'title' => __('Efetuar Inscrição'),
																	'class' => 'btn btn-sm btn-success glyphicon glyphicon-ok',
																	'data-toggle' => 'tooltip',
																	'data-original-title' => __('Efetuar inscrição no processo de distribuição dessa turma'),
																]
																
															) ?>
															Não Inscrito
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
				<?php } else { ?>
					Não existem Processos de Distribuição em Aberto.
				<?php } ?>
			</div>
        </div>
    </div> 
</div>
<?= $this->Form->end() ?>
