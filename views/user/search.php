<?php 
for($i=0;$i<count($items);$i++){
?>
<div class="wikis row mb-5 shadow">
    <?php
    if($i%2== 0){
        ?>
        <div class="image col-6" style='height:360px !important; overflow:hidden'>
            <img src="assets/uploads/<?=$items[$i]["urlImage"]?>" style="height: 360px"  alt="">
        </div>
        <div class="textHero col-6 p-4">
            <h1 class=""><span><?=$items[$i]["title"]?></span></h1>
            <p class="fw-bold"> Category : <span class="blueColor"><?=$items[$i]["nameC"]?></span></p>
            <p class="fw-bold">Tages : <span class="blueColor">
            <?php 
                for($j=0;$j<count($wikis[$i]);$j++){
                    echo $wikis[$i][$j]['nameT']."/ ";
                }
                ?>
            </span></p>
            <a href="<?=$_ENV['APP_URL']."/detailItem?idItem=".$items[$i]["wikiID"]?>" class="btn butt btn-primary mt-2">More Details </a>
        </div>
        <?php
    }else{
        ?>
        <div class="textHero col-6 p-4">
            <h1 class=""><span><?=$items[$i]["title"]?></span></h1>
            <p class="fw-bold"> Category : <span class="blueColor"><?=$items[$i]["nameC"]?></span></p>
            <p class="fw-bold">Tages : <span class="blueColor">
                <?php 
                for($j=0;$j<count($wikis[$i]);$j++){
                    echo $wikis[$i][$j]['nameT']."/ ";
                }
                ?>
            </span></p>
            <a href="<?=$_ENV['APP_URL']."/detailItem?idItem=".$items[$i]["wikiID"]?>" class="btn butt btn-primary mt-2">More Details </a>
        </div>
        <div class="image col-6" style='height:360px !important; overflow:hidden'>
            <img src="assets/uploads/<?=$items[$i]["urlImage"]?>" style="height: 360px ;"  alt="">
        </div>
        <?php
    }
    ?>
</div>
<?php 
}
?>