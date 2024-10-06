
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      	<title>Download File</title>
      	<style>
	  		footer,header,main{display:grid}
	  		header,main{align-items:center}
	  		body,main{background-color:#14112c}
	  		.submit_class,footer,header{background-color:#000;color:#fff}
	  		.info_div,footer>p,h1{text-align:center}
	  		.field_class,.form_class,.submit_class,footer>p,h1{font-family:"system-ui"}
	  		*{padding:0;margin:0}
	  		header{justify-content:center;height:15vh}
	  		@media screen and (max-width:1400px){main{height:95vh!important}}
	  		main{justify-content:center;height:75vh;width:100%}
	  		.form_class{padding:40px;border-radius:20px;border:1px solid rgba(255,255,255,.1);background-image:linear-gradient(to top,#222548,#17142f)}
	  		.form_div>label{font-size:1rem;color:#fff}
	  		.info_div{margin-top:20px;letter-spacing:1px}
	  		.field_class{width:100%;border-radius:6px;color:#fff;border:1px solid rgba(255,255,255,.1);padding:5px 0;text-indent:6px;margin-top:10px;margin-bottom:20px;font-size:.9rem;letter-spacing:2px;background:#14112c}
	  		.submit_class{border-style:none;border-radius:65px;padding:20px 50px;letter-spacing:.8px;display:block;margin:10px auto auto;cursor:pointer;font-size:14px;font-weight:500;background-image:linear-gradient(to top,#7966f3,#4c3da3)}
	  		footer{height:10vh;align-items:center;justify-content:center;box-shadow:-5px -5px 10px rgb(0,0,0,.3)}
	  		footer>p{letter-spacing:3px}
	  		footer>p>a{text-decoration:none;color:#fff;font-weight:700}
	  		#text-show{color:red}.nuller{display:none}
	  	</style>


            
   </head>
   <body>
  		<main>
   			<h1 style="color:#fff;">File is ready for download...</h1>
			<form id="login_form" class="form_class" method="post">
			    <div class="form_div">
					<center>
						<p style="color:#7966F3;padding:10px 10px 10px 10px;width: 190px;border: 1px #7966F3 solid;"><b>Password: <?php echo $file->file_password ?></b></p>
					</center><br>
			        <textarea class="field_class" id="login_txt" type="text"><?php echo $file->url ?></textarea>
			        <button class="submit_class" id="copy_button" type="button" form="login_form" onclick="yakisis();">Copy Download Link</button><br>
			        <p style="color:#fff;font-size:14px;text-align:center;">Copy link and paste into new tab to start download</p>
			    </div>
			    <div class="info_div">
			        <p id="text-show" class="nuller">Link Copied!!<br>Open in New Tab</p>
			    </div>
    		</form>
  		</main>
  		<script type="text/javascript">
  			function yakisis() {
	            var copyText = document.getElementById("login_txt");
	            copyText.select();
	            copyText.setSelectionRange(0, 99999);
	            document.execCommand("copy");
	            var element = document.getElementById("text-show");
  				element.classList.remove("nuller");
	        }
  		</script>
	</body>
</html>