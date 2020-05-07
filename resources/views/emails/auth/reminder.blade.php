<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Password Reminder</h2>
	
		<div>
			Please fill in this form {{ route('password.reset', $token) }}. The link will expire in {{ config('auth.passwords.users.expire', 60) }} minutes.
		</div>
	</body>
</html>