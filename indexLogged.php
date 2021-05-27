
<?php
define('SLASH', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
require_once ROOT.SLASH."util".SLASH."autoload.php";
require("res/constants.php");
if(!isset($_COOKIE["user_login"]))
    header("Location: index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="view/styles.css">
    <script src="controller/scripts/script.js"></script>
    <script src="controller/scripts/emptyCode.js"></script>
    <link rel="icon"
          href="https://icons-for-free.com/iconfiles/png/512/clipboard+paste+task+icon-1320161389075402003.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIt</title>
</head>

<body>
<p hidden id="checking" style="color:white;">This text should be hidden</p>
<div class="header">
    <div class="header-left">
        <a class="home" href="indexLogged.php">PasteIt</a>
        <a class="contact" href="view/contactLogged.php">Contact</a>
        <a class="how-to" href="view/how-toLogged.php">How to use</a>
        <a class="report" href="view/reportLogged.html">Report</a>
        <a class="contact" href="view/mypastes.php">My Pastes</a>
    </div>
    <div class="header-right">
        <a class="login" > <?php require ("controller/getUsername.php")?> </a>
        <a class="register" href="logout.php">Log out</a>

    </div>

</div>
<div class="footer">
    <a class=reportContent href="view/reportContentLogged.php"> Report a post</a>
</div>

<div class="textarea-container">
    <br>
    Paste here the code!<br>
    <form name="code" method="post" action="controller/getCodeLogged.php">
        <label class="left">
            <textarea name="codeArea" id="textarea" class="textarea" ></textarea>
        </label>
        <table class="tabel">
            <tr>
                <td><label class="syntax">Syntax Highlighting:</label></td>
                <td><label>
                        <select name="syntax" class="right-select">
                            <option value="C">C</option>
                            <option value="C#">C#</option>
                            <option value="C++">C++</option>
                            <option value="HTML">HTML</option>
                            <option value="CSS">CSS</option>
                            <option value="JSON">JSON</option>
                            <option value="Java">Java</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="Python">Python</option>
                            <option value="Bash">Bash</option>
                        </select>
                    </label></td>
            </tr>
            <tr>
                <td><label class="expiration">Expiration time:</label></td>
                <td><label>
                        <select class="right-select" name="expiration">
                            <option value="0">Disabled</option>
                            <option value="5">5 minutes</option>
                            <option value="10">10 minutes</option>
                            <option value="30">30 minutes</option>
                            <option value="60">1 hour</option>
                            <option value="1440">1 day</option>
                            <option value="10080">1 week</option>
                            <option value="302400">1 month</option>
                        </select>
                    </label></td>
            </tr>
            <tr>
                <td><label class="privacy">Public:</label></td>
                <td><label>
                        <input type="checkbox" class="right-select" onclick="myFunction()">
                    </label></td>
            </tr>
            <tr>
                <td><label id="insert-label" class="password">Insert password here:</label></td>

                <td> <label>
                        <input type="password" class="right-select" name="password" id="field-password" placeholder="Password"/>
                    </label></td>
            </tr>
            <tr>
                <td class="captcha-wrapper">
                        <div class="g-recaptcha" data-callback="captchaCheck"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" class="create-paste" name="submitCode" value="Create Paste" onclick="return emptyCode();"/>
                </td>
            </tr>
        </table>

        <br>

    </form>
</div>
</body>
</html>
