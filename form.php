<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>

    <center>
        <h1 style = "color:blue;">AIUB</h1>
        <h2 style="color:blue;">Registration Form</h2>
    </center>

    Complete the Registration Form<br><br>

        Full Name: <input type="text" name="fullname"><br><br>

        Email: <input type="email" name="email"><br><br>

        Password: <input type="password" name="password"><br><br>

        Gender:
        <input type="radio" name="gender" value="Male"> Male
        <input type="radio" name="gender" value="Female"> Female

            
        </select>
        <br><br>

        Language Known:
        <input type="checkbox" name="language[]" value="English"> English
        <input type="checkbox" name="language[]" value="Bangla"> Bangla
        <input type="checkbox" name="language[]" value="Hindi"> Hindi
        <br><br>

        Country:
        <select name="country">
            <option value="">Select</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="India">India</option>
            <option value="USA">USA</option>
        </select>
        <br><br>

        Date of Birth: <input type="date" name="dob"><br><br>

        Comment:<br>
        <textarea name="comment" rows="4" cols="40"></textarea><br><br>

        <input type="submit" value="Register">

</body>
</html>

