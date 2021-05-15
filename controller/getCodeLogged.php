
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
        $text = $text. "<script src=\"../controller/scripts/syntaxHighlight.js\"></script>";
        file_put_contents($filename, $templateContent.$text);
        fclose($file);
        header("Location: ../Pastes/" . $filename);
    }
}