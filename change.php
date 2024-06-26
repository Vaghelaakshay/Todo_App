
<?php
echo"<pre>";
 var_dump($_POST);
 echo"</pre>";

 $json = file_get_contents('data.json');
 $jsonArray = json_decode($json,true);
 $todoname = $_POST['todo_name'];
 $jsonArray[$todoname]['completed']= !$jsonArray[$todoname]['completed'];

 file_put_contents('data.json',json_encode($jsonArray,JSON_PRETTY_PRINT));
 header('location:index.php');