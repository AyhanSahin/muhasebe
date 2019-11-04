<?php
class captcha_help {

	public $image,$quality = 80 , $klosor ,$isim;
	

        
  function hex2rgb($hex_str, $return_string = false, $separator = ',') {
        $hex_str = preg_replace("/[^0-9A-Fa-f]/", '', $hex_str); // Gets a proper hex string
        $rgb_array = array();
        if( strlen($hex_str) == 6 ) {
            $color_val = hexdec($hex_str);
            $rgb_array['r'] = 0xFF & ($color_val >> 0x10);
            $rgb_array['g'] = 0xFF & ($color_val >> 0x8);
            $rgb_array['b'] = 0xFF & $color_val;
        } elseif( strlen($hex_str) == 3 ) {
            $rgb_array['r'] = hexdec(str_repeat(substr($hex_str, 0, 1), 2));
            $rgb_array['g'] = hexdec(str_repeat(substr($hex_str, 1, 1), 2));
            $rgb_array['b'] = hexdec(str_repeat(substr($hex_str, 2, 1), 2));
        } else {
            return false;
        }
        return $return_string ? implode($separator, $rgb_array) : $rgb_array;
    } 
    

function captcha($text, $font_file, $font_size = 12, $color = '#000000') {
		
	 $box = imagettfbbox($font_size, 0, $font_file, $text);
		if (!$box) {
			throw new Exception('Unable to load font: '.$font_file);
		}
		$box_width = abs($box[6] - $box[2]) * 1.5;
		$box_height = abs($box[7] - $box[1]) * 2;
        // Create the image
        $im = imagecreatetruecolor($box_width, $box_height);
		
	$color = $this->hex2rgb($color);
        $color = imagecolorallocate($im, $color['r'], $color['g'], $color['b']);
        
         $grey = imagecolorallocate($im, 128, 128, 128);  

        // Create some colors
        $white = imagecolorallocate($im, 255, 255, 255);
      
        imagefilledrectangle($im, 0, 0, 399, 29, $white);

        // The text to draw

        // Replace path by your own font path


        // Add some shadow to the text
      

        // Add the text
        
          imagettftext($im, $font_size, 0, 9, 19, $grey, $font_file, $text);        
        imagettftext($im, $font_size, 0, 10, 20, $color, $font_file, $text);

        // Using imagepng() results in clearer text compared with imagejpeg()
        header('Content-Type: image/png');
        imagepng($im);
        imagedestroy($im);


    
		
	} 


                                             
function textToImage($text) {
		$font_file = UPLOAD.'arial.ttf';
                $font_size = 10;
                $color = '#000000';
                
	 $box = imagettfbbox($font_size, 0, $font_file, $text);
		if (!$box) {
			throw new Exception('Unable to load font: '.$font_file);
		}
		$width = abs($box[6] - $box[2]) * 1.3;
		$height = abs($box[7] - $box[1]) * 2;


  $im = imagecreatetruecolor($width,$height);
        $color = '#000000';
        

$color = $this->hex2rgb($color);
        $color = imagecolorallocate($im, $color['r'], $color['g'], $color['b']);
        
         $grey = imagecolorallocate($im, 128, 128, 128);  
 
        // Create some colors
        $white = imagecolorallocate($im, 249, 249, 249);
      
        imagefilledrectangle($im, 0, 0, 399, 29, $white);

        // The text to draw

        // Replace path by your own font path


        // Add some shadow to the text
      

        // Add the text
      
        imagettftext($im, $font_size, 0, 2, 15, $color, $font_file, $text);

          ob_start();
        imagepng($im);
        
        printf('<img src="data:image/png;base64,%s"/ >', base64_encode(ob_get_clean()));
    
		
	} 
        
}
