<?php

class DBController
{
    // Database connection
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = "phpwebshopdb";

    // Connection property
    public $con = null;

    // Call Constructor
    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if ($this->con->connect_error) {
            echo "Failed to connect to Database!" .$this->con->connect_error;
        }
    }
    public function __destruct()
    {
        $this->closeConnection();   
    }

    // Closing connection
    protected function closeConnection(){
        if ($this->con != null) {
            $this->con->close();
            $this->con = null;
        }
    }
}

