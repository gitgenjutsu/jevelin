<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js "></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js "></script>


<!-- Form Validation js -->
<script src="assets/vendors/jquery-validation/jquery.validate.min.js"></script>
<!-- Select & Search js -->
<script src="assets/vendors/select2/select2.min.js"></script>
<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="./js/main.js"></script>

<script>
    // text editor
    var quill = new Quill('#editor', {
        theme: 'snow'
    });

    // select
    $('.select2').select2();

    // form validation
    $("#form-validation").validate({
        ignore: ':hidden:not(:checkbox)',
        errorElement: 'label',
        errorClass: 'is-invalid',
        validClass: 'is-valid',
        rules: {
            inputName: {
                required: true,
                minlength: 5
            },
            inputPinCode: {
                required: true,
                minlength: 6,
                maxlength: 6,
                digits: true
            },
            inputDigit: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            inputLocality: {
                required: true
            },
            inputAddress: {
                required: true,
                minlength: 10
            },
            radioDemo: {
                required: true
            },
            creditCardHolderName: {
                required: true
            }
        }
    });
</script>

</body>

</html>