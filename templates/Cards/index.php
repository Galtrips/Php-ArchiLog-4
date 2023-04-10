<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right mt-3"></i> Cards list</h3>
        <div class="row mt">
            <div class="col-md-12">
                <section class="task-panel tasks-widget">
                    <div class="panel-heading">
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <h3><i class="fa fa-tasks"></i> Toutes les cartes</h3>
                            <div class="btn-toolbar">
                                <?php
                                if ($this->Identity->isLoggedIn() && $this->Identity->get("admin") == true) {
                                    echo $this->Html->link('Ajouter une nouvelle cartes', ['controller' => 'Cards', 'action' => 'create'], ['escapeTitle' => false, "class" => "btn btn-outline-secondary btn-lg pull-right"]);
                                }

                                ?>
                            </div>
                        </div>
                        <hr class="my-4">
                    </div>
                    <div class="panel-body">
                        <div style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: space-around;">

                            <?php
                            foreach ($cards as $card) {
                                echo '<div style="margin: 15px; width: 18%;">';
                                $innerHTML = '<img src="' . $card->image . '" class="card-img-top" alt="' . $card->name . '" >';
                                echo $this->Html->link($innerHTML, ['controller' => 'Cards', 'action' => 'view', $card->id], ['escapeTitle' => false]);
                                echo '<hr class="my-4">';
                                echo '<div style="display: flex; flex-direction: row; flex-wrap: wrap; margin-bottom: 30px;">';
                                echo $this->Html->link('Voir les détails', ['controller' => 'Cards', 'action' => 'view', $card->id], ['escapeTitle' => false, "class" => "btn btn-outline-primary btn-lg me-3", "style" => "width: 75%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; min-width: 75%;"]);
                                
                                $isPresent = false;
                                foreach ($cart as $item) {
                                    if ($item->id == $card->id) {
                                        $isPresent = true;
                                    }
                                }
                                if ($isPresent) {
                                    echo $this->Html->link('<i class="bi bi-cart-check"></i>', ['controller' => 'Cards', 'action' => 'removefromcart', $card->id], ['escapeTitle' => false, "class" => "btn btn-success btn-lg", "style" => "min-width: 20%;"]);
                                } else {
                                    echo $this->Html->link('<i class="bi bi-cart"></i>', ['controller' => 'Cards', 'action' => 'addtocart', $card->id], ['escapeTitle' => false, "class" => "btn btn-outline-secondary btn-lg", "style" => "min-width: 20%;"]);
                                }
                                echo '</div>';
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>