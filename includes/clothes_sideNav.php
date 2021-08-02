 <div class="sidebar-left col-8">
     <!-- <div class="slidecontainer">
         <h2 class="font-weight-normal" style="font-size: 20px;">Price </h2>
         <div class="d-flex justify-content-between">
             <div>
                 <span>Min : </span>
             </div>
             <div>
                 <span class="font-weight-bold">Max : </span>
                 <span class="font-weight-bold" id="demo"></span>
             </div>
         </div>
         <input type="range" value="54" class="range-slider" id="myRange">
     </div> -->

     <nav id="navbar-example3" class="navbar navbar-light side-nav mt-5">
         <a class="navbar-brand font-weight-bold">Categories</a>
         <nav class="nav nav-pills flex-column">
             <a class="nav-link <?php if ($page == 'men') {
                                    echo 'active';
                                } ?>" href="men.php">MEN</a>
             <nav class="nav nav-pills flex-column">
                 <a class="nav-link ml-3 my-1 <?php if ($page == 'men_jacket') {
                                                    echo 'active';
                                                } ?>" href="men_jacket.php">JACKET</a>
                 <a class="nav-link ml-3 my-1 <?php if ($page == 'men_pants') {
                                                    echo 'active';
                                                } ?>" href="men_pants.php">PANTS</a>
                 <a class="nav-link ml-3 my-1 <?php if ($page == 'men_sweater') {
                                                    echo 'active';
                                                } ?>" href="men_sweater.php">SWEATER</a>
             </nav>
             <a class="nav-link <?php if ($page == 'shoes') {
                                    echo 'active';
                                } ?>" href="shoes.php"><strong>SHOES</strong></a>
             <a class="nav-link <?php if ($page == 'women') {
                                    echo 'active';
                                } ?>" href="women.php">WOMEN</a>
             <nav class="nav nav-pills flex-column">
                 <a class="nav-link ml-3 my-1 <?php if ($page == 'women_jacket') {
                                                    echo 'active';
                                                } ?>" href="women_jacket.php">JACKET</a>
                 <a class="nav-link ml-3 my-1 <?php if ($page == 'women_frocks') {
                                                    echo 'active';
                                                } ?>" href="women_frocks.php">FROCKS</a>
                 <a class="nav-link ml-3 my-1 <?php if ($page == 'women_sweater') {
                                                    echo 'active';
                                                } ?>" href="women_sweater.php">SWEATER</a>
             </nav>
         </nav>
     </nav>

 </div>

 <script>
     var slider = document.getElementById("myRange");
     var output = document.getElementById("demo");
     output.innerHTML = slider.value; // Display the default slider value

     // Update the current slider value (each time you drag the slider handle)
     slider.oninput = function() {
         output.innerHTML = this.value;
     }
 </script>