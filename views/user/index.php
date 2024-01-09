<?php
$index="ok";
ob_start();
?>
    <section class="hero d-flex align-items-center justify-content-around">
        <div class="textHero ">
            <h1 class="mb-3"><span>Wiki</span>World</h1>
            <p class=" mb-3">make a place where everyone can work together, <br> create, find and share wikis in an easy and interesting way.</p>
            <div class="inputNewUser">
                <input type="email" placeholder="Subscribe With Your Email ..." class="form-control" >
            </div>
            <button type="button" class="btn butt btn-primary mt-2">Subscribe Now </button>
        </div>
        <div class="image ">
            <img src="assets/user/assets/img/WikiWorld.png" style="width: 100%;"  alt="">
        </div>
    </section>
    <h1 class="mb-3 mt-5 ml-2 h2 fw-bold titleSection">Our services</h1><hr>
    <section class="services p-4 d-flex flex-wrap gap-4 justify-content-between align-items-center">
        <div class="card shadow" style="width: 18rem;">
            <img src="assets/user/assets/img/services.jpg" class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column align-items-center">
                <h5 class="fw-bold card-title"><span>Free</span> Wikis</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="card shadow" style="width: 18rem;">
            <img src="assets/user/assets/img/services2.jpg" class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column align-items-center">
                <h5 class="fw-bold card-title"><span>Fast</span> Answor</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="card shadow" style="width: 18rem;">
            <img src="assets/user/assets/img/services3.jpg" class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column align-items-center">
                <h5 class="fw-bold card-title"><span>Support</span> 24/24</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </section>
    <h1 class="mb-3 mt-5 ml-2 h2 fw-bold titleSection">Last  Wiks</h1><hr>
    <section class="LasWikis">
        <?php 
        for($i=0;$i<count($items);$i++){
        ?>
        <div class="wikis row mb-3">
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
    </section>
    <h1 class="mb-3 mt-5 ml-2 h2 fw-bold titleSection">Last Category</h1><hr>
    <section class="services p-4 d-flex flex-wrap gap-4 justify-content-between align-items-center">
        <?php 
        foreach($categorys as $category):
        ?>
        <div class="card shadow" style="width: 18rem;">
            <img src="assets/user/assets/img/category.png" class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column align-items-center">
                <h5 class="fw-bold card-title"><span>Cat : </span> <?=$category['nameC']?></h5>
                <p class="card-text"><?=$category['descr']?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </section>
    <section class="Contact shadow mt-5 p-2 mb-3 d-flex  gap-5 p-4">
        <div class="ratio ratio-16x9">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96714.68291250926!2d-74.05953969406828!3d40.75468158321536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2588f046ee661%3A0xa0b3281fcecc08c!2sManhattan%2C%20Nowy%20Jork%2C%20Stany%20Zjednoczone!5e0!3m2!1spl!2spl!4v1672242259543!5m2!1spl!2spl"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="contctForm container d-flex justify-content-center">
            
            <form action="">
                <h5 class="h2 fw-bold card-title"><span>Contact Us </span> & Get In <span>Touch </span></h5>
                <div class="mt-3">
                    <label>Your Name</label>
                    <input type="text" class="form-control" placeholder="Your Name">
                </div>
                <div class="mt-3">
                    <label>Your Email</label>
                    <input type="email" class="form-control" placeholder="Your Email">
                </div>
                <div class="mt-3">
                    <label>Your Subject</label>
                    <input type="text" class="form-control" placeholder="Your Subject">
                </div>
                <div class="mt-3">
                    <label>Your Message</label>
                    <textarea class="form-control" placeholder="Your Message"></textarea>
                </div>
                <button type="button" class="btn butt btn-primary mt-2">Send Message Now </button>
            </form>
        </div>
    </section>
<?php
$content=ob_get_clean();
include "../views/user/header.php";
?>
            