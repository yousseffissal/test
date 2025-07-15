# 📌 CTDE Club Membership Form 2026 (A CS50 Final Project) 💼

## 🎥 Video Demo:

[![Watch this video for more informations](https://img.youtube.com/vi/HOj2j1axr-0/hqdefault.jpg)](https://youtu.be/HOj2j1axr-0?si=Ljwof6YDvjLQACvq)


---------------------------------

## 📄 Description:

My project simplifies managing membership registrations for a university club called CTDE by replacing manual processes with a digital system. It includes two main parts: a registration form for members to submit their details and an admin dashboard for authorized staff to view, edit, or delete registrations securely.

Built using core web technologies HTML, CSS, JavaScript, PHP, and MySQL. the site is fully responsive and functional without external libraries. Security features like password hashing and session management protect the admin area. This project solves a real community problem while reinforcing full-stack development skills learned in CS50 😊.

---------------------------------

## 🧠 Inspiration:

This project was inspired by a real need in my university club, where I am also a member. The manual registration process was inefficient and caused data issues. I wanted to build a simple, effective web app to make registering easier for members and managing data simpler for admins. It also gave me a great chance to apply and improve the skills I learned in CS50 while creating something useful for my community 👊.

---------------------------------

## 🚀 Features:

- ✔️ User-friendly registration form for club members to submit their details easily
- ✔️ Admin login system with secure password hashing and session management
- ✔️ Admin dashboard to view all registrations with search functionality
- ✔️ Ability for admins to update or delete individual registrations
- ✔️ Option to delete all registrations at once for easy data management
- ✔️ Responsive design ensuring smooth user experience on both desktop and mobile devices
- ✔️ Secure backend using PHP and prepared statements to prevent SQL injection
- ✔️ Data stored and managed efficiently in a MySQL database via phpMyAdmin and XAMPP server
- ✔️ Clean, organized file structure with separate folders for HTML, CSS, JavaScript, and PHP files
- ✔️ No reliance on external libraries or frameworks, showcasing core web development skills
- ✔️ Easily deployable to a production hosting environment (e.g., shared hosting, cPanel, or cloud)
- ✔️ Codebase designed for maintainability and scalability (easy to edit, upgrade, or refactor)
- ✔️ Built with future enhancements in mind (e.g., email confirmation, analytics, multi-language support)

---------------------------------

## 📂 Project Structure:

```
CS50_Final_Project_Youssef_Fissal
│
├── Code_Files/
│   │
│   ├── css/
│   │   ├── style.css
│   │   └── style2.css
│   │
│   ├── html/
│   │   ├── index.html
│   │   └── signin.html
│   │
│   ├── imgs & videos/
│   │   ├── img/
│   │   │   ├── favacon.png
│   │   │   ├── fists.png
│   │   │   ├── icon.png
│   │   │   ├── pin.png 
│   │   │   ├── pin.png
│   │   │   └── television.png
│   │   └── video/
│   │       └── video.mp4
│   │ 
│   ├── js/
│   │   └── script.js
│   │
│   ├── php/
│   │   ├── index.php
│   │   ├── insert_users.php
│   │   └── showdata.php
│   │
│   └── sql/
│       ├── Admin.sql
│       └── database.sql
│ 
└── README.md ( We are here )
```

### HTML files
 
#### `index.html User – Registration Interface`

This file serves as the main landing page of the website and provides the membership registration form for the CTDE Club.

🧩 Purpose:

To collect detailed information from new members who wish to join the club through a clean and responsive form.

🧾 Form Fields:

* Full Name (required)
* Age (required)
* Academic Level (e.g., DEUST, Master, PhD)
* Phone Number
* Email Address
* Gender (dropdown: Male / Female)
* Favorite Hobby (select from multiple options)
* Message (textarea to express motivation or expectations)

🔁 Functionality:

    ✔️ The form uses the POST method and sends the input data to the server via index.php.
    ✔️ Fields are validated using HTML required attributes.
    ✔️ Upon submission, data is stored securely in a MySQL database handled by the backend.

🖼️ UI Structure:

    Left section: 

        ✔️ Contains the registration form and visual elements like icons and logos.

    Right section: Provides information about the CTDE Club, including:

        ✔️ A brief mission statement.
        ✔️ A welcoming paragraph.
        ✔️ A video presentation embedded inside a TV-themed frame.
        ✔️ A pin icon and branding visuals.

🎨 Design Notes:

    ✔️ Fully responsive layout without external libraries or frameworks.
    ✔️ Custom styles applied via an external CSS file (style.css).
    ✔️ Icons and media (images/videos) are stored separately in the imgs & videos folder.

#### `signin.html – Admin Login Page`

This file provides a login interface for club administrators or authorized members to securely access the backend dashboard and manage user submissions.

🧩 Purpose:

To allow verified admins to log in with their credentials and access the registration database through a protected form.

🔐 Form Fields:

* Full Name (required)
* Email Address (optional for flexibility)
* Password (input type password for confidentiality)

🔁 Functionality:

    ✔️ The form submits data via POST to showdata.php, which handles authentication and displays the collected member data.
    ✔️ A loading animation ("Logging in...") is shown using a CSS spinner, triggered by JavaScript upon form submission.

🎨 Design & UX:

    ✔️ Clean and minimal interface styled directly using internal CSS.
    ✔️ Modern look using gradients and subtle animations.
    ✔️ Responsive layout centered vertically and horizontally on all devices.
    ✔️ A loading spinner appears during login to improve user feedback.

🛡️ Security Note:

    ✔️ Password input is masked.
    ✔️ Data handling and authentication are performed on the server side (not shown here).

🧠 Additional Features:

    ✔️ JavaScript is used to show the loading spinner dynamically when the form is submitted, improving the user experience and interactivity.

### CSS files
 
#### `style.css – Custom Styling`

This file contains most of the custom styles used across the project to ensure a cohesive, modern, and responsive user interface without relying on external libraries or frameworks.

1) 📐 Layout & Structure:

* **Flexbox** is used extensively for layout, centering, and responsive design.
* `.box`, `.box1`, `.box2`: Divide the page into two sections—form and additional content (e.g., welcome message or video).
* Responsive adjustments are made using **media queries** to ensure proper display across screen sizes, especially hiding `.box2` on smaller screens.

2) 💡 Form Styling:

* `.form_container` and `.form_container_border`: Contain and style the registration form, adding white borders, background transparency, rounded corners, and shadows for visual appeal.
* Inputs, selects, and textareas are styled with soft backgrounds, rounded borders, and spacing for readability.

3) ✨ Visual Enhancements:

* Buttons have gradient backgrounds and interactive hover states.
* Images and videos are positioned with absolute layout and layering (`z-index`) to create a dynamic design (e.g., "TV" video frame).
* Special elements like `.hello` and `.tv-wrapper` add aesthetic and thematic value to the site, emphasizing club branding.

4) 📱 Responsiveness:

* Breakpoints at **1074px** and **502px** ensure usability across devices:

  * At smaller widths, the right section `.box2` is hidden to simplify the interface.
  * The form takes full width on mobile with adjusted borders.

5) ✅ Summary of Sections:

* `body`: Sets base font, background, and centering
* `h2`, `h4`, `p`, `label`: Text formatting
* `input`, `select`, `textarea`: Input field styles
* `.form_row`, `.form_group`: Layout for form fields
* `.box`, `.box2`, `.hello`, `.tv-wrapper`, `video`, `.pin`: Layout and design visuals
* `@media`: Responsive behavior definitions

#### `style2.css – Admin Dashboard Styling`

This CSS file is dedicated to the styling of the Admin Dashboard, which allows club administrators to view, update, or delete member registrations.

Key roles:

    ✔️ 🎨 Visual Consistency: Defines the layout, colors, and typography used in the dashboard, creating a clean and user-friendly experience.

    ✔️ 📊 Table Styling: Enhances the visibility and structure of the data table using alternating row colors, custom headers, and spacing.

    ✔️ 🔘 Button Design: Includes customized styles for action buttons such as Delete, Update, Search, Logout, and Delete All, each with hover effects to improve usability.

    ✔️ ✏️ Update Modal: Styles the popup modal used when editing user data, ensuring it's accessible and visually distinct from the background.

    ✔️ 📐 Form Styling: Applies consistent and responsive design to the inputs and layout within the modal form.

    ✔️ 🖱️ Scrollbar Customization: Adjusts the default browser scrollbar to better match the site’s overall theme.

This file plays a vital role in making the admin interface professional, functional, and intuitive without relying on any third-party libraries.

### Javascript files

#### `script.js — Admin Dashboard Interaction Script`

This file controls the update modal in the admin dashboard, allowing easy editing of member registrations.

🔓 openModal(id, name, age, level, phone, email, gender, hobby, message)

    ✔️ Fills the update form with the selected member’s data.
    ✔️ Displays the modal for editing.
    ✔️ Makes updating faster and reduces errors.

❌ closeModal()

    ✔️ Hides the update modal.
    ✔️ Called when canceling or after updating.
    ✔️ Keeps the interface clean and focused.

🎯 Why It Matters

    ✔️ Enhances user experience by allowing smooth, dynamic editing of records.
    ✔️ Avoids page reloads or unnecessary navigation during data updates.

### PHP files

#### `index.php – Registration Handler & Welcome Page`

This file serves as the main backend handler for the registration form. It processes user input, stores it securely in the database, and displays a custom welcome page upon successful submission.

🧩 Purpose:

    ✔️ Receive and process user-submitted data from the registration form (index.html) via POST.
    ✔️ Insert the data into a MySQL database securely using PDO and prepared statements.
    ✔️ Display a dynamic welcome page to confirm successful registration, including the user’s name.

🔐 Backend Functionality:

    ✔️ Establishes a secure PDO connection to the database:

```$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);```

    ✔️ Validates that all required fields are filled before processing.

    ✔️ Uses prepared statements to prevent SQL injection:

```$stmt = $pdo->prepare("INSERT INTO registrations (...) VALUES (...)");```

    ✔️ Converts the user's name to uppercase and sanitizes it using htmlspecialchars() for safe HTML output:

```$Name = strtoupper(htmlspecialchars($_POST['Name']));```

📬 Frontend – Confirmation Page:

    Upon successful registration, a custom-designed confirmation page is displayed featuring:

    ✔️ A welcome icon
    ✔️ The user's name in large font
    ✔️ A thank-you message
    ✔️ A button to return to the homepage

🎨 Design Highlights:

    ✔️ Fully responsive layout using Flexbox and custom CSS.
    ✔️ Gradient backgrounds and subtle visual effects for a modern UI.
    ✔️ Clean and welcoming interface designed to improve user experience.

🛡️ Security Notes:

    ✔️ Input data is validated before being saved.
    ✔️ Output is escaped using htmlspecialchars() to prevent XSS.
    ✔️ Database errors are handled gracefully using PDO::ERRMODE_EXCEPTION.

#### `insert_users.php – Admin User Seeder Script`

This file is a utility script used to pre-populate the admin database with a list of predefined admin users. It inserts sample user accounts securely into the users table, which can later be used to log in to the admin dashboard.

🧩 Purpose:

    ✔️ Seed the Admin database with default administrator accounts.
    ✔️ Ensure that test or initial users are created with secure credentials.
    ✔️ Demonstrate how user data (especially passwords) is handled securely in the backend.

🔐 Backend Functionality:

    ✔️ Connects to a MySQL database named Admin using the mysqli extension:

```$connection = new mysqli("localhost", "root", "", "Admin");```

    ✔️ Defines a list of default users in the format: [Full Name, Email, Plain Password, Gender]

    ✔️ Passwords are hashed using password_hash() with the PASSWORD_DEFAULT algorithm before being stored:

```$password = password_hash($user[2], PASSWORD_DEFAULT);```

    ✔️ Uses prepared statements and parameter binding to prevent SQL injection:

```$stmt = $connection->prepare("INSERT INTO users (...) VALUES (?, ?, ?, ?)");```
```$stmt->bind_param("ssss", $name, $email, $password, $gender);```

📥 Seeded User Accounts:
```
1) Name: Hamza Firdaws     
Email: hamza1@gmail.com
Password: Hamza123
Gender: Mr

2) Name: Youssef Fissal
Email: youssef1@gmail.com
Password: Youssef123
Gender: Mr

3) Name: Hiba Ghazili
Email: hiba1@gmail.com
Password: Hiba123
Gender: Ms

```
    ⚠️ These passwords are stored hashed, making them secure and unreadable in the database.

🧪 Output:

    ✔️After successfully inserting all user records, the script echoes: Users inserted successfully

🛡️ Security Notes:

    ✔️ Passwords are never stored in plain text.
    ✔️ All database inputs are sanitized via prepared statements.
    ✔️ Designed to be run once to initialize the admin user base. (You can remove or disable the file after seeding.)

#### `showdata.php – Admin Dashboard & User Management Logic`

This is the core PHP file that powers the Admin Dashboard, handling everything from admin login to displaying, searching, updating, and deleting member registration data.

🧩 Purpose:

    ✔️ Authenticate admins securely and start user sessions.
    ✔️ Display all club registrations in a dynamic HTML table.
    ✔️ Allow admins to:

        ✅ Search for members by name.
        ✅ Edit/update registration details.
        ✅ Delete single entries or delete all at once.
        ✅ Log out securely.

🔐 Authentication Flow:

    ✔️ Verifies admin login using a database called Admin.
    ✔️ Passwords are securely hashed and validated with password_verify().
    ✔️ If credentials are correct, a session is created and the admin is redirected to the dashboard.
    ✔️ Failed login attempts redirect back to the login page after 3 seconds.

📦 Dashboard Features:

    ✔️ Admin-only access protected by PHP sessions.
    ✔️ Personalized greeting using admin’s name and gender
    ✔️ Full list of registered users retrieved from the Registrations database.
    ✔️ Real-time search filter using a LIKE query on full names.
    ✔️ Buttons for:

        ✅ Updating each row (via a popup modal).
        ✅ Deleting individual rows.
        ✅ Deleting all registrations.
        ✅ Logging out securely.

🧰 Update & Delete Functionalities:

    ✔️ Each row has Update and Delete buttons:

        ✅ Delete triggers a GET request and deletes the row.
        ✅ Update opens a pre-filled modal form for editing.

    ✔️ "Delete All" button clears the entire registration table (with confirmation prompt).

📋 Displayed Fields:

* Full Name
* Age
* Academic Level
*  Phone Number
*  Email
* Gender
* Favorite Hobby
* Message
* Registration Date

🧪 Search Feature:

```$stmt = $pdo_registration->prepare("SELECT * FROM registrations WHERE full_name LIKE :search ORDER BY full_name ASC");```

    ✔️ Admins can search members by typing part of their name.
    ✔️ Results are updated dynamically on the page.

🧱 Security Measures:

    ✔️ Sessions are used to restrict access to authenticated admins only.
    ✔️ Passwords are hashed and verified securely.
    ✔️ SQL queries use prepared statements to prevent SQL injection.
    ✔️ Data is sanitized with htmlspecialchars() before being displayed.

🧼 User Experience Enhancements:

    ✔️ Displays login success/failure messages.
    ✔️ Redirects users automatically on failed login.
    ✔️ Confirmation pop-ups for sensitive actions like delete/logout.
    ✔️ Fully styled dashboard using style2.css and powered by script.js.

🎯 Why This File Matters:

This file represents the heart of the admin interface. It brings together frontend and backend logic, handles sessions, user feedback, and secure data operations, all without relying on external frameworks

### SQL files

#### `Admin.sql – Admin Database Schema`

This SQL script sets up the Admin database and creates a table for storing administrator login credentials.

🧩 Purpose:

    ✔️ Create a dedicated database (Admin) to store administrator accounts separately from member registrations.

    ✔️ Define a secure structure for the users table, including unique constraints and hashed passwords.

📁 Database: 
Admin

📄 Table:
users

🛠️ Key Features:

    ✔️ id: Auto-incremented primary key for identifying each user uniquely.
    ✔️ name: Full name of the admin user.
    ✔️ email: Must be unique to prevent duplicate accounts.
    ✔️ password: Stores securely hashed passwords (via password_hash() in PHP).
    ✔️ gender: Stored for personalization in the admin dashboard.

🔐 Security Notes:

    ✔️ Passwords must never be stored in plain text — this design works with PHP's secure password hashing.
    ✔️ The email field is marked UNIQUE to prevent multiple accounts with the same address.

#### `database.sql – Registrations Database Schema`

This SQL script initializes the Registrations database and creates the registrations table used to store member information submitted via the registration form.

🧩 Purpose:

    ✔️ Set up a structured database to store CTDE Club membership form submissions.
    ✔️ Ensure that all required member details are captured and stored consistently.

📁 Database:
Registrations

📄 Table:
registrations

📌 Field Descriptions:

    ✔️ id: Auto-incremented unique identifier for each registration.
    ✔️ full_name: The member’s full name.
    ✔️ age: Age of the registrant.
    ✔️ academic_level: Academic standing (e.g., DEUST, Master, PhD).
    ✔️ phone_number: Member’s contact phone number.
    ✔️ email: Member’s email address.
    ✔️ gender: Restricted to either 'Male' or 'Female' using the ENUM type.
    ✔️ favorite_hobby: Selected hobby from a predefined list.
    ✔️ message: Custom text provided by the user (e.g., motivation).
    ✔️ registration_date: Automatically set to the current time when the form is submitted.

🛡️ Design Notes:

    ✔️ All fields are marked NOT NULL to enforce data completeness.
    ✔️ ENUM is used to strictly limit gender input to predefined values.
    ✔️ The registration_date uses CURRENT_TIMESTAMP to automatically track when each form was submitted

---------------------------------

## 💡 Ideas for future enhancements:

📧 Email Confirmation:

    ✔️ Send a confirmation email upon registration.
    ✔️ Could be added via PHPMailer or basic mail() function.

🌐 Language Support:

    ✔️ Add French or Arabic versions for multilingual support.

🧮 Statistics Section:

    ✔️ Show basic stats: number of members by academic level, gender, or age range.

⏳ Pagination:

    ✔️ For large data sets, we can add pagination to the admin dashboard.

🔒 Admin Role Levels:

    ✔️ Allow different admin permissions: read-only, full access, etc.

---------------------------------

## ⚙️ How to Run:

1) Make sure you have the following installed:

    * XAMPP (or any PHP + MySQL server stack for me I prefer xampp) – includes Apache and MySQL
    * A modern web browser (e.g., Chrome, Firefox)
    * A code editor (e.g., VS Code) – optional, for exploring/editing the code

2) Download or clone this project repository.

3) Copy the entire project folder into the htdocs directory inside your XAMPP installation.
    Example path:

    `C:\xampp\htdocs\CS50_Final_Project_Youssef_Fissal` (it should be something like this)

4) Now we will start the Local Server, Open the XAMPP Control Panel by clicking on the app icon and Start both Apache and MySQL services.

5) Open phpMyAdmin in your browser and Create two new databases:

    * Admin
    * Registrations

Import the provided .sql files to create the databases and the tables:

        ✔️ For the Admin database, import the file: Admin.sql
        ✔️ For the Registrations database, import the file: database.sql

💡 Note:
After importing, both databases will be created with their respective table structures only (no data). The Admin table will be ready to receive admin users, and the Registrations table will be ready to store member form submissions

6) At this point you can also if you want to open the project code in vs code to see what's going on

7)  To open the Member Registration Form, in your web browser go to:

    `http://localhost/CS50_Final_Project_Youssef_Fissal/Code_Files/html/index.html`

    To access the Admin Login Page, go to:

    `http://localhost/CS50_Final_Project_Youssef_Fissal/Code_Files/html/signin.html`

8) To log in as an admin, first run the script `insert_users.php` once to seed the Admin database with default users, To do this, open:

    `http://localhost/CS50_Final_Project_Youssef_Fissal/Code_Files/php/insert_users.php`

✅ This will insert sample admin accounts with securely hashed passwords.
⚠️ (Use the credentials exactly as listed in insert_users.php to login)

9) ⚠️ To make sure the project works as expected, please double-check that all files and folders are in the correct locations relative to each other. Incorrect paths will result in missing styles, broken scripts, or PHP errors, if you rename or move any folder or file, make sure to update the corresponding paths in your HTML, CSS, JavaScript, and PHP files accordingly, check the Project Structure section for more informations

10) ✅ Done! You can now:

    ✔️ Register new members
    ✔️ Log in as an admin
    ✔️ View, search, update, delete & control registrations

And use all other Features listed in this README file.

This was my final project!

Thank you CS50 ❤️



    