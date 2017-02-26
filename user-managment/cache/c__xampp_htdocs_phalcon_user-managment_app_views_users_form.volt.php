<html>
<h1>Edition d'un utilisateur</h1>
<body>
<div class="ui menu">
    <a class="item" href=<?= $this->url->get('index/index') ?>>
        <i class="sign out icon"></i>
        Retour à la liste
    </a>
</div>
<form method="post" action="<?= $this->url->get('users/message/add/') ?>">
<table class="ui celled table">
    <tr>
        <td>
            Prénom</br>
            <div class="ui input focus">
                <input type="text">
            </div>
        </td>
        <td>
            <b>Nom</b></br>
            <div class="ui input focus">
                <input type="text">
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <b>Login*</b></br>
            <div class="ui input focus">
                <input type="text">
            </div>
        </td>
        <td>
            <b>Mot de passe*</b></br>
            <div class="ui input focus">
                <input type="password">
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <b>Email*</b></br>
            <div class="ui input focus">
                <input type="text">
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <b>Role</b></br>
            <div class="ui input focus">
                <input type="text">
            </div>
        </td>
    </tr>
</table>
    <div class="ui two bottom attached buttons">
        <input type="submit" class="fluid ui green button" value="Sauvegarder">
        <input type="reset" class="fluid ui grey button">
    </div>

</form>
</body>










</html>