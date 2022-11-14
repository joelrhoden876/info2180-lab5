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
$city = $_REQUEST["city"]; 

//Selects countries which match the country name entered in the searchfield. 
if (isset($country)){
  if ($country != ""){
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    showCountryTable($results);
  }
  if ($country == ""){
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $stmt = $conn->query("SELECT * FROM countries");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    showCountryTable($results);
  }
}

//Selects the list of cities in the country that is entered. 
if (isset($city)){
  if ($city != ""){
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $stmt = $conn->query("SELECT c.district, c.name as city, c.country_code, cs.name as country, c.population FROM cities c join countries cs on c.country_code = cs.code WHERE cs.name LIKE '%$city%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    showCityTable($results);
  }

  else if ($city == ""){
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $stmt = $conn->query("SELECT * FROM countries");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    showCountryTable($results);
  }
}


//Displays html table containing the results from the country request. 
function showCountryTable($results){
  echo "<table><style>table,th{width:100%;height:100%;border:1px solid black;border-collapse: collapse;table-layout:fixed;margin-left:auto;margin-right:auto;}td{border:1px solid black;padding:10px;}</style><tr>
  <th>Name</th>
  <th>Continent</th>
  <th>Independence</th>
  <th>Head of State</th>
  </tr>";
  foreach ($results as $row){
    echo "<tr>"."<td>".$row['name']."</td>"."<td>".$row['continent']."</td>"."<td>".$row['independence_year']."</td>"."<td>".$row['head_of_state']."</td>"."</tr>";
  
  }
}

//Displays html table containing the results from the city request. 
function showCityTable($results){
  echo "<table><style>table,th{width:100%;height:100%;border:1px solid black;border-collapse: collapse;table-layout:fixed;margin-left:auto;margin-right:auto;}td{border:1px solid black;padding:10px;}</style><tr>
  <th>Name</th>
  <th>District</th>
  <th>Population</th>
  </tr>";
  foreach ($results as $row){
    echo "<tr>"."<td>".$row['city']."</td>"."<td>".$row['district']."</td>"."<td>".$row['population']."</td>"."<td>"."</tr>";
  }
}

  
?>

