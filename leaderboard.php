<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz_app";
$port = 3307;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch leaderboard data
$result = $conn->query("SELECT username, score FROM leaderboard ORDER BY score DESC");

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
</head>
<body>
    <h1>Leaderboard</h1>
    <table border="1">
        <tr>
            <th>Rank</th>
            <th>Username</th>
            <th>Score</th>
        </tr>
        <?php
        $rank = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$rank}</td>
                    <td>" . htmlspecialchars($row['username']) . "</td>
                    <td>{$row['score']}</td>
                </tr>";
            $rank++;
        }
        ?>
    </table>
    <a href="login.php">Back to Login</a>
</body>
</html>
