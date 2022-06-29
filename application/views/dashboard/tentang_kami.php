<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Tentang Kami
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Tentang Kami</li>
		</ol>
	</section>
	<section class="content">
    	<div class="row">
			<div class="col-xs-12">
				<div class="box">
				<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB0N3VgygzHZVvX3vp0WAXHsdV9xHtxUvs"></script>
				<script>
				function initialize() {
					var propertiPeta = {
						center:new google.maps.LatLng(-8.087467,112.296663),
						zoom:15,
						mapTypeId:google.maps.MapTypeId.ROADMAP
					};
					
					var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
					
					// membuat Marker
					var marker=new google.maps.Marker({
							position: new google.maps.LatLng(-8.087467,112.296663),
							map: peta
					});

				}

				// event jendela di-load  
				google.maps.event.addDomListener(window, 'load', initialize);
				</script>
  			<div id="googleMap" style="width:100%;height:380px;"></div>
  
				</div>
			</div>
		</div>
	</section>
</div>
