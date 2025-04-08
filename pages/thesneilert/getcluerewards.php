<?php
require 'db.php';

$files = [
    'easy' => 'https://raw.githubusercontent.com/2004Scape/Server/main/data/src/scripts/minigames/game_trail/scripts/easy/trail_clue_easy_reward.rs2',
    'medium' => 'https://raw.githubusercontent.com/2004Scape/Server/main/data/src/scripts/minigames/game_trail/scripts/medium/trail_clue_medium_reward.rs2',
    'hard' => 'https://raw.githubusercontent.com/2004Scape/Server/main/data/src/scripts/minigames/game_trail/scripts/hard/trail_clue_hard_reward.rs2',
];

$pdo->exec("CREATE TABLE IF NOT EXISTS clue_rewards (
    id INT AUTO_INCREMENT PRIMARY KEY,
    difficulty VARCHAR(10),
    reward_name VARCHAR(255),
    quantity_min INT,
    quantity_max INT,
    drop_rate VARCHAR(20),
    hash CHAR(40)
)");

foreach ($files as $difficulty => $url) {
    $data = file_get_contents($url);
    if (!$data) continue;

    $hash = sha1($data);
    $stmt = $pdo->prepare("SELECT 1 FROM clue_rewards WHERE difficulty = ? AND hash = ? LIMIT 1");
    $stmt->execute([$difficulty, $hash]);
    if ($stmt->fetch()) continue;

    $pdo->prepare("DELETE FROM clue_rewards WHERE difficulty = ?")->execute([$difficulty]);

    $avgRolls = 1;
    $rareRollChance = 0;
    $normalRollChance = 1;
    $normalPoolSize = 1;
    $rarePoolSize = 1;

    // Parse roll logic
    if (preg_match('/def_int \$rolls = calc\((\d+) \+ random\((\d+)\)\)/', $data, $rollMatch)) {
        $base = (int)$rollMatch[1];
        $range = (int)$rollMatch[2];
        $avgRolls = 0;
        for ($i = 0; $i < $range; $i++) {
            $avgRolls += ($base + $i);
        }
        $avgRolls = $avgRolls / $range;
    }

    if (preg_match('/if\(\s*random\((\d+)\)\s*[=]{1,2}\s*0\)/', $data, $rareMatch)) {
        $rareRollChance = 1 / (int)$rareMatch[1];
        $normalRollChance = 1 - $rareRollChance;
    }

    // Get pool sizes
    if (preg_match('/\[proc,trail_clue_' . $difficulty . '_normal\][^\[]*?random\((\d+)\)/s', $data, $nMatch)) {
        $normalPoolSize = (int)$nMatch[1];
    }
    if (preg_match('/\[proc,trail_clue_' . $difficulty . '_rare\][^\[]*?random\((\d+)\)/s', $data, $rMatch)) {
        $rarePoolSize = (int)$rMatch[1];
    }

    // Match blocks (allow final proc block by appending a dummy block)
    preg_match_all('/\[proc,trail_clue_' . $difficulty . '_(normal|rare)\](.*?)(?=\[proc,|\Z)/s', $data . "\n[proc,", $procBlocks, PREG_SET_ORDER);

    foreach ($procBlocks as $block) {
        $type = $block[1];
        $procContent = $block[2];

        preg_match_all('/inv_add\((?:reward|reward2),\s*([a-zA-Z0-9_]+),\s*(calc\([^;]+\)|\d+)\);/', $procContent, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            $reward = $match[1];
            $quantityExpr = trim($match[2]);

            // Extract numeric values from inside calc(...) or direct number
            if (preg_match('/(\d+)\s*\+\s*random\((\d+)\)/', $quantityExpr, $qMatch)) {
                $min = (int)$qMatch[1];
                $max = $min + (int)$qMatch[2] - 1;
            } elseif (preg_match('/^\d+$/', $quantityExpr)) {
                $min = $max = (int)$quantityExpr;
            } else {
                $min = $max = 1;
            }

            if ($type === 'rare') {
                $chancePerRoll = $rareRollChance * (1 / $rarePoolSize);
            } else {
                $chancePerRoll = $normalRollChance * (1 / $normalPoolSize);
            }
            $chancePerClue = $chancePerRoll * $avgRolls;
            $dropRate = '1/' . round(1 / $chancePerClue);

            $stmt = $pdo->prepare("INSERT INTO clue_rewards (difficulty, reward_name, quantity_min, quantity_max, drop_rate, hash)
                                   VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$difficulty, $reward, $min, $max, $dropRate, $hash]);
        }
    }
}
echo "Fetch and store complete.\n";