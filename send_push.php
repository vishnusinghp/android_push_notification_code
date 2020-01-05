      <?php 
      $url = 'https://fcm.googleapis.com/fcm/send';
        $token = '';// your gcm_token
        
        $load = array();
        $load['title'] = 'Taxiapp';
        $load['msg'] = 'You have a new ride';
        $load['action'] = 'PENDING';
        $key = 'server key';
        $fields = array(
            'registration_ids' => $token,
            'data' => $load,
            'priority' => 'high'
        );
        $headers = array(
            'Authorization: key=' . $key,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields, true));
        $result = curl_exec($ch);
        //echo $result; die;
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result;
  ?>      
