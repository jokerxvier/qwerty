
<?php $this->load->view('modal/location_view_modal');?>    

<form action="<?php echo base_url() ?>merchant/process" method="get" class="form-horizontal form-merchant-list" accept-charset="utf-8">

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
					<th> Title </th>
					<th> Short Desc </th>
					<th> Coordinates  </th>
					<th> Icon </th>
					<th> Category </th>
					<th class="td-actions"> </th>
				  </tr>
				</thead>
				<tbody>

						  <tr>
							 <td style="text-align:center"></td>
							<td></td>
							<td> </td>
							<td></td>
							<td></td>
							<td></td>
							 <td class="td-actions" align="center" width="95px">
						
							 <button class="btn btn-info edit-btn" data-toggle="dropdown"> <i class="icon-pencil"></i> Update</button>
							 <input type="hidden" name="user_id" value="" class="userTxt"  />
							 </td>
						  </tr>

				
				</tbody>
			  </table>

  </form>    











