<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
// $stmt = $conn->query("SELECT * FROM countries");
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$country = $_REQUEST["country"];
// echo "<table>
// <style>
// table,th,td{
//   border:1px solid black;
//   border-collapse: collapse;
// }
// </style>
// <tr>
// <th>Firstname</th>
// <th>Lastname</th>
// <th>Age</th>
// </tr>
// <td>.$country.</td>
// <td></td>
// <td></td>
// </table>";




if ($country != ""){
  $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  showTable($results);
  // foreach ($results as $row){
  //   // showTable($results);
  //   //echo "<li>".$row['name'] . ' is ruled by ' . $row['head_of_state']."</li>"; 
  //   //echo "<table>"."<tr>"."<th>"."Firstname"."</th>"."</tr>"."</table>";
  // } 
}
if ($country == ""){
  $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
  $stmt = $conn->query("SELECT * FROM countries");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  showTable($results);
  // foreach ($results as $row){
  //   echo "<li>".$row['name'] . ' is ruled by ' . $row['head_of_state']."</li>"; 
  // } 
}

function showTable($results){
  echo "<table><style>table,th{width:100%;height:100%;border:1px solid black;border-collapse: collapse;table-layout:fixed;margin-left:auto;margin-right:auto;}td{border:1px solid black;padding:10px;}</style><tr>
  <th>Name</th>
  <th>Continent</th>
  <th>Independence</th>
  <th>Head of State</th>
  </tr>";
  foreach ($results as $row){
    //echo "<li>".$row['name'] . ' is ruled by ' . $row['head_of_state']."</li>"; 
    echo "<tr>"."<td>".$row['name']."</td>"."<td>".$row['continent']."</td>"."<td>".$row['independence_year']."</td>"."<td>".$row['head_of_state']."</td>"."</tr>";
  
  }
}

  
?>

