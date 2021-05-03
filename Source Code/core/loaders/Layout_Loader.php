<?php

class Layout_Loader {
    
    private $_layout = 'default';
    
    public function set($layout) {
        $this->_layout = $layout;
    }
    
    public function load($data) {
        
        extract($data);

        if ($this->_layout === null) {
            echo $content;
            exit;
        }
        
        $layout_path = APP_PATH . "/views/layouts/{$this->_layout}.php";
        if (!file_exists($layout_path)) {
            exit("File not found $layout_path");
        }
        
        require_once $layout_path;
    }
}
