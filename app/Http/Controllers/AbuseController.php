<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AbuseController extends Controller
{
    public function publicRegister(){
    	return view('abuse/submit');
    }

    public function registerAbuse(Request $request)
    {

    $url = config('suitecrm.url');
    $username = config('suitecrm.username');
    $password = config('suitecrm.password');

    //function to make cURL request
    function call($method, $parameters, $url)
    {
        ob_start();
        $curl_request = curl_init();

        curl_setopt($curl_request, CURLOPT_URL, $url);
        curl_setopt($curl_request, CURLOPT_POST, 1);
        curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($curl_request, CURLOPT_HEADER, 1);
        curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_request, CURLOPT_FOLLOWLOCATION, 0);

        $jsonEncodedData = json_encode($parameters);

        $post = array(
             "method" => $method,
             "input_type" => "JSON",
             "response_type" => "JSON",
             "rest_data" => $jsonEncodedData
        );

        curl_setopt($curl_request, CURLOPT_POSTFIELDS, $post);
        $result = curl_exec($curl_request);
        curl_close($curl_request);

        $result = explode("\r\n\r\n", $result, 2);
        $response = json_decode($result[1]);
        ob_end_flush();

        return $response;
    }

    //login --------------------------------------------- 
    $login_parameters = array(
         "user_auth" => array(
              "user_name" => $username,
              "password" => md5($password),
              "version" => "1"
         ),
         "application_name" => "iDevlopmentNOC",
         "name_value_list" => array(),
    );

    $login_result = call("login", $login_parameters, $url);

   
   
    //get session id
    $session_id = $login_result->id;

    //create spam case 
    
   $ContactParameters = array(
         //session id
         "session" => $session_id,
         "module_name" => "Contacts",
         "name_value_list" => array(
              array('name' => 'first_name', 'value' => $request->get("first_name")),             
              array('name' => 'last_name', 'value' => $request->get("last_name")),
              array('name' => 'primary_address_street', 'value' => $request->get("address")),
              array('name' => 'primary_address_city', 'value' => $request->get("city")),
              array('name' => 'primary_address_state', 'value' => $request->get("state")),
              array('name' => 'primary_address_postalcode', 'value' => $request->get("postcode")),
              array('name' => 'primary_address_country', 'value' => $request->get("country")),
              array('name' => 'email1', 'value' => $request->get("email")),              
              array('name' => 'phone_work', 'value' => $request->get("phone")),
              array('name' => 'phone_mobile', 'value' => $request->get("mobile")),              
              array('name' => 'assigned_user_id', 'value' => $session_id)            

         ),
    );

        $CaseParameters = array(
         //session id
         "session" => $session_id,
         "module_name" => "Cases",
         "name_value_list" => array(
              array('name' => 'status', 'value' => 'New'),
              array('name' => 'priority', 'value' => 'P3'),              
              array('name' => 'name','value' => "[" . $request->get("type") . "][". $request->get("SpamSourceIP") ."]\n"),
              array('name' => 'type', 'value' => 'Security'),
              array('name' => 'description','value' => strip_tags(nl2br($request->get("mail_header"))))
         ),
    );

    $ContactQuery = call("set_entry", $ContactParameters, $url);
    $CaseQuery = call("set_entry", $CaseParameters, $url);
    
    echo "<h2>Contact query</h2>";
    echo "<pre>". print_r($ContactQuery->id)."</pre>";
    echo "<hr>";
    echo "<h2>Case query</h2>";
    echo "<pre>". print_r($CaseQuery->id)."</pre>";

    //relate Contact to Case 
    $relationshipCasetoContact = array(
        'session' => $session_id,
        'module_name' => 'Cases',
        'module_id' => $CaseQuery->id,
        'link_field_name' => 'contacts',
        'related_ids' => urlencode($ContactQuery->id)
    );
    $relationshipResult = call('set_relationship', $relationshipCasetoContact, $url);


    echo "<hr>";
    echo "<h2>Contact Relationship</h2>";
    echo "<pre>";
    print_r($relationshipResult);
    echo "</pre>";

    
  }
}
