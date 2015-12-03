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
        $bangroup = 5;
        
        if(!isset($command))
        {
                $command = $_GET['command'];
        }
        if($command == "ipbans")
        {
                //$options = array('group' => '5');
                @$m_data = @$ipbwi->group->isInGroup($bangroup);
                @$final = array();
               
                if(is_array($m_data) && count($m_data) > 0){
                                                                                foreach($m_data as $M){
                                                                                $data = $ipbwi->member->info($M);
                                                                              //  if($data['member_group_id'] == $bangroup)
                                                                                $FPM = array(
                                                                                                'm_id' => $M,
                                                                                                'email' => $data['email'],
                                                                                                'ip' => $data['ip_address'],
                                                                                                );
                                                                                @array_push($final, $FPM);
                                           // Okay
                                                                                }
                                                           }
        
        
        }

          if($command == "fetch")
        {
                $exile = 25;
                $m_data = $ipbwi->member->findMemberCustomFieldValue($exile, "true");
                
                $final = array();
                if(is_array($m_data) && count($m_data) > 0){
                                                                                foreach($m_data as $M){
                                                                                $data = $ipbwi->member->info($M);
                                                                                $FPM = array(
                                                                                                'm_id' => $M,
                                                                                                'email' => $data['email'],
                                                                                                'ip' => $data['ip_address'],
                                                                                                );
                                                                                array_push($final, $FPM);
                                           
                                                                                }
                                                           }
        
        
        }

        
        $final = array("status" => true, "data" => $final);
        echo json_encode($final, JSON_UNESCAPED_SLASHES);
        exit;
?>