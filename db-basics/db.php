<?php
/*
$db = new SQLite3('test.db');

$stm = $db->prepare('SELECT * FROM cars WHERE id=:id');
$stm->bindValue('id', 1);

$res = $stm->execute();


while ($row = $res->fetchArray()) {
    echo "{$row['id']} {$row['name']} {$row['price']} \n";
}
*/

$db2 = new SQLite3('test.db');
$stmt = $db2->prepare('SELECT * FROM cars where name=:name');
$stmt->bindValue('name', 'Audi');

$res = $stmt->execute();

while($row = $res->fetchArray()) {
    echo "{$row['id']} {$row['name']} {$row['price']} \n";
}