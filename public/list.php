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
    echo ' - Uploaded on ' . date('F j, Y \a\t h:i a', filemtime('uploads/'.$file)) . ' (UTC)';
    echo '</a>';
    echo '</li>';

}

echo '</ul>';
