<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<style>
  body {
    background-color: hsl(218, 41%, 15%);
  
        overflow: hidden;
  }</style>

<body>
   
<!-- Section: Design Block -->



<div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          MyThread <br />
          <span style="color: hsl(218, 81%, 75%)">Forum app</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
         Sign up for our message Board
        </p>
      </div>



      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">


<form action="register.php" method="post">

<div class="row">
<div class="col-md-6 mb-4">
<div data-mdb-input-init class="form-outline">
  <label for="username" class="form-label">Username:</label> 
  <input id="username" class="form-control" name="username" required="" type="text" />
  </div>
  </div>

  <div class="col-md-6 mb-4">
    <div data-mdb-input-init class="form-outline mb-4">
      <label for="email" class="form-label" >Email:</label>
      <input id="email" class="form-control" name="email" required="" class="form-control" type="email" />
      </div>           
     </div>
     <div class="col-md-6 mb-4">
      <div data-mdb-input-init class="form-outline mb-4">
      <label class="form-label" for="password">Password:</label>
      <input class="form-control" id="password" name="password" required="" type="password" />
      </div>

      </div>


     </div>


  <input name="register" class="btn btn-primary" type="submit" value="Register" />


  <div class="text-center">
                <a href="login.php">Have an account?: Log in</a>
                
              </div>
</form>
</div>
        </div>
      </div>
    </div>
  </div>






</body>
</html>