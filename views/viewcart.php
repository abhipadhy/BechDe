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
        <h1>BechDe</h1>
      <ul>
        <li><a href="#">Buy</a></li>
        <li><a href="sell.html">Sell</a></li>
        <li><a href="sell.html">Rent</a></li>
        <li><a href="profile.html">Profile</a></li>
      </ul>
    </nav>

    <div class="left">
        <div class="tab"> 
            <ul id="heading">
                <li>products</li>
                <li>description</li>
                <li>quantity</li>
                <li>price</li>
            </ul>
            <br>
            <hr style="width: 95%;margin-left: 0%;">

            <div class="card">  
                <img src="../Assets/beard.jpg" alt="">
                <ul id="heading2">
                    <li style="width: 30%;"><a href="product.html"  id="page"><p >beardo Beard grooming kit</p></a></li>
                    <li style="width: 13%;"><p >4</p></li>
                    <li style="width: 15%;margin-right: 7%; padding-right: 0%;"><p >Rs.600</p></li>
                    <li style="margin-right: 0%;padding-top: 2.5%;"><button id="del"><i class="fas fa-trash"></i></button></li>
                </ul>
                </ul>
                </ul>
            </div>

            <div class="card">  
                <img src="../Assets/cycle.jpg" alt="">
                <ul id="heading2">
                    <li style="width: 30%;"><a href="product.html" id="page"><p >hero cycle</p></a></li>
                    <li style="width: 13%;"><p >1</p></li>
                    <li style="width: 15%;margin-right: 7%; padding-right: 0%;"><p >Rs.7800</p></li>
                    <li style="margin-right: 0%;padding-top: 2.5%;"><button id="del"><i class="fas fa-trash"></i></button></li>
                </ul>
                </ul>
                </ul>
            </div>

            
            
        </div>
    </div>

    <div class="right">
        <div class="righttab">
            <ul id="heading" style="padding-top: 12%; padding-left: 12%;">
                <li>order summary</li>
            </ul>
            <br><br>
            
            <div class="card2">  
                <ul id="heading3">
                    <li style="width: 40%;"><p >2 Products</p></li>
                    <li style="width: 30%;margin-left: 25%;"><p >Rs.10200</p></li>
                    <li style="width: 40%;"><p >Extras</p></li>
                    <li style="width: 30%;margin-left: 25%;"><p >Rs.100</p></li>
                </ul>
                </ul>
                </ul>
            </div>

            <ul id="total">
                <li>total</li>
                <li style="margin-left: 45%;">Rs.10300</li>
            </ul>
            
            <a href="buy.html"><button id="cout">checkout</button></a>

            <br><br><br>
        </div>
        
    </div>

    <footer>
        <h1 style="text-align: center; text-transform: capitalize;color: #26133F;margin-left: 0%;">bechde</h1>
        <p style="text-align: center; text-transform: capitalize;color: #000000;">Copyright © 2021 bechde. All rights reserved</p>
    </footer>
</body>
</html>