<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #2980b9;
        }

        @media only screen and (max-width: 600px) {
            form {
                width: 80%;
            }
        }

        @media only screen and (max-width: 400px) {
            form {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <h2>Doctor Signup</h2>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>

        <label>Gender:</label>
        <input type="radio" id="male" name="gender" value="male" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" required>
        <label for="female">Female</label>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="specialization">Specialization:</label>
        <select id="specialization" name="specialization" required>
            <option value="cardiology">Cardiology</option>
            <option value="neurology">Neurology</option>
            <option value="nephrology">Nephrology</option>
            <option value="pediatrics">Pediatrics</option>
            <option value="gynecology">Gynecology</option>
            <option value="dermatology">Dermatology</option>
        </select>

        <button type="submit">Signup</button>
    </form>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "Major@2040!";
    $dbname = "doctors";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $age = isset($_POST['age']) ? intval($_POST['age']) : 0;
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $plain_password = isset($_POST['password']) ? $_POST['password'] : '';
    $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);
    $specialization = isset($_POST['specialization']) ? $_POST['specialization'] : '';

    $sql = "INSERT INTO doctors (name, age, gender, email, username, password, specialization) VALUES ('$name', $age, '$gender', '$email', '$username', '$hashed_password', '$specialization')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    ?>
</body>

</html>
