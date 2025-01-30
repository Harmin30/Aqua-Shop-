$(document).ready(function () {
    
    $(document).on('click', '.delete_product_btn', function (e) { 
        e.preventDefault();
        
        var id = $(this).val();
        //alert(id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {                
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'product_id':id,
                        'delete_product_btn': true
                    },
                    
                    success: function (response) {    
                        if(response == 200) 
                        {                       
                            swal("Success!", "product Deleted Successfully!", "success");   
                            $('#products_table').load(location.href + " #products_table")
                        }   
                        else if(response == 500) 
                        {
                            swal("Error!", "Something Went Wrong!", "error");
                        }       
                    }
                });
            }
          });

    });

    $(document).on('click', '.delete_category_btn', function (e) {
        e.preventDefault();
        
        var id = $(this).val();
        //alert(id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {                
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'category_id':id,
                        'delete_category_btn': true
                    },
                    
                    success: function (response) {    
                        if(response == 200) 
                        {                       
                            swal("Success!", "product Deleted Successfully!", "success");   
                            $('#category_table').load(location.href + " #category_table")
                        }   
                        else if(response == 500) 
                        {
                            swal("Error!", "Something Went Wrong!", "error");
                        }       
                    }
                });
            }
          });

    });
   
    // $(document).on('click', '.delete_user_btn', function (e) {
    //     e.preventDefault();

    //     var user_id = $(this).val();
    //     // alert(user_id);    
    //     swal({
    //         title: "Are you sure?",
    //         text: "Once deleted, you will not be able to recover!",
    //         icon: "warning",
    //         buttons: true,
    //         dangerMode: true,
    //       })
    //       .then((willDelete) => {
    //         if (willDelete) {                
    //             $.ajax({
    //                 method: "POST",
    //                 url: "handleuserse.php",
    //                 data: {
    //                     'user_id':user_id,
    //                     'delete_user_btn': true
    //                 },
                    
    //                 success: function (response) {    
    //                     if(response == 50) 
    //                     {                       
    //                         swal("Success!", "User removed Successfully!", "success");   
                            
    //                     }   
    //                     else if(response == 20) 
    //                     {
    //                         swal("Error!", "Something Went Wrong!", "error");
    //                     }       
    //                 }
    //             });
    //         }
    //       });



    // });


});