<?php

$todos = [];
if (file_exists('todo.json')) {
    $json = file_get_contents('todo.json');
    $todos = json_decode($json, true);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form action="newTodo.php" method="post">
            <input type="text" name="todo_name" placeholder="Input your todo">
            <button type="submit">New todo</button>
        </form>
        <br>
        <!-- <div class="container-list"> -->
        <?php foreach ($todos as $todoName => $todo) : ?>
            <div class="container-list">
                <form action="change_status.php" method="post">
                    <input type="hidden" name="todo_name" value="<?= $todoName ?>">
                    <input type="checkbox" <?= $todo['completed'] ? 'checked' : ''; ?>>
                </form>
                <?= $todoName; ?>
                <form action="delete.php" method="post">
                    <input type="hidden" name="todo_name" value="<?= $todoName ?>">
                    <button>Delete</button>
                </form>
            </div>
        <?php endforeach; ?>
        <!-- </div> -->
    </div>
    <script>
        const check = document.querySelectorAll('input[type = checkbox]')
        check.forEach(c => {
            c.onclick = function() {
                this.parentNode.submit()
            }
        })
    </script>
</body>

</html>