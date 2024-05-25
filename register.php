<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $username = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['password'];


  
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "baza";

    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Błąd połączenia z bazą danych: " . $conn->connect_error);
    }

    $query = "INSERT INTO uzytkownicy (nazwa, email, haslo) VALUES ('$username', '$email', '$password')";

    if ($conn->query($query) === TRUE) {
        echo "Rejestracja zakończona sukcesem!";
    } else {
        echo "Błąd podczas rejestracji: " . $conn->error;
    }

    $conn->close();
}
?>
