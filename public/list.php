<?php

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
    echo ' - ' . filesize('uploads/' . $file);
    $date = new DateTime();
    $date->setTimestamp(filemtime('uploads/'.$file));
    $date->setTimezone(new DateTimeZone('America/Los_Angeles'));
    echo ' - Uploaded ' . $date->format('F j, Y \a\t h:i a') . ' (Pacific)';
    echo '</li>';

}

echo '</ul>';
