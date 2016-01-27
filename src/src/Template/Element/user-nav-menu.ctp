<?php
    $notifications = !isset($notifications) ? [] : $notifications;
    $notificationLabel = count($notifications) > 0 ? '<span class="label label-warning">'.count($notifications).'</span>' : '';
?>
<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <!-- Notifications Menu -->
        <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <?= $notificationLabel ?>
            </a>
            <ul class="dropdown-menu">
                <li class="header"><?= __(sprintf('Você possui %d notificações', count($notifications))) ?></li>
                <li>
                    <ul class="menu">
                        <?php if(count($notifications) < 1): ?>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o text-yellow"></i> <?= __('Nenhuma notificação pendente') ?>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php foreach($notifications as $notification): ?>
                        <li>
                            <a href="#">
                                <i class="fa fa-circle-o text-blue"></i> <?= $notification ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="footer"><a href="#"><?= __('Visualizar todas') ?></a></li>
            </ul>
        </li>

        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?= $this->Gravatar->generate(
                    $this->Auth->get("User.email"),
                    [
                        'image-options' => ['class' => 'user-image'],
                        'size' => 160,
                        'default' => 'mm'
                    ]
                ) ?>
                <span class="hidden-xs"><?= $this->Auth->get("User.name") ?></span>
            </a>
            <ul class="dropdown-menu">
                <li class="user-header">
                    <?= $this->Gravatar->generate(
                        $this->Auth->get("User.email"),
                        [
                            'image-options' => ['class' => 'img-circle'],
                            'size' => 160,
                            'default' => 'mm'
                        ]
                    ) ?>
                    <p>
                        <?= $this->Auth->get("User.name") ?>
                        <small>Administrador</small>
                    </p>
                </li>
                <li class="user-footer">
                    <div class="pull-left">
                        <?= $this->Html->link(__('Minha conta'), ['controller' => 'users', 'action' => 'my_account'], ['class' => 'btn btn-default btn-flat']) ?>
                    </div>
                    <div class="pull-right">
                        <?= $this->Html->link(__('Sair'), ['controller' => 'users', 'action' => 'logout'], ['class' => 'btn btn-default btn-flat']) ?>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</div>
