  $('document').ready(function(){
  	 var baseurl=$('#base_url').val();
	  
	//Leave Notification function call
	notification();
   $('#depart').on('change',function(){
   	var value=$('#depart').val();
   //	alert(baseurl);
   	$.ajax({
				type:'POST',
				url: baseurl+"index.php/Admincontroller/desigation_ajax/"+value,
				data: {standard:value},
				success: function(result){
					var x=JSON.parse(result);
					var html='<option value="">--Select desigation--</option>';
					$.each(x,function(index,value)
					{
						html+='<option value="'+value.designationName+'">'+value.designationName+'</otpion>';
					});
					$('#desigation').html(html);
					//alert(result);
				}
				});
   });

   //For employee confirm at given id at salary form
      $('#emp_id').keyup(function () {
  	 	var value=$('#emp_id').val();
   		$.ajax({
				type:'POST',
				url: baseurl+"index.php/Salarycontroller/get_emp_details/"+value,
				data: {standard:value},
				success: function(result){
					var x=JSON.parse(result);
					var fullname='';
					var depart='';
					$.each(x,function(index,value)
					{
					fullname=value.fname+" "+value.lname;
					depart=value.depart;
					post=value.desigation;
					});
					
						$('#emp_name').val(fullname);
						$('#emp_depart').val(depart);
						$('#emp_post').val(post);
					//alert(result);
					if(fullname.length==0)
					{
						$('#add_salary').attr("disabled", true);
						$('#warning').html('<p style="color:red">Employee Not Register</p>')
					}
				}
				});
     });

      //set employee id in salary slip generate modal
      	$(".Generate_pay").click(function()
        {
        	$('#emp_id').val($(this).val());
        }); 
      	
       //show hide salary generation type
    	generate_pay_slip_method(); 
		function generate_pay_slip_method()
		{
		if($("#radio1").is(":checked"))
		{
    			$('#salary_month').show();
    			$('#by_no_of_days').hide();
		}
		else{
    		    $('#by_no_of_days').show();
    		    $('#salary_month').hide();
		}
	  }

	  $('#radio1').on('click',function(){
	  	generate_pay_slip_method();
	  });

      $('#radio2').on('click',function(){
	  	generate_pay_slip_method();
	  });
	  
		//leave_request notification 
	    function notification(){
			var value=$('#depart').val();
			$.ajax({
					 type:'POST',
					 url: baseurl+"index.php/Notification/leave_request_notify",
					 data: {standard:value},
					 success: function(result){
						 //var x=JSON.parse(result);
						 $('#notification').html(result);
					 }
					 });
					 setTimeout(notification,5000);
		}
	   
		//show leave details
		$(".single_leave_req").click(function()
        {
			var str1=$(this).val();
			var str=str1.split("|");
			//console.log(str[3]);
			$('#from').val(str[0]);
			$('#to').val(str[1]);
			$('#nofday').val(str[2]);
			$('#leaveDescripton').val(str[3]);
			$('#req_id').val(str[4]);
            $('#emp_id').val(str[5]);
			//Upadte seen status
			var value=str[4];
			$.ajax({
				type:'POST',
				url: baseurl+"index.php/Notification/leave_request_seen",
				data: {standard:value},
				success: function(result){
					//var x=JSON.parse(result);
					$('#notification').html(result);
				}
				});
		});
		
		/*expense js*/

		check_bill_option(); 
		function check_bill_option()
		{
		if($("#reciept_no").is(":checked"))
		{
			$('#exp_bill_img').hide();
			$('#exp_bill_no').show();	
		}
		else{
			$('#exp_bill_img').show();
			$('#exp_bill_no').hide();	
		}
	  }

	  $('#reciept_no').on('click',function(){
	  	check_bill_option();
	  });

      $('#reciept_img').on('click',function(){
	  	check_bill_option();
	  });

	  //save expense category data 

	 // $('#expense_cat_submit').on('click',function(e){
	 	 $('#exp_cat_form').on('submit',function(e){
   		var expense_cat=$('#expense_name').val();
   		//alert(expense_cat);
   		 $.ajax(
   		 {
				type:'POST',
				url: baseurl+"index.php/Setting/expense_cat_data/",
				data: {expense_name:expense_cat},
				success: function(result){
					alert("Successfully Add");
					location.reload();
				}
		});
   		 e.preventDefault(e);
      });

//expense action 

	 	 $('.delete').on('click',function(){
	 	 	var expense_cat_id=$(this).data('id');
	 	 	var ans=confirm("Do you want remove expense category?");
            if(ans==true)
            {
	 		 $.ajax(
   				 {
					type:'POST',
					url: baseurl+"index.php/Expeness/expense_cat_delete/"+expense_cat_id,
					data: {expense_name:expense_cat_id},
					success: function(result){
						if(result=="Successfully Removed")
					      $('#'+expense_cat_id).hide();
					alert(result);
				 }
			 });
	 		}
	 	 });

	 	 $('.edit').on('click',function(){
	 	 	var expense_cat_id=$(this).data('id');
	 	    var cat_name=$(this).data('name');
	 	 	$('#exp_edit_name').val(cat_name);
	 	 	$('#hidden_id').val(expense_cat_id);
	 	 });

	 	 $('#exp_cat_edit_form').on('submit',function(e){
	 	 	//alert($('#exp_cat_edit_form').serialize());
	 	 	var expense_id=$('#hidden_id').val();
	 	 	var expense_cat_id=$('#exp_edit_name').val();
	 	 	//alert(expense_id+" "+expense_cat_id);
	 	    var ans=confirm("Do you want remove expense category?");
            if(ans==true)
            {
	 	 	$.ajax({
					type:'POST',
					url: baseurl+"index.php/Expeness/expense_cat_edit/"+expense_id,
					data: {expense_name:expense_cat_id},
					success: function(result){
					alert(result);
				 }
			 });
	 	 }
	 	 e.preventDefault(e);
	 	 });

  });
    	