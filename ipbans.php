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
        if(!isset($command))
        {
                $command = $_GET['command'];
        }
        if($command == "ipbans")
        {
                //$options = array('group' => '5');
                //$m_data = $ipbwi->member->getList($options);
                $i = 5; // Group for Bans
                $sql_tbl_prefix = '';
                $where = 'm.member_group_id="'.$i.'" ';
                $where = 'WHERE m.member_id != "0" AND ('.$where.')';
                $ipbwi->ips_wrapper->DB->query('SELECT m.*, g.*, cf.* FROM '.$sql_tbl_prefix.'members m LEFT JOIN '.$sql_tbl_prefix.'groups g ON (m.member_group_id=g.g_id) LEFT JOIN '.$sql_tbl_prefix.'pfields_content cf ON (cf.member_id=m.member_id) '.$where.';');
                $final = array();
                while($row = $ipbwi->ips_wrapper->DB->fetch()){
                        $m_data[$row['member_id']] = $row;
                  }
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