<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP PRACTICE</title>
</head>
<body>
    <section>
        <h1>LOGIN HERE</h1>
        <hr>
        <form action="GET" method="get">
            <label for="username">USERNAME</label><input type="text" name="username" id="uname" placeholder="username">
            <label for="password">PASSWORD</label><input type="password" name="password" id="pword" placeholder="password">
            <button type="submit">LOGIN</button>
            <P>Don't hsve n account? <b><a href="#">register</a></b> </P>
            <p>Can't remember your password? <strong><a href="#">forgot password</a></strong></p>
        </form>
    </section>
    <section>
        <h1>REGISTER HERE</h1>
        <hr>
        <form action="POST" method="post">
            <label for="fname">FIRST NAME</label><input type="text" name="fname" id="lname" placeholder="Male">
            <label for="lname">LAST NAME</label><input type="text" name="lname" id="lname">
            <label for="username">USERNAME</label><input type="text" name="username" id="username">
            <label for="email">EMAIL</label><input type="email" name="email" id="mail">
            <label for="phone">PHONE NUMBER</label><input type="tel" name="mobile" id="phone" placeholder="12345678">
            <label for="gender">GENDER</label><input type="radio" name="gender" id="male">Male</input><input type="radio" name="gender" id="female">Female</input>
            <label for="password">PASSWORD</label><input type="password" name="password" id="password">
            <label for="password">RETYPE PASSWORD</label><input type="password" name="password" id="password">
            <label for="dob">DATE OF BIRTH</label><input type="date" name="dateofbith" id="dob" placeholder="12/34/5678">
            <label for="country">COUNTRY</label><select name="country" id="country">
                <option value="nigeria">Nigeria</option>
                <option value="others">Others</option>
            </select>
            <button type="submit">REGISTER</button>
        </form>
    </section>
</body>
</html>