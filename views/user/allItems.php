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
        <div class="wikis row mb-5 shadow">
            <div class="image col-6">
                <img src="assets/user/assets/img/WikiWorld.png" style="width: 50%;"  alt="">
            </div>
            <div class="textHero col-6 p-4">
                <h1 class=""><span>Wiki</span>Title</h1>
                <p class="fw-bold"> Category : <span class="blueColor">CategoryName</span></p>
                <p class="fw-bold">Tages : <span class="blueColor">Tages1 Tags 2</span></p>
                <p>make a place where everyone can work together, <br> create, find and share wikis in an easy and interesting way.</p>
                <a href="#" class="btn butt btn-primary mt-2">More Details </a>
            </div>
        </div>
        <div class="wikis row mb-5 shadow">
            <div class="textHero col-6 p-4">
                <h1 class=""><span>Wiki</span>Title</h1>
                <p class="fw-bold"> Category : <span class="blueColor">CategoryName</span></p>
                <p class="fw-bold">Tages : <span class="blueColor">Tages1 Tags 2</span></p>
                <p>make a place where everyone can work together, <br> create, find and share wikis in an easy and interesting way.</p>
                <a href="#" class="btn butt btn-primary mt-2">More Details </a>
            </div>
            <div class="image col-6">
                <img src="assets/user/assets/img/WikiWorld.png" style="width: 50%;"  alt="">
            </div>
        </div>
        <div class="wikis row mb-5 shadow">
            <div class="image col-6">
                <img src="assets/user/assets/img/WikiWorld.png" style="width: 50%;"  alt="">
            </div>
            <div class="textHero col-6 p-4">
                <h1 class=""><span>Wiki</span>Title</h1>
                <p class="fw-bold"> Category : <span class="blueColor">CategoryName</span></p>
                <p class="fw-bold">Tages : <span class="blueColor">Tages1 Tags 2</span></p>
                <p>make a place where everyone can work together, <br> create, find and share wikis in an easy and interesting way.</p>
                <a href="#" class="btn butt btn-primary mt-2">More Details </a>
            </div>
        </div>
    </section>
<?php
$content=ob_get_clean();
include "../views/user/header.php";
?>