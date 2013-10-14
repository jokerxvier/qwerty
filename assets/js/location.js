var locationJS = (function (parent, $) {
			
		   var Location = parent;
 
			var addBtn =  $('.btn-addMerchant');
			var latBtn =  $('.genLat');
			var location = $('#location');
			var house = $('#House');
			var street = $('#street');
			var brgy = $('#brgy');
			var postal = $('#postal');
			var mapView = $('.map-view');
			var lat = $('#lat');
			var lng = $('#long');
			
			var flag = false;
			

			Location.addLocation = function (url){
				$('.location-page-two').hide();
				$('.btn-map').hide();

				addBtn.on('click',function (){
						
							var action = "insert";						   
							$('#myModal').modal('show');
							mapView.hide();
						
							
							$('.form-merchant-modal').validate({
								rules: {
									location: "required",
									category: "required",
									
								
								},
								
								submitHandler: function(form) {
									_nextPage(url);	
								}
							});

							// e.preventDefault();	
								
					
				});
				
				
				

			}
			

			_nextPage = Location._nextPage = Location._nextPage || function (url){
				var address = house.val() + ',' + street.val() + ',' +  brgy.val() + ', ' + 'Quezon City' + ', Pilipinas'; 	
			
				$.ajax({
					  url: "http://maps.googleapis.com/maps/api/geocode/json",
					  dataType: 'json',
					  data: {'address': address,'sensor':false},
					  success: function (data) {
						  
						  if (data.status === "OK" && data.results.length > 0) {
							  
							  	$('.location-page-two').show();
								$('.location-page-one').hide();		
								$('.btn-map').show();
								$('.btn-merchant').hide();
								
								var ajaxUrl = url + 'location/process';
								var params = {
										'action': 'icon',
										'cat_id' : $('.category').val(),
								}
								var icon = _ajaxData(ajaxUrl, params);
								
								
								var coordLat = data.results[0].geometry.location.lat;	
								var coordLng = data.results[0].geometry.location.lng;
								lat.val(coordLat);
								lng.val(coordLng);
								_googleMap(coordLat, coordLng, url, icon);
								$('.btn-merchant').html('Insert');
								$('.btn-merchant').addClass('btn-add');
								
								$('.btn-map').on('click', function (){	
									$(this).removeClass('btn-merchant');
									$(this).removeClass('btn-addMerchant');
															  
									_insertData(coordLat, coordLng, url);
									
								
									
								});
								
									
									

													
						  }else {
							  console.log('failed');
						  }
						  
						  
					  }, //end success
					  
					  beforeSend: function( jn ) {
							  $('.loader').addClass('preloader');
							  //_seal();
					  }
				});
			}
			
			
			
			_ajaxData = Location._ajaxData= Location._ajaxData || function (ajaxUrl, params){
					var data;
					$.ajax({
					  url: ajaxUrl,
					  async: false, 
					  dataType: 'json',
					  data: params,
					  success: function (result) {
						 if(result.success === 1 && result.icon.length > 0){
							$('.loader').removeClass('preloader');
							data = result.icon[0];							 
						 }

						  
					  } //end success
					  
					
				});
				
				
				return data;
				
				
			}
			
			_insertData = Location._insertData = Location._insertData || function (lat, lng, url){
				
				
				$.ajax({
					  url: url + 'location/process',
					  dataType: 'json',
					  data: {
						  'action': 'add',
						  'loc_name' : _encodeUrl(location.val()),
						  'house' : _encodeUrl(house.val()),
						  'street' :_encodeUrl(street.val()),
						  'brgy' : _encodeUrl(brgy.val()),
						  'postal' : _encodeUrl(postal.val()),
						  'cat' : _encodeUrl($('.category').val()),
						  'lat' : _encodeUrl(lat),
						  'lng' : _encodeUrl(lng)

					  },
					  success: function (data) {
						  if (data.success == 1){

									
									$('#message').html('<p class="alert alert-warning">You have successfuly Added new merchant</p>');
									 setTimeout(function () {
										$('#myModal').modal('hide');	
										$('#myModal').data('modal', null);	
										 window.location.reload(true);
									}, 1000);
							
								  console.log(data.success);
						  }
						  
						
						  
					  }
				});
				
			
				 
			}
			
			
			_encodeUrl = Location._encodeUrl = Location._encodeUrl || function (data){
				return encodeURIComponent(data);
			}
			
			_googleMap = Location._googleMap = Location._googleMap || function (lat,lng, url, icon){
				
			
				var myLatlng = new google.maps.LatLng(lat,lng);
			    var mapOptions = {
					zoom: 18,
					center: myLatlng,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				  }
				 
				 var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
				 var google_image = url + 'assets/' +icon;

				  var marker = new google.maps.Marker({
					  position: myLatlng,
					  map: map,
					  icon: google_image
				  });
				  
				  var infowindow = new google.maps.InfoWindow();
				  
				  google.maps.event.addListener(marker, 'click', (function(marker) {
					return function() {

					  infowindow.open(map, marker);
					}
     			 })(marker));
			}
			
		  return parent; 
			
		
}(locationJS|| {}, jQuery));

