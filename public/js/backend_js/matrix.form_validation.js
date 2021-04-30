
$(document).ready(function(){

	$("#current_pwd").keyup(function(){
		var current_pwd =$("#current_pwd").val();
		$.ajax({
			type:'get',
			url:'/admin/check-pwd',
			data:{current_pwd:current_pwd},
			success:function(resp){
				
				if(resp=='false'){
					$('#pwdChk').html("<font color='red'>Current Password is Incorrect</font>");
				}else if(resp=='true'){
					$('#pwdChk').html("<font color='green'>Current Password is Correct</font>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});
	
	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
    //category Validation
 $("#add_category").validate({
		rules:{
			name:{
				required:true
			},
			description:{
				required:true,
			},
			url:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});


    //Edit category Validation
 $("#edit_category").validate({
		rules:{
			name:{
				required:true
			},
			description:{
				required:true,
			},
			url:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

    //Add Product Validation
 $("#add_product").validate({
		rules:{
			name:{
				required:true
			},
			
			category_id:{
				required:true,
			},
			url:{
				required:true,
			},
			code:{
				required:true,
			},
			price:{
				required:true,
				number:true,
			},
			color:{
				required:true,
			},
			image:{
				required:true,
			},
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});


   //Edit Product Validation
 $("#edit_product").validate({
		rules:{
			name:{
				required:true
			},
			
			category_id:{
				required:true,
			},
			url:{
				required:true,
			},
			code:{
				required:true,
			},
			price:{
				required:true,
				number:true,
			},
			color:{
				required:true,
			},
			
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

//end of edit product



 

	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#password_validate").validate({
		rules:{
			current_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			new_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});


		
$('. ').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure to delete this Slider?',
        text: 'This record will be permanantly deleted and cannot be recovered!',
        icon: 'warning',
        buttons: ["No Cancel", "Yes Delete!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
	
$('.deleteCategory').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure to delete this Category?',
        text: 'This record will be permanantly deleted and cannot be recovered!',
        icon: 'warning',
        buttons: ["No Cancel", "Yes Delete!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
	
	//sweetscript to product delete confirmation.
	$('.deleteProduct').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record will be permanantly deleted and cannot be recovered!',
        icon: 'warning',
        buttons: ["No Cancel", "Yes Delete!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});

//sweetscript to Product Attributes delete confirmation.
	$('.deleteProductAttributes').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record will be permanantly deleted this attribute and cannot be recovered!',
        icon: 'warning',
        buttons: ["No Cancel", "Yes Delete!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});

//Add Attrbutes Jquery
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="field_wrapper" style="margin-left:180px"> <input type="text" name="sku[]" id="sku" placeholder="SKU" style="width: 150px" /> <input type="text" name="size[]" id="size" placeholder="Size" style="width: 150px" /> <input type="text" name="price[]" id="price" placeholder="price" style="width: 150px" /> <input type="text" name="stock[]" id="stock" placeholder="stock" style="width: 150px" /><a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

});
