<?php

require_once "PDODb.php";

class User {
    protected $userID;
    protected $pointValue;
    protected $expiration;
    protected $expDate;

    public function __construct($input){
        if(isset($input['userID'])){
            $this->userID = $input['userID'];
        }

        if(isset($input['pointValue'])){
            $this->pointValue = $input['pointValue'];
        }

        if(isset($input['expiration'])){
            $this->expiration = $input['expiration'];
        }

        $date = new DateTime();
        $date->add(new DateInterval('P30D'));
        $this->expDate = $date->format('Y-m-d H:i:s'); 
        
    }

    public function updateUserPoints(){
        $cur = $this->buildExpirationJson();
        $updatedPoints = $cur[0];
        $json = $cur[1];
        
        $data = ['points' => $updatedPoints, 'expiration' => $json];
        $db = new PDODb('mysql');
        $db->connect();
        $db->where('id', $this->userID);
        if ($db->update('users', $data)) {
            echo 'Success';
        } else {
            echo 'Error:' . $db->getLastError();
        }
    }

    private function buildExpirationJson(){
       // build expiration data
       $record = $this->getRecordsByUserID();
     
       $exp = []; 
       $decoded = json_decode($record['expiration']);
       if(isset($record['expiration']) && $record['expiration'] != ""){
        foreach($decoded as $k => $v){
            
            $currentExp = $k;
            $currentPoints = $v;
            array_push($exp,[$k => $v]);
       }

       array_push($exp,[$this->expDate => $record['points'] + $this->pointValue]);
       }else{
            array_push($exp,[$this->expDate => $record['points'] + $this->pointValue]);
       }

       return [$record['points'] + $this->pointValue, json_encode($exp)];
    }

    private function getRecordsByUserID(){
        $db = new PDODb('mysql');
        $db->connect();
        $db->where("id", $this->userID);
        $result = $db->get('users');
        return $result[0];
    }

    public static function getUsers(){
        
        $db = new PDODb('mysql');
        $db->connect();
        $data = $db->get('users');

        if($data){
            return $data;
        }else{
            return false;
        }
    }

}