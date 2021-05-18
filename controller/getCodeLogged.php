
<?php
require("getUsername.php");
include 'connection/connection.php';
include 'deleteFunctions.php';

global $decryptedId, $conn;
if (isset($_POST)) {
    require("../res/constants.php");
    if(!strlen(trim($_POST['codeArea']))) {
        header("Location: ../indexLogged.php");
        exit();
    }
    if ($_POST['submitCode'] == "Create Paste") {
        $filename = uniqid(rand(), true) . '.html';
        if (!file_exists($filename)) {
            $file = tmpfile();
        }
        
        $password = $_POST['password'];
        $expiration = $_POST['expiration'];
        if(!empty($password)){
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $conn->prepare("INSERT INTO pastes(id, paste_name, password) VALUES (?, ?, ?)");
            $p1 = intval($decryptedId);
            $stmt->bind_param("iss", $p1, $filename, $hashedPassword);
            $stmt->execute();
            $filename = '../Pastes/'.$filename;
        }
        else{
            $stmt = $conn->prepare("INSERT INTO pastes(id, paste_name) VALUES (?, ?)");
            $p1 = intval($decryptedId);
            $stmt->bind_param("is", $p1, $filename);
            $stmt->execute();
            $filename = '../Pastes/'.$filename;
        }
        
        

        $templateFile = fopen("templateLogged.php", "a+");
        $templateContent = '';

        while (!feof($templateFile))
            $templateContent = $templateContent . fgets($templateFile);

        $templateContent = $templateContent."<pre><code id='cod'>";
        $file = fopen($filename, "a+");
        $text = $_POST["codeArea"];
        $text = str_replace("<", '&lt;', $text);
        $text = str_replace(">", '&gt;', $text);
        $text = $text."</code></pre>";
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
        $directory = '../Pastes';
        switch($expiration){
            case "0":
                break;
            case "5":
                delete_older_than($directory, 5 * 60);
                break;
            case "10":
                delete_older_than($directory, 10 * 60);
                break;
            case "30":
                delete_older_than($directory, 30 * 60);
                break;
            case "60":
                delete_older_than($directory, 60 * 60);
                break;
            case "1440":
                delete_older_than($directory, 1440 * 60);
                break;
            case "10080":
                delete_older_than($directory, 10080 * 60);
                break;
            case "302400":
                delete_older_than($directory, 302400 * 60);
                break;
         }
        file_put_contents($filename, $templateContent.$text);
        fclose($file);
        header("Location: ../Pastes/" . $filename);
        
    }
    
}