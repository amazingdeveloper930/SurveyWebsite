<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Reset your password</h2>
	
		<div>
			Click the following link to change your password {{ route('password.reset', $token) }}. The link is active for {{ config('auth.passwords.users.expire', 60) }} minutes.
		</div>
	</body>
</html>