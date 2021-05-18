<?php
 
function delete_from_db($fileName){
    include 'connection/connection.php';
    $stmt = $conn->prepare("DELETE FROM pastes WHERE paste_name = ?;");
    $stmt->bind_param("s", $fileName);
    $stmt->execute();
}

function delete_older_than($dir, $max_age) {
  $list = array();
  
  $limit = time() - $max_age;
  
  $dir = realpath($dir);
  
  if (!is_dir($dir)) {
    return;
  }
  
  $dh = opendir($dir);
  if ($dh === false) {
    return;
  }
  
  while (($file = readdir($dh)) !== false) {
    $fileName = $file;
    $file = $dir . '/' . $file;
    if (!is_file($file)) {
      continue;
    }
    
    if (filemtime($file) < $limit) {
      $list[] = $file;
      unlink($file);
      delete_from_db($fileName);
    }
    
  }
  closedir($dh);
  return $list;

}

