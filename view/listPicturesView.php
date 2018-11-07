<?php
$title = 'Camagru';
ob_start();
?>
<h1>DERNIERES IMAGES !</h1>
<?php
while ($data = $pictures->fetch())
{
?>

	<div class="pictures">
		<h3>
			<?= $data['$title'] ?>
			<em>le <?= $data['creation_date'] ?></em>
			</br>
		</h3>
	</div>

<?php
}
$pictures->closeCursor();
$content = ob_get_clean();
require('template.php');
?>
