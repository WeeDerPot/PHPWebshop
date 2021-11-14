<?php

// Fetch product data
class Product
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // getData Method
    public function getData($table ='termekek'){
        if ($table == 'kosar') {
            $result = $this->db->con->query( query: "SELECT * FROM `kosar`");
        } else {
            $result = $this->db->con->query( query: "
                SELECT `termek_id`, `termek_nev`, `termek_ar`, `termek_kep`, `borvidekek`.`videk`, `bortipusok`.`tipus`, `borjellegek`.`jelleg`, `termek_mennyiseg` 
                FROM `termekek`
                INNER JOIN `borvidekek` ON `termekek`.`termek_videk` = `borvidekek`.`videk_id`
                INNER JOIN `bortipusok` ON  `termekek`.`termek_tipus` = `bortipusok`.`tipus_id`
                INNER JOIN `borjellegek` ON `termekek`.`termek_jelleg` = `borjellegek`.`jelleg_id`;"
            );
        } 
        
        // SELECT * FROM {$table}
        $resultArray = array();

        // fetching data 1 by 1
        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    // get product using termek_id
    public function getProduct($termek_id = null, $table = 'termekek'){
        if (isset($termek_id)) {
            $result = $this->db->con->query( query: "SELECT * FROM {$table} WHERE termek_id = {$termek_id}");
            
            $resultArray = array();

            // fetching data 1 by 1
            while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }
}