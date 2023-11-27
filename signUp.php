<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Sign up</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1>Sign Up Page</h1>
					</header>

				<!-- Main -->
					<div id="main">
                        <?php

                        if (array_key_exists('SignUp', $_POST)) {
                            signUp();
                        }

                        function signUp()
                        {

                            $con=mysqli_connect("localhost", "root", "", "listings");

                            // Check connection
                            if ($con->connect_error) {
                                die("Connection failed: " . $con->connect_error);
                            }

                            $sql ="insert into users(displayname,password,email) values ('".$_POST["display-name"]."','".$_POST["password-value"]."','".$_POST["email-value"]."')";
                            if ($con->query($sql) === TRUE) {
                                header("location: login.php");
                            }else{
                                echo "<p>Error: " . $sql . "<br>" . $con->error."</p> <br>";
                            }

                            $con->close();

                        }

                        ?>

						<section>
							<h2>Sign Up </h2>
							<form method="post" action="#">
								<div class="row gtr-uniform">
									<div class="col-6 col-12-xsmall">
                                        <label for="display-name">Display Name</label>
										<input type="text" name="display-name" id="display-name" value="" placeholder="Display Name" required/>
									</div>
									<div class="col-6 col-12-xsmall">
                                        <label for="email-value">Email address</label>
										<input type="email" name="email-value" id="email-value" value="" placeholder="Email" required/>
									</div>
									<div class="col-6 col-12-xsmall">
                                        <label for="password-value">Password</label>
										<input type="password" name="password-value" id="password-value" value="" placeholder="password" required/>
									</div>
								</div>
                                <button type="submit" id="SignUp" name="SignUp" class="btn btn-primary">Sign Up</button>
							</form>
							<div class="col-6 col-12-medium">
								<ul class="actions stacked">
									<div class="align-signup">
										<li><a href="index.html" class="button primary">Home Page</a> </li>
										<li><a href="login.php" class="button login">Login</a></li>
									</div>
								</ul>
							</div> 
						</section>

				<!-- Footer -->
					<footer id="footer">
						<p class="copyright">&copy; Airbnb Searcher 2023 </p>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>