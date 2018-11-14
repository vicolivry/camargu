<?PHP
require 'controller/controller.php';
require_once 'model/modeldb.Class.php';
session_start();

if (isset($_GET['action'])) {
	routeCmds();
}
else
	require('view/landingPageView.php');

