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
        <h1>HappyTear Masterserver Tester (HTMT)</h1>
        <p class="lead">Test udphp or HappyTear Multiplayer Engine PLUS master servers that have <code>--testing</code> enabled.</p>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form role="form" action="index.php" method="GET">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div class="pull-left headfix">Test a Master Server</div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="ip">
                                    Server IP
                                </label>
                                <input class="form-control" name="ip" placeholder="Server IP" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="port">
                                    Server Port
                                </label>
                                <input class="form-control" name="port" value="6510" placeholder="Server Port" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="btn-toolbar" role="toolbar">
                        <div class="btn-group pull-right">
                            <button class="btn btn-primary" type="submit">Test Server</button>
                        </div>
                    </div>
                </div>
            </div> 
            <input type="hidden" name="action" value="main">
        </form>
        <p>This HTMT server is only for demonstration purposes. Please <a href="index.php?action=get">host your own HTMT instance</a> if possible.</p>
        <p><strong>This tool may not be used for Denial of Services Attacks!</strong><br>You are only allowed to use this tool with your own HTME or udphp master servers.
    </div>
</div>