<?php

// Creates a new instance of a class
class Configuration {

  // defining the properties
  public $id;
  public $title;
  public $description;

  // defining a method

  // contructor function - gives the variables a value

  function __construct($id, $title = '', $description = '') {

    $this -> id = $id;
    $this -> title = $title;
    $this -> description = $description;
  }

  public function __toString() {
    return "(" . $this -> id . ", "
               . $this -> title . ", "
               . $this -> description . ")";
  }
}

header('Content-Type: application/json');

include "pojo_configurazione.php";

$server = "localhost";
$username = "jolanda";
$password = "jolanda";
$dbname = "HotelDB";

$conn = new mysqli($server, $username, $password, $dbname);
if ($conn -> connect_errno) {

  echo json_encode(-1);
  return;
}

$sql = "

    SELECT *
    FROM configurazioni

";

$res = $conn -> query($sql);

$configs = [];
while($config = $res -> fetch_assoc()) {

  // Creates a new instance of the class Configuration
  $configs[] = new Configuration ($config['id'],
                                $config['title'], $config['description']);

}

foreach ($configs as $config){
  // echo json_encode($configs);
  echo $config . "\n";
}
