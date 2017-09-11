<?php
$mName ="";
$mID = 0;
if(!empty($_GET['name'])){
  $mName = $_GET['name'];
  $con = mysqli_connect("localhost","bluemagic_admin","heng#hao@haha!" , "bluemagic_movierating");
  $sql="SELECT M_ID FROM Movies WHERE title='$mName'";
  $result = mysqli_query($con,$sql);
  $mData = mysqli_fetch_array($result);
  $mmid = $mData['M_ID'];
  if($mmid == NULL){
    header('Location: index.php');
  }
}else{
  $mmid = $_GET['id'];
  if($mmid == NULL){
    header('Location: index.php');
  }
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/movinfo.css" rel="stylesheet">
    <link href="css/rating.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/functions.js"></script>
    <script>
        function wishlistmsg(mmid) {
          xmlhttp=new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("wlmsg").innerHTML=xmlhttp.responseText;
            }
          };
          xmlhttp.open("GET","wishlist.php?q="+mmid,true);
          xmlhttp.send();
        }

        function getactingrating(storyratingid, mid) {
          var a_num = parseInt(storyratingid);
          var mmid = parseInt(mid);
          xmlhttp=new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("act").innerHTML=xmlhttp.responseText;
              setTimeout(location.reload.bind(location), 3000);
            }
          };
          xmlhttp.open("GET","movieratingtype.php?a="+a_num+"&mid="+mmid,true);
          xmlhttp.send();
        }

        function getstoryrating(storyratingid, mid) {
          var sp_num = parseInt(storyratingid);
          var mmid = parseInt(mid);
          xmlhttp=new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("splot").innerHTML=xmlhttp.responseText;
              setTimeout(location.reload.bind(location), 3000);
            }
          };
          xmlhttp.open("GET","movieratingtype.php?sp="+sp_num+"&mid="+mmid,true);
          xmlhttp.send();
        }

        function getvisualrating(storyratingid, mid) {
          var v_num = parseInt(storyratingid);
          var mmid = parseInt(mid);
          xmlhttp=new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("visual").innerHTML=xmlhttp.responseText;
              setTimeout(location.reload.bind(location), 3000);
            }
          };
          xmlhttp.open("GET","movieratingtype.php?v="+v_num+"&mid="+mmid,true);
          xmlhttp.send();
        }

        $(function(){
        	$(".ratingcell li").click(function(){
        		$(this).addClass("ratingcellcolor");
        		$(this).prevAll().addClass("ratingcellcolor");
        		$(this).nextAll().removeClass("ratingcellcolor");
        	});

        });
    </script>

    </head>

<body>

    <!-- Navigation -->
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
            <p class="lead">&nbsp</p>
            <div class="col-md-9">
                <div class="thumbnail">
                    <div id="showCover">
                      <?php
                      $con = mysqli_connect("localhost","bluemagic_admin","heng#hao@haha!" , "bluemagic_movierating");
                      $sql="SELECT * FROM Movies WHERE M_ID=$mmid";
                      $result = mysqli_query($con,$sql);
                      $mData = mysqli_fetch_array($result);
                      echo "<img class='col-sm-4 poster' src=" . $mData['cover'] . ">";
                      echo $mData['trailer'];
                       ?>

                    </div>
                    <div class="caption-full" style=" clear: left;">

                        <?php
                        $con = mysqli_connect("localhost","bluemagic_admin","heng#hao@haha!" , "bluemagic_movierating");
                        $sql="SELECT * FROM Movies WHERE M_ID=$mmid";
                        $result = mysqli_query($con,$sql);
                        $mData = mysqli_fetch_array($result);
                        echo "<h4 id='movname'>" . $mData['title'] . "<span>&nbsp&nbsp(" . $mData['m_year'] . ")</span></h4>";
                        echo "<p>Release Date: " . $mData['release_date'] . "<p>";
                        echo "<p>Director: " . $mData['director'] . "<p>";
                        echo "<p>Writers: " . $mData['writers'] . "<p>";
                        echo "<p>Stars: " . $mData['stars'] . "<p>";
                        echo "<p>Story Plot: " . $mData['storyline'] . "<p>";
                         ?>
                        <div id="wlmsg">
                          <?php
                          $con = mysqli_connect("localhost","bluemagic_admin","heng#hao@haha!" , "bluemagic_movierating");
                          $username = $_COOKIE['movierating'];
                          $sql0="SELECT * FROM Users WHERE username = '$username'";
                          $result0= mysqli_query($con,$sql0);
                          $row = mysqli_fetch_array($result0);
                          $uid = $row['U_ID'];

                          $sql="SELECT * FROM Wishlist WHERE movie_id = '$mmid' AND user_id = '$uid'";
                          $result = mysqli_query($con,$sql);
                          $row_num = mysqli_num_rows($result);

                            if($row_num == 0){
                              echo "<button type='button' class='btn btn-info' onclick='wishlistmsg(" . $mmid . ")'>Add to Wishlist</button>";
                            }elseif($row_num ==1){
                              echo "<button type='button' class='btn btn-success' onclick='wishlistmsg(" . $mmid . ")'>Saved to Wishlist</button>";
                            }

                          ?>
                        </div>


                    </div>
                    <div class="ratings">
                      <ul>
                          <?php
                          $con = mysqli_connect("localhost","bluemagic_admin","heng#hao@haha!" , "bluemagic_movierating");
                          $sql="SELECT * FROM Arating WHERE movie_ID = '$mmid'";
                          $result = mysqli_query($con,$sql);
                          $Arating_count = mysqli_num_rows($result);
                          $arating_sum;
                          while($row = mysqli_fetch_array($result)){
                            $arating_sum = $row['A_rating']+$arating_sum;
                          }
                          $arating_avg=$arating_sum/$Arating_count;

                          $sql1="SELECT * FROM Sprating WHERE movie_ID = '$mmid'";
                          $result1 = mysqli_query($con,$sql1);
                          $srating_count = mysqli_num_rows($result1);
                          $srating_sum;
                          while($row = mysqli_fetch_array($result1)){
                            $srating_sum = $row['sp_rating']+$srating_sum;
                          }
                          $srating_avg=$srating_sum/$srating_count;

                          $sql2="SELECT * FROM Vrating WHERE movie_ID = '$mmid'";
                          $result2 = mysqli_query($con,$sql2);
                          $vrating_count = mysqli_num_rows($result2);
                          $vrating_sum;
                          while($row = mysqli_fetch_array($result2)){
                            $vrating_sum = $row['v_rating']+$vrating_sum;
                          }
                          $vrating_avg=$vrating_sum/$vrating_count;

                          echo "<li>Acting：" . round($arating_avg, PHP_ROUND_HALF_UP) . "</li>";
                          echo "<li>Story Plot: " . round($srating_avg, PHP_ROUND_HALF_UP) . "</li>";
                          echo "<li>Visual Effect: " . round($vrating_avg, PHP_ROUND_HALF_UP) . "</li>";
                          ?>
                      </ul>
                    </div>
                </div>

                <div class = "well">

                    <div class="text-left">
                        <h4 style="color: #d17581">Leave a Rating: </h4>
                    </div>

                    <div class="ratingblock">

                    	<div class="ratingList row">
                    		<div class="ratingtype">Acting：</div>
                    		<ul class="ratingcell">
                          <?php
                      			echo "<li id='1' onclick='getactingrating(this.id," . $mmid .")'>1</li>";
                      			echo "<li id='2' onclick='getactingrating(this.id," . $mmid .")'>2</li>";
                      			echo "<li id='3' onclick='getactingrating(this.id," . $mmid .")'>3</li>";
                      			echo "<li id='4' onclick='getactingrating(this.id," . $mmid .")'>4</li>";
                            echo "<li id='5' onclick='getactingrating(this.id," . $mmid .")'>5</li>";
                            echo "<li id='6' onclick='getactingrating(this.id," . $mmid .")'>6</li>";
                      			echo "<li id='7' onclick='getactingrating(this.id," . $mmid .")'>7</li>";
                      			echo "<li id='8' onclick='getactingrating(this.id," . $mmid .")'>8</li>";
                      			echo "<li id='9' onclick='getactingrating(this.id," . $mmid .")'>9</li>";
                            echo "<li id='10' onclick='getactingrating(this.id," . $mmid .")'>10</li>";
                            ?>
                    		</ul>
                        <span id="act" style= "color: #11BB2D;font-weight: bold;"></span>
                    	</div>
                      <div class="ratingList row">
                        <div class="ratingtype">Story Plot: </div>
                        <ul class="ratingcell">
                        <?php
                          echo "<li id='1' onclick='getstoryrating(this.id," . $mmid .")'>1</li>";
                          echo "<li id='2' onclick='getstoryrating(this.id," . $mmid .")'>2</li>";
                          echo "<li id='3' onclick='getstoryrating(this.id," . $mmid .")'>3</li>";
                          echo "<li id='4' onclick='getstoryrating(this.id," . $mmid .")'>4</li>";
                          echo "<li id='5' onclick='getstoryrating(this.id," . $mmid .")'>5</li>";
                          echo "<li id='6' onclick='getstoryrating(this.id," . $mmid .")'>6</li>";
                          echo "<li id='7' onclick='getstoryrating(this.id," . $mmid .")'>7</li>";
                          echo "<li id='8' onclick='getstoryrating(this.id," . $mmid .")'>8</li>";
                          echo "<li id='9' onclick='getstoryrating(this.id," . $mmid .")'>9</li>";
                          echo "<li id='10' onclick='getstoryrating(this.id," . $mmid .")'>10</li>";
                          ?>
                        </ul>
                        <span id="splot" style= "color: #11BB2D;font-weight: bold;"></span>
                      </div>
                      <div class="ratingList row">
                        <div class="ratingtype">Visual Effect: </div>
                        <ul class="ratingcell">
                          <?php
                            echo "<li id='1' onclick='getvisualrating(this.id," . $mmid .")'>1</li>";
                            echo "<li id='2' onclick='getvisualrating(this.id," . $mmid .")'>2</li>";
                            echo "<li id='3' onclick='getvisualrating(this.id," . $mmid .")'>3</li>";
                            echo "<li id='4' onclick='getvisualrating(this.id," . $mmid .")'>4</li>";
                            echo "<li id='5' onclick='getvisualrating(this.id," . $mmid .")'>5</li>";
                            echo "<li id='6' onclick='getvisualrating(this.id," . $mmid .")'>6</li>";
                            echo "<li id='7' onclick='getvisualrating(this.id," . $mmid .")'>7</li>";
                            echo "<li id='8' onclick='getvisualrating(this.id," . $mmid .")'>8</li>";
                            echo "<li id='9' onclick='getvisualrating(this.id," . $mmid .")'>9</li>";
                            echo "<li id='10' onclick='getvisualrating(this.id," . $mmid .")'>10</li>";
                            ?>
                        </ul>
                        <span id="visual" style= "color: #11BB2D;font-weight: bold;"></span>
                      </div>

                    </div>

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
