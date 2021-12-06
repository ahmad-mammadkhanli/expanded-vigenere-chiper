<?php

function getIndex($needle, $haystack) 
{
    global $alphabetArr;

    foreach ($needle as $value) {
        array_push($haystack, (array_search($value, $alphabetArr)));
    }

    return $haystack;
}

function getResult($plainTextIndex, $keyIndex) 
{
    $resultArr = array();
    
    for ($i = 0; $i < count($plainTextIndex); $i++) {
        array_push($resultArr, ($plainTextIndex[$i] + $keyIndex[$i]));
    }

    return filterResult($resultArr);
}

function filterResult($resultArr)
{
    for ($i = 0; $i < count($resultArr); $i++) {
        $filteredArr = array_map(function($item)
        {
            global $alphabetArr;

            if ($item > count($alphabetArr))
                return $item - count($alphabetArr);
            elseif ($item == count($alphabetArr))
                return 0;
            else
                return $item;
        }, $resultArr);
    }

    return $filteredArr;
}

$_POST = array_map(function($post) {
    return htmlspecialchars(trim($post));
}, $_POST);

$alphabet               = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$alphabetArr            = str_split($alphabet);
$manipulatedAlphabet    = $alphabetArr;
$vigenereArr            = [];
$plainTextArr           = [];
$keyArr                 = [];

for ($i = 0; $i < count($manipulatedAlphabet); $i++) {
    if ($i != 0) {
        $firstElement = array_shift($manipulatedAlphabet);
        array_push($manipulatedAlphabet, $firstElement);
    }
    array_push($vigenereArr, $manipulatedAlphabet);    
}

if (isset($_POST["plainText"])) {
    $plainText  = $_POST["plainText"];
    $key        = $_POST["key"];  

    $plainTextLength    = strlen($plainText);
    $keyLength          = strlen($key);
    $ratio              = $keyLength > 0 && $plainText > 0 ? $plainTextLength / $keyLength : NULL;

    if (!empty($plainText) && !empty($key)) {
        if ($ratio > 1) {
            $keyLength  = ceil($ratio);
            $key        = substr(str_repeat($key, $keyLength), 0, $plainTextLength);
        } elseif ($ratio < 1 && $ratio > 0) {
            $key = substr($key, 0, $plainTextLength);
        }
    
        $splittedPlainText  = str_split(strtoupper($plainText));
        $splittedKey        = str_split(strtoupper($key));
    
        $plainTextIndex = getIndex($splittedPlainText, $plainTextArr);
        $keyIndex = getIndex($splittedKey, $keyArr);
    
        $hashedIndexArr = getResult($plainTextIndex, $keyIndex);
        $cipherArr = [];
    
        for ($i = 0; $i < count($hashedIndexArr); $i++) {
            array_push($cipherArr, $alphabetArr[$hashedIndexArr[$i]]);
        }
    }

    $chiperText = empty($plainText) || empty($key) ? "" : implode("", $cipherArr);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vigenere Cypher</title>
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>Cypher Form</legend>
            <input value="<?php echo $_POST["plainText"] ?? NULL ?>" name="plainText" type="text" placeholder="Plan Text"> <br><br>
            <input value="<?php echo $_POST["key"] ?? NULL ?>" name="key" type="text" placeholder="Key"> <br><br>
            <button>Ecrypte</button> <br><br>
            <input type="text" readonly value="<?php echo isset($chiperText) ? $chiperText : NULL ?>" placeholder="Cipher Text">
        </fieldset>
    </form>
    <hr>
    <h1>Alphabet</h1>
    <table border="1">
        <?php for ($i = 0; $i < count($vigenereArr); $i++): ?>
        <tr>
            <?php for ($j = 0; $j < count($vigenereArr); $j++): ?>
            <td><?php echo $vigenereArr[$i][$j] ?></td>
            <?php endfor; ?>
        </tr>
        <?php endfor; ?>
    </table>
</body>
</html>