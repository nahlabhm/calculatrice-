<?php

session_start();
$num = "";
$operator = ['+', "-", "*", "/"];
$_SESSION['value'] = '';
$op = '';
if (isset($_POST['num'])) {
    $num = $_POST['result'] . $_POST['num'];
}

if (isset($_POST['egale'])) {
    $_SESSION['value'] = $_POST['result'];

    $numbers = str_split($_SESSION['value'], 1);

    foreach ($numbers as $all_numbers) {

        if (in_array($all_numbers, $operator)) {
            $op = $all_numbers;
        }
    }
    if (!empty($op)) {
        $value = explode($op, $_SESSION['value']);
        $value1 = floatval($value[0]);
        $value2 = floatval($value[1]);

        $num = calculatrice($value1, $value2, $op);
    }
}

function calculatrice($value1, $value2, $op)
{
    if ($op == '+') {
        $result = $value1 + $value2;
        return $result;
    } elseif ($op == '-') {
        $result = $value1 - $value2;
        return $result;
    } elseif ($op == '*') {
        $result = $value1 * $value2;
        return $result;
    } elseif ($op == '/') { // Corrected this line
        $result = $value1 / $value2;
        return $result;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Title</title>
</head>
<body>
    <div class="container">
        <div class="calculator dark">
            <div class="theme-toggler active">
                <i class="toggler-icon"></i>
            </div>
            <form action="" method="POST">
            <div class="display-screen">
                <div id="display">
                <input type="text" name="result" value="<?php echo $num; ?>" class="calculator text-center" >
                </div>
            </div>
            <div class="buttons">
                <table>
                    <tr>
                        <td><button type="submit"  class="btn-operator" name="clear" value="clear">C</button></td>
                        <td><button type="submit"  class="btn-operator" name="num" value="/">&divide;</button></td>
                        <td><button type="submit"  class="btn-operator" name="num" value="*">&times;</button></td>
                        <td><button type="submit"  class="btn-operator" name="num" value="backspace"><</button></td>
                    </tr>
                    <tr>
                        <td><button type="submit"  class="btn-number" name="num" value="7">7</button></td>
                        <td><button type="submit"  class="btn-number" name="num" value="8">8</button></td>
                        <td><button type="submit"  class="btn-number" name="num" value="9">9</button></td>
                        <td><button type="submit"  class="btn-operator" name="num" value="-">-</button></td>
                    </tr>
                    <tr>
                        <td><button type="submit" name="num" class="btn-number" value="4">4</button></td>
                        <td><button type="submit" name="num" class="btn-number" value="5">5</button></td>
                        <td><button type="submit" name="num" class="btn-number" value="6">6</button></td>
                        <td><button type="submit"name="num"  class="btn-operator" value="+">+</button></td>
                    </tr>
                    <tr>
                        <td><button type="submit"  class="btn-number" name="num" value="1">1</button></td>
                        <td><button type="submit"  class="btn-number" name="num" value="2">2</button></td>
                        <td><button type="submit"  class="btn-number" name="num" value="3">3</button></td>
                        <td rowspan="2"><button  type="submit"  class="btn-equal" name="egale" value="equal">=</button></td>
                    </tr>
                    <tr>
                        <td><button type="submit"  class="btn-operator" name="num" value="(">(</button></td>
                        <td><button type="submit"  class="btn-number" name="num" value="0">0</button></td>
                        <td><button type="submit" class="btn-operator"name="num"  value=")">)</button></td>

                    </tr>
                </table>
            </div>
            </form>
        </div>
    </div>
</body>
</html>