<?PHP
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
/*************************** START: HEADER **********************************
 Project: anySize
 Written By: Jacques Favreau
 Date: July 28, 2009
******************************* END: HEADER **********************************/
 
/*************************** START: EXPLANATION *******************************
 
 This script will resize your images including and cache the results for fast 
 service in the future.
 
 See the attached README.txt for an explanation of how the script works and
 the input variables.

***************************** END: EXPLANATION *******************************/

/********* START: VARIABLE DECLARATION - YOU CAN EDIT THIS AS NEEDED *********/
	
	// This is the location (relative or absolute) to your images folder. 
	// The system will look here for source material, so make sure you set it 
	// and make sure it has a trailing slash!
	$IMAGE_FOLDER= WWW_ROOT.$_GET['folder'];
	
	// This is the location (relative or absolute) to your image cache folder.
	// When the system makes up a resized image it will store the result here 
	// and the next time you ask for that size it will just serve the file 
	// instead of having to re-generate it (which takes time & processor power)
	$CACHE_FOLDER= WWW_ROOT.'img/cache/';
	
	// This array translates strings like "thumb" and "medium" into pixel sizes.
	// each size is stored as a sub-array in the form 'name'=>array(width, height)
	$LEGAL_SIZES=array(
		'thumb'=>array(80,80),
		'small'=>array(400,400),
		'medium'=>array(800,800),
		'large'=>array(1024,1024),
		'x-large'=>array(1200,1200)
	);
	
	// If you want to allow arbitrary resizing (EX: image.png?w=100&h=150) set
	// set this to true.
	// WARNING: should somebody out there be trying to make your server work overtime
	// they could request image.png?w=100&h=151 and image.png?w=100&h=152 etc etc etc
	// and the system will dutifully generate and serve up this content putting stress 
	// on your resources. Best practices dictate you use the $LEGAL_SIZES array instead
	// but we all know how dev time is, so I left this in. Shouldn't really be a problem
	// but playing it safe is... well... safer. :)
	$ALLOW_ARBITRARY_SIZE=false;
	
	// Set the maximum size for the image. This just keeps the server from
	// melting if you accidentally set the height and width a few orders of
	// magnitude larger than you planned 
	$MAX_IMAGE_SIZE = 500;
	
	// This is a processor load vs. storage space option: If you set to "false" then 
	// the system will use the fewest files possible but with a slight increase in
	// processor time etc as more information is calculated so that file=image.png&s=thumb
	// points to the same cache file as file=image.png&h=60&w=60. If set to "true" then a 
	// separate file would be cached for both examples above. Your choice but I'd 
	// suggest "true" as it will lead faster execution and less runtime load.
	$OPTIMIZE_FOR_SPEED = true;
	
	// buffer size to read from an image file. The default 4096 should work for just about
	// any server situation but if you have some odd setup you can change this here.
	$SEND_BUFFER_SIZE = 4096 ;
	
/*********************** END: VARIABLE DECLARATION. **************************/ 
/********DO NOT EDIT PAST THIS POINT UNLESS YOU KNOW WHAT YOU'RE DOING! ******/

/***************************** START: SCRIPT CODE ****************************/

// get the file name
if(isset($_GET['file'])){
	// get the path to the original file
	$original_file_path = $IMAGE_FOLDER.$_GET['file'];
	// pr($original_file_path);exit;
	if(file_exists($original_file_path)){
		// geet the information about the original file
		$original_file_info = pathinfo($original_file_path);
		// get the extension or die trying!
		@$ext = $original_file_info['extension'] or fatal_error('File does not have an extension!');
		// php 5.2+ has the base name in the pathinfo data otherwise drag it out at the cost of more server load.
		$base_name = ($original_file_info['filename'])?$original_file_info['filename']:substr($_GET['file'],0,-1-strlen($ext));
		// get the mime type
		$original_getimagesize = getimagesize($original_file_path);
		$mime_type=$original_getimagesize['mime'];
	}else{
		// if the file doesn't exist then tell us!
		fatal_error('Image source does not exist!');
	}
}else{
	// otherwise they didn't give us a file!
	fatal_error('Image source not set!');
}

// get the target height/width box from the get variables
if(isset($_GET['s'])){
	// get the size of the image or die with an error if that size is not legal.
	@list($width, $height) = $LEGAL_SIZES[$_GET['s']] or fatal_error('That image size does not exist');
}elseif($ALLOW_ARBITRARY_SIZE && isset($_GET['w']) || isset($_GET['h'])){
	// if we're allowing arbitrar size and we have a width or a height to work with then it's on like DK.
	// get the width or set it to the max
	@$width=(int)$_GET['w'] or $width = $MAX_IMAGE_SIZE;
	// get the height or set it to the max
	@$height=(int)$_GET['h'] or $height = $MAX_IMAGE_SIZE;
}else{
	// can't size it if you don't give me a size.
	@list($width, $height) = getimagesize($original_file_path);
	// neu khong co thi mac dinh la size cua hinh
	// fatal_error('No size information sent');
}

// get the aspect ratio directive
$keep_aspect = (isset($_GET['a'])&&$_GET['a']=='false')?$keep_aspect = false:$keep_aspect = true;

// if we're using the speed-opt version we can check the file name now.
if($OPTIMIZE_FOR_SPEED){
	// make up a name based on the get variables. 
	$new_file_name = $original_file_info['filename'].'_'.sprintf('%u.'.$ext, crc32(implode($_GET)));
	// if we already have the image in the cache and it was put there AFTER the target then return that. 
	if(file_exists($CACHE_FOLDER.$new_file_name)&&filemtime($CACHE_FOLDER.$new_file_name)>filemtime($original_file_path)&&($cached_file = @fopen($CACHE_FOLDER.$new_file_name,'rb'))){
		// write out the content of the cached file and exit.
		header('Content-type: ' . $mime_type);
		while(!feof($cached_file))
			print(($buffer = fread($cached_file,$SEND_BUFFER_SIZE)));
		fclose($cached_file);
		exit;		   
	}
	
}

// get the information from the original file
@$original_size = getimagesize($original_file_path) or fatal_error('That file does not exist or is not an image file.');


// if we are keeping the aspect ratio intact we need to adjust
if($keep_aspect){
	// generate the scaling factors
	$wscale=$width/$original_size[0];
	$hscale=$height/$original_size[1];
	
	// scale the outlier.
	if($wscale>$hscale){
		$width = round($hscale*$original_size[0]);
	}else{
		$height = round($wscale*$original_size[1]);
	}
}

// if we're optimized for cache size then we should do that instead
if(!$OPTIMIZE_FOR_SPEED){
	// generate new file name (must be hashed to block dirty GET variables things)
	$new_file_name = sprintf('%u.'.$ext, crc32($base_name.$width.$height.$ext));
	// if we already have the image in the cache and it was put there AFTER the target then return that. 
	if(file_exists($CACHE_FOLDER.$new_file_name)&&filemtime($CACHE_FOLDER.$new_file_name)>filemtime($original_file_path)&&($cached_file = @fopen($CACHE_FOLDER.$new_file_name,'rb'))){
		// write out the content of the cached file and exit.

		header('Content-type: ' . $mime_type);
		
		while(!feof($cached_file))
			print(($buffer = fread($cached_file,$SEND_BUFFER_SIZE)));
		fclose($cached_file);
		exit;		   
	}
}

// ok, so at this point we know we need to make up a file and then cache it.
// make a new image to paint into
$new_image = imagecreatetruecolor($width, $height);

// paint the image from the original image
if($ext=='jpg' || $ext=='jpeg'){$source = imagecreatefromjpeg($original_file_path);}
elseif($ext=='png'){
	$source = imagecreatefrompng($original_file_path); 
	// pull the transparent index from the source
	$trans_index = imagecolortransparent($source);
	// if the file has a transparent index already set then we use that.
	if ($trans_index >= 0) {
        // Get the source's transparent RGB value
        $trans_color = imagecolorsforindex($source, $trans_index);
        // Make the new image have the same transparent RGB value
        $trans_index = imagecolorallocate($new_image, $trans_color['red'], $trans_color['green'], $trans_color['blue']);
        // Fill the background of new image with the transparent color.
        imagefill($new_image, 0, 0, $trans_index);
        // Set the background color to transparent
        imagecolortransparent($new_image, $trans_index);
      }
	 // If they are using a true alpha channel let's use that
      else{
        // Turn off transparency blending so we can set imagesavealpha (see php docs)
        imagealphablending($new_image, false);
        // Create a new transparent color for image
        $trans_color = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
        // Completely fill the background of the new image with allocated color.
        imagefill($new_image, 0, 0, $trans_color);
        // Save full alpha channel
        imagesavealpha($new_image, true);
		// Restore transparency blending
		imagealphablending($new_image, true);
      }
}
elseif($ext=='gif'){
	$source = imagecreatefromgif($original_file_path);
	// pull the transparent index from the source
	$trans_index = imagecolortransparent($source);
	if ($trans_index >= 0) {
		$trans_color = imagecolorsforindex($source, $trans_index);
	}else{
		$trans_color = array('red' => 255, 'green' => 255, 'blue' => 255);
	}
	$trans_index    = imagecolorallocate($new_image, $trans_color['red'], $trans_color['green'], $trans_color['blue']);
	imagefill($new_image, 0, 0, $trans_index);
	imagecolortransparent($new_image, $trans_index); 
}

// resize the image using sampling
imagecopyresampled($new_image, $source, 0, 0, 0, 0, $width, $height, $original_size[0], $original_size[1]);


// Save to cache and then output
// write out a jpeg if we have a jpeg
if($ext=='jpg' || $ext=='jpeg'){
	header("Content-type: image/jpeg");
	imagejpeg($new_image,$CACHE_FOLDER.$new_file_name);
	imagejpeg($new_image);
// write out a png if we have a png
}elseif($ext=='png'){
	header("Content-type: image/png");
	imagepng($new_image,$CACHE_FOLDER.$new_file_name);
	imagepng($new_image);
// write out a gif if we have a gif ::shudder::
}elseif($ext=='gif'){
	header("Content-type: image/gif");
	imagegif($new_image,$CACHE_FOLDER.$new_file_name);
	imagegif($new_image);
}
// clean house
ImageDestroy($new_image);
ImageDestroy($source);
// th-th-th-thaaats alllll folks!
exit;

/***************************** END: SCRIPT CODE ******************************/



/************************* START: HELPER FUNCTIONS ***************************/
function fatal_error($message)
{
    // try to send an image
    if(function_exists('ImageCreate'))
    {
        $width = ImageFontWidth(5) * strlen($message) + 10;
        $height = ImageFontHeight(5) + 10;
        if($image = ImageCreate($width,$height))
        {
            $background = ImageColorAllocate($image,255,255,255);
            $text_color = ImageColorAllocate($image,0,0,0);
            ImageString($image,5,5,5,$message,$text_color);    
            header('Content-type: image/png');
            Imagejpeg($image);
            ImageDestroy($image);
            exit;
        }
    }

    // if we can't send an image then send 500 code
    header("HTTP/1.0 500 Internal Server Error");
    print($message);
    exit;
}
/************************** END: HELPER FUNCTIONS ****************************/

?>