<?php
    
    if (file_exists("./dbconfig.php")){
        include_once("./dbconfig.php");
    }
    if (file_exists("./src/php/dbconfig.php")){
        include_once("./src/php/dbconfig.php");
    }
    
    class Products
    {
        private $conn;
        private $tableName;
    
    
        public function __construct()
        {
    
            $connStr = sprintf("mysql:host=%s;dbname=%s", DBConfig::HOST, DBConfig::DB_NAME);
    
            try {
                $this->conn = new PDO($connStr, DBConfig::USERNAME, DBConfig::PASS);
                // echo "Connected !  <br>";
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
    
            $this -> createTableIfNotExist();

            if(count($this->read()->fetchAll())==0)
            {
                $this->insert("Pizza","https://upload.wikimedia.org/wikipedia/commons/a/a3/Eq_it-na_pizza-margherita_sep2005_sml.jpg",20,60);
            }
    
    
        }
    
        public function __destruct()
        {
            // close the database connection
            $this->conn = null;
        }
    
        public function createTableIfNotExist($name = "products")
        {   
            $this->tableName = $name;
            $sql = <<<EOSQL
            CREATE TABLE IF NOT EXISTS $name (
                product_id  INT AUTO_INCREMENT PRIMARY KEY,
                product_name TEXT DEFAULT NULL,
                product_image_url TEXT DEFAULT NULL,
                product_quantity INT DEFAULT NULL,
                product_price INT DEFAULT NULL
            );
            EOSQL;
    
            $this->conn->exec($sql);
            // echo "Table created ! <br>";
        }

        public function deleteByID($id)
        {
            $sql = <<<EOSQL
            DELETE FROM `$this->tableName` WHERE $this->tableName . product_id = $id;
            EOSQL;
    
            $this->conn->exec($sql);
            // echo 'deleted';
        }
    
    
    
        public function insert( $product_name, $product_image_url, $product_quantity, $product_price)
        {

            $todoTask = array(
                ':product_name' => $product_name,
                ':product_image_url' => $product_image_url,
                ':product_quantity'=> $product_quantity,
                ':product_price' => $product_price
            );
    
    
            $sql = <<<EOSQL
                INSERT INTO  $this->tableName(product_name, product_image_url, product_quantity, product_price) VALUES(:product_name,:product_image_url, :product_quantity, :product_price);
            EOSQL;
    
            $query = $this->conn->prepare($sql);
    
            try {
                $query->execute($todoTask);
                // echo "Inserted !";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    
        public function read()
        {
            $sql = <<<EOSQL
                SELECT * FROM $this->tableName;
            EOSQL;
    
            $query = $this->conn->prepare($sql);
    
            try {
                $query->execute();
                $query->setFetchMode(PDO::FETCH_ASSOC);
                return $query;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
    
    $products_table = new Products();