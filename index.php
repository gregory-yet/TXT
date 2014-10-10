<?php

require 'db.php';

$msg = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['user']) && isset($_POST['titre']) && isset($_POST['contenu'])){
		if(!empty($_POST['user']) && !empty($_POST['titre']) && !empty($_POST['contenu'])){
			$user = $_POST['user'];
			$titre = $_POST['titre'];
			$contenu = $_POST['contenu'];
			$uid = substr(md5(rand()), 0, 8);
			$sql = $bdd->prepare('INSERT INTO content(uid, user, titre, contenu) VALUES (:uid, :user, :titre, :contenu)');
			$sql->execute(array(
				'uid' => $uid,
				'user' => $user,
				'titre' => $titre,
				'contenu' => $contenu
			));

			$msg = 'Texte upload à l\'url : <a href="show.php?uid='.$uid.'">show.php?uid='.$uid.'</a>';
		}
		else {
			$msg = 'Veuillez remplir tout les champs !';
		}
	}
	else {
		$msg = 'Problème dans le formulaire !';
	}
}

$title = "TXT";

include 'header.php';

?>

<body>
	<!--Navbar-->
	<?php include 'navbar.php'; ?>
	<!--/Navbar-->
	<!--Contenu-->
	<div class="container" style="margin-top:80px;">
		<?php
		if(!empty($msg)) {
			echo '<div class="alert alert-info" role="alert">'.$msg.'</div>';
		}
		?>
		<div class="jumbotron">
			<h2>TXT</h2>
			<hr/>
			<form action="index.php" method="POST">
				<input type="text" class="form-control" name="user" required="" placeholder="Votre nom d'utilisateur (vous permettras de retrouver vos texte)" />
				<br/>
				<input type="text" class="form-control" name="titre" required="" placeholder="Le titre du texte" />
				<br/>
				<textarea style="resize:vertical;" class="form-control" name="contenu" required="" placeholder="Le contenu du texte"></textarea>
				<br />
				<input type="submit" value="Envoyer" class="btn btn-success" />
			</form>
			<hr class="mini" />
			<ul class="list-inline text-center">
				<li><a href="http://realitygaming.fr/members/wayz-gtp.14838/" class="fui-link social" title="Profil RealityGaming"></a></li>
				<li><a href="https://plus.google.com/113331512613643181335/" class="fui-google-plus social" title="Profil Google+"></a></li>
				<li><a href="https://twitter.com/WayzPY/" class="fui-twitter social" title="Profil Twitter"></a></li>
				<li><a href="https://github.com/WayzRG/" class="fui-github social" title="Profil Github"></a></li>
			</ul>
		</div>
	</div>

	<!-- Script -->
	<script src="bootstrap/js/vendor/jquery.min.js">Script impossible à charger</script>
	<script src="bootstrap/js/flat-ui.min.js">Script impossible à charger</script>
	<script>
	$('#search').on('focus', function(){
		$(this).parent().attr('class', 'input-group focus');
	}).on('blur', function(){
		$(this).parent().attr('class', 'input-group');
	});
	</script>
</body>

<?php

include 'footer.php';

?>