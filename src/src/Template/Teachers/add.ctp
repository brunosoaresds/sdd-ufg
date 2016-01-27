<?php $this->assign('title', 'Docentes'); ?>
<?php $this->start('breadcrumb'); ?>
    <li><?= $this->Html->link('<i class="fa fa-dashboard"></i>' . __('Dashboard'), '/', ['escape' => false]) ?></li>
    <li><?= $this->Html->link(__('Docentes'), ['action' => 'index']) ?></li>
    <li class="active">Adicionar</li>
<?php $this->end(); ?>

<?= $this->Form->create($teacher) ?>
<div class="row">
    <div class="col-xs-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Adicionar docente</h3>
            </div>
            <div class="box-body">
			<fieldset>
				<legend>Usuário</legend>
                <?php
                    echo $this->Form->input('Users.name', ['label' => 'Nome do docente', 'placeholder' => 'Nome da docente']);
					echo $this->Form->input('Users.email', ['label' => 'Email', 'placeholder' => 'Email']);
					echo $this->Form->input('Users.login', ['label' => 'Login', 'placeholder' => 'Nome de Usuário']);
					echo $this->Form->input('Users.password', ['label' => 'Senha', 'placeholder' => 'Senha']);
				?>
				<label for="is_admin">É administrador?&nbsp;
				<?php 
					echo $this->Form->radio('is_admin', [
						['value' => '1', 'text' => 'Sim'],
						['value' => '0', 'text' => 'Não'],

					], ['hiddenField' => false, 'label' => 'É Administrador', 'disabled' => true]);
                ?>
				</label>
			</fieldset>
			<fieldset>
				<legend>Geral</legend>
                <?php
                    echo $this->Form->input('Teachers.registry', ['label' => 'Matrícula', 'placeholder' => 'Matrícula']);
					echo $this->Form->input('Teachers.rg', ['label' => 'RG', 'placeholder' => 'RG']);
					echo $this->Form->input('Teachers.cpf', ['label' => 'Núcleo de conhecimento', 'placeholder' => 'CPF']);
					echo $this->Form->input('Teachers.birth_date', ['label' => 'Data de Nascimento', 'placeholder' => 'Data de Nascimento']);
                    echo $this->Form->input('Teachers.url_lattes', ['label' => 'URL Lattes', 'placeholder' => 'URL Lattes']);
                    echo $this->Form->input('Teachers.entry_date', ['label' => 'Data de Ingresso', 'placeholder' => 'Data de Ingresso']);
                    echo $this->Form->input('Teachers.formation', ['label' => 'Formação', 'placeholder' => 'Formação']);
					echo $this->Form->input('Teachers.workload', ['label' => 'Carga Horária', 'placeholder' => 'Carga Horária']);
					echo $this->Form->input('Teachers.about', ['label' => 'Sobre', 'placeholder' => 'Sobre']);
					echo $this->Form->input('Teachers.situation', ['label' => 'Situação', 'placeholder' => 'Situação']);
                ?>
			</fieldset>
            </div>
            <div class="box-footer clearfix">
                <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>