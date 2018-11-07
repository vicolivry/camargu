<?PHP
require 'controller.php';
if (isset($_GET['action'])) {
	routeCmds();
}
else
	require('view/landingPageView.php');

