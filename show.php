<?php

require 'db.php';

$title_txt = '404';
$txt = 'Le texte est indisponible !';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(isset($_GET['uid'])){
		$uid = $_GET['uid'];
		$sql = $bdd->prepare('SELECT titre, contenu FROM content WHERE uid=:uid');
		$sql->execute(array(
			'uid' => $uid
		));
		while($content = $sql->fetch()){
			$title_txt = $content['titre'];
			$txt = $content['contenu'];
		}
		$sql->closeCursor();
	}
}

$title = "TXT - ".htmlspecialchars($title_txt);

include 'header.php';

?>

<body>
	<!--Navbar-->
	<?php include 'navbar.php'; ?>
	<!--/Navbar-->
	<!--Contenu-->
	<div class="container" style="margin-top:80px;">
		<div class="jumbotron">
			<h2><?php echo htmlspecialchars($title_txt); ?></h2>
			<hr/>
			<p><?php echo nl2br(htmlspecialchars($txt)); ?></p>
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