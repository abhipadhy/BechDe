<?php
session_start();
if(!isset($_SESSION['uid']))
header("location:login.php?Message=Please login to continue.");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/profile.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <title>BechDe</title>
</head>

<body>
  <nav class="navbar">
  <a href="home.php" style="text-decoration: none; margin-left:5%;"><h1>BechDe</h1></a>
    <ul>

      <li><a href="list.php">Buy</a></li>
      <li><a href="sell.php">Sell</a></li>
      <li><a href="viewcart.php">View Cart</a></li>
      <li><a href="login.php?message=logout&Message=Logged%20Out.">Logout</a></li>

    </ul>
  </nav>
  <div class="profile_details" style="text-align: center;">
    <?php 
     include('connection.php');
     if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
     }
     $sql="select name,hblock,dp from user_data where user_id=$_SESSION[uid]";
    $result= mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)!=0){
      $row = mysqli_fetch_assoc($result);
      if($row['dp']!=''){
        echo  "<img src='$row[dp]' style='object-fit:cover;object-position:50% 50%; border: 12px solid #bbaff05a;'><br>";
      }else{
        echo  "<img src='../Assets/default.png' style='object-fit:cover;object-position:50% 50%; border: 12px solid #bbaff05a;'><br>";
      }
     
      echo "<span id='user_name'>$row[name]</span><br>
      <span  id='user_addr'>$row[hblock]</span><br><br>";
    }
     mysqli_close($conn);
    ?>
    <a href="editprof.php" style="text-decoration: none;text-transform:capitalize"><button id="edit">edit
        profile</button></a><br><br>

    <span id="purchased" style="cursor:pointer;text-transform: capitalize;"><button style="color:#26133f;">Purchased
        Products</button> </span>
    <span id="listed" style="cursor:pointer; text-transform: capitalize;"><button>Listed Products</button></span><br>



    <div class="p_container" id="perchased_list" style="text-align: left;">
      <div class="pc">
        <div class="card">
          <img src="../Assets/beard.jpg">
          <div class="right1">
            <span id="productName">Beardo beard grooming kit</span><br>
            <span id="seller">abhishek padhy</span>
            <p id="desc">"Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos maiores aut eveniet fuga
              necessitatibus cupiditate, eligendi consequuntur sit. Quam est at perspiciatis voluptates voluptatum,
              doloremque fugiat quis soluta non sunt!"</p>
            <table>
              <tr>
                <td id="buy" style="font-weight: 500;">$ 100</td>
                <td id="rent" style="font-weight: 500;">$10</td>
              </tr>

              <tr>
                <td><button class="btn1">Buy</button></td>
                <td><button class="bt2">Rent</button></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="card">
          <img src="../Assets/cycle.JPG">
          <div class="right1">
            <span id="productName">Hero cycle</span><br>
            <span id="seller">hemang Pandey</span>
            <p id="desc">"Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos maiores aut eveniet fuga
              necessitatibus cupiditate, eligendi consequuntur sit. Quam est at perspiciatis voluptates voluptatum,
              doloremque fugiat quis soluta non sunt!"</p>
            <table>
              <tr>
                <td id="buy" style="font-weight: 500;">$ 100</td>
                <td id="rent" style="font-weight: 500;">$10</td>
              </tr>

              <tr>
                <td><button class="btn1">Buy</button></td>
                <td><button class="bt2">Rent</button></td>
              </tr>
            </table>
          </div>
        </div>


      </div>


      <div class="l_container" id="listed">
        <?php 
     include('connection.php');
     if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
     }
     $id=$_SESSION['uid'];
    
     $sql="select * from product,user_data where product.user_id=user_data.user_id AND user_data.user_id=$id;";
    $result= mysqli_query($conn,$sql);
 
    if(mysqli_num_rows($result)!=0){
    
      while($row = mysqli_fetch_assoc($result)){
                
        echo "  <a href='prodanaly.php?prod_id=$row[prod_id]'>
              <div class='card1'>
              <img src='$row[img1]'>
              <div class='right1'>
                  <span id='productName'>$row[pname]</span><br>
                  <span  id='seller'>$row[name] </span>
                  <p id='desc'>$row[descp]</p>
                  <table>
                      <tr><td id='buy' style='font-weight: 500;'>Rs  $row[sell]</td>
                      <td id='rent' style='font-weight: 500;'>Rs  $row[rent]</td></tr>
                      
                      <tr><td><button class='btn1'>Buy</button></td> <td><button class='bt2'>Rent</button></td></tr>
                  </table>
              </div>
          </div>
        </a> 
       ";

  } //while ends here
     
    }
    else{
      echo "<p style='text-align:center;'>No products listed.</p>";
    }
     mysqli_close($conn);
    ?>


      </div>
    </div>
  </div>
</body>

</html>
<script>
  document.querySelector('#purchased').addEventListener("click", () => {
    document.querySelector(".pc").style.display = "block";
    document.querySelector("#purchased button").style.color = "#26133f";
    document.querySelector("#purchased button").style.transition = "0.3s";
    document.querySelector(".l_container").style.display = "none";
  });
  document.querySelector('#listed').addEventListener("click", () => {
    document.querySelector(".l_container").style.display = "block";
    document.querySelector("#purchased button").style.color = "#784eaf";
    document.querySelector("#purchased button").style.transition = "0.3s";
    document.querySelector(".pc").style.display = "none";
  });
</script>