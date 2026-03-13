<?php

function divide($a, $b) {
    if ($b == 0) {
        throw new Exception("Error: Division by zero is not allowed.");
    }
    return $a / $b;
}

try {
    $result = divide(10, 0);
    echo "Result: " . $result;
}

catch (Exception $e) {
    echo $e->getMessage();
}

finally {
    echo "<br>Program finished.";
}

?>

