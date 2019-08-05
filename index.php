<?php
  $conn = mysqli_connect("localhost", "cauplate", "cauplate1234", "cauplate");
  mysqli_query($conn, "set names utf8");

  $search = mysqli_real_escape_string($conn,$_POST['search']);
  $sql="SELECT * FROM restaurant ORDER BY rand() LIMIT 2";
  $result = mysqli_query($conn, $sql);
  $list = '';
  while ($row = mysqli_fetch_array($result)) {

    $list = $list."
    <br>
      <div class=\"card\"><a href=\"detailView.php?id={$row['ID']}\" class=\"custom-card\">
       <div class=\"row no-gutters\">
           <div class=\"col-auto\">
               <img src=\"{$row['image']}\" class=\"img-thumbnail\" alt=\"\" width=\"200\" height=\"200\">
           </div>
           <div class=\"col\">
             <div class=\"card-block px-2\">
                 <h4 class=\"card-title\">{$row['name']}</h4>
                 <p class=\"card-text restaurant-location\">{$row['location']}</p>
                 <p class=\"card-text\">{$row['menu']}</p>
                 </div>
             </div>
           </div>
       </a>
      </div>
    ";
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <style>
   .navbar-brand {
     font-family: 'Alfa Slab One', cursive;
     color: #006cb7;
   }
   .nav-link {
     color: black;
   }
   .img {
     width: 100%;

   }
   .custom-card {
     text-decoration: none;
     color: black;
   }
   .card-block {
     margin: 10px;
   }
   .restaurant-location {
     color: grey;
   }
   .active {
     font-weight: bold;
     color: #006cb7;
   }
   #pick {
     margin:0px auto;
     height: 400px;
     width: 60%;
    }
    .today-Recommen{

    }
  </style>
  <title>CAUPLATE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link href="home.css" rel="stylesheet" />
</head>

<body>
  <nav class="navbar fixed-top navbar-expand-sm bg-light navbar">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="index.php">CAUPLATE</a>

    <!-- Links -->
    <ul class="nav navbar-nav w-100 nav-justified">
      <li class="nav-item">
        <a class="nav-link active" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="category_korean.php"  >Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="location_market.php">Location</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="recomendation.html">Recommend</a>
      </li>
      <form class="form-inline" action="search.php" method="post">
        <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search">
        <button class="btn" type="submit">Search</button>
      </form>
    </ul>
  </nav>

  <div id ="home">
    <div class="landing-text">
      <h3>CAUPLATE's Pick</h3><br><br>
      <div id="pick">
        <?=$list?>
      </div>
    </div>
  </div>

  <div class="padding">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <img src="https://images.unsplash.com/photo-1504754524776-8f4f37790ca0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80">
      </div>
      <div class="col-sm-6 text-center">
        <h2>All about the CAU PLATE </h2>
        <p class="lead">CAU PLATE IS A PAGE THAT CONVEYS INFORMATION ABOUT RESTAURANTS IN THE VICINITY OF HEUKSEOK-DONG AND SANGDO-DONG. THROUGH THIS SITE CONFIGURATION, DISTRIBUTED RESTAURANT INFORMATION CAN BE COLLECTED AND INFORMATION CAN BE ACCESSED MORE EASILY.  </p>
        <p class="lead>">IN ADDITION TO THIS, WE WILL TEST THE SERVICE ACCORDING TO THE CONVENIENCE OF THE USERS AND RECOMMEND A CUSTOMIZED RESTAURANT TO PROVIDE CUSTOMIZED SERVICE. ALSO, BY MANAGING MEMBERS, WE WILL BE ABLE TO RAISE AFTER-HOURS AND AFTER-DINNER DELICACIES OF RESTAURANTS TO ENABLE MUTUAL INFORMATION EXCHANGE.</p>
      </div>
    </div>
  </div>
</div>

<div id="fixed"> </div>

  <footer class="container-fluid">
    <div class="row">
      <div class="col-sm-2 text-center">
        <a class="navbar-brand" href="index.php">CAUPLATE</a>
      </div>
      <div class="col-sm-10">
        서울특별시 동작구 흑석동 흑석로 84 중앙대학교 <br>
        SEOK HO SHIN 20144051 / MIN JI KIM 20153029 / YOON JU LEE 20150798 / HEE CHAN JANG 20132180<br>
        © 2018 CAUPLATE. All rights reserved.
      </div>
  </footer>
</body>
</html>
