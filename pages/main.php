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
        <h1>Connected!</h1>
        <p class="lead">We have connected to your master server. What should we do now?</p>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-bordered">
            <tr>
                <td><strong>Adress: </strong></td>
                <td><?=$ip?>:<?=$port?></td>
            </tr>
            <tr>
                <td><strong>Name:</strong></td>
                <td><?= $servername ?></td>
            </tr>
            <tr>
                <td><strong>Master Server Version:</strong></td>
                <td><?= $version ?></td>
            </tr>
            <tr>
                <td><strong>Minimum required udphp version:</strong></td>
                <td><?= $udphpMin ?></td>
            </tr>
        </table>
        <form role="form" action="index.php" method="POST">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div class="pull-left headfix">List Servers</div>
                </div>
                <div class="panel-body">
                    <p>Leave any field empty to not filter this value.<br>
                        Leave all fields empty to list all servers.<br>
                        <strong>NOTE: All fields you fill in will filter by exact match! This is no search!</strong></p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="data1">
                                    GameName (Datastring 1)
                                </label>
                                <input class="form-control" name="data1" placeholder="GameName (Datastring 1)" type="text">
                                <p class="help-block">
                                    The id of your game that you specified. When using HTME you specify this in <code>htme_init</code> or with <code>htme_setGamename(name)</code>, with udphp this is the first data string.<br>Use multiple game ids for different versions of your game or game modes.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="sortby">
                                    Sort by
                                </label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <select class="form-control" name="sortby">
                                            <option value="date">Date</option>
                                            <option value="data1">GameName (Datastring 1)</option>
                                            <option value="data2">Datastring 2</option>
                                            <option value="data3">Datastring 3</option>
                                            <option value="data4">Datastring 4</option>
                                            <option value="data5">Datastring 5</option>
                                            <option value="data6">Datastring 6</option>
                                            <option value="data7">Datastring 7</option>
                                            <option value="data8">Datastring 8</option>
                                        </select>
                                        <p class="help-block">
                                            Field to sort by
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" name="sortby_dir">
                                            <option value="DESC">Descending</option>
                                            <option value="ASC">Ascending</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="limit">
                                    Limit
                                </label>
                                <input class="form-control" name="limit" placeholder="Limit" type="text">
                                <p class="help-block">
                                    Number of servers to return
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="data2">
                                    Datastring 2
                                </label>
                                <input class="form-control" name="data2" placeholder="Datastring 2" type="text">
                                <p class="help-block">
                                    Filter by the second data string. Usually used for server names.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="data3">
                                    Datastring 3
                                </label>
                                <input class="form-control" name="data3" placeholder="Datastring 3" type="text">
                                <p class="help-block">
                                    Filter by the third data string.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="data4">
                                    Datastring 4
                                </label>
                                <input class="form-control" name="data4" placeholder="Datastring 4" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="data5">
                                    Datastring 5
                                </label>
                                <input class="form-control" name="data5" placeholder="Datastring 5" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="data6">
                                    Datastring 6
                                </label>
                                <input class="form-control" name="data6" placeholder="Datastring 6" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="data7">
                                    Datastring 7
                                </label>
                                <input class="form-control" name="data7" placeholder="Datastring 7" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="data8">
                                    Datastring 8
                                </label>
                                <input class="form-control" name="data8" placeholder="Datastring 8" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="btn-toolbar" role="toolbar">
                        <div class="btn-group pull-right">
                            <button class="btn btn-primary" type="submit">Get the list!</button>
                        </div>
                    </div>
                </div>
            </div> 
            <input type="hidden" name="ip" value="<?=$ip?>">
            <input type="hidden" name="port" value="<?=$port?>">
            <input type="hidden" name="action" value="list-servers">
        </form>
    </div>
</div>