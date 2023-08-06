<?php

namespace app\core;

class View
{
    protected $viewName;
    protected $templateName;
    protected $params;

    
    public function render($viewName, $templateName = 'BareTemplate', $params = null)
    {
        if (is_array($params)){
            extract($params);
        }
        
        include 'app/templates/'.$templateName.'.php';                                            //!!!        
    }


}