<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/list.css">
    <title>BechDe</title>
  </head>
  <body>
    <nav class="navbar">
        <h1>BechDe</h1>
      <ul>
      
        <li><a href="home.html">View Cart</a></li>
        <li><a href="profile.php">Profile</a></li>
      </ul>
    </nav>

    <form action="" class="search">
        <input  placeholder="Search For Products ..." name="sitem" ></input>
        <button id="enter" style="font-family: 'Poppins', sans-serif;">search</button>
    </form>
    
<div class="uperContainer">
<div class="dropdown" onmouseover="shift()" onmouseleave="unshift()">
  <button class="dropbtn" style="outline: none;" ><svg width="45" height="43" viewBox="0 0 45 43" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<rect width="45" height="43" fill="url(#pattern0)"/>
<defs>
<pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
<use xlink:href="#image0" transform="translate(0.0222222) scale(0.0318519 0.0333333)"/>
</pattern>
<image id="image0" width="23" height="23" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAAAX0lEQVRIie3RMQrAMAxDUZH738oHS8cEDwIju1CqD56FeYD7WwFgD13cQ2v8ldN+cesDdRoHSJPGNqUpxtQ012ls01IV45JpTjG2qRQzlkxzFWObtnYbt5rmmLFNndQDOt9W49Kjf+gAAAAASUVORK5CYII="/>
</defs>
</svg>
</button>
  <div class="dropdown-content">
 <?php echo "<a href='list.php?filter=recent' id='link1'>Most Recent</a>";
  echo "<a href='list.php?filter=sp' id='link2'>Sell Price Hight to Low</a>";
  echo "<a href='list.php?filter=rp' id='link3'>Rent Price High to Low</a>";
  ?>
  </div>
</div>
     <span style="text-align: center; width: 80%;text-transform:capitalize;">
     <?php 
        if(isset($_REQUEST['sitem'])){
          $item = $_REQUEST['sitem'];
          $conn = mysqli_connect("localhost", "bechde", "bechde", "bechde");
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }

          $sql =" SELECT * from product where pname like '%$item%';";
          $res = mysqli_query($conn,$sql);
          $count = mysqli_num_rows($res);
          echo "items found : ".  $count;
          mysqli_close($conn);
        }else{
          $conn = mysqli_connect("localhost", "bechde", "bechde", "bechde");
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }

          $sql =" SELECT * from product ;";
          $res = mysqli_query($conn,$sql);
          $count = mysqli_num_rows($res);
          echo "total listed items found : " . $count ;
          mysqli_close($conn);
        }
     ?>
    
    </span>
</div>
   
         
     <div class="container">
      <?php

          
          $conn = mysqli_connect("localhost", "bechde", "bechde", "bechde");
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }
          if(isset($_GET['filter'])){
          
            if($_GET['filter']=='recent'){
              $sql =" SELECT * from product,user_data where product.user_id = user_data.user_id ORDER by prod_id desc;";
              echo "<script>
              document.querySelector('#link1').style.background = '#b2bec3';
              </script>";
            }
            else if($_GET['filter']=='sp'){
         
              $sql =" SELECT * from product,user_data where product.user_id = user_data.user_id ORDER by sell desc;";
              echo "<script>
              document.querySelector('#link2').style.background = '#b2bec3';
              </script>";
            }
           else{
              $sql =" SELECT * from product,user_data where product.user_id = user_data.user_id ORDER by rent desc;";
              echo "<script>
              document.querySelector('#link3').style.background = '#b2bec3';
              </script>";
            }

          }
          else if(isset($_REQUEST['sitem'])){
            $item = $_REQUEST['sitem'];
            $sql =" SELECT * from product,user_data where product.user_id = user_data.user_id AND pname like '%$item%';";
          }
          else{
            $sql =" SELECT * from product,user_data where product.user_id = user_data.user_id ;";
          }
        
          $res = mysqli_query($conn,$sql);
          if(mysqli_num_rows($res)!=0){
  
              while($row = mysqli_fetch_assoc($res)){
                
                    echo "  <a href='product.php?prod_id=$row[prod_id]'>
                          <div class='card'>
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
                    </a> ";
  
              } //while ends here
          }
          mysqli_close($conn);
        

       
      ?>
            
     </div>

    
  </body>
  <script>
    
   function shift(){
        document.querySelector('.container').style.marginTop="8%";
        document.querySelector('.container').style.transition="0.4s";
   }

   function unshift(){
        document.querySelector('.container').style.marginTop="1%";
        document.querySelector('.container').style.transition="0.4s";
   }
    
  </script>
</html>
