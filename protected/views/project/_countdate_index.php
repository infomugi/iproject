<?php 
$date1 = "$data->start_date";
$date2 = "$data->deadline";
$diff = abs(strtotime($date2) - strtotime($date1));
$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
if($years<1)
{
	printf("%d month, %d days\n", $months, $days);
}elseif ($months<1) {
	printf("%d years, %d days\n", $years, $days);
}elseif ($days<1) {
	printf("%d years, %d month\n", $years, $months);
}else{
	printf("%d years, %d month, %d days\n", $years, $months, $days);
}
?>