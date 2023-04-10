<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" type="button"  data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <a href="/" class="logo"><b>PO<span>KEMON</span></b></a>
    <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li>
                <?php 
                if ($this->Identity->isLoggedIn()) {
                    echo $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout'], ['class' => "logout"]);
                } else {
                    echo $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login'], ['class' => "logout"]);
                }
                
                ?>
            </li>
        </ul>
    </div>
</header>