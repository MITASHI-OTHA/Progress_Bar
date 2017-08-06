<html>
	<head>
		<title>Smart Loader</title>
		<script src="jquery.js"></script>
		<style>
			#load{
				width: 500;
				background: #000;
				margin-top: 1em;
				height: 5px;
			}
			#load div{
				width: 0;
				background:#2196F3;
				height: 5px;
			}
		</style>
	</head>
	<body>
		<form action="" >
			<label for="photo">Photo<input id="photo" type="file" name="photo" style="display: "> </label>
			<div id="load"> <div id="up"></div> </div>
		</form>
		<script>
		$(document).ready(function(){
				$("input[id='photo']").on("change",function(){
				$form=$("form");
				var formdata = (window.FormData) ? new FormData($form[0]):null;
				var data = (formdata !== null) ? formdata : $form.serialize();
				$.ajax({
				url: 'uploads.php',
				type: "POST",
				contentType: false, // obligatoire pour de l'upload
				processData: false, // obligatoire pour de l'upload
				data: data,
				xhr: function () {
					var xhr = $.ajaxSettings.xhr();
					xhr.upload.onprogress = function (e) {
						console.log(e)
						var percent= Math.round(e.loaded*100/e.total); //pourcentage
						var bar= percent*500/100;
						//var bar= percent*2;
						console.log(percent)
						$("#up").css("width",bar)
						//console.log(e.total)
						//var loaded = Math.round((e.loaded / e.total) * 100);

					//console.log(e.loaded / e.total);
					};
					return xhr;
					}
				}).done(function (e) {


				}).fail(function (e) {
					console.log(e)
				console.log("echec !")
				});
				})
		} )
		
			
		</script>
	</body>
</html>