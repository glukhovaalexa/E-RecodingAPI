<?php

namespace App\Core\Classes;

class Template {

    protected function getContent($template, $layout = 'main')
    {
        ob_start();
        $content = "C:\\xampp\htdocs\E-RecodingAPI" . "/views/$template". '.view.php';
        $main = "C:\\xampp\htdocs\E-RecodingAPI" . "/views/layouts/$layout". '.view.php';

        // var_dump($buffer);
        // exit;
        // $content = require_once $content;
        // $main = require_once $main;
        $buffer = ob_get_contents();
        echo $buffer;

        $cont = \str_replace('@content', $content, $main);
        // require_once $main;

        // ob_end_clean();
        exit;
    }

    public function show($template)
    {
        $content = $this->getContent($template);
        // var_dump($content);
    }
}