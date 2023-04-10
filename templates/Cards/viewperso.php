<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <!-- <h3><i class="fa fa-angle-right"></i> Cards list</h3> -->
    <div class="row mt">
      <div class="panel-heading">
        <section class="task-panel tasks-widget" style="margin-top: 40px">
          <div class="panel-heading">
            <div class="d-flex justify-content-between align-items-center mt-3">
              <h3><i class="fa fa-tasks"></i> Tes cartes à vendre</h3>
              <div class="btn-toolbar">
                <?php echo $this->Html->link('Ajouter une nouvelle cartes', ['controller' => 'Cards', 'action' => 'create'], ['escapeTitle' => false, "class" => "btn btn-outline-secondary btn-lg pull-right"]); ?>
              </div>
            </div>
            <hr class="my-4">
          </div>
          <div class="panel-body">
            <div style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: space-around;">
              <?php
              foreach ($cards as $card) {
                echo '<div class="mb-4" style="margin: 15px; width: 18%;">';
                $innerHTML = '<img src="' . $card->image . '" class="card-img-top" alt="' . $card->name . '" >';
                echo $this->Html->link($innerHTML, ['controller' => 'Cards', 'action' => 'view', $card->id], ['escapeTitle' => false]);
                echo '<hr class="my-4">';
                echo '<div style="display: flex; flex-direction: row; flex-wrap: wrap;">';
                echo $this->Html->link('Voir les détails', ['controller' => 'Cards', 'action' => 'view', $card->id], ['escapeTitle' => false, "class" => "btn btn-outline-primary btn-lg me-3", "style" => "width: 75%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; min-width: 75%;"]);
                echo $this->Form->postLink('<i class="bi bi-trash"></i>', ['controller' => 'Cards', 'action' => 'delete', $card->id], ['escapeTitle' => false, 'confirm' => 'Êtes-vous sûr de vouloir supprimer cette carte ?', "class" => "btn btn-outline-danger btn-lg", "style" => "min-width: 20%"]);
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