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
    <title>Cart</title>
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>
<body>
    <nav class="navbar">
    <a href="home.php" style="text-decoration: none; margin-left:5%;"><h1>BechDe</h1></a>
      <ul>
        <li><a href="list.php">Buy</a></li>
        <li><a href="sell.php">Sell</a></li>
        <li><a href="sell.php">Rent</a></li>
        <li><a href="profile.php">Profile</a></li>
      </ul>
    </nav>
    <p style="text-align: center;color:red;text-transform:capitalize;font-size:90%; display:block" id="msg">
            <?php
                    if(isset($_GET['Message'])){
                        echo " $_GET[Message] ";
                    }else{
                        echo "";
                    }
            ?>
            </p>
    <div class="left">
        <div class="tab"> 
            <ul id="heading">
                <li>products</li>
                <li>description</li>
                <li>price</li>
                <li>Delete</li>
            </ul>
            <br>
            <hr style="width: 95%;margin-left: 0%;">

            <?php

                include('connection.php');
                if(!$conn){
                    echo "mysql error : " .$mysqli_error($conn);
                }else{
                    $count;
                    global $total;
                    $sql = "select * from product,cart where product.prod_id = cart.prod_id AND cart.user_id = $_SESSION[uid]";
                    if($res=mysqli_query($conn,$sql)){

                        $count = mysqli_num_rows($res);
                       
                        if(mysqli_num_rows($res)!=0){
                                while($row= mysqli_fetch_assoc($res)){

                                    if($row['type'] =='buy'){
                                        echo " 
                                        <div class='card'>  
                                        <img src='$row[img1]' >
                                        <ul id='heading2'>
                                            <li style='width: 25%;'><a href='product.php?prod_id=$row[prod_id]'  id='page'><p >$row[pname]</p></a></li>
                                            <li style='width: 15%;margin-right: 15%; padding-right: 0%;'><p >$row[sell]</p></li>
                                        <li style='margin-right: 0%;padding-top: 2.5%;'><a href='delprodcart.php?prod_id=$row[prod_id]&name=$row[pname]' style='text-decoration:none;'><button id='del'><i class='fas fa-trash'></i></button></a></li>
                                        </ul>
                                        </ul>
                                        </ul>
                                    </div>
                                  
                                    "; 
                                    $total =  $total + $row['sell'];
                                }else{
                                    echo " 
                                        <div class='card'>  
                                        <img src='$row[img1]' >
                                        <ul id='heading2'>
                                            <li style='width: 25%;'><a href='product.php?prod_id=$row[prod_id]'  id='page'><p >$row[pname]</p></a></li>
                                            <li style='width: 15%;margin-right: 15%; padding-right: 0%;'><p >$row[rent]</p></li>
                                        <li style='margin-right: 0%;padding-top: 2.5%;'><a href='delprodcart.php?prod_id=$row[prod_id]&name=$row[pname]' style='text-decoration:none;'><button id='del'><i class='fas fa-trash'></i></button></a></li>
                                        </ul>
                                        </ul>
                                        </ul>
                                    </div>
                                    "; 
                                    $total =  $total + $row['rent'];
                                }
                            } //while ends her

                            $ext = (0.10 * $total); 
                            $total = $total- $ext;
                            $price =$total+$ext;
                            echo   " 
                            </div>
                            </div>
                            
                            <div class='right'>
                                <div class='righttab'>
                                        <ul id='heading' style='padding-top: 12%; padding-left: 12%;'>
                                                                <li>order summary</li>
                                                            </ul>
                                                            <br><br>
                                                            
                                                            <div class='card2'>  
                                                                <ul id='heading3'>
                                                                    <li style='width: 40%;'><p >$count Products</p></li>
                                                                    <li style='width: 30%;margin-left: 25%;'><p >Rs.$total</p></li>
                                                                    <li style='width: 40%;'><p >Extras</p></li>
                                                                    <li style='width: 30%;margin-left: 25%;'><p >Rs. $ext</p></li>
                                                                </ul>
                                                                </ul>
                                                                </ul>
                                                            </div>
                                                
                                                            <ul id='total'>
                                                                <li>total</li>
                                                                <li style='margin-left: 45%;'>Rs. $price</li>
                                                            </ul>
                                                            
                                                            <a href='checkoutdb.php'><button id='cout'>checkout</button></a>
                                                
                                                            <br><br><br>
                                </div>
                                                        
                        </div>  
                            ";

                        }else{
                            if($_GET['Message']!= 'Unable To Add Product To Cart listed By You'){
                                echo "<script>
                                document.querySelector('#msg').innerHTML = 'No Products In The Cart';
                                document.querySelector('.left').style.display = 'none';
                                 </script>";
                            }else{
                                echo "<script>
                                document.querySelector('.left').style.display = 'none';
                                 </script>";
                            }
                           
                        }
                    }else{
                        echo "mysql error : " .$mysqli_error($conn);
                    }

                }
                mysqli_close($conn);
            ?>  
            
      

   

    <footer>
        <h1 style="text-align: center; text-transform: capitalize;color: #26133F;margin-left: 0%;">bechde</h1>
        <p style="text-align: center; text-transform: capitalize;color: #000000;">Copyright © 2021 bechde. All rights reserved</p>
    </footer>
</body>

<script type="text/javascript">
    document.querySelector('html').addEventListener('mouseover',()=>{
            var hold = document.querySelector("#msg").innerHTML;
                if(hold != ''){
                    if(!hold.includes('No')){
                        setTimeout(() => {
                            document.querySelector("#msg").innerHTML = '';
                            document.querySelector("#msg").style.transition = "0.3s";
                        },4000);
                }
                
        }
    });

        
</script>
</html>