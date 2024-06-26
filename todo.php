<?php
    // echo"<pre>";
    // var_dump($_POST);
    // echo"</pre>";
    $task = $_POST['task_name'] ?? '';
    $task=trim($task);
   // echo$task;
    if($task){
        if (file_exists('data.json')) {
           $json = file_get_contents('data.json');
           $jsonArray = json_decode($json, true);
         
        }else {
         $jsonArray =[];
        }
       $jsonArray[$task]=["completed"=> false]; 
      file_put_contents('data.json', json_encode($jsonArray, JSON_PRETTY_PRINT));
        }
      header('location:index.php');
?>