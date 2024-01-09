<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="assets/user/assets/img/favicon.png" rel="icon">
    <link href="assets/user/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="assets/user/assets/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  </head>
  <body>
    <header class="bg-white p-3 mb-3 border-bottom sticky-top">
        <div class="p-2">
            <div class="d-flex align-items-center justify-content-between ">
                <div class="d-flex gap-4 align-items-center ">
                    <div class="logo cursor-pointer ">
                        <img src="assets/user/assets/img/logo.png" width="120px" alt="">
                    </div>
                    <div class="togl_menu cursor-pointer" id="togl_menu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                        </svg>
                    </div>
                </div>
                <nav>
                    <ul class="nav">
                        <li><a href="<?=$_ENV['APP_URL']."/"?>" class="nav-link ml-1 px-2 link-bleuFa <?php if(isset($index))echo "active"; ?>">Home</a></li>
                        <li><a href="<?=$_ENV['APP_URL']."/items"?>" class="nav-link ml-1 px-2 link-bleuFa <?php if(isset($itemsnav))echo "active"; ?>">All Items</a></li>
                        <li><a href="#" class="nav-link ml-1 px-2 link-bleuFa">Services</a></li>
                        <li><a href="#" class="nav-link ml-1 px-2 link-bleuFa">FAQs</a></li>
                        <li><a href="#" class="nav-link ml-1 px-2 link-bleuFa">About</a></li>
                    </ul>
                </nav>
                <div class="profile ">
                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="assets/user/assets/img/user.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            
                            <?php
                            if(isset($_SESSION['id_user'])){
                                ?>
                                <li><a class="dropdown-item" href="<?=$_ENV['APP_URL']."/userItems"?>">Items List </a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="<?=$_ENV['APP_URL']."/logout"?>">Sign out</a></li>
                                <?php
                            }else{
                                ?>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="<?=$_ENV['APP_URL']."/login"?>">Login</a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="">
        <aside id="asideBar" class=" p-2">
            <div class="nav flex-column" >
                <a href="<?=$_ENV['APP_URL']."/"?>"  class="nav-link rounded-1 fw-bold mt-2 p-3 " >
                    <img src="assets/user/assets/img/logo.png" width="150px" alt="">
                </a><hr>
                <a href="<?=$_ENV['APP_URL']."/"?>"  class="nav-link rounded-1 fw-bold mt-2 p-3 <?php if(isset($index))echo "active"; ?>" >
                    <span class="ml-2">Home</span>
                </a>
                <a href="<?=$_ENV['APP_URL']."/items"?>"  class="nav-link rounded-1 fw-bold mt-2 p-3  <?php if(isset($itemsnav))echo "active"; ?>"  >
                    
                    <span class="ml-2">All Items</span>
                </a>
                <a href="#"  class="nav-link rounded-1 fw-bold mt-2 p-3"  >
                    
                    <span class="ml-2">Services</span>
                </a>
                <a href="#"  class="nav-link rounded-1 fw-bold mt-2 p-3"  >
                    
                    <span class="ml-2">FAQs</span>
                </a>
                <a href="#"  class="nav-link rounded-1 fw-bold mt-2 p-3"  >
        
                    <span class="ml-2">About</span>
                </a>
            </div>
        </aside>
        <section class="container">
            <?=$content?>
        </section>
        <hr class="mt-5">
        <footer class="text-center text-secondry mt-3">
            <p>Copyright © 2024 <span class="fw-bold"><span class="blueColor">Wiki</span>World</span>. All rights reserved. <br>
                Design: Rabie Ait Imghi</p>
        </footer>
    </main>
   <script src="assets/user/assets/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>