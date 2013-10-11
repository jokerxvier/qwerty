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
                                <div class="controls"><input name="email" placeholder="Email" type="txt" value="" id="email" required></div>
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
<!-- Modal -->