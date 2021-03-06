<?php

/**The width of generated image*/
define('CAPTCHA_WIDTH', 200);

/**The height of generated image*/
define('CAPTCHA_HEIGHT', 40);


/**The length of generated string*/
define('CAPTCHA_LENGTH', 7);



session_start();

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header('Content-type: image/svg+xml');




$rText = generateRandom(CAPTCHA_LENGTH);
$_SESSION['captcha'] = $rText;


/**Generates a random text*/
function generateRandom($length = 6, $vals = 'abchefghjkmnpqrstuvwxyz0123456789') {
    $s = "";

    while(strlen($s) < $length) {
        mt_getrandmax();
        $num = rand() % strlen($vals);
        $s .= substr($vals, $num+4, 1);
    }
    return $s;
}


/**Returns a random color*/
function randomColor(){
    $red = rand(0, 255);
    $green = rand(0, 255);
    $blue = rand(0, 255);
    
    return sprintf("#%x%x%x", $red, $green, $blue);
}


/**Converts a string to SVG*/
function stringToSVG($str){
    $result = '';
        
    $glyphs = array();
    
    $x = 5; //start point --> x
    $y = 30; //start point --> y
    
    //generates glyphs
    for($i=0; $i<strlen($str); $i++){        
        $rotation = rand(-20, 20); //rotation degree
        $size = rand (20, 25); //size in pixels
        $jump = rand(-5, 5); //shift up or down by a number of pixels
        $color = randomColor();
        $glyph = sprintf('<text style="fill: %s;" x="%d" y="%d" font-size="%d" transform="translate(%d, %d) rotate(%d) translate(-%d, -%d)">%s</text>%s',
                $color, $x, $y + $jump, $size, $x, $y + $jump, $rotation, $x, $y + $jump, $str[$i], "\n"
                );
        $glyphs[] = $glyph;
        
        $x += 20; //move carret
    }
    
    $indexes = range(0, count($glyphs) - 1);
    shuffle($indexes); //now shuffle them 
    
    foreach($indexes as $index){
        $result .= $glyphs[$index];
    }
    
    return $result;
}

function image($text){
    //xml declaration
    print '<?xml version="1.0" encoding="utf-8"?>';
    
    //headers
    printf('<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 20010904//EN"
        "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"
             width="200" height="40"
    >', CAPTCHA_WIDTH, CAPTCHA_HEIGHT);
    
    //background
    printf(' <rect x="0" y="0" width="%d" height="%d" 
        style="stroke: none; fill: none;" >
        </rect> ', CAPTCHA_WIDTH, CAPTCHA_HEIGHT) ;
    
    //the text
    print stringToSVG($text);
    
    //end SVG
    print '</svg>';
}

image($rText);
?>
