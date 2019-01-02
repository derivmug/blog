<?php

class Model {

    private $table;
    private $table_fields;

    protected static $pdo;

    /**
     * Class constructor
     * 
     * @param string $table The name of the database table this model belongs to
     * @param array $table_fields The fields a new database entry needs to be created
     */
    function __construct($table, $table_fields) {

        $this->table = $table;
        $this->table_fields = $table_fields;

    }


    /**
     * Returns all database entries in the table of this model
     * 
     * @return array A list of database entries
     */
    public function get_all() {

        $select_statement = "SELECT * FROM $this->table";
        return self::$pdo->query($select_statement);

    }


    /**
     * Stores a new entry to the database
     * 
     * @param array $field_values An associative array containing the values for each table_field of the new array
     * 
     * @return bool True if the INSERT was successful, false if not
     */
    public function create_new($field_values) {

        // Check that each of the keys in $field_values is also in $table_fields and create a string of them necessary for the SQL query, also create an array of the values in the same order as the keys

        $key_string = "";
        $placeholder_string = "";

        // Check for any values provided which are not in $table_fields
        $array_field_values = array();
        foreach ($field_values as $key => $value) {
            if (!in_array($key, $this->table_fields)) return false;

            $key_string .= $key.", ";
            $placeholder_string .= "?, ";

            $array_field_values[] = $value;
        }

        // Remove the space and comma from the last value
        $key_string = substr($key_string, 0, -2);
        $placeholder_string = substr($placeholder_string, 0, -2);

        // Prepare and execute the insert statement
        $insert_string = "INSERT INTO $this->table ($key_string) VALUES ($placeholder_string)";
        $insert_statement = self::$pdo->prepare($insert_string);

        return $insert_statement->execute($array_field_values);

    }


    /**
     * Delete all table entries with the given value in the key field
     * 
     * @param string $key The key to look for (table column)
     * @param string|int|float $value The value the key of the table entry must have
     * 
     * @return bool True if the operation was successful, false if not
     */
    public function delete_by_key_value($key, $value) {

        if (!in_array($key, $this->table_fields)) return false;

        $delete_statement = self::$pdo->prepare("DELETE FROM $this->table WHERE $key = :$key");
        return $delete_statement->execute(array($key => $value));

    }

    /**
     * Select all table entries with the given value in the key field
     * 
     * @param string $key The key to look for (table column)
     * @param string|int|float $value The value the key of the table entry must have
     * 
     * @return array List of table entries
     */
    public function get_all_by_key_value($key, $value) {

        if (!in_array($key, $this->table_fields)) return false;

        $select_statement = self::$pdo->prepare("SELECT * FROM $this->table WHERE $key = :$key");
        $select_statement->execute(array($key => $value));
        return $select_statement->fetch();

    }

    /**
     * Returns the id of the last inserted entry
     * 
     * @return int Id of the last inserted entry
     */
    public function get_last_insert_id() {

        return self::$pdo->lastInsertId();

    }


    /**
     * Sets the PDO
     */
    public static function set_pdo($pdo) {

        self::$pdo = $pdo;

    }

}

