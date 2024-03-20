<?php

class Errors extends Controller{
    public function index()
    {
        $this->views->getViews($this,"index") ;
    }
    public function permisos()
    {
        $this->views->getViews($this,"permisos") ;
    }

}

?>