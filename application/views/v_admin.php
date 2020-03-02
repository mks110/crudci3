<!DOCTYPE html>
<html>
<head>
	<title>Membuat login dengan codeigniter | www.malasngoding.com</title>
</head>
<body>
	<h1>Login berhasil !</h1>
	<h2>Hai, <?php echo $this->session->userdata("nama"); ?></h2> <!--memunculkan session -->
	<a href="<?php echo base_url('login/logout'); ?>">Logout</a> <!--membuat link untuk logout -->
</body>
</html>