<?php

function p8 ($a){// p8 permutation 
    $P8=[6,3,7,4,8,5,10,9];
    $p='';
for($i=0;$i<8;$i++){
   $y=$P8[$i]-1;
 $p[$i]=$a[$y];

 }

return $p;
}

function p10 ($a){ // p10 permutation 
    $P10=[3,5,2,7,4,10,1,9,8,6];
    $p='';
for($i=0;$i<10;$i++){
   $y=$P10[$i]-1;
 $p[$i]=$a[$y];

 }

return $p;
}


function shift_L($a,$no){
  $re='';
for ($i=0;$i<$no;$i++){
  $re[$i]=$a[$i];
}

for($i=0; $i<strlen($a)-$no;$i++){
$a[$i]=$a[$i+$no];

}
$t=strlen($a);
for($i=0,$y=$no;$i<$no;$i++,$y--){

  $a[$t-$y]=$re[$i];
  
  }

return implode("",(array)$a);
}

function split($a){
  $s=strlen($a);
  $left='';
  $right='';
  for($i=0,$y=0;$i<$s;$i++){
if($i<$s/2){
  $left[$i]=$a[$i];
}else{
  $right[$y]=$a[$i];
  $y++;
}

  }

   
  $data = array("left"=>$left,"right"=>$right);
 
 $m= json_encode($data);
return json_decode($m);
}

function margin($left,$right){
  return $left.$right;
}



function get_Key($a){
  $p=p10($a);// p10 permutation
$s1=split($p); // split p10 permutation
$sh1=shift_L($s1->left,1); // shift 1 to the right
$sh11=shift_L($s1->right,1);// shift 1 to the right
$m1=margin($sh1,$sh11); // margin shifting
$k1=p8($m1);// p8 permutation get k1

$sh2=shift_L($sh1,2);// shift 2 to the right
$sh22=shift_L($sh11,2);// shift 2 to the right
$m2=margin($sh2,$sh22);// margin to get key 2
$k2=p8($m2); //get the key 2

$data = array("k1"=>$k1,"k2"=>$k2);
 
 $m= json_encode($data);
return json_decode($m);


}
$p='1010000010';
$u=get_Key($p);

?>