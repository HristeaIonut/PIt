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
                <a class="login" href="../loginAccount.php">Login</a>
                <a class="register" href="../controller/connection/createAccount.php">Register</a>
            </div>
        </div>
        <div class="footer">
            <a class=reportContent href="reportContent.php"> Report a post</a>
        </div>
    <form class="form-style-report">
        <ul>
            <li>
                <label>
                    <input type="text" name="field1" class="field-style field-split align-left" placeholder="Name" />
                </label>
                <label>
                    <input type="email" name="field2" class="field-style field-split align-right" placeholder="Email" />
                </label>

            </li>
            <li>
                <label>
                    <input type="text" name="field3" class="field-style field-full align-none" placeholder="Link" />
                </label>
            </li>
            <li>
                <label>
                    <input type="text" name="field3" class="field-style field-full align-none" placeholder="Subject" />
                </label>
            </li>
            <li>
                <label>
                    <textarea name="field5" class="field-style" placeholder="Message"></textarea>
                </label>
            </li>
            <li>
                <input type="submit" value="Send Message" />
            </li>
        </ul>
    </form>

    
</body>

</html>