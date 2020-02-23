
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Changer le mot de passe</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <p class="text-center">Utilisez le formulaire ci-dessous pour changer votre mot de passe. Votre mot de passe ne peut pas être le même que votre nom d'utilisateur.</p>
            <form method="post" id="passwordForm">
                <input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="Ancien mot de passe" autocomplete="off">

                <input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="Nouveau mot de passe" autocomplete="off">
                <div class="row">
                    <div class="col-sm-6">
                        <span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> 8 Characters Long<br>
                        <span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Uppercase Letter
                    </div>
                    <div class="col-sm-6">
                        <span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Lowercase Letter<br>
                        <span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Number
                    </div>
                </div>
                <input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="Confirmer le nouveau mot de passe" autocomplete="off">
                <div class="row">
                    <div class="col-sm-12">
                        <span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Passwords Match
                    </div>
                </div>
                <input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Changer le mot de passe">
            </form>
        </div><!--/col-sm-6-->
    </div><!--/row-->
</div>