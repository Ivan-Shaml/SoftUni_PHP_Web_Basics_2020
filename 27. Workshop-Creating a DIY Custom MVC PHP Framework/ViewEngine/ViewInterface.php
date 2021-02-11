<?php


namespace ViewEngine;


interface ViewInterface
{
    public function render($model = null, $viewName = null);
}