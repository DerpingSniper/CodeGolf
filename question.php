<?php $questionID = $_GET['questionID']; ?>
<HTML>
    <HEAD>
        <title>Test</title>
        <link href="styles/style.css" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Corben:bold" rel="stylesheet" type="text/css">
        <link href="//fonts.googleapis.com/css?family=Nobile" rel="stylesheet" type="text/css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js"></script>
    </HEAD>
    <BODY>
        <nav class="nav navbar-default"  style=margin-bottom:20px;width:100%;>
            <div class=container-fluid>
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class=navbar-header>
                    <button type=button class="navbar-toggle collapsed" data-toggle=collapse data-target="#navbar">
                        <span class=sr-only>Toggle navigation</span>
                        <span class=icon-bar></span>
                        <span class=icon-bar></span>
                        <span class=icon-bar></span>
                    </button>

                    <a class=navbar-brand href=#><img alt=Brand src=""></a>
                </div>
            
                    <!--Collect Nav links-->
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class=active><a href=index.php>Home <span class=sr-only>(current)</span></a></li>
                        <li><a href=#>Profile</a></li>
                        <li class=dropdown>
                            <a href=# class=dropdown-toggle data-toggle=dropdown role=button aria-expanded=false>Dropdown <span class=caret></span></a>
                            <ul class=dropdown-menu role=menu>
                                <li><a href=#>Action</a></li>
                                <li><a href=#>Action</a></li>
                                <li><a href=#>Action</a></li>
                                <li class=divider></li>
                                <li><a href=#>Separated link</a></li>
                                <li class="divider"></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                    <form class="navbar-form navbar-left" role=search>
                        <div class=form-group>
                            <input type=text class=form-control placeholder=Search>
                        </div>
                        <button type=submit class="btn btn-default">Go!</button>
                    </form>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href=#>Link</a></li>
                        <li class=dropdown>
                            <a href=# class=dropdown-toggle data-toggle=dropdown role=button aria-expanded=false>Dropdown <span class=caret></span></a>
                            <ul class=dropdown-menu role=menu>
                                <li><a href=#>Action</a></li>
                                <li><a href=#>Action</a></li>
                                <li><a href=#>Action</a></li>
                                <li class=divider></li>
                                <li><a href=#>Separated link</a></li>
                            </ul>
                        </li>  
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class=row>
            <div class=col-md-12>
                <!--<div class="btn btn-danger"><i class="fa fa-empire"></i></div>
                <div class="btn btn-info"><i class="fa fa-empire"></i></div>-->
                <?php
                    $servername  = "localhost";
                    $username    = "root";
                    $password    = "";
                    $world       = "world";

                    $sql         =  "SELECT * ";
                    $sql        .=  "FROM `question` ";
                    $sql        .=  "WHERE questionID = $questionID";

                    $link = mysql_connect($servername, $username, $password);
                    $source = mysql_select_db("codegolf", $link);

                    $result = mysql_query($sql);

                    $title = mysql_result($result, 0, 'title');
                    $questionID = mysql_result($result, 0, 'questionID');
                    echo "<div class=container><div class='jumbotron text-center'><h2><a href=#> $title </a></h2></div></div>";


                    $sql         =  "SELECT * ";
                    $sql        .=  "FROM `answers` ";
                    $sql        .=  "WHERE questionID = $questionID";

                    $result = mysql_query($sql);

                    if($result) $resultcount = mysql_num_rows($result);

                    if($resultcount == 0) echo "<div class=container><div class='jumbotron text-center' style='padding: 50px;'><h4>No answers yet!<h4></div></div>";

                    for($i=0; $i < $resultcount; $i++){
                        $content = mysql_result($result, $i, 'content');
                        $winning = mysql_result($result, $i, 'winning');
                        $favorite = mysql_result($result, $i, 'favorite');
                        $difficulty = mysql_result($result, $i, 'difficulty');
                        $description = mysql_result($result, $i, 'description');
                        $language = mysql_result($result, $i, 'language');
                            
                        if($winning && $favorite) {
                            echo "<div class=container> <div class='jumbotron text-center'> <div class=row> <div class=col-md-1> <h1><span class='glyphicon glyphicon-ok'></span></h1> </div><div class=col-md-10> <h4> $content </h4> </div><div class=col-md-1> <h1><span class='glyphicon glyphicon-fire'></span></h1> </div></div><div class=row> <div class=col-md-1> <p>$difficulty</p></div><div class=col-md-10> <p>$description</p></div><div class=col-md-1> <p>$language</p></div></div></div></div>";
                        }
                        else if ($winning && !$favorite) {
                            echo "<div class=container> <div class='jumbotron text-center'> <div class=row> <div class=col-md-1> <h1><span class='glyphicon glyphicon-ok'></span></h1> </div><div class=col-md-10> <h4> $content </h4> </div><div class=col-md-1> </div></div><div class=row> <div class=col-md-1> <p>$difficulty</p></div><div class=col-md-10> <p>$description</p></div><div class=col-md-1> <p>$language</p></div></div></div></div>";
                        }
                        else if (!$winning && $favorite) {
                            echo "<div class=container> <div class='jumbotron text-center'> <div class=row> <div class=col-md-1> </div><div class=col-md-10> <h4> $content </h4> </div><div class=col-md-1> <h1><span class='glyphicon glyphicon-fire'></span></h1> </div></div><div class=row> <div class=col-md-1> <p>$difficulty</p></div><div class=col-md-10> <p>$description</p></div><div class=col-md-1> <p>$language</p></div></div></div></div>";
                        }
                        else {
                            echo "<div class=container> <div class='jumbotron text-center'> <div class=row> <div class=col-md-1> </div><div class=col-md-10> <h4> $content </h4> </div><div class=col-md-1> </div></div><div class=row> <div class=col-md-1> <p>$difficulty</p></div><div class=col-md-10> <p>$description</p></div><div class=col-md-1> <p>$language</p></div></div></div></div>"; 
                        }
                    }
                ?>
            </div>
        </div> <!--End row-->
    </BODY>
</HTML>