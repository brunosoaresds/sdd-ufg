<p class="login-box-msg"><?= __('Solicitar cadastro') ?></p>

<?php
echo $this->Form->create($user);

echo $this->Form->input('login', ['label' => false, 'placeholder' => 'Nome de usuário']);
echo $this->Form->input('email', ['label' => false, 'placeholder' => 'E-mail']);
echo $this->Form->input('name', ['label' => false, 'placeholder' => 'Nome'] );
echo $this->Form->input('password', ['label' => false, 'placeholder' => 'Senha']);
?>
<span class="divider"></span>
<?php
/** Teacher fields */
echo $this->Form->input('teacher.rg', ['label' => false, 'placeholder' => 'RG']);
echo $this->Form->input('teacher.cpf', ['label' => false, 'placeholder' => 'CPF']);
echo $this->Form->input('teacher.birth_date', ['type' => 'date', 'label' => 'Data de nascimento', 'placeholder' => 'Data de nascimento']);
?>
<span class="divider"></span>
<?php
echo $this->Form->input('teacher.registry', ['label' => false, 'placeholder' => 'Código da Matrícula']);
echo $this->Form->input('teacher.entry_date', ['type' => 'date', 'label' => 'Data de entrada na instituição', 'placeholder' => 'Data de entrada na instituição']);
echo $this->Form->input('teacher.workload', ['type' => 'number', 'min' => '1', 'label' => false, 'placeholder' => 'Carga horária de trabalho']);

echo $this->Form->submit(__('Solicitar cadastro'), ['class' => 'btn btn-primary btn-block btn-flat']);
echo $this->Form->end();
?>
