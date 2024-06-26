<?php
$owner="AKSHAY";
    $todos= [];
if (file_exists('data.json')) {
     $json = file_get_contents('data.json');
     $todos = json_decode($json,true);
     //var_dump($todos); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section class="vh-100" style="background-color: #e2d5de;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
<!--MAIN-->
        <div class="card" style="border-radius: 15px;">
          <div class="card-body p-5">
            <h6 class="mb-3">Hello,<?php echo$owner;?></h6>
            

            <form action="todo.php" method="post"  class="d-flex justify-content-center align-items-center mb-4">
              <div data-mdb-input-init class="form-outline flex-fill">
                <input type="text" id="form3" class="form-control form-control-lg" name="task_name"  placeholder="enter task" required />
                <label class="form-label" for="form3">What do you need to do today? -  </label>
              </div>
              <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg ms-2">Add</button>
            </form>
<!--show-->
            <ul class="list-group mb-0">
            <?php  foreach ($todos as $todoName => $todo) : ?>
              <li
                class="list-group-item d-flex justify-content-between align-items-center border-start-0 border-top-0 border-end-0 border-bottom rounded-0 mb-2">
                <div class="d-flex align-items-center">
                <form style="display:inline;" action="change.php" method="post">
                  <input type="hidden" name="todo_name" value="<?php  echo $todoName?>">
                  <input type="checkbox" <?php echo$todo['completed']?'checked':'' ?>>
                </form>
                 <?php echo $todoName;  ?>
                <form style="display:inline;" action="delete.php" method="post">
                  <input type="hidden" name="todo_name" value="<?php echo $todoName?>">
                  <button  data-mdb-button-init data-mdb-ripple-init class="btn btn-danger btn-lg ms-2" >DELETE</button>
                 </form> 
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
<!--script -->
<script>
    const checkboxs = document.querySelectorAll('input[type=checkbox]');
    checkboxs.forEach(ch =>{
        ch.onclick = function(){
            this.parentNode.submit();
        };
    })
</script>
</body>
</html>