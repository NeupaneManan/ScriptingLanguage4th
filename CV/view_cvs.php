<!DOCTYPE html>
<html>
<head>
    <title>View CVs</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Submitted CVs</h2>
        <table>
            <tr>
                <th>Full Name</th>
                <th>Contact Information</th>
                <th>Education</th>
                <th>Work Experience</th>
                <th>Skills</th>
                <th>Image</th>
                <th>CV File</th>
            </tr>
            <?php
            $servername = "localhost";
            $username = "username";
            $password = "password";
            $dbname = "cv_database";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM cv_table";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["name"]."</td>";
                    echo "<td>".$row["contact_info"]."</td>";
                    echo "<td>".$row["education"]."</td>";
                    echo "<td>".$row["work_experience"]."</td>";
                    echo "<td>".$row["skills"]."</td>";
                    echo "<td><img src='".$row["image"]."' width='100'></td>";
                    echo "<td><a href='".$row["file"]."'>Download</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
