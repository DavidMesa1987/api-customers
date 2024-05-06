<?php

require_once('db/db.php');

class Customer {

    private $con;

    public function __construct() {
        $connection = new Database();

        $this->con = $connection->getInstance()->getConnection();

    }

    public function getAllCustomers(){

        $arrCustomers = [];

        $result = $this->con->query("SELECT * FROM customer"); 

        if ($result->num_rows > 0) {
            // output data of each row
              while($row = $result->fetch_assoc()) {

                $sutomer                = new CutomerModel();
                $sutomer->nome          =  $row["nome"];
                $sutomer->cognome       =  $row["cognome"];
                $sutomer->gender        =  $row["gender"];
                $sutomer->created_date  =  $row["created_date"];

                $arrCustomers[] = $sutomer;
              }

              return  $arrCustomers;
              
          } else {
            return [];
          }
    }
        
}

class CutomerModel {

    public $nome;
    public $cognome;
    public $gender;
    public $created_date;

}

?>