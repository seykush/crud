<?php require "db/connect1.php" ?>

<?php 
$sql = "SELECT id, name, position, bio, joined FROM staff";
$result = $conn->query($sql);
?>

<html>
    <head>
        <title>Staff Members</title>
    </head>
    <body>
        <h1><a href="create1.php">Add staff</a></h1>
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Bio</th>
                    <th>Date Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php while($row = $result->fetch_assoc()){ ?>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['position']; ?></td>
                    <td><?php echo $row['bio']; ?></td>
                    <td><?php echo $row['joined']; ?></td>
                    <td><a class="btn read" href="view1.php?id=<?php echo $row['id']; ?>">READ</a>&nbsp;<a class="btn update" href="edit1.php?id=<?php echo $row['id']; ?>">UPDATE</a>&nbsp;<a class="btn delete" href="delete1.php?id=<?php echo $row['id']; ?>">DELETE</a></td>
                </tr>
            </tbody>
                    <?php }?>
        </table>
        <a href="auth/logout.php">Log Out</a>
    </body>
</html>
