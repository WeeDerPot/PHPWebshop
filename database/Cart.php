<?php

// Cart class
class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert into cart table
    public function insertIntoCart($params = null, $table = "kosar"){
        if ($this->db->con != null) {
            if ($params != null) {
                $columns = implode( ',', array_keys($params) );
                // print_r($columns);
                $values = implode( ',', array_values($params) );
                // print_r($values);

                // Create sql query
                $query_string = sprintf( "INSERT INTO `%s` (%s) VALUES (%s);", $table, $columns, $values );
                // print_r($query_string);

                // Execute Query
                $result = $this->db->con->query($query_string);
                return $result;
                // print_r($result);

            }
        }
    }

    // get user_id and termek_id and insert into cart
    public function addToCart($userid, $termekid){
        if (isset($userid) && isset($termekid)){
            $params = array(
                "user_id" => $userid,
                "termek_id" => $termekid
            );

            // insert data and reload page
            $result = $this->insertIntoCart($params);
            if ($result) {
                header("Location: productspage.php");
            }
        }
    }

    // Delete cart item using termek_id
    public function deleteFromCart($termek_id = null, $table = 'kosar'){
        if ($termek_id != null) {
            $result = $this->db->con->query( query: "DELETE FROM {$table} WHERE `termek_id` = {$termek_id}" );
            if($result){
                header( "Location".$_SERVER['PHP_SELF'] );
            }
        }
    }

    // Calculate total
    public function getSum($arr){
        if (isset($arr)) {
            $sum = 0;
            foreach ($arr as $item){
                $sum += intval($item[0]);
                // foreign currency: floatval($item[0])
            }
            return $sum;
            // foreign currency: sprintf( '%.2f', $sum )
        }
    }
}