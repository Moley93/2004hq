<?php
function checkAhkScript($filePath) {
    $violations = [];
    $maxMove = 0;
    $inputBindings = [];

    $lines = file($filePath);
    $lineNumber = 0;

    foreach ($lines as $line) {
        $lineNumber++;
        $line = trim($line);

        if (empty($line) || str_starts_with($line, ';')) {
            continue;
        }

        if (preg_match('/(Click|MouseClick|MouseClickDrag|SendInput,?\s*\{.*(Click|LButton|RButton|MButton).*?\})/i', $line)) {
            $violations[] = "Line $lineNumber: Mouse click actions are not allowed.";
        }

        if (preg_match('/(MouseMove|SendInput,?\s*\{.*Move.*?\})/i', $line)) {
            if (stripos($line, ', 0') !== false && stripos($line, 'Relative') === false) {
                $violations[] = "Line $lineNumber: Mouse movement must be relative.";
            }

            if (preg_match('/MouseMove\s*,\s*(-?\d+)\s*,\s*(-?\d+)(?:\s*,\s*(\d+))?/i', $line, $moveMatches)) {
                $x = abs((int)$moveMatches[1]);
                $y = abs((int)$moveMatches[2]);
                $speed = isset($moveMatches[3]) ? (int)$moveMatches[3] : null;

                $moveDistance = max($x, $y);
                if ($x > 0 && $y > 0 && $x !== $y) {
                    $violations[] = "Line $lineNumber: Mouse move must be a single direction or exactly diagonal.";
                }

                if ($speed === null || $speed < 2) {
                    $violations[] = "Line $lineNumber: Mouse move speed must be 2 or higher.";
                }

                if ($moveDistance > $maxMove) {
                    $maxMove = $moveDistance;
                }
            }
        }

        if (preg_match('/(WheelUp|WheelDown|WheelLeft|WheelRight|XButton1|XButton2)::/i', $line)) {
            $violations[] = "Line $lineNumber: Mouse rebinds are not allowed.";
        }

        if (preg_match('/^(.+)::/', $line, $bindMatch)) {
            $input = $bindMatch[1];
            if (isset($inputBindings[$input])) {
                $violations[] = "Line $lineNumber: Multiple actions bound to one input: '$input'.";
            } else {
                $inputBindings[$input] = true;
            }
        }
    }

    $scalingInfo = checkScaling($maxMove);

    return [$violations ?: ["No violations detected."], $scalingInfo];
}

function checkScaling($maxMove) {
    if ($maxMove <= 54) {
        return "You'll be OK with this script at: 0.5x, 1x, 2x, and 3x scaling.";
    } elseif ($maxMove <= 108) {
        return "You'll be OK with this script at: 1x, 2x, and 3x scaling.";
    } elseif ($maxMove <= 216) {
        return "You'll be OK with this script at: 2x and 3x scaling.";
    } elseif ($maxMove <= 324) {
        return "You'll be OK with this script at: 3x scaling only.";
    } else {
        return "Warning: Max move of {$maxMove}px exceeds allowed limits at any scaling!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AHK Script Checker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #1a1a1a;
            color: #ddd;
            max-width: 700px;
            margin: 30px auto;
            padding: 20px;
        }
        h1 {
            color: #f0b000;
        }
        .warning {
            background: #442222;
            border-left: 5px solid #ff4444;
            padding: 10px;
            margin-bottom: 20px;
            color: #ff8888;
            font-weight: bold;
        }
        form {
            background: #222;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        input, button {
            padding: 8px;
            margin-top: 10px;
            font-size: 1em;
        }
        pre {
            background: #111;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>

<h1>AHK Script Checker</h1>

<div class="warning">
    This tool is a basic static check for common rule violations.<br>
    It does NOT guarantee that your script is safe or allowed.<br>
    Use at your own risk — always follow the official game rules.
</div>

<form method="post" enctype="multipart/form-data">
    <label>Upload your .ahk script file:</label><br>
    <input type="file" name="ahkfile" accept=".ahk" required><br>
    <button type="submit">Check Script</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['ahkfile'])) {
    $tmpName = $_FILES['ahkfile']['tmp_name'];
    [$violations, $scalingInfo] = checkAhkScript($tmpName);

    echo "<h2>Results:</h2>";
    echo "<pre>";
    foreach ($violations as $violation) {
        echo htmlspecialchars($violation) . "\n";
    }
    echo "\n" . htmlspecialchars($scalingInfo);
    echo "</pre>";
}
?>

</body>
</html>
