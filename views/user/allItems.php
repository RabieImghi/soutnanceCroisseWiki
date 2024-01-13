<?php
$itemsnav='ok';
ob_start();
?>
    <div class="filter d-flex gap-4 w-50 mt-2 mb-3">
        <select name="" id="type" class="form-control w-25">
            <option value="title" selected disabled>Filtr By</option>
            <option value="title">Wiki</option>
            <option value="nameT">Tages</option>
            <option value="nameC">Category</option>
        </select>

        <input type="search" onkeyup="serach()" name="search" id="search" class="form-control" placeholder="Search...">
    </div>
    <section class="LasWikis" id='bodySection'>
        <?php 
        for($i=0;$i<count($items);$i++){
        ?>
        <div class="wikis row mb-5 shadow " style="height: 260px" >
            <?php
            if($i%2== 0){
                ?>
                <div class="image col-6 p-0" style='height:260px !important; overflow:hidden'>
                    <img src="assets/uploads/<?=$items[$i]["urlImage"]?>" style="height: 260px"  alt="">
                </div>
                <div class="textHero col-6 shadow" >
                    <h1 ><span class="h1 fw-bold"><?=$items[$i]["title"]?></span></h1>
                    <p class="fw-bold"> Category : <span class="blueColor"><?=$items[$i]["nameC"]?></span></p>
                    <p class="fw-bold">Tages : <span class="blueColor">
                    <?php 
                        for($j=0;$j<count($wikis[$i]);$j++){
                            echo "#".$wikis[$i][$j]['nameT']." / ";
                        }
                        ?>
                    </span></p>
                    <a href="<?=$_ENV['APP_URL']."/detailItem?idItem=".$items[$i]["wikiID"]?>" class="btn butt btn-primary mt-2">More Details </a>
                </div>
                <?php
            }else{
                ?>
                <div class="textHero col-6 shadow">
                    <h1 class=""><span class="h1 fw-bold"><?=$items[$i]["title"]?></span></h1>
                    <p class="fw-bold"> Category : <span class="blueColor"><?=$items[$i]["nameC"]?></span></p>
                    <p class="fw-bold">Tages : <span class="blueColor">
                        <?php 
                        for($j=0;$j<count($wikis[$i]);$j++){
                            echo "#".$wikis[$i][$j]['nameT']." / ";
                        }
                        ?>
                    </span></p>
                    <a href="<?=$_ENV['APP_URL']."/detailItem?idItem=".$items[$i]["wikiID"]?>" class="btn butt btn-primary mt-2">More Details </a>
                </div>
                <div class="image col-6 p-0 text-end" style='height:260px !important; overflow:hidden'>
                    <img src="assets/uploads/<?=$items[$i]["urlImage"]?>" style="height: 260px ;"  alt="">
                </div>
                <?php
            }
            ?>
        </div>
        <?php 
        }
        ?>
    </section>
    <script>
        function serach(){
            var type=document.getElementById('type').value;
            var input=document.getElementById('search').value;
            var url ="/soutCrois/public/searchItemsUsre?type="+type+"&value="+input;
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                if(xhttp.readyState==4 && xhttp.status==200)
                document.getElementById('bodySection').innerHTML=this.responseText;
            }
            xhttp.open("GET",url,true);
            xhttp.send();
            
        }
    </script>
<?php
$content=ob_get_clean();
include "../views/user/header.php";
?>