<?php
$localTest = false;//local test mode (doesn't query DB, checks local json file)

$difficulty = $_GET['difficulty'] ?? 'easy';
$validDifficulties = ['easy', 'medium', 'hard'];
if (!in_array($difficulty, $validDifficulties)) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid difficulty specified.']);
    exit;
}

if ($localTest) {
    $rewards = json_decode(file_get_contents(filename: $difficulty.'.json'), true);
} else {
    require __DIR__ . '/../../db.php';
    $stmt = $pdo->prepare("
        SELECT reward_name, quantity_min, quantity_max, drop_rate, is_rare
        FROM clue_rewards
        WHERE difficulty = ?
        ORDER BY reward_name
    ");
    $stmt->execute([$difficulty]);
    $rewards = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

header('Content-Type: application/json');
echo json_encode($rewards);
