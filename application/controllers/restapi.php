<?php 

class restapi extends CI_Controller{

  function callAPI($method, $url, $data){
      $curl = curl_init();
      switch ($method){
        case "POST":
          curl_setopt($curl, CURLOPT_POST, 1);
          if ($data)
              curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
          break;
        case "PUT":
          curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
          if ($data)
              curl_setopt($curl, CURLOPT_POSTFIELDS, $data);            
          break;
        default:
          if ($data)
              $url = sprintf("%s?%s", $url, http_build_query($data));
      }
      // OPTIONS:
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          'x-api-key: f99aecef3d12e02dcbb6260bbdd35189c89e6e73',
          'Content-Type: application/json',
      ));
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      // EXECUTE:
      $result = curl_exec($curl);
      if(!$result){die("Connection Failure");}
      curl_close($curl);
      return $result;
    }
}
 ?>