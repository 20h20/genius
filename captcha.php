<?php
	session_start();
	function generate_captcha_text($length = 6) {
		$characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
		return substr(str_shuffle(str_repeat($characters, $length)), 0, $length);
	}
	$_SESSION['cf7_captcha_text'] = generate_captcha_text();

	header('Content-type: image/png');
	$image = imagecreatetruecolor(150, 50);
	$bg_color = imagecolorallocate($image, 220, 220, 220);
	$text_color = imagecolorallocate($image, 0, 0, 0);
	imagefill($image, 0, 0, $bg_color);

	$font = __DIR__ . '/library/fonts/Arial.ttf';
	imagettftext($image, 20, rand(-10, 10), 20, 35, $text_color, $font, $_SESSION['cf7_captcha_text']);
	imagepng($image);
	imagedestroy($image);
?>