<?php
    $dbtype = 'mysql';
    $dbname = 'projeto-frontend';
    $user = 'root';
    $servername = 'localhost';
    $password = '';
    $options = [
        PDO::ATTR_PERSISTENT => TRUE,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
    ];

    $pdoConnection = $dbtype . ':host=' . $servername . ';dbname=' . $dbname;

    if(isset($_POST['submit'])) {
        try {
            $conn = new PDO($pdoConnection, $user, $password, $options);
        } catch(PDOException $e) {
            echo 'Conexão falhou!' . $e->getMessage();
        }
    }
?>