<!-- Core Vendors JS -->
<script src="assets/js/vendors.min.js"></script>

<!-- page js -->

<!-- Core JS -->
<script src="assets/js/app.min.js"></script>




<!--===============================================================================================-->
<script src="users/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="users/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="users/vendor/bootstrap/js/popper.js"></script>
<script src="users/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="users/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="users/vendor/daterangepicker/moment.min.js"></script>
<script src="users/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="users/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->

<!-- Form Validation js -->
<script src="assets/vendors/jquery-validation/jquery.validate.min.js"></script>
<!-- Select & Search js -->
<script src="assets/vendors/select2/select2.min.js"></script>
<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script src="users/js/main.js"></script>


<!-- Form Validation js -->
<script src="assets/vendors/jquery-validation/jquery.validate.min.js"></script>
<script>
    $("#form-validation").validate({
        ignore: ':hidden:not(:checkbox)',
        errorElement: 'label',
        errorClass: 'is-invalid',
        validClass: 'is-valid',
        rules: {
            username: {
                required: true,
                minlength: 5
            },
            inputEmail: {
                required: true,
                email: true
            },
            inputPassword: {
                required: true,
                minlength: 8,
            },
            inputPasswordConfirm: {
                required: true,
                equalTo: '#password',
                minlength: 8
            },
            inputValidCheckbox: {
                required: true
            }
        }
    });


    //check if username avaailable
    $('#newUser').on('blur', function() {
        let user = this.value;
        $.ajax({
            url: "checkUsername.php",
            type: "POST",
            data: {
                user: user
            },
            success: function(data) {
                showToast('Username !', data);
            }
        })
    });



    function showToast(type, msg) {
        var toastHTML = `<div class="toast fade hide" data-delay="3000">
        <div class="toast-header">
            <i class="anticon anticon-info-circle text-primary m-r-5"></i>
            <strong class="mr-auto">${type}</strong>
            <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            ${msg}
        </div>
    </div>`

        $('#notification-toast').append(toastHTML)
        // $('#notification-toast .toast').toast('show');
        $('#notification-toast .toast').toggle();
        setTimeout(function() {
            $('#notification-toast .toast:first-child').remove();
        }, 3000);
    }
</script>





</body>


<!-- Mirrored from www.themenate.net/enlink-bs/dist/sign-up-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Aug 2020 12:09:52 GMT -->

</html>