<?php
ob_start();
?>
    <div class="imageWikidetails text-center border-bottom ">
        <img src="assets/uploads/<?=$oneItem["urlImage"]?>" >
    </div>
    <div class=" detailWikis d-flex gap-4 justify-content-around flex-wrap">
        <div class="detailLef">
            <h1 class="mb-3 mt-5 fw-bold blue-move"><?=$oneItem["title"]?></h1>
            <h1 class="mb-3 mt-5 h4 titleSection">Author : <?=$oneItem["username"]?></h1>
            <h1 class="mb-3 mt-5 h5 titleSection">Category : <?=$oneItem["nameC"]?> </h1>
            <p class="text-secondary">
            <?=$oneItem["descr"]?></p>
        </div>
        <div class="detailRight">
            
            <h1 class="mb-3 mt-5 h5 titleSection">
                <?php 
            foreach($wikis as $wiki){
              ?>
                Tags : 
                    <div class="mt-3 d-flex gap-4 align-items-center">
                        <span class="text-white p-1 rounded-1 bg-blue-mv">#<?=$wiki['nameT']?></span>
                        :
                        <p class="h6 text-secondary">
                        <?=$wiki['decription']?>
                        </p>
                    </div>
                    <hr>
                <?php  
                }
                ?>
            </h1>
            
            <h1 class="mb-3 mt-5 h5 titleSection">Description : </h1>
            <p class="text-secondary">
                <?=$oneItem["content"]?>
            </p>
        </div>
    </div>
<?php
$content=ob_get_clean();
include "../views/user/header.php";
?>