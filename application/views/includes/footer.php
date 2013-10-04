
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="<?php echo base_url(); ?>js/jquery-1.7.2.min.js"></script> 
<script src="<?php echo base_url(); ?>js/excanvas.min.js"></script> 
<script src="<?php echo base_url(); ?>js/chart.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/full-calendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url(); ?>js/signin.js"></script>
<script src="<?php echo base_url(); ?>js/base.js"></script> 
<script src="<?php echo base_url(); ?>js/validation.js"></script> 
<script type="text/javascript">
	$(function (){
	 	var formMerchant = $('#merchantform');
		var merchantName = $('#merchant');
		var address = $('#address');
		var phone = $('#phone');
		var city = $('#city');
		var email = $('#email');
		var submitBtn = $('.btn-merchant');
		var message = $('#message');
		
		$.validator.setDefaults({
				submitHandler: function() { 
					$.ajax({
						url: '<?php echo base_url(); ?>merchant/process',  
						async: false, 
						type: 'GET', 
						dataType: 'json', 
						data: 'action=insert_merchant&merchant_name='+ merchantName.val()+'&address='+address.val()+'&phone='+phone.val()+'&city='+city.val()+'&email='+email.val(),
						success: function(result) {
							if(result.success == 1){
								message.html('<p class="alert alert-warning">You have successfuly Added new merchant</p>');
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
				}
		});
		
		
		
		submitBtn.on('click',function (e){			   
			  formMerchant.validate();	
			  formMerchant.submit();
			  e.preventDefault();		   
		})

		
		
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