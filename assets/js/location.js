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
			
			
			
			
			
			
			
			Location.viewMap = function (url){
				$('.viewMapBtn').on('click', function (){
						$('#myMapModal').modal('show');
						
						var params = {
							'action': 'searchmap',
						}
						
						var ajaxUrl = url + 'location/process'
						var result = _ajaxResult(ajaxUrl, params);
						_googleMapViewAll(result, url);
						
						
				});
				
				
				
			}
			
			Location.deletePic = function (url, filename){
				$('.success img.btn-delete').on('click', function (){
					var params = {
						  'action' : 'delete_pic',
						  'filename' : filename
					}
					
					
					var ajaxUrl = url + 'location/process';
					var result = _ajaxResult(ajaxUrl, params);
					
					if(result.success === 1){
							var del = $(this).parent();
							del.fadeOut('slow', function() { del.remove(); });
					}
					
				});
				
				
				
			}
			
			Location.uploadFile = function (url){
				
				var btnUpload=$('.fileupload-new');
					var status=$('#status');
					new AjaxUpload(btnUpload, {
						action: url + 'location/process?action=uploadpic',
						name: 'uploadfile',
						onSubmit: function(file, ext){
							 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
								// extension is not allowed 
								status.text('Only JPG, PNG or GIF files are allowed');
								return false;
							}
							status.text('Uploading...');
						},
						onComplete: function(file, response){
							//On completion clear the status
							status.text('');
							
							//Add uploaded file to list
							if(response==="success"){
									//$('<li></li>').appendTo('#files').html('<img class="btn-delete" src="http://cdn1.iconfinder.com/data/icons/diagona/icon/16/101.png"/><img src="'+url+'/uploads/'+file+'" alt="" /><br />').addClass('success');			
								$('<li></li>').appendTo('#files').html('<input type="text" value="'+url+'/uploads/'+file+'"  name="uploadimage[]"/><img src="'+url+'/uploads/'+file+'" alt="" style="width: 100px; height: 100px;" /><br />').addClass('success');			
								//Location.deletePic(url, file);
								
							} else{
								$('<li></li>').appendTo('#files').text(file).addClass('error');
							}
						}
					});
			}
			

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
			
			Location.displayMap = function (url){
				var lat = $('.lat').val();
				var long = $('.long').val();
				var icon = $('.icon').val();
				_googleMap(lat,long, url, icon)
				
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

						  
					  }, //end success
					  
					  beforeSend: function( jn ) {
							  $('.loader').addClass('preloader');
							  //_seal();
					  }
					  
					
				});
				
				
				return data;
				
				
			}
			
			_ajaxResult = Location._ajaxResult= Location._ajaxResult || function (ajaxUrl, params){
					var data;
					$.ajax({
					  url: ajaxUrl,
					  async: false, 
					  dataType: 'json',
					  data: params,
					  success: function (result) {
					
						data = result;
						  
					  }, //end success

					
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
						  'lat' : _encodeUrl($('#lat').val()),
						  'lng' : _encodeUrl($('#long').val())

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
				 var google_image = false;
				 if (icon) {
					 google_image = url + 'assets/' +icon;
				 }
				

				  var marker = new google.maps.Marker({
					  position: myLatlng,
					  map: map,
					  draggable:true,	
					  icon: google_image
				  });
				  
				  var infowindow = new google.maps.InfoWindow();
				  
				  google.maps.event.addListener(marker, 'dragend',  (function(marker) {
					return function() {

					  infowindow.open(map, marker);
					  var point = marker.getPosition();
				
					 document.getElementById('lat').value=point.lat();
					 document.getElementById('long').value=point.lng();
					}
     			 })(marker));
			}
			
			
			_googleMapViewAll = Location._googleMapViewAll = Location._googleMapViewAll || function (args, url){
	
					
			   
				 var latlng = new google.maps.LatLng(args[0].lat,args[0].long);
				 var myOptions = {
					center: latlng,
					mapTypeId: google.maps.MapTypeId.ROADMAP,
					mapTypeControl: false,
					
				};
				
				var map = new google.maps.Map(document.getElementById("map-view"),myOptions);
				var infowindow = new google.maps.InfoWindow(); 
				var marker, i;
				var bounds = new google.maps.LatLngBounds();
				$.each(args, function(i, item) {
						//item.lat
						//item.long
						
						var address = item.house_number+', '+item.street_number+ ', '+ item.barangay;
						var pos = new google.maps.LatLng(item.lat, item.long);
						var google_image = url + 'assets/' +item.icon;
						bounds.extend(pos);
						 marker = new google.maps.Marker({
							position: pos,
							map: map,
							icon: google_image
						});
						
						
						google.maps.event.addListener(marker, 'click', (function(marker) {
							return function() {
								 infowindow.setContent(item.Title);
               					 infowindow.open(map, marker);
							}
						})(marker));
						
					map.fitBounds(bounds);	
					var listener = google.maps.event.addListener(map, "idle", function () {
						var opt = { minZoom: 13, maxZoom: 20 };
						map.setOptions(opt);
						map.setCenter(latlng); 
						google.maps.event.removeListener(listener);
						google.maps.event.trigger(map, 'resize');

					});
					
			
				});

				
				
			}
			
		  return parent; 
			
		
}(locationJS|| {}, jQuery));

