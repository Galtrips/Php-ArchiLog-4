<div id="login-page">
    <div class="container">
        <?php echo $this->Form->create($user, ['type' => 'post', 'class' => "form-login"]); ?>
            <h2 class="form-login-heading">Connexion</h2>
            <div class="login-wrap">
                <label for="nameInput">Votre email / Username</label>
                <?= $this->Form->control('username', ['class' => 'form-control', 'placeholder' => "Email", 'autofocus' => false, "label" => false, "style" => "font-size: 15px;"]) ?>
                </br>
                <label for="passwordInput">Mot de passe</label>
                <?= $this->Form->control('password', ['class' => 'form-control', 'placeholder' => "Mot de Passe", "label" => false, "style" => "font-size: 15px;"]) ?>
                </br>
                <?= $this->HTML->link('Vous n\'avez pas de compte ? Créez en un !', ['controller' => 'Users', 'action' => 'register']); ?>
                </br></br>
                <?= $this->Form->button('<i class="fa fa-lock"></i> Connexion', ['type' => 'submit', 'class' => 'btn btn-theme btn-block', 'escapeTitle' => false, "style" => "font-size: 15px;"]); ?>
            </div>
        <?= $this->Form->end() ?>
    </div>
</div>
