<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/sell.css" />
    <title>BechDe</title>
    <style>
      .splide--nav>.splide__track>.splide__list>.splide__slide.is-active {
          border: 3px solid #17071b;
      }
    </style>
  </head>
  <body></body>
  
      <div class="left">
        <nav class="navbar">
          <h1>BechDe</h1>
        </nav>
        <div id="primary-slider" class="splide">
          <div class="splide__track">
            <ul class="splide__list" id="psl">
              <li class="splide__slide"><img src="../Assets/up.png" id='ps0' ></li>
              <li class="splide__slide"><img src="../Assets/up.png" id="ps1"></li>
              <li class="splide__slide"><img src="../Assets/up.png" id="ps2"></li>
            </ul>
          </div>
        </div>
        <div id="secondary-slider" class="splide" style="width: 87%;margin-left: 6%;margin-right: 6%;">
          <div class="splide__track" style="width: 100%;">
            <ul class="splide__list" id="ssl">
              <li class="splide__slide" id="sec" style="  border: 10x solid #F5E8E8;">
                <img src="../Assets/up.png" id='ss0'>
              </li>
              <li class="splide__slide"  id="sec" style="  border: 10x solid #F5E8E8;">
                <img src="../Assets/up.png" id="ss1">
              </li>
              <li class="splide__slide"  id="sec" style="  border: 10x solid #F5E8E8;">
                <img src="../Assets/up.png" id="ss2">
              </li>
            </ul>
          </div>
        </div>
        
        <input type="file" onchange="readURL(this);" id="upload" accept="image/*" multiple hidden/>
        <label for="upload" ><p id="upload-btn">Choose Image</p></label>
        <br><br><br><br>
      </div>
      <div class="right">
        <nav class="navbar">
          <ul style="margin-top: 5%;">
            <li><a href="list.php">Buy</a></li>
            <li><a href="sell.php">Sell</a></li>
            <li><a href="Viewcart.php">View Cart</a></li>
            <li><a href="profile.php">Profile</a></li>
          </ul>
        </nav>
        <div class="form">
          <form method="POST" action="selldb.php">
            <p>Product Name :</p>
            <input type="text" id="input1" required placeholder="Enter Product Name" name="pname"/>
            <p>Rent Price :</p>
            <input type="text" id="input2" required placeholder="Enter Rent Price" name="rent"/>
            <p>Sell Price :</p>
            <input type="text" id="input3" required placeholder="Enter Sell Price" name="sell"/>
            <p>Description :</p>
            <textarea id="input4" rows="10" name="descp"></textarea>
            <p>Tags :</p>
            <select  id="tags" name="tag">
              <option value="">a1 quality</option>
              <option value="">Sasta</option>
              <option value="">Cash back</option>
              <option value="">Discount</option>
            </select>
            <input type="text" id="input6" value="" hidden name="img1"/>
            <input type="text" id="input7" value="" hidden name="img2"/>
            <input type="text" id="input8" value="" hidden name="img3"/>
            <button type="submit" id="signup">List Product</button>
            <br><br><br><br>
          </form>
        </div>
      </div>
    </div>

    
  </body>
</html>
<script>
  function readURL(input){
    console.log(input.files.length);
   if (input.files && input.files[0]) {
       for(let i=0;i<input.files.length;i++)
        {
          
      var reader = new FileReader();

      reader.onload = function (e) {

        document.getElementById(`primary-slider-slide0${i+1}`).style.background=`url(${e.target.result})`;
        document.getElementById(`secondary-slider-slide0${i+1}`).style.background=`url(${e.target.result})`;
        document.getElementById(`primary-slider-slide0${i+1}`).style.backgroundSize=`cover`;
        document.getElementById(`secondary-slider-slide0${i+1}`).style.backgroundSize=`cover`;
        document.getElementById(`primary-slider-slide0${i+1}`).style.backgroundPosition=`50% 50%`;
        document.getElementById(`secondary-slider-slide0${i+1}`).style.backgroundPosition=`50% 50%`;

        if(i<3){
            $(`#input${i+6}`).attr("value", e.target.result);
        }
      };

      reader.readAsDataURL(input.files[i]);
    }}
  }

</script>
<script>

var secondarySlider = new Splide( '#secondary-slider' );
var primarySlider = new Splide( '#primary-slider' );
// primaryslider.sync( secondarySlider ).mount();
document.addEventListener( 'DOMContentLoaded', function () {
	var secondarySlider = new Splide( '#secondary-slider', {
		fixedWidth  : 150,
		speed : 300,
		height      : 90,
		gap         : 40,
		cover       : true,
		isNavigation: true,
		focus       : 'center',
   
		breakpoints : {
			'100': {
				fixedWidth: 66,
				height    : 40,
			}
		},
	} ).mount();
	
	var primarySlider = new Splide( '#primary-slider', {
		type       : 'fade',
		heightRatio: 0.65,
    height      : 340,
    fixedWidth  : 540,
		speed : 300,
		pagination : false,
		arrows     : false,
		cover      : true,
    keyboard:'focused',
  
 
	} );
	
	primarySlider.sync( secondarySlider ).mount();
} );
  </script>