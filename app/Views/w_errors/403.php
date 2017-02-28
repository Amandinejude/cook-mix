<?php $this->layout('layout', ['title' => 'Nothing to see here']) ?>
<!-- page d'erreur si accès non autorisé -->
<?php $this->start('main_content'); ?>
<h1>403 ERREUR</h1>
<p>Vous n'avez pas accès à cette partie du site.</p>
<p><a href=<?= $this->url('default_home') ?>>Retour à l'accueil</a></p>
<?php $this->stop('main_content'); ?>
