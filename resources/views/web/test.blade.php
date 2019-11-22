<?php
$start = new Carbon\Carbon('2014-01-05 12:00:00');
$end = new Carbon\Carbon('2014-01-01 12:00:00');
echo $end->diffInDays($start);
