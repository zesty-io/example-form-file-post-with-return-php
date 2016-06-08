<?php

$files = scandir('uploads');

echo '<ul>';

foreach ($files as $file) {

    if (in_array($file, ['.','..','.gitignore'])) {
        continue;
    }

    echo '<li>';
    echo $file;
    echo '</li>';

}

echo '</ul>';
