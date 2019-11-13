<?php

class Calculator {

    private $db;

    private $factor1;
    private $factor2;
    private $operation = '*';
    private $result;

    public function __construct()
    {
        $this->db = new Database();

        if (isset($_GET['factors'])){

            $factors = explode('x', $_GET['factors']);
            //Get factors from GET global
            $this->factor1 = $factors[0];
            $this->factor2 = $factors[1];


            //Set result by multiplying factors from table
            $this->result = (int)$this->factor1 * (int)$this->factor2;
        }
    }


    //Add factors, operation and result in Database
    public function addToDB(){
        //SQL query
        $this->db->query('INSERT INTO results (factor1, factor2, operation, result) VALUES (:factor1, :factor2, :operation, :result)');

        //Binding values
        $this->db->bind(':factor1', $this->factor1);
        $this->db->bind(':factor2', $this->factor2);
        $this->db->bind(':operation', $this->operation);
        $this->db->bind(':result', $this->result);

        //Execute query
        $this->db->execute();
    }

    public function getData(){
        return array($this->factor1, $this->factor2, $this->operation, $this->result);
    }
}