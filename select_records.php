<html>
<head>
    <title> Inlämning 3/ Uppgift 2 </title>
</head>
<body>
    <h1> Information om alla skivor </h1>
    <table border=1 cellpadding="5" cellspacing="0">
    <tr>
        <td height=40 bgcolor="#dddddd"> Titel</td>
        <td bgcolor="#dddddd"> Artist </td>
        <td height=40 bgcolor="#dddddd"> Utgivningsår</td>
        <td height=40 bgcolor="#dddddd"> Pris</td>
    </tr>
<?php
    $db = new PDO('mysql:host=localhost;dbname=scriptsprak;charset=utf8', 'root', '');
    $sql = "SELECT * FROM records";
    try {
        $result = $db->query($sql); 
    } catch(PDOException $ex) {
        echo "PDOException";
    }
    foreach ($result as $row) {
        echo "<tr><td>" . $row['title'] . "</td><td>" . $row['author'] . 
        "</td><td>" . $row['year'] . "</td><td>" . $row['price'] . "</td></tr>";
    }
?>
    </table>
</body>
</html>