<?php if( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'): ?>
    <?php include 'search.php'; ?>
<?php else: ?>
    <!DOCTYPE html>
    <!--
    To change this license header, choose License Headers in Project Properties.
    To change this template file, choose Tools | Templates
    and open the template in the editor.
    -->
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
            <link rel="stylesheet" media="all" href="web/css/bootstrap.min.css" />
            <link rel="stylesheet" media="all" href="web/css/bootstrap-theme.min.css" />
            <link rel="stylesheet" media="all" href="web/css/main.css" />
        </head>
        <body>
            <div class="content-main">
                <div id="logo"></div>
                <div id="header-search">
                    <span>Ingrese la palabra por la que desee filtrar los Tweets</span>
                    <div id="header-search">
                        <form  method="POST" action="web/php/insert.php">
                            <input id="data" name="query" type="text" placeholder="Ingresa palabra" />
                            <input id="search" type="submit" value="Buscar" />
                        </form>
                     </div>
                </div>
                <div class="content">
                    <div id="tweets">
                         Tweets will go here.
                    </div>
                       <div id="content-right">
                       <?php
                            include("web/php/connect.php");

                            $result = mysql_query("SELECT distinct name FROM searchs"); 
                            while ($row = mysql_fetch_row($result)){ 
                               echo $row[0]; ?>&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php 
                            } 

                        ?>

                    </div>
                </div>
            </div>
            <script type="text/javascript" src="web/js/jquery-1.11.0.min.js"></script>
            <script type="text/javascript" src="web/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="web/js/main.js"></script>
        </body>
    </html>
<?php endif; ?>