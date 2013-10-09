
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="<?php echo base_url(); ?>assets/js/jquery-1.7.2.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/excanvas.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/chart.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/full-calendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/signin.js"></script>
<script src="<?php echo base_url(); ?>assets/js/base.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/validation.js"></script> 
<script type="text/javascript">

$(function (){	
		
	function myJs(){
			
		    var Merchant = this;

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
				editBtn : $('.edit-btn')
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
			
			Merchant.updateMerchant = function (){
				var MerchantUrl =  '<?php echo base_url(); ?>merchant/process'; 
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



			Merchant.addMerchant = function (){
				$('.btn-addMerchant').on('click',function (){
						var action = "insert";
						Merchant.changeHtmlFormat(action);								   
						$('#myModal').modal('show');								   
						$.validator.setDefaults({
					
						submitHandler: function() { 
								var MerchantUrl =  '<?php echo base_url(); ?>merchant/process'; 
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
			
		}//end myJs

			
		var myJs = new myJs();	
		
		myJs.addMerchant();
		myJs.updateMerchant();
		
		$('#phone').on('keyup', function (e){
			if ((e.keyCode > 47 && e.keyCode <58) || (e.keyCode < 106 && e.keyCode > 95))
				{
					this.value = this.value.replace(/(\d{3})\-?/g,'$1-');
					return true;
				}
   				 this.value = this.value.replace(/[^\-0-9]/g,'');
		});

		
});

</script>
<script>     

        var lineChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
				{
				    fillColor: "rgba(220,220,220,0.5)",
				    strokeColor: "rgba(220,220,220,1)",
				    pointColor: "rgba(220,220,220,1)",
				    pointStrokeColor: "#fff",
				    data: [65, 59, 90, 81, 56, 55, 40]
				},
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)",
				    pointColor: "rgba(151,187,205,1)",
				    pointStrokeColor: "#fff",
				    data: [28, 48, 40, 19, 96, 27, 100]
				}
			]

        }


		
		var pieData = [
				{
				    value: 30,
				    color: "#F38630"
				},
				{
				    value: 50,
				    color: "#E0E4CC"
				},
				{
				    value: 100,
				    color: "#69D2E7"
				}

			];

				var myPie = new Chart(document.getElementById("pie-chart").getContext("2d")).Pie(pieData);

				var chartData = [
			{
			    value: Math.random(),
			    color: "#D97041"
			},
			{
			    value: Math.random(),
			    color: "#C7604C"
			},
			{
			    value: Math.random(),
			    color: "#21323D"
			},
			{
			    value: Math.random(),
			    color: "#9D9B7F"
			},
			{
			    value: Math.random(),
			    color: "#7D4F6D"
			},
			{
			    value: Math.random(),
			    color: "#584A5E"
			}
		];


    </script><!-- /Calendar -->
</body>

</html>