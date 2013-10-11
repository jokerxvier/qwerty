<?php $this->load->view('includes/header');?>
<?php $this->load->view('includes/subnavbar');?>
<div class="main">
  <div class="main-inner">
    <div class="container">
			<?php $this->load->view($main_content);?>
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<?php $this->load->view('includes/footer');?>