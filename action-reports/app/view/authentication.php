
<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <img src="/image/pompier.png" id="icon" alt="User Icon" />
        </div>

        <!-- Login Form -->


        <form action="/home" method="post">
            <?php
            if(isset($error))
                if($error != ""){
                    echo "<div class='alert alert-danger'>
                          ".$error."
                    </div>";
                }
            ?>
            <input type="text" id="login" class="fadeIn second" name="email" placeholder="login">
            <input type="text" id="password" class="fadeIn third" name="pass" placeholder="password">
            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>
    </div>
</div>