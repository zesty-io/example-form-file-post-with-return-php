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
    $date = (new DateTime(filemtime('uploads/'.$file)))
        ->setTimezone(new DateTimeZone('America/Los_Angeles'))
        ->format('F j, Y \a\t h:i a');
    echo ' - Uploaded ' . $date . ' (Pacific)';
    echo '</li>';

}

echo '</ul>';
