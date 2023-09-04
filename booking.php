<?php
  @$name = $_POST['name'];
  @$email = $_POST['email'];
  @$event = $_POST['event'];
  @$price = $_POST['price'];
  @$place = $_POST['place'];

  //Database connection 

  $conn = new mysqli('localhost','root','','data');
  //$sql = mysqli_query($conn,'SELECT * FROM user');
  if($conn->connect_error){
    die('Connection Failed :'.$conn->connect_error);
  }else{
    $stmt =$conn->prepare("insert into booking(name,email,event,price,place) values(?,?,?,?,?)");
    //parent::$sql();
    $stmt->bind_param("sssis", $name,$email,$event,$price,$place);

   $stmt->bind_param(':name', $name);
   $stmt->bind_param(':email', $email);
   $stmt->bind_param(':event', $event);
   $stmt->bind_param(':price', $price);
   $stmt->bind_param(':place', $place);

   $name = "John";
   $email = "john@example.com";
   $event = "Doe";
   $price = "20,000";
   $place = "Hyderabad";
   $stmt->execute();
   if ($conn->query($stmt) === TRUE) {
    echo "Booking Successful";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  


    // $stmt->execute();
    // echo "Booking Successful";
    // $stmt->close();
    $conn->close();
  }
?>