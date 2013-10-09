<?php 
	$nav = array();
	$nav = array(
		array('title' => 'Dashborad', 'icon' => 'icon-dashboard', 'page' => 'dashboard'),
		array('title' => 'Merchant', 'icon' => 'icon-facetime-video', 'page' => 'merchant'),
		array('title' => 'Promotion', 'icon' => 'icon-bar-chart', 'page' => 'promotion'),
		array('title' => 'Reports', 'icon' => 'icon-list-alt', 'page' => 'reports')
	);

?>
<div class="subnavbar">
	<div class="subnavbar-inner">
		<div class="container">
			<ul class="mainnav">
            	<?php 
				 foreach ($nav as $key => $val):
				?>
				<li <?php echo ($this->uri->uri_string() == $val['page']) ?  'class="active"' : '' ?>>
					<a href="<?php echo base_url().$val['page'] ?>"><i class="<?php echo $val['icon'] ?>"></i><span><?php echo $val['title']; ?></span> </a>
				</li>
                
               <?php endforeach; ?> 
				
			
			</ul>
		</div>
		<!-- /container --> 
	</div>
	<!-- /subnavbar-inner --> 
</div>