<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<p>Hello {{ $user->first_name }},</p>

		<p>Your account on "@setting('platform.site.title')" has been activated by an administrator, you may login now.</p>

		<p>@setting('platform.site.title')</p>
	</body>
</html>
