<?php
$localTest = true;//local test mode (doesn't query DB, checks local json file)

$difficulty = $_GET['difficulty'] ?? 'all';
$validDifficulties = ['easy', 'medium', 'hard', 'all'];
if (!in_array($difficulty, $validDifficulties)) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid difficulty specified.']);
    exit;
}

if ($localTest) {
    switch ($difficulty) {
        case 'easy':
        case 'medium':
        case 'hard':
            $rewards = json_decode(file_get_contents(filename: $difficulty.'.json'), true);
            break;
        case 'all':
        default:
            $rewards = json_decode(json_encode(array_merge(
                    json_decode(file_get_contents(filename: 'easy.json'), true),
                    json_decode(file_get_contents(filename: 'medium.json'), true),
                    json_decode(file_get_contents(filename: 'hard.json'), true)
                )));
            break;
    }
} else {
    require __DIR__ . '/../../db.php';
    switch ($difficulty) {
        case 'easy':
        case 'medium':
        case 'hard':
            $stmt = $pdo->prepare("
                SELECT reward_name, quantity_min, quantity_max, drop_rate, is_rare
                FROM clue_rewards
                WHERE difficulty = ?
                ORDER BY reward_name
            ");
            $stmt->execute([$difficulty]);
            break;
        case 'all':
        default:
            $stmt = $pdo->prepare("
                SELECT reward_name, quantity_min, quantity_max, drop_rate, is_rare
                FROM clue_rewards
                ORDER BY difficulty, reward_name
            ");
            $stmt->execute();
            break;
    }
    $rewards = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

header('Content-Type: application/json');
echo json_encode($rewards);
