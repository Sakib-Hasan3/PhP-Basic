<?php
require '../config/db.php'; // Updated path to db.php

$stmt = $conn->query("SELECT id, question FROM questions");
$questions = $stmt->fetchAll();
?>

<h2>Questions</h2>
<ul>
<?php foreach ($questions as $q): ?>
    <li>
        <?php echo htmlspecialchars($q['question']); ?> —
        <a href="answer_question.php?id=<?php echo $q['id']; ?>">Answer</a> <!-- Same folder -->
    </li>
<?php endforeach; ?>
</ul>
