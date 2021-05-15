
<?php
require("getUsername.php");
include 'connection/connection.php';

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
        $stmt = $conn->prepare("INSERT INTO pastes(id, paste_name) VALUES (?, ?)");
        $p1 = intval($decryptedId);
        $p2 = $filename;
        $stmt->bind_param("is", $p1, $p2);
        $stmt->execute();
        $filename = '../Pastes/'.$filename;

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
        }
        file_put_contents($filename, $templateContent.$text);
        fclose($file);
        header("Location: ../Pastes/" . $filename);
    }
}