<?php
session_start();


echo'<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">iVISION</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">ABOUT</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="contact.php">CONTACT</a>
      </li>
      
    
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         TOP CATEGORIES
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
         $sql="SELECT category_name, category_id FROM `categories` LIMIT 5";
         $result = mysqli_query($con,$sql);
         while($row = mysqli_fetch_assoc($result)){
             
         
         echo' <a class="dropdown-item" href="threads.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a>';
         }
       echo' </div>
      </li>
       </ul>
<div class="row mx-2">';
  
   if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true) 
   { 
       echo ' <form class="form-inline my-2 my-lg-0" method="get" action="search.php">
      
     <p class="text-light my-0 mx-2" > Welcome '.$_SESSION['useremail'].'</p>
         <a href="logout.php" class="btn btn-outline-success mx-3">Logout</a>
       <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>   
    </form>';
      
   }    
       
         
  else{       
  echo'<form class="form-inline my-2 my-lg-0" >
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  

      
       <button class="btn btn-outline-success mx-3" data-toggle="modal" data-target="#loginModal ">Login</button>
      <button class="btn btn-outline-success" data-toggle="modal" data-target="#signupModal">SignUp</button>';
  }      
   
   
echo'    </div>
  </div>
</nav>';

include 'login.php';
include 'signup.php';


if(isset($_SESSION['status'])){
    
?>
    <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>successfully submitted!</strong> <?php echo $_SESSION['status']?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
     </button>
    </div>
<?php
unset($_SESSION['status']);
}
      

?>


