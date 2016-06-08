<?php

function convertSizeToHumanReadable($bytes) {
    if ($bytes == 0)
        return "0.00 B";

    $s = array('bytes', 'kilobytes', 'megabytes', 'gigabytes');
    $e = (int) floor(log($bytes, 1024));

    return round($bytes/pow(1024, $e), 2).' '.$s[$e];
}

$files = scandir('uploads');

echo '<ul>';

foreach ($files as $file) {

    if (in_array($file, ['.','..','.gitignore'])) {
        continue;
    }

    echo '<li>';
    echo '<a href="uploads/' . $file .'" target="_blank">';
    echo $file;
    echo '</a>';
    echo ' - ' . convertSizeToHumanReadable(filesize('uploads/' . $file));
    $date = new DateTime();
    $date->setTimestamp(filemtime('uploads/'.$file));
    $date->setTimezone(new DateTimeZone('America/Los_Angeles'));
    echo ' - Uploaded ' . $date->format('F j, Y \a\t h:i a') . ' (Pacific)';
    echo '</li>';

}

echo '</ul>';
