<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="formStyle.css">
    <link rel="icon"
          href="https://icons-for-free.com/iconfiles/png/512/clipboard+paste+task+icon-1320161389075402003.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIt</title>
</head>

<body>
    
<div class="header">
    <div class="header-left">
        <a class="home" href="../index.php">PasteIt</a>
        <a class="contact" href="contact.php">Contact</a>
        <a class="how-to" href="how-to.php">How to use</a>
        <a class="report" href="report.html">Report</a>
    </div>
    <div class="header-right">
        <a class="login" href="login.php">Login</a>
        <a class="register" href="register.php">Register</a>
    </div>
</div>
<div class="footer">
    <a class=reportContent href="reportContent.html"> Report a post</a>
</div>
    <form class="form-style-report" name="form" action="../controller/connection/createAccount.php" method="POST">
        <ul>
            <li>
                <p>Join our community!</p>
                <label id="first_name">First Name:
                    <input type="text" name="first_name" class="field-style field-split align-right" placeholder="First Name" />
                </label>
            </li>
            <li>
                <label id="last_name">Last Name:
                    <input type="text" name="last_name" class="field-style field-split align-right" placeholder="Last Name" />
                </label>
            </li>

            <li>
                <label id="email">Email Adress:
                    <input type="email" name="email" class="field-style field-split align-right" placeholder="email" />
                </label>
            </li>
            <li>
                <label id="user_name"> Choose a username:
                    <input type="text" name="user_name" class="field-style field-split align-right" placeholder="Username" />
                </label>
            </li>
            <li>
                <label id="password"> Type your password:
                    <input type="password" name="password" class="field-style field-split align-right" placeholder="Password" />
                </label>
            </li>
            <li>
                <label id="password2">Re-type your password:
                    <input type="password" name="password2" class="field-style field-split align-right" placeholder="Password" />
                </label>
            </li>
            <li>
                <input type="submit" value="Submit" class="button"/>
            </li>
        </ul>
    </form>
</body>

</html>