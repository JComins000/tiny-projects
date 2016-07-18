<?php
$max_font = 100;
$min_font = 20;
$total = 0;
$match_array = array();
if (!strcmp(gettype($wc),"string")) {
    die($wc);
}
$wc = json_decode($_POST['wc'], true);
$total = sizeof($wc);
$most = array_values($wc)[0];
$base = log($most, 2);
if ($_POST['q']) {
    $pattern = '/(' . $_POST['q'] . ')/';
    $replacement = '<span class="mark">$1</span>';
    foreach ($wc as $subject => $count) {
        $old_error = error_reporting(0);
        if (preg_match($pattern, $subject)) {
            $word = preg_replace($pattern, $replacement, $subject);
            $match_array[$word] = $count;
            unset($wc[$subject]);
        }
        error_reporting($old_error);
    }
}
function outputLine($word, $num, $fontsize) {
    echo "<div style='font-size:" . $fontsize . "px'>$num&nbsp;$word</div>";
}
function stylish_div($words) {
    global $min_font, $max_font, $most, $base, $total;
    if ($base <= 1) {
        $multiplicand = (6 - log($total, 1.85))/6;
        $bigFontsize = (int) ($multiplicand*($max_font - $min_font)) + $min_font;
        $smallFontsize = max($max_font - $smallFontsize, $min_font);
        if ($bigFontsize < $smallFontsize) {
            $bigFontsize ^= $smallFontsize ^= $bigFontsize ^= $smallFontsize;
        }
        foreach ($words as $key => $val) {
            outputLine($key, $val, $val == 2 ? $bigFontsize : $smallFontsize);
        }
    } else {
        foreach ($words as $key => $val) {
            $multiplicand = log($val,$base)/log($most,$base);
            $fontsize = (int) ($multiplicand*($max_font - $min_font)) + $min_font;
            outputLine($key, $val, $fontsize);
        }
    }
}
if ($match_array) {
    echo "<div class='match'>";
    stylish_div($match_array);
    echo "</div>";
}
echo "<div>";
stylish_div($wc);
echo "</div>";
?>