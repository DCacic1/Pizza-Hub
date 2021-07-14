<?php
    if (file_exists("./src/php/dbconfig.php")) {
        include_once("./src/php/dbconfig.php");
    }

    if (file_exists("./dbconfig.php")) {
        include_once("./dbconfig.php");
    }

class Users
{
    private $conn;
    private $tableName;

    public function __construct()
    {
        $connStr = sprintf("mysql:host=%s;dbname=%s", DBConfig::HOST, DBConfig::DB_NAME);

        try {
            $this->conn = new PDO($connStr, DBConfig::USERNAME, DBConfig::PASS);
            // echo "Connected ! <br>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $this->createTableIfNotExist();

        if(count($this->read()->fetchAll())==0)
        {
            $this->insert("admin@admin.com","admin123",2);
        }

    }

    public function __destruct()
    {
        // close the database connection
        $this->conn = null;
    }

    public function createTableIfNotExist($name = "users")
    {

        $this->tableName = $name;
        //  predefiniraj podatke za administrators
        // id name password type?
        $sql = <<<EOSQL
        CREATE TABLE IF NOT EXISTS $name (
            user_id     INT AUTO_INCREMENT PRIMARY KEY,
            user_email     NVARCHAR (255)        DEFAULT NULL,
            user_password TEXT DEFAULT NULL,
            type INT        DEFAULT NULL
        );
        EOSQL;

        $this->conn->exec($sql);

        // echo "Table created ! <br>";
    }



    public function insert($user_email, $user_password, $type)
    {
        /** 
         * https://www.php.net/manual/en/pdostatement.bindparam.php
         * https://stackoverflow.com/questions/19751360/pdoparam-int-is-important-in-bindparam
         */
        $user = array(
            ':user_email' => $user_email,
            ':user_password' => md5($user_password),
            ':type' => $type
        );


        $sql = <<<EOSQL
            INSERT INTO $this->tableName(user_email, user_password, type) VALUES(:user_email,:user_password, :type);
        EOSQL;

        $query = $this->conn->prepare($sql);

        try {
            $query->execute($user);
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

$users_table = new Users();

