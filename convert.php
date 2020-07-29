<?php
    
function hextobin($hexadecimal_number){

    $hexadecimal_to_convert_to_binary_testable = strtolower($hexadecimal_number);
    $length_of_text_to_convert_to_binary = strlen($hexadecimal_number);
    $results_of_hexadecimal_to_binary_conversion = "";
    for($i = 0; $i < $length_of_text_to_convert_to_binary; $i++)
    {
        $current_char_of_hexadecimal_for_conversion = $hexadecimal_to_convert_to_binary_testable[$i];
       
        switch($current_char_of_hexadecimal_for_conversion)
        {
            case '0':
                $results_of_hexadecimal_to_binary_conversion .= "0000";
                break;
               
            case '1':
                $results_of_hexadecimal_to_binary_conversion .= "0001";
                break;
               
            case '2':
                $results_of_hexadecimal_to_binary_conversion .= "0010";
                break;
               
            case '3':
                $results_of_hexadecimal_to_binary_conversion .= "0011";
                break;
               
            case '4':
                $results_of_hexadecimal_to_binary_conversion .= "0100";
                break;
               
            case '5':
                $results_of_hexadecimal_to_binary_conversion .= "0101";
                break;
               
            case '6':
                $results_of_hexadecimal_to_binary_conversion .= "0110";
                break;
               
            case '7':
                $results_of_hexadecimal_to_binary_conversion .= "0111";
                break;
               
            case '8':
                $results_of_hexadecimal_to_binary_conversion .= "1000";
                break;
               
            case '9':
                $results_of_hexadecimal_to_binary_conversion .= "1001";
                break;
               
            case 'a':
                $results_of_hexadecimal_to_binary_conversion .= "1010";
                break;
               
            case 'b':
                $results_of_hexadecimal_to_binary_conversion .= "1011";
                break;
               
            case 'c':
                $results_of_hexadecimal_to_binary_conversion .= "1100";
                break;
               
            case 'd':
                $results_of_hexadecimal_to_binary_conversion .= "1101";
                break;
               
            case 'e':
                $results_of_hexadecimal_to_binary_conversion .= "1110";
                break;
               
            case 'f':
                $results_of_hexadecimal_to_binary_conversion .= "1111";
                break;
        }
    }

   return $results_of_hexadecimal_to_binary_conversion;
}
 
 

 ?>