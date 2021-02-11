<?php


namespace Core;


interface MvcContextInterface
{
    public function getControllerName(): ?string;
    public function getActionName(): ?string;
    public function getParams(): ?array;
}