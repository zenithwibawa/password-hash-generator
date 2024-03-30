<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Password Hash Generator</title>
</head>
<body>
	<h1>Password Hash</h1>
	<form action="" method="post">
		<div>
			<input type="text" name="password" value="<?= (isset($_POST['password']) ? $_POST['password'] : ''); ?>">
			<button name="password_submit">Generate</button>
		</div>
		<?=
			(
				isset($_POST['password']) && isset($_POST['password_submit']) ?
					'<pre>'.'[bcrypt] '.password_hash($_POST['password'], PASSWORD_DEFAULT).'</pre>'.
					'<pre>'.'[sha256] '.hash('sha256', $_POST['password']).'</pre>'.
					'<pre>'.'[sha1] '.sha1($_POST['password']).'</pre>'.
					'<pre>'.'[md5] '.md5($_POST['password']).'</pre>'
				:
					''
			)
		?>
		<div style="margin-top: 20px;">
			<button name="password_submit_rand" title="12 Digits [0-9,a-z,A-Z,~!@#$%^&*()_+]">Generate Random Password</button>
			<?= (isset($_POST['password_submit_rand']) ? '<pre>'.substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz~!@#$%^&*()_+'), 0, 12).'</pre>' : ''); ?>
		</div>
	</form>
</body>
</html>