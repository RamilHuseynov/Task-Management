<!DOCTYPE html>
<html>
<head>
    <title>Task Reminder</title>
</head>
<body>
<h2>Task Reminder: {{ $taskTitle }}</h2>

<p>Hello,</p>

<p>This is a friendly reminder that your task "<strong>{{ $taskTitle }}</strong>" is due tomorrow ({{ $deadline }}).</p>

@if($description)
    <p><strong>Task Description:</strong> {{ $description }}</p>
@endif

<p>Please make sure to complete it by the deadline.</p>

<p>Thank you!</p>
</body>
</html>
