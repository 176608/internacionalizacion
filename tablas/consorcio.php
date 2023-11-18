<style>
    table{
        border:1px solid black;
    }
    td{
        border:1px solid black;
    }
</style>
 
<?php
require_once '../db.php';
 
$sql = "SELECT * FROM consorcio";
$result = $conn->query($sql);
    echo "<table>";
if ($result !== false && $result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
 
    echo "<tr>";
    echo "<td>".$row["id_consorcio"]." - ".$row["Siglas"]."</td>";
    echo "<td>".$row["Nombre"]."</td>";
    echo "<td>".$row["Enlace"]."</td>";
    echo "<td>".$row["Tipo"]."</td>";
    echo "<td>".$row["Procedencia"]."</td>";
    echo "<td>".$row["Instrumento"]."</td>";
    echo "</tr>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>