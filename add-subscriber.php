<!DOCTYPE html>
<html lang="en">

<head>
<title>Subscribe</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Architecture" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel='shortcut icon' href='images/favicon.png' type='image/x-icon'>

</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top hidden-print">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Home</a>            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">           
                    <li><a href="architecture.html">Projects</a></li>
                    <li><a href="bizarre.html">Architecture</a></li>
                    <li><a href="ny-architectue.html">NYC Architecture</a></li>
                    <li><a href="entertainment.html">Entertainment</a></li> 
                    <li><a class="active" href="add-subscriber.php">Subscribe</a></li>
                    <li><a href="site_map.html">Site Map</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                      <li><a href="http://cis3630.org/student-webpages.php">Student Pages</a></li>
                      <li><a href="http://veronica-leong.com/">Veronica Leong</a></li>
                  </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <div class="container">        
        <div class="jumbotron">
            <div class="page-header">
                <h1>Subscribe </h1>
            </div>
            <?php
		include('database-connect.php');
		
		if(isset($_POST['add']))
		{
		
		$conn = mysql_connect($servername, $username, $password, $dbname );
		if(! $conn )
		{
		die('Could not connect: ' . mysql_error());
		}
		
		if(! get_magic_quotes_gpc() )
		{
		$student_name = addslashes ($_POST['student_name']);
		$student_email_address = addslashes ($_POST['student_email_address']);
		}
		else
		{
		$student_name = $_POST['student_name'];
		$student_email_address = $_POST['student_email_address'];
		}
		$student_website = $_POST['student_website'];
		
		$sql = "INSERT INTO students". "(name,email, url, added) ". "VALUES('$student_name','$student_email_address','$student_website', NOW())";
		mysql_select_db($dbname);
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
		die('Could not enter data: ' . mysql_error());
		}
		echo '<a href="subscribers.php">Subsciption request accepted</a>!';
		mysql_close($conn);
		}
		else
		{
		?>
			<form method="post" action="add-subscriber.php">
			<table style="width:300px;padding:10px">
			<tr>
			<td style="width:100px">Name</td>
			<td><input name="student_name" type="text" id="student_name" /></td>
			</tr>
			<tr>
			<td style="width:100px">Email Address</td>
			<td><input name="student_email_address" type="text" id="student_email_address" /></td>
			</tr>
			<tr>
			<td style="width:100px">Website</td>
			<td><input name="student_website" type="text" id="student_website" /></td>
			</tr>
			<tr>
			<td style="width:100px"></td>
			<td> </td>
			</tr>
			<tr>
			<td style="width:100px"></td>
			<td>
			<input name="add" type="submit" id="add" value="Add Student" />
			</td>
			</tr>
			</table>
			</form>
			<a href="subscribers.php">Subscribers Page</a>
			<?php
			}
			?>

<hr/>
            <footer>
                Contact: 646-543-2101<br/>
                Copyright &copy; 2017
                <div class="validate">
                    <a class="img-validate" href="https://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fdewittdevs.com%2Fstyle.css&profile=css3&usermedium=all&warning=1&vextwarning=&lang=en" target="_blank"><img class="logo hidden-print" src="images/w3scss.png" alt="w3clogo"/></a>                 
                    <a class="img-validate" href="https://validator.w3.org/nu/?doc=http%3A%2F%2Fdewittdevs.com%2Fadd-subscriber.php" target="_blank"><img class="logo hidden-print" src="images/w3clogo.png" alt="w3clogo"/></a>                   
                </div>               
            </footer> 
        </div>
    </div>       

<script src="jquery-3.2.0.min.js"></script>
<script src="bootstrap.min.js"></script>

</body>
    
</html>