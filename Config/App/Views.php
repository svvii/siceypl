<?php
class Views{
    public function getViews($controlador,$vista, $data="")
    {
        $controlador = get_class($controlador);
        if($controlador =="Home"){
            $vista = "Views/".$vista.".php";
        }else{
            $vista = "Views/".$controlador."/".$vista.".php";
        }
        require $vista;
    }
}

?>