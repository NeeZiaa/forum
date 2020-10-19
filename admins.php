<?php include '../includes/database.php';
session_start();
if (!isset($_SESSION['id']) || $_SESSION['id'] !== 1){
}

if (isset($_GET['type']) AND $_GET['type'] == 'membre') {
	if (isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
		$confirme = (int) $_GET['confirme'];

		$req = $db->prepare('UPDATE users SET confirme = 1 WHERE id = ?');
		$req->execute(array($confirme));
	}

	if (isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
		$supprime = (int) $_GET['supprime'];

		$req = $db->prepare('DELETE FROM users WHERE id = ?');
		$req->execute(array($supprime));
	}
}
$membres = $db->query('SELECT * FROM users ORDER BY id');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<title>Administrations</title>
</head>
<body>

	<ul>
		<?php while($m = $membres->fetch()) { ?>
		<li><?= $m['id'] ?> : <?= $m['pseudo']?> / <?=$m['email']?> - 
		<?php if($m['confirme'] == 0) { ?> - <a href="
			index.php?type=membre&confirme=<?= $m['id'] ?>">Confirmer</a><?php } ?> - <a href="
			index.php?type=membre&supprime=<?= $m['id'] ?>">Supprimer</a></li>
			<?php } ?>
	</ul>

	<br /> <br />

</body>
</html>