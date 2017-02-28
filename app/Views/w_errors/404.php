<?php $this->layout('layout', ['title' => '404 NOT FOUND']) ?>

<?php $this->start('main_content'); ?>
<h1>404 NOT FOUND</h1>
<p>Ooops, il semblerait qu'il y ait un problème.</p>
<p><a href=<?= $this->url('default_home') ?>>Retour à l'accueil</a></p>
<?php $this->stop('main_content'); ?>
