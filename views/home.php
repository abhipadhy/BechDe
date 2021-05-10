
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../css/home.css">
    <title>BechDe</title>
</head>
<body>
   
    <div class="nav">
    <?php
    session_start();
    if(!isset($_SESSION['uid'])){
        echo "<div class='navleft'>
        <a href='reguni.php'><button>register university</button></a>
        <a href='login.php'><button>login</button></a>
        <a href='sign.php'><button>sign-up</button></a>
       
    </div>";
    }
    
   else{
    echo "<div class='navleft'>
    <a href='reguni.php'><button>register university</button></a>
    <a id='logout' href=login.php?message=logout&Message=Logged%20Out.><button>logout</button></a>
 </div>
 <div class='navright'>
 <a href='list.php'><button>Buy</button></a>
 <a href='sell.php'><button>Sell</button></a>
 <a href='sell.php'><button>Rent</button></a>
 <a href='profile.php'><button>Profile</button></a>
     
 </div>";
   }
   
    ?>
       
   
    </div>
   <a href="" style="text-decoration: none;"> <h1 id="title">bechde</h1></a>
    <div class="top">
        <div class="left"></div>
        <div class="middle">
            <form action="list.php" method="POST" class="search">
                <input  placeholder="Search For Products ..." name="sitem"></input>
                <button id="enter" style="font-family: 'Poppins', sans-serif;">search</button>
            </form>
        </div>
        <div class="right"></div>
    </div>
   
    <div class="top2">
        <h1 class="about">
            about us
        </h1>
        <div class="top21">
            <div class="top2img"></div>
           <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quaerat quasi ex, dignissimos distinctio quo, consequuntur beatae numquam nulla nostrum quae veniam cumque cum dolorem dolores eius quidem quam veritatis maiores? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis cupiditate quibusdam quaerat unde, consequatur error architecto corrupti quos beatae enim? Harum expedita labore nisi aspernatur culpa quibusdam doloremque dolorum earum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos corrupti harum fugiat dolores, laboriosam numquam blanditiis delectus labore consectetur totam aspernatur maiores eligendi nemo a sapiente inventore nobis saepe veritatis?</p>
        </div>
    </div>

    <div class="top3">
        <h1 class="service">Services we offer</h1>
        <div class="top31">
            <p>. Quaerat quasi ex, dignissimos distinctio quo, consequuntur beatae numquam nulla nostrum quae veniam cumque cum dolorem dolores eius quidem quam veritatis maiores? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis cupiditate quibusdam quaerat unde, consequatur error architecto corrupti quos beatae enim? Harum expedita labore nisi aspernatur culpa quibusdam doloremque dolorum earum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos corrupti harum fugiat dolores, laboriosam numquam blanditiis delectus labore consectetur totam aspernatur maiores eligendi nemo a sapiente inventore nobis saepe veritatis?</p>
            <div class="main">
                <button style="font-family: 'Poppins', sans-serif;">buy</button>
                <button id="rent" style="font-family: 'Poppins', sans-serif;">rent</button>
                <button style="font-family: 'Poppins', sans-serif;">sell</button>
            </div>
            <div class="top31img"></div>
        </div>
    </div>

    <div class="top4">
        <h1 class="team">meet our team</h1>
        <div id="teambox">
            <div class="profile1">
                <div class="circle" id="abhi"></div>
                <h3>abhishek padhy</h3>
                <h5>front-end lead</h5>
             <div class="social">
                <a href="https://www.linkedin.com/in/abhishek-padhy-4b2351188/"> <img src="https://img.icons8.com/metro/26/000000/linkedin.png"/></a>
                <a href="https://github.com/abhipadhy"><img src="https://img.icons8.com/material-rounded/26/000000/github.png"/></a>
             </div>
            </div>
            <div class="profile1">
                <div class="circle" id="divesh"></div>
                <h3>&nbsp;&nbsp; Divesh Arora</h3>
                <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;back-end lead</h5>
                <div class="social">
                    <a href="https://www.linkedin.com/in/divesh-arora123/"><img src="https://img.icons8.com/metro/26/000000/linkedin.png"/></a>
                    <a href="https://github.com/divesharora"><img src="https://img.icons8.com/material-rounded/26/000000/github.png"/></a>
                </div>
            </div>
            <div class="profile1">  
                <div class="circle" id="hemang"></div>
                <h3>hemang pandey</h3>
                <h5>database lead</h5>
               <div class="social">
                <a href="https://www.linkedin.com/in/hemang-pandey-091844196/"> <img src="https://img.icons8.com/metro/26/000000/linkedin.png"/></a>
                <a href="https://github.com/Hemangpandey"><img src="https://img.icons8.com/material-rounded/26/000000/github.png"/></a>
               </div>
            </div>
        </div>
    </div>

    <footer>
        <h1 style="text-align: center; text-transform: capitalize;color: #26133F;">bechde</h1>
        <p style="text-align: center; text-transform: capitalize;color: #000000;">Copyright © 2021 bechde. All rights reserved</p>
    </footer>
</body>
</html>
<!-- <script>
document.querySelector('body').addEventListener('load',()=>{
    if(<?php echo isset($_GET['message']) ?>){
window.location.reload();}
})



</script> -->