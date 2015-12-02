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
        $member_data = $ipbwi->member->findMemberCustomFieldValue($exile, true);
        $final = array("status" => true, "data" =>         ;
        echo json_encode($final, JSON_UNESCAPED_SLASHES);
        exit;
?>