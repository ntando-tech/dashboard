<?php

require './config/function.php';

$paraResult = checkParamId('id');

if(is_numeric($paraResult))
{
        $ticketId = validate($paraResult);
        $ticket = getById('tickets',$ticketId);

        if($ticket['status'] == 200)
        {
            $ticketDeleteRes = deleteQuery('tickets',$ticketId);
            if($ticketDeleteRes)
            {
                redirect('tickets.php', 'Ticket Deleted Successfully');
            }
            else
            {
                redirect('tickets.php', 'Something Went Wrong');
            }
        }
        else
        {
         redirect('tickets.php',$ticket['message']);
        }
}
else
{
    redirect('tickets.php',$paraResult);
}
?>

