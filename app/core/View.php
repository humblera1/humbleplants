<?php

namespace app\core;

class View
{
    protected $viewName;
    protected $templateName;
    protected $params;

    public function __construct()
    {
        $this->templateName = 'Bare';
    }
    public function render($viewName, $params = null, $templateName)
    {
        if (is_array($params)){
            extract($params);
        }
        include '../app/templates'.$templateName.'.php';                                            //!!!        
    }


}