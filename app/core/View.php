<?php

namespace app\core;

class View
{    
    public function render($viewName, $templateName = 'BareTemplate', $params = null, $pageName = 'humbleplants')
    {                
        include 'app/templates/'.$templateName.'.php';                                                   
    }
}