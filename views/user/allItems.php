<?php
$itemsnav='ok';
ob_start();
?>
    <div class="filter d-flex gap-4 w-50 mt-2 mb-3">
        <select name="" id="" class="form-control w-25">
            <option value="1" selected disabled>Filtr By</option>
            <option value="1">Wiki</option>
            <option value="1">Tages</option>
            <option value="1">Category</option>
        </select>

        <input type="search" name="search" id="search" class="form-control" placeholder="Search...">
    </div>
    <section class="LasWikis">
        <?php 
        for($i=0;$i<count($items);$i++){
        ?>
        <div class="wikis row mb-3 shadow">
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
                    <p><?=$items[$i]["content"]?></p>
                    <a href="#" class="btn butt btn-primary mt-2">More Details </a>
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
                    <p><?=$items[$i]["content"]?></p>
                    <a href="#" class="btn butt btn-primary mt-2">More Details </a>
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
    </section>
<?php
$content=ob_get_clean();
include "../views/user/header.php";
?>