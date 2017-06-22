<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Gibson: Your Gibson Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <link href="/Site/ReferLib/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/Site/LocalLib/css/home.css" rel="stylesheet">
    <link href="/Site/ReferLib/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6/html5shiv.min.js"></script>
    <![endif]-->
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="/Site/Images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="/Site/Images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/Site/Images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/Site/Images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="/Site/Images/ico/favicon.png">
    <script src="/Site/ReferLib/ScriptLibrary/jquery-latest.pack.js"></script>
    <script type="text/javascript" src="/Site/ReferLib/bootstrap/js/bootstrap.js"></script>

</head>

<body>



<div class="container-narrow">
<div class="masthead">
    <?php



    require_once("mainmenu.php");
    require_once("Control/UserAccount.php");



    //$SELF_BASE=basename($_SERVER['PHP_SELF'], ".php").PHP_EOL;
    ?>
    <hr>
</div>
    <!--change password modal-->
    <div id="changepass" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">
                Change password
            </h3>
        </div>
        <div class="modal-body">
            <p>


            <form class="form-signin" action="<?php echo $SELF_BASE ?>" method="post">
                <input type="password" class="input-block-level" placeholder="currentPassword" name="oldpass">
                <input type="password" class="input-block-level" placeholder="newPassword" name="newpass">
                <input type="password" class="input-block-level" placeholder="confirm password" name="confirmpass">
                <input type="submit" class="btn btn-primary " value="Save">
                <button class="btn  " data-dismiss="modal" aria-hidden="true">Cancel</button>

            </form>
            <p id="tip_changepass"></p>
            </p>
        </div>

    </div>


    <?php


    //if the register event has happend
    if (isset($passresult)) {
//check whether the result is true
        if ($passresult) {
            ?>
            <script type="text/javascript">
                $('#changepass').modal('hide');

            </script>
        <?php

        }else{

        ?>
            <script type="text/javascript">
                $('#changepass').modal('show');
                document.getElementById('tip_changepass').innerHTML = "<?php echo $respMs ?>";
            </script>


        <?php

        }

    }
    ?>



    <!--manage account-->
    <div class="container-fluid" style="padding-left:120px;">
        <h2>Manage Your Account</h2>

        <div class="row-fluid">
            <p class="muted">E-mail. password, name etc.</p>
		    <br>
            <p>

            <form class="form_account" action="<?php echo $SELF_BASE ?>" method="post">
                <label for="password">Password: </label>
                <button class="btn" id="password" href="#changepass" data-toggle="modal">Change</button>
				<br><br>
                <label for="name">Name: </label>
                <input type="text" id="name" placeholder="name" name="name">
				<br>               
                <input type="submit" class="btn btn-primary " value="Save">
            </form>


            </p>
        </div>
    </div>
<hr>
    <!--footer-->
    <div class="footer">
        <p>Made by Gibson 2015</p>
    </div>

</div>
<!-- /container -->
<?php

if($refresh){

?>
<script>
location.reload();
</script>
<?php } ?>

</body>
</html>
