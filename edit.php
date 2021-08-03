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
   
   
<?php
		
		
		if(isset($_POST['updateData'])){
			$id = $_POST["id"]; 
			$cloth_name=$_POST['cloth_name'];
			$size=$_POST['size'];
			$category=$_POST['category'];
			$price=$_POST['price'];
			$delivery_date=$_POST['delivery_date'];
			
			$updatesql = "UPDATE cart SET `cloth_name` = '$cloth_name', `size` = '$size', `category` = '$category', `price` = '$price',`delivery_date` = '$delivery_date' WHERE cart.id = $id";
		
			$run = $conn->query($updatesql);
			if($run){
	?>
			<script>
				alert("Data Updated Successfully");
			</script>
	<?php
			header("Location:cart.php");
			}else{				
	?>	
		<script>
			alert("Failed");
		</script>
	<?php
		}
		}
		
		$id = $_GET['id']; 
		
		$sql = "SELECT * from cart WHERE id = $id";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) { 
			while ($row = $result->fetch_assoc()) {
				$cloth_name=$row['cloth_name'];
				$size=$row['size'];
				$category=$row['category'];
				$price=$row['price'];
				$delivery_date=$row['delivery_date'];
			}
		}
		
		
		
		
		
   ?>
   
   <!-- ********************************************cart item start******************************************************** -->
   <section class="cart-body">
      <div class="container">
         <form class="form_container" method="post" id="productForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h3>Update Product details</h3>
            <div class="form-row">
               <div class="form-group col-md-6">
                  <label for="cloth_name">Cloth Name</label>
                  <input type="text" class="form-control" id="cloth_name" name="cloth_name" value="<?php echo $cloth_name;?>" placeholder="Cloth Name">
               </div>
               <div class="form-group col-md-6">
                  <label for="size">Size</label>
                  <input type="text" class="form-control" id="size" name="size" placeholder="Size" value="<?php echo $size;?>">
               </div>
            </div>
            <div class="form-row">
               <div class="form-group col-md-6">
                  <label for="category">Category</label>
                  <input type="text" class="form-control" id="category" name="category" placeholder="Category" value="<?php echo $category;?>">
               </div>
               <div class="form-group col-md-6">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="<?php echo $price;?>">
               </div>
               <div class="form-group col-md-4">
                  <label for="inputZip">Delivery Date</label>
                  <input type="date" class="form-control" name="delivery_date" id="delivery_date" value="<?php echo $delivery_date;?>">				  
               </div>
			   <input type="hidden" name="id" value="<?php echo $id; ?>">
            </div>
            <button type="submit" name="updateData" class="btn btn-primary">Update Data</button>
         </form>
      </div>
   </section>
   <!-- ********************************************cart item end******************************************************** -->
   <?php include("includes/cart_footer.php"); ?>