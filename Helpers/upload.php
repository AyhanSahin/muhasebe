<?php
class upload_help {

	public $image,$quality = 80 , $klosor ,$isim;
	
	protected  $filename, $original_info, $width, $height ;
	

	function __construct($filename = null, $width = null, $height = null, $color = null) {
		
		if ($filename) {
			$this->load($filename);
		} elseif ($width) {
			$this->create($width, $height, $color);
		}
		return $this;
	}
	
	/**
	 * Destroy image resource
	 *
	 */
	function __destruct() {
		if ($this->image) {
			imagedestroy($this->image);
		}
	}
	
	/**
	 * Load an image
	 *
	 * @param string		$filename	Path to image file
	 *
	 * @return SimpleImage
	 * @throws Exception
	 *
	 */
	 
        function videoupload($file,$klosor,$izinliler,$d){
         		 if($klosor==1){
			 $klosor = $this->klosor;
			 }
		 
		$nm = explode(".",basename($_FILES[$file]['name']));
		$uzanti = end($nm);
		$isim = time().rand(1,1000)."big.".$uzanti ;
                $this->isim = $isim;
		//$izinliler = array("pdf","doc","docx","rtf","png","xls","xlsx","txt","bmp","jpg","zip","rar"."jpeg");
	
				//$d = 2048000;
				//echo $deger ."<br>";
				$realboyut =  $_FILES[$file]['size'];
				//echo $realboyut;
					if($realboyut > $d )	 {
						throw new Exception("Dosya boyutu izin verilen degerin uzerinde..".$realboyut );
						
					}
					
				if($realboyut < 1 )	 {
						throw new Exception("Ek dosya yok" );
						
					}
					
				mkdir("upload/".$klosor.date('Y'));
				mkdir("upload/".$klosor.date('Y')."/".date('m'));
				touch("upload/".$klosor.date('Y')."/".date('m')."/index.html");
				 $kl = "upload/".$klosor.date('Y')."/".date('m');
		 
		 	if(in_array($uzanti,$izinliler)){
				$target = $kl."/".$isim  ;
				if(!move_uploaded_file($_FILES[$file]['tmp_name'],$target)){
					throw new Exception("Dosya Yuklemede sorun Olustu..". $kl );
						
					}
					}	
					else {
					throw new Exception("Dosya turune izin verilmiyor.");
							
					}
				//		throw new Exception($klosor.date('Y')."\\".date('m')."\\".$isim );
							//break;
				 return $klosor.date('Y')."/".date('m')."/".$isim ;
		 
            
            
            
        }
        
         
	 function yuklexml($file,$klosor=1){
		 if($klosor==1){
			 $klosor = $this->klosor;
			 }
		 
		$nm = explode(".",basename($_FILES[$file]['name']));
		$uzanti = end($nm);
		$isim = time().rand(1,1000)."big.".$uzanti ;
                $this->isim = $isim;
		$izinliler = array("xml","XML");
	
				$d = 25479348;
				//echo $deger ."<br>";
				$realboyut =  $_FILES[$file]['size'];
				//echo $realboyut;
					if($realboyut > $d )	 {
						throw new Exception("Dosya boyutu izin verilen degerin uzerinde..".$realboyut );
						
					}
					
				if($realboyut < 1 )	 {
						throw new Exception("Ek dosya yok" );
						
					}
					
				mkdir("upload/".$klosor.date('Y'));
				mkdir("upload/".$klosor.date('Y')."/".date('m'));
				touch("upload/".$klosor.date('Y')."/".date('m')."/index.html");
				 $kl = "upload/".$klosor.date('Y')."/".date('m');
		 
		 	if(in_array($uzanti,$izinliler)){
				$target = $kl."/".$isim  ;
				if(!move_uploaded_file($_FILES[$file]['tmp_name'],$target)){
					throw new Exception("Dosya Yuklemede sorun Olustu..". $kl );
						
					}
					}	
					else {
					throw new Exception("Dosya turune izin verilmiyor.");
							
					}
				//		throw new Exception($klosor.date('Y')."\\".date('m')."\\".$isim );
							//break;
				 return $klosor.date('Y')."/".date('m')."/".$isim ;
		 
		 }
	 
       
        
	 function yukle($file,$klosor=1){
		 if($klosor==1){
			 $klosor = $this->klosor;
			 }
		 
		$nm = explode(".",basename($_FILES[$file]['name']));
		$uzanti = end($nm);
		$isim = time().rand(1,1000)."big.".$uzanti ;
                $this->isim = $isim;
		$izinliler = array("pdf","doc","docx","rtf","png","xls","xlsx","txt","bmp","jpg","zip","rar","jpeg","BMP","JPG","PNG","JPEG");
	
				$d = 24800000;
				//echo $deger ."<br>";
				$realboyut =  $_FILES[$file]['size'];
				//echo $realboyut;
					if($realboyut > $d )	 {
						throw new Exception("Dosya boyutu izin verilen degerin uzerinde..".$realboyut );
						
					}
					
				if($realboyut < 1 )	 {
						throw new Exception("Ek dosya yok" );
						
					}
					
				mkdir("upload/".$klosor.date('Y'));
				mkdir("upload/".$klosor.date('Y')."/".date('m'));
				touch("upload/".$klosor.date('Y')."/".date('m')."/index.html");
				 $kl = "upload/".$klosor.date('Y')."/".date('m');
		 
		 	if(in_array($uzanti,$izinliler)){
				$target = $kl."/".$isim  ;
				if(!move_uploaded_file($_FILES[$file]['tmp_name'],$target)){
					throw new Exception("Dosya Yuklemede sorun Olustu..". $kl );
						
					}
					}	
					else {
					throw new Exception("Dosya turune izin verilmiyor.");
							
					}
				//		throw new Exception($klosor.date('Y')."\\".date('m')."\\".$isim );
							//break;
				 return $klosor.date('Y')."/".date('m')."/".$isim ;
		 
		 }
	 

                 
    	 function fileload($file,$klosor=1,$isim=""){
		 if($klosor==1){
			 $klosor = $this->klosor;
			 }
		 
		$nm = explode(".",basename($_FILES[$file]['name']));
		$uzanti = end($nm);
                if(!$isim):
		$isim = "image".time();
                endif;
                $this->isim = $isim;
		$izinliler = array("png","jpg","png","jpg"."jpeg");
	
				$d = 204800;
				//echo $deger ."<br>";
				$realboyut =  $_FILES[$file]['size'];
				//echo $realboyut;
					if($realboyut > $d )	 {
						throw new Exception("Dosya boyutu izin verilen degerin uzerinde..".$realboyut );
						
					}
					
				if($realboyut < 1 )	 {
						throw new Exception("Ek dosya yok" );
						
					}
					
				
			 
		 
		 	if(in_array($uzanti,$izinliler)){
				$target = $klosor."/".$isim  ;
				if(!move_uploaded_file($_FILES[$file]['tmp_name'],$target)){
					throw new Exception("Dosya Yuklemede sorun Olustu..". $kl );
						
					}
					}	
					else {
					throw new Exception("Dosya turune izin verilmiyor.");
							
					}
				//		throw new Exception($klosor.date('Y')."\\".date('m')."\\".$isim );
							//break;
				 return "ok" ;
		 
		 }
	              
                 
                 
                 
                 
	 
	function load($filename) {
		
		// Require GD library
		if (!extension_loaded('gd')) {
			throw new Exception('Required extension GD is not loaded.');
		}
		
		// Gather meta data
		$this->filename = $filename;
		$info = getimagesize($this->filename);
		switch ($info['mime']) {
			case 'image/gif':
				$this->image = imagecreatefromgif($this->filename);
				break;
			case 'image/jpeg':
				$this->image = imagecreatefromjpeg($this->filename);
				break;
			case 'image/png':
				$this->image = imagecreatefrompng($this->filename);
				break;
			default:
				throw new Exception('Invalid image: '.$this->filename);
				break;
		}
		$this->original_info = array(
			'width' => $info[0],
			'height' => $info[1],
			'orientation' => $this->get_orientation(),
			'exif' => function_exists('exif_read_data') && $info['mime'] === 'image/jpeg' ? $this->exif = @exif_read_data($this->filename) : null,
			'format' => preg_replace('/^image\//', '', $info['mime']),
			'mime' => $info['mime']
		);
		$this->width = $info[0];
		$this->height = $info[1];
		
		imagesavealpha($this->image, true);
		imagealphablending($this->image, true);
		
		return $this;
		
	}
	

	function create($width, $height = null, $color = null) {
		
		$height = $height ?: $width;
		$this->width = $width;
		$this->height = $height;
		$this->image = imagecreatetruecolor($width, $height);
		$this->original_info = array(
			'width' => $width,
			'height' => $height,
			'orientation' => $this->get_orientation(),
			'exif' => null,
			'format' => 'png',
			'mime' => 'image/png'
		);
		
		if ($color) {
			$this->fill($color);
		}
		
		return $this;
		
	}
	

	function fill($color = '#000000') {
		
		$rgba = $this->normalize_color($color);
		$fill_color = imagecolorallocatealpha($this->image, $rgba['r'], $rgba['g'], $rgba['b'], $rgba['a']);
		imagealphablending($this->image, false);
		imagesavealpha($this->image, true);		
		imagefilledrectangle($this->image, 0, 0, $this->width, $this->height, $fill_color);
		
		return $this;
		
	}

	function save($filename = null, $quality = null) {
		
		// Determine quality, filename, and format
		$quality = $quality ?: $this->quality;
		$filename = $filename ?: $this->filename;
		$format = $this->file_ext($filename) ?: $this->original_info['format'];
		
		// Create the image
		switch (strtolower($format)) {
			case 'gif':
				$result = imagegif($this->image, $filename);
				break;
			case 'jpg':
			case 'jpeg':
				imageinterlace($this->image, true);
				$result = imagejpeg($this->image, $filename, round($quality));
				break;
			case 'png':
				$result = imagepng($this->image, $filename, round(9 * $quality / 100));
				break;
			default:
				throw new Exception('Unsupported format');
		}
		
		if (!$result) {
			throw new Exception('Unable to save image: ' . $filename);
		}
		
		return $this;
		
	}


	function get_original_info() {
		return $this->original_info;
	}


	function get_width() {
		return $this->width;
	}
	

	function get_height() {
		return $this->height;
	}
	

	function get_orientation() {
		
		if (imagesx($this->image) > imagesy($this->image)) {
			return 'landscape';
		}
		
		if (imagesx($this->image) < imagesy($this->image)) {
			return 'portrait';
		}
		
		return 'square';
		
	}


	function flip($direction) {
		
		$new = imagecreatetruecolor($this->width, $this->height);
		imagealphablending($new, false);
		imagesavealpha($new, true);
		
		switch (strtolower($direction)) {
			case 'y':
				for ($y = 0; $y < $this->height; $y++) {
					imagecopy($new, $this->image, 0, $y, 0, $this->height - $y - 1, $this->width, 1);
				}
				break;
			default:
				for ($x = 0; $x < $this->width; $x++) {
					imagecopy($new, $this->image, $x, 0, $this->width - $x - 1, 0, 1, $this->height);
				}
				break;
		}
		
		$this->image = $new;
		
		return $this;
		
	}


	function rotate($angle, $bg_color = '#000000') {
		
		// Perform the rotation
		$rgba = $this->normalize_color($bg_color);
		$bg_color = imagecolorallocatealpha($this->image, $rgba['r'], $rgba['g'], $rgba['b'], $rgba['a']);
		$new = imagerotate($this->image, -($this->keep_within($angle, -360, 360)), $bg_color);
		imagesavealpha($new, true);
		imagealphablending($new, true);
		
		// Update meta data
		$this->width = imagesx($new);
		$this->height = imagesy($new);
		$this->image = $new;
		
		return $this;
		
	}


	function auto_orient() {
		
		switch ($this->original_info['exif']['Orientation']) {
			case 1:
				// Do nothing
				break;
			case 2:
				// Flip horizontal
				$this->flip('x');
				break;
			case 3:
				// Rotate 180 counterclockwise
				$this->rotate(-180);
				break;
			case 4:
				// vertical flip
				$this->flip('y');
				break;
			case 5:
				// Rotate 90 clockwise and flip vertically
				$this->flip('y');
				$this->rotate(90);
				break;
			case 6:
				// Rotate 90 clockwise
				$this->rotate(90);
				break;
			case 7:
				// Rotate 90 clockwise and flip horizontally
				$this->flip('x');
				$this->rotate(90);
				break;
			case 8:
				// Rotate 90 counterclockwise
				$this->rotate(-90);
				break;
		}
		
		return $this;
		
	}


	function resize($width, $height) {
		
		// Generate new GD image
		$new = imagecreatetruecolor($width, $height);
		
		if( $this->original_info['format'] === 'gif' ) {
			// Preserve transparency in GIFs
			$transparent_index = imagecolortransparent($this->image);
			if ($transparent_index >= 0) {
	            $transparent_color = imagecolorsforindex($this->image, $transparent_index);
	            $transparent_index = imagecolorallocate($new, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
	            imagefill($new, 0, 0, $transparent_index);
	            imagecolortransparent($new, $transparent_index);
			}
		} else {
			// Preserve transparency in PNGs (benign for JPEGs)
			imagealphablending($new, false);
			imagesavealpha($new, true);
		}
		
		// Resize
		imagecopyresampled($new, $this->image, 0, 0, 0, 0, $width, $height, $this->width, $this->height);
		
		// Update meta data
		$this->width = $width;
		$this->height = $height;
		$this->image = $new;
		
		return $this;
		
	}


	function adaptive_resize($width, $height = null) {
		
		return $this->thumbnail($width, $height);
		
	}


	function thumbnail($width, $height = null) {
		
		// Determine height
		$height = $height ?: $width;
		
		// Determine aspect ratios
		$current_aspect_ratio = $this->height / $this->width;
		$new_aspect_ratio = $height / $width;
		
		// Fit to height/width
		if ($new_aspect_ratio > $current_aspect_ratio) {
			$this->fit_to_height($height);
		} else {
			$this->fit_to_width($width);
		}
		$left = ($this->width / 2) - ($width / 2);
		$top = ($this->height / 2) - ($height / 2);
		
		// Return trimmed image
		return $this->crop($left, $top, $width + $left, $height + $top);
		
	}	


	function fit_to_width($width) {
		
		$aspect_ratio = $this->height / $this->width;
		$height = $width * $aspect_ratio;
		
		return $this->resize($width, $height);
		
	}


	function fit_to_height($height) {
		
		$aspect_ratio = $this->height / $this->width;
		$width = $height / $aspect_ratio;
		
		return $this->resize($width, $height);
		
	}


	function best_fit($max_width, $max_height) {
		
		// If it already fits, there's nothing to do
		if ($this->width <= $max_width && $this->height <= $max_height) {
			return $this;
		}
		
		// Determine aspect ratio
		$aspect_ratio = $this->height / $this->width;
		
		// Make width fit into new dimensions
		if ($this->width > $max_width) {
			$width = $max_width;
			$height = $width * $aspect_ratio;
		} else {
			$width = $this->width;
			$height = $this->height;
		}
		
		// Make height fit into new dimensions
		if ($height > $max_height) {
			$height = $max_height;
			$width = $height / $aspect_ratio;
		}
		
		return $this->resize($width, $height);
		
	}


	function crop($x1, $y1, $x2, $y2) {
		
		// Determine crop size
		if ($x2 < $x1) {
			list($x1, $x2) = array($x2, $x1);
		}
		if ($y2 < $y1) {
			list($y1, $y2) = array($y2, $y1);
		}
		$crop_width = $x2 - $x1;
		$crop_height = $y2 - $y1;
		
		// Perform crop
		$new = imagecreatetruecolor($crop_width, $crop_height);
		imagealphablending($new, false);
		imagesavealpha($new, true);
		imagecopyresampled($new, $this->image, 0, 0, $x1, $y1, $crop_width, $crop_height, $crop_width, $crop_height);
		
		// Update meta data
		$this->width = $crop_width;
		$this->height = $crop_height;
		$this->image = $new;
		
		return $this;
		
	}


	function desaturate() {
		imagefilter($this->image, IMG_FILTER_GRAYSCALE);
		return $this;
	}
	


	function invert() {
		imagefilter($this->image, IMG_FILTER_NEGATE);
		return $this;
	}


	function brightness($level) {
		imagefilter($this->image, IMG_FILTER_BRIGHTNESS, $this->keep_within($level, -255, 255));
		return $this;
	}


	function contrast($level) {
		imagefilter($this->image, IMG_FILTER_CONTRAST, $this->keep_within($level, -100, 100));
		return $this;
	}


	function colorize($color, $opacity) {
		$rgba = $this->normalize_color($color);
		$alpha = $this->keep_within(127 - (127 * $opacity), 0, 127);
		imagefilter($this->image, IMG_FILTER_COLORIZE, $this->keep_within($rgba['r'], 0, 255), $this->keep_within($rgba['g'], 0, 255), $this->keep_within($rgba['b'], 0, 255), $alpha);
		return $this;
	}


	function edges() {
		imagefilter($this->image, IMG_FILTER_EDGEDETECT);
		return $this;
	}


	function emboss() {
		imagefilter($this->image, IMG_FILTER_EMBOSS);
		return $this;
	}


	function mean_remove() {
		imagefilter($this->image, IMG_FILTER_MEAN_REMOVAL);
		return $this;
	}


	function blur($type = 'selective', $passes = 1) {
		switch (strtolower($type)) {
			case 'gaussian':
				$type = IMG_FILTER_GAUSSIAN_BLUR;
				break;
			default:
				$type = IMG_FILTER_SELECTIVE_BLUR;
				break;
		}
		for ($i = 0; $i < $passes; $i++) {
			imagefilter($this->image, $type);
		}
		return $this;
	}


	function sketch() {
		imagefilter($this->image, IMG_FILTER_MEAN_REMOVAL);
		return $this;
	}


	function smooth($level) {
		imagefilter($this->image, IMG_FILTER_SMOOTH, $this->keep_within($level, -10, 10));
		return $this;
	}


	function pixelate($block_size = 10) {
		imagefilter($this->image, IMG_FILTER_PIXELATE, $block_size, true);
		return $this;
	}


	function sepia() {
		imagefilter($this->image, IMG_FILTER_GRAYSCALE);
		imagefilter($this->image, IMG_FILTER_COLORIZE, 100, 50, 0);
		return $this;
	}


	function overlay($overlay_file, $position = 'center', $opacity = 1, $x_offset = 0, $y_offset = 0) {
		
		// Load overlay image
		$overlay = new SimpleImage($overlay_file);
		
		// Convert opacity
		$opacity = $opacity * 100;
		
		// Determine position
		switch (strtolower($position)) {
			case 'top left':
				$x = 0 + $x_offset;
				$y = 0 + $y_offset;
				break;
			case 'top right':
				$x = $this->width - $overlay->width + $x_offset;
				$y = 0 + $y_offset;
				break;
			case 'top':
				$x = ($this->width / 2) - ($overlay->width / 2) + $x_offset;
				$y = 0 + $y_offset;
				break;
			case 'bottom left':
				$x = 0 + $x_offset;
				$y = $this->height - $overlay->height + $y_offset;
				break;
			case 'bottom right':
				$x = $this->width - $overlay->width + $x_offset;
				$y = $this->height - $overlay->height + $y_offset;
				break;
			case 'bottom':
				$x = ($this->width / 2) - ($overlay->width / 2) + $x_offset;
				$y = $this->height - $overlay->height + $y_offset;
				break;
			case 'left':
				$x = 0 + $x_offset;
				$y = ($this->height / 2) - ($overlay->height / 2) + $y_offset;
				break;
			case 'right':
				$x = $this->width - $overlay->width + $x_offset;
				$y = ($this->height / 2) - ($overlay->height / 2) + $y_offset;
				break;
			case 'center':
			default:
				$x = ($this->width / 2) - ($overlay->width / 2) + $x_offset;
				$y = ($this->height / 2) - ($overlay->height / 2) + $y_offset;
				break;
		}
		
		// Perform the overlay
		$this->imagecopymerge_alpha($this->image, $overlay->image, $x, $y, 0, 0, $overlay->width, $overlay->height, $opacity);
		
		return $this;
		
	}


	function text($text, $font_file, $font_size = 12, $color = '#000000', $position = 'center', $x_offset = 0, $y_offset = 0) {
		$font_size = ($this->width / 100) * 4;
		// todo - this method could be improved to support the text angle
		$angle = 35;
		
		// Determine text color
		$rgba = $this->normalize_color($color);
                
                $transparent = imagecolorallocatealpha($this->image, 255,255,255, 127);
                
		$color = imagecolorallocatealpha($this->image, $rgba['r'], $rgba['g'], $rgba['b'], $rgba['a']);
		
               
                
		// Determine textbox size
		$box = imagettfbbox($font_size, $angle, $font_file, $text);
		if (!$box) {
			throw new Exception('Unable to load font: '.$font_file);
		}
		$box_width = abs($box[6] - $box[2]);
		$box_height = abs($box[7] - $box[1]);
		
		// Determine position
		switch (strtolower($position)) {
			case 'top left':
				$x = 0 + $x_offset;
				$y = 0 + $y_offset + $box_height;
				break;
			case 'top right':
				$x = $this->width - $box_width + $x_offset;
				$y = 0 + $y_offset + $box_height;
				break;
			case 'top':
				$x = ($this->width / 2) - ($box_width / 2) + $x_offset;
				$y = 0 + $y_offset + $box_height;
				break;
			case 'bottom left':
				$x = 0 + $x_offset;
				$y = $this->height - $box_height + $y_offset + $box_height;
				break;
			case 'bottom right':
				$x = $this->width - $box_width + $x_offset;
				$y = $this->height - $box_height + $y_offset + $box_height;
				break;
			case 'bottom':
				$x = ($this->width / 2) - ($box_width / 2) + $x_offset;
				$y = $this->height - $box_height + $y_offset + $box_height;
				break;
			case 'left':
				$x = 0 + $x_offset;
				$y = ($this->height / 2) - (($box_height / 2) - $box_height) + $y_offset;
				break;
			case 'right';
				$x = $this->width - $box_width + $x_offset;
				$y = ($this->height / 2) - (($box_height / 2) - $box_height) + $y_offset;
				break;
			case 'center':
			default:
				$x = ($this->width / 2) - ($box_width / 2) + $x_offset;
				$y = ($this->height / 2) - (($box_height / 2) - $box_height) + $y_offset;
				break;
		}
                $grey = imagecolorallocate($this->image, 127,127,127);
                imagefilledrectangle($this->image, 10, 10, $imageX-10, $imageY-10, $grey);
                imagealphablending($this->image, true);
		 imagefilledrectangle($this->image, 2, 2, $x-4, $y-4, $transparent);
		// Add the text
		//imagettftext($this->image, $font_size, $angle, $x, $y,'#000000', $font_file, $text);
		imagettftext($this->image, $font_size, $angle, $x, $y, $color, $font_file, $text);
		return $this;
		
	}


	function output($format = null, $quality = null) {
		
		// Determine quality
		$quality = $quality ?: $this->quality;
		
		// Determine mimetype
		switch (strtolower($format)) {
			case 'gif':
				$mimetype = 'image/gif';
				break;
			case 'jpeg':
			case 'jpg':
				imageinterlace($this->image, true);
				$mimetype = 'image/jpeg';
				break;
			case 'png':
				$mimetype = 'image/png';
				break;
			default:
				$info = getimagesize($this->filename);
				$mimetype = $info['mime'];
				unset($info);
				break;
		}
		
		// Output the image
		header('Content-Type: '.$mimetype);
		switch ($mimetype) {
			case 'image/gif':
				imagegif($this->image);
				break;
			case 'image/jpeg':
				imagejpeg($this->image, null, round($quality));
				break;
			case 'image/png':
				imagepng($this->image, null, round(9 * $quality / 100));
				break;
			default:
				throw new Exception('Unsupported image format: '.$this->filename);
				break;
		}
		// Since no more output can be sent, call the destructor to free up memory
		$this->__destruct();
	}


	function output_base64($format = null, $quality = null) {
		// Determine quality
		$quality = $quality ?: $this->quality;
		// Determine mimetype
		switch (strtolower($format)) {
			case 'gif':
				$mimetype = 'image/gif';
				break;
			case 'jpeg':
			case 'jpg':
				imageinterlace($this->image, true);
				$mimetype = 'image/jpeg';
				break;
			case 'png':
				$mimetype = 'image/png';
				break;
			default:
				$info = getimagesize($this->filename);
				$mimetype = $info['mime'];
				unset($info);
				break;
		}
		
		// Output the image
		ob_start();
		switch ($mimetype) {
			case 'image/gif':
				imagegif($this->image);
				break;
			case 'image/jpeg':
				imagejpeg($this->image, null, round($quality));
				break;
			case 'image/png':
				imagepng($this->image, null, round(9 * $quality / 100));
				break;
			default:
				throw new Exception('Unsupported image format: '.$this->filename);
				break;
		}
		$image_data = ob_get_contents();
		ob_end_clean();
		// Returns formatted string for img src
		return 'data:'.$mimetype.';base64,'.base64_encode($image_data);
	}


	protected function imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct) {
		// Get image width and height and percentage
		$pct /= 100;
		$w = imagesx($src_im);
		$h = imagesy($src_im);
		// Turn alpha blending off
		imagealphablending($src_im, false);
		// Find the most opaque pixel in the image (the one with the smallest alpha value)
		$minalpha = 127;
		for ($x = 0; $x < $w; $x++) {
			for ($y = 0; $y < $h; $y++) {
				$alpha = (imagecolorat($src_im, $x, $y) >> 24) & 0xFF;
				if ($alpha < $minalpha) {
					$minalpha = $alpha;
				}
			}
		}
		// Loop through image pixels and modify alpha for each
		for ($x = 0; $x < $w; $x++) {
			for ($y = 0; $y < $h; $y++) {
				// Get current alpha value (represents the TANSPARENCY!)
				$colorxy = imagecolorat($src_im, $x, $y);
				$alpha = ($colorxy >> 24) & 0xFF;
				// Calculate new alpha
				if ($minalpha !== 127) {
					$alpha = 127 + 127 * $pct * ($alpha - 127) / (127 - $minalpha);
				} else {
					$alpha += 127 * $pct;
				}
				// Get the color index with new alpha
				$alphacolorxy = imagecolorallocatealpha($src_im, ($colorxy >> 16) & 0xFF, ($colorxy >> 8) & 0xFF, $colorxy & 0xFF, $alpha);
				// Set pixel with the new color + opacity
				if (!imagesetpixel($src_im, $x, $y, $alphacolorxy)) {
					return;
				}
			}
		}
		// Copy it
		imagesavealpha($dst_im, true);
		imagealphablending($dst_im, true);
		imagesavealpha($src_im, true);
		imagealphablending($src_im, true);
		imagecopy($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h);
	}


	protected function keep_within($value, $min, $max) {
		if ($value < $min) {
			return $min;
		}
		if ($value > $max) {
			return $max;
		}
		return $value;
	}


	protected function file_ext($filename) {
		if (!preg_match('/\./', $filename)) {
			return '';
		}
		return preg_replace('/^.*\./', '', $filename);
	}


	protected function normalize_color($color) {
		if (is_string($color)) {
			$color = trim($color, '#');
			if (strlen($color) == 6) {
				list($r, $g, $b) = array(
					$color[0].$color[1],
					$color[2].$color[3],
					$color[4].$color[5]
				);
			} elseif (strlen($color) == 3) {
				list($r, $g, $b) = array(
					$color[0].$color[0],
					$color[1].$color[1],
					$color[2].$color[2]
				);
			} else {
				return false;
			}
			return array(
				'r' => hexdec($r),
				'g' => hexdec($g),
				'b' => hexdec($b),
				'a' => 0
			);
			
		} elseif (is_array($color) && (count($color) == 3 || count($color) == 4)) {
			
			if (isset($color['r'], $color['g'], $color['b'])) {
				return array(
					'r' => $this->keep_within($color['r'], 0, 255),
					'g' => $this->keep_within($color['g'], 0, 255),
					'b' => $this->keep_within($color['b'], 0, 255),
					'a' => $this->keep_within(isset($color['a']) ? $color['a'] : 0, 0, 127)
				);
			} elseif (isset($color[0], $color[1], $color[2])) {
				return array(
					'r' => $this->keep_within($color[0], 0, 255),
					'g' => $this->keep_within($color[1], 0, 255),
					'b' => $this->keep_within($color[2], 0, 255),
					'a' => $this->keep_within(isset($color[3]) ? $color[3] : 0, 0, 127)
				);
			}
			
		}
		return false;
	}
}

/*
try {

	$img = new SimpleImage();

	// Create from scratch
	$img->create(200, 100, '#08c')->save('processed/create-from-scratch.png');
	// Convert to GIF
	$img->load('butterfly.jpg')->save('processed/butterfly-convert-to-gif.gif');
	// Strip exif data (just load and save)
	$img->load('butterfly.jpg')->save('processed/butterfly-strip-exif.jpg');
	// Flip horizontal
	$img->load('butterfly.jpg')->flip('x')->save('processed/butterfly-flip-horizontal.jpg');
	// Flip vertical
	$img->load('butterfly.jpg')->flip('y')->save('processed/butterfly-flip-vertical.jpg');
	// Flip both
	$img->load('butterfly.jpg')->flip('x')->flip('y')->save('processed/butterfly-flip-both.jpg');
	// Rotate 90
	$img->load('butterfly.jpg')->rotate(90)->save('processed/butterfly-rotate-90.jpg');
	// Auto-orient
	$img->load('butterfly.jpg')->auto_orient()->save('processed/butterfly-auto-orient.jpg');
	// Resize
	$img->load('butterfly.jpg')->resize(320, 239)->save('processed/butterfly-resize.jpg');
	// Thumbnail
	$img->load('butterfly.jpg')->thumbnail(100, 75)->save('processed/butterfly-thumbnail.jpg');
	// Fit to width
	$img->load('butterfly.jpg')->fit_to_width(100)->save('processed/butterfly-fit-to-width.jpg');
	// Fit to height
	$img->load('butterfly.jpg')->fit_to_height(100)->save('processed/butterfly-fit-to-height.jpg');
	// Best fit
	$img->load('butterfly.jpg')->best_fit(100, 400)->save('processed/butterfly-best-fit.jpg');
	// Crop
	$img->load('butterfly.jpg')->crop(160, 110, 460, 360)->save('processed/butterfly-crop.jpg');
	// Desaturate
	$img->load('butterfly.jpg')->desaturate()->save('processed/butterfly-desaturate.jpg');
	// Invert
	$img->load('butterfly.jpg')->invert()->save('processed/butterfly-invert.jpg');
	// Brighten
	$img->load('butterfly.jpg')->brightness(100)->save('processed/butterfly-brighten.jpg');
	// Darken
	$img->load('butterfly.jpg')->brightness(-100)->save('processed/butterfly-darken.jpg');
	// Contrast
	$img->load('butterfly.jpg')->contrast(-50)->save('processed/butterfly-contrast.jpg');
	// Colorize
	$img->load('butterfly.jpg')->colorize('#08c', .75)->save('processed/butterfly-colorize.jpg');
	// Edge Detect
	$img->load('butterfly.jpg')->edges()->save('processed/butterfly-edges.jpg');
	// Mean Removal
	$img->load('butterfly.jpg')->mean_remove()->save('processed/butterfly-mean-remove.jpg');
	// Emboss
	$img->load('butterfly.jpg')->emboss()->save('processed/butterfly-emboss.jpg');
	// Selective Blur
	$img->load('butterfly.jpg')->blur('selective', 10)->save('processed/butterfly-blur-selective.jpg');
	// Gaussian Blur
	$img->load('butterfly.jpg')->blur('gaussian', 10)->save('processed/butterfly-blur-gaussian.jpg');
	// Sketch
	$img->load('butterfly.jpg')->sketch()->save('processed/butterfly-sketch.jpg');
	// Smooth
	$img->load('butterfly.jpg')->smooth(6)->save('processed/butterfly-smooth.jpg');
	// Pixelate
	$img->load('butterfly.jpg')->pixelate(8)->save('processed/butterfly-pixelate.jpg');
	// Sepia
	$img->load('butterfly.jpg')->sepia(8)->save('processed/butterfly-sepia.jpg');
	// Overlay
	$img->load('butterfly.jpg')->overlay('overlay.png', 'bottom right', .8)->save('processed/butterfly-overlay.jpg');

	// Text
	$img->load('butterfly.jpg')->text('Butterfly', __DIR__.'/delicious.ttf', 32, '#FFFFFF', 'bottom', 0, -20)->save('processed/butterfly-text.jpg');

	// Resizing GIFs with transparency
	$img->load('basketball.gif')->resize(50, 50)->save('processed/basketball-resize.gif');
	
	echo '<span style="color: green;">All processed images are saved in /example/processed</span>';

} catch (Exception $e) {
	echo '<span style="color: red;">'.$e->getMessage().'</span>';
}

*/



















?>