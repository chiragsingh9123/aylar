<?php
// Function to generate a random key
function gen_key() {
    $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '1234567890';
    $passw = $letters . $numbers;
    $result_str = '';
    for ($i = 0; $i < 20; $i++) {
        $result_str .= $passw[rand(0, strlen($passw) - 1)];
    }
    return $result_str;
}

// Function to insert user key into the database
function put_user_key($days) {
    $mysqli = new mysqli("db-mysql-blr1-35555-do-user-16666298-0.c.db.ondigitalocean.com", "doadmin", "AVNS_92V3QyUO9OmdQz5kh6H", "otbbotdatabase","25060");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Generate a unique user key
    $key = gen_key();

    // Insert the key into the database
    $sql = "INSERT INTO unused (user_key, days) VALUES ('$key', '$days')";
    if ($mysqli->query($sql) === TRUE) {
        $mysqli->close();
        return $key;
    } else {
        $mysqli->close();
        return "Error: " . $sql . "<br>" . $mysqli->error;
    }
}

// Function to add an admin user
function add_admin() {
    $days = $_GET['days'];
    $gen_key = put_user_key($days);
    $data = array('key' => $gen_key);
    header('Content-Type: application/json');
    echo json_encode($data);
}

// Call the function to add an admin user
add_admin();
?>
