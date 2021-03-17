<?php
$conn = new mysqli("localhost", "root", "");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error . "<br>");
}

// Create database
$sql = "CREATE DATABASE CrysisRunnerDB";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully<br>";
} else {
  echo "Error creating database: " . $conn->error . "<br>";
  exit;
}
$conn->close();

//createTables
$conn = new mysqli("localhost", "root", "", "CrysisRunnerDB");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error . "<br");
}

$sql = "CREATE TABLE User (
  userID BIGINT(10) UNSIGNED UNIQUE AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(20) NOT NULL UNIQUE,
  password VARCHAR(20) NOT NULL,
  phone CHAR(11) NOT NULL,
  position VARCHAR(10) NOT NULL,
  dateJoined DATE NOT NULL
)";
if ($conn->query($sql) === TRUE) {
  echo "Table User created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error . "<br>";
}

$sql = "CREATE TABLE Trip (
  tripID BIGINT(10) UNSIGNED UNIQUE AUTO_INCREMENT PRIMARY KEY,
  description VARCHAR(100) NOT NULL,
  crisisType VARCHAR(10) NOT NULL,
  tripDate Date NOT NULL,
  location VARCHAR(50) NOT NULL,
  minVolunteers INT(3) NOT NULL,
  maxVolunteers INT(3) NOT NULL,
  minDuration INT(3) NOT NULL,
  requirements VARCHAR(50) NOT NULL,
  staffID BIGINT(10) UNSIGNED,
  FOREIGN KEY (staffID) REFERENCES User(userID)
)";
if ($conn->query($sql) === TRUE) {
  echo "Table Trip created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error . "<br>";
}

$sql = "CREATE TABLE Document (
  documentID BIGINT(10) UNSIGNED UNIQUE AUTO_INCREMENT PRIMARY KEY,
  expiryDate DATE NOT NULL,
  image VARBINARY(30000000) NOT NULL,#num means 30MB
  documentType VARCHAR(11) NOT NULL,
  userID BIGINT(10) UNSIGNED,
  FOREIGN KEY (userID) REFERENCES User(userID)
)";
if ($conn->query($sql) === TRUE) {
  echo "Table Document created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error . "<br>";
}

$sql = "CREATE TABLE Application (
  applicationID BIGINT(10) UNSIGNED UNIQUE AUTO_INCREMENT PRIMARY KEY,
  applicationDate DATE NOT NULL,
  status VARCHAR(8) DEFAULT 'NEW',
  remarks VARCHAR(20),
  userID BIGINT(10) UNSIGNED,
  tripID BIGINT(10) UNSIGNED,
  FOREIGN KEY (userID) REFERENCES User(userID),
  FOREIGN KEY (tripID) REFERENCES Trip(tripID)
)";
if ($conn->query($sql) === TRUE) {
  echo "Table Application created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error . "<br>";
}
$sql = "SELECT * FROM User;";
$result = $conn->query($sql);
if(mysqli_num_rows($result) == 0){
  $sql = "INSERT INTO User(username, password, phone, position, dateJoined)
  VALUES ('manager', 'password', '601-2345678', 'Manager', '2020-04-08');";
  $sql .= "INSERT INTO User(username, password, phone, position, dateJoined)
  VALUES ('admin', 'password', '601-2348424', 'Admin', '2020-12-08');";
  $sql .= "INSERT INTO User(username, password, phone, position, dateJoined)
  VALUES ('volunteer1', 'password', '601-2323524', 'Volunteer', '2021-01-08');";
  $sql .= "INSERT INTO User(username, password, phone, position, dateJoined)
  VALUES ('volunteer2', 'password', '601-2637524', 'Volunteer', '2021-01-08');";

  if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully<br>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
  }
  $conn->close();

  //createTables
  $conn = new mysqli("localhost", "root", "", "CrysisRunnerDB");
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . "<br");
  }

  $sql2 = "INSERT INTO Trip(description, crisisType, tripDate, location,
    minVolunteers, maxVolunteers, minDuration, requirements, staffID)
  VALUES ('Help someone in drowning', 'FLOOD', '2021-04-03', 'Taman Tun, KL, Malaysia'
    , 10, 15, 4, 'Swimming', 2);";
  $sql2 .= "INSERT INTO Trip(description, crisisType, tripDate, location,
    minVolunteers, maxVolunteers, minDuration, requirements, staffID)
  VALUES ('Help someone in rubble', 'EARTHQUAKE', '2021-03-03', 'Sotenbori, Osaka, Japan'
    , 12, 16, 5, 'Field Aid Help', 2);";
  $sql2 .= "INSERT INTO Trip(description, crisisType, tripDate, location,
    minVolunteers, maxVolunteers, minDuration, requirements, staffID)
  VALUES ('Help someone in fire', 'WILDFIRE', '2021-06-03', 'Kamurucho, Tokyo, Japan'
    , 15, 20, 3, 'Can take the heat, prefrably Fireproof', 2);";

  if ($conn->multi_query($sql2) === TRUE) {
    echo "New records created successfully<br>";
  } else {
    echo "Error: " . $sql2 . "<br>" . $conn->error . "<br>";
  }
  $conn->close();

  //createTables
  $conn = new mysqli("localhost", "root", "", "CrysisRunnerDB");
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . "<br");
  }

  $sql3 = "INSERT INTO Application(applicationDate, userID, tripID)
  VALUES ('2021-01-21',3, 1);";
  $sql3 .= "INSERT INTO Application(applicationDate, userID, tripID)
  VALUES ('2021-02-21',4, 2);";
  $sql3 .= "INSERT INTO Application(applicationDate, userID, tripID)
  VALUES ('2021-02-25',3, 3);";

  if ($conn->multi_query($sql3) === TRUE) {
    echo "New records created successfully<br>";
  } else {
    echo "Error: " . $sql3 . "<br>" . $conn->error . "<br>";
  }
}
$conn->close();
 ?>
