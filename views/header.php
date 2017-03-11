<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title><?= $this->getViewParam('TITLE'); ?></title> <!-- fix in the future name and description dynamics -->
        <meta name="keywords" content="<?= $this->getViewParam('KEYWORDS') ?>">
        <meta name="description" content="<?= $this->getViewParam('DESCRIPTION') ?>">

        <link rel="stylesheet" type="text/css" href="<?= join('/', array("public", "css", "default.css")) ?>">
        <script src="<?= join('/', array("/public", "js", "default.js")) ?>"></script>
        <?php if(isset($this->js))
                foreach ($this->js as $js)
                    echo("<script src=\"$js\"></script>");
        ?>
    </head>
    <body>
<?php include(VIEW_DIR . "menu.php"); ?>
        <main>