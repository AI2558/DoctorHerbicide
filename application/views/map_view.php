<style>
	.box9 {
		margin: 40px auto;
		width: 820px;
		min-height: 310px;
		padding: 10px;
		position: relative;
		border: 1px solid rgba(0,0,0,0.1);
		border-radius: 20px;
		background: white;
		-webkit-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
	}

	.box9:before {
		content: '';
		width: 110%;
		left: 0;
		height: 111%;
		z-index: -1;
		position: absolute;
		border-radius: 20px;
		border: 1px solid rgba(0,0,0, 0.1);
		background: rgba(0, 0, 0, 0.0);
		-webkit-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
		-webkit-transform: translate(-5%,-5%);
	}

	.box9:after {
		content: '';
		position: absolute;
		top: -55px;
		left: 30%;
		width: 130px;
		height: 40px;
		background: -webkit-gradient(linear, 555% 20%, 0% 92%, from(rgba(0, 0, 0, 0.1)), to(rgba(0, 0, 0, 0.0)), color-stop(.1,rgba(0, 0, 0, 0.2)));
		border-left: 1px dashed rgba(0, 0, 0, 0.1);
		border-right: 1px dashed rgba(0, 0, 0, 0.1);
		-webkit-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.2);
	}

	.box9 img {
		width: 100%;
		margin-top: 15px;
	}
</style>
<script>
	function initialize() {
		var mapProp = {
			center : new google.maps.LatLng(51.508742, -0.120850),
			zoom : 5,
			mapTypeId : google.maps.MapTypeId.ROADMAP
		};
		var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
	}


	google.maps.event.addDomListener(window, 'load', initialize); 
</script>
<div class="box9">
	<div align="center">
		<div id="googleMap" style="width:800px;height:608px;"></div>
	</div>
</div>

