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

        $gbt->getItem(0)->setProperty("mouseover","");
        $this->jquery->compile($this->view);

    }

    public function page1Action(){
        echo "Page 1 !";
    }

    public function page2Action(){
        echo "Page 2 !";
    }

}

