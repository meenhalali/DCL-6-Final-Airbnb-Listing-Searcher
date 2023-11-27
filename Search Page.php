<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Search Page</title>
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
						<h1>Search Page</h1>
						<p>Search for the cheapest Airbnbs in Dublin, Amsterdam, Barcelona, Melbourne, Vancouver, and Tokyo! </p>
					</header>

				<!-- Main -->
					<div id="main">
                        <!-- Content -->
                        <section id="content" class="main"> 

                        <p>Pick a city from the following: Dublin, Amsterdam, Barcelona, Melbourne, Vancouver, or Tokyo </p> 
						<form name="form1" method="post">
							<input type="text" id="search-input" name="search-input" aria-lable="Search" required placeholder="Search for a city" >
							<input type="submit" value="Search" name="submit" required id ="submit"> </input>

 						</form>
                        <p> Price is in local Currency </p>

                        <div style="width:100%;height:600px;overflow-Y:auto;">
                        <h2>Table of Listings</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Neighbourhood</th>
                                    <th scope="col">Host Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Average Price of Neighbourhood</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                if (array_key_exists('submit', $_POST)) {
                                    search();
                                };

                                function search()
                                {

                                    $con=mysqli_connect("localhost", "root", "", "listings");

                                    // Check connection
                                    if ($con->connect_error) {
                                        die("Connection failed: " . $con->connect_error);
                                    };
                                    
                                    $searchinp = $_POST["search-input"];
                                    $res = null;
                                    
                                    $sql = "SELECT * FROM listings WHERE neighbourhood_group LIKE  '%" . $searchinp . "%' ORDER BY reviews_per_month DESC LIMIT 10";

                                    $getquery = mysqli_query($con,$sql);
                                    $run = mysqli_query($con,$sql);
                                    $foundnum = mysqli_num_rows($run);
                                    
                                    if ($foundnum == 0) 
                                    {
                                        echo "We were unable to find Airbnbs in the city of '<b>$searchinp</b>'.";
                                    }
                                    else{
                                        while ($row = $run->fetch_assoc()) {
                                            echo "<tr><td>" . $row["name"] . "</td><td>" . $row["neighbourhood"] . "</td><td>" . $row["host_name"] . "</td><td>" . $row["price"] . "</td>" . "</td><td>" . $row["average_price"] . "</td><td></tr>";
                                        }
                                        echo "<h2> Top ".$foundnum." search results from $searchinp</h2>";
                                    }

                                    $con->close();

                                };

                                ?>
                            </tbody>
                        </table>		
                        <div class="col-6 col-12-medium">
								<ul class="actions stacked">
									<div class="align-signup">
										<li><a href="index.html" class="button primary">Home Page</a> </li>
										</br>
									</div>
								</ul>
							</div> 
			            </div>
            </div>
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
