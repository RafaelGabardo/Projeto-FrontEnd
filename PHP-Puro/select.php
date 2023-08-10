<?php
    include_once('connect.php');

    if(isset($_POST['submit'])) {
        $username = $_POST['user'];
        $pass = $_POST['password'];

        $sql = "
            SELECT
                `username` OR `email` AND `password`
            FROM
                `profiles`
            WHERE
                `username`= '$username',`email` = '$username',`password` = '$pass'
        ";

        $prepare = $conn->prepare($sql);

        $query = $conn->query($prepare);

        if($query) {
            echo('Usuário logado');
        } else {
            echo('Usuário não cadastrado');
        }
    }
?>