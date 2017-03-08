<?php



class TestController extends ControllerBase{
    protected $semantic;

    public function initialize(){
        $this->semantic=$this->jquery->semantic();
    }


    public function ajaxAction($value){
        $semantic = $this->jquery->semantic();
        $bt = $semantic->htmlButton("btReturn", "Return to index/index", "teal basic");
        $bt->onClick($this->jquery->doJQueryDeferred("#ajaxResponse", "html", "Return clicked"));
        $message = $semantic->htmlMessage("msg", "You clicked the button with value : <b>" . $value . "</b><br>", "info");
        echo $message->addContent($bt)->setIcon("info")->setDismissable();
        echo $this->jquery->compile($this->view);
        $this->view->disable();
    }

    public function hideShowAction(){
        $semantic=$this->jquery->semantic();
        $message=$this->semantic->htmlMessage("zone");
        $chb=$semantic->htmlCheckbox("checkb","Masquer/Afficher");
        $chb->on("change",$message->jsToggle("$(this).prop('checked')"));


        $this->jquery->compile($this->view);

    }
    public function changeCssAction(){
        $semantic=$this->jquery->semantic();
        $gbt =$this->semantic->htmlButtonGroups("group",array('Page 1','Page 2'));
        $gbt->getItem(0)->setProperty("data-ajax","page1");
        $gbt->getItem(1)->setProperty("data-ajax","page2");
        $gbt->getOnCLick("test","#contpage",["attr"=>"data-ajax"]);

        $mbt1=$semantic->htmlButton("mobt1","Hello");
        $mbt2=$semantic->htmlButton("mobt2","Bonjour");

        $mbt1->setProperty("data-description","Description du bouton 1!");
        $mbt2->setProperty("data-description","Description du bouton 2!");

        $loadbt=$semantic->htmlButton("btload","Chargement");
        $loadbt->setProperty("data-ajax","page3");
        $loadbt->getOnCLick("test","#page3",["attr"=>"data-ajax"]);

        $mbt1->on("mouseover",$this->jquery->html("#contpage",$mbt1->getProperty("data-description")));
        $mbt2->on("mouseover",$this->jquery->html("#contpage",$mbt2->getProperty("data-description")));


        $this->jquery->compile($this->view);

    }

    public function page1Action(){
        echo "Page 1 !";
    }

    public function page2Action(){
        echo "Page 2 !";
    }

    public function page3Action(){
        $this->view->disable;
        echo "Lucas est moche";
        echo "<div id=\"page4\"></div>";

        $this->jquery->get("test/page4","#page4");
        echo $this->jquery->compile();

    }

    public function page4Action(){
        $this->view->disable();
        echo " Mais on l'aime bien quand même";
    }

    public function postFormAction(){
        $semantic=$this->jquery->semantic();
        $form=$semantic->htmlForm("frm1");
        $form->addErrorMessage();
        $form->addInput("firstname","First Name")->addRule("empty");
        $form->addInput("lastname","Last Name")->addRules(["empty","minLength[6]"]);
        $form->addCheckbox("ckAgree","I agree to the Terms and Conditions",NULL,"toggle")->addRule("checked");
        $form->addButton("btSubmit1","Submit")->asSubmit();
        $form->submitOn("click","btSubmit1","test","#response");
        echo $this->jquery->compile($this->view);
    }
}

