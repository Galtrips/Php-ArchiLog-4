<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right mt-4"></i> Ajoutez une carte</h3>
        <div class="row mt">
            <div class="col-md-12">
                <section class="task-panel tasks-widget">
                    <div class="panel-heading">
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <h3><i class="fa fa-tasks"></i> Ajoutez une carte</h3>
                            <div class="btn-toolbar">

                            </div>
                        </div>
                        <hr class="my-4">
                    </div>
                    <div class="panel-body">
                        <div class="task-content">
                            <?php echo $this->Form->create($card, ['type' => 'file', 'class' => "form-horizontal style-form"]); ?>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" for="name">Nom du Pokemon</label>
                                <div class="col-sm-10">
                                    <?php
                                    echo $this->Form->control('title', [
                                        'label' => false,
                                        "class" => "form-control",
                                        "name" => "name",
                                        "id" => "name",
                                        "style" => "font-size: 15px;"
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
                                        "style" => "font-size: 15px;"
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
                                        "style" => "font-size: 15px;"
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
                                        "style" => "font-size: 15px;"
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
                                        "style" => "font-size: 15px;"
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
                                        "style" => "font-size: 15px;"
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
                                        "style" => "font-size: 15px;"
                                    ]);
                                    ?>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" for="image">Image de la carte</label>
                                <div class="col-sm-10">
                                    <?php
                                    echo $this->Form->control('image_file', [
                                        'label' => false,
                                        "class" => "form-control",
                                        "name" => "image",
                                        "id" => "image",
                                        "type" => "file",
                                        "style" => "font-size: 15px;"
                                    ]);
                                    ?>
                                </div>
                            </div>

                            <div class="pull-right">
                                <?php
                                echo $this->Form->button('Enregistrer', ['type' => 'submit', 'class' => 'btn btn-outline-primary btn-lg', "style" => "font-size: 15px;"]);
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