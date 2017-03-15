<?php

/**
 * Class ProductsController
 * @property Ajax\JsUtils $jquery
 */
class ProductsController extends ControllerBase
{
    protected $semantic;



    public function initialize(){
        $this->semantic=$this->jquery->semantic();
    }

    public function indexAction()
    {
        $produits=products::find();
        $lv=$this->semantic->dataTable("lv","products",$produits);
        $lv->setFields(["name","productTypes"]);
        $lv->setCaptions(["Nom","Type"]);
        $lv->setColWidths([8,8]);
        $lv->setTargetSelector("#lv2-6-detail");
        $lv->setIdentifierFunction("getId");
        $lv->getOnRow("click","products/detail","#lv2-6-detail",["attr"=>"data-ajax","preventDefault"=>false,"stopPropagation"=>false]);
        $lv->addEditButton(true);
        $lv->setUrls([edit=>"products/form"]);
        $lv->setActiveRowSelector("error");

        $this->jquery->compile($this->view);

    }

    public function detailAction($value){

        $prod=products::findFirst("id=".$value);
        $de=$this->semantic->dataElement("de2",$prod);
        $de->setFields(["name","productTypes","price","active"]);
        echo $de;
    }

    public function formAction($value){
        $prodf=products::findFirst("id="+$value);
        $df=$this->semantic->dataForm("form",$prodf);
        $df->setFields(["name","product_types_id","price","active","Modifier"]);
        $df->fieldAsDropdown("product_types_id",\Ajax\service\JArray::modelArray(ProductTypes::find(),"getId","getName"));
        $df->fieldAsSubmit("Modifier","green fluid","products/submit","#form");
        echo $df;
    }

public function submitAction(){
}

}

/**
 * @var Ajax\Semantic
 */