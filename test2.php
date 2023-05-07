<?php
function shift_chars($str,$key) {
    $new_str = "";
    $length = strlen($str);
    for ($i = 0; $i < $length; $i++) {
        $char = $str[$i];
        $k=$key[$i]
            $new_char = chr(ord($char) + $k); // Shift character by two steps forward
            if (ctype_upper($char) && $new_char > 'Z') { // Handle wrap-around for uppercase letters
                $new_char = chr(ord($new_char) - 26);
            } elseif (ctype_lower($char) && $new_char > 'z') { // Handle wrap-around for lowercase letters
                $new_char = chr(ord($new_char) - 26);
            }
            $new_str .= $new_char;
       
    }
    return $new_str;
}

function encryption($message,$key){
   if(gettype($key)=="integer"){
      $enCkey=(String)$key;
      $messageLength=strlen($message);
     while(strlen($enCkey)<$messageLength){
        $enCkey=$enCkey."".$enCkey;
      }
      echo shift_chars("ABC","111");
   }
} 
 encryption("helo",1);
 /*
 booking engine, availability calendar, room types and pricing information, and secure payment gateway.
 customer page that book a room or table
 
 */
?>