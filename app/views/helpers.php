<?php

/**
 * Get the base path
 * @param string $path
 * @return string
 */

 function basePath($path = ''){
    return __DIR__ . '/' . $path;
 }

 /**
  * Load a view
  * @param string $name
  * @return void
  */

  function loadView($name){
    $viewPath =  basePath("{$name}.php");

    if (file_exists($viewPath)) {
        require $viewPath;
    } else {
        echo "view '{$name} not found!'";
    }
    
  }