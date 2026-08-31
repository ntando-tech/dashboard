<?php

require './config/function.php';

$paraResult = checkParamId('id');

if(is_numeric($paraResult))
{
        $projectId = validate($paraResult);
        $project = getById('projects',$projectId);

        if($project['status'] == 200)
        {
            $projectDeleteRes = deleteQuery('projects',$projectId);
            if($projectDeleteRes)
            {
                redirect('projects.php', 'Project Deleted Successfully');
            }
            else
            {
                redirect('projects.php', 'Something Went Wrong');
            }
        }
        else
        {
         redirect('projects.php',$project['message']);
        }
}
else
{
    redirect('projects.php',$paraResult);
}
?>

