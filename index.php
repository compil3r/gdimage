<?php
	// Set the content-type
	header('Content-Type: image/png');

	// Create the image
	$im = imagecreatefrompng($_GET['imagem']);

	// Create some colors
	$white = imagecolorallocate($im, 255, 255, 255);

	$black = imagecolorallocate($im, 0, 0, 0);

	$black2 = imagecolorallocate($im, 5, 4, 4);
	
	// Make the background transparent

	imagecolortransparent($im, $black);
	//imagecolortransparent($im, $black2);
	
	//imagefilledrectangle($im, 0, 0, 3 9, 29, $white);

	// First we create our bounding box for the first text
	

	if(isset($_GET['nome']))
	{
		// The text to draw
		$text = $_GET['nome'];
		// Replace path by your own font path
		$font = 'digital-7.ttf';

		// Get image dimensions
		$width = imagesx($im) + 8;
		$height = imagesy($im) + 9;
		// Get center coordinates of image
		$centerX = $width / 2;
		$centerY = $height / 2;
		// Get size of text
		list($left, $bottom, $right, , , $top) = imageftbbox(20, 0, $font, $text);
		// Determine offset of text
		$left_offset = ($right - $left) / 2;
		$top_offset = ($bottom - $top) / 2;
		// Generate coordinates
		$x = $centerX - $left_offset;
		$y = $centerY - $top_offset;

		// Add some shadow to the text
		imagettftext($im,20, 0, $x, $y, $black2, $font, $text);

	} else {
		
			// The text to draw
			$text = 'Fechado' ;
			// Replace path by your own font path
			$font = 'digital-7.ttf';
	
			// Add some shadow to the text
			imagettftext($im,15, 0, 14, 42, $black2, $font, $text);
	
	}

	
	// Using imagepng() results in clearer text compared with imagejpeg()
	imagepng($im);
	//imagedestroy($im);

?>
