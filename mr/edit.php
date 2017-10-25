<?php
$mName ="";
$mID = 0;
if(!empty($_GET['name'])){
  $mName = $_GET['name'];
  $con = mysqli_connect("localhost","#example","#example" , "#example");
  $sql="SELECT M_ID FROM Movies WHERE title='$mName'";
  $result = mysqli_query($con,$sql);
  $mData = mysqli_fetch_array($result);
  $mmid = $mData['M_ID'];
  // if($mmid == NULL){
  //   header('Location: index.php');
  // }
}else{
  $mmid = $_GET['id'];
  // if($mmid == NULL){
  //   header('Location: index.php');
  // }
}

?>
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
    <link href="css/movinfo.css" rel="stylesheet">
    <link href="css/rating.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/functions.js"></script>
    <style>
     #storyplot{
     height: 100px;
     width: 500px;
    }

    #stars{
      height: 38px;
      width: 500px;
    }
    #cover{
      height: 38px;
      width: 500px;
    }
    #trailer{
      height: 38px;
      width: 500px;
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
          <?php
          if($_SESSION['admin'] === 1){
          $con = mysqli_connect("localhost","#example","#example" , "#example");
          $sql="SELECT * FROM Movies WHERE M_ID=$mmid";
          $result = mysqli_query($con,$sql);
          $mData = mysqli_fetch_array($result);
        }
           ?>


            <div class="col-md-9">
                <p class="lead"><b>&nbsp&nbspAdd a New Movie: </b></p>
                <div class="thumbnail" style="background-color: #eaeef2;">
                  <form method="POST" action="editMovieInfo.php">
                  <table>
                    <tr>
                      <td>Title: </td>
                      <td><input type="text" name="title" <?php echo "value='". $mData['title'] . "'"; ?>></td>
                    </tr>
                    <tr>
                      <td>Category: </td>
                      <td><input type="text" name="category" <?php echo "value='". $mData['Category'] . "'"; ?>></td>
                    </tr>
                    <tr>
                      <td>Year: </td>
                      <td><input type="text" name="year" <?php echo "value='". $mData['m_year'] . "'"; ?>></td>
                    </tr>
                    <tr>
                      <td>Release date: </td>
                      <td><input type="text" name="release_date" <?php echo "value='". $mData['release_date'] . "'"; ?>></td>
                    </tr>
                    <tr>
                      <td>Director: </td>
                      <td><input type="text" name="director" <?php echo "value='". $mData['director'] . "'"; ?>></td>
                    </tr>
                    <tr>
                      <td>Writers: </td>
                      <td><input type="text" name="writers" <?php echo "value='". $mData['writers'] . "'"; ?>></td>
                    </tr>
                    <tr>
                      <td>Stars: </td>
                      <td><input type="text" id="stars" name="stars" <?php echo "value='". $mData['stars'] . "'"; ?>></td>
                    </tr>
                    <tr>
                      <td>Cover: </td>
                      <td><input type="text" id="cover" name="cover" <?php echo "value='". $mData['cover'] . "'"; ?>></td>
                    </tr>
                    <tr>
                      <td>Trailer: </td>
                      <td><input type="text" id="trailer" name="trailer" <?php echo "value='". $mData['trailer'] . "'"; ?>></td>
                    </tr>
                    <tr>
                      <td>Storyline: </td>
                      <td><input type="text" id="storyplot" name="storyline" <?php echo "value='". $mData['storyline'] . "'"; ?>></td>
                    </tr>
                    <tr><td><input type='hidden' name='mmid' value='<?php echo "$mmid";?>'/></td></tr>
                    <?php
                    if($_SESSION['admin'] === 1){
                    echo "<tr><td><input type='submit' name='submitedit' class='btn btn-success'></td></tr>";
                    }
                    ?>
                  </table>
                </form>


                </div>

            </div>

        </div>

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
