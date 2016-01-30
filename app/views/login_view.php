<h1 align="center">Welcome to our Web-Site</h1>
    <div class="content_login">
        <img src="/images/persona-logo.png"  width="350" >
        <form method="post">
            <input type="text" id="login_text" name="login" required><br>
            <input type="password" id="password_text" name="password" required><br>
            <input type="submit" id="login_button">
        </form>
    </div>

    <?php

        extract($data);

        if($session == "access_granted") {
            header('Location:/Display/1/');
        } else if($login_status == "access_denied") { ?>
        <p style="color:red"> Authorisation failure. </p>
        <?php } ?>