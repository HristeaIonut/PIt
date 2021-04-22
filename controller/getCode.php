
<?php
if (isset($_POST)) {

    if(!strlen(trim($_POST['codeArea']))){
        header("Location: ../");
        exit();
    }
    if ($_POST['submitCode'] == "Create Paste") {
        $filename = '../Pastes/'.uniqid(rand(), true) . '.html';
        if (!file_exists($filename)) {
            $file = tmpfile();
        }

        $templateFile = fopen("template.html", "a+");
        $templateContent = '';

        while (!feof($templateFile))
            $templateContent = $templateContent . fgets($templateFile);
        $templateContent = $templateContent."<pre><code id='cod'>";
        $file = fopen($filename, "a+");
        $text = $_POST["codeArea"];
        $text = str_replace("<", '&lt;', $text);
        $text = str_replace(">", '&gt;', $text);
        $text = $text."</code></pre>";
        $text = $text. "<script src=\"../controller/syntaxHighlight.js\"></script>";
        file_put_contents($filename, $templateContent.$text);
        fclose($file);
        header("Location: ../Pastes/" . $filename);
    }
}