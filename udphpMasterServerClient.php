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
/**
 * Simple master server client
 *
 * @author Marco Köpcke <parakoopa at live.de>
 */
class udphpMasterServerClient {
    private $socket;
    private $error;
    private $errormsg;
    private $server_ip;
    private $server_port;
    private $servername;
    private $version;
    
    function __construct($server_ip,$server_port) {
        $this->error = 0;
        $this->socket = false;
        $this->errormsg = "No error occured.";
        $this->server_ip = $server_ip;
        $this->server_port = $server_port;
        try {
            //Try to open socket
            if (!$this->socket = fsockopen($server_ip,$server_port,$errno,$errstr,5)) {
                $this->error = "2-".$errno;
                $this->errormsg = $errstr."<br>Make sure you entered the correct information and the server is running.";
                return;
            }
            //Check if testing is enabled
            stream_set_timeout($this->socket, 2);
            
            fwrite($this->socket, "istesting".chr(10));
            $testcode = fread($this->socket,1);
            $testingenabled = fgets($this->socket);
            //Old version
            if ($testingenabled === FALSE || ord($testcode) != 248) {
                $this->error = 3;
                $this->errormsg = "Your master server is running an old, unsupported version. This tool only works with master server version 1.2.0 and upwards,";
            } elseif (ord($testingenabled) !== 1) {
                $this->error = 4;
                $this->errormsg = "This server has testing disabled. Please run the server with <code>--testing</code> to use this tool.";                
            }
            //Else: We did it!
        } catch (Exception $ex) {
            $this->error = 1;
            $this->errormsg = $ex."<br>Make sure you entered the correct information and the server is running.";
            return;
        }
    }
    
    function getError() {
        return $this->error;
    }
    
    function getErrorMsg() {
        return $this->errormsg;
    }
    
    function retrieveServerDetails() {
        if ($this->error != 0) return;
        fwrite($this->socket, "testinginfos".chr(10));
        $code = fread($this->socket,1);
        if (ord($code) != 247) {
                $this->error = 5;
                $this->errormsg = "Your master server is running an old, unsupported version. This tool only works with master server version 1.2.0 and upwards,";
                return;
        }
        $this->servername = trim(fgets($this->socket));
        $this->version = trim(fgets($this->socket));
        $this->udphp_min = trim(fgets($this->socket));
    }

    function getServername() {
        if ($this->error != 0) return;
        if (!isset($this->servername)) {
            return $this->genericVariableError("servername");
        }
        return $this->servername;
    }

    function getVersion() {
        if ($this->error != 0) return;
        if (!isset($this->version)) {
            return $this->genericVariableError("version");
        }
        return $this->version;
    }
    
    function getUdphpMin() {
        if ($this->error != 0) return;
        if (!isset($this->udphp_min)) {
            return $this->genericVariableError("udphp_min");
        }
        return $this->udphp_min;
    }
    
    function getServerList($data1,$data2,$data3,$data4,$data5,$data6,$data7,$data8,$sortby,$sortby_dir,$limit) {
        if ($this->error != 0) return;
        fwrite($this->socket, "lobby2".chr(10));
        fwrite($this->socket, $data1.chr(10));
        fwrite($this->socket, $data2.chr(10));
        fwrite($this->socket, $data3.chr(10));
        fwrite($this->socket, $data4.chr(10));
        fwrite($this->socket, $data5.chr(10));
        fwrite($this->socket, $data6.chr(10));
        fwrite($this->socket, $data7.chr(10));
        fwrite($this->socket, $data8.chr(10));
        fwrite($this->socket, $sortby.chr(10));
        fwrite($this->socket, $sortby_dir.chr(10));
        fwrite($this->socket, $limit.chr(10));
        $code = fread($this->socket,1);
        if (ord($code) != 249) {
            return $this->genericVariableError("lobby_data");
        }
        return json_decode(trim(fgets($this->socket)),true);
    }
    
    function genericVariableError($var) {
        $this->error = 6;
        $this->errormsg = "Your master server responded unexpectedly.<br><br>Debugging details:<br>Variable name: ".$var;
        return null;
    }
            
    function __destruct() {
        if ($this->socket !== FALSE)
            fclose($this->socket);
    }
}
