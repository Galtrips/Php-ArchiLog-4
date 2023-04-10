<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Card $card
 */
?>
<!-- display: flex;justify-content: center;align-items: center; -->
<section id="main-content">
    <section class="wrapper" style="display: flex; flex-direction: row; justify-content: center; align-items: flex-start; margin-top: 0px">
        <div class="row mt" style="width: fit-content; margin-top: 113px;">
            <div class="col-md-12">
                <section class="task-panel tasks-widget">
                    <div class="panel-heading" style="display: flex; flex-direction: row; ">
                        <div style="margin-top: 0px">
                            <?php
                                echo $this->Html->image($card->image, ["style" => "width: 300px"]);
                            ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
		<div class="row mt" style=" margin-top: 113px">
            <div class="col-md-12">
                <section class="task-panel tasks-widget">
                    <div class="panel-heading">
						<div style="margin-left: 20px; margin-top: 0px; font-size: 18px;" >
							<div style="margin-top: 10px">
                        		<h2><?= h($card->name) ?></h3>
							</div>
							<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-2 g-4 py-5">
								<div class="col d-flex align-items-start">
									<div>
									<h3 class="fw-bold mb-0 fs-4">Name :</h3>
									<p><?= h($card->name) ?></p>
									</div>
								</div>
								<div class="col d-flex align-items-start">
									<div>
									<h3 class="fw-bold mb-0 fs-4">Version :</h3>
									<p><?= h($card->version) ?></p>
									</div>
								</div>
								<div class="col d-flex align-items-start">
									<div>
									<h3 class="fw-bold mb-0 fs-4">Type :</h3>
									<p><?= h($card->type) ?></p>
									</div>
								</div>
								<div class="col d-flex align-items-start">
									<div>
									<h3 class="fw-bold mb-0 fs-4">Rarity :</h3>
									<p><?= h($card->rarity) ?></p>
									</div>
								</div>
								<div class="col d-flex align-items-start">
									<div>
									<h3 class="fw-bold mb-0 fs-4">Quantity :</h3>
									<p><?= $this->Number->format($card->quantity) ?></p>
									</div>
								</div>
								<div class="col d-flex align-items-start">
									<div>
									<h3 class="fw-bold mb-0 fs-4">Price :</h3>
									<p><?= $this->Number->format($card->price) ?></p>
									</div>
								</div>
							</div>
							<div class="col d-flex align-items-start" style="padding-left: 0px">
								<div>
									<h3 class="fw-bold mb-0 fs-4">Description :</h3>
									<p><?= $this->Text->autoParagraph(h($card->description)); ?></p>
								</div>
							</div>
							
						</div>
					</div>
                 </section>
				 <div style="margin: 10px; display: flex; flex-direction: row;">
				 <div style="margin-bottom: 10px;">
				 <?php
					$isPresent = false;
					foreach ($cart as $item) {
						if ($item->id == $card->id) {
							$isPresent = true;
						}
					}
					if ($isPresent) {
						echo $this->Html->link('<i class="bi bi-cart-check"></i> Retirer du Panier', ['controller' => 'Cards', 'action' => 'removefromcart', $card->id], ['escapeTitle' => false, "class" => "btn btn-success btn-lg me-4"]);
					} else {
						echo $this->Html->link('<i class="bi bi-cart"></i> Ajouter au Panier', ['controller' => 'Cards', 'action' => 'addtocart', $card->id], ['escapeTitle' => false, "class" => "btn btn-outline-secondary btn-lg me-4"]);
					}
				?>
				</div>

				<div>
					<?php
						if ($this->Identity->isLoggedIn() && $this->Identity->get("admin") == true) {
							echo $this->Html->link('<i class="bi bi-pencil-square"></i> Modifier', ['action' => 'edit', $card->id], ['escapeTitle' => false, "class" => "btn btn-outline-primary btn-lg me-4"]);
						}
					?>
				</div>

				<div>
					<?php
						if ($this->Identity->isLoggedIn() && $this->Identity->get("admin") == true) {
							echo $this->Form->postLink('<i class="bi bi-trash"></i> Supprimer', ['controller' => 'Cards', 'action' => 'delete', $card->id], ['escapeTitle' => false, 'confirm' => 'Êtes-vous sûr de vouloir supprimer cette carte ?', "class" => "btn btn-outline-danger btn-lg me-4", "style" => "min-width: 20%"]);
						}
					?>
				</div>

				<div>
				<?= $this->Html->link('<i class="bi bi-list-columns-reverse"></i> Voir le Pokedex', "https://www.pokemon.com/fr/pokedex/" . $card->name, ['escapeTitle' => false, "class" => "btn btn-info btn-lg"]);?>

				</div>

				</div>
             </div>
			 
       	 </div>
    </section>
</section>

