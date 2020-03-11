
<?php
 $Auth = new \App\controller\AuthenticationController();
 //check if the user is logged in
if($Auth->user('Prenom')):?>
<h1> Bonjour <?php echo  $Auth->user('Nom');?></h1>
<ul>
    <li>
        <a href="/myAccount"> Mon compte </a>
    </li>
    <?php if($Auth->user('role')=='Permissions globales'):?>
        <li>
            <a href="/admin"> administration </a>
        </li>
    <?php endif ?>
    <li> <a href="/logout"> Se deconnecter  </a></li>
</ul>
<?php else: ?>
    <li> <a href="/"> Se connecter  </a></li>
<?php endif ?>


