$(function(){
			$("input[id='img']").on("change",function(){
				$form = $("form");
				var formdata= (window.FormData) ? new FormData($form[0]):null;
				var data = (formdata !== null) ? formdata: $form.serialize()
				$.ajax({
					type:"POST",
					url:"upload.php",
					contentType: false,
					processData: false,
					data:data,
					xhr: function(){
						 var xhr = $.ajaxSettings.xhr()
						 xhr.upload.onprogress = function(e){
						 	var progress = Math.round(e.loaded*100/e.total)
						 	var bar1 = new ldBar("#myItem1");
  							var bar2 = document.getElementById('myItem1').ldBar;
  							bar1.set(progress);
						 }
						return xhr;
					}

				}).done(function(e,sts,xhr){

				}).fail(function(e,sts,xhr){
					alert("erreur")
				})

			})
		})