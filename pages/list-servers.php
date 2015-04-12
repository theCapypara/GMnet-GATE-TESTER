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
if (!isset($running)) die; ?>
<div class="row">
    <div class="col-md-12">
        <h1>Server-List</h1>
        <p class="lead">for server on <?=$ip?>:<?=$port?></p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="./index.php?ip=<?=$ip?>&port=<?=$port?>&action=main">Back!</a>
        <h3>Your filter was...</h3>
        <table class="table table-bordered">
            <tr>
                <td><strong>Data1: </strong></td>
                <td><?= $_POST["data1"] ?></td>
            </tr>
            <tr>
                <td><strong>Data2: </strong></td>
                <td><?= $_POST["data2"] ?></td>
            </tr>
            <tr>
                <td><strong>Data3: </strong></td>
                <td><?= $_POST["data3"] ?></td>
            </tr>
            <tr>
                <td><strong>Data4: </strong></td>
                <td><?= $_POST["data4"] ?></td>
            </tr>
            <tr>
                <td><strong>Data5: </strong></td>
                <td><?= $_POST["data5"] ?></td>
            </tr>
            <tr>
                <td><strong>Data6: </strong></td>
                <td><?= $_POST["data6"] ?></td>
            </tr>
            <tr>
                <td><strong>Data7: </strong></td>
                <td><?= $_POST["data7"] ?></td>
            </tr>
            <tr>
                <td><strong>Data8: </strong></td>
                <td><?= $_POST["data8"] ?></td>
            </tr>
            <tr>
                <td><strong>Sort by: </strong></td>
                <td><?= $_POST["sortby"] ?> <?= $_POST["sortby_dir"] ?></td>
            </tr>
            <tr>
                <td><strong>Limit: </strong></td>
                <td><?= $_POST["limit"] ?> </td>
            </tr>
        </table>
        <h3>Your results are...</h3>
        <p>System Time: <?=@date("M Y H:i:s")?></p>
        <table class="table table-bordered">
            <tr>
                <td><strong>IP: </strong></td>
                <td><strong>Data 1: </strong></td>
                <td><strong>Data 2: </strong></td>
                <td><strong>Data 3: </strong></td>
                <td><strong>Data 4: </strong></td>
                <td><strong>Data 5: </strong></td>
                <td><strong>Data 6: </strong></td>
                <td><strong>Data 7: </strong></td>
                <td><strong>Data 8: </strong></td>
                <td><strong>Created: </strong></td>
            </tr>
            <?php foreach($server_list as $server) { ?>
                <tr>
                    <td><?=$server["ip"]?></td>
                    <td><?=$server["data1"]?></td>
                    <td><?=$server["data2"]?></td>
                    <td><?=$server["data3"]?></td>
                    <td><?=$server["data4"]?></td>
                    <td><?=$server["data5"]?></td>
                    <td><?=$server["data6"]?></td>
                    <td><?=$server["data7"]?></td>
                    <td><?=$server["data8"]?></td>
                    <td><?=@date("M Y H:i:s",$server["createdTime"])?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>