<?php
// Establish a connection to the MySQL database named "Admin"
$connection = new mysqli("localhost", "root", "", "Admin");

// Check if the connection failed
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Array of users to insert: [name, email, password, gender]
$users = [
    ['Hamza Firdaws', 'hamza1@gmail.com', 'Hamza123', 'Mr'],
    ['Youssef Fissal', 'youssef1@gmail.com', 'Youssef123', 'Mr'],
    ['Hiba Ghazili', 'hiba1@gmail.com', 'Hiba123', 'Ms']
];

// Loop through each user and insert into the database
foreach ($users as $user) {
    $name = $user[0];
    $email = $user[1];

    // Securely hash the password before storing it
    $password = password_hash($user[2], PASSWORD_DEFAULT);

    $gender = $user[3];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $connection->prepare("INSERT INTO users (name, email, password, gender) VALUES (?, ?, ?, ?)");

    // Bind the parameters (all strings)
    $stmt->bind_param("ssss", $name, $email, $password, $gender);

    // Execute the SQL statement
    $stmt->execute();
}

// Output success message after inserting all users
echo "Users inserted successfully";
?>

