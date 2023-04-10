<aside>
    <div id="sidebar" class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered">
                <?php $linkProfil = '<img src="/img/users/1.jpg" class="img-circle" width="90">' ?>
                <?php
                if ($this->Identity->isLoggedIn()) {
                    echo $this->Html->link($linkProfil, [], ['escapeTitle' => false]);
                }
                ?>
            </p>
            <h4 class="centered" style="color: white;">
                <?php
                $username = $this->Identity->get('username');
                echo (isset($username) ? $username : "Non connecté");
                ?>
            </h4>
            <div class="mt">
                <li>
                    <?php echo $this->Html->link('<i class="bi bi-house"></i> <span>Accueil</span>', ['controller' => 'Cards', 'action' => 'index'], ['escapeTitle' => false, "style"=> "font-size:15px;"]); ?>
                </li>

                <li>
                    <?php $notif = '<span class="badge badge-success badge-pill ms-4" style="font-size:12px;">' . count($cart) . '</span>' ?>
                    <?php echo $this->Html->link('<i class="bi bi-cart"></i> <span>Le panier</span>' . (count($cart) == 0 ? " " : $notif), ['controller' => 'Carts', 'action' => 'view'], ['escapeTitle' => false, "style"=> "font-size:15px;"]); ?>
                </li>

                <li>
                    <?php
                    if ($this->Identity->isLoggedIn() && $this->Identity->get("admin") == true) {
                        echo $this->Html->link('<i class="bi bi-shop-window"></i> <span>Tes cartes</span>', ['controller' => 'Cards', 'action' => 'viewperso'], ['escapeTitle' => false,"style"=> "font-size:15px;"]);
                    }
                    ?>
                </li>

            </div>
        </ul>
    </div>
</aside>