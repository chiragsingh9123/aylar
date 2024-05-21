<?php
define('DB_SERVER', 'db-mysql-blr1-35555-do-user-16666298-0.c.db.ondigitalocean.com');
define('DB_USERNAME', 'doadmin');
define('DB_PASSWORD', 'AVNS_92V3QyUO9OmdQz5kh6H');
define('DB_NAME', 'otbbotdatabase');
define('DB_PORT', '25060');  // Add this line
// Attempt to connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME,DB_PORT);
?>
