<?php

   # ========================================================================#
   #
   #  Author:    Jarrod Oberto
   #  Version:	 1.0
   #  Date:      17-Jan-10
   #  Purpose:   Resizes and saves image
   #  Requires : Requires PHP5, GD library.
   #  Usage Example:
   #                     include("classes/resize_class.php");
   #                     $resizeObj = new resize('images/cars/large/input.jpg');
   #                     $resizeObj -> resizeImage(150, 100, 0);
   #                     $resizeObj -> saveImage('images/cars/large/output.jpg', 100);
   #
   #
   # ========================================================================#


		Class ImageTool
		{
			// *** Class variables
			private static $image;
		  private static $width;
		  private static $height;
			private static $imageResized;
			public  static $imageDir;

			public static function setImage($fileName)
			{
          // *** Open up the file
          self::$image = self::openImage($fileName);

			    // *** Get width and height
			    self::$width  = imagesx(self::$image);
			    self::$height = imagesy(self::$image);
			}

			## --------------------------------------------------------

			private static function openImage($file)
			{
				// *** Get extension
				$extension = strtolower(strrchr($file, '.'));

				switch($extension)
				{
					case '.jpg':
					case '.jpeg':
						$img = imagecreatefromjpeg($file);
						break;
					case '.gif':
						$img = imagecreatefromgif($file);
						break;
					case '.png':
						$img = imagecreatefrompng($file);
						break;
					default:
						$img = false;
						break;
				}
				return $img;
			}

			## --------------------------------------------------------

			public static function resizeImage($newWidth, $newHeight, $option="auto")
			{
				// *** Get optimal width and height - based on $option
				$optionArray = self::getDimensions($newWidth, $newHeight, $option);

				$optimalWidth  = $optionArray['optimalWidth'];
				$optimalHeight = $optionArray['optimalHeight'];


				// *** Resample - create image canvas of x, y size
				self::$imageResized = imagecreatetruecolor($optimalWidth, $optimalHeight);
				imagecopyresampled(self::$imageResized, self::$image, 0, 0, 0, 0, $optimalWidth, $optimalHeight, self::$width, self::$height);


				// *** if option is 'crop', then crop too
				if ($option == 'crop') {
					self::crop($optimalWidth, $optimalHeight, $newWidth, $newHeight);
				}
			}

			## --------------------------------------------------------
			
			private static function getDimensions($newWidth, $newHeight, $option)
			{

			   switch ($option)
				{
					case 'exact':
						$optimalWidth = $newWidth;
						$optimalHeight= $newHeight;
						break;
					case 'portrait':
						$optimalWidth = self::getSizeByFixedHeight($newHeight);
						$optimalHeight= $newHeight;
						break;
					case 'landscape':
						$optimalWidth = $newWidth;
						$optimalHeight= self::getSizeByFixedWidth($newWidth);
						break;
					case 'auto':
						$optionArray = self::getSizeByAuto($newWidth, $newHeight);
						$optimalWidth = $optionArray['optimalWidth'];
						$optimalHeight = $optionArray['optimalHeight'];
						break;
					case 'crop':
						$optionArray = self::getOptimalCrop($newWidth, $newHeight);
						$optimalWidth = $optionArray['optimalWidth'];
						$optimalHeight = $optionArray['optimalHeight'];
						break;
				}
				return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);
			}

			## --------------------------------------------------------

			private static function getSizeByFixedHeight($newHeight)
			{
				$ratio = self::$width / self::$height;
				$newWidth = $newHeight * $ratio;
				return $newWidth;
			}

			private static function getSizeByFixedWidth($newWidth)
			{
				$ratio = self::$height / self::$width;
				$newHeight = $newWidth * $ratio;
				return $newHeight;
			}

			private static function getSizeByAuto($newWidth, $newHeight)
			{
				if (self::$height < self::$width)
				// *** Image to be resized is wider (landscape)
				{
					$optimalWidth = $newWidth;
					$optimalHeight= self::getSizeByFixedWidth($newWidth);
				}
				elseif (self::$height > self::$width)
				// *** Image to be resized is taller (portrait)
				{
					$optimalWidth = self::getSizeByFixedHeight($newHeight);
					$optimalHeight= $newHeight;
				}
				else
				// *** Image to be resizerd is a square
				{
					if ($newHeight < $newWidth) {
						$optimalWidth = $newWidth;
						$optimalHeight= self::getSizeByFixedWidth($newWidth);
					} else if ($newHeight > $newWidth) {
						$optimalWidth = self::getSizeByFixedHeight($newHeight);
						$optimalHeight= $newHeight;
					} else {
						// *** Sqaure being resized to a square
						$optimalWidth = $newWidth;
						$optimalHeight= $newHeight;
					}
				}

				return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);
			}

			## --------------------------------------------------------

			private static function getOptimalCrop($newWidth, $newHeight)
			{

				$heightRatio = self::$height / $newHeight;
				$widthRatio  = self::$width /  $newWidth;

				if ($heightRatio < $widthRatio) {
					$optimalRatio = $heightRatio;
				} else {
					$optimalRatio = $widthRatio;
				}

				$optimalHeight = self::$height / $optimalRatio;
				$optimalWidth  = self::$width  / $optimalRatio;

				return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);
			}

			## --------------------------------------------------------

			private static function crop($optimalWidth, $optimalHeight, $newWidth, $newHeight)
			{
				// *** Find center - this will be used for the crop
				$cropStartX = ( $optimalWidth / 2) - ( $newWidth /2 );
				$cropStartY = ( $optimalHeight/ 2) - ( $newHeight/2 );

				$crop = self::$imageResized;
				//imagedestroy(self::$imageResized);

				// *** Now crop from center to exact requested size
				self::$imageResized = imagecreatetruecolor($newWidth , $newHeight);
				imagecopyresampled(self::$imageResized, $crop , 0, 0, $cropStartX, $cropStartY, $newWidth, $newHeight , $newWidth, $newHeight);
			}

			## --------------------------------------------------------

			public static function saveImage($savePath, $imageQuality="100")
			{
				// *** Get extension
        		$extension = strrchr($savePath, '.');
       			$extension = strtolower($extension);

				switch($extension)
				{
					case '.jpg':
					case '.jpeg':
						if (imagetypes() & IMG_JPG) {
							imagejpeg(self::$imageResized, $savePath, $imageQuality);
						}
						break;

					case '.gif':
						if (imagetypes() & IMG_GIF) {
							imagegif(self::$imageResized, $savePath);
						}
						break;

					case '.png':
						// *** Scale quality from 0-100 to 0-9
						$scaleQuality = round(($imageQuality/100) * 9);

						// *** Invert quality setting as 0 is best, not 9
						$invertScaleQuality = 9 - $scaleQuality;

						if (imagetypes() & IMG_PNG) {
							 imagepng(self::$imageResized, $savePath, $invertScaleQuality);
						}
						break;

					// ... etc

					default:
						// *** No extension - No save.
						break;
				}

				imagedestroy(self::$imageResized);
				return str_replace(getcwd(), '', $savePath);
			}


			## --------------------------------------------------------
      
      public static function uploadFile($file){
        $ext = explode('.', $file['name']);
        $name = time().'.'.end($ext);
        $fileUpload = self::$imageDir.$name;
		
		//auto create directory if not found
		if(!is_dir(self::$imageDir)){
			mkdir(self::$imageDir, 0755, true);
		}
        $upload = move_uploaded_file($file['tmp_name'], $fileUpload);
        if($upload){
          return $fileUpload;
        }
        
        return false;
      }
	  
	  // added: ex. move temporary file to actual directory
	  public static function moveFile($filename,$source,$destination){
	  
		//auto create directory if not found for temp thumbnails
		if(!is_dir($destination)){
			mkdir($destination, 0755, true);
		} 
		rename($source.$filename,$destination.$filename); 
	  }
      
}