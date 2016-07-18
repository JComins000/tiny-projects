<?php
$max_filesize = 5242880;
$target_dir = "uploads/";
$target_file = $target_dir . date('Y-m-d-H-i-s') . '_' . uniqid();
// Check file size
if ($_FILES["fileToUpload"]["size"] == 0) {
    die(json_encode(array ("words" => 0)));
}
if ($_FILES["fileToUpload"]["size"] > $max_filesize) {
    die("Filesize too big. Did not upload file.");
}
if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    die("Error uploading.");
}
$userfile = fopen($target_file, "r") or die("Unable to open file!");
$file_contents = fread($userfile,filesize($target_file));
fclose($userfile);
unlink($target_file);
$wc = array_count_values(str_word_count(strtolower($file_contents), 1));
$word = $num = array();
foreach($wc as $key => $val){ 
    $word[] = $key; 
    $num[] = $val; 
}
array_multisort($num, SORT_DESC, $word, SORT_ASC, $wc);
print json_encode($wc);
?>