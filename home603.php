<?php
session_start();
require_once __DIR__ . '/User.php';
require_once __DIR__ . '/Session.php';
require_once __DIR__ . '/Calculator.php';

$user = new User('admin','111');
$session = new Session();
$session->set('login', 'admin');
$session->set('pass', '111');

if (isset($_SESSION['login']) && isset($_SESSION['pass'])) {
    $login = $session->get('login');
    $pass = $session->get('pass');

    if ($user->check($login, $pass) === true) {
        if (isset ($_POST['Logout'])) {
            $session->destroy();
            header('Location: /Task603/index603.php');
            exit();
        }
        $a = isset($_GET['a']) ? ($_GET['a']) : '';
        $b = isset($_GET['b']) ? ($_GET['b']) : '';
        $operation = isset($_GET['operation']) ? ($_GET['operation']) : '';

        $calculator = new Calculator();

        if (isset($_GET['a']) && isset($_GET['b']) && isset($_GET['operation'])) {
            if ($b == 0 && $operation == '/') {
                $message = 'Ошибка!Деление на 0!';
            } else {
                switch ($operation) {
                    case'+':
                        $message = $a . " + " . $b . " = " . $calculator->addition($a, $b);
                        break;
                    case'-':
                        $message = $a . " - " . $b . " = " . $calculator->subtraction($a, $b);
                        break;
                    case'*':
                        $message = $a . " * " . $b . " = " . $calculator->multiplication($a, $b);
                        break;
                    case'/':
                        $message = $a . " / " . $b . " = " . $calculator->division($a, $b);
                        break;
                }
            }
        }
    } else {
        header('Location:  /Task603/index603.php');
        exit();
    }
} else {
    header('Location: /Task603/index603.php');
    exit();
}

?>
<html>
<body>
    <p><b>Вы можете воспользоваться WEB-калькулятором!</b></p>

<form action="home603.php" method="get">
    <table>
        <tr>
            <td>Введите первое число:</td>
            <td><input type="text" name="a" value="<?= $a ?>"></td>
        </tr>
        <?php $checked = "checked=\"checked\""; ?>
        <tr>
            <td>Выберите знак оператора:</td>
            <td>
                <label>
                    •<input type="radio" <?php if ($_GET['operation'] == "+") {
                        echo $checked;
                    }; ?> value="+" name="operation"> +
                </label><br/>
                <label>
                    •<input type="radio"<?php if ($_GET['operation'] == "-") {
                        echo $checked;
                    }; ?> value="-" name="operation"> -
                </label><br/>
                <label>
                    •<input type="radio"<?php if ($_GET['operation'] == "*") {
                        echo $checked;
                    }; ?> value="*" name="operation"> *
                </label><br/>
                <label>
                    •<input type="radio" <?php if ($_GET['operation'] == "/") {
                        echo $checked;
                    }; ?>value="/" name="operation"> /
                </label>
            </td>
        </tr>
        <br/>
        <tr>
            <td>Введите второе число:</td>
            <td><input type="text" name="b" value="<?= $b ?>"></td>
        </tr>
        <tr>
            <td>Для вывода результата нажмите эту кнопку</td>
            <td><input type="submit" value="  =  "></td>
        </tr>
    </table>
    <?= $message;?>
</form>
    <form method="post" action="home603.php">
        <p><i><b> Для перехода на главную страницу нажмите эту кнопку <input type="submit" name="Logout" value="Перейти на главную">
                </b> </i></p>
    </form>
</body>
</html>

