<?php
if(isset($_POST['num'])) {
    $num = isset($_POST['input']) ? $_POST['input'].$_POST['num'] : $_POST['num'];
} elseif(isset($_POST['c'])) {
    $num = "";
} else {
    $num = isset($_POST['input']) ? $_POST['input'] : "";
}

if(isset($_POST['op'])) {
    setcookie('num', $num, time() + (86400 * 30), '/');
    setcookie('op', $_POST['op'], time() + (86400 * 30), '/');
    $input_value = $num;
    $num = "";
}

if(isset($_POST['equal'])) {
    $num = floatval($_POST['input']);
    switch($_COOKIE['op']) {
        case '+':
            $result = floatval($_COOKIE['num']) + $num;
            break;
        case '-':
            $result = floatval($_COOKIE['num']) - $num;
            break;
        case '*':
            $result = floatval($_COOKIE['num']) * $num;
            break;
        case '/':
            $result = floatval($_COOKIE['num']) / $num;
            break;
        default:
            $result = $num;
            break;
    }
    
    $num = $result;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cal.css">
    <title>Calculator</title>
</head>
<body>
    <div class="cal">
        <form action="" method="post">
            <input type="text" class="maininput" id="maininput" name="input" style="text-align: right;"  value="<?php echo @$num?>">
            <input type="submit" class="numbtn" name="num" value="9" >
            <input type="submit" class="numbtn" name="num" value="8">
            <input type="submit" class="numbtn" name="num" value="7">
            <input type="submit" class="calbtn" name="op" value="+" >
            <input type="submit" class="numbtn" name="num" value="6">
            <input type="submit" class="numbtn" name="num" value="5">
            <input type="submit" class="numbtn" name="num" value="4">
            <input type="submit" class="calbtn" name="op" value="-" >
            <input type="submit" class="numbtn" name="num" value="3">
            <input type="submit" class="numbtn" name="num" value="2">
            <input type="submit" class="numbtn" name="num" value="1">
            <input type="submit" class="calbtn" name="op" value="*" >
            <input type="submit" class="c" value="C" onclick="clearInput()">
            <input type="submit" class="numbtn" name="num" value="0">
            <input type="submit" class="numbtn" name="equal" value="=">
            <input type="submit" class="calbtn" name="op" value="/" >
            
        
            

        </form>
    </div>
    <script src="clear.js"></script>
</body>
</html>