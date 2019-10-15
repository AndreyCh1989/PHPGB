<?php
    include "../config/config.php";
    include "../engine/Autoload.php";

    use app\engine\{Autoload, Explorer};

    spl_autoload_register([new Autoload(), 'loadClass']);

    if (!$_GET['path']) {
        $path = 'C:\\';
    } else {
        $path = realpath($_GET['path']);
    }

?>

<b>Explorer</b>
<p style="margin-bottom: 20px">Current path: <?=$path?></p>
<?php foreach (Explorer::getFolders($path) as $f): ?>
    <p>
        <form method="get" action="/.">
            <input type="hidden" name="path" value="<?=$f->getPathname()?>">
            <input type="submit" class="linkButton" value="<?=$f->getFileName()?>" />
        </form>
    </p>
<?php endforeach;?>

<?php foreach (Explorer::getFiles($path) as $f): ?>
    <p><?=$f->getFileName()?></p>
<?php endforeach;?>


<style>
    b {
        font-size: 28px;
    }

    p, form, .linkButton {
        margin: 0;
    }

    p {
        padding-left: 6px;
    }

    .linkButton {
        background: none;
        border: none;
        color: #0066ff;
        text-decoration: underline;
        cursor: pointer;
    }
</style>
