<?php
session_start();
if(!isset($_SESSION['uid']))
header("location:login.php?Message=Please login to continue.");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="../css/product.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css" rel="stylesheet">
	<style>
		.splide--nav>.splide__track>.splide__list>.splide__slide.is-active {
				border: 8px solid #e0d8d8;
		}
	</style>

<body>
     <nav class="navbar">
	 <a href="home.php" style="text-decoration: none; margin-left:5%;"><h1>BechDe</h1></a>
      <ul>
      
        <li><a href="viewcart.php">View Cart</a></li>
        <li><a href="profile.php">Profile</a></li>
      </ul>
    </nav>
    <form action="list.php" method="POST" class="search">
        <input  placeholder="Search for products ..." name="sitem"></input>
        <button id="enter">search</button>
    </form>
    <div class="outerContainer">

 <div class="left">
	 <?php
		if(isset($_GET['prod_id'])){
			$pitem= $_GET['prod_id'];
		}

		include('connection.php');
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql1="SELECT * from product,user_data where product.user_id = user_data.user_id AND prod_id = '$pitem';";
        $result = mysqli_query($conn, $sql1);

		if(mysqli_num_rows($result)!=0){
			$resarr = mysqli_fetch_assoc($result);
			echo "<div id='primary-slider' class='splide'>
			<div class='splide__track'>
				<ul class='splide__list'>
					<li class='splide__slide'><img src='$resarr[img1]'></li>
					<li class='splide__slide'><img src='$resarr[img2]'></li>
					<li class='splide__slide'><img src='$resarr[img3]'></li>
				</ul>
			</div>
		</div>
		<div id='secondary-slider' class='splide'>
			<div class='splide__track'>
				<ul class='splide__list'>
					<li class='splide__slide' id='sec' style='  border: 10x solid #F5E8E8;'>
						<img src='$resarr[img1]' >
					</li>
					<li class='splide__slide'  id='sec' style='  border: 10x solid #F5E8E8;'>
						<img src='$resarr[img2]'>
					</li>
					<li class='splide__slide'  id='sec' style='  border: 10x solid #F5E8E8;'>
						<img src='$resarr[img3]'>
					</li>
				</ul>
			</div>
		</div> 
		<p id='desc' style='color: #26133f; text-align: center; text-transform: capitalize;'>swipe to view next image</p>
		</div>
		
		<div class='right'>
		<div class='details'>
		<span id='productName'>$resarr[pname]</span><br>
						<span  id='seller'>$resarr[name] </span>
						<p id='desc'>$resarr[descp]</p>
						<table>
							<tr><td id='buy' style='font-weight: 500;'>$ $resarr[sell]</td>
							<td id='rent' style='font-weight: 500;'>$ $resarr[rent]</td></tr>
							
							<tr>
							<td><a href='cartdb.php?prod_id=$resarr[prod_id]&type=buy'><button class='btn1'>Buy</button></a></td> 
							<td><a href='cartdb.php?prod_id=$resarr[prod_id]&type=rent'><button class='bt2'>Rent</button></a></td>
							</tr>
						</table><br><br>
						<span  id='seller' style='margin-top: 0;'>seller info : </span>
		</div>
		";
		if($resarr['dp']!=''){
			echo "
		<div class='review'>
			<img src='$resarr[dp]' id='review_pic' >
			<div class='review_info'>
				<span id='review_name' style='color: #26133f;text-transform: capitalize; font-weight: 700;'>$resarr[name]</span><br>
				<span id='review_clg' style='color: #796fe9;text-transform: capitalize; font-weight: 500;'>$resarr[univ]</span><br>
				<span id='review_hostel' style='text-transform: capitalize; font-weight: 500;'>$resarr[hblock]</span><br>
				<span id='review_number'  style='text-transform: capitalize; font-weight: 500;'>$resarr[mob]</span><br>
			</div>
		</div>
		</div> ";
		  }else{
			echo "
			<div class='review'>
				<img src='../Assets/default.png' id='review_pic' >
				<div class='review_info'>
					<span id='review_name' style='color: #26133f;text-transform: capitalize; font-weight: 700;'>$resarr[name]</span><br>
					<span id='review_clg' style='color: #796fe9;text-transform: capitalize; font-weight: 500;'>$resarr[univ]</span><br>
					<span id='review_hostel' style='text-transform: capitalize; font-weight: 500;'>$resarr[hblock]</span><br>
					<span id='review_number'  style='text-transform: capitalize; font-weight: 500;'>$resarr[mob]</span><br>
				</div>
			</div>
			</div> ";
			
		  }
		
		}

		mysqli_close($conn);
	 ?>


			<!-- right ends here -->
    </div>

	<div class="analy">
		<h2>Product Analytics :</h2>
		<div id="analybox">

			<?php
				include("connection.php");
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}

				$sql = "select count(visitor_id) 'uni' ,sum(count) 'cnt' from stats where prod_id=$_GET[prod_id];";
				$fetch= mysqli_fetch_assoc(mysqli_query($conn,$sql));
				if($fetch['cnt']==''){
					$cnt = 0;
				}else{
					$cnt = $fetch['cnt'];
				}

				echo "
					<div class='analycard' id='analycard1'>
						<h2>$fetch[uni]</h2>
						<p>Unique Visitors</p>
					</div>
					<div class='analycard' id='analycard2'>
						<h2>$cnt</h2>
						<p>Product Views</p>
					</div>
				";
			
				$sql2 = "select count(user_id) 'crt' from cart where prod_id=$_GET[prod_id];";
				$fetch2= mysqli_fetch_assoc(mysqli_query($conn,$sql2));
				$formval3 = $fetch2['crt'];

				echo "
					<div class='analycard' id='analycard3'>
						<h2>$formval3</h2>
						<p>Added To Cart</p>
					</div>
				";

				mysqli_close($conn);
			?>
		
		</div>
	</div>

	<footer>
        <h1 style="text-align: center; text-transform: capitalize;color: #26133F;">bechde</h1>
        <p style="text-align: center; text-transform: capitalize;color: #000000;">Copyright © 2021 bechde. All rights reserved</p>
    </footer>
</body>
</html>
<script>

var secondarySlider = new Splide( '#secondary-slider' );
var primarySlider = new Splide( '#primary-slider' );
// primaryslider.sync( secondarySlider ).mount();
document.addEventListener( 'DOMContentLoaded', function () {
	var secondarySlider = new Splide( '#secondary-slider', {
		fixedWidth  : 180,
		speed : 300,
		height      : 110,
		gap         : 20,
		cover       : true,
		isNavigation: true,
		focus       : 'center',
   
		breakpoints : {
			'600': {
				fixedWidth: 66,
				height    : 40,
			}
		},
	} ).mount();
	
	var primarySlider = new Splide( '#primary-slider', {
		type       : 'fade',
		heightRatio: 0.65,
		speed : 300,
		pagination : false,
		arrows     : false,
		cover      : true,
    keyboard:'focused',
  
 
	} );
	
	primarySlider.sync( secondarySlider ).mount();
} );
</script>