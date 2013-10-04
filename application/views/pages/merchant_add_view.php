
<?php $this->load->view('includes/subnavbar');?>

<div class="main">
  <div class="main-inner">
    <div class="container">
    		<!---CONTENT HERE----->
            <div class="pricing-table">
            	<div class="span4 plan">
                   	<h3>Add New Merchant</h3>
                    <form action="" method="post" class="form-horizontal" id="merchantform" accept-charset="utf-8">
                            <div class="control-group">
                                <label for="email" class="control-label">	
                                   Merchant Name
                                </label>
                                <div class="controls">
                                    <input name="email" type="email" value="" id="email" required />
                                </div>
                            </div>
                 
                            <div class="control-group">
                                <label for="address" class="control-label">	
                                    Address
                                </label>
                                <div class="controls"><input name="address" placeholder="W 123 Street" type="text" value="" id="address"></div>
                            </div>
                 
                            <div class="control-group">
                                <label for="zip" class="control-label">	
                                   Contact Number
                                </label>
                                <div class="controls"><input name="zip" type="text" value="" id="zip">
                                </div>
                            </div>
                 
                            <div class="control-group">
                                <label for="city" class="control-label">	
                                    City
                                </label>
                                <div class="controls"><input name="city" type="text" value="" id="city">
                                </div>
                            </div>
                            
                           
                 
                            <div class="form-actions">
                                <button type="submit" class="btn btn-large btn-primary">Save Billing Address</button>
                            </div>
                        </form>
       			 </div><!--/plan-->
            </div>
            
            <!---END CONTENT HERE---->
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>










