<?php
$w_day=date("w");
if($w_day=='1'){
$cflag = '+0';
}else{
$cflag = '-1';
}
$time = time() ;
$weekstar = strtotime(date('Y-m-d',strtotime("$cflag week Monday", $time)));
print_r(date("Y-m-d H-i-s",$weekstar) ) ;