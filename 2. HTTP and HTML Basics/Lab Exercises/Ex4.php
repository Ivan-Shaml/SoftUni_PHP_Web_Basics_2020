<?php
$sortedLines = "";
if (isset($_GET['lines'])){
    $sortedLines = array_map('trim',
        explode("\n",
            $_GET['lines']));
    $sortedLines = array_filter($sortedLines);
    sort($sortedLines, SORT_STRING);
    $sortedLines = implode("\n", $sortedLines);
}
?>

<form method="get">
        <textarea rows="10" name="lines"><?=$sortedLines?></textarea> <br/>
    <input type="submit" value="Sort">
</form>