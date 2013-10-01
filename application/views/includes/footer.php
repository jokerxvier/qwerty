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

</body>

</html>