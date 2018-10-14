<?php

class TestController extends DController
{
    public function __construct()
    {
        parent::__construct();
        //Session::checkSession();
    }
    public function TestMethod(){
        $this->load->view("frontEnd/master");
    }
    public function test(){
        $this->load->view("frontEnd/master");
    }
    public function perametterdouble($data=null){
        $this->load->view("frontEnd/master");
    }


}
?>