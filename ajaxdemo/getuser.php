<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','My.SQL.#.i100','student');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

echo "we are connected ";

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM users WHERE id = '".$q."'";
$result = mysqli_query($con,$sql) or die( mysqli_error($con));

echo "<table>
<tr>
<th>Prenom</th>
<th>Nom de Famille</th>
<th>Age</th>
<th>Village</th>
<th>Occupation</th>
</tr>";


while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['FirstName'] . "</td>";
  echo "<td>" . $row['LastName'] . "</td>";
  echo "<td>" . $row['Age'] . "</td>";
  echo "<td>" . $row['Village'] . "</td>";
  echo "<td>" . $row['Occupation'] . "</td>";
  echo "</tr>";
}
echo "</table>";



mysqli_close($con);

?>
</body>
</html>
