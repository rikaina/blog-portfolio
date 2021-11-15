<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <div class="containser">
        <h2>Registration</h2>
        <form action="../action/registration-action.php" method="POST">
            <table>
                <tr>
                    <td>
                        <label for="fullname">Fullname</label>
                    </td>
                    <td>
                        <input type="text" name="first_name" id="first_name" placeholder="Firstname" required>
                        <input type="text" name="last_name" id="last_name" placeholder="Lastname" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="address">Address</label>
                    </td>
                    <td>
                    <input type="text" name="postalcode" id="postalcode" placeholder="Postalcode" required><br>
                    <input type="text" name="address" id="address" placeholder="Address" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">E-mail</label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email" placeholder="errander@sample.com" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="phone_number">Phone number</label>
                    </td>
                    <td>
                        <input type="number" name="phone_number" id="phone_number" placeholder="01234567890" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="user_name">Username</label>
                    </td>
                    <td>
                        <input type="text" name="user_name" id="user_name" placeholder="Username" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="phome_number">Password</label>
                    </td>
                    <td>
                        <input type="password" name="password" id="password" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="phome_number">Password (Conmfirm)</label>
                    </td>
                    <td>
                        <input type="password" name="password" id="password" required>
                    </td>
                </tr>
            </table>
            <input type="submit" id="btn_register" name="btn_register" value="Register">
        </form>
    </div>
</body>
</html>