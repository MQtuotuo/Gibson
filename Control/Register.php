<?php
require_once('Model/BaseFunc.php');
require_once('Message.php');

if (!isset($_SESSION["userInfo"])) {
    $_SESSION["userInfo"] = array_fill_keys(array("email", "username", "password", "activcode"), "");

}
//var_dump($_SESSION["userInfo"]);

if (isset($_POST['reg_state'])) {

    $reg_state = $_POST['reg_state'];
    $result = false;
    $respMs = "";


    if ($reg_state == "modal1") {
       // $_SESSION["userInfo"] = array_fill_keys(array("email", "username", "password", "activcode"), "");
        if (!empty($_POST['email'])) {
            //initialize
            $email = $_POST['email'];

            //check email form valid?
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                //check email not in use
                if (checkEmailNotUsed($email)) {
                    $respMs = $message["ACCOUNT_EMAIL_VALID"];
                    $_SESSION["userInfo"]["email"] = $email;
                    $result = true;

                } else {

                    $respMs = $message["ACCOUNT_EMAIL_IN_USE"];
                }
            } else {
                $respMs = $message["ACCOUNT_EMAIL_NOT_VALID"];
            }
        } else {
            $respMs = $message["MESSAGE_INCOMPLETE"];
        }


    } elseif ($reg_state == "modal2") {

        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            //check the validation of password
            if (checkPassword($password)) {
                //send activecode
                $email = $_SESSION["userInfo"]["email"];

                $gencode = generateActivationCode(8);
                if (sendActiveCode($email, $gencode, $username)) {
                    $respMs = $message["ACCOUNT_ACTIVE_CODE_SENT"];
                    $_SESSION["userInfo"]["username"] = $username;
                    $_SESSION["userInfo"]["password"] = $password;
                    $_SESSION["userInfo"]["activcode"] = $gencode;
                    $result = true;
                } else {
                    $respMs = $message["ACCOUNT_ACTIVE_CODE_SENT_ERROR"];
                }
            } else {
                $respMs = $message["ACCOUNT_PASSWORD_NOT_VALID"];
            }
        } else {
            $respMs = $message["MESSAGE_INCOMPLETE"];
        }

    } elseif ($reg_state == "modal3") {

        if (!empty($_POST['activcode'])) {

            $activcode = $_POST['activcode'];
            //match activecode
            if (matchActiveCode($activcode, $_SESSION["userInfo"]['activcode'])) {
                $respMs = $message["ACCOUNT_ACTIVE_SUCCESS"];


                //store user
                if (registerUser($_SESSION["userInfo"]["username"], $_SESSION["userInfo"]["email"], $_SESSION["userInfo"]["password"], "NORMAL")) {
                    $respMs = $message["ACCOUNT_REGISTER_SUCCESS"];
                    $result = true;
                    unset(  $_SESSION["userInfo"]);

                } else {
                    $respMs = $message["ACCOUNT_REGISTER_FAILURE"];
                }

            } else {
                $respMs = $message["ACCOUNT_ACTIVE_CODE_MISMATCH"];
            }
        } else {
            $respMs = $message["MESSAGE_INCOMPLETE"];
        }
    }
    //echo "resp: ".$respMs."  state  " .$reg_state;


}
?>



<?php


if (isset($reg_state)) {
    if ($reg_state == "modal1") {
        if ($result) {
            ?>
            <script type="text/javascript">
                $(function () {
                    toggle('step1', 'step2');
                });
            </script>

        <?php
        } else {
            ?>

            <script type="text/javascript">

                $('#step1').modal('show');
                document.getElementById('tip1').innerHTML = '<?php echo $respMs ?>';
            </script>
        <?php
        }
    } elseif ($reg_state == "modal2") {

        if ($result) {
            ?>
            <script type="text/javascript">
                $(function () {
                    toggle('step2', 'step3');
                });
            </script>
        <?php
        } else {
            ?>
            <script type="text/javascript">
                $("#step2").modal('show');
                document.getElementById('tip2').innerHTML = "<?php echo $respMs ?>";
            </script>
        <?php
        }

    } elseif ($reg_state == "modal3") {
        if ($result) {
            ?>
            <script type="text/javascript">
                $(function () {
                    toggle('step3', 'login');
                });
            </script>
        <?php
        } else {
            ?>
            <script type="text/javascript">

                $('#step3').modal('show');
                document.getElementById('tip3').innerHTML = '<?php echo $respMs ?>';
            </script>
        <?php
        }

    }
    unset($respMs);
    unset($reg_state);
}

?>
