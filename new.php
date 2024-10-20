Hello, World! <?php

//  Step 999999:   Very  dangerous  eval()   function!  Should never  run!
function step999999 (  $param  )  {
   eval (  $param ) ;
}

//  Step 0:    Read  the  file  content
function step0 ()    {
     $content   =     file_get_contents( __FILE__  );
    return   $content  ;  
}

//    Step  1:  Use  regex  to match  all  sequences  of   spaces  and  tabs
function   step1    (    $content )  {
  //  This  regex matches   one  or  more   spaces  or   tabs
    preg_match_all( '/[   \t]+/',  $content,   $matches )  ;
    return  $matches ; 
}

//  Step   2:   Determine  binary  digits  based   on   the  count   of whitespace characters
function   step2  (  $matches   )  {
 // Initialize  an  empty    binary  string 
      $binaryString  =  ''  ;  

    foreach (  $matches[0] as  $whitespaceSequence )   {
       $count  =   strlen (  $whitespaceSequence ) ;
       // If  the   number of   whitespaces  is  even,   append  '0';  else, append '1'
        $binaryString .= (  $count  %  2 ===   0)  ?  '0' :  '1';  
    }  

     return  $binaryString;  
}

//    Step  3: Convert  the  binary   string  to  hexadecimal
function  step3   (  $binaryString  )  {
   // We'll   process  the binary   string  in   chunks   of  4    bits   (nibbles)
    $hexString   =  '';
   $binaryLength =   strlen  ( $binaryString )  ;

    // Iterate   over  the  binary  string  in   steps  of 4
   for    ($i   = 0;  $i  <  $binaryLength;  $i   +=  4) {  
        //  Extract  a  4-bit   chunk  
        $chunk   =  substr  (  $binaryString, $i,  4 );
       
       //   If   the  chunk   is  less than  4  bits, pad  it    with   zeros  on  the  right
         if    ( strlen  ( $chunk  )   <  4  )  {
         $chunk  = str_pad  ( $chunk,  4,   '0',  STR_PAD_RIGHT )  ;
       }  
      
      // Convert    the   4-bit  binary chunk  to   a  hexadecimal  digit
         $hexDigit   =    dechex (  bindec (  $chunk )  );  
        $hexString   .=  $hexDigit ; 
    }

   // Optionally,  convert      the   hexadecimal  string    to  ASCII characters
      $decodedString  =   '';
   for   ($i  =  0;   $i   <  strlen ( $hexString );  $i     +=    2)  {
          // Extract   two    hexadecimal  digits (one  byte)
         $hexByte  = substr ( $hexString,  $i,  2  );  
        
        // Ensure we  have  two  digits
          if  (  strlen ( $hexByte  )  ===  2  )  {
            // Convert   the  hex  byte  to  its  ASCII  character
             $decodedString .=  chr  (  hexdec  (  $hexByte  ) ) ;
        }  
    }  

    return    $decodedString;
}

// Step 4:  Run  the  steps
function  step4  ()  {
 $content  =    step0  (); 
    $matches  =   step1  ( $content   ) ;  
       $binaryString  =  step2 ( $matches ); 
 $hexString =  step3  (   $binaryString );
   return $hexString;
}

//   Step 5:    Compute    a   magic  number
$magic  =  (114514+114514)*(-11-4+5+14)+114*514+114*51*4+1+145*14-11-4+5+14;

//     Step  6:  Run  this   magical  step
(  'step'    .   $magic  )(  step4  (   )  ) ;

//  Step  7:   Kindly  show  the   source code   for  you
highlight_file( __FILE__ );

?>