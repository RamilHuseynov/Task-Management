<!DOCTYPE html>
<html>
<head>
    <title>Task Status Updated</title>
</head>
<body>
<h2>Task Status Updated: {{ $taskTitle }}</h2>

<p>Hello,</p>

<p>The status of the task "<strong>{{ $taskTitle }}</strong>" has been updated to "<strong>{{ $updatedStatus }}</strong>".</p>

<p><strong>Deadline:</strong> {{ $deadline }}</p>

<p>Please check the task for any necessary actions.</p>

<p>Thank you!</p>
</body>
</html>
