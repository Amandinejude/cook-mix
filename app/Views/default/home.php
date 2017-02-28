<?php $this->layout('layout'); ?>

<?php $this->start('main_content') ?>    
    <section>
        <div class="container text-center wow fadeIn">
            <div class="row content-row">
                <div class="col-lg-12">
                    <div class="portfolio-filter">
                        <ul id="filters" class="clearfix">
                            <li>
                                <input id="recherche" class="form-control" name="Recette" data-provide="typehead">
                            </li>
                            <li>
                                <span class="filter" data-filter="identity graphic logo web" id="places">Restaurants</span>
                            </li>
                            <li>
                                <span class="filter" data-filter="web graphic" id="recipes">Recette</span>
                            </li>
                        </ul>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div id="portfoliolist">
                        <?php foreach ($places as $place): ?>
                            <div class="portfolio web placeId" data-cat="web" href="#portfolioModa<?= $place["pl_id"] ?>" data-toggle="modal" id=<?= $place["pl_id"] ?>>
                                <div class="portfolio-wrapper">
                                   <!--Ici j'insere mes requetes et je pointe vers le dossier miniatures pour afficher les qui correspondent au résultat de cafés qui s'affiche. -->
                                    <img src=<?= $this->assetUrl($place["pl_picture"])?> alt="">
                                    <div class="caption">
                                        <div class="caption-text">
                                           <!-- Ici j'insere mes requetes pour afficher le nom et l'adresse du café. -->
                                            <a class="text-title"><?= $place["pl_name"] ?></a>
                                            <span class="text-category"><?= $place["pl_instagram"] ?></span>
                                        </div>
                                        <div class="caption-bg"></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>    


   
    
    
    
    <?php foreach ($places as $place): ?>
        <!-- Example Modal 2 -->
        <div class="portfolio-modal modal fade" id="portfolioModa<?= $place["pl_id"] ?>" tabindex="-1" role="dialog" aria-hidden="true" style="background-image: url(<?= $this->assetUrl($place["pl_picture"])?>)">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                               <!--Ici j'insere ma requete pour afficher le nom du café ainsi que la description du cafe. -->
                                <h2><?= $place["pl_name"] ?></h2>
                                <hr class="colored">
                                <p><?= $place["pl_description"] ?></p>
                            </div>
                            <div class="col-lg-8 col-lg-offset-2">
                                <ul class="list-inline item-details">
                                    <li><i class="fa fa-phone"></i>
                                        <strong><a href="tel:<?= $place["pl_tel"] ?>"><?= $place["pl_tel"] ?></a>
                                        </strong>
                                    </li>
                                    <li><i class="fa fa-map-marker"></i>
                                        <strong><a href=<?= $place["pl_website"] ?>><?= $place["pl_website"] ?></a>
                                        </strong>
                                    </li>
                                    <li><i class="fa fa-external-link-square" aria-hidden="true"></i>
                                        <strong><a href=<?= $place["pl_website"] ?>><?= $place["pl_website"] ?></a>
                                        </strong>
                                    </li>
                                    
                                    <li><i class="fa fa-instagram" aria-hidden="true"></i>
                                        <strong><a href=<?= $place["pl_instagram"] ?>><?= $place["pl_instagram"] ?></a>
                                        </strong>
                                    </li>
                                    
                                    <li><i class="fa fa-heart" aria-hidden="true"></i>
                                        <strong><a href="http://startbootstrap.com">Ajouter aux favoris</a>
                                        </strong>
                                    </li>                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php $this->stop('main_content') ?>