<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <div class="signup-form"><!--sign up form-->
                    <h2>Вход на сайт</h2>
                    <form action="#" method="post">
                        <input type="text" name="login" placeholder="login">
                        <input type="password" name="password" placeholder="Пароль">
                        <input type="submit" name="submit" class="btn btn-default" value="Вход"/>
                    </form>
                </div><!--/sign up form-->
                <h3>
                    <?php $messenger->printError(); ?>
                </h3>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>