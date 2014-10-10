<?php

require 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(isset($_GET['s'])){
		$search = $_GET['s'];
		$sql = $bdd->prepare('SELECT * FROM content WHERE user=:user');
		$sql->execute(array(
			'user' => $search
		));
	}
}

$title = "TXT - ".htmlspecialchars($_GET['s']);

include 'header.php';

?>

<body>
	<!--Navbar-->
	<?php include 'navbar.php'; ?>
	<!--/Navbar-->
	<!--Contenu-->
	<div class="container" style="margin-top:80px;">
		<div class="jumbotron">
			<h2>Recherche utilisateur "<?php echo htmlspecialchars($_GET['s']); ?>"</h2>
			<hr/>
			<table class="table table-striped">
				<tr>
					<th>#</th>
					<th>UID</th>
					<th>Titre</th>
					<th>Utilisateur</th>
				</tr>
				<?php
					while ($content = $sql->fetch()){
						echo '<tr><td>'.htmlspecialchars($content['id']).'</td><td><a href="show.php?uid='.htmlspecialchars($content['uid']).'" target="_blank">'.htmlspecialchars($content['uid']).'</a></td><td>'.htmlspecialchars($content['titre']).'</td><td><p>'.htmlspecialchars($content['user']).'</p></td></tr>';
					}

					$sql->closeCursor();
				?>
			</table>
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