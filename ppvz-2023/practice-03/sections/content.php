<h2>This is the content section</h2>

<?php
    //echo dirname(__FILE__) . "/tasks/task-{$task}.php";

    // print_r($_GET);

    // http://localhost/ppvz-2023/practice-03/?task=1

    if (isset($_GET['task'])) {
        $task = filter_var($_GET['task'], FILTER_SANITIZE_NUMBER_INT);        

        // echo $task . '<br>';
        // echo $_GET['task'];

        // $filePath = "tasks/task-{$task}.php";
        // // TODO необхідно перевірити файл на наявність
        // include($filePath); 

        $filePath = dirname(__FILE__) . "/tasks/task-{$task}.php";
        if (file_exists($filePath)) {
            include($filePath);
        } else {
            //echo 'File not found';
            include('tasks/task-no-found.php'); 
        }
        
        // switch ($task) {
        //     case 1:
        //         include('tasks/task-1.php'); 
        //         break;
            
        //     case 4:
        //         include('tasks/task-4.php');
        //         break;

        //     default:
        //         include('tasks/task-no-found.php');                     
        // }

    } else {
        echo 'Key task is not defined!';
    }

    // switch () {
    //     case '1':
    //         break;

    //     default:
    // }
    