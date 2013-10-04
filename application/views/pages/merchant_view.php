
<?php $this->load->view('includes/subnavbar');?>

<div class="main">
  <div class="main-inner">
    <div class="container">

        <div class="btn-group">
				
				<?php if(isset($message)){?>
						<p class="alert alert-warning"><?php echo $message ?></p>
				<?php }?>
                <!-- Modal -->
                <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 id="myModalLabel">Add Merchant</h3>
                  </div>
                  <div class="modal-body">
                  	<div id="message"></div>
                    <form action="<?php echo base_url(); ?>/merchant/process?action=" method="GET" class="form-horizontal form-merchant" id="merchantform" accept-charset="utf-8">
                            <div class="control-group">
                                <label for="email" class="control-label">	
                                   Merchant Name
                                </label>
                                <div class="controls">
                                    <input name="email" type="text" value="" id="merchant" required />
                                </div>
                            </div>
                 
                            <div class="control-group">
                                <label for="address" class="control-label">	
                                    Address
                                </label>
                                <div class="controls"><input name="address" placeholder="W 123 Street" type="text" value="" id="address" required></div>
                            </div>
                            
                            <div class="control-group">
                                <label for="email" class="control-label">	
                                    Email
                                </label>
                                <div class="controls"><input name="email" placeholder="W 123 Street" type="text" value="" id="email" required></div>
                            </div>
                 
                            <div class="control-group">
                                <label for="zip" class="control-label">	
                                   Contact Number
                                </label>
                                <div class="controls"><input name="zip" type="text" value="" id="phone" required>
                                </div>
                            </div>
                 
                            <div class="control-group">
                                <label for="city" class="control-label">	
                                    City
                                </label>
                                <div class="controls"><input name="city" type="text" value="" id="city">
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
        
        <form action="<?php echo base_url() ?>merchant/process" method="get" class="form-horizontal form-merchant" accept-charset="utf-8">
                <div class="btn-group">
                    <a href="#myModal" role="button" class="btn btn-default btn-lg" data-toggle="modal"><span class="glyphicon glyphicon-star"></span>Add New Merchant</a>
                    <button role="button" class="btn" type="submit">Delete Record</button> 
                </div>
                <input name="action" type="hidden" value="delete" />
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
                        if ($resultCount > 0):
                            foreach($results as $data){
                        ?>
                          <tr>
                             <td><input name="item[]" type="checkbox" value="<?php echo $data->merchant_id ?>" /> </td>
                            <td> <?php echo $data->merchant_name ?> </td>
                            <td> <?php echo $data->merchant_address ?> </td>
                            <td><?php echo $data->contact_number ?></td>
                            <td><?php echo $data->contact_person ?></td>
                             <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                          </tr>
                          <?php 
                            }
                          endif; 
                          ?>
                        
                          
                        
                        </tbody>
                      </table>
                      

              <?php  echo $links; ?> 
          </form>    
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>












