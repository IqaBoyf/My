<?php
function processForm($name, $email, $message) {
    // Database configuration (replace with your actual database credentials)
    $hostname = "localhost";
    $username = "your_username";
    $password = "your_password";
    $database = "your_database";

    // Create a database connection
    $conn = mysqli_connect($hostname, $username, $password, $database);

    // Check if the connection is successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the data for insertion (escape user inputs to prevent SQL injection)
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $message = mysqli_real_escape_string($conn, $message);

    // Insert data into the database
    $sql = "INSERT INTO contact_form (name, email, message) VALUES ('$name', '$email', '$message')";

    if (mysqli_query($conn, $sql)) {
        // Return a success message or a redirection URL (e.g., "thank-you.html")
        return "success";
    } else {
        // Return an error message
        return "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}

// Usage example:
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $result = processForm($name, $email, $message);

    if ($result === "success") {
        header("Location: thank-you.html");
    } else {
        echo $result;
    }
}
?>
