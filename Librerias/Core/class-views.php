<?php

class Views
{
    /**
     * get_view
     * Obtiene las distintas vistas
     * @param  mixed $controlller
     * @param  mixed $view
     * @param  mixed $data
     * @return void
     */
    public function get_view($controlller, $view, $data = "")
    {
        $controlller = get_class($controlller);
        if ($controlller == "Home") {
            $view = "Views/" . $view . ".php";
        } else {
            $view = "Views/" . $controlller . "/" . $view . ".php";
        }
        require_once $view;

    }

}

// EOF
