<?php

require 'config/function.php';

$paraResult = checkParamId('id');

if(is_numeric($paraResult))
{
        $socialMediaId = validate($paraResult);
        $socialMedia = getById('social_medias',$socialMediaId);

        if($socialMedia['status'] == 200)
        {
            $socialMediaDeleteRes = deleteQuery('social_medias',$socialMediaId);
            if($socialMediaDeleteRes)
            {
                redirect('social_media.php', 'Social Media Deleted Successfully');
            }
            else
            {
                redirect('social_media.php', 'Something Went Wrong');
            }
        }
        else
        {
         redirect('social_media.php',$socialMedia['message']);
        }
}
else
{
    redirect('social_media.php',$paraResult);
}
?>

