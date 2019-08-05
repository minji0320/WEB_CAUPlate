<?php
  $conn = mysqli_connect("localhost", "cauplate", "cauplate1234", "cauplate");
  mysqli_query($conn, "set names utf8");


  if(isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM restaurant WHERE id={$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['name'] = $row['name'];
    $article['category'] = $row['category'];
    $article['location'] = $row['location'];
    $article['address'] = $row['address'];
    $article['menu'] = $row['menu'];
    $article['image'] = $row['image'];
    $article['size'] = $row['size'];

    $sql = "SELECT * FROM map WHERE id={$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['latitude'] =$row['latitude'];
    $article['longitude']=$row['longitude'];

  }
 ?>


<!DOCTYPE html>
<html>
<head>
  <style>


    #map {
    max-width: none;
   }
   .img {
     width: 100%;

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
  <script>
    function initMap() {
      var lat = <?php Print($article['latitude']); ?>;
      var lng = <?php Print($article['longitude']); ?>;
      var restaurant = {lat: lat, lng: lng};
      var map = new google.maps.Map(
          document.getElementById('map'), {zoom: 16, center: restaurant});
      var marker = new google.maps.Marker({position: restaurant, map: map});
    }
  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHucubNcVN3o6j1VxT6e07Fssw0bCf0Gc&callback=initMap">
  </script>
  <meta charset="utf-8">
  <link href="ratekit/css/ratekit.min.css" type="text/css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-sm bg-light">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="http://cauplate.dothome.co.kr/">CAUPLATE</a>

    <!-- Links -->
    <ul class="nav navbar-nav w-100 nav-justified">
      <li class="nav-item">
        <a class="nav-link active" href="http://cauplate.dothome.co.kr/" em>Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://cauplate.dothome.co.kr/category_korean.php"  >Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://cauplate.dothome.co.kr/location_market.php">Location</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://cauplate.dothome.co.kr/recomendation.html">Recommend</a>
      </li>
      <form class="form-inline" action="/search.php" method="post">
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
<div class="container-fluid">
  <div class="row">
    <div class="col-4">
      <h1><?=$article['name']?></h1><br>
      <table class="table">
        <tr><td>위치</td><td><?=$article['location']?></td></tr>
        <tr><td>주소</td><td><?=$article['address']?></td></tr>
        <tr><td>종류</td><td><?=$article['category']?></td></tr>
        <tr><td>메뉴</td><td><?=$article['menu']?></td></tr>
      </table>
      별점주기
      <input id="ecstacy" class="rating" data-size="md">
          <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script src="ratekit/js/ratekit.min.js"></script>
    </div>
    <div class="col-4">
      <img src="<?=$article['image']?>" class="img">
    </div>
    <div class="col-4" id="map">
    </div>
  </div>
    <h3>Ratings</h3><!-- start Customer Reviews --><script data-sil-id='5c11ace66afbcb001ba1d810'> (function() {var d = document, w = window, l = window.location,p = l.protocol == 'file:' ? 'http://' : '//';if (!w.WS) w.WS = {}; c = w.WS;var m=function(t, o){ var e = d.getElementsByTagName('script'); e=e[e.length-1]; var n = d.createElement(t); if (t=='script') {n.async=true;} for (k in o) n[k] = o[k]; e.parentNode.insertBefore(n, e)}; m('script', { src: p+'bawkbox.com/widget/star-rating/5c11ace66afbcb001ba1d810?page='+encodeURIComponent(l+''), type: 'text/javascript' }); c.load_net = m;})();</script><script type='application/ld+json' src='//bawkbox.com/widget/star-rating/5c11ace66afbcb001ba1d810/microdata'></script><div class='sil-widget-star-rating sil-widget' id='sil-widget-5c11ace66afbcb001ba1d810'><a href='https://bawkbox.com/install/star-rating'>Customer Reviews</a></div><!-- end Customer Reviews -->
  <div class="row">
    <div class="card ">
      <div class="card-body">
        <div class="row">
          <div class="col-md-2">
            <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
            <p class="text-secondary text-center">작성 날짜</p>
          </div>
          <div class="col-md-10">
                   </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
