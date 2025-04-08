<?php
require __DIR__ . '/../../db.php';

// Default to 'easy' if not provided
$difficulty = $_GET['difficulty'] ?? 'easy';

// Validate input
$validDifficulties = ['easy', 'medium', 'hard'];
if (!in_array($difficulty, $validDifficulties)) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid difficulty specified.']);
    exit;
}

$stmt = $pdo->prepare("
    SELECT reward_name, quantity_min, quantity_max, drop_rate
    FROM clue_rewards
    WHERE difficulty = ?
    ORDER BY reward_name
");
$stmt->execute([$difficulty]);
$rewards = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output JSON
header('Content-Type: application/json');
echo json_encode($rewards);
