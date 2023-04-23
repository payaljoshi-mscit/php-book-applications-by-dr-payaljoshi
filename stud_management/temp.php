<?php   
$arr1 = array("a"=>1, "b"=>2);
$arr2 = array("C"=>3, "D"=>4);
$arr_result=array_merge($arr1,$arr2); 
print_r($arr1 + $arr2); // result is Array ( [a] => 1 [b] => 2 [C] => 3 [D] => 4 )
    $a='a"b > c';
?>
<br><br>
Value with htmlentities: <input type="text" value="<?php echo htmlentities($a);?>" /><br>
Value without htmlentities: <input type="text" value="<?php echo $a;?>" >