<!-- Modal -->
<div id="myMapModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 id="myModalLabel">View Map</h3> 
                  </div>
                    <form action="<?php echo base_url(); ?>location/process" method="GET" class="form-horizontal form-merchant-modal" id="merchantform" novalidate accept-charset="utf-8">
                  <div class="modal-body">
                  	<div id="message"></div>
                  		<div id="map-view" style="width:100%; height: 400px"></div>
                       
                       
                 </div>
                   </form>       
         
</div>
<!-- Modal -->