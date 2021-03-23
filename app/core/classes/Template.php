<?php

namespace App\Core\Classes;

class Template {

    protected function getContent($template, $layout = 'main')
    {
        $content = file_get_contents($_ENV['ROOT_DIR'] . "/views/$template". '.view.php');
        $main = file_get_contents($_ENV['ROOT_DIR'] . "/views/layouts/$layout". '.view.php');

        $data = \str_replace('@content', $content, $main);
        echo $data;
    }

    public function show($template)
    {
        $content = $this->getContent($template);
        // var_dump($content);
    }
}