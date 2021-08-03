<?php
   include_once("includes/config.php");
   include_once("includes/cart_header.php");
   ?>
<body>
   <header class="header cart-header  col-12">
      <div class="container text-uppercase col-12">
         <div class="logo d-flex justify-content-center">
            <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="" class="img-fluid"></a>
         </div>
         <nav class="navbar navbar-expand-md navbar-light col-12">
            <div class="d-flex justify-content-between search-box col-lg-12 offset-lg-0 col-8 offset-0">
               <div>
                  <div class="input-cart col-lg-10 offset-lg-4 col-8 offset-0">
                     <input type="text" title="Search for products, brands and more" autocomplete="off" placeholder="Search for products, brands and more">
                     <button class="srch-btn" type="submit" data-toggle="modal" data-target="#myModal">
                     <i class="fas fa-search nav-link"></i>
                     </button>
                  </div>
               </div>
               <div class="cart-profile">
                  <ul class="navbar-nav">
                     <li class="nav-item dropdown px-3">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Mohd
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item fas fa-user" href="#"> <span class="ml-1">My Profile</span></a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item fas fa-truck" href="#"><span class="ml-1">My Orders</span></a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item fas fa-power-off" href="index1.html"> <span class="ml-1">Logout</span></a>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
            <!-- <button class="cart-btn" type="submit"><a href="cart.html"><i class="fas fa-shopping-cart nav-link"></i></a></button>
               <sup>0</sup> -->
         </nav>
      </div>
   </header>
   <!-- ********************************************header end******************************************************** -->
   
   
  
   <!-- ********************************************cart item start******************************************************** -->
   <section class="cart-body">
      <div class="container">
         <form class="form_container" method="post" id="productForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <h3>Add Product details</h3>
            <div class="form-row">
               <div class="form-group col-md-6">
                  <label for="cloth_name">Cloth Name</label>
                  <input type="text" class="form-control" id="cloth_name" name="cloth_name" placeholder="Cloth Name">
               </div>
               <div class="form-group col-md-6">
                  <label for="size">Size</label>
                  <input type="text" class="form-control" id="size" name="size" placeholder="Size">
               </div>
            </div>
            <div class="form-row">
               <div class="form-group col-md-6">
                  <label for="category">Category</label>
                  <input type="text" class="form-control" id="category" name="category" placeholder="Category">
               </div>
               <div class="form-group col-md-6">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" id="price" name="price" placeholder="Price">
               </div>
               <div class="form-group col-md-6">
                  <label for="date">Delivery Date</label>
                  <input type="date" class="form-control" name="date" id="date">
               </div>
			   <div class="form-group col-md-6">
                  <label for="imgUpload">Upload Image</label>
                  <input type="file" class="form-control" name="imgUpload" id="imgUpload">
               </div>
            </div>
            <button type="submit" name="addData" class="btn btn-primary">Add Data</button>
         </form>
      </div>
   </section>
   
    <?php
		
		if(isset($_POST['addData'])){			
			//form data
			$cloth_name=$_POST['cloth_name'];
			$size=$_POST['size'];
			$category=$_POST['category'];
			$price=$_POST['price'];
			$date=$_POST['date'];
			$file = $_FILES['imgUpload'];
			
			//file info
			$fileName = $file['name'];
			$tmpName = $file['tmp_name'];
			$fileType = $file['type'];
			$fileError = $file['error'];
			$fileSize = $file['size'];
			$error=0; $errMsg="";
			//print_r($file);
			//echo $fileType;
			
			if($fileError==0){
				if($fileType!="image/jpg" && $fileType!="image/png" && $fileType!="image/jpeg" && $fileType!="image/gif"){
					$errMsg = "File Type Not Valid";
					$error++;
				}else {
					if($fileSize > 1000000){
						$errMsg = "File Size too large";
						$error++;
					}else{
						//Data Insertion
						$sql = "INSERT INTO cart (img,cloth_name,size,category,price,delivery_date) VALUES ('$fileName','$cloth_name','$size','$category','$price','$date')";
						
						$run = $conn->query($sql);
						if($run){
							$target = "assets/img/".$fileName;
							move_uploaded_file($tmpName,$target);
						?>
						
						<script>
							alert('Data added successfully');
						</script>
					
					<?php
					}else{
				?>			
							<script>
								alert('Failed');
							</script>
						<?php
					}
						
					}
				}
			}else{
				$errMsg = "File Not Exists";
				$error++;
			}
			
			
			//error checking
			if($error!=0){
			?>
				<script>
				alert($errMsg);
				</script>
		<?php		
			}	
			
		}	
   ?>
   
   
   
   <!-- ********************************************cart item end******************************************************** -->
   <?php include("includes/cart_footer.php"); ?>