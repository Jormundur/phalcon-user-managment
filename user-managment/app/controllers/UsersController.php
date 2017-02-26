<?php

use Phalcon\Mvc\Controller;

class UsersController extends ControllerBase
{

    public function indexAction($sField="firstname",$sens="asc",$filter=NULL){
    $users=users::find();
    }

    public function formAction($id = NULL){


    }

    public function updateAction($id = NULL){
        $user=User::findFirst($id);
        $this->view->setVar("user",$user);
    }

    public function deleteAction($id){
        $user=User::findFirst($id);
        $this->view->setVar("user",$user);

    }

    public function messageAction($id,$action=""){


    if($action == "update") {
        $user=User::findFirst($id);
        if (!empty($_POST['prenom'])) {
            $prenom = $_POST['prenom'];
            $user->setFirstname($prenom);
        }

        if (!empty($_POST['nom'])) {
            $nom = $_POST['nom'];
            $user->setLastname($nom);
        }
        if (!empty($_POST['login'])) {
            $login = $_POST['login'];
            $user->setLogin($login);
        }
        if (!empty($_POST['mdp'])) {
            $mdp = $_POST['mdp'];
            $user->setPassword($mdp);
        }
        if (!empty($_POST['mail'])) {
            $mail = $_POST['mail'];
            $user->setEmail($mail);
        }
        if (!empty($_POST['role'])) {
            $role = $_POST['role'];
            $user->setIdrole(2);
        }
        $user->save();
    }

        if($action == "add") {
            $user = new User();
            if (!empty($_POST['prenom'])) {
                $prenom = $_POST['prenom'];
                $user->setFirstname($prenom);
            }

            if (!empty($_POST['nom'])) {
                $nom = $_POST['nom'];
                $user->setLastname($nom);
            }
            if (!empty($_POST['login'])) {
                $login = $_POST['login'];
                $user->setLogin($login);
            }
            if (!empty($_POST['mdp'])) {
                $mdp = $_POST['mdp'];
                $user->setPassword($mdp);
            }
            if (!empty($_POST['mail'])) {
                $mail = $_POST['mail'];
                $user->setEmail($mail);
            }
            if (!empty($_POST['role'])) {
                $role = $_POST['role'];
                $user->setIdrole(2);
            }
            $user->save();
        }




        $this->view->setVar("user",$user);
    }
}
