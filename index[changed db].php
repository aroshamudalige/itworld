<?php
$link = @mysqli_connect('mysql11.000webhost.com', 'a9975639_any1', 'asd123') or die("Oops! Can't connect");
@mysqli_select_db($link, 'a9975639_anyone') or die("Can't find Database");
$query   = mysqli_query($link, "SELECT username, password FROM logins");
//$mail = $_POST['pw'];
$message = "";
$key     = "";
if (isset($_POST['logout'])) {
    $key = "";
}

if ($query) {
    while ($query_row = mysqli_fetch_assoc($query)) {
        $username = $query_row['username'];
        $password = $query_row['password'];
        //echo $username.$password;
        if (isset($_POST['mail']) && isset($_POST['pw'])) {
            $mail = $_POST['mail'];
            //echo $mail;
            $pw   = $_POST['pw'];
            if (!empty($mail) && !empty($pw)) {
                
                if ($username == $mail && $password == $pw) {
                    $key     = true;
                    $message = "<div class=\"input4\"><font color=\"#FFFFFF\" size=\"+2\">Welcome $mail</font><form method=\"GET\" action=\"index.php\">
	<input type=\"submit\" class=\"btn btn-warning\" value=\"Logout\" name=\"logout\">
				</form></div>";
                    
                    exit;
                    break;
                } else if ($username == $mail && $password != $pw) {
                    $message = "<form action=\"index.php\" method=\"POST\">
            <div class=\"input5\"> <input class=\"form-control input-sm\" type=\"text\" value=\"Incorrect password!\" name=\"mail\" onFocus=\"if(this.value  == 'Username' || 'Incorrect password') { this.value = ''; } \" onBlur=\"if(this.value == '') { this.value = 'Username'; } \"></div>
            <div class=\"input2\"> <input class=\"form-control input-sm\" type=\"password\" value=\"\" name=\"pw\" onFocus=\"this.value='';\" onBlur=\"if (this.value=='') {this.value='password';}\"></div>
            <div class=\"input3\"><input type=\"submit\" class=\"btn btn-warning\" value=\"Login\" name=\"login\"></div>
            </form>";
                    break;
                    
                } else {
                    $message = "<form action=\"index.php\" method=\"POST\">
            <div class=\"input5\"> <input class=\"form-control input-sm\" type=\"text\" value=\"Incorrect Details!\" name=\"mail\" onFocus=\"if(this.value  == 'Username' || 'Incorrect Details') { this.value = ''; } \" onBlur=\"if(this.value == '') { this.value = 'Username'; } \"></div>
            <div class=\"input2\"> <input class=\"form-control input-sm\" type=\"password\" value=\"\" name=\"pw\" onFocus=\"this.value='';\" onBlur=\"if (this.value=='') {this.value='password';}\"></div>
            <div class=\"input3\"><input type=\"submit\" class=\"btn btn-warning\" value=\"Login\" name=\"login\"></div>
            </form>";
                }
            } //else {
            //$message="Fill in the blanks";
            //goto a;
            //break;
            //}
        } //while ends
    }
} else {
    die("Not Ok");
}
mysqli_close($link);
?>

<?php
$message2 = "";
if (isset($_POST['signup'])) {
    if (isset($_POST['Full-name']) && isset($_POST['psd']) && isset($_POST['email'])) {
        $link2 = @mysqli_connect('mysql11.000webhost.com', 'a9975639_any1', 'asd123') or die("Oops! Can't connect");
        @mysqli_select_db($link2, 'a9975639_anyone') or die("Can't find Database");
        $fullname    = $_POST['Full-name'];
        $email2      = $_POST['email'];
        $newpassword = $_POST['psd'];
        $query       = "INSERT INTO logins(username,password) VALUES ('" . $email2 . "', '" . $newpassword . "')";
        $query2      = mysqli_query($link2, $query);
        if ($query2) {
            $message2 = "You have signed up successfully. Log in now";
        } else {
            $message2 = "Fill blanks";
            
        }

        mysqli_close($link2);
    }
    
}
?>
<html>
   <head>
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="css/custom.css">
      <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <!-- Optional theme -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <title>IT World</title>
   </head>
   
   <body>
      <div class="container-fluid" style="background-image:url(images/Header.jpg); min-height:280px">
         <h1 style="color:white; font-family:Harrington"><strong>Welcome to IT World</strong></h1>
         <div style="color:#000; font-size:18px">
            <strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Learn about computer tricks, tips and more...</strong>
            
            <?php
if ($message == "" && $key == "") {
    print("<form action=\"index.php\" method=\"POST\">
            <div class=\"input5\"> <input class=\"form-control input-sm\" type=\"text\" value=\"Username\" name=\"mail\" onFocus=\"if(this.value  == 'Username') { this.value = ''; } \" onBlur=\"if(this.value == '') { this.value = 'Username'; } \"></div>
            <div class=\"input2\"> <input class=\"form-control input-sm\" type=\"password\" value=\"password\" name=\"pw\" onFocus=\"this.value='';\" onBlur=\"if (this.value=='') {this.value='password';}\"></div>
            <div class=\"input3\"><input type=\"submit\" class=\"btn btn-warning\" value=\"Login\" name=\"login\"></div>
            </form>");
} else {
    echo $message;
}

?>
         </div>
         <div class="menu1">
         	<hr>
            <ul class="nav nav-pills">
               <li class="active"><a href="#"><strong>Home</strong></a></li>
               <li><a href="http://www.techspot.com/"><strong>Tips</strong></a></li>
               <li><a href="http://www.techspot.com/"><strong>Tricks</strong></a></li>
               <li><a href="http://www.popsci.com/technology"><strong>Articles</strong></a></li>
            </ul>
         </div>
         <br><br><br><br><br><br><br>
<?php
if ($message2 == "" && $key == "") {
    print("<div class=\"input2\" style=\"color:#FFF; font-size:20px; font-weight:100; left: 1000px; top: 95px;\">New to IT World? Sign Up</div>
         	<form action=\"index.php\" method=\"POST\">
            <div class=\"input2\" style=\"left:1120px; top:130px\"> <input class=\"form-control input-sm\" type=\"text\" value=\"Full name\" name=\"Full-name\" onFocus=\"if(this.value  == 'Full name') { this.value = ''; } \" onBlur=\"if(this.value == '') { this.value = 'Full name'; } \"></div>
            <div class=\"input2\" style=\"left:1120px; top:164px\" > <input class=\"form-control input-sm\" type=\"text\" value=\"E-mail\" name=\"email\" onFocus=\"if(this.value  == 'E-mail') { this.value = ''; } \" onBlur=\"if(this.value == '') { this.value = 'E-mail'; } \"></div>
            <div class=\"input2\" style=\"left:1120px; top:198px\"> <input class=\"form-control input-sm\" type=\"password\" value=\"password\" name=\"psd\" onFocus=\"this.value='';\" onBlur=\"if (this.value=='') {this.value='password';}\"></div>
            <div class=\"input2\" style=\"left:1127px; top:232px\"><input type=\"submit\" class=\"btn btn-warning\" value=\"Sign up for IT World\" name=\"signup\"></div>
            </form>");
} else if ($message2 != "Fill blanks") {
    print("<div class=\"input2\" style=\"left:900px; top:90px; color:white;\"><strong>$message2</strong></div>");
} else {
    print("<div class=\"input2\" style=\"color:#FFF; font-size:20px; font-weight:100; left: 1000px; top: 95px;\">New to IT World? Sign Up</div>
         	<form action=\"index.php\" method=\"POST\">
            <div class=\"input2\" style=\"left:1120px; top:130px\"> <input class=\"form-control input-sm\" type=\"text\" value=\"Fill in the Blanks\" name=\"Full-name\" onFocus=\"if(this.value  == 'Full name' || this.value  == 'Fill in the blanks') { this.value = ''; } \" onBlur=\"if(this.value == '') { this.value = 'Full name'; } \"></div>
            <div class=\"input2\" style=\"left:1120px; top:164px\" > <input class=\"form-control input-sm\" type=\"text\" value=\"E-mail\" name=\"email\" onFocus=\"if(this.value  == 'E-mail') { this.value = ''; } \" onBlur=\"if(this.value == '') { this.value = 'E-mail'; } \"></div>
            <div class=\"input2\" style=\"left:1120px; top:198px\"> <input class=\"form-control input-sm\" type=\"password\" value=\"password\" name=\"psd\" onFocus=\"this.value='';\" onBlur=\"if (this.value=='') {this.value='password';}\"></div>
            <div class=\"input2\" style=\"left:1127px; top:232px\"><input type=\"submit\" class=\"btn btn-warning\" value=\"Sign up for IT World\" name=\"signup\"></div>
            </form>");
}
?>
            <div class="input5" style="left:550px; top:130px; color:#FFF; font-family:Harrington"><blockquote><p><strong>"It has become appallingly obvious that our<br>technology has exceeded our humanity."</p><p><small>Albert Einstein</strong></small></p></blockquote></div>
         
      </div>
      <!--Header ends-->
      
      <div class="container-fluid" style="background-color:#CCC" >
      <div class="container" style="background-color:#FFF;  max-width:970px; min-height:2200px" >

 	<section id="carousel">
<div class="hero-unit span6 columns">
    <h2>Top Four smart phones to buy in 2016</h2>
    <div id="myCarousel" class="carousel  slide" >
      <!-- Carousel items -->
      <div class="carousel-inner">
        <div class="item  active" >
            <img class="img-responsive center-block" alt=""  src="images/3.jpg">
            <div class="carousel-caption">
                <h4>1. Iphone 6S</h4>
            </div>
        </div>
        <div class="item">
            <img class="img-responsive center-block" alt=""  src="images/featured1.jpg">
            <div class="carousel-caption">
                <h4>2. Nexus</h4>
            </div>
        </div>
        <div class="item">
            <img alt="" class="img-responsive center-block" src="images/iPhone 7 Plus.jpg">
            <div class="carousel-caption">
                <h4>3. Iphone 7 Plus</h4>
            </div>
        </div>
        <div class="item">
            <img alt="" class="img-responsive center-block" src="images/Samsung.jpg">
            <div class="carousel-caption">
                <h4>4. Samsung S7 Edge</h4>
            </div>
        </div>
      </div>
      <!-- Carousel nav -->
      <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
</div>
      </div></div><!--Middle part ends-->
      
      <div class="container-fluid"><!--style="background-image:url(footer.jpg); min-height:250px"-->
        <footer class="navbar navbar-fixed-bottom" style="background-color:#036">
            <br>
            <div class="row footer">
                <div class="col-md-5">
                    <p class="text-muted">&nbsp&nbsp2016 &#xA9; IT World</p>
                </div>
                <div class="col-md-3 bottom-links">
                    <ul class="list-inline" >
                        <li><a href="#">About us</a> </li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div><!--Footer ends-->
   </body>
</html>		