
<?php
if (isset($_POST)) {
    require("../res/constants.php");
    if(!strlen(trim($_POST['codeArea']))) {
        header("Location: ../indexLogged.php");
        exit();
    }

    if ($_POST['submitCode'] == "Create Paste") {
        $filename = '../Pastes/'.uniqid(rand(), true) . '.php';
        if (!file_exists($filename)) {
            $file = tmpfile();
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
        $text = $text. "<script src=\"../controller/scripts/syntaxHighlight.js\"></script>";
        file_put_contents($filename, $templateContent.$text);
        fclose($file);
        header("Location: ../Pastes/" . $filename);
    }
}