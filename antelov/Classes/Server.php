<?php
    /*
        get_banners
    */
    class Server {
        private function startSession() {
            ob_start();
            session_start();
        }
        private function endSession() {
            session_unset();
            session_destroy();
        }
        
        public function get_server_data() {
            $server = $_SERVER['SERVER_NAME']; // localhost
            $uriArray = explode('/', $_SERVER['REQUEST_URI']);
            $pagename = basename($_SERVER["SCRIPT_FILENAME"], '.php');

            if($server === 'localhost') {
                $folder = $uriArray[2]; // Folder name
                if($folder === "admin") {
                    $path = '../';
                    $scriptArray = explode('/', $_SERVER['SCRIPT_NAME']);
                    $scriptFull = explode('.', $scriptArray[3]);
                    $scriptName = $scriptFull[0];  
                    $scriptType = $scriptFull[1]; 
                } else {
                    $path = './';
                    $scriptArray = explode('/', $_SERVER['SCRIPT_NAME']);
                    $scriptFull = explode('.', $scriptArray[2]);
                    $scriptName = $scriptFull[0];  
                    $scriptType = $scriptFull[1]; 
                }
            } else {
                $folder = $uriArray[1];
                if($folder === "admin") {
                    $path = '../';
                    $scriptArray = explode('/', $_SERVER['SCRIPT_NAME']);
                    $scriptFull = explode('.', $scriptArray[2]);  
                    $scriptName = $scriptFull[0];  
                    $scriptType = $scriptFull[1]; 
                } else {
                    $path = './';
                    $scriptArray = explode('/', $_SERVER['SCRIPT_NAME']);
                    $scriptFull = explode('.', $scriptArray[1]);
                    $scriptName = $scriptFull[0];
                    $scriptType = $scriptFull[1];
                }
            }

            $s = array(
                'server' => $server,
                'uri' => $uriArray,
                'pagename' => $pagename,
                'directory' => $folder,
                'rel_path' => $path,
                'script_name' => $scriptName,
                'script_type' => $scriptType
            );
            return $s;
        }
    }
?>