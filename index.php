<?php
/*
 * Copyright (C) 2015 Parakoopa and HappyTear Studios
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
require_once("./udphpMasterServerClient.php");
$running = true;
//error_reporting(0);
$masterclient = null;
if (isset($_GET) && isset($_GET["ip"]) && isset($_GET["port"])) {
    $ip = $_GET["ip"];
    $port = $_GET["port"];
} elseif (isset($_POST) && isset($_POST["ip"]) && isset($_POST["port"])) {
    $ip = $_POST["ip"];
    $port = $_POST["port"];
}
if (isset($ip))
    $masterclient = new udphpMasterServerClient($ip,$port);

$action = "";
if (isset($_GET) && isset($_GET["action"])) {
    $action = $_GET["action"];
} elseif (isset($_POST) && isset($_POST["action"])) {
    $action = $_POST["action"];
}

if ($masterclient == null) {
    switch ($action) {
        default:
            $page = "./pages/landing.php";
        break;
        case "get":
            $page = "./pages/get.php";
        break;
    }
} elseif (($error = $masterclient->getError()) != 0) {
    $errormsg = $masterclient->getErrorMsg();
    $page = "./pages/error.php";
} else {
    switch ($action) {
        default:
        case "main":
            $masterclient->retrieveServerDetails();
            $servername = $masterclient->getServername();
            if ($servername == "") {
                $servername = "<i>Not set</i>";
            }
            $version = $masterclient->getVersion();
            $udphpMin = $masterclient->getUdphpMin();
            if (($error = $masterclient->getError()) != 0) {
                $errormsg = $masterclient->getErrorMsg();
                $page = "./pages/error.php";
            } else {
                $page = "./pages/main.php";
            }
        break;
        case "list-servers":
            $server_list = $masterclient->getServerList($_POST["data1"],$_POST["data2"],$_POST["data3"],$_POST["data4"],$_POST["data5"],$_POST["data6"],$_POST["data7"],$_POST["data8"],$_POST["sortby"],$_POST["sortby_dir"],$_POST["limit"]);
            $page = "./pages/list-servers.php";
        break;
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HappyTear Master Tester</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">HTMT</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li <?php if ($page == "./pages/landing.php") { ?>class="active"<?php } ?>><a href="./">Home</a></li>
                        <li <?php if ($page == "./pages/get.php") { ?>class="active"<?php } ?>><a href="index.php?action=get">Get HTMT!</a></li>
                        <li><a href="https://marketplace.yoyogames.com/assets/1155/multiplayer-engine">HTME Free</a></li>
                        <li><a href="https://marketplace.yoyogames.com/assets/1156/multiplayer-engine-plus">HTME Plus</a></li>
                        <li><a href="https://marketplace.yoyogames.com/assets/411/multiplayer-without-open-ports">udphp</a></li>
                        <li><a href="http://htme.parakoopa.de">HTME Manual</a></li>
                        <li><a href="http://gmc.yoyogames.com/index.php?showtopic=646851">Forum Support (GMC)</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container">
            <?php require($page); ?>
        </div><!-- /.container -->
    </body>