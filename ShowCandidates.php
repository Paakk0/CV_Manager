<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Information</title>
</head>

<body>
    <?php
    include '..\Database\Config.php';
    $conn = getConn();
    if (isset($_POST['submit'])) {
        $fullname = $_POST['first-name'] . ' ' . $_POST['middle-name'] . ' ' . $_POST['last-name'];
        $date = $_POST['birthdate'];
        $uni = $_POST['uni'];
        $tech = $_POST['tech'];
        echo $fullname;
        $sql = 'INSERT INTO Candidates(FULLNAME,BDATE,UNIVERSITY,TECH) VALUES
        ("' . $fullname . '","' . $date . '","' . $uni . '","' . $tech . '")';
        $result = mysqli_query($conn, $sql) or die('Could not insert candidate:' . mysqli_error($conn));
    }
    ?>
    <h2>Candidate Table</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Date of Birth</th>
            <th>University</th>
            <th>Technology</th>
        </tr>
        <?php
        $conn = getConn();
        $sql = 'SELECT * FROM Candidates';
        $result = mysqli_query($conn, $sql);
        $conn->close();
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['ID_C']) . '</td>';
            echo '<td>' . htmlspecialchars($row['FULLNAME']) . '</td>';
            echo '<td>' . htmlspecialchars($row['BDATE']) . '</td>';
            echo '<td>' . htmlspecialchars($row['UNIVERSITY']) . '</td>';
            echo '<td>' . htmlspecialchars($row['TECH']) . '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</body>

</html>