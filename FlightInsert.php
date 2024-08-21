<?php
include 'dbcon.php';

// Create a dataset
$flights = array(
  array('flight_no' => 'FL001', 'flight_name' => 'Flight 1', 'source' => 'New York', 'destination' => 'Los Angeles', 'departure_time' => '08:00', 'arrival_time' => '11:00', 'duration' => '3 hours', 'cost' => '500'),
  array('flight_no' => 'FL002', 'flight_name' => 'Flight 2', 'source' => 'Chicago', 'destination' => 'Miami', 'departure_time' => '09:00', 'arrival_time' => '12:00', 'duration' => '3 hours', 'cost' => '450'),
  array('flight_no' => 'FL003', 'flight_name' => 'Flight 3', 'source' => 'Houston', 'destination' => 'Las Vegas', 'departure_time' => '10:00', 'arrival_time' => '13:00', 'duration' => '3 hours', 'cost' => '550'),
  // Add more flights to the dataset...
);
// Insert dataset into database
foreach ($flights as $flight) {
    $query = "INSERT INTO flights (flight_no, flight_name, source, destination, departure_time, arrival_time, duration, cost) VALUES ('".$flight['flight_no']."', '".$flight['flight_name']."', '".$flight['source']."', '".$flight['destination']."', '".$flight['departure_time']."', '".$flight['arrival_time']."', '".$flight['duration']."', '".$flight['cost']."')";
    mysqli_query($conn, $query);
  }
  
  // Fetch and return flight data in JSON format
  $query = "SELECT * FROM flights";
  $result = mysqli_query($conn, $query);
  $data = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }
  echo json_encode($data);
  
  mysqli_close($conn);
  ?>
