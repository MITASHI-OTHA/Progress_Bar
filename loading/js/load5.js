$(function(){
			$("#maform").on("change",function(){
				let form = $("form")
				let trans = (window.FormData) ? new FormData(form[0]): null;
				var data = (trans !== null) ? trans: form.serialize()
				$.ajax({
					type:"POST",
					url:"upload.php",
					processData: false,
					contentType: false,
					data: data,
					xhr: function(){
						let xhr = $.ajaxSettings.xhr()
						console.log(xhr)
						xhr.upload.onprogress = function(ev){
							console.log(ev)
							var loading = Math.round(ev.loaded*100/ev.total)
							$("#p").html("<b>"+ loading + "% Téléchargé </b>")
							loading = loading*400/100
							$("#load").css("width", loading)
						}
						return xhr
					}

				}).done(function(){
					//alert("ok")
				}).fail(function(){
						alert("erreur")
				})
			})
		})