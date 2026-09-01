<?php 

include('inc/head.php');

$folder = trim($_POST['folder'] ?? $_GET['folder'] ?? '', '/');
$selectedFile = $_POST['file'] ?? $_GET['file'] ?? '';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        file_put_contents(
            'files/' . $folder . '/' . $selectedFile,
            $_POST['content']
        );
    }

    function supprimer($path) {
        if(is_dir($path)) {
            foreach(scandir($path) as $file) {
                if($file !== '.' && $file !== '..') {
                    supprimer($path . '/' . $file);
                }
            }
            var_dump(scandir($path));
            var_dump(rmdir($path));
        } else {
            unlink($path);
        }
    }

   if(isset($_GET['delete'])) {
        $path = 'files/' . $_GET['delete'];
        supprimer($path);
   }
    if ($selectedFile !== '') {
        $content = file_get_contents('files/' . $folder . '/' . $selectedFile);

        echo '<form method="POST">';
        echo '<input type="hidden" name="folder" value="' . htmlspecialchars($folder) . '">';
        echo '<input type="hidden" name="file" value="' . htmlspecialchars($selectedFile) . '">';
        echo '<textarea name="content">' . htmlspecialchars($content) . '</textarea>';
        echo '<button type="submit">Enregistrer</button>';
        echo '</form>';
    }

$files = scandir('files/' . $folder);

foreach($files as $file) {
    if($file != '.' && $file !='..') {
        if(is_dir('files/' . $folder .'/' . $file)) {
            echo '<a href="?folder=' . $folder .'/' . $file . '">' . $file .'</a> ';
            echo '<a href="?delete=' . $folder . '/' . $file . '">Supprimer</a><br>';
        } else {
            echo '<a href="?folder=' . $folder . '&file=' . $file . '">' . $file . '</a> ';
            echo '<a href="?delete=' . $folder . '/' . $file . '">Supprimer</a><br>';
        }
    }  
}

include('inc/foot.php');
