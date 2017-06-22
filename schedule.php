<!DOCTYPE html>
<html lang="en">
<link href="/Site/ReferLib/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="/Site/LocalLib/css/home.css" rel="stylesheet">
<link href="/Site/ReferLib/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

<head>
    <meta charset="utf-8">
    <title>Schedule an event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->

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
    <link rel="stylesheet" href="/Site/ReferLib/jquery.steps/css/normalize.css">
    <link rel="stylesheet" href="/Site/ReferLib/jquery.steps/css/main.css">
    <link rel="stylesheet" href="/Site/ReferLib/jquery.steps/css/jquery.steps.css">
    <link rel="stylesheet" href="/Site/ReferLib/jquery.datepicker/jquery-ui.css">
    <link rel="stylesheet" href="/Site/LocalLib/css/home.css">


    <script src="/Site/ReferLib/ScriptLibrary/jquery-latest.pack.js"></script>
    <script type="text/javascript" src="/Site/ReferLib/bootstrap/js/bootstrap.js"></script>
    <script src="/Site/ReferLib/jquery.steps/js/jquery.steps.js"></script>

    <script src="/Site/ReferLib/jquery.steps/js/jquery.validate.js"></script>
    <script src="/Site/LocalLib/js/schedule.js"></script>
    <script src="/Site/ReferLib/jquery.datepicker/jquery-ui.js"></script>
    <script src="/Site/ReferLib/jquery.datepicker/jquery-ui.multidatespicker.js"></script>
    <link rel="stylesheet" href="/Site/ReferLib/jquery.datepicker/jquery.datepick.css">


</head>
<body>

<?php

$SELF_BASE = basename($_SERVER['PHP_SELF'], ".php") . PHP_EOL;

require_once('Model/Poll.php');
require_once('Model/PollMap.php');
require_once('Model/BaseFunc.php');

if (isset($_POST["pollaction"])) {

    if ($_POST["pollaction"] == "delete") {

        deletePollAndMap($_POST["pid"]);
        header("Location:mypoll");

    }
} ?>



<!--menu-->
<div class="container-narrow">
    <div class="masthead">
        <?php
        require_once("mainmenu.php");
        require_once("Control/SchedulePoll.php");

        ?>

   </div>
        <hr style="width: 800px">
        <div class="row-fluid">

            <!--schedule form-->

            <form name="scheduleform" id="scheduleform" action="<?php echo $SELF_BASE ?>" method="post"
                  style="width: 600px; padding-left: 95px;">

                <script type="text/javascript">
                    var EDIT =<?php echo $EDIT ?>;
                    if (EDIT) {

                        var title =<?php echo json_encode($poll->getTitle());?>;
                        var loca = <?php echo json_encode($poll->getLocation());?>;
                        var description = <?php echo json_encode($poll->getDescription());?>;
                        var ownername =<?php echo json_encode($poll->getOwnername());?>;
                        var owneremail = <?php echo json_encode($poll->getOwneremail());?>;
                        var content = <?php echo json_encode($poll->getContent());?>;


                        $("#title-1").val(title);
                        $("#location-1").val(loca);
                        $("#description-1").val(description);
                        $("#yourName-1").val(ownername);
                        $("#eaddr-1").val(owneremail);

                        var content = content.substring(0, content.length - 1);
                        var string1 = content.split(";");
                        $('#date').multiDatesPicker('addDates', string1);
                        $('#date').multiDatesPicker('addDates', string1);
                    }

                </script>

                <h3>General</h3>
                <fieldset>
                    <legend style="padding-top: 20px;font-size: 20px;margin-bottom: 0px;">Account Information</legend>
                    <label for="title-1">Title *</label>
                    <input id="title-1" name="title" type="text" class="required" value="">
                    <label for="location-1">Location</label>
                    <input id="location-1" name="location" type="text" class="optional">
                    <label for="description-1">Description</label>
                    <input id="description-1" name="description" type="text" class="optional">
                    <label for="yourName-1">Your name *</label>
                    <input id="yourName-1" name="ownername" type="text" class="required">
                    <label for="eaddr-1">E-mail address *</label>
                    <input id="eaddr-1" name="owneremail" type="text" class="required email">
                    <input type="hidden" id="altField1" name="content" value="">
                    <input type="hidden" name="isEdit"  value="<?php echo $EDIT ?>">

                    <h5>(*) Mandatory</h5>
                </fieldset>


                <h3>Time </h3>
                <fieldset>
                    <div id="withAltField" class="box">
                        <div id="date"></div>

                        <label for="altField"><strong> Selected dates: </strong>
                                <textarea type="text" style="width:400px; height:250px" id="altField"
                                          readonly></textarea>

                    </div>

                </fieldset>

            </form>

        </div>
        <hr>
        <?php

        if ($_SESSION["finished"] && isset($_SESSION["pollurl"])) {
            ?>


            <script type="text/javascript">
                var url = "<?php echo $_SESSION["pollurl"] ?>";
                window.location.href = url; </script>

        <?php } ?>

        <div class="footer">
            <p>Made by Gibson 2015</p>
        </div>


</div>
    <!-- /container -->

</body>
</html>
