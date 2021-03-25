<?php

namespace App\Core\Classes;

class Template {

    public function show($template)
    {
        $content = $this->getContent($template);
    }

    protected function getContent($template)
    {
        $content = $this->getSection($template);
        $main = $this->getLayout();
        $data = \str_replace('@content', $content, $main);
        echo $data;
    }

    protected function getSection($template)
    {
        ob_start();
        require_once $_ENV['ROOT_DIR'] . "/views/$template". '.view.php';
        $out1 = ob_get_contents();
        ob_end_clean();
        return $out1;
    }

    protected function getLayout($layout = 'main')
    {
        ob_start();
        require_once $_ENV['ROOT_DIR'] . "/views/layouts/$layout". '.view.php';
        $out1 = ob_get_contents();
        ob_end_clean();
        return $out1;
    }

}