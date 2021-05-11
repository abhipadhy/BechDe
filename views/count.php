<?php
    session_start();
				include('connection.php');
					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}else{
						$sql1 = "select * from stats where visitor_id = $_SESSION[uid] AND prod_id = $_GET[prod_id];";
						$res = mysqli_query($conn,$sql1);
						if($res){
							if(mysqli_num_rows($res)==0){ 
								$sql2= "select user_id from product where prod_id=$_GET[prod_id];";
								$val = mysqli_fetch_assoc(mysqli_query($conn,$sql2));
	
								$sql= "insert into stats values ($_GET[prod_id],$val[user_id],$_SESSION[uid],1);";
								
							}else{
								$sql="update stats SET count = count + 1 where visitor_id = $_SESSION[uid] AND prod_id=$_GET[prod_id]; ";
							}

							if(!mysqli_query($conn,$sql)){
								echo mysqli_error($conn);
							}else{
                                header("Location:product.php?prod_id=$_GET[prod_id]");
                                die;
                            }
							
							
						}else{
							echo mysqli_error($conn);
						}
												
					}
				mysqli_close($conn);
		?>