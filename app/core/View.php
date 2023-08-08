<?php

namespace app\core;

class View
{
    
    public function render($viewName, $templateName = 'BareTemplate', $params = null)
    {
                
        include 'app/templates/'.$templateName.'.php';                                            //!!!        
    }


}