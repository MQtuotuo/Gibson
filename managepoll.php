<?php

require_once('Model/Poll.php');
require_once('Model/PollMap.php');
require_once("Control/ManagePoll.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Gibson scheduling!</title>
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
    <script src="/Site/LocalLib/js/home.js"></script>
    <script type="text/javascript" src="/Site/ReferLib/bootstrap/js/bootstrap.js"></script>
    <script src="/Site/ReferLib/jquery.steps/js/jquery.validate.js"></script>
    <script type="text/javascript" src="/Site/ReferLib/ScriptLibrary/jspdf.js"></script>
    <script type="text/javascript" src="/Site/ReferLib/ScriptLibrary/jspdf.plugin.table.js"></script>
    <script type="text/javascript" src="/Site/ReferLib/ScriptLibrary/FileSaver.js"></script>
	<script type="text/javascript" src="/Site/LocalLib/js/print.js"></script>
    <link rel="stylesheet" type="text/css" href="/Site/LocalLib/css/manage.css">
    <script type="text/javascript" src="/Site/LocalLib/js/manage.js"></script>

</head>
<body>



<div class="container-narrow">
    <div class="masthead">

        <?php
        require_once("mainmenu.php");

        $_SESSION["poll"] = $poll;



        $IS_ADMIN = 0;
        if (isset($_SESSION['user']) && isset($pollowner)) {
                $useremail = $_SESSION['user']->getEmail();
            //var_dump($_SESSION['user']);
            if ($pollowner == $useremail) {
               // echo "you are admin";
                $IS_ADMIN = 1;//true;
            }
        } else {
            $IS_ADMIN = 0;//false;
           // echo "you are a participants ";
        }



        ?>
<hr>



        <script type="text/javascript">
            var IS_ADMIN =<?php echo $IS_ADMIN ?>;
            var column =<?php echo $column; ?>;
            var pollresult =<?php echo json_encode($pollresult)?>;


        </script>



        <div class="container-fluid">

            <div class="tabbable" id="tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#panel1">Table View</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" contenteditable="false" id="panel1">
                           <p>
                               <br>
		                     <label id="pollName"><?php echo $title; ?></label>

		                     <label id="description">Description: <?php echo $description; ?> </label>
		                     <label id="location">Location: <?php echo $location; ?>  </label>

                             <label id="url">Link to join: <a href="<?php echo $pollurl; ?>">www.gibson.com/<?php echo $pollurl; ?></a></label>
                               <br>
                               <br>

                            <!--table-->
                        <table id="table">
                            <thead>
                            <tr  height="20px">
                                <th style="width:20px;" bgcolor="#CCCCCC">Voter</th>

                                <?php
                                foreach ($content as $date) { ?>

                                    <th  bgcolor="#CCCCC" type="checkbox"><?php echo $date ?></th>
                                <?php
                                }
                                ?>


                            </tr>
                            </thead>


                            <tbody id="tbody">

                            </tbody>
                        </table>
                        <br>
                        <button class="btn btn-primary" id="btnAdd">New</button>

                        <form id="tblform" action="<?php echo $pollurl ?>" method="post">
                            <input type="hidden" id="tblRecord" name="result" value="">
                            <input type="hidden" id="tblRow" name="participants" value="">
                            <input type="hidden" name="vote" value="">
                        </form>


                        </p>
                    </div>
                    <br>
                    <br>
                    <br>

                    <div class="row-fluid" id="manage1">


                        <div class="span6" style=" padding-left: 10px; ">
                            <h5>Survey</h5>

                            <ul>
                                <li><a   style="cursor: pointer;" onclick="document.forms['editform'].submit();"><i class="icon-edit"></i>  Edit</a></li>

                                <li><a  style="cursor: pointer;" href="#deleteModal" data-toggle="modal"><i class="icon-trash"></i>  Delete</a></li>
                            </ul>


                            <form name="editform" method="post" action="schedule">
                                <input type="hidden" name="pollaction" value="edit">
                                <input type="hidden" name="pollurl" value="<?php echo $pollurl ?>">

                            </form>



                        </div>
                        <div class="span6">
                            <h5>Print/Export</h5>

                            <ul>
                                <li ><a  style="cursor: pointer;" onclick="printpdf()"><i class="icon-print"></i> Print View</a></li>
                                <li ><a  style="cursor: pointer;"  onclick="generate()"><i class="icon-remove-circle"></i>  As PDF</a></li>
                            </ul>


                        </div>
                    </div>




                        </p>
                    </div>
                </div>
            </div>

        </div>


        <!-- Delete modal-->
        <div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
             aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel1">
                    Really delete?
                </h3>
            </div>
            <div class="modal-body">
                <p>
                    Your survey will be deleted. Are you sure?
                </p>
            </div>
            <div class="modal-footer">
                <form method="post" action="schedule.php">
                    <input type="hidden" name="pollaction" value="delete">
                    <input type="hidden" name="pid" value="<?php echo $poll->getId() ?>">
                    <input class="btn btn-primary" type="submit" value="Yes">
                    <button class="btn" data-dismiss="modal">Abort</button>
                </form>
            </div>
        </div>

        <!--footer-->
        <hr>
        <div class="footer">
            <p>Made by Gibson 2015</p>
        </div>

    </div>
    <!-- /container -->
</body>
</html>