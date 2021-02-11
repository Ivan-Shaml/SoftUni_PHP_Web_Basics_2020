<?php


namespace Core;


class MvcContext implements MvcContextInterface
{
    private $controllerName;
    private $actionName;
    private $params = [];

    /**
     * MvcContext constructor.
     * @param $controllerName
     * @param $actionName
     * @param array $params
     */
    public function __construct($controllerName, $actionName, array $params)
    {
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
        $this->params = $params;
    }

    /**
     * @return mixed
     */
    public function getControllerName(): ?string
    {
        return $this->controllerName;
    }

    /**
     * @return mixed
     */
    public function getActionName(): ?string
    {
        return $this->actionName;
    }

    /**
     * @return array
     */
    public function getParams(): ?array
    {
        return $this->params;
    }


}