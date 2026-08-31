<div class="py-5 bg-light">
    <div class="container">
<div class="row">
    <div class="col-md-4">
        <h4 class="footer-heading"><?= webSetting('title') ?? 'Meta Desc' ?>   </h4>
        <hr>
        <p>
            <?= webSetting('small_description') ?? 'Meta Desc'; ?>
        </p>
    </div>

<div class="col-md-4">
<h4 class="footer-heading">Follow us at</h4>
<hr>
<ul>
    <?php
$socialMedia = getAll('social_medias');
if($socialMedia){
    if(mysqli_num_rows($socialMedia) > 0){
        foreach($socialMedia as $socialItem){
            ?>
            <li>
               <a href="<?=$socialItem['url']?>"> <?=$socialItem['name']?></a>
            </li>
            <?
        }
    }else{
        echo "<li>No Social Media Added</li>";
    }
}else{
    echo "<li>Something Went Wrong</li>"
}
    ?>
</ul>
</div>

<div class="col-md-4">
    <h4 class="footer-heading">Contact Information</h4>
<hr>
<p>Address: <?= webSetting('address') ?? ''; ?></p>
<p>Email: <?= webSetting('email1') ?? ''; ?>, <?= webSetting('email2') ?? ''; ?> </p>
<p>Phone No.: <?= webSetting('phone1') ?? ''; ?>, <?= webSetting('phone2') ?? ''; ?> </p>
</div>
</div>
</div>
</div>