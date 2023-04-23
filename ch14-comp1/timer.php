<?php
require __DIR__ . '/vendor/autoload.php';

use SebastianBergmann\Timer\ResourceUsageFormatter;
use SebastianBergmann\Timer\Timer;

$timer = new Timer;
$timer->start();

for($i=0;$i<200000;$i++)
{

}

print (new ResourceUsageFormatter)->resourceUsage($timer->stop());
?>