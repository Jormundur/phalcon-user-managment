<?php
/**
 * Created by PhpStorm.
 * User: Clément
 * Date: 22/03/2017
 * Time: 13:57
 */
use Ajax\service\JString;
use Ajax\semantic\html\elements\HtmlHeader;
use Ajax\semantic\html\elements\HtmlButton;
use Ajax\semantic\html\content\view\HtmlItem;
use Ajax\semantic\html\base\constants\Color;

class DisplayController extends ControllerBase{
    public function hostAction($idHost="")
    {
        $semantic = $this->semantic;
        $user = Auth::getUser($this);

        $bts="";
        foreach(Color::getConstants() as $k=>$v){
            $bts.=$semantic->htmlButton("btn","Retour à Mes services",$k)->setColor($v)->addIcon("undo");
        }



        $userItems=$semantic->htmlItems("servhost");
        $userItems->fromDatabaseObjects($user->getHost(1), function($userItems){
            $item=new HtmlItem("");
            $item->addIcon("server icon");
            $item->addItemHeaderContent($userItems->getName());
            $item->addContent(["Liste des hôtes virtuels (virtualhosts) par serveur"]);
            return $item;
        });




        $serveur=$semantic->htmlItems("serveurs");
        $serveur->fromDatabaseObjects(Server::find("idHost=".$idHost), function($serveur){
            $item = new HtmlItem("");
            $item->addItemHeaderContent($serveur->getName());
            $item->addContent(new HtmlButton("btnew","Ajouter un virtualhost sur".$serveur->getName()));

           /* $liste=$this->semantic->htmlList("liste");
            $liste->fromDatabaseObjects($serveur->getVirtualhost(), function($liste,$serveur){
                $gbt=$this->semantic->htmlButtonGroups("group",array("",'Configurer','Recharger'));
                $gbt->getItem(0)->addIcon("unhide");
                $gbt->getItem(1)->addIcon('configure');
                $gbt->getItem(2)->addIcon('refresh');
                $gbt->on('click',('/Display/virtualhost/'));
                $liste->addItem(["image"=>"public/img/virtualhost.png","header"=>$serveur->getVirtualhost()->getName(),
                    "description"=>$gbt]);
                $mess=$semantic->htmlMessage("mess3","Auncun hôte virtuel sur le serveur"+$serveur->getName());
                $mess->addIcon("Info Circle");
          });*/    //Partie que je n'ai pas réussi à faire


            return $item;
        });
        $this->jquery->compile($this->view);

    }

    public function virtualhostAction($idVHost=""){
//reste les 2 tableaux que j'ai pour le moment retiré mais probleme pour récupérer le virtualhost (manque lien bouton)
        $semantic = $this->semantic;
        $user = Auth::getUser($this);

        $bts="";
        foreach(Color::getConstants() as $k=>$v){
            $bts.=$semantic->htmlButton("btn","Retour à Mes services",$k)->setColor($v)->addIcon("undo")->getOnClick("My/Index/", "#content-container",["attr"=>"html"]);
        }
        $bts2="";
        foreach(Color::getConstants() as $k=>$v){
            $bts2.=$semantic->htmlButton("btn2","Retour à Apache2 sur srv1",$k)->setColor($v)->addIcon("undo");
        }


        $userItems=$semantic->htmlItems("servhost");
        $userItems->fromDatabaseObjects($user->getHost(1), function($userItems){
            $item=new HtmlItem("");
            $item->addIcon("server icon");
            $item->addItemHeaderContent($userItems->getName());
            $item->addContent(["Liste des hôtes virtuels (virtualhosts) par serveur"]);
            return $item;
        });

        $userItems2=$semantic->htmlItems("virtualhost");
        $userItems2->fromDatabaseObjects(Virtualhost::find("id="."2"), function($userItems2){
            $item=new HtmlItem("");
            $item->addImage($this->url->get("public/img/virtualhost.png"))->setSize("tiny");
            $item->addItemHeaderContent($userItems2->getName());
            $item->addContent(["Propriétés de l'hôte virtuel"]);
            return $item;
        });


        $virt=Virtualhost::find("id="."2");
        $serv=Server::findFirst("idHost=".$idVHost);
        $de=$semantic->dataElement("de1-4",$virt);
        $de->setFields(["Server","Nom","Configuration"]);
      //  $de->setCaptions([$serv->getName(),$virt->getName(),$serv->getConfig()]);


        $lv=$semantic->dataTable("lv1-2","Virtualhostproperty",$serv);
        $lv->setFields(["prop","value","active"]);
        $lv->setCaptions(["Propriété","Valeur","Active?"]);
        $lv->fieldAsCheckbox(2);

        $this->jquery->compile($this->view);

    }
}