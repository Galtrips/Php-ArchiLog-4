<div id="login-page">
    <div class="container">
        <?php echo $this->Form->create($user, ['type' => 'post', 'class' => "form-login"]); ?>
            <h2 class="form-login-heading" style="background-color: #5bc0de;">Inscription</h2>
            <div class="login-wrap">
                <label for="nameInput">Votre pseudo</label>
                <?= $this->Form->control('username', ['class' => 'form-control', 'placeholder' => "Nom d'utilisateur", 'autofocus' => true, "label" => false, "style" => "font-size: 15px;"]) ?>
                </br>
                <label for="nameInput">Votre email</label>
                <?= $this->Form->control('email', ['class' => 'form-control', 'placeholder' => "Email", 'autofocus' => false, "label" => false, "style" => "font-size: 15px;"]) ?>
                </br>
                <label for="passwordInput">Mot de passe</label>
                <?= $this->Form->control('password', ['class' => 'form-control', 'placeholder' => "Mot de Passe", "label" => false, "style" => "font-size: 15px;"]) ?>
                </br>
                <?= $this->HTML->link('Vous avez déjà un compte ? Connectez-vous !', ['controller' => 'Users', 'action' => 'login']); ?>
                </br></br>
                <?= $this->Form->button('<i class="fa fa-lock"></i> Inscription', ['type' => 'submit', 'class' => 'btn btn-info btn-block', 'escapeTitle' => false, "style" => "font-size: 15px;"]); ?>
            </div>
        <?= $this->Form->end() ?>
    </div>
</div>