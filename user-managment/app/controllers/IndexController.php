<?php

class IndexController extends ControllerBase
{

    public function indexAction($page=1,$sField="firstname",$sens="asc", $filter=NULL)
    {
        $deb=10*$page-9;
        echo $page;
        $users=User::find([
                "order"=>$sField." ".$sens,
                "offset"=>$deb,
                "limit"=>10]
        );
        $this->view->setVar("users",$users);
    }

}