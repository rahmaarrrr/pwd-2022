<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
</head>

<body>
    <?php
    if (isset($_GET['alert'])) {
        if (isset($_GET['alert']) == "gagal") {
            echo "<P>Maaf Username atau Password Salah</p>";
        } else if (isset($_GET['alert']) == "belum login") {
            echo "<p>Maaf Anda Harus Login Dulu</p>";
        }
    }
    ?>
    <h1>Login</h1>
    <table>
        <form action="masuk.php" method="POST">
            <tr>
                <td>
                    <label for="Username">Username</label>

                </td>
                <td>
                    <input type="text" name="username">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Username">Password</label>
                </td>
                <td>
                    <input type="password" name="password">
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" class="tombol_login" value="login">Masuk</button>

                </td>
            </tr>
        </form>
    </table>
</body>

</html>