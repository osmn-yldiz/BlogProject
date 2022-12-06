<?php
function inverse($x) {
    if (!$x) {
        throw new Exception('Sıfıra bölme.');
    }
    else return 1/$x;
}

try {
    echo inverse(5) . "\n";
    echo inverse(0) . "\n";
} catch (Exception $e) {
    echo 'Yakalanan olağandışılık: ',  $e->getMessage(), "<br>";
}

// Çalışma sürer
echo 'Merhaba Dünya';
?>