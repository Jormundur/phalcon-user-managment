<!DOCTYPE html>
<head>

</head>

<h1>Liste des utilisateurs</h1>

<div class="ui menu">
    <a class="item" href={{ url("users/form/") }}>
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
{% for user in users %}

    <tbody>
    <tr>
        <td>{{  user.getfirstname() }}</td>
        <td> {{ user.getlastname() }}</td>
        <td>{{ user.getlogin() }}</td>
        <td>{{ user.getemail() }}</td>
        <td>{{ user.getrole().getname() }}</td>
        <td>
            {{linkTo("users/update/"~user.getId(), "<i class='bordered edit icon'></i>")}}
            {{linkTo("users/message/delete/"~user.getId(), "<i class='bordered red remove icon'></i>")}}
        </td>
    </tr>
    </tbody>

{% endfor %}
    <tfoot>
    <tr>
        <th colspan="8">
            <div class="ui right floated pagination menu">
                {{ link_to("index/index/bef", "<", "class": "icon item") }}
                {{ link_to("index/index/1", "1", "class": "item") }}
                {{ link_to("index/index/2", "2", "class": "item") }}
                {{ link_to("index/index/3", "3", "class": "item") }}
                {{ link_to("index/index/4", "4", "class": "item") }}
                {{ link_to("index/index/aft", ">", "class": "icon item") }}
            </div>
        </th>
    </tr>
    </tfoot>

</table>
</html>
