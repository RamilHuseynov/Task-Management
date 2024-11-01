<!DOCTYPE html>
<html>
<head>
    <title>New Task Assigned</title>
</head>
<body>
<h2>New Task Assigned: {{ $taskTitle }}</h2>

<p>Hello,</p>

<p>You have been assigned a new task: "<strong>{{ $taskTitle }}</strong>".</p>

<p><strong>Deadline:</strong> {{ $deadline }}</p>
@if($description)
    <p><strong>Task Description:</strong> {{ $description }}</p>
@endif

<p>Please ensure you complete the task by the deadline.</p>

<p>Thank you!</p>
</body>
</html>
