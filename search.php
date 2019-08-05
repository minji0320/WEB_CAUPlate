<?php
  $conn = mysqli_connect("localhost", "cauplate", "cauplate1234", "cauplate");
  mysqli_query($conn, "set names utf8");

  $search = mysqli_real_escape_string($conn,$_POST['search']);
  $sql="SELECT * FROM restaurant WHERE name LIKE '%$search%' or menu  LIKE '%$search%'";
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
<html>
<head>
  <style>
    #map {
    max-width: none;
   }
   .navbar-brand {
     font-family: 'Alfa Slab One', cursive;
     color: #006cb7;
   }
   .nav-link {
     color: black;
   }
   .img-thumbnail {
     width: 200px;
     height: 200px;
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
 </style>
 <title>CAUPLATE</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One" rel="stylesheet">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 </head>
<body>
  <nav class="navbar navbar-expand-sm bg-light">
    <a class="navbar-brand" href="index.php">CAUPLATE</a>
    <ul class="nav navbar-nav w-100 nav-justified">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="category_korean.php">Category</a>
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
  <nav class="navbar navbar-expand-sm bg-light">
    <ul class="nav navbar-nav w-100 nav-justified">
      <li class="nav-item">
        <a class="nav-link" href="category_korean.php">한식</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="category_chinese.php">중식</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="category_western.php">양식</a>
      </li>
    </ul>
  </nav>

  <div class="container">
    <?php
    if(mysqli_num_rows($result) === 0){
      echo '검색 결과가 없습니다.';
    }
    else {
      echo $list;
    }
    ?>
  </div>
  <br>
  <br>
</body>
</html>
