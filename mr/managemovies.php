<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Movie Rating</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="css/movinfo.css" rel="stylesheet">
    <script src="js/functions.js"></script>
    <script>
      function deletemovie(mid) {
        var mmid = parseInt(mid);
        xmlhttp=new XMLHttpRequest();
        if (confirm("Are you sure?")) {
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("deleteinfo").innerHTML=xmlhttp.responseText;
            location.reload();
          }
        };
          xmlhttp.open("GET","deletemovies.php?q="+mmid,true);
          xmlhttp.send();
        }
        return false;
    }
    </script>

    <style>
      ul.pagination {
          display: inline-block;
          padding: 0;
          margin: 0;
      }

      ul.pagination li {display: inline;}

      ul.pagination li a {
          color: black;
          float: left;
          padding: 8px 16px;
          text-decoration: none;
      }
    </style>
</head>

<body>

  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:#35383B;">
      <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">Movie Edge</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <div class="col-sm-3 col-md-3">
                  <form action="searchmov.php" method="GET" class="navbar-form" role="search">
                      <div class="input-group">
                          <input name = "name" type="text" class="form-control" placeholder="Search movies" name="q">
                          <div class="input-group-btn">
                              <button class="btn btn-default searchheight" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                          </div>
                      </div>
                  </form>
              </div>
              <ul id="upright" class="nav navbar-nav navbar-right">
                  <!-- <li><a href="#">Login</a></li> -->
                  <li id="upright1" class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Register</b> <span class="caret"></span></a>
                      <ul id="login-dp" class="dropdown-menu">
                          <li>
                              <div class="row">
                                  <div class="col-md-12">
                                      <!-- Login via
                                      <div class="social-buttons">
                                          <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                          <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                                      </div>
                                      or -->
                                      <form class="form" role="form" method="POST" action="register.php" accept-charset="UTF-8" id="login-nav">
                                          <div class="form-group">
                                              <label class="sr-only" for="exampleInputEmail2">Username</label>
                                              <input name="username" onblur="checkUsername()" type="text" class="form-control" id="exampleInputUsername2" placeholder="Username" required>
                                              <a id="usernameHint"></a>
                                          </div>
                                          <div class="form-group">
                                              <label class="sr-only" for="exampleInputPassword2">Password</label>
                                              <input name="password" onblur="checkPassword()" type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                              <a id="pw1Hint"></a>
                                              <!-- <div class="help-block text-right"><a href="">Forget the password ?</a></div> -->
                                          </div>
                                          <div class="form-group">
                                              <label class="sr-only" for="exampleInputPassword2">Confirm Password</label>
                                              <input onblur="checkPassword2()" type="password" class="form-control" id="exampleInputPassword3" placeholder="Confirm Password" required>
                                              <a id="pw2Hint"></a>
                                              <!-- <div class="help-block text-right"><a href="">Forget the password ?</a></div> -->
                                          </div>
                                          <div class="form-group">
                                              <button onclick="formsubmit()" id="register" type="button" class="btn btn-primary btn-block">Register Now !</button>
                                          </div>
                                      </form>
                                  </div>
                                  <!-- <div class="bottom text-center">
                                      New here ? <a href="#"><b>Join Us</b></a>
                                  </div> -->
                              </div>
                          </li>
                      </ul>
                  </li>





                  <li id="upright2" class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                      <ul id="register-dp" class="dropdown-menu">
                          <li>
                              <div class="row">
                                  <div class="col-md-12">
                                      <!-- Login via
                                      <div class="social-buttons">
                                          <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                          <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                                      </div>
                                      or -->
                                      <form class="form" role="form" method="post" action="login.php" accept-charset="UTF-8" id="register-nav">
                                          <div class="form-group">
                                              <label class="sr-only" for="exampleInputEmail2">Username</label>
                                              <input name="username" type="text" class="form-control" id="exampleInputEmail3" placeholder="Username" required>
                                          </div>
                                          <div class="form-group">
                                              <label class="sr-only" for="exampleInputPassword2">Password</label>
                                              <input name="password" type="password" class="form-control" id="exampleInputPassword4" placeholder="Password" required>
                                              <!-- <div class="help-block text-right"><a href="">Forget the password ?</a></div> -->
                                          </div>
                                          <div class="form-group">
                                              <button type="submit" class="btn btn-primary btn-block">Login</button>
                                          </div>
                                          <div class="checkbox">
                                              <label><input name="keepLogin" type="checkbox"> keep me logged-in</label>
                                          </div>
                                      </form>
                                  </div>
                                  <!-- <div class="bottom text-center">
                                      New here ? <a href="#"><b>Join Us</b></a>
                                  </div> -->
                              </div>
                          </li>
                      </ul>
                  </li>
                  <?php
                  if(isset($_COOKIE['movierating'])){
                    session_start();
                    if($_SESSION['admin'] === 1){
                      echo "<li><a href='managemovies.php?page=1'><b>Manage Movies</b></a></li>";
                    }
                    echo "<li><a><b>". $_COOKIE['movierating'] . "</b></a></li>";
                  }
                  ?>
              </ul>
          </div>


          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
  </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Movie Category</p>
                <div class="list-group">
                  <a href="sort.php?category=Action" class="list-group-item">Action</a>
                  <a href="sort.php?category=Adventure" class="list-group-item">Adventure</a>
                  <a href="sort.php?category=Animation" class="list-group-item">Animation</a>
                  <a href="sort.php?category=Comedy" class="list-group-item">Comedy</a>
                  <a href="sort.php?category=Drama" class="list-group-item">Drama</a>
                  <a href="sort.php?category=Thriller" class="list-group-item">Thriller</a>
                  <a href="sort.php?category=Crime" class="list-group-item">Crime</a>
                  <a href="sort.php?category=Music" class="list-group-item">Music</a>
                  <a href="sort.php?category=Romance" class="list-group-item">Romance</a>
                  <a href="sort.php?category=Sci-Fi" class="list-group-item">Sci-Fi</a>
                </div>
            </div>

            <div class="col-md-9">
              <div class="row">

                  <p class="lead"><b>&nbsp&nbspMovie Lists: </b>
                  <?php
                  if($_SESSION['admin'] === 1){
                  echo "<a href='edit.php' class='btn-lg btn-primary'>Add a Movie</a>";
                  }
                  ?>
                  </p>
                  <?php
                  if($_SESSION['admin'] === 1){
                    $page_num = $_GET['page'];
                    $con = mysqli_connect("localhost","bluemagic_admin","heng#hao@haha!" , "bluemagic_movierating");
                      $sql="SELECT * FROM Movies";
                      $result = mysqli_query($con,$sql);
                      $row_num = mysqli_num_rows($result);
                      $count=1;
                      while($count <= $row_num){
                        $row = mysqli_fetch_array($result);
                        if($count > ($page_num-1)*6 && $count <= $page_num*6){
                          echo "<div class='col-sm-4 col-lg-4 col-md-4'>";
                          echo "<div class='thumbnail'>";
                          $cover = $row['cover'];
                          $title = $row['title'];
                          $mid = $row['M_ID'];
                          echo "<a href='movieinfo.php?name=" . $title . "'><img src='$cover' style='height: 380px;'></a>";
                          echo "<div class='caption'>";
                          echo "<a href='movieinfo.php?name=" . $title . "'><center><p class='title'><strong>" . $title . "</strong></p></center></a>";
                          echo "</div>";
                          echo "<a href='edit.php?id=" . $mid .  "' class='btn btn-success'>Update</a>";
                          echo "<span ><button type='button' class='btn btn-danger' id='deleteinfo' style='float: right' onclick='deletemovie(" . $mid . ")'>Delete</a></span>";
                          //onclick='deletemovie(" . $mid . ")
                          //echo "<button type='button' class='btn btn-success' onclick='wishlistmsg(" . $mmid . ")'>Saved to Wishlist</button>";

                          echo "</div></div>";
                        }
                        $count++;
                     }
                  }
                  ?>

              </div>
                <div class="center">
                  <ul class="pagination">
                    <?php
                      if($_SESSION['admin'] === 1){
                        $con = mysqli_connect("localhost","bluemagic_admin","heng#hao@haha!" , "bluemagic_movierating");
                      $sql="SELECT * FROM Movies";
                      $result = mysqli_query($con,$sql);
                      $row_num = mysqli_num_rows($result);
                      for($i = 1; $i <= ceil($row_num/6); $i++){
                        echo"<li><a href='managemovies.php?page=" . $i ."'>". $i . "</a></li>";
                      }
                    }
                    ?>
                  </ul>
                </div>
            </div>


        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                  <p>Made and Designed by Linyao Meng and Menghua Liu 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
