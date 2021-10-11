<?php

$telnumber = '03581234567';

if (preg_match('/^((?:00|\+)92)?(0?3(?:[0-46]\d|55)\d{7})$/', $telnumber)) {
    echo "matches pattern";
} else {
    echo "doesn't match pattern";
}
