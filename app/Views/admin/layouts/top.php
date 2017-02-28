<!DOCTYPE html>
<!-- TOUT EST OK ICI - les liens sont corrects -->
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>ADMIN</title>
</head>
<body>

    <nav class="navbar navbar-default">
        <div class="container">
            <a href=<?= $this->url('default_home') ?> class="navbar-brand">ACCUEIL</a>
            <a href=<?= $this->url('adminHome') ?> class="navbar-brand">ADMIN</a>

            <ul class="nav navbar-nav">
                <!-- lien pour accéder à la page place nom de la route-->
                <li><a href=<?= $this->url('adminPlace') ?>>Places</a></li>
                <!-- lien pour accéder à la page recipe nom de la route-->
                <li><a href=<?= $this->url('adminRecipes') ?>>Recipes</a></li> 
            </ul>
        </div> 
    </nav>

    <div class="container">