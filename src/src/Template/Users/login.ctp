<?= $this->Form->create() ?>
    <p class="login-box-msg"><?= __('Entre com os campos abaixo para se autenticar no sistema.') ?></p>
    <?= $this->Form->input('login', [
        'label' => false,
        'placeholder' => __('Login'),
        'templates' => [
            'inputContainer' => '<div class="form-group has-feedback">{{required}}{{content}}<span class="glyphicon glyphicon-user form-control-feedback"></span></div>'
        ]
    ])?>

    <?= $this->Form->input('password', [
        'label' => false,
        'placeholder' => __('Senha'),
        'templates' => [
            'inputContainer' => '<div class="form-group has-feedback">{{required}}{{content}}<span class="glyphicon glyphicon-lock form-control-feedback"></span></div>'
        ]
    ])?>

    <div class="row">
        <div class="col-xs-8">
            <?= $this->Html->link(__('Solicitar cadastro'), array('action' => 'requestAccount'), array('class' => 'text-center')) ?>
        </div>
        <div class="col-xs-4">
            <?= $this->Form->submit(__('Entrar'), ['class' => 'btn btn-primary btn-block btn-flat']) ?>
        </div>
    </div>
<?= $this->Form->end() ?>
