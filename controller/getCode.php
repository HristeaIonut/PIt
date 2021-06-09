
<?php
if (isset($_POST)) {
    require("../res/constants.php");
    if(!strlen(trim($_POST['codeArea']))) {
        header("Location: ../");
        exit();
    }
    mysqli_report(MYSQLI_REPORT_ALL);

    include 'connection/connection.php';
    include 'generatekeys.php';

    function cryptoJsAesEncrypt($passphrase, $value){
        $salt = openssl_random_pseudo_bytes(8);
        $salted = '';
        $dx = '';
        while (strlen($salted) < 48) {
            $dx = md5($dx.$passphrase.$salt, true);
            $salted .= $dx;
        }
        $key = substr($salted, 0, 32);
        $iv  = substr($salted, 32,16);
        $encrypted_data = openssl_encrypt(json_encode($value), 'aes-256-cbc', $key, true, $iv);
        $data = array("ct" => base64_encode($encrypted_data), "iv" => bin2hex($iv), "s" => bin2hex($salt));
        return json_encode($data);
    }

    $secret = SECRET_KEY;
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);

    if(!$responseData->success){
        echo '<script>alert("Go away BOT \u{1F922}")</script>';
        header("Refresh:0, url=../index.php");    
    }

    if ($_POST['submitCode'] == "Create Paste" && $responseData->success) {
        $filename = "";
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        for($i=0;$i<5;$i++)
            $filename.=substr($chars,random_int(0,strlen($chars)-1),1);

        $filename .= '.php';
        if (!file_exists($filename)) {
            $file = tmpfile();
        }
        $password = $_POST['password'];
        $expiration = $_POST['expiration'];
        if(!empty($password))
            $hashedPassword = cryptoJsAesEncrypt($key, $password);
        else
            $hashedPassword = null;

        if(empty($expiration)){
            include 'connection/connection.php';
            $sql = "INSERT INTO pastes(id, paste_name, password) values(?, ?, ?)";
            if($stmt = $conn->prepare($sql)){
                $id = 0;
                $stmt->bind_param("iss", $id, $filename, $hashedPassword);
                $stmt->execute();
            }
            }else{
                switch($expiration){
                    case (302400):
                        include 'connection/connection.php';
                        $sql = "INSERT INTO pastes(id, paste_name, password, expiration_date) values(?, ?, ?, (CURRENT_TIMESTAMP + INTERVAL 1 MONTH));";
                        if($stmt = $conn->prepare($sql)){
                            $id = 0;
                            $stmt->bind_param("iss", $id, $filename, $hashedPassword);
                            $stmt->execute();
                        }
                        break;
                    default:
                        include 'connection/connection.php';
                        $sql = "INSERT INTO pastes(id, paste_name, password, expiration_date) values(?, ?, ?, (CURRENT_TIMESTAMP + INTERVAL (?) MINUTE));";
                        if($stmt = $conn->prepare($sql)){
                            $id = 0;
                            $stmt->bind_param("isss", $id, $filename, $hashedPassword, $expiration);
                            $stmt->execute();
                        }
                        break;
                }
            }

        $templateFile = fopen("template.html", "a+");
        $templateContent = '';

        while (!feof($templateFile))
            $templateContent = $templateContent . fgets($templateFile);
        $templateContent = $templateContent."<div class='textarea-container'><pre><code id='cod'>";
        $filename = "../Pastes/".$filename;
        $file = fopen($filename, "a+");
        $text = $_POST["codeArea"];
        $text = str_replace("<", '&lt;', $text);
        $text = str_replace(">", '&gt;', $text);
        $text = $text."</code></pre></div>";
        $languageType = $_POST['syntax'];
        switch($languageType){
            case "C":
                $text = $text. "<script src=\"../controller/scripts/syntaxHighlightC.js\"></script>";
                break;
            case "C#":
                $text = $text. "<script src=\"../controller/scripts/syntaxHighlightCSharp.js\"></script>";
                break;
            case "C++":
                $text = $text. "<script src=\"../controller/scripts/syntaxHighlightCpp.js\"></script>";
                break;
            case "HTML":
                $text = $text. "<script src=\"../controller/scripts/syntaxHighlightHTML.js\"></script>";
                break;
            case "CSS": 
                $text = $text. "<script src=\"../controller/scripts/syntaxHighlightCSS.js\"></script>";
                break;
            case "JSON":
                $text = $text. "<script src=\"../controller/scripts/syntaxHighlightJSON.js\"></script>";
                break;
            case "Python":
                $text = $text. "<script src=\"../controller/scripts/syntaxHighlightPython.js\"></script>";
                break;
            case "Java":
                $text = $text. "<script src=\"../controller/scripts/syntaxHighlightJava.js\"></script>";
                break;
            case "JavaScript":
                $text = $text. "<script src=\"../controller/scripts/syntaxHighlightJavaScript.js\"></script>";
                break;
            case "Bash":
                $text = $text. "<script src=\"../controller/scripts/syntaxHighlightBash.js\"></script>";
        }
        file_put_contents($filename, $templateContent.$text);
        fclose($file);
        header("Location: ../Pastes/" . $filename);
    }
}