<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$query = $_GET["country"];
$cityState = filter_var($_GET["city"], FILTER_VALIDATE_BOOLEAN);

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if (!$cityState):
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$query%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>
  <table>
    <tr>
      <th>Country Name</th>
      <th>Continent</th>
      <th>Independence Year</th>
      <th>Head of State</th>
    </tr>
  <?php foreach ($results as $row): ?>
    <tr>
      <td><?= $row['name']; ?></td>
      <td><?= $row['continent']; ?></td>
      <td><?= $row['independence_year']; ?></td>
      <td><?= $row['head_of_state']; ?></td>
    </tr>
  <?php endforeach; ?>
  </table>
<?php
elseif ($cityState && $query != ""):
  $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities INNER JOIN countries ON cities.country_code=countries.code WHERE countries.name LIKE '%$query%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>
  <table>
      <tr>
      <th>City Name</th>
      <th>District</th>
      <th>Population</th>
    </tr>
  <?php foreach ($results as $row): ?>
    <tr>
      <td><?= $row['name']; ?></td>
      <td><?= $row['district']; ?></td>
      <td><?= $row['population']; ?></td>
    </tr>
  <?php endforeach; ?>
  </table>
<?php
else:
?>
  <p>Enter a country name, please!</p>
<?php
endif;
?>
