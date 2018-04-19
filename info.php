
<script>
jQuery(function(){
	var URLactual = jQuery(location).attr('href');
	console.log(URLactual);
	var datosInfo = new FormData();
	var ipInfo = "";
			var getIp = $.ajax({
			type: "GET",
			url: "https://api.ipify.org/?format=json",
			dataType: "json",
			success: function(data) {
					console.log(data);
					ipInfo = data.ip;
				}
			});
	getIp.then(function(){
		datosInfo.append("ip", ipInfo);
		datosInfo.append("enlace", URLactual);
		$.ajax({
			type: "POST",
			url: "http://www.apps-fa.com/proyects/database/getInfo.php",
			data: datosInfo,
			contentType: false,
			processData: false,
			dataType: "json",
			success: function(data) {
					console.log(data);
				}
		});
	});
});
</script>