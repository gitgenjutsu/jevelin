<script src="./js/ajax.js"></script>
<!-- Core Vendors JS -->
<script src="assets/js/vendors.min.js"></script>

<!-- page js -->
<script src="assets/vendors/datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendors/datatables/dataTables.bootstrap.min.js"></script>
<!-- page js -->
<script src="assets/vendors/select2/select2.min.js"></script>
<script src="assets/vendors/chartjs/Chart.min.js"></script>
<script src="assets/js/pages/dashboard-default.js"></script>
<!-- Core JS -->
<script src="assets/js/app.min.js"></script>
<!-- Ajax JS -->
<!-- ajax -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<!-- sweet alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>




<!-- custom ajax js -->
<script>
    // ======================= Search Product/Order Data==================
    $('#searchProducts').on('keyup', function() {
        let search = this.value;
        $.ajax({
            url: 'searching.php',
            type: 'post',
            data: {
                data: search,
            },
            success: function(data) {
                $('#prod_data').html(data);
            }
        })

    })

    $('#searchOrders').on('keyup', function() {
        let search = this.value;
        $.ajax({
            url: 'searchOrder.php',
            type: 'post',
            data: {
                data: search,
            },
            success: function(data) {
                $('#order_data').html(data);
            }
        })

    })

    // ======================= View Data==================
    //View Product data
    function get_Data(page, num) {
        $.ajax({
            url: 'get_Data.php',
            type: 'post',
            data: {
                page: page,
                num: num
            },
            success: function(data) {
                $('#prod_data').html(data);
            }
        })
    }

    function get_ReviewData(page, num) {
        $.ajax({
            url: 'get_ReviewData.php',
            type: 'post',
            data: {
                page: page,
                num: num
            },
            success: function(data) {
                $('#review_data').html(data);
            }
        })
    }
    get_ReviewData(1, 5);

    function get_ProductPagination(page) {
        $.ajax({
            url: 'get_ProductPagination.php',
            type: 'post',
            data: {
                page: page,
            },
            success: function(data) {
                // alert(data);
                $('#productPages').html(data);
                get_Data(page, 5);
            }
        })
    }
    get_ProductPagination(1);


    //View Order data
    function get_OrderData(page, num) {
        $.ajax({
            url: 'get_OrderData.php',
            type: 'post',
            data: {
                page: page,
                num: num
            },
            success: function(data) {
                $('#order_data').html(data);
            }
        })
    }


    function get_OrderDataPagination(page) {
        $.ajax({
            url: 'get_OrderDataPagination.php',
            type: 'post',
            data: {
                page: page,
            },
            success: function(data) {
                // alert(data);
                $('#orderPages').html(data);
                get_OrderData(page, 5);
            }
        })
    }
    get_OrderDataPagination(1);
    // ======================= Delete Data==================
    //Delete Product Data Function
    function deleteProduct(id) {
        let del = id;

        swal({
            title: "Are you sure?",
            text: "This product will be deleted permanently!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((data) => {
            if (data) {
                $.ajax({
                    url: "deleteProduct.php",
                    type: "POST",
                    data: {
                        del: del
                    },
                    success: function() {
                        swal("Done!", "It was succesfully deleted!", "success");
                        get_Data();
                    }
                });
            }
        })
    }

    //Delete Product Img Function
    function deleteProductImg(id) {
        let del = id;
        $.ajax({
            url: "deleteProductImg.php",
            type: "POST",
            data: {
                del: del
            },
            success: function(data) {
                $('#editProductForm').html(data);
                editProduct(del);
            }
        });
    }


    // ======================= Edit Data==================

    //Edit products data function
    function editProduct(id) {
        let edit = id;
        $.ajax({
            url: 'editProduct.php',
            type: 'post',
            data: {
                edit: edit
            },
            success: function(data) {
                $('#editProductForm').html(data);
                $('#editProductForm').fadeIn();
                $('#hideTable').fadeOut();
                $('#profitInfo').fadeOut();
                get_Data();
            }
        })
    }

    //Edit order status data function
    function editOrderStatus(id) {
        let edit = id;
        $.ajax({
            url: 'editOrderStatus.php',
            type: 'post',
            data: {
                edit: edit
            },
            success: function(data) {
                $('.updateOrderStatusForm').html(data);
                get_OrderData();
            }
        })
    }


    //Close product edit form
    function closeEdit() {
        $('#editProductForm')[0].reset();
        $('#searchProducts').val('');
        $('#editProductForm').fadeOut();
        $('#hideTable').fadeIn();
        $('#profitInfo').fadeIn();
    }

    // ======================= Update Data==================
    //Update product form data

    $('#editProductForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "updateProduct.php",
            type: "post",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#editProductForm')[0].reset();
                $('#editProductForm').fadeOut();
                get_Data();
                $('#hideTable').fadeIn();
            }
        })
    });


    //Update Order Status form data

    $('.updateOrderStatusForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "updateOrderStatus.php",
            type: "post",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#side-modal-left').modal('hide');
                get_OrderData();
            }
        })
    });

    // ======================= Add Data==================
    //Add product data function
    $('#addProductForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "addProducts.php",
            type: "post",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#addProductForm')[0].reset();
                $('#exampleModalScrollable').fadeOut();
                $('.modal-backdrop').hide();
                get_Data();
                $('#hideTable').fadeIn();
            }
        })
    });
    //Close product add form
    function closeAdd() {
        $('#addProductForm')[0].reset();
        $('#image_preview1').fadeOut();
        $('#image_preview2').fadeOut();
        // $('#addProductForm').fadeOut();
    }
    $('#openAddProductForm').on('click', function() {
        $('#image_preview1').fadeIn();
        $('#image_preview2').fadeIn();
    });
</script>






<script>
    //tooltip
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
    $('.select2').select2();
    $('#data-table').DataTable({
        searching: false,
        ordering: true,
    });
    $('#data-table_length').hide();




    //Preview Uploaded image
    function preview_image1() {
        var total_file = document.querySelector(".upload_file1").files.length;
        for (var i = 0; i < total_file; i++) {
            $('#image_preview1').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'><br>");
        }
    }

    function preview_image2() {
        var total_file = document.querySelector(".upload_file2").files.length;
        for (var i = 0; i < total_file; i++) {
            $('#image_preview2').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "'><br>");
        }
    }



    //Product Form Validations

    // Function to remove the special char
    function RemoveSpecialChar(search) {
        let res = search.replace(/[^a-zA-Z ]/g, "");
        return res;
    }

    // Function to remove the special char but allowed num and comma
    function RemoveSpecialCharNotNum(search) {
        let res = search.replace(/[^a-zA-Z0-9,]/g, "");
        return res;
    }

    // Function to remove the special char and text but allowed num
    function RemoveSpecialCharAndText(search) {
        let res = search.replace(/[^0-9]/g, "");
        return res;
    }



    //Name input
    $('.prodName').on('blur', function() {
        let search = this.value;
        // Function calling
        let data = RemoveSpecialChar(search);

        $('#prod_name').val(data);
    });


    //prodSize input
    $('.prodSize').on('blur', function() {
        let search = this.value;
        // Function calling
        let data = RemoveSpecialCharNotNum(search);
        $('#size').val(data);
    });

    //category input
    $('.prodCategory').on('blur', function() {
        let search = this.value;
        // Function calling
        let data = RemoveSpecialChar(search);
        $('#category').val(data);
    });

    //prodPrice input
    $('.prodPrice').on('blur', function() {
        let search = this.value;
        // Function calling
        let data = RemoveSpecialCharAndText(search);

        $('#price').val(data);
    });

    //prodCost input
    $('.prodCost').on('blur', function() {
        let search = this.value;
        // Function calling
        let data = RemoveSpecialCharAndText(search);

        $('#cost').val(data);
    });
</script>

</body>


</html>