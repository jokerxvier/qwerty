 <!-- -->
<script src="http://code.jquery.com/jquery.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
 <!--  -->

<script src="<?php echo base_url(); ?>js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>

<script src="<?php echo base_url(); ?>js/signin.js"></script>

<?php 
if (isset($page) AND $page != 'login'):
?>
<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; 2013 Quezon City Map App Dashboard </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 
<?php endif; ?>
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="<?php echo base_url(); ?>js/jquery-1.7.2.min.js"></script> 
<script src="<?php echo base_url(); ?>js/excanvas.min.js"></script> 
<script src="<?php echo base_url(); ?>js/chart.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/full-calendar/fullcalendar.min.js"></script>
 
<script src="<?php echo base_url(); ?>js/base.js"></script> 
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