<?php
include'class/config.php';
include'class/class.setting.php';

$setting = new Setting;
/*
$a = array('<foo>',"'bar'",'"baz"','&blong&', "\xc3\xa9");

echo "Normal: ",  json_encode($a), "\n";
echo "Tags: ",    json_encode($a, JSON_HEX_TAG), "\n";
echo "Apos: ",    json_encode($a, JSON_HEX_APOS), "\n";
echo "Quot: ",    json_encode($a, JSON_HEX_QUOT), "\n";
echo "Amp: ",     json_encode($a, JSON_HEX_AMP), "\n";
echo "Unicode: ", json_encode($a, JSON_UNESCAPED_UNICODE), "\n";
echo "All: ",     json_encode($a, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE), "\n\n";

$b = array();

echo "Empty array output as array: ", json_encode($b), "\n";
echo "Empty array output as object: ", json_encode($b, JSON_FORCE_OBJECT), "\n\n";

$c = array(array(1,2,3));

echo "Non-associative array output as array: ", json_encode($c), "\n";
echo "Non-associative array output as object: ", json_encode($c, JSON_FORCE_OBJECT), "\n\n";

$d = array('foo' => 'bar', 'baz' => 'long');

echo "Associative array always output as object: ", json_encode($d), "\n";
echo "Associative array always output as object: ", json_encode($d, JSON_FORCE_OBJECT), "\n\n";

Normal: ["<foo>","'bar'","\"baz\"","&blong&","\u00e9"]
Tags: ["\u003Cfoo\u003E","'bar'","\"baz\"","&blong&","\u00e9"]
Apos: ["<foo>","\u0027bar\u0027","\"baz\"","&blong&","\u00e9"]
Quot: ["<foo>","'bar'","\u0022baz\u0022","&blong&","\u00e9"]
Amp: ["<foo>","'bar'","\"baz\"","\u0026blong\u0026","\u00e9"]
Unicode: ["<foo>","'bar'","\"baz\"","&blong&","é"]
All: ["\u003Cfoo\u003E","\u0027bar\u0027","\u0022baz\u0022","\u0026blong\u0026","é"]

Empty array output as array: []
Empty array output as object: {}

Non-associative array output as array: [[1,2,3]]
Non-associative array output as object: {"0":{"0":1,"1":2,"2":3}}

Associative array always output as object: {"foo":"bar","baz":"long"}
Associative array always output as object: {"foo":"bar","baz":"long"}

*/
header("Content-type: text/json");
/*

function array_to_json( $array ){

    if( !is_array( $array ) ){
        return false;
    }

    $associative = count( array_diff( array_keys($array), array_keys( array_keys( $array )) ));
    if( $associative ){

        $construct = array();
        foreach( $array as $key => $value ){

            // We first copy each key/value pair into a staging array,
            // formatting each key and value properly as we go.

            // Format the key:
            if( is_numeric($key) ){
                $key = "key_$key";
            }
            $key = "'".addslashes($key)."'";

            // Format the value:
            if( is_array( $value )){
                $value = array_to_json( $value );
            } else if( !is_numeric( $value ) || is_string( $value ) ){
                $value = "'".addslashes($value)."'";
            }

            // Add to staging array:
            $construct[] = "$key: $value";
        }

        // Then we collapse the staging array into the JSON form:
        $result = "{ " . implode( ", ", $construct ) . " }";

    } else { // If the array is a vector (not associative):

        $construct = array();
        foreach( $array as $value ){

            // Format the value:
            if( is_array( $value )){
                $value = array_to_json( $value );
            } else if( !is_numeric( $value ) || is_string( $value ) ){
                $value = "'".addslashes($value)."'";
            }

            // Add to staging array:
            $construct[] = $value;
        }

        // Then we collapse the staging array into the JSON form:
        $result = "[ " . implode( ", ", $construct ) . " ]";
    }

    return $result;
}
*/
$array = array(
    'Title'=>$setting->getSetting($dbHandle,1),
    'URL'=>$setting->getSetting($dbHandle,2),
    'Site Name'=>$setting->getSetting($dbHandle,5),
    'Keyword'=>$setting->getSetting($dbHandle,24),
    'Facebook Page'=>$setting->getSetting($dbHandle,12),
    'Secret Key'=>$setting->getSetting($dbHandle,23),
		
	//Check Status of Site on Request Key
    'check'=>$setting->getSetting($dbHandle,22),
    'Version'=>$setting->getSetting($dbHandle,26)
);



/*
Like the reference JSON encoder, json_encode() will generate JSON that is a simple value (that is, neither an object nor an array) if given a string, integer, float or boolean as an input value. While most decoders will accept these values as valid JSON, some may not, as the specification is ambiguous on this point.

To summarise, always test that your JSON decoder can handle the output you generate from json_encode().

For anyone who would like to encode arrays into JSON, but is using PHP 4, and doesn't want to wrangle PECL around, here is a function I wrote in PHP4 to convert nested arrays into JSON.
*/
echo stripslashes(json_encode($array)); 
/*
Note that, because javascript converts JSON data into either nested named objects OR vector arrays, it's quite difficult to represent mixed PHP arrays (arrays with both numerical and associative indexes) well in JSON. This function does something funky if you pass it a mixed array -- see the comments for details.

I don't make a claim that this function is by any means complete (for example, it doesn't handle objects) so if you have any improvements, go for it.

*/
?>