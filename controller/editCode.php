<?php
mysqli_report(MYSQLI_REPORT_ALL);
if(isset($_POST['deletePaste'])){
    session_start();
    echo $_POST['filename'];
    include 'connection/connection.php';
    global $conn;

    $sql_delete_paste = "DELETE FROM pastes WHERE paste_name = ?";
    $stmt_delete = $conn->prepare($sql_delete_paste);
    $stmt_delete -> bind_param("s", $_POST['filename']);
    $stmt_delete -> execute();
    unlink('../Pastes/'.$_POST['filename']);
    header("Location: ../index.php");

}
   else if(isset($_POST)){
        if($_POST["submit"] == "Apply changes")
        include 'connection/connection.php';
        include 'insertValuestoDB.php';
        $sql = "SELECT * FROM pastes WHERE paste_name = ?";
        $stmt = $conn->prepare($sql);
        $basename = substr($_POST["fileName"],0,5).".php";
        $stmt -> bind_param("s", $basename);
        $stmt -> execute();
        $pasteName =  null;
        $pasteId = null;
        $pass = null;
        $created_at = null;
        $expiration_date = null;
        $burn_after_read = null;
        $publicEdit = 0;
        $stmt -> bind_result($pasteId, $pasteName, $pass, $created_at, $expiration_date,$burn_after_read, $publicEdit);
        $stmt -> fetch();
        $pasteName = str_replace(".php", "", $pasteName);
        $filename = $pasteName."_modified_at_".date("d-m-Y_H-i-s").".php";
        $aux = $filename;
        if(!file_exists($filename)) {
            $file = tmpfile();
        }
        $templateFile = fopen("template.html", "a+");
        $templateContent = '';

        while (!feof($templateFile))
            $templateContent = $templateContent . fgets($templateFile);

        $templateContent = $templateContent."<div class='textarea-container'><pre><code id='cod'>";
        $filename = '../Pastes/'.$filename;
        echo $filename;
        $file = fopen($filename, "a+");
        $text = $_POST["codeArea"];
        $text = str_replace("<", '&lt;', $text);
        $text = str_replace(">", '&gt;', $text);
        $text = $text."</code></pre>";
        $text = $text."<form method='post' action='../controller/editCode.php'>";
        $text = $text."<textarea name='codeArea' id='edit' class='textarea' style='display: none'>".$_POST["codeArea"]."</textarea>";
        $text = $text."<div id='checkbox-div'>Edit<input type='checkbox' id='Checkbox'  onclick='mySwitch()'></div>";
        $text = $text."<input type='hidden' name='fileName' value=\"<?php echo basename(__FILE__)?>\"/>";
        $text = $text."<input type='hidden' name='script' value='".$_POST["script"]."'/>";
        $text = $text."<input type='submit' class='submit' id='submit' name='submit' value='Apply changes' style='display: none'/></form></div>";
        $text = $text.'<script type = "text/JavaScript">
        if(!(thisIsCreator || public == 1))
            document.getElementById("checkbox-div").style.visibility = "hidden";
        </script>';
        $text .= $_POST["script"];
        file_put_contents($filename, $templateContent.$text);
        fclose($file);
        include 'connection/connection.php';
        
        $sql = "INSERT INTO modified_pastes(paste_name, modified_paste_name) values(?, ?);";
        if($stmt = $conn->prepare($sql)){
            $stmt->bind_param("ss", $basename, $aux);
            $stmt->execute();
        }

        header("Location: ../Pastes/" . $filename);
    }