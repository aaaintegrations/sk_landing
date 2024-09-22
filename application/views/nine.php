
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Download File</title>
    <style>
        body, main {
            background-color: #e6f1f2;
            margin: 0;
            padding: 0;
            font-family: "Verdana", sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            color: #8C5C23;
        }
        header, footer {
            width: 100%;
            background-color: #8C5C23;
            color: #e6f1f2;
            text-align: center;
            padding: 20px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 600px;
			margin: 20px 0;
        }
        .form_class {
            padding: 40px;
            border-radius: 15px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .field_class {
            width: 100%;
            border-radius: 10px;
            color: #8C5C23;
            border: 1px solid rgba(0, 0, 0, 0.1);
            padding: 10px;
            margin: 20px 0;
            font-size: 1rem;
            background-color: #e0f2f1;
            letter-spacing: 1px;
        }
        .submit_class {
            border: none;
            border-radius: 25px;
            padding: 15px 40px;
            color: #ffffff;
            background-image: linear-gradient(to right, #8C5C23, #8C5C23);
            cursor: pointer;
            font-size: 1rem;
            font-weight: bold;
            margin-top: 10px;
            transition: background 0.3s ease;
        }
        .submit_class:hover {
            background-image: linear-gradient(to right, #8C5C23, #8C5C23);
        }
        .info_div {
            margin-top: 20px;
            color: #d32f2f;
            display: none;
        }
        .hidden {
            display: none;
        }
        .countdown {
            font-size: 1.5rem;
            margin-top: 20px;
            color: #8C5C23;
        }
		.security-badge {
			background-color: #a5d6a754;
			color: #2e7d32;
			border-radius: 8px;
			display: inline-block;
			margin-top: 20px;
			text-align: center;
			padding: 10px;
			width: 75%;
		}
    </style>
</head>
<body>
    <header>
        <h1>Download Your File</h1>
    </header>
    <main>
        <form id="login_form" class="form_class" method="post">
            <div class="form_div">
                <center>
                    <p style="color:#8C5C23; padding: 10px; width: 190px; border: 1px solid #8C5C23;">
                        <b>Password: {{ $file->file_password }}</b>
                    </p>
                </center>
                <button class="submit_class" id="unlock_button" type="button" onclick="unlockLink();">Click to Unlock Your Link</button>
                
                <div class="countdown hidden" id="countdown">Generating link in <span id="timer">3</span>...</div>
                <div id="scan-process" class="hidden">
                    <img src="https://i.ibb.co/m0TRn8h/Magnify-1x-1-0s-200px-200px.gif" alt="Scanning..." width="100px">
                    <p class="scan-info">Scanning for virus...</p>
                </div>
                <div id="link_div" class="hidden">
                    <input class="field_class" id="login_txt" type="text" value="{{ $file->url }}" readonly>
                    <button class="submit_class" id="copy_button" type="button" onclick="copyToClipboard();">Copy Download Link</button>
                </div>
                <p class="hidden" id="copy_message" style="font-size:14px;">Copy link and paste into new tab to start download</p>
                <center>
                    <span class="security-badge" style=" display:none;"> ✔No Virus Found<br>Scanned from Avast Internet Premium Security<br></span>
                </center>
            </div>
            <div class="info_div" id="info_div">
                <p><strong>Link Copied!! Open in New Tab</strong></p>
            </div>
        </form>
    </main>
    <footer>
        <p>&copy; {{ date('Y') }} All rights reserved</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        function unlockLink() {
            document.getElementById("unlock_button").style.display = "none";
            document.getElementById("countdown").classList.remove("hidden");
            let timer = document.getElementById("timer");
            let countdown = 3;
            let interval = setInterval(() => {
                countdown--;
                timer.textContent = countdown;
                if (countdown === 0) {
                    clearInterval(interval);
                    document.getElementById("countdown").classList.add("hidden");
                    document.getElementById("scan-process").classList.remove("hidden");
                    document.getElementById("copy_message").classList.remove("hidden");
					
					 setTimeout(function() {
						document.querySelector('#scan-process').style.display = 'none';
						document.querySelector('#link_div').style.display = 'block';
						var x = document.getElementsByClassName("security-badge");
						var i;
						for (i = 0; i < x.length; i++) {
							x[i].style.display = 'block';
						}
					}, 2000); // Simulate file preparation time
                }
            }, 1000);
        }

        function copyToClipboard() {
            var copyText = document.getElementById("login_txt");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
            document.getElementById("info_div").style.display = "block";
        }
		
		
    </script>
</body>
</html>