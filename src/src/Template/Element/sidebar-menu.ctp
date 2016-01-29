<section class="sidebar">
    <ul class="sidebar-menu">
        <li class="header"><?= __('MENU PRINCIPAL') ?></li>
        <li>
            <?= $this->Html->link('<i class="fa fa-dashboard"></i> <span>' . __('Dashboard') . '</span>', '/', ['escape' => false]) ?>
        </li>
        <li class="treeview">
            <a href="#"><i class="fa fa-gavel"></i> <span><?= __('Distribuição de disciplinas') ?></span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> ' . __('Processos em aberto'), ['controller' => 'processes', 'action' => 'opened'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> ' . __('Minhas inscrições'), ['controller' => 'clazzes', 'action' => 'my_intents'], ['escape' => false]) ?></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#"><i class="fa fa-gear"></i> <span><?= __('Administração') ?></span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> ' . __('Núcleos de conhecimento'), ['controller' => 'knowledges'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> ' . __('Cursos'), ['controller' => 'courses'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> ' . __('Disciplinas'), ['controller' => 'subjects'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> ' . __('Docentes'), ['controller' => 'teachers'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> ' . __('Locais de aula'), ['controller' => 'locals'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> ' . __('Horários de aula'), ['controller' => 'schedules'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> ' . __('Processos de distribuição'), ['controller' => 'processes'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> ' . __('Turmas'), ['controller' => 'clazzes'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> ' . __('Critérios / Restrições'), ['controller' => 'ProcessConfigurations'], ['escape' => false]) ?></li>
                <li><?= $this->Html->link('<i class="fa fa-circle-o"></i> ' . __('Papéis de docentes'), ['controller' => 'roles'], ['escape' => false]) ?></li>
            </ul>
        </li>
    </ul>
</section>
