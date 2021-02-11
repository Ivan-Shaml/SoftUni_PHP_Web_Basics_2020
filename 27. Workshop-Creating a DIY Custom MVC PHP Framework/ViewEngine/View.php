<?php


namespace ViewEngine;


use Core\MvcContext;
use Core\MvcContextInterface;

class View implements ViewInterface
{
    const VIEW_FOLDER = 'views/';
    const VIEW_EXTENSION = '.php';

    /** @var MvcContextInterface $mvcContext */
    private $mvcContext;

    public function __construct(MvcContextInterface $mvcContext)
    {
        $this->mvcContext = $mvcContext;
    }


    public function render($model = null, $viewName = null)
    {
        if ($viewName != null){
            if (strstr($viewName, '.')){
                include self::VIEW_FOLDER . $viewName;
            }else {
                include self::VIEW_FOLDER . $viewName . self::VIEW_EXTENSION;
            }
        } else {
            $folder = strtolower($this->mvcContext->getControllerName());
            $name = strtolower($this->mvcContext->getActionName());
            $viewName = $folder . DIRECTORY_SEPARATOR . $name;
            include self::VIEW_FOLDER . $viewName . self::VIEW_EXTENSION;
        }
    }
}