<?php
ob_start();
?>

<html>
	<body>
		<div class='footer'>
			<p> Copyright 2018 Camagru</p>
		</div>
	</body>
</html>

<?php
$footer = ob_get_clean();
require("template.php");
?>
