<?php
function getLargeDataSet() {
    // Generate an array of numbers from 0 to 9999
    return range(0, 9999);
}

function processData($data) {
    // Use a variable to hold the output and echo it once
    $output = '';
    foreach ($data as $value) {
        $output .= $value . "<br/>";
    }
    echo $output;
}

$data = getLargeDataSet();
processData($data);
?>