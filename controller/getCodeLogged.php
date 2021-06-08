<?php
require("getUsername.php");
include 'connection/connection.php';
include 'insertValuestoDB.php';
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
global $decryptedId, $conn, $key;
if (isset($_POST)) {
    require("../res/constants.php");
    if(!strlen(trim($_POST['codeArea']))) {
        header("Location: ../indexLogged.php");
        exit();
    }
    if ($_POST['submitCode'] == "Create Paste") {
        $filename = "";
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        for($i=0;$i<5;$i++)
            $filename.=substr($chars,random_int(0,strlen($chars)),1);

        $filename .= '.php';
        if (!file_exists($filename)) {
            $file = tmpfile();
        }
        $checkedOrNot = 0;
        if(isset($_POST['BAR']))
            $checkedOrNot = 1;
        /*$checkedOrNot = (int)'<script src=\"../controller/scripts/checkBurnAfterRead.js\" type="text/javascript">checkBurnAfterRead();</script>';*/
        $password = $_POST['password'];
        $expiration = $_POST['expiration'];
        $id = intval($decryptedId);
        echo $password;
        if(!empty($password)){
            $hashedPassword = cryptoJsAesEncrypt($key, $password);
        }
        else{
            $hashedPassword = null;
        }
        if(empty($expiration)){
            echo $checkedOrNot;
            include 'connection/connection.php';
            $sql = "INSERT INTO pastes(id, paste_name, password, burn_ar) values(?, ?, ?, ?)";
            if($stmt = $conn->prepare($sql)){
                $stmt->bind_param("issi", $id, $filename, $hashedPassword, $checkedOrNot);
                $stmt->execute();
            }
        }else{
            switch($expiration){
                case (302400):
                    include 'connection/connection.php';
                    $sql = "INSERT INTO pastes(id, paste_name, password, expiration_date, burn_ar) values(?, ?, ?, (CURRENT_TIMESTAMP + INTERVAL 1 MONTH), ?);";
                    if($stmt = $conn->prepare($sql)){
                        $stmt->bind_param("issi", $id, $filename, $hashedPassword, $checkedOrNot);
                        $stmt->execute();
                    }
                    break;
                default:
                    include 'connection/connection.php';
                    $sql = "INSERT INTO pastes(id, paste_name, password, expiration_date, burn_ar) values(?, ?, ?, (CURRENT_TIMESTAMP + INTERVAL (?) MINUTE), ?);";
                    if($stmt = $conn->prepare($sql)){
                        $stmt->bind_param("isssi", $id, $filename, $hashedPassword, $expiration, $checkedOrNot);
                        $stmt->execute();
                    }
                    break;
            }
        }


        $templateFile = fopen("template.html", "a+");
        $templateContent = '';

        while (!feof($templateFile))
            $templateContent = $templateContent . fgets($templateFile);

        $templateContent = $templateContent."<div class='modified-pastes'>Other Versions<table id='modified-pastes'></table></div>";
        $templateContent = $templateContent."<div class='textarea-container'><pre><code id='cod'>";
        $filename = '../Pastes/'.$filename;
        $file = fopen($filename, "a+");
        $text = $_POST["codeArea"];
        $text = str_replace("<", '&lt;', $text);
        $text = str_replace(">", '&gt;', $text);
        $text = $text."</code></pre>";
        $text = $text."<form method='post' action='../controller/editCode.php'>";
        $text = $text."<textarea name='codeArea' id='edit' class='textarea' style='display: none'>".$_POST["codeArea"]."</textarea>";
        $text = $text."Edit<input type='checkbox' id='Checkbox'  onclick='mySwitch()'>";
        $text = $text."<input type='hidden' name='fileName' value=\"<?php echo basename(__FILE__)?>\"/>";
        $text = $text."<input type='submit' class='submit' id='submit' name='submit' value='Apply changes' style='display: none'/></form></div>";
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
                break;
        }

        file_put_contents($filename, $templateContent.$text);
        fclose($file);
        header("Location: ../Pastes/" . $filename);
        
    }
    
}