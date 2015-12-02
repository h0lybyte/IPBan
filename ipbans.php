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
        $exile = '5';
        $m_data = $ipbwi->member->findMemberCustomFieldValue($exile, true);
        
        $final = array();
        if(is_array($m_data) && count($m_data) > 0){
                                                                        foreach($m_data as $M){
                                                                        $FPM = array(
                                                                                        'name' => $PM['name'], 
                                                                                        'map_last_topic_reply' => $PM['map_last_topic_reply'],
                                                                                        'map_topic_id' => $PM['map_topic_id'],
                                                                                        'mt_title' => $PM['mt_title']);
                                                                        array_push($final, $FPM);
                                   
                                    }
                                                                }




        
        
        
        $final = array("status" => true, "data" => $member_data);
        echo json_encode($final, JSON_UNESCAPED_SLASHES);
        exit;
?>