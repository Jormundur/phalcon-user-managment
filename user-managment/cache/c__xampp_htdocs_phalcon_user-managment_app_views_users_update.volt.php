<html>
<h1>Edition d'un utilisateur</h1>
<body>
<div class="ui menu">
    <a class="item" href=<?= $this->url->get('index/index') ?>>
        <i class="sign out icon"></i>
        Retour à la liste
    </a>
</div>
<form method="post" action="<?= $this->url->get('users/message/update/' . $user->getId()) ?>">
    <table class="ui celled table">
        <tr>
            <td>
                Prénom</br>
                <div class="ui input focus">
                    <input type="text" name="prenom" value="<?= $user->getFirstname() ?>">
                </div>
            </td>
            <td>
                <b>Nom</b></br>
                <div class="ui input focus">
                    <input type="text" name="nom" value="<?= $user->getLastname() ?>">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <b>Login*</b></br>
                <div class="ui input focus">
                    <input type="text" name="login" value="<?= $user->getLogin() ?>">
                </div>
            </td>
            <td>
                <b>Mot de passe*</b></br>
                <div class="ui input focus">
                    <input type="password" name="mdp" value="<?= $user->getPassword() ?>">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <b>Email*</b></br>
                <div class="ui input focus">
                    <input type="text" name="mail" value="<?= $user->getEmail() ?>">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <b>Role</b></br>
                <div class="ui input focus">
                    <input type="text" name="role" value="<?= $user->getRole()->getName() ?>">
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