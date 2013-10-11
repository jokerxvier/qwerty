       			<div class="btn-group merchant-error">
						<?php echo $this->session->flashdata('message');  ?>
                </div>
                
                <?php $this->load->view('modal/merchant_view_modal');?>
                

        
        <form action="<?php echo base_url(); ?>merchant/process" method="get" class="form-horizontal form-merchant-list" accept-charset="utf-8">
        
                <div class="row show-grid">
                    <div class="span6 pull-left" data-original-title="" title="">
                      <h3 class="merchant-head">Merchants</h3>
                    </div>
                    <div class="span3 pull-right control-top" data-original-title="" title="">
                      <span class="btn-group pull-left">
                        <button class="btn btn-primary dropdown-toggle  btn-addMerchant" data-toggle="dropdown" style=" margin-right:10px;"><i class="icon-align-left"></i> Add New</button>
                
                      </span>
                       <span class="btn-group pull-left">
                         <button class="btn btn-danger dropdown-toggle btn-delete" type="submit"> <i class="icon-trash"></i> Delete</button>
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













