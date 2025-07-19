<?php
session_start();

// Handle logout request
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ../html/signin.html");
    exit();
}

// Database credentials for Admin login
$host     = 'localhost';
$dbname   = 'Admin';
$username = 'root';
$password = '';
$isLoggedIn = false;

try {
    // Connect to Admin database
    $pdo_user = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo_user->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get login form data
    $name  = $_POST['Name']     ?? '';
    $email = $_POST['Email']    ?? '';
    $pass  = $_POST['Password'] ?? '';

    // Query user by name and email only (password is verified later)
    $stmt = $pdo_user->prepare("SELECT * FROM users WHERE name = :name AND email = :email");
    $stmt->execute([
        ':name'  => $name,
        ':email' => $email
    ]);

    // If user found, verify password
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($pass, $user['password'])) {
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['name']       = $user['name'];
            $_SESSION['gender']     = $user['gender'];
        }
    }

    // Get session values
    $gender = $_SESSION['gender'] ?? '';
    $name   = $_SESSION['name']   ?? '';

} catch (PDOException $e) {
    echo "Connection error: " . $e->getMessage();
}
?>

<?php
// Database credentials for Registrations
$host = "localhost";
$dbname = "Registrations";
$user = "root";
$pass = "";

try {
    // Connect to Registrations database
    $pdo_registration = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo_registration->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Handle delete request
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $stmt = $pdo_registration->prepare("DELETE FROM registrations WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

} catch (PDOException $e) {
    die("Connection error: " . $e->getMessage());
}
?>

<?php
// Handle "Delete All" request
if (isset($_POST['delete_all'])) {
    try {
        $stmt = $pdo_registration->prepare("DELETE FROM registrations");
        $stmt->execute();
        echo "<script>alert('All registrations have been deleted!');</script>";
    } catch (PDOException $e) {
        echo "Deletion error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration List</title>
    <link rel="icon" href="../imgs & videos/img/favacon.png">
    <link rel="stylesheet" href="../css/style2.css">
    <script src="../js/script.js" defer></script>
</head>
<body>
<div>
<?php
// Handle update form submission
if (isset($_POST['update_id'])) {
    $update_id       = $_POST['update_id'];
    $full_name       = $_POST['full_name'];
    $age             = $_POST['age'];
    $academic_level  = $_POST['academic_level'];
    $phone_number    = $_POST['phone_number'];
    $email           = $_POST['email'];
    $gender          = $_POST['gender'];
    $favorite_hobby  = $_POST['favorite_hobby'];
    $message         = $_POST['message'];

    // Update registration in the database
    $stmt = $pdo_registration->prepare("
        UPDATE registrations 
        SET 
            full_name = :full_name,
            age = :age,
            academic_level = :academic_level,
            phone_number = :phone_number,
            email = :email,
            gender = :gender,
            favorite_hobby = :favorite_hobby,
            message = :message 
        WHERE id = :id
    ");

    $stmt->execute([
        ':full_name'       => $full_name,
        ':age'             => $age,
        ':academic_level'  => $academic_level,
        ':phone_number'    => $phone_number,
        ':email'           => $email,
        ':gender'          => $gender,
        ':favorite_hobby'  => $favorite_hobby,
        ':message'         => $message,
        ':id'              => $update_id
    ]);
}
?>

<?php if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true): 

    // Get search query
    $search = $_POST['search'] ?? '';

    // Fetch results from database
    if ($search) {
        $stmt = $pdo_registration->prepare("SELECT * FROM registrations WHERE full_name LIKE :search ORDER BY full_name ASC");
        $stmt->execute([':search' => "%$search%"]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $rows = $pdo_registration->query("SELECT * FROM registrations ORDER BY full_name ASC")->fetchAll(PDO::FETCH_ASSOC);
    }
?>

<!-- Success message -->
<h2 id="successMessage" style="color: green; text-align:center;">Login successful ✅!</h2>
<h1><i><u>REGISTRATION LIST 📝🔒</u></i></h1>
<h2>Hello <?php echo htmlspecialchars($gender); ?> <?php echo htmlspecialchars($name); ?> 👋</h2>

<!-- Search and control buttons -->
<form class="search" method="post" style="margin: 20px 0;">
    <input type="text" name="search" placeholder="🔍 Search by name..." value="<?= htmlspecialchars($search) ?>">
    <button class="search-btn" type="submit">Search</button>
    <button class="delete-all-btn" type="submit" name="delete_all" onclick="return confirm('Are you sure you want to delete all registrations?')">Delete All</button>
    <button class="download-btn" onclick="downloadCSV()">Download</button>
    <button class="logout-btn" type="submit" name="logout" onclick="return confirm('Are you sure you want to log out?')">Log Out</button>
</form>

<?php if (count($rows) > 0): ?>
    <!-- Registrations table -->
    <table>
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Age</th>
                <th>Academic Level</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Favorite Hobby</th>
                <th>Message</th>
                <th>Registration Date</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($rows as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row["full_name"]) ?></td>
                <td><?= htmlspecialchars($row["age"]) ?></td>
                <td><?= htmlspecialchars($row["academic_level"]) ?></td>
                <td><?= htmlspecialchars($row["phone_number"]) ?></td>
                <td><?= htmlspecialchars($row["email"]) ?></td>
                <td><?= htmlspecialchars($row["gender"]) ?></td>
                <td><?= htmlspecialchars($row["favorite_hobby"]) ?></td>
                <td><?= htmlspecialchars($row["message"]) ?></td>
                <td><?= htmlspecialchars($row["registration_date"]) ?></td>
                <td>
                    <!-- Delete button -->
                    <button class="delete-btn">
                        <a href="?delete=<?= $row["id"] ?>" onclick="return confirm('Are you sure you want to delete this registration?');">Delete</a>
                    </button>
                </td>
                <td>
                    <!-- Update button triggers modal -->
                    <button class="update-btn" onclick="openModal(
                        '<?= htmlspecialchars($row['id']) ?>',
                        '<?= htmlspecialchars($row['full_name']) ?>',
                        '<?= htmlspecialchars($row['age']) ?>',
                        '<?= htmlspecialchars($row['academic_level']) ?>',
                        '<?= htmlspecialchars($row['phone_number']) ?>',
                        '<?= htmlspecialchars($row['email']) ?>',
                        '<?= htmlspecialchars($row['gender']) ?>',
                        '<?= htmlspecialchars($row['favorite_hobby']) ?>',
                        '<?= htmlspecialchars($row['message']) ?>'
                    )">Update</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <!-- End of table message -->
    <h2 style="color: red; text-align:center;">End of table</h2>

    <!-- Modal for updating registrations -->
    <div id="updateModal">
        <div class="updateform">
            <h1><u>Edit Registration ✏️</u></h1>
            <form method="post">
                <input type="hidden" name="update_id" id="update_id">

                <!-- Input fields for registration update -->
                <div class="formgroup">
                    <div class="formrow">
                        <label>Full Name:</label>
                        <input type="text" name="full_name" id="update_full_name" required>
                    </div>
                    <div class="formrow">
                        <label>Age:</label>
                        <input type="number" name="age" id="update_age" required>
                    </div>
                </div>

                <div class="formgroup">
                    <div class="formrow">
                        <label>Academic Level:</label>
                        <input type="text" name="academic_level" id="update_academic_level" required>
                    </div>
                    <div class="formrow">
                        <label>Phone Number:</label>
                        <input type="text" name="phone_number" id="update_phone_number" required>
                    </div>
                </div>

                <div class="formgroup">
                    <div class="formrow">
                        <label>Email:</label>
                        <input type="email" name="email" id="update_email" required>
                    </div>
                    <div class="formrow">
                        <label>Gender:</label>
                        <input type="text" name="gender" id="update_gender" required>
                    </div>
                </div>

                <div class="formrow">
                    <label>Favorite Hobby:</label>
                    <input type="text" name="favorite_hobby" id="update_favorite_hobby">
                </div>

                <div class="formrow">
                    <label>Message:</label>
                    <textarea name="message" id="update_message"></textarea>
                </div>

                <!-- Modal action buttons -->
                <div class="formgroup">
                    <button class="save-btn" type="submit">Save</button>
                    <button class="cancel-btn" type="button" onclick="closeModal()">Cancel</button>
                </div>
            </form>
        </div>
    </div>

<?php else: ?>
    <!-- Message if no registrations found -->
    <h1 class="message">No registrations found.</h1>
<?php endif; ?>

<?php else: ?>
    <!-- Login failed message -->
    <h2 style="color: red; font-size: 24px; font-weight: bold; margin-top: 50px;">
        Login failed ❌<br>
        Name, email, or password incorrect.
    </h2>
    <script>
        // Redirect to sign-in page after 3 seconds
        setTimeout(function(){
            window.location.href = '../html/signin.html';
        }, 3000);
    </script>
<?php endif; ?>
</div>
</body>
</html>





