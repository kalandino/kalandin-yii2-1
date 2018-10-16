<h1>Предстоящие задачи</h1>
<?php foreach ($tasks as $task): ?>
<h2><?= $task->name ?></h2>
<p><?= $task->description ?></p>
<p><?= $task->created ?></p>
<?php endforeach; ?>