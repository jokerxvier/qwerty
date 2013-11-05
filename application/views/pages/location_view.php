
<?php $this->load->view('modal/location_view_modal');?>    
<?php $this->load->view('modal/map_view_modal');?>    
<div class="btn-group merchant-error">
	<?php echo $this->session->flashdata('message');  ?>
</div>
<form action="<?php echo base_url() ?>location/process" method="get" class="form-horizontal form-merchant-list" accept-charset="utf-8">

		<div class="row show-grid">
				<div class="span6 pull-left" data-original-title="" title="">
                  <h3 class="merchant-head">Location</h3> 
                </div>
                <div class="span3 pull-right control-top" data-original-title="" title="">
               	 <span class="btn-group pull-left">
                     <button class="btn btn-primary dropdown-toggle viewMapBtn" type="button"> <i class="icon-map-marker"></i> View on Map</button>

                  </span>
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
					<th> Title </th>
					<th> Coordinates  </th>
					<th> Category </th>
					<th>  Icon</th>
					<th class="td-actions"> </th>
				  </tr>
				</thead>
				<tbody>
                
					<?php 

                     if (isset($resultCount ) && $resultCount > 0):
					 	foreach($results as $data){
							$icon = ($data->icon != '') ?  '<img src="'.base_url().'/assets/'. $data->icon.'" />' : "No Icon" ; 
                    ?>

						  <tr>
							 <td style="text-align:center"><input name="item[]" type="checkbox" value="<?php echo $data->id ?>" /></td>
							<td><?php echo $data->Title ?></td>
							<td><?php echo $data->lat ?> , <?php echo $data->long ?></td>
							<td><?php echo ucfirst($data->cat_name) ?></td>
							<td align="center"><?php echo $icon ?></td>
							 <td class="td-actions" align="center" width="95px">
						
							 <a href="<?php echo base_url().'location/addlocation/'. $data->id ?>" class="btn btn-info edit-btn" > <i class="icon-pencil"></i> Update</a>
					
							 </td>
						  </tr>
			 		 <?php } else: ?>
					   <tr>  
                       	<td colspan="7"> No Data</td>
                       </tr>
					 
					 <?php endif; ?>
				
				</tbody>
			  </table>
              
              <?php  echo $links; ?> 

  </form>    











