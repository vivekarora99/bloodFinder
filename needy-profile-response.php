<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    

</head>

<body>
    
         <div class="row">
     <div class="col-md-12">
      <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <a class="navbar-brand" href="#">Blood Donation</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Login</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Signup</a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          More
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Donor Search</a>
          <a class="dropdown-item" href="#">NGO's Registration</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">NGO's Search</a>
        </div>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-danger" type="submit">Search</button>
    </form>
  </div>
</nav>
 </div>
  </div>
    <div class="container" style="background-color:white; color:red;margin-top:100px;">

            <div class="row">

            <div class="col-md-10">
                <h1><?php echo $_GET["msg"];?> </h1>
            
            </div>
        </div>
        <div class="row mt-4" >

            <div class="col-md-10">
                <h3><a href="needy-profile-front.html"> Fill Another Response</a></h3>
            
            </div>
        </div>
    </div>

</body>

</html>
