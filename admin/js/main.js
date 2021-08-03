
(function ($) {
    "use strict";


    /*==================================================================
    [ Focus Contact2 ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })
  
  
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    

 function showToast() {
        
    var toastHTML = `<div class="toast fade hide" data-delay="3000">
        <div class="toast-header">
            <i class="anticon anticon-info-circle text-danger m-r-5"></i>
            <strong class="mr-auto">Login Failed!</strong>
            <small></small>
            <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            Invalid Details
        </div>
    </div>`
    $('#notification-toast').html(toastHTML);
    $('#notification-toast .toast').removeClass('hide');
    $('#notification-toast .toast').addClass('show');
    setTimeout(function(){ 
        $('#notification-toast .toast:first-child').remove();
        $('#notification-toast .toast:first-child').addClass('hide');
    }, 3000);
}



    //Admin login page

	// $('#adminLoginForm').on('submit', function(e) {
	// 	e.preventDefault();
	// 	$.ajax({
	// 		url: 'adminLoginValidation.php',
	// 		type: 'post',
	// 		data: $(this).serialize(),
	// 		beforeSend: function() {
	// 			$('#adminLoginBtn').attr('disabled', true);
	// 			$('#adminLoginBtn').addClass('is-loading');
	// 		},
    //         success: function (data) {

    //             if (data == "Login") {
    //                 $('#adminLoginBtn').removeClass('is-loading');
	// 			    $('#adminLoginBtn').attr('disabled', false);
    //                 window.location.href = "products.php";
    //             } else if (data == "Failed") {
    //                 showToast();
	// 			}
	// 			$('#adminLoginBtn').removeClass('is-loading');
    //             $('#adminLoginBtn').attr('disabled', false);

                
	// 		}
	// 	});
	// });


})(jQuery);