<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 id="myModalLabel">Add Merchant</h3> 
                  </div>
                  <div class="modal-body">
                  	<div id="message"></div>
                    <form action="<?php echo base_url(); ?>location/process" method="GET" class="form-horizontal form-merchant" id="merchantform" accept-charset="utf-8">
                       <div class="location-page-one">
                            <div class="control-group">
                                <label for="name" class="control-label">	
                                   Location Name
                                </label>
                                <div class="controls">
                                    <input name="name" type="text" value="" placeholder="Location Name" id="location" required />
                                </div>
                            </div>
                            
                            
                           <div class="control-group">
                                <label for="House" class="control-label">	
                                   House No. 
                                </label>
                                <div class="controls">
                                    <input name="House" type="text" value="" placeholder="House #" id="House"  />
                                </div>
                            </div>
                            
                             <div class="control-group">
                                <label for="email" class="control-label">	
                                   Name of Street
                                </label>
                                <div class="controls">
                                    <input name="street" type="text" value="" placeholder="Street" id="street" required />
                                </div>
                             </div>
                             
                             <div class="control-group">
                                <label for="brgy" class="control-label">	
                                   Barangay
                                </label>
                                <div class="controls">
                                    <input name="brgy" type="text" value="" placeholder="Barangay" id="brgy" required />
                                </div>
                             </div>
                            

                           <div class="control-group">
                                <label for="postal" class="control-label">	
                                   Postal Code
                                </label>
                                <div class="controls">
                                    <input name="postal" type="text" value="" placeholder="Postal Code" id="postal" required />
                                </div>
                            </div>

                          
						</div><!--end page one-->
               
                        <div class="location-page-two">
                         	<div class="control-group">
                                <label for="lat" class="control-label">	
                                   Latitude
                                </label>
                                <div class="controls"><input name="lat" placeholder="latitude" type="text" value="" id="lat"/></div>
                            </div>
   
                            <div class="control-group">
                                <label for="email" class="control-label">	
                                  Longitude
                                </label>
                                <div class="controls"><input name="email" placeholder="longitude" type="text" value="" id="long" /></div>
                            </div>
                            
                       		<div id="map-canvas" style="width: 100%; height: 400px"></div>
                         </div>   
                        
                             
                 	 </div><!--end location-page-two-->
                        </form>       
                  <div class="modal-footer">
                  	<span class="loader"></span>
                    <div class="pull-right">
                    <button class="btn nex-btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button class="btn btn-primary btn-merchant">Next</button>
                    <button class="btn btn-primary btn-map" type="submit">Save changes</button>
                    </div>
                  </div>
         
</div>
<!-- Modal -->