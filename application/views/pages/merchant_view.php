
<?php $this->load->view('includes/subnavbar');?>

<div class="main">
  <div class="main-inner">
    <div class="container">
		
        <div class="btn-group merchant-error">
				<?php echo $this->session->flashdata('message');  ?></p>
                <!-- Modal -->
                <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 id="myModalLabel">Add Merchant</h3>
                  </div>
                  <div class="modal-body">
                  	<div id="message"></div>
                    <form action="<?php echo base_url(); ?>/merchant/process" method="GET" class="form-horizontal form-merchant" id="merchantform" accept-charset="utf-8">
                            <div class="control-group">
                                <label for="email" class="control-label">	
                                   Merchant Name
                                </label>
                                <div class="controls">
                                    <input name="name" type="text" value="" placeholder="Full Name" id="merchant" />
                                </div>
                            </div>
                 
                            <div class="control-group">
                                <label for="address" class="control-label">	
                                    Address
                                </label>
                                <div class="controls"><input name="address" placeholder="Full Address" type="text" value="" id="address" required></div>
                            </div>
   
                            <div class="control-group">
                                <label for="email" class="control-label">	
                                    Email
                                </label>
                                <div class="controls"><input name="email" placeholder="Email" type="email" value="" id="email" required></div>
                            </div>
                 
                            <div class="control-group">
                                <label for="zip" class="control-label">	
                                   Contact Number
                                </label>
                                <div class="controls"><input name="zip" type="text" placeholder="999-999-999"  value="" id="phone" required>
                                </div>
                            </div>
                 
                            <div class="control-group">
                                <label for="city" class="control-label">	
                                    Contact Person
                                </label>
                                <div class="controls"><input name="city" type="text" value="" id="person">
                                </div>
                            </div>
                            
                           
                 
                           
                        </form>
                  </div>
                  <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button class="btn btn-primary btn-merchant" type="submit">Save changes</button>
                  </div>
                </div>
                
                
        </div>
        
        <form action="<?php echo base_url() ?>merchant/process" method="get" class="form-horizontal form-merchant-list" accept-charset="utf-8">
        
        	<div class="row show-grid">
				<div class="span6 pull-left " data-original-title="" title="">
                  <h3 class="merchant-head">Merchants</h3>
                </div>
                <div class="span3 pull-right" data-original-title="" title="">
                  <span class="btn-group pull-left">
                    <button class="btn btn-primary dropdown-toggle  btn-addMerchant" data-toggle="dropdown" style=" margin-right:10px;"><i class="icon-align-left"></i> Add New</button>
            
               	  </span>
                   <span class="btn-group pull-right">
                     <button class="btn btn-danger dropdown-toggle btn-delete" type="submit"> <i class="icon-trash"></i> Delete Record</button>
                     <input name="action" type="hidden" value="delete" />
                   </span>
                </div>
              </div>
                
                       
                
                 <table class="table table-striped table-bordered table-merchant">
                        <thead>
                          <tr>
                            <th>&nbsp </th>
                            <th> Merchant Name </th>
                            <th> Address </th>
                            <th> Contact Number   </th>
                            <th> Contact Person </th>
                            <th class="td-actions"> </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
				
                        if (isset($resultCount ) && $resultCount > 0):
                           	 foreach($results as $data){
                        ?>
                                  <tr>
                                     <td style="text-align:center"><input name="item[]" type="checkbox" value="<?php echo $data->merchant_id ?>" /> </td>
                                    <td> <?php echo $data->merchant_name ?> </td>
                                    <td> <?php echo $data->merchant_address ?> </td>
                                    <td><?php echo $data->contact_number ?></td>
                                    <td><?php echo $data->contact_person ?></td>
                                     <td class="td-actions" align="center">
                                
                                     <button class="btn btn-info edit-btn" data-toggle="dropdown"> <i class="icon-pencil"></i> Update</button>
                                     <input type="hidden" name="user_id" value="<?php echo $data->merchant_id ?>" class="userTxt"  />
                                     </td>
                                  </tr>
                          <?php 
                            	}
							else :
							?>	
							<tr>
                                 <td colspan="6">No Data has been display</td>  
                             </tr>
							
                          <?php endif; ?>
                        
                          
                        
                        </tbody>
                      </table>
                      

              <?php  echo $links; ?> 
          </form>    
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>












