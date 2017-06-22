<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My poll</title>
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
    <script type="text/javascript" src="/Site/ReferLib/ScriptLibrary/jquery-latest.pack.js"></script>
    <script type="text/javascript" src="/Site/ReferLib/bootstrap/js/bootstrap.js"></script>


</head>

<body>


<div class="container-narrow">
    <div class="masthead">
        <?php
        require_once('Model/Poll.php');
        require_once('Model/PollMap.php');
        require_once('Model/BaseFunc.php');
        require_once("mainmenu.php");
        //require_once("Control/MyPoll.php");//can not change the order of require

        if (isset($_SESSION["user"])) {
            //var_dump($_SESSION["user"]);

            $email = $_SESSION["user"]->getEmail();
            $pollMapArr = loadPollMap($email);

        }

        ?>
    </div>
<hr>
    <div class="container-fluid">
                <div class="tabbable" id="tabs">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#panel1" data-toggle="tab">My polls</a>
                        </li>                       
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="panel1">
                            <p>
                                        <table class="table">

                                            <thead>
                                            <tr>
                                                <th>
                                                    Subject
                                                </th>
                                                <th>
                                                    Participants
                                                </th>
                                                <th>
                                                    Join Link
                                                </th>
                                                <th>
                                                    Last Activity
                                                </th>
                                                <th>

                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php


                                            if (isset($pollMapArr)) {
                                                if (!empty($pollMapArr) && count($pollMapArr) > 0) {

                                                    //if has poll for this user
                                                    foreach ($pollMapArr as $pollmap) {
                                                        $url = $pollmap->getPollurl();


                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $pollmap->getTitle(); ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $pollmap->getParticipants(); ?>

                                                            </td>
                                                            <td>
                                                                 www.gibson.com/<?php echo $url ?>

                                                            </td>
                                                            <td>
                                                                <?php echo $pollmap->getLastModified(); ?>
                                                            </td>
                                                            <td>
                                                                <form method="post" action="<?php echo $url ?>">
                                                                    <input class="btn btn-primary"  type="submit" value="manage">
                                                                    <input type="hidden" name="url"
                                                                           value="<?php echo $url ?>">
                                                                </form>


                                                            </td>
                                                        </tr>



                                                    <?php
                                                    }
                                                }
                                            } else { ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                            <?php } ?>

                                            </tbody>
                                        </table>
  

                            </p>

                </div>
            </div>
        </div>
    </div>
	<hr>
    <div class="footer">
        <p>Made by Gibson 2015</p>
    </div>
</div>
<!-- /container -->

</body>
</html>
