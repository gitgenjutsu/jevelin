<!-- ********************************************Footer start******************************************************** -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="f-box mt-5">
                <div class="method col-lg-12 col-md-12 col-12">
                    <h4>Payment Method</h4>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore.</p>
                    <i class="fa-2x fab fa-cc-visa"></i>
                    <i class="fa-2x fab fa-cc-mastercard"></i>
                    <i class="fa-2x fab fa-amazon-pay"></i>
                    <i class="fa-2x fab fa-cc-paypal"></i>
                </div>
                <div class="trends col-lg-12 col-md-12 col-12">
                    <h4>Latest Trends</h4>
                    <div class="d-flex justify-content-between mt-3">
                        <img src="img/side1.jpg" alt="" class="img-fluid">
                        <div>
                            <h5>Green as Grass</h5>
                            <h5><del><span style="color: #ccc;">£34.00</span></del><span class="font-weight-bold "> £19.99</span></h5>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <img src="img/model-1.jpg" alt="" class="img-fluid">
                        <div class="ml-3">
                            <h5>Denim Dress</h5>
                            <h5><del><span style="color: #ccc;">£34.00</span></del><span class="font-weight-bold mx-2"> £19.99</span></h5>
                        </div>
                    </div>
                </div>
                <div class="links col-lg-12 col-md-12 col-12">
                    <h4>Quick Links</h4>
                    <h3>FAQ</h3>
                    <h3>Shipment</h3>
                    <h3>Returns</h3>
                    <h3>Policies</h3>
                    <h3>Gift Cards</h3>
                    <h3>Clothing care</h3>
                    <h3>Purchase Conditions</h3>
                </div>
                <div class="company col-lg-12 col-md-12 col-12">
                    <h4>Company</h4>
                    <h3>About us</h3>
                    <h3>Press</h3>
                    <h3>Our Team</h3>
                    <h3>Offices</h3>
                    <h3>Affiliates</h3>
                    <h3>Giveway</h3>
                    <h3>Contact</h3>
                </div>
            </div>
        </div>
        <div class="mt-5 text-center">
            <hr>
            <p>Copyright &copy;2020 | All rights reserved.</p>
        </div>
    </div>
    <div class="scrolltop float-right">
        <a href="javascript:void(0);"><i class="fas fa-arrow-circle-up" id="myBtn"></i></a>
    </div>
</footer>
<!-- ********************************************Footer end******************************************************** -->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="./js/main.js"></script>
<script>
    $('.scrolltop').on('click', function() {
        $("html, body").animate({
            scrollTop: 0
        }, "slow");
        return false;
    })

    // Set the date we're counting down to
    var countDownDate = new Date("Aug 03, 2021 02:30:00").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var weeks = Math.floor(distance / (1000 * 60 * 60 * 24 * 7));
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        // Display the result in the element with id="demo"
        document.getElementById("demoTime").innerHTML = `<span class="mr-4">${weeks}</span><span class="mr-4">${days}</span><span class="mr-4">${hours}</span><span class="mr-4">${minutes}</span><span class="mr-4">${seconds}</span>`;
        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demoTime").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>

</body>

</html>