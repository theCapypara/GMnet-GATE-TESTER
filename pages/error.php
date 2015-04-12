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
        <h2>Error!</h2>
        <p class="lead">An error occured:</p>
        <p><strong>Errorcode:</strong> <?=$error?></p>
        <p><strong>Message:</strong><br><?=$errormsg?></p>
    </div>
</div>