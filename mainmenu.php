<?php
require_once('Model/User.php');
session_start();
//session_destroy();
require_once("Control/Login.php");

if (isset($THIS_URL)) {
    $SELF_BASE = $THIS_URL;
} else {
    $SELF_BASE = basename($_SERVER['PHP_SELF'], ".php") . PHP_EOL;

}

if (isset($_SESSION["user"])) {
    //  echo "user already exists" . var_dump($_SESSION["user"]);
    ?>

    <script type="text/javascript">
        $(function () {
            document.getElementById("menu1").style.display = "none";
            document.getElementById("menu2").style.display = "block";
        });
    </script>
<?php
} else {
    ?>
    <script type="text/javascript">
        $(function () {
            document.getElementById("menu2").style.display = "none";
            document.getElementById("menu1").style.display = "block";
        });
    </script>
<?php

}
?>




<!--Menu-->


        <ul class="nav nav-pills pull-right" style="
    padding-right: 20px;" id="menu1">
            <li><a href="#step1" data-toggle="modal"><i class="icon-star"></i> Create an account</a></li>
            <li><a href="#login" data-toggle="modal"><i class="icon-user"></i> Sign in</a></li>
        </ul>


        <ul  class="nav nav-pills pull-right" style="
    padding-right: 20px;" id="menu2">
            <li><a href="/schedule"><i class="icon-calendar"></i> Schedule an event</a></li>
            <li><a href="mypoll"><i class="icon-gift"></i> My polls</a></li>
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php if (isset($_SESSION["user"])) {
                        echo $_SESSION['user']->getName();
                    } else {
                        echo "GUEST";
                    }; ?></a>
                <ul class="dropdown-menu">

                    <li><a href="/account">Manage Account</a></li>
                    <li><a href="/Control/Logout.php">Sign out</a></li>
                    <li>
                        <a class="btn-danger" href="/Control/DeleteAccount.php">Delete Account</a>
                    </li>
                </ul>
            </li>
        </ul>
        <h3 class="active" style=“padding-top:5px;margin-top: 18.72px; margin-bottom: 18.72px;”><a href="index"><img src="/Site/Images/Gibson.png"></a></h3>






<?php
require_once("Control/Register.php");
?>

<!--Create an account----step1 modal--check email exist-->
<div id="step1" class="modal hide fade" tabindex="-1" aria-labelledby="myModalLabel1" role="dialog" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel1">Create Gibson Account</h3>
    </div>
    <div class="modal-body">
        <form action="<?php echo $SELF_BASE ?>" method="post">
            <input  style="height:auto" type="text" id="get_email" name="email" class="required email" placeholder="Email address">
            <input type="hidden" name="reg_state" value="modal1">
            <input class="btn btn-primary" type="submit" name="submit" value="Next">

            <p id="tip1"></p>
        </form>

    </div>
    <div class="modal-footer">
        Already have a Gibson account?<strong id="change2login" onclick="toggle('step1','login')"><u style="cursor:pointer;">Sign
                in</u></strong>
    </div>
</div>


<!--Create an account-----step2 modal--Input name and password-->
<div id="step2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
     aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="resetRegister()">×
        </button>
        <h3 id="myModalLabel2">Create Gibson Account</h3>
    </div>
    <div class="modal-body">
        <p>

        <form action="<?php echo $SELF_BASE ?>" method="post">
            <input readonly style="color:#000000; height:15px;" type="text" id="set_email" class="input-block-level" name="email"
                   value="<?php echo $_SESSION["userInfo"]["email"]; ?>" placeholder="Email address">
            <!-- change to label -->
            <input style="height:auto" type="text" class="required" name="username" placeholder="First and last name">
            <input style="height:auto" type="hidden" name="reg_state" value="modal2">

            <input style="height:auto"  type="password" class="required" name="password" placeholder="Password">
            <input class="btn btn-primary" type="submit" name="submit" value="Create Gibson Account">

            <p id="tip2"></p>

        </form>
        </p>
    </div>
    <div class="modal-footer">
    </div>
</div>


<!--Create an account----step3 modal--check activation code-->
<div id="step3" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel3">Create Gibson Account</h3>
    </div>
    <div class="modal-body">
        <p>

        <form action="<?php echo $SELF_BASE ?>" method="post">
            <input type="hidden" name="reg_state" value="modal3">

            <input style="height:auto" type="text" class="input-block-level" value="Activation code" name="activcode"
                   placeholder="actiCode">
            <input class="btn btn-primary" type="submit" name="submit" value="Activate Gibson Account">

            <p id="tip3"></p>

        </form>
        </p>
    </div>
    <div class="modal-footer">
    </div>
</div>





<!-- Sign in modal-->
<div id="login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel4">
            Please sign in
        </h3>
    </div>
    <div class="modal-body">
        <p>

        <form action="<?php echo $SELF_BASE ?>" method="post">
            <input type="text" class="input-block-level" placeholder="Email address" name="useremail">
            <input type="password" class="input-block-level" placeholder="Password" name="userpassword">
            <input type="hidden" name="log_state" value="login">

            <input class="btn btn-primary" type="submit" name="submit" value=" Sign in ">

            <p id="tiplogin"></p>
        </form>
        </p>
    </div>
    <div class="modal-footer">
        <button class="btn" id="register" onclick="toggle('login', 'step1')">Register</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>



<?php



if (isset($log_state)) {
   // echo "~~~~~result " . $result . " state" . $log_state;
     if(!$result) { ?>
         <script type="text/javascript">
             $('#login').modal('show');
             document.getElementById('tiplogin').innerHTML = "<?php echo $respMs ?>";//"
         </script>

     <?php
     }

    unset($result);
    unset($respMs);
    unset($log_state);

}
?>



<!-- /container -->
