<?php $this->layout('layout'); ?>

<?php $this->start('main_content') ?>   

	<!-- ici on affiche les infos de l'utilisateur
	+ lien suppression
	+lien modification -->
	<div style=" text-align: center; ">
		<h3>Mes infos</h3><br>
		<p>Nom : <?= $_SESSION["user"]["us_name"]; ?></p>

		<p>Prénom : <?= $_SESSION["user"]["us_firstname"]; ?> </p>

		<p>Email : <?= $_SESSION["user"]["us_email"]; ?> </p><br>

		<a href=<?= $this->url('updateProfil') ?>>Modifier mes infos</a><br>
		<a href=<?= $this->url('deleteProfil') ?>>Supprimer mon compte</a><br>

		<h3>Mes favoris</h3>


		<div class="row">
                <div class="col-lg-12">
                    <div id="portfoliolist">
                        <?php foreach ($favorites as $favorite): ?>
                            <div class="portfolio web placeId" data-cat="web" href="#portfolioModa<?= $favorite["pl_id"] ?>" data-toggle="modal" id=<?= $favorite["pl_id"] ?>>
                                <div class="portfolio-wrapper">
                                   
                                    <img src=<?= $this->assetUrl($favorite["pl_picture"])?> alt="">
                                    <div class="caption">
                                        <div class="caption-text">
                                           
                                            <a class="text-title"><?= $favorite["pl_name"] ?></a>
                                            <span class="text-category"><?= $favorite["pl_instagram"] ?></span>
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
<?php $this->stop('main_content') ?>