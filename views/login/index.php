<div id="login-form">
        <h1>Авторизация на сайте</h1>
        <fieldset>
            <form action="http://<?php echo $_SERVER['SERVER_NAME'];?>/login/login_user" method="post">
                <input type="email" required value="Логин" name="login" onBlur="if(this.value=='')this.value='Логин'" onFocus="if(this.value=='Логин')this.value='' ">
                <input type="password" required value="Пароль" name="pass" onBlur="if(this.value=='')this.value='Пароль'" onFocus="if(this.value=='Пароль')this.value='' ">
                <input type="submit" value="ВОЙТИ">
                <footer class="clearfix">
                    <p><span class="info">?</span><a href="#">Забыли пароль?</a></p>
                </footer>
            </form>
        </fieldset>
    </div>

