<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Basic 1 - Post it</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#posts').submit(function(){
				$.post($(this).attr('action'),
					   $(this).serialize(),
					   function(data){
					   		$('#results').html(data.contents);
					   	},
					   "json"
					);
				$('textarea').val('');
				$('textarea').focus();
				return false;
			});
		});
	</script>
	<style>
		.form_post {
			width: 100%;
			position: absolute;
			top: 0;
			left: 0;
			background-color: #cccccc;
		}
		form {
			width: 400px;
			margin: 0;
			padding: 5px;
			background-color: #cccccc;
		}
		input[type=submit], textarea {
			float: left;
			font-size: 10pt;
			margin-bottom: 10px;
		}
		input[type=submit] {
			border: 1px solid #efefef;
			margin-top: 5px;
			margin-left: 10px;
			height: 35px;
		}
		#results {
			padding-top: 55px;
		}
		#results div {
			font-family: monospace;
			font-size: 15px;
			float: left;
			width: 200px;
			height: 200px;
			overflow: scroll;
			margin: 10px;
			padding: 15px;
			background: -webkit-linear-gradient(lightyellow, yellow);
		}
	</style>
</head>
<body>
	<div class="form_post">
		<form id="posts" action="process.php" method="post">
			<textarea name="message" id="message" cols="30" rows="2"></textarea>
			<input type="submit" value="Post It!">
		</form>
	</div>
	<div id="results"><div>
</body>
</html>