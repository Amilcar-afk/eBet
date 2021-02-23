<?php
$stmt = $bdd->query('SELECT login,city,countVictory FROM USR ORDER BY countVictory DESC LIMIT 3');

echo '<table>';
echo '<tr><th>login</th><th>country</th><th>Victory numbers</th></tr>';

while( ($usr = $stmt->fetch(PDO::FETCH_ASSOC)) !== false){
    $cty = $bdd->query('SELECT nom_fr_fr FROM COUNTRY WHERE id='.$usr['city']);
    $country = $cty->fetch(PDO::FETCH_ASSOC);
    echo '<tr>';
    echo '<td>' . $usr['login'] . '</td>';
    echo '<td>' . $country['nom_fr_fr'] . '</td>';
    echo '<td>' . $usr['countVictory'] . '</td>';
}
echo '</table>';

?>
