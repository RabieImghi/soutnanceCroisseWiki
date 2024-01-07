<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="assets/auth/assets/img/favicon.png" rel="icon">
    <link href="assets/auth/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="assets/auth/assets/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  </head>
  <body class="d-flex justify-content-center align-items-center">
    <main>
        <div class="logo text-center">
            <img src="assets/auth/assets/img/logo.png" alt="logo" width="300px">
        </div>
        <div class="cardForm shadow p-5 m-3 ">
            <h3 class="blueColor text-center">Create an Account</h3>
            <p class="text-center text-secondary">Enter your personal details to create account</p>
            <form action="<?=$_ENV['APP_URL']."/login"?>" method="post" class="d-flex flex-column justify-content-between gap-4">
                <label class="text-secondary">Your Name 
                    <input required type="text" name="username" id="" placeholder="Your Name ..." class="form-control mt-1">
                </label>
                <label class="text-secondary">Your Email 
                    <input required type="email" name="email" id="" placeholder="Your Email ..." class="form-control mt-1">
                </label>
                <label class="text-secondary">Your Password 
                    <input required type="password" name="password" id=""  class="form-control mt-1">
                </label>
                <label class="text-secondary">
                    <input required type="checkbox" class="form-check-input" > I agree and accept the <a  href="#" class="blueColor no-underline">terms and conditions</a> 
                </label>
                <button class="btn btn-primary">Create Account</button>
                <p class="text-secondary">Already have an account? <a href="<?=$_ENV['APP_URL']."/login"?>" class="blueColor no-underline"> Log in</a></p>
            </form>
        </div>
        <div class="footer text-center">
            <p>Designed by <span class="blueColor">Rabie Ait Imghi</span></p>
        </div>
    </main>
    <script src="assets/auth/assets/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>