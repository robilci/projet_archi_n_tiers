
<?php

$Auth = new \App\controller\AuthentificationController();
if ($Auth->user('Prenom')): ?>
<h1> Bonjour <?php echo $Auth->user('Nom');?>
    <a href="/user">My info</a>
    <?php   endif;
    ?></h1>
