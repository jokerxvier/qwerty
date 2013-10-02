
<?php $this->load->view('includes/subnavbar');?>

<div class="main">
  <div class="main-inner">
    <div class="container">

        <a href="<?php echo base_url(); ?>/merchant/add">Add New Data</a>

      	 <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Merchant Name </th>
                    <th> Address </th>
                    <th> Contact Number   </th>
                    <th> Contact Person </th>
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td> Current Promo </td>
                    <td> http://www.egrappler.com/ </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                     <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
                <?php  echo $links; ?> 
                  
                
                </tbody>
              </table>
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>










