<?php 
declare(strict_types=1);

    function factorial(int $num) : int{
        $factorial = 1;
        for ($i=1; $i <= $num; $i++) { 
            $factorial = $factorial * $i;
        }
        return $factorial;
    }

    function suma(array $nums) : float
    {
        $result = 0;
        for ($i=0; $i < count($nums); $i++) { 
            $result += $nums[$i];
        }
        return $result;
    }

    function primer(int $num) : bool
    {
        if ($num == 2 || $num == 3 || $num == 5 || $num == 7) {
            return true;
        } else {
            // comprobamos si es impar
            if ($num % 2 != 0) {
                // comprobamos solo por los impares
                for ($i = 3; $i <= sqrt($num); $i += 2) {
                    if ($num % $i == 0) {
                        return false;
                    }
                }
                return true;
            }
        }
        return false;
    }
    function performOperation(string $string, array $nums)
    {
        switch ($string) {
            case 'factorial':
                return factorial($nums[0]);
                break;
            case 'sum':
                return suma($nums);
                break;
            case 'primer':
                return primer($nums[0]);
                break;
            default:
                return "Error choose";
                break;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /*Factorial*/
    $num = 5;
    echo "Factorial de $num: ". factorial($num) . "<br>";
    /*Suma*/
    echo "Suma = ". suma([1,5,6,2.5]) . "<br>";
    /*Primer*/
    $num = 5;
    if (primer($num) == true) {
        echo "El numero $num, es primer.<br>";
    } else{
        echo "El numero $num, no es primer.<br>";
    }
    /*PerformOperation*/
    $choose = "sum";
    $num = [5,2,5,6];
    if ($choose == "primer") {
        if (performOperation($choose,$num) == true) {
            echo "El numero ".$num[0].", es primer.<br>";
        } else{
            echo "El numero ".$num[0].", no es primer.<br>";
        }
    } else{
        echo performOperation($choose,$num);
    }
    ?>
</body>
</html>