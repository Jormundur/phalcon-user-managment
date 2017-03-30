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

class MyController extends ControllerBase{

    //Manque la redirection des boutons qui ne fonctionnait pas et ajouter les icones
    public function indexAction(){
        $semantic=$this->semantic;
        $user = Auth::getUser($this);
        $userItems=$semantic->htmlItems("servhost");
        $userItems->fromDatabaseObjects($user->getHost(), function($userItems){
            $item=new HtmlItem("");
            $item->addImage($this->url->get("public/img/host.png"));
            $item->addContent([$userItems->getIpv4()]);
            $item->addItemHeaderContent($userItems->getName());
            $gbt=$this->semantic->htmlButton("","Virtualhosts");
            $gbt->addIcon("snapchat ghost");
            $gbt->getOnClick("Display/host/", "#content-container",["attr"=>"html"]);
            $item->addContent([$gbt]);
            return $item;
        });
//pensez à NOT IN
        $virhost=$semantic->htmlItems("servirthost");
        $virhost->fromDatabaseObjects(Virtualhost::find("idUser=".$user->getId()), function($virhost){
            $item=new HtmlItem("");
            $item->addImage($this->url->get("public/img/virtualhost.png"))->setSize("tiny");
            $item->addContent([$virhost->getName()]);
            $item->addItemHeaderContent($virhost->getName());
            $gbt=$this->semantic->htmlButtonGroups("group",array("",'Configurer','Recharger'));
            $gbt->getItem(0)->addIcon("unhide");
            $gbt->getItem(1)->addIcon('configure');
            $gbt->getItem(2)->addIcon('refresh');
            $gbt->getItem(0)->getOnClick("Display/virtualhost/"+$virhost->getId(), "#content-container",["attr"=>"html"]);
            $item->addContent([$gbt]);


            return $item;
        });


        $this->jquery->compile($this->view);

    }


}
