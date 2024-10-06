

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Oswald&display=swap" rel="stylesheet">

    <title>Secure Download File</title>

    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL?>assets/css/main.css">
    
</head>
<body style="background:#4A425D;">
    
    <div class="container" style="min-height: 580px;padding: 50px 0px;">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">File is ready for download...</div>
                    <div class="panel-body">
                        <div class="downbox" style="padding:35px;">
                            <form method="POST" action="">
                                <div class="form-group text-center">
                                    <label>Copy link and paste into new tab to start download</label>
                                    <input type="text" class="form-control" id="txtfile" value="<?php echo $file->url ?>" style="font-size:18px;background: #D6DCE2;width: 90%;margin: 0 auto" />
                                </div>
                            </form>
                            <div class="text-center">
                                <div class="form-group">
                                    <button type="button" class="btn btn_theme" onclick="copyLink()" style="font-size: 26px;" ><i class="fa fa-copy"></i> Copy Download Link</button>
                                    <p class="text-center hidden" id="showclass" style="margin: 10px 0px; ">Link Copied, Open in New Tab</p>
                                </div>
                                <p style="color: rgb(144 62 189);font-size: 30px;">File Password is : <?php echo $file->file_password ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
     <script>
        function copyLink() {
            var copyLink = document.getElementById("txtfile");
            copyLink.select();
            document.execCommand("copy");
            var alert = document.getElementById("showclass");
            alert.classList.remove("hidden");
            
        }
     </script>
</body>
</html>

