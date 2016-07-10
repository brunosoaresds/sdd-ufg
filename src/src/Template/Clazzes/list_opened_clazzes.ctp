<?php
	use Cake\Routing\Router;
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Lista de Turmas em Aberto</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12" id="filters">
                        <fieldset>
                            <legend>Filtros</legend>
                            <div class="row">
                                <div class="col-xs-3">
                                    <?php
                                        echo $this->Form->input('process', ['label' => 'Processo de Distr.', 'placeholder' => 'Processo', 'class' => 'col-xs-3', 'options' => $processes]);
                                    ?>
                                </div>
                                <div class="col-xs-3">
                                    <?php
                                        echo $this->Form->input('knowledge_name', ['label' => 'Nome do Núcleo', 'placeholder' => 'Nome do Núcleo', 'class' => 'col-xs-3']);
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
                                        <td><?= h($clazz->id) ?></td>
                                        <td><?= h($clazz->subject->name) ?></td>
                                        <td>
                                            <?php foreach ($clazz->scheduleLocals as $csl): ?>
                                                <?= ($this->Utils->daysOfWeek()[$csl->week_day]) ?>
                                                <br>
                                            <?php endforeach; ?>
                                        </td>
                                        <td>
                                            <?php foreach ($clazz->scheduleLocals as $s): ?>
                                                <?= $s->schedule->start_time->format('H:i:s') ?>
                                                <br>
                                            <?php endforeach; ?>
                                        </td>
                                        <td>
                                            <?php foreach ($clazz->scheduleLocals as $s): ?>
                                                <?= $s->schedule->end_time->format('H:i:s') ?>
                                                <br>
                                            <?php endforeach; ?>
                                        </td>
                                        <td>
                                            <?php foreach ($clazz->scheduleLocals as $s): ?>
                                                <?= $s->local->fullPath ?>
                                                <br>
                                            <?php endforeach; ?>
                                        </td>
                                        <td><?= h($clazz->subject->knowledge->name) ?></td>
                                        <td><?= h($clazz->subject->course->name) ?></td>
                                        <td><?= h($clazz->name) ?></td>
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

                                            <?= $this->Html->link(
                                                '',
                                                ['controller' => 'Clazzes', 'action' => 'allocateTeacher', $clazz->id],
                                                [
                                                    'title' => __('Alocar Docente'),
                                                    'class' => 'btn btn-sm btn-primary glyphicon glyphicon-education',
                                                    'data-toggle' => 'tooltip',
                                                    'data-original-title' => __('Alocar docente para ministrar a Turma'),
                                                ]
                                            ) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    <?php $this->Html->scriptStart(['block' => true]); ?>
$(document).ready(function() {

	var daysOfWeek = {'': 'Selecione o dia',
				2: 'Segunda-Feira',
				3: 'Terça-Feira',
				4: 'Quarta-Feira',
				5: 'Quinta-Feira',
				6: 'Sexta-Feira',
				7: 'Sábado',
				1: 'Domingo'};

	$('#filters input, #filters select').on('keyup keydown change', function() {
		$.ajax({
			type:"POST",
			url:"<?php echo Router::url(array('controller'=>'Clazzes','action'=>'listOpenedClazzes'));?>",
			dataType: 'html',
			data: $('#filters input, #filters select'),
			success: function(tab){
				var data = JSON.parse(tab);
				data = $.map(data, function(value, index) {
					return [value];
				});

				var html = '';

				$("tbody").empty();

				if (data.length == 0) {
					$('tbody').append('<tr>'+
						'<td colspan="10" class="text-center">Não existem turmas cadastradas no Processo com os critérios informados</td>' +
					'</tr>');
				}

				for (var i = 0; i < data.length; i++) {
					data[i].locals = $.map(data[i].scheduleLocals, function(value, index) {
						return [value.local];
					});

					data[i].schedules = $.map(data[i].scheduleLocals, function(value, index) {
						return [value.schedule];
					});

					data[i].SchedulesLocals = $.map(data[i].scheduleLocals, function(value, index) {
						return [value];
					});

					html += '<tr>' +
						'<td>' + data[i].id + '</td>' +
						'<td>' + data[i].subject.name + '</td>';
					html+= '<td>';
					for(var k = 0; k < data[i].SchedulesLocals.length; k++) {
						html += daysOfWeek[data[i].SchedulesLocals[k].week_day] + '<br>';
					}
					html+= '</td>';
					html+= '<td>';
					for(var k = 0; k < data[i].schedules.length; k++) {
                        var date = new Date(data[i].schedules[k].start_time);
                        date.setTime(date.getTime() + date.getTimezoneOffset()*60*1000);
						html += date.toLocaleTimeString('pt-BR') + '<br>';
					}
					html+= '</td>';
					html+= '<td>';
					for(var k = 0; k < data[i].schedules.length; k++) {
                        var date = new Date(data[i].schedules[k].end_time);
                        date.setTime(date.getTime() + date.getTimezoneOffset()*60*1000);
                        html += date.toLocaleTimeString('pt-BR') + '<br>';
					}
					html+= '</td>';
					html+= '<td>';
					for(var k = 0; k < data[i].locals.length; k++) {
						html += data[i].locals[k].address + ' - ' + data[i].locals[k].name + '<br>';
					}
					html+= '</td>' +
						'<td>' + data[i].subject.knowledge.name + '</td>' +
						'<td>' + data[i].subject.course.name + '</td>' +
						'<td>' + data[i].name + '</td>';


					html += '<td><a href="/clazzes/view/' + data[i].id + '" title="" class="btn btn-sm btn-default glyphicon glyphicon-search" data-toggle="tooltip" data-original-title="Visualizar"></a>' +
					'<a href="/clazzes/allocateTeacher/' + data[i].id + '" title="" class="btn btn-sm btn-primary glyphicon glyphicon-education" data-toggle="tooltip" data-original-title="Alocar docente para ministrar a Turma"></a>';
				}

					html += '</td></tr>';
					$('tbody').append(html);


			},
			error: function (tab) {
				alert('error');
			}
		});
	});

});
    <?php $this->Html->scriptEnd(); ?>
</script>
