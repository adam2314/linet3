<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=9" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <meta name="author" content="Super User" />
        <title><?php print $title; ?></title>
        <script type="text/javascript" src='../assets/lib/jquery.min.js'></script>
        <script type="text/javascript" src='../assets/lib/bootstrap/js/bootstrap.min.js'></script>

        <link rel="stylesheet" href="../assets/lib/bootstrap/css/bootstrap.min.css" type="text/css" /> 

        <link rel="stylesheet" href="../assets/css/main.css" type="text/css" />
        <link rel="stylesheet" href="../assets/css/linet.css" type="text/css" />



        <script type="text/javascript">
            function loadDoc(step) {
                $('#main').html("Loading...");
                $.post("?", {"step": step, "non": true}, function(data) {
                    $('#main').html(data);
                });
            }
        </script>
    </head>
    <body class="login" onload="loadDoc(1)" dir="rtl">

        <br /><br /><br /><br />
        <div class='col-lg-6'>
            <div class="box dark">
                <header>
                    <div class="icons">
                        <i class="none"></i>
                    </div>
                    <h5>Update</h5>
                    <div class="toolbar">
                        <nav style="padding: 8px;">



                        </nav>
                    </div>

                </header>
                <div style="height: 400px;" id="main" class="body">
                    Loading...	
                </div>
            </div>





        </div>
    </body>
</html>