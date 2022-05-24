<?php
include 'Connection/Connection.php';

class Reusable
{
    public  $connect;
    public function __construct()
    {
        $this->connect = connect();
    }

    public function allPhone()
    {
        $sql = "SELECT * FROM Phone;";
        $result = $this->connect->query($sql);
        $row = $result->fetch_assoc();
        $this->connect->close();
        return json_encode($row);
    }

    public function insertContactPhones($contact_id, $phone_id)
    {
        if ($contact_id == "" && $phone_id == "" && $contact_id > 0 && $phone_id > 0){
            echo "Debe de llenar los campos";
            return;
        }
        $sql = "INSERT INTO contactphones (contact_id, phone_id) VALUES ('$contact_id', '$phone_id');";
        if ($this->connect->query($sql) === true) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->connect);
        }
        mysqli_close($this->connect);
    }

    public function insertPhone($number, $type)
    {
        if ($number == "" && $type == ""){
            echo "Debe de llenar los campos";
            return;
        }
        $sql = "INSERT INTO Phone (number_phone, type_phone) VALUES ('$number', '$type');";
        if ($this->connect->query($sql) === true) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->connect);
        }
        mysqli_close($this->connect);
    }

    public function insertContact($nombre, $apellido, $email)
    {
        if ($nombre == "" && $apellido == "" && $email == ""){
            echo "Debe de llenar los campos";
            return;
        }
        $sql = "INSERT INTO Contact (nombre, apellido, email) VALUES ('$nombre', '$apellido', '$email');";
        if ($this->connect->query($sql) === true) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->connect);
        }
        mysqli_close($this->connect);
    }

    public function allContact()
    {
        $sql = "SELECT * FROM Contact;";
        $result = $this->connect->query($sql);
        $row = $result->fetch_assoc();
        $this->connect->close();
        return json_encode($row);
    }

    public function deleteContact($contact_id)
    {
        $sql = "DELETE FROM Contact WHERE contact_id = $contact_id ;";
        $result = $this->connect->query($sql);
        $this->connect->close();
    }
}