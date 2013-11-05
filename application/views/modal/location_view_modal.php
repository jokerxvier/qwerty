<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 id="myModalLabel">Add Location</h3> 
                  </div>
                    <form action="<?php echo base_url(); ?>location/process" method="GET" class="form-horizontal form-merchant-modal" id="merchantform" novalidate accept-charset="utf-8">
                  <div class="modal-body">
                  	<div id="message"></div>
                  
                       <div class="location-page-one">
                            <div class="control-group">
                                <label for="name" class="control-label">	
                                   Location Name
                                </label>
                                <div class="controls">
                                    <input name="location" type="text" value="" placeholder="Location Name" id="location"/>
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
                                    <input name="street" type="text" value="" placeholder="Street" id="street"/>
                                </div>
                             </div>
                             
                             <div class="control-group">
                                <label for="brgy" class="control-label">	
                                   Barangay
                                </label>
                                <div class="controls">
                                    <input name="brgy" type="text" value="" placeholder="Barangay" id="brgy"/>
                                </div>
                             </div>
                            

                           <div class="control-group">
                                <label for="postal" class="control-label">	
                                   Postal Code
                                </label>
                                <div class="controls">
                                    <input name="postal" type="text" value="" placeholder="Postal Code" id="postal"/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label for="postal" class="control-label">	
                                   Category
                                </label>
                            
                                 <div class="controls" style="position:relative">
                                          
                              
                                          <select name="category" class="category">
                                          	<option value="">Select a Category</option>
                                           <?php 
										   	foreach ($category as $cat) {
										    ?>
                                            <option   value="<?php echo $cat->id ?>"> <?php echo ucfirst($cat->cat_name) ?></option>
                                          <?php } ?>
                                          </select>
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
                       
                  <div class="modal-footer">
                  	<span class="loader"></span>
                    <div class="pull-right">
<!--                    <button class="btn back-btn"  aria-hidden="true">Back</button>-->
                    <button class="btn btn-primary btn-merchant" type="submit">Next</button>
                    <button class="btn btn-primary btn-map" type="submit">Save changes</button>
                    </div>
                  </div>
                  
                   </form>       
         
</div>
<!-- Modal -->