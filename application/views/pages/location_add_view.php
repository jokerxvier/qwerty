 <div class="btn-group merchant-error">
	<?php echo $this->session->flashdata('message');  ?>
</div>
<div class="row">
  	<div class="span12">
    	<div class="widget-header">
						<i class="icon-list"></i>
						<h3>Location Details</h3>
		</div> <!-- /widget-header -->
       
   	 <form method="get" action="<?php echo base_url(); ?>location/process" />
       <input type="hidden" class="icon"  value="<?php echo $result[0]->icon ?>" />
       <input type="hidden" class="action" name="action"  value="update_record">
       <input type="hidden" class="action" name="location_id"  value="<?php echo $result[0]->id ?>">
        <div class="widget-content addlocation" >
         <div class="edit-container" style="display:block; overflow:hidden">
                    <div class="pull-left leftpane">
                        <h4>Title</h4>
                        <input type="text" class="titleTxt txttitle"  value="<?php echo $result[0]->Title ?>" name="title" placeholder="Title">
                        <hr />
                        <h4>House No.</h4>
                        <input type="text" class="titleTxt txthouse"  value="<?php echo $result[0]->house_number ?>" name="house" placeholder="house">
                        
                        
                        <hr />
                        <h4>Street</h4>
                        <input type="text" class="titleTxt txtstreet"  value="<?php echo $result[0]->street_name ?>" name="street"  placeholder="street">
                        
                        <hr />
                        <h4>Barangay</h4>
                        <input type="text" class="titleTxt txtbrgy"  value="<?php echo $result[0]->barangay ?>" name="brgy" placeholder="brgy">
                        
                        
                        <hr />
                        <h4>Coordinates</h4>
                        <label>lat</label>
                        <input type="text" class="titleTxt titlelat lat" id="lat"  value="<?php echo $result[0]->lat ?>" name="lat" placeholder="lat">
                        <label>long</label>
                        <input type="text" class="titleTxt titlelong long" id="long"  value="<?php echo $result[0]->long ?>" name="long" placeholder="long">
                        <hr />
                        <h4>Description</h4>
                        <textarea  class="textarea txtdesc"></textarea>
                    </div><!-- /  leftpane -->
                    
                    <div class="pull-right rightpane">
                        <h4>Upload Image</h4>
                        <div class="fileupload" data-provides="fileupload">
                        
                          <div>
                            <span class="btn btn-file"><span class="fileupload-new" style="width:150px;">Select image</span></span>
                           
                          </div>
                            
                            <ul id="files" >
                                
                            </ul>

                            <hr />
                            
                            
                            <h4>Map View</h4>
                            <div id="map-canvas" style=" height:300px"></div>
                       
                        </div>
                    </div> <!-- /rightpane-->
            </div><!--edit-container-->
            
          <div class="btn-group pull-right">  <button type="submit" class="btn btn-primary dropdown-toggle  btn-upateMerchant" ><i class="icon-pencil"></i> Update Details</button> </div>
          
        </div><!-- /widget-content -->
  		</form>
    </div><!-- /span12-->
  
  </div><!--end row-->