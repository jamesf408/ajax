<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AJAX - Basic 2</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#get_weather').submit(function(){
				$.get($(this).attr('action')+"?callback=?",
					$(this).serialize(),
					function(anyname){
						$('.weather').html(	'<h2>Weather for: '+anyname.data.nearest_area[0].areaName[0].value+'</h2>'+
											'<img src="'+anyname.data.current_condition[0].weatherIconUrl[0].value+'">'+
											'<p>Current Temp F: '+anyname.data.current_condition[0].temp_F+' degrees</p>'+
											'<p>Current Temp C: '+anyname.data.current_condition[0].temp_C+' degrees</p>'+
											'<p>Current Wind Speed: '+anyname.data.weather[0].windspeedMiles+'</p>'+
											'<p>Weather Description: '+anyname.data.weather[0].weatherDesc[0].value+'</p>'

							);
						// console.log(anyname.data.current_condition[0].weatherIconUrl[0].value);
					},
					"json"
					);
				
			return false;
			});
		});
	</script>
	<style>
		.weather {
			width: 300px;
		}
		.weather img {
			float: right;
		}
	</style>
</head>
<body>
	<h1>The Coding Dojo Weather Report</h1>
	<form id="get_weather" action="http://api.worldweatheronline.com/free/v1/weather.ashx" method="get">
		<select name="q" id="city">
			<option value="Detroit">Detroit</option>
			<option value="Mountain View, CA">Mountain View</option>
			<option value="Seattle">Seattle</option>
			<option value="Los Angeles">Los Angeles</option>
			<input type="hidden" name="format" value="json">
			<input type="hidden" name="date" value="today">
			<input type="hidden" name="cc" value="yes">
			<input type="hidden" name="includelocation" value="yes">
			<input type="hidden" name="key" value="ckdmj62bhfae37dnhfazue9z">
			<input type="submit" value="Get Weather!">
		</select>
	</form>
	<div class="weather"></div>
</body>
</html>