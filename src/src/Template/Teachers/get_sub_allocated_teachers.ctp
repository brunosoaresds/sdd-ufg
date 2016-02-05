<?php

$this->assign('title', 'Docentes'); ?>
<?php $this->start('breadcrumb'); ?>
<li><?= $this->Html->link('<i class="fa fa-dashboard"></i>' . __('Dashboard'), '/', ['escape' => false]) ?></li>
<li class="active">Lista de docentes sub alocados</li>
<?php $this->end(); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Lista de docentes sub alocados</h3>
                <?php
                    foreach ($suball as $t){
                        echo $t;
                    }
                    ?>
            </div>
        </div>
    </div>
</div>