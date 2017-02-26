<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
</head>

<h1>Liste des utilisateurs</h1>

<div class="ui menu">
    <a class="item">
        <i class="add user icon"></i>
        Nouvel utilisateur...
    </a>
</div>


<table id="example" class="ui celled table" cellspacing="0" width="100%" style="border-color: black">
    <thead style="background-color: lightblue">
    <tr>
        <td>Prénom&nbsp
            <button class="ui icon button"style="background-color: lightblue">
                <i class="caret down"></i>
            </button>
        </td>
        <td>Nom</td>
        <td>Login</td>
        <td>Email</td>
        <td>Rôle</td>
        <td>Actions</td>

    </tr>
    </thead >
<?php foreach ($users as $user) { ?>

    <tbody>
    <tr>
        <td><?= $user->getfirstname() ?></td>
        <td> <?= $user->getlastname() ?></td>
        <td><?= $user->getlogin() ?></td>
        <td><?= $user->getemail() ?></td>
        <td><?= $user->getrole()->getname() ?></td>
        <td><button class="ui icon button">
                <i class="edit icon"></i>
            </button>
            <button class="ui icon button" style="color: red">
                <i class="remove icon"></i>
            </button>
        </td>
    </tr>
    </tbody>

<?php } ?>
    <tfoot>
    <tr>
        <th colspan="8">
            <div class="ui right floated pagination menu">
                <?= $this->tag->linkTo(['index/index/bef', '<', 'class' => 'icon item']) ?>
                <?= $this->tag->linkTo(['index/index/1', '1', 'class' => 'item']) ?>
                <?= $this->tag->linkTo(['index/index/2', '2', 'class' => 'item']) ?>
                <?= $this->tag->linkTo(['index/index/3', '3', 'class' => 'item']) ?>
                <?= $this->tag->linkTo(['index/index/4', '4', 'class' => 'item']) ?>
                <?= $this->tag->linkTo(['index/index/aft', '>', 'class' => 'icon item']) ?>
            </div>
        </th>
    </tr>
    </tfoot>

</table>
</html>

<!-- <tfoot>
    <tr><th colspan="6">
            <div class="ui right floated pagination menu">
                <a class="icon item">
                    <i class="left chevron icon"></i>
                </a>
                <?= $this->tag->linkTo(['.index/index/1', '1', 'class' => 'item']) ?>
                <?= $this->tag->linkTo(['.index/index/2', '2', 'class' => 'item']) ?>
                <?= $this->tag->linkTo(['.index/index/3', '3', 'class' => 'item']) ?>
                <?= $this->tag->linkTo(['.index/index/4', '4', 'class' => 'item']) ?>
                <a class="icon item">
                    <i class="right chevron icon"></i>
                </a>
            </div>
        </th>
    </tr></tfoot>-->