<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right mt-4"></i> Modifier une carte</h3>
        <div class="row mt">
            <div class="col-md-12">
                <section class="task-panel tasks-widget">
                    <div class="panel-heading">
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <h3><i class="fa fa-tasks"></i> Modifier une carte</h3>
                            <div class="btn-toolbar">

                            </div>
                        </div>
                        <hr class="my-4">
                    </div>
                    <div class="panel-body">
                        <div class="task-content" style=" display: flex; flex-direction: row;">

                            <?php
                                echo $this->Html->image($card->image, ["style" => "width: 500px; margin-right: 30px"]);
                            ?>
                            
                            <?php echo $this->Form->create($card, ['type' => 'post', 'class' => "form-horizontal style-form", "style" => "display: block; width: 100%;"]); ?>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" for="name">Nom du Pokemon</label>
                                <div class="col-sm-10">
                                    <?php
                                    echo $this->Form->control('title', [
                                        'label' => false,
                                        "class" => "form-control",
                                        "name" => "name",
                                        "id" => "name",
                                        "style" => "font-size: 15px;",
                                        "value" => $card->name
                                    ]);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" for="description">Description complète de la Carte</label>
                                <div class="col-sm-10">
                                    <?php
                                    echo $this->Form->control('content', [
                                        'label' => false,
                                        "class" => "form-control",
                                        "name" => "description",
                                        "id" => "description",
                                        "type" => "textarea",
                                        "style" => "font-size: 15px;",
                                        "value" => $card->description
                                    ]);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" for="quantity">Quantité de Carte</label>
                                <div class="col-sm-10">
                                    <?php
                                    echo $this->Form->control('quantity', [
                                        'label' => false,
                                        "class" => "form-control",
                                        "name" => "quantity",
                                        "id" => "quantity",
                                        "type" => "number",
                                        "style" => "font-size: 15px;",
                                        "value" => $card->quantity
                                    ]);
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" for="price">Prix de la Carte</label>
                                <div class="col-sm-10">
                                    <?php
                                    echo $this->Form->control('price', [
                                        'label' => false,
                                        "class" => "form-control",
                                        "name" => "price",
                                        "id" => "price",
                                        "style" => "font-size: 15px;",
                                        "value" => $card->price
                                    ]);
                                    ?>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" for="type">Type de la carte</label>
                                <div class="col-sm-10">
                                    <?php
                                    $type = [
                                        "Normal" => "Normal",
                                        "Feu" => "Feu",
                                        "Eau" => "Eau",
                                        "Plante" => "Plante",
                                        "Electrique" => "Electrique",
                                        "Psy" => "Psy",
                                        "Combat" => "Combat",
                                        "Tenèbre" => "Tenèbre",
                                        "Acier" => "Acier",
                                        "Spectre" => "Spectre",
                                        "Fée" => "Fée",
                                        "Dragon" => "Dragon",
                                    ];

                                    echo $this->Form->select('type', $type, [
                                        'default' => '0',
                                        'id' => 'type',
                                        'class' => 'form-control',
                                        'name' => 'type',
                                        'label' => false,
                                        "style" => "font-size: 15px;",
                                        "value" => $card->type
                                    ]);
                                    ?>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" for="version">Version d'origine</label>
                                <div class="col-sm-10">
                                    <?php
                                    $version = [
                                        "Inconnue" => "Inconnue",
                                        "Rouge / Bleu" => "Rouge / Bleu",
                                        "Sapphir / Rubis" => "Sapphir / Rubis",
                                        "Argent / Or" => "Argent / Or",
                                        "Diamant / Perle" => "Diamant / Perle",
                                        "Noir / Blanc" => "Noir / Blanc",
                                        "X / Y" => "X / Y",
                                        "Soleil / Lune" => "Soleil / Lune",
                                        "Épée / Bouclier" => "Épée / Bouclier",
                                        "Violet / Écarlate" => "Violet / Écarlate",
                                    ];

                                    echo $this->Form->select('version', $version, [
                                        'default' => '0',
                                        'id' => 'version',
                                        'class' => 'form-control',
                                        'name' => 'version',
                                        'label' => false,
                                        "style" => "font-size: 15px;",
                                        "value" => $card->version
                                    ]);
                                    ?>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" for="rarity">Rareté de la carte</label>
                                <div class="col-sm-10">
                                    <?php
                                    $rarity = [
                                        "Commune" => "Commune",
                                        "Peu Commune" => "Peu Commune",
                                        "Rare" => "Rare",
                                        "Epique" => "Epique",
                                        "Legendaire" => "Legendaire",
                                        "Innestimable" => "Inestimable",
                                    ];

                                    echo $this->Form->select('rarity', $rarity, [
                                        'default' => '0',
                                        'id' => 'rarity',
                                        'class' => 'form-control',
                                        'name' => 'rarity',
                                        'label' => false,
                                        "style" => "font-size: 15px;",
                                        "value" => $card->rarity
                                    ]);
                                    ?>

                                </div>
                            </div>

                            <div class="pull-right" style=" display: flex; flex-direction: row;">
                                <?php
                                echo $this->Html->link('<i class="bi bi-backspace-fill"></i> Retour', ['controller' => 'Cards', 'action' => 'view', $card->id], ['class' => 'btn btn-outline-secondary btn-lg', "style" => "font-size: 15px; margin-right: 10px;", "escapeTitle" => false]);
                                echo $this->Form->button('<i class="bi bi-pencil-square"></i> Modifier', ['type' => 'submit', 'class' => 'btn btn-outline-primary btn-lg', "style" => "font-size: 15px;", "escapeTitle" => false]);
                                ?>
                            </div>
                            <?= $this->Form->end(); ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>