<?php $this->assign('title', 'Reverter Distribuição Automática'); ?>
<?php $this->start('breadcrumb'); ?>
    <li><?= $this->Html->link('<i class="fa fa-dashboard"></i>' . __('Dashboard'), '/', ['escape' => false]) ?></li>
    <li><?= $this->Html->link('<i class="fa fa-magic"></i>' . __('Distribuição automática'), ['controller' => 'processes', 'action' => 'distribute'], ['escape' => false]) ?></li>
    <li class="active">Reverter</li>
<?php $this->end(); ?>

<!-- RADIO -->
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Processos de distribuição "Em aberto":</h3>
                <h6>Obs: O Processo de distribuição será revertido ao estágio anterior ao da efetivação da distribuição automática.</h6>
            </div>
            <div class="box-body">
            	
	            <div class="form-group">
	            	<?php foreach ($processes as $process): ?>
	                    <div class="radio">
	                    	<label>
	                    		<input type='radio' name='processesRadio' id='<?= $process->id ?> <?= $process->name ?>' value='<?= $process->id ?>'>
	                    		 [#ID:  <?= $this->Number->format($process->id) ?> ] <?= $process->name ?>
	                    		
	                    	</label>
	                    </div>
	                <?php endforeach; ?>
	            </div>
            </div>
            
        </div>
    </div>
</div>

<!-- BUTTONS -->
<div class="row">
	<div class="col-xs-12 text-center">
		<?= $this->Html->link(
            '<i class="fa fa-mail-reply-all"></i> ' . __('Reverter Distribuição Automática'),
            '#',
            [
                'escape' => false,
                'class' => 'btn btn-sm btn-primary'
            ]
        );
        ?>
	</div>
</div>







