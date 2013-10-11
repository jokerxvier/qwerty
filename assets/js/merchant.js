var merchantJS = (function (parent, $) {
			
		   var Merchant = parent;

			var dom = {
				formMerchant : $('#merchantform'),
				$fomrMerchantList : $('.form-merchant-list'),
				merchantName : $('#merchant'),
				address : $('#address'),
				phone : $('#phone'),
				person : $('#person'),
				email : $('#email'),
				submitBtn : $('.btn-merchant'),
				message : $('#message'),
				btnDelete : $('.btn-delete'),
				merchantCheckBox: $('.merchantCheckBox'),
				CheckBox: $('.merchantCheckBox:checked'),
				warning : $('#message'),
				editBtn : $('.merchant .edit-btn')
			}
			
			Merchant.changeHtmlFormat = function(action){
				if (action === 'update'){
					$('#myModalLabel').html('Update Record');
					$('.btn-merchant').html('Update Info');
					$('.btn-merchant').addClass('update-btn');
				}else if(action === 'insert') {
					$('.form-merchant input[type="text"]').val('');
					$('#myModalLabel').html('Add Merchant');
				}
				
			}
			
			
			Merchant.ajaxFunction  = function (url, params){
				var data;
				$.ajax({
					  url: url,  
					  async: false, 
					  type: 'GET', 
					  dataType: 'json', 
					  data: params,
					  success: function(result) {
						 data  = result;
					  }
					  
					 
				});
				
				 return data ;
				
			}
			
			Merchant.updateMerchant = function (url){
				var MerchantUrl =  url+'merchant/process'; 
				dom.editBtn.on('click', function(){
					var txtUser =  $(this).parent().find('.userTxt').val();
					var params = 'action=update_list&merchant_id='+ txtUser;
					var result =  Merchant.ajaxFunction(MerchantUrl, params);
					if(result.success == 1){
						dom.phone.val(result.merchant[0][0].contact_number);
						dom.merchantName.val(result.merchant[0][0].merchant_name);
						dom.address.val(result.merchant[0][0].merchant_address);
						dom.person.val(result.merchant[0][0].contact_person);
						var action = "update";
						Merchant.changeHtmlFormat(action);
						$('#myModal').modal('show');
						
						$('.update-btn').on('click', function (){
						
							var params2 = 'action=updatedata&merchant_name='+ dom.merchantName.val()+'&address='+dom.address.val()+'&phone='+dom.phone.val()+'&person='+dom.person.val()+'&email='+dom.email.val()+'&merchant_id='+ txtUser;
							var result2 =  Merchant.ajaxFunction(MerchantUrl, params2);
							if(result2.success == 1){
									dom.message.html('<p class="alert alert-warning">You have successfuly Added new merchant</p>');
									 setTimeout(function () {
										$('#myModal').modal('hide');		
										 location.reload(true);
									}, 1000);
									
									$('#myModal').on('hidden.bs.modal', function () {
										location.reload(true);
									});
									
							}						   
						});
						
						
						
					}
				
				});
			}



			Merchant.addMerchant = function (url){
				$('.merchant .btn-addMerchant').on('click',function (){
						var action = "insert";
						Merchant.changeHtmlFormat(action);								   
						$('#myModal').modal('show');								   
					$.validator.setDefaults({
					
						submitHandler: function() { 
								var MerchantUrl =  url+'merchant/process'; 
								var params = 'action=insert_merchant&merchant_name='+ dom.merchantName.val()+'&address='+dom.address.val()+'&phone='+dom.phone.val()+'&person='+dom.person.val()+'&email='+dom.email.val();
								var result =  Merchant.ajaxFunction(MerchantUrl, params);
								
								if(result.success == 1){
									dom.message.html('<p class="alert alert-warning">You have successfuly Added new merchant</p>');
									 setTimeout(function () {
										$('#myModal').modal('hide');		
										 location.reload(true);
									}, 1000);
									
									$('#myModal').on('hidden.bs.modal', function () {
										location.reload(true);
									});
									
								}
							
						  }
					});
			
					dom.submitBtn.on('click',function (e){			   
					  dom.formMerchant.validate();	
					  dom.formMerchant.submit();
					  e.preventDefault();		   
					});		
					


				});
				
				
			}
			
		  return parent; 
			
		
}(merchantJS || {}, jQuery));

