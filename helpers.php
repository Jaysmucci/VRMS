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
    $viewPath =  basePath("app/views/{$name}.php");

    if (file_exists($viewPath)) {
        require $viewPath;
    } else {
        echo "view '{$name} not found!'";
    }
    
  }

   /**
  * Load a model
  * @param string $name
  * @return void
  */

  function loadModel($name){
    $modelPath =  basePath("app/models/{$name}.php");

    if (file_exists($modelPath)) {
        require $modelPath;
    } else {
        echo "model '{$name} not found!'";
    }
    
  }
     /**
  * Load a database
  * @param string $name
  * @return void
  */

  function loadDB($name){
    $dbPath =  basePath("app/models/DB/{$name}.php");

    if (file_exists($dbPath)) {
        require $dbPath;
    } else {
        echo "model '{$name} not found!'";
    }
    
  }

   /**
  * Load a controller
  * @param string $name
  * @return void
  */

  function loadController($name){
    $conPath =  basePath("app/controllers/{$name}.php");

    if (file_exists($conPath)) {
        require $conPath;
    } else {
        echo "controller '{$name} not found!'";
    }
    
  }

  /**
   * Count a number
   * @param array $name
   * @return array
   */
  function countNum($name){
    $count = 0;
    foreach ($name as $value) {
      if (is_array($value)) {
        $count += countNum($value); 
      }else{
        $count++;
      }
    } 
    return $count;
  }

/**
 * 
 * Format a Count
 * @param int $name
 * @return int
 */
function formatNum($name){
  if ($name < 1000) {
    return $name;
  }elseif ($name < 1000000) {
    return number_format($name / 1000, 1) . 'K';
  }elseif ($name < 1000000000) {
    return number_format($name / 1000000, 1) . 'M';
  }else{
    return number_format($name / 1000000000, 1) . 'B';
  }
}