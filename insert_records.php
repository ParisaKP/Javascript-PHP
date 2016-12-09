<?php
    $title = $_POST['titel'];
    $artist = $_POST['artist'];
    $year = $_POST['year'];
    $pris = $_POST['pris'];
    $db = new PDO('mysql:host=localhost;dbname=scriptsprak;charset=utf8', 'root', '');
    $sql = "INSERT INTO records (title, author, year, price)
    SELECT '$title', '$artist', '$year', '$pris'
    FROM records
    WHERE NOT EXISTS(
        SELECT title, author, year, price
        FROM records
        WHERE title = '$title'
            AND author = '$artist'
            AND year = '$year'
            AND price = '$pris'
    )
    LIMIT 1";
    try {
        $result = $db->query($sql); 
        if ($result->rowCount() > 0)
            echo "Skivan $title $artist, $year, $pris har blivit registrerd.";
        else
            echo "Inga nya uppgifter sparad.";
    } catch(PDOException $ex) {
        echo "PDOException";
    }
?>