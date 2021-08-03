<!-- ********************************************Footer start******************************************************** -->
<footer class=" footer cartfooter">
    <hr>
    <div class="container ">
        <!-- <div class="row"> -->
        <div class="mt-5 text-center ">
            <p>Copyright &copy;2020 | All rights reserved.</p>
        </div>
        <!-- </div> -->
    </div>
</footer>
<!-- ********************************************Footer end******************************************************** -->


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

    //credit card form
    $("#creditCardForm").validate({
        ignore: ':hidden:not(:checkbox)',
        errorElement: 'label',
        errorClass: 'is-invalid',
        validClass: 'is-valid',
        rules: {
            creditCardHolderName: {
                required: true,
                minlength: 5
            },
            creditCardNum: {
                required: true,
                minlength: 12,
                maxlength: 12,
                digits: true
            },
            creditCardBank: {
                required: true,
            },
            creditCardValidDate: {
                required: true
            },
            creditCardCVV: {
                required: true,
                minlength: 3
            }
        }
    });

    //debit card form
    $("#debitCardForm").validate({
        ignore: ':hidden:not(:checkbox)',
        errorElement: 'label',
        errorClass: 'is-invalid',
        validClass: 'is-valid',
        rules: {
            debitCardHolderName: {
                required: true,
                minlength: 5
            },
            debitCardNum: {
                required: true,
                minlength: 12,
                maxlength: 12,
                digits: true
            },
            debitcreditCardBank: {
                required: true,
            },
            debitcreditCardValidDate: {
                required: true
            },
            debitcreditCardCVV: {
                required: true,
                minlength: 3
            }
        }
    });

    // credit card holder name
    $('#creditCardHolderName').on('keyup', function() {
        let cardName = this.value;
        $('.creditCardOwner').html(cardName);
    });

    //on change credit card bank name
    $('#creditCardBank').on('change', function() {
        let cardName = this.value;
        $('.bankName').html(cardName);
    });

    //on keyup creditCardNum 
    $('#creditCardNum').on('keyup', function() {
        let cardName = this.value;
        $('.cardNum').html(cardName);
    });

    //on keyup  creditCardCVV
    $('#creditCardCVV').on('keyup', function() {
        $('.cardCVV').html('***');
    });

    //on keyup credit cardDate
    $('#creditCardValidDate').on('change', function() {
        let cardName = this.value;
        $('.cardDate').html(cardName);
    });


    // Debit card holder name
    $('#debitCardHolderName').on('keyup', function() {
        let cardName = this.value;
        $('.debitCardOwner').html(cardName);
    });

    //on change credit card bank name
    $('#debitCardBank').on('change', function() {
        let cardName = this.value;
        $('.debitbankName').html(cardName);
    });

    //on keyup debitCardNum 
    $('#debitCardNum').on('keyup', function() {
        let cardName = this.value;
        $('.debitcardNum').html(cardName);
    });

    //on keyup  debitCardCVV
    $('#debitCardCVV').on('keyup', function() {
        $('.debitcardCVV').html('***');
    });

    //on keyup debit cardDate
    $('#debitCardValidDate').on('change', function() {
        let cardName = this.value;
        $('.debitcardDate').html(cardName);
    });
</script>

<script>
    $('.checkoutForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'userCheckoutData.php',
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('.checkoutForm')[0].reset();
                hideUserDataForm();
            }
        });
    });

    function hideUserDataForm() {
        document.querySelector('.checkoutForm').style.display = "none";
        document.querySelector('.paymentDiv').style.display = "block";
    }
</script>
</body>

</html>