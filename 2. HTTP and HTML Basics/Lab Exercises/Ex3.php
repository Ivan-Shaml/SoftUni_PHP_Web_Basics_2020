
<?php
if (isset($_GET['num1'], $_GET['num2'])) {
    $n1 = intval($_GET['num1']);
    $n2 = intval($_GET['num2']);
    $sum = $n1 + $n2;
    $sum = "$n1 + $n2 = $sum";
}
?>

<form>
    <?php if (isset($sum)): ?>
    <div><?=$sum?></div>
    <?php endif; ?>
    <div>First Number:</div>
    <input type="number" name="num1" />
    <div>Second Number:</div>
    <input type="number" name="num2" />
    <div><input type="submit" /></div>
</form>
