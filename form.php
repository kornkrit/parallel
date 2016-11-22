<?php
	session_start();
	ob_start();
	include('connect.php');
?>
<html>
<head>
<script src = 'jquery-2.1.4.js'></script>
<script type="text/javascript">
jQuery(document).ready(function($){
    $('.my-form .add-box').click(function(){
        var n = $('.text-box').length + 1;
        var box_html = $('<p class="text-box" color=""><label for="box' + n + '">Box <span class="box-number">' + n + '</span></label> <input type="text" name="boxes[]" value="" id="box' + n + '" /> <a href="#" class="remove-box">Remove</a></p>');
        box_html.hide();
        $('.my-form p.text-box:last').after(box_html);
        box_html.fadeIn('slow');
        return false;
    });
	
	$('.my-form').on('click', '.remove-box', function(){
    $(this).parent().css( 'background-color', '#FF6C6C' );
    $(this).parent().fadeOut("slow", function() {
        $(this).remove();
        $('.box-number').each(function(index){
            $(this).text( index + 1 );
        });
    });
    return false;
});
	
});


</script>


</head>
<body>
		<div class="my-form">
    <form role="form" method="post">
        <p class="text-box">
            <label for="box1">Question <span class="box-number">1</span></label>
            <input type="text" name="boxes[]" value="" id="box1" />
			<select>
				<option name="answer" value="multi">Volvo</option>
				<option name="answer" value="brief">Saab</option>
			</select>
            <a class="add-box" href="#">Add More</a>
        </p>
        <p><input type="submit" value="Submit" /></p>
    </form>
</div>
		<footer id="footer" class="body"><p>
			
		</footer>
		</body>
</html>