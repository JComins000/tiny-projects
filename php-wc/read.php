<?php
$words = $_POST['words'];
$wc = array_count_values(str_word_count(strtolower($words), 1, true));
$word = $num = array();
foreach($wc as $key => $val){ 
    $word[] = $key; 
    $num[] = $val; 
}
array_multisort($num, SORT_DESC, $word, SORT_ASC, $wc);
print json_encode($wc);
?>