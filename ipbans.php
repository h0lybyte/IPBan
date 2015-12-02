<?php

        header('Content-Type: application/json');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Methods: GET, POST");
        header("Access-Control-Allow-Headers: Content-Type, *");
        require_once('/var/www/c/ipbwi/ipbwi.inc.php');
        function h0lybyte()
        {
                return json_decode(file_get_contents("php://input"));
        }
        @$data = @h0lybyte();
        @$command = @$data->command;
    
        /**  
         *  
         * 
         * 
         * 
         * */
         
        
        $final = array("status" => true, "data" =>  $ipbwi->member->getList(array('order' => 'asc', 'start' => '0', 'limit' => '-1', 'orderby' => 'name', 'group' => '5')));
        echo json_encode($final, JSON_UNESCAPED_SLASHES);
        exit;
         


?>