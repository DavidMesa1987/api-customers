<?php
require_once('models/customer_model.php');

class CustomerController {
    private $customerModel;

    public function __construct() {
        $this->customerModel = new Customer();
        echo '';
    }

    // Metodo per prendere tutti gli users

    public function getCustomers() {
        //Prendiamo i dati users dal DB
        try {
            $allCustomers = $this->customerModel->getAllCustomers();

            $customerArray = [];
            foreach($allCustomers as $customer){
                $row = [
                    'nome' => $customer->nome,
                    'cognome' => $customer->cognome,
                    'gender' => $customer->gender,
                    'created_date' => $customer->created_date
                ];

                $customerArray[] = $row;
            }
            
            header('Content-Type: application/json');
            echo json_encode($customerArray);

        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(array("message" => "Errore durante il recupero degi Customers: " . $e->getMessage()));
        }
    }

}
?>