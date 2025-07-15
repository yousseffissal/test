<?php
// Database connection settings
$host = "localhost";
$dbname = "Registrations";
$user = "root";
$pass = "";

try {
    // Establish a PDO connection to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Define expected form field names
    $fields = ['Name', 'Age', 'niveau', 'tele', 'Email', 'genre', 'Hobby', 'Message'];
    $notempty = true;

    // Check if all required fields are filled
    foreach ($fields as $field) {
        if (empty($_POST[$field])) {
            $notempty = false;
            break;
        }
    }

    // If all fields are provided, continue processing
    if ($notempty) {
        // Sanitize and retrieve POST data
        $name            = $_POST['Name']   ?? '';
        $age             = $_POST['Age']    ?? '';
        $academic_level  = $_POST['niveau'] ?? '';
        $phone_number    = $_POST['tele']   ?? '';
        $email           = $_POST['Email']  ?? '';
        $gender          = $_POST['genre']  ?? '';
        $favorite_hobby  = $_POST['Hobby']  ?? '';
        $message         = $_POST['Message']?? '';

        // SQL insert query using named placeholders
        $sql = "INSERT INTO registrations 
                    (full_name, age, academic_level, phone_number, email, gender, favorite_hobby, message) 
                VALUES 
                    (:name, :age, :academic_level, :phone_number, :email, :gender, :favorite_hobby, :message)";
        
        // Prepare and execute the SQL query safely
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name'            => $name,
            ':age'             => $age,
            ':academic_level'  => $academic_level,
            ':phone_number'    => $phone_number,
            ':email'           => $email,
            ':gender'          => $gender,
            ':favorite_hobby'  => $favorite_hobby,
            ':message'         => $message
        ]);
    }

} catch (PDOException $e) {
    // If connection or query fails, output error message
    die("Connection error: " . $e->getMessage());
}
?>

<?php
// Convert the user's name to uppercase and escape it for HTML output
$Name = strtoupper(htmlspecialchars($_POST['Name']));
?>

<!-- HTML WELCOME PAGE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome</title>
    <link rel="icon" href="../imgs & videos/img/favacon.png" />

    <style>
        /* Basic reset and styling */
        * {
            margin: 0;
            box-sizing: border-box;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(180deg, rgb(184, 241, 248), rgb(94, 181, 192), rgb(51, 165, 180));
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .container {
            background: transparent;
            border: 2px solid white;
            color: white;
            text-align: center;
            padding: 20px;
            border-radius: 15px;
        }

        h1 {
            padding: 5px;
            color: rgb(235, 255, 52);
        }

        a {
            background: transparent;
            border-radius: 6px;
            border: 1px solid white;
            padding: 6px;
            text-decoration: none;
            font-weight: 500;
            color: white;
        }

        a:hover {
            background: linear-gradient(to right, rgb(225, 236, 58), rgb(255, 143, 52), rgb(255, 93, 52));
            border: none;
            color: black;
            cursor: pointer;
        }

        p {
            margin-bottom: 20px;
        }

        .container-1 {
            background: linear-gradient(70deg, rgb(61, 212, 47), rgb(41, 170, 29), rgb(22, 119, 13));
            border-radius: 20px;
            padding: 8px;
            width: 100%;
            max-width: 400px;
            box-shadow: -8px 8px 5px rgba(0, 0, 0, 0.267);
        }

        .POPUP {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100vh;
        }

        .POPUP img {
            border-radius: 50%;
            background: rgb(41, 170, 29);
            border: 2px solid white;
            position: absolute;
            width: 110px;
            margin-top: -60px;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
</head>

<body>
    <div class="POPUP">
        <div class="container-1">
            <!-- Welcome icon -->
            <img src="../imgs & videos/img/fists.png" alt="" />

            <!-- Welcome message box -->
            <div class="container">
                <h2 style="margin-top: 30px;">✅ Welcome</h2>
                <h1><?php echo $Name ?></h1>
                <p>
                    Welcome to our website. Thank you for submitting your informations.
                    Your request has been successfully received and we will respond as soon as possible.
                </p>
                <!-- Button to go back to home page -->
                <a href="../html/index.html">Home 🡆</a>
            </div>
        </div>
    </div>
</body>
</html>



