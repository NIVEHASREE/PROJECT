<?php
$result = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operator = $_POST["operator"];

    if (is_numeric($num1) && is_numeric($num2)) {

        switch ($operator) {
            case "+":
                $result = $num1 + $num2;
                break;

            case "-":
                $result = $num1 - $num2;
                break;

            case "*":
                $result = $num1 * $num2;
                break;

            case "/":
                if ($num2 == 0) {
                    $error = "Cannot divide by zero!";
                } else {
                    $result = $num1 / $num2;
                }
                break;

            default:
                $error = "Invalid operator selected!";
        }

    } else {
        $error = "Please enter valid numbers!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="calculator">
    <h2>Simple PHP Calculator</h2>

    <form method="post">
        <input type="text" name="num1" placeholder="Enter first number" required>

        <select name="operator">
            <option value="+">+</option>
            <option value="-">−</option>
            <option value="*">×</option>
            <option value="/">÷</option>
        </select>

        <input type="text" name="num2" placeholder="Enter second number" required>

        <button type="submit">Calculate</button>
    </form>

    <?php if ($result !== ""): ?>
        <div class="result">
            Result: <?php echo $result; ?>
        </div>
    <?php endif; ?>

    <?php if ($error !== ""): ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
