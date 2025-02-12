<?php
$seed = (int)shell_exec("../gameLogicC/build/seed");
echo $seed;

$index = 0;
while($index < (6 * 52)){
    //first hand
    $indexPlayer = array($index);
    $card = shell_exec("../gameLogicC/build/getCard " . escapeshellarg($seed) . " 6 " . escapeshellarg($index));
    $pCards = array($card);
    echo $indexPlayer[0] . "\n";
    $index++;
    $indexDealer = array($index);
    $card = shell_exec("../gameLogicC/build/getCard " . escapeshellarg($seed) . " 6 " . escapeshellarg($index));
    $dCards = array($card);
    $index++;
    array_push($indexPlayer, $index);
    $card = shell_exec("../gameLogicC/build/getCard " . escapeshellarg($seed) . " 6 " . escapeshellarg($index));
    array_push($pCards, $card);
    echo $indexPlayer[1] . "\n";
    $index++;
    array_push($indexDealer, $index);
    $card = shell_exec("../gameLogicC/build/getCard " . escapeshellarg($seed) . " 6 " . escapeshellarg($index));
    array_push($dCards, $card);
    $index++;
    $value = (int)shell_exec("../gameLogicC/build/player " . escapeshellarg($seed) . " 6 " . escapeshellarg($indexPlayer[0]) . " " . escapeshellarg($indexPlayer[1]));
    while($value < 22){
        echo "card value: " . $value . "\n";
        echo "player cards: \n";
        for($i = 0; $i < count($pCards); $i++){
            echo $pCards[$i] . "\n";
        }
        echo("hit, stay, split, double down\n");
        $input = trim(fgets(STDIN));
        if($input == "hit"){
            $card = shell_exec("../gameLogicC/build/getCard " . escapeshellarg($seed) . " 6 " . escapeshellarg($index));
            $command = "../gameLogicC/build/player " . $seed . " 6 " . $indexPlayer[0] . " " . $indexPlayer[1];
            array_push($indexPlayer, $index);
            for($i = 2; $i < (count($indexPlayer)); $i++){
                echo $i . "\n";
                $command .= " " . $indexPlayer[$i];
            }
            echo $command . "\n";
            $value = (int)shell_exec($command);
            array_push($pCards, $card);
            $index++;
        }
        elseif($input == "stay"){
            break;
        }
        
        
    }
    if($value > 21){
        echo "bust\n";
        echo "card value: " . $value . "\n";
        echo "player cards: \n";
        for($i = 0; $i < count($pCards); $i++){
            echo $pCards[$i] . "\n";
        }
    }
    break;
    
}

?>
