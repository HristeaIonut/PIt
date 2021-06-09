<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="styles.css">
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
    <div>
    <div role="contentinfo">
    
    </div>
        <ol role="directory">
            <li>
                <a href="#introduction">Introduction</a>
            </li>
            <li>
                <a href="#guest">
                    Guest user
                </a>
            </li>
            <li>
                <a href="#logged">
                    Logged in user 
                </a>
            </li>
        </ol>
    
    <section typeof="sa:Introduction" id="introduction" role="doc-introduction">
        <h3>Introduction</h3>
        <p>The purpose of this site is to allow users to safely and conveniently save some code 
            which they can share among friends. PasteIt gives you some functionalities which you 
            will discover on the following parts.
        </p>
    </section>
    <h3>How do i use this webpage?</h3>

        <section typeof="schema:Guide" id="guest"><h3>As a guest:</h3> 
            <ul>
                <li>
                    You can create a paste as a guest, if you're not logged in.<br>
                    Remember that the link to a paste you created is not saved <br>
                    anywhere so make sure that you save it somewhere. <br>
                    Also pastes remain on our servers for maximum a month <br>
                    You should also be able to complete a simple captcha. <br>
                    If you don't want your paste to be available for a month <br>
                    you can select another duration from the "Expiration time" <br>
                    You can also select a syntax highlight for your code, <br>
                    based on the language your code is written in. <br>
                    If your privacy is important for you, you can also <br>
                    set a password for your paste.
                </li>
                <li>
                    You can create an account by entering the required fields. <br>
                    We won't be able to retrieve your password, so make sure <br>
                    you don't forget it.    
                </li>
                <li>
                    You can login once you have an account created. If you <br>
                    plan to use our site on a daily basis, make sure that <br>
                    you check the checkbox so we can remember you :). This <br>
                    way, you'll stay logged in for a maximum of ten years.
                </li>
                <li>
                    Once you created a paste, a paste with a unique name <br> 
                    (as unique as you are) is created and you are redirected <br>
                    to the link that you'll have to remember. From this point you <br>
                    can start to share your paste with anyone. <br>
                    
                </li>
            </ul>

        </section>
        <br>
        <section typeof="schema:Guide" id="logged">
            <h3>As a logged in user you have a couple of advantages</h3>
            <ul>
            <li>
                If you are a logged in user, we can keep your paste as long <br>
                as you wish.
            </li>
            <li>
                You can set a "burn-after-read" property, or set your paste <br>
                to public edit so anyone with access to it can edit it.
            </li>
            <li>
                From the "My Pastes" page, you can view all your existing pastes. <br>
                From there you can select one to view it, edit it or delete it. <br>
            </li>
            <li>
                On the bottom page of a paste, you have every version of a paste. <br>
                Editing a paste creates a new version and both edited original pastes <br>
                and edited edited pastes appear on the page of the original paste. <br>
            </li>
            </ul>

        </section>
    <br>
</div>

   
</body>

</html>