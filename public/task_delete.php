<?php

require './config/function.php';

$paraResult = checkParamId('id');

if(is_numeric($paraResult))
{
        $taskId = validate($paraResult);
        $task = getById('tasksss',$taskId);

        if($task['status'] == 200)
        {
            $taskDeleteRes = deleteQuery('tasksss',$taskId);
            if($taskDeleteRes)
            {
                redirect('tasks.php', 'Task Deleted Successfully');
            }
            else
            {
                redirect('tasks.php', 'Something Went Wrong');
            }
        }
        else
        {
         redirect('tasks.php',$task['message']);
        }
}
else
{
    redirect('tasks.php',$paraResult);
}
?>

