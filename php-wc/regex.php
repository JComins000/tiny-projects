<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="icon" type="image/jpeg" href="favicon.jpg">
<script src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
<script>
$(function() {
    var $fields = $(".form").children();
    $fields.keyup( function () {
        $.post('read.php', 'words=' + $("#base").val(), function (data) {
            var message = 'wc=' + data + '&q=' + $("#queryBox").val().replace("+","%2B");
            $.post('markup.php', message, function (response) {
                $("#wc").html(response);
                $("#base").css({
                    minWidth: $("#wc").width()-6
                });
            });
        });
    });
});
</script>
</head>
<body>
<?php include 'header.php';?>
<div class="contain">
<div class="form">
    <div style="padding-right:6px;">
        <textarea id="base" class="wide" placeholder="Text" autofocus/></textarea><br />
    </div>
    <div style="padding-right:4px;">
        <input type="text" id="queryBox" class="wide" placeholder="Search Query" />
    </div>
</div>
<div id="wc">
</div>
</div>
</body>
</html>