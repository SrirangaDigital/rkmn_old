<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>Ramakrishna Math, Nagpur</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,700' rel='stylesheet' type='text/css'>
    <link href="//fonts.googleapis.com/css?family=Raleway:100,400,300,600" rel="stylesheet" type="text/css">

    <!-- Javascript calls
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="js/lightbox.js"></script>

    <!-- Only MathHax goes here
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <script type="text/javascript" src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({
          tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
        });
    </script>
    <script type="text/javascript" src="js/common.js"></script>
    
    <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/font-awesome-4.1.0/css/font-awesome.min.css" type="text/css" />
    <!-- <link rel="stylesheet" href="css/skeleton.css"> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css"> -->
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/page.css">
    <link rel="stylesheet" href="css/archive.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/flat.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/aux.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- Favicon
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="images/favicon.png">
</head>
<body>
    <!-- Navigation
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="images/rkm_logo.png" alt="Logo of the Ramakrishna Math" class="img-circle"></a>
                <p class="navbar-text">Ramakrishna Math, Nagpur</p>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
					<li><a href="../index.php">Home</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="archive.php">Archive</a></li>
					<li class="dropdown">
						<a href="publications.php"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Publications <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="display_books.php?language=Hindi">Hindi Books</a></li>
							<li><a href="display_books.php?language=Marathi">Marathi Book</a></li>						
						</ul>
					</li>
					<li><a href="current_events.php">Current Events</a></li>
					<li><a href="contact.php">Contact Us</a></li>
				</ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <!-- End Navigation
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="container">

<!-- <div class="row">
<div class=" col-sm-offset-1 col-md-8">
	<p>This is an electronic version of our entire Publication Catalogue.</p>
	<h3>Important :</h3> 

	<ul>
		<li>No Credit Card is required to order our Publications.</li> 
		<li>All payments should be made through Draft or Money Order. These should be drawn in the name of "Ramakrishna Math, Nagpur".</li> 
		<li>Prices may be subject to change. All the price changes will be updated at earliest.</li> 
		<li>Shipping and Packing charges will be added later.</li> 
		<li>After we receive your order we will send you a Proforma Invoice with your order value plus the shipping and packing charges calculated against the weight of the parcel.</li>
	</ul>
	<h3>Jivan Vikas Magazine</h3>
	<ul>
		<li>Annual Subscription: Rs.60/-</li>
		<li>Life Membership: Rs.1,000/-</li>
		<li>Annual Subscription (Foreign): Rs.1,050/-</li>
	</ul>
</div>
</div>
 -->

<div class="row">
	<div class="col-md-12">
		<div id="wrapper">
			<div id="columns">

<?php

include("connect.php");

$db = mysql_connect("localhost",$user,$password) or die("Not connected to database");
$rs = mysql_select_db($database,$db) or die("No Database");
mysql_set_charset("utf8",$db);
		
if(isset($_GET['language']))
{
	$language=$_GET['language'];
	if($language == '')
	{
		$language = 'Hindi';
	}
}
else
{
	$language = 'Hindi';
}		


$query = "select * from Books where language='$language' order by book_id";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);

if($num_rows > 1)
{

	for($i=1;$i<=$num_rows;$i++)
	{
		$row=mysql_fetch_assoc($result);
		
		$title=$row['title'];
		$authors=$row['authors'];
		$book_id=$row['book_id'];
		$language=$row['language'];
		$category=$row['category'];	
		
		$filename = "images/cover/" . $book_id . ".jpg";
		
		echo '<div class="pin">';
		// echo '<div class="media"><i class="fa fa-file-pdf-o"></i><br /><i class="fa fa-file-text-o"></i></div>';
		echo (file_exists($filename)) ? '<img src="'. $filename .'" alt="Cover page for $book_id" />' : '<i class="fa fa-book book-icon"></i>';
		echo '<p>';
		echo $title . '<br />';
		echo ($authors) ? '<span class="author"><i class="fa fa-user"></i> ' . $authors . '</span><br />' : '';
		echo ($category) ? '<span class="category"><i class="fa fa-tag"></i> ' . $category . '</span><br />' : '';
		echo ($language == 'Hindi') ? '<span class="lang">हिन्दी</span><br />' : '<span class="lang">मराठी</span><br />';
		echo '<span class="more"><a href="" class=>आगे...</a></span>';
		echo '</p>';
		echo '</div>';
	}	
}
	
?>
			</div>
		</div>
	</div>
</div>

</div>
	
<!-- Footer -->
<div id="k-subfooter">
        <div class="container"><!-- container -->
            <div class="row"><!-- row -->
                <div class="col-lg-6">
                    <p class="copy-text text-left">
                        © 2015 Ramakrishna Math, Nagpur. All rights reserved.
                    </p>
                </div>
                <div class="col-lg-6">
                    <p class="copy-text text-right">
                        <a href="">Terms of Use</a> | <a href="">Privacy Policy</a> | <a href="">Sitemap</a>
                    </p>
                </div>
            </div><!-- row end -->
        </div><!-- container end -->
    </div>

    <!-- End Main page layout
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
