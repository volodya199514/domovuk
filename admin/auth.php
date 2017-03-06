<div class="center_admin">
    <div class="admin_login">

        <form method="POST">
            <?php
                if($_SESSION['auth_error']==0){
                    echo  '<div class="login_error">';
                }else{
                    echo  '<div class="login">';
                }?>

                <input  type="text"  name="login" placeholder="Ввести логін" >
                <img class="login_img" src="/admin/img/detalipsdadmin/entery_form_s.png">
                <img class="login_feis" src="/admin/img/detalipsdadmin/face.png">
            </div>

            <?php
                if($_SESSION['auth_error']==0){
                    echo  '<div class="password_error">';
                }else{
                    echo  '<div class="password">';
                }?>

                <input type="password"  name="password" placeholder="Ввести пароль">
                <img class="pasword_img" src="/admin/img/detalipsdadmin/entery_form_s.png">
                <img class="pasword_key" src="/admin/img/detalipsdadmin/key.png">
            </div>
            <div class="vhid_button">
               <a href="category">
                <input type="submit"  value="Вхід" name="auth">
                </a>
            </div>
        </form>

    </div>
</div>

