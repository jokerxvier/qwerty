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
						$('.btn-merchant').on('click', function (e){
							

							if ($('.form-merchant').valid()){
									_nextPage(url);	
								
							}
					
						
							 e.preventDefault();	
								
						});	
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
								
								 $('.loader').removeClass('preloader');	
								var coordLat = data.results[0].geometry.location.lat;	
								var coordLng = data.results[0].geometry.location.lng;
								lat.val(coordLat);
								lng.val(coordLng);
								_googleMap(coordLat, coordLng);
								$('.loader').removeClass('preloader');
								
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
			
			
			_insertData = Location._insertData = Location._insertData || function (lat, lng, url){
				
				
				$.ajax({
					  url: url + 'location/process',
					  dataType: 'json',
					  data: {
						  'action': 'add',
						  'loc_name' : location.val(),
						  'house' : house.val(),
						  'street' : street.val(),
						  'brgy' : brgy.val(),
						  'postal' : postal.val(),
						  'lat' : lat,
						  'lng' : lng

					  },
					  success: function (data) {
						  console.log(data);
						  
					  }
				});
				
			
				 
			}
			
			_googleMap = Location._googleMap = Location._googleMap || function (lat,lng){
				var myLatlng = new google.maps.LatLng(lat,lng);
			    var mapOptions = {
					zoom: 18,
					center: myLatlng,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				  }
				 
				 var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
				  
				  var marker = new google.maps.Marker({
					  position: myLatlng,
					  map: map
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

