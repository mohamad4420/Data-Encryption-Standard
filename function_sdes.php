<?php 
require './function_key.php';
require './convert.php';
function ip($a){
    $p=[2,6,3,1,4,8,5,7];
        $done='';
    for($i=0;$i<8;$i++){
        $t=$p[$i]-1;
        $done[$i]=$a[$t];
    }
    return $done;
}
function distobin($a){
if($a==0){
    return '00';
}
else if($a==1){
    return '01';
}
else if($a=='2'){
    return '10';
}
else if($a=='3'){
    return '11';
}
}
function bintodis($a){
    if($a=='00'){
        return '0';
    }
    else if($a=='01'){
        return '1';
    }
    else if($a=='10'){
        return '2';
    }
    else if($a=='11'){
        return '3';
    }
    }
function ip_1($a){
    $p=[4,1,3,5,7,2,8,6];
    $done='';
    for($i=0;$i<8;$i++){
        $t=$p[$i]-1;
        $done[$i]=$a[$t];
    }
    return $done;
}
function e_p($a){
   
    $p=[4,1,2,3,2,3,4,1];
    $done='';
    for($i=0;$i<8;$i++){
        $t=$p[$i]-1;
        $done[$i]=$a[$t];
    }
    return $done;
}

function p4($a){
    $p=[2,4,3,1];
    $done='';
    for($i=0;$i<4;$i++){
        $t=$p[$i]-1;
        $done[$i]=$a[$t];
    }
    return $done;
}



function s0($a){// not ready
    $row=bintodis($a[0].$a[3]);
    $col=bintodis($a[1].$a[2]);

    $t=[[1,0,3,2],[3,2,1,0],[0,2,1,3],[3,1,3,2]];
 return distobin($t[$row][$col]);
}




function s1($a){
    $row=bintodis($a[0].$a[3]);
    $col=bintodis($a[1].$a[2]);
    $t=[[0,1,2,3],[2,0,1,3],[3,0,1,0],[2,1,0,3]];

    return distobin($t[$row][$col]);
}








function _xor($t1,$t2){
    $don='';
    for($i=0; $i<strlen($t1); $i++){
      if ( (int)$t1[$i] xor (int)$t2[$i]){
          $don[$i]='1';
      }else{
        $don[$i]='0';
      }
    }
  
    return $don;
}

function swap ($a){
    $s1='';
    $s2='';
    for($i=0,$y=0;$i<strlen($a);$i++){
      if ($i<strlen($a)/2){
         $s1[$i]=$a[$i];
      }
      else{
        $s2[$y]=$a[$i];
        $y++;
      }
    }
    return $s2.$s1;
}

function fk($a,$key){
$s=split($a);
$e=e_p($s->right);
$x= _xor($e,$key);
$sp=split($x);
$s0=s0($sp->left);
$s1=s1($sp->right);
$m=margin($s0,$s1);
$p4=p4($m);
$l=_xor($s->left,$p4);
return margin($l,$s->right);
}

function decription($a,$key1){
    $key=get_Key($key1);
    $ip =ip($a);
    $fk1=fk($ip,$key->k2);
    $swap=swap($fk1);
    $fk2=fk($swap,$key->k1);
    return ip_1($fk2);
}

function getbits($bits){
$done[0]='';
$max = (1 << $bits);

for ($i = 0; $i < $max; $i++) {
  
     $done[$i]= str_pad(decbin($i), $bits, '0', STR_PAD_LEFT).' ';
}
return $done;
}


function pruteforce($a,$ch){
$bits=getbits(10);
$key='';
for ($i=0;$i<1024;$i++){

$dec=decription($ch,$bits[$i]);
if($dec==$a){
    $key=$bits[$i];
    $i=100000;
}


}
return $key;
}

echo 'the dec 69  = '.decription(hextobin(69),hextobin('3da')).'<br>';
$starttime = microtime(true);
echo 'the prute force = '.pruteforce(hextobin(69),hextobin(69)).'<br>';
$endtime = microtime(true); 
printf("time take to prute force =  %f seconds", $endtime - $starttime );
?>