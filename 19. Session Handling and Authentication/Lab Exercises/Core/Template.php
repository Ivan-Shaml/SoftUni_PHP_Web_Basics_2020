<?php


namespace Core;


class Template implements TemplateInterface
{
    const TEMPLATE_FOLDER = "/App/Views/";
    const TEMPLATE_EXTENSION = ".php";

    public function render(string $templateName, $data = null)
    {
        require_once self::TEMPLATE_FOLDER
            . $templateName
            . self:: TEMPLATE_EXTENSION;
    }
}