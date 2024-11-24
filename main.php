<!DOCTYPE html>
<html>

<head>
    <title>main page</title>
    <link rel="stylesheet" href="style.css">
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css" rel="stylesheet">

<body>
    <form method="get">
        <main class="table">
            <section class="table__header">
                <h1>Registered Users</h1>
                </div>
                <div class="input-group">
                    <a href="register.php"><input type="button" value="Add"></a>

                </div>
            </section>
            <table>
                <section class="table__body">
                    <table>
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <?php
                                include("connect.php");

                                $sql = "select*from users";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $id = $row['id'];
                                        $name = $row['name'];
                                        $email = $row['email'];
                                        $password = $row['password'];
                                        echo "<tr>
<td>" . $id . "</td>
<td>" . $name . "</td>
<td>" . $email . "</td>
<td>" . $password . "</td>
<td><div class='button'><a href='delete.php?d_id=$id'><input type='button' value='Delete' style='background-color: #ff1d618c;font-size: 18px;
font-weight: 600; border-radius: 30px;width:100%'></div></a></td>
<td><div class='button1'><a href='update.php?u_id=$id'><input type='button' value='Update' style='background-color: #00ff84a2;font-size: 18px;
font-weight: 600; border-radius: 30px;width:100%'></a></div></td>
</tr>";
                                    }
                                }
                                ?>

                        </tbody>
                    </table>
                </section>
        </main>
</body>
</form>

</html>

</html>