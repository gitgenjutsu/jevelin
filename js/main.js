// *****************Header Scroll**********************
const scrollFun = ()=>{
		let scrollVal = window.scrollY;
		let header = document.querySelector('.header');
		if(scrollVal < 318){
			header.classList.remove('navBG');
            $('.scrolltop').fadeOut();
		}else{
			header.classList.add('navBG');	
            $('.scrolltop').fadeIn();		
		}
}

window.addEventListener('scroll',scrollFun);




// **************************View Tabs*****************

   function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
      tabcontent[i].className = tabcontent[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}



// **************************Add to cart/wishlist ajax*****************
function cartItemsCount(id) {
    let countProd = id;
        $.ajax({
            url: "cartItemsCount.php",
            type: "POST",
            data: {
                id: countProd
            },
            success: function (data) {
                $('#cartItemsCount').html(data);
                cartItemsView(countProd);
            }
        });
}
function cartItemsView(id) {
    let viewProd = id;
        $.ajax({
            url: "cartItemsView.php",
            type: "POST",
            data: {
                id: viewProd
            },
            success: function (data) {
                $('#cartItemsView').html(data);
            }
        });
}

function addToCart(id) {
    let addProd = id;
        $.ajax({
            url: "add_to_cart.php",
            type: "POST",
            data: {
                id: addProd
            },
            success: function () {
                cartItemsCount(addProd);
                showToast("Product Addedd","Added to Cart");
            }
        });
}

function addToWish(id) {
    let addProd = id;
        $.ajax({
            url: "add_to_wish.php",
            type: "POST",
            data: {
                id: addProd
            }, success: function () {
                showToast("Product Wishlisted","Added to Wishlist");
            }
        });
}

//wishlist data
function getWishlistData() {
        $.ajax({
            url: "getWishlistData.php",
            type: "POST",
            success: function (data) {
                $('#wishlist_data').html(data);
            }
        });
}
getWishlistData();

//remove wishlist item
function removeFromWish(id) {
    
        $.ajax({
            url: "remove_from_wish.php",
            type: "POST",
            data: {
                id: id
            }, success: function () {
                getWishlistData();
            }
        });
}


function showToast(type,msg) {
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
    $('#notification-toast .toast').toast('show');
    setTimeout(function(){ 
        $('#notification-toast .toast:first-child').remove();
    }, 3000);
}


function headerCart(id) {
    let headProd = id;
    $.ajax({
            url: "includes/header.php",
            type: "POST",
            data: {
                id: headProd
            }
        });
}




$('#num_of_womenProducts').on('blur', function () {
    let addProdNum = document.querySelector('#num_of_womenProducts').value;
        if (addProdNum > 5  ) {
        addProdNum = 5;
    } else if(addProdNum == 0){
        addProdNum = 1;
    }
    document.querySelector('#num_of_womenProducts').value = addProdNum;
    })
$('.up_quantity').on('click', function () {
    let addProdNum = document.querySelector('#num_of_womenProducts').value;
    if (addProdNum < 5  ) {
        addProdNum++;
    } else if(addProdNum > 5){
        addProdNum = 5;
    }
    document.querySelector('#num_of_womenProducts').value = addProdNum;
});

$('.down_quantity').on('click', function () {
    let addProdNum = document.querySelector('#num_of_womenProducts').value;
    if (addProdNum > 1  ) {
        addProdNum--;
    } else if(addProdNum < 1){
        addProdNum = 1;
    }
    document.querySelector('#num_of_womenProducts').value = addProdNum;
});


$('#addToCartForm').on('submit', function (e) {
    e.preventDefault();
    let addProd = document.querySelector('#prodID').value;
    $.ajax({
        url: "add_to_cart.php",
        type: "post",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function () {
            cartItemsCount(addProd);
        }
    });
});

