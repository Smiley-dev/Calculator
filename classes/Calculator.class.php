<?php

/*
 * Calculator class
 * Getting data from request
 * Printing results
 * Adding data to Database
 */

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


            $this->addToDB();
            $this->printResult();


        }

    }
    
    public function printResult(){
        
        //Insert this in div with id expresion if GET request is sent
        echo "<small>Factor 1 = {$this->factor1} &emsp;
                 Factor 2 = {$this->factor2} &emsp; 
                 Operation = {$this->operation} (multiply) &emsp; 
                 Result = {$this->result}</small><br>
             <h3>Expresion: {$this->factor1} x {$this->factor1}</h3>
             <h2>Result: {$this->result}</h2>";
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


}
