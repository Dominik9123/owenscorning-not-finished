<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

   
    $query = "SELECT * FROM uzytkownicy WHERE email = '$email' AND haslo = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "Zalogowano pomyślnie!";
    } else {
        echo "Błąd logowania. Sprawdź dane.";
    }

    $conn->close();
}
?>
