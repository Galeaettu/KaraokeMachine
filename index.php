<html>
	<head>
		<title>Karaoke</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">	
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>		
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  		<script src="js/autocomplete.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>	
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<link href='https://fonts.googleapis.com/css?family=Kadwa:700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/site.css">
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<link rel="apple-touch-icon" sizes="57x57" href="/images/icons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/images/icons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/images/icons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/images/icons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/images/icons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/images/icons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/images/icons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/images/icons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/images/icons/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="/images/icons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="/images/icons/android-chrome-192x192.png" sizes="192x192">
		<link rel="icon" type="image/png" href="/images/icons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="/images/icons/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="/images/icons/manifest.json">
		<link rel="mask-icon" href="/images/icons/safari-pinned-tab.svg" color="#5bbad5">
		<link rel="shortcut icon" href="/images/icons/favicon.ico">
		<meta name="apple-mobile-web-app-title" content="Karaoke">
		<meta name="application-name" content="Karaoke">
		<meta name="msapplication-TileColor" content="#b91d47">
		<meta name="msapplication-TileImage" content="/images/icons/mstile-144x144.png">
		<meta name="msapplication-config" content="/images/icons/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">
		<script>
			$(document).ready(function(){
			$('#idNewArtist').keyup(idNewArtist_check);
			});
				
			function idNewArtist_check(){	
			var idNewArtist = $('#idNewArtist').val();
			if(idNewArtist == "" || idNewArtist.length < 3){
			// $('#idNewArtist').css('border', '1px #CCC solid');
			$('#tick').hide();
			}else{

			jQuery.ajax({
			   type: "POST",
			   url: "check.php",
			   data: 'idNewArtist='+ idNewArtist,
			   cache: false,
			   success: function(response){
			if(response == 1){
				$('#idNewArtist').css('border', '1px #C33 solid');	
				$('#tick').hide();
				$('#cross').fadeIn();
				}else{
				$('#idNewArtist').css('border', '1px #090 solid');
				$('#cross').hide();
				$('#tick').fadeIn();
				}

			}
			});
			}



			}

		</script>

		<style>
			html{
			    overflow-y: scroll;
			}
			.circleImage{
				width:100%;
				max-width: 1.25em;
			}
			.embed-responsive{
				border-radius: 1em;
			}
			.modal-backdrop {
				z-index: 0;
			}

			#tick{
				margin-right: 1em;
				margin-top:-1.7em;
				display:none
			}
			#cross{
				margin-right: 1em;
				margin-top:-1.7em;
				display:none
			}
			.error{
				color:red;
				font-weight: bold;
				font-size: 0.8em;
				position: absolute;
				margin-top: -0.1em;
			}
			.error1{
				color:red;
				font-weight: bold;
				font-size: 0.8em;
			}
				

		</style>
	</head>
	<body>
		<?php include("formCheck.php"); ?>
		<div class="jumbotron">
			<div class="container">
				<!-- <input type="text" value="" placeholder="Search" id="keyword"> -->
<!-- 				<div id="results">
					<div class="item">abc</div>
					<div class="item">def</div>
					<div class="item">hij</div>
				</div> -->
				<?php

					if (isset($_GET["id"])){
						$_GET["id"] = $_GET["id"];
					}
					else{
						$_GET["id"] = rand(1,100);
					}
					mysql_connect("fdb6.awardspace.net", "1954059_cirku", "chrisgalea1") or die (mysql_error ());
					mysql_select_db("1954059_cirku") or die(mysql_error());
					$rs = mysql_query("SELECT Song.Song_Id AS SongId, Song.Song_Name AS SongName, Artist.Artist As ArtistArtist, Song.Url AS SongURL FROM Song 
						INNER JOIN Artist On Song.Artist_Id=Artist.Artist_Id WHERE Song.Song_Id=".($_GET["id"])." ORDER By Song.Song_Id");
					if (!$rs) {
				    	echo "Choose Song";
					}
					$result = mysql_query("SELECT COUNT(*) AS NumberOfSongs FROM Song");
					$row1 = mysql_fetch_row($result);
					$num_rows = $row1[0];

					$rand = rand(1, $num_rows);

					//while($row = mysql_fetch_array($rs)) {
						// if (!$row) {
				  //   		echo "Nothing here...";
						// }
					$row = mysql_fetch_array($rs);
					$url = $row['SongURL'];
					if($_GET["id"] > 0 && $_GET["id"] <= $num_rows){
						echo 
						"<h2>". $row['ArtistArtist']." - ".ucwords($row['SongName']) . 
							" <a href='". $row['SongURL']."' target='_blank' class='btn btn-primary' role='button' data-toggle='tooltip' data-placement='top' title='Open video in new tab'>
								<span class='glyphicon glyphicon-new-window'>
								</span>
							</a>
						</h2>";
					}else{
						echo 
						"<h2> No Song Found - Try a Random Video
							 <a href='?id=".$rand."' class='btn btn-primary' role='button' data-toggle='tooltip' data-placement='bottom' title='Random Video'>
								<span class='glyphicon glyphicon-refresh'>
								</span>
							</a>
						</h2>";
					}
					
					//}

				?>
				
			</div>
		</div>
		<div class="container">
			<?php 
			$frmErrDiv;
			if ($errCheck > 0){
				$frmErrDiv = "";
			} else{
				$frmErrDiv = "hidden";
			}
			?>
			<div class="<?php echo $frmErrDiv ?>">
				<div class="alert alert-warning" role="alert">
					Check the <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".addSong">
						<span class='glyphicon glyphicon-edit'>
						</span>
						<span class="hidden-xs hidden-sm"> Add Song</span>
					</button> form again.  <button type="button" class="btn btn-danger btn-sm pull-right" data-toggle="modal" data-target=".addSong">
						<?php if($errCheck > 1){echo "Errors ";}else{echo "Error ";}?>
						<span class="badge">
							<?php echo $errCheck; ?>
						</span>
					</button>
				</div>
			</div>
			
			<?php
		    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
		    $id = $matches[1];

			if($_GET["id"] > 0 && $_GET["id"] <= $num_rows){
			?>

			<div class="embed-responsive embed-responsive-16by9">
				<iframe id="ytplayer" type="text/html"
			    src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
			    frameborder="0" allowfullscreen>
				</iframe> 
			</div>

		<nav>
			  <ul class="pager">
				<?php
					$addressId = $_GET["id"];

					// if($addressId >= $num_rows){
					// 	echo "<li><a href='?id=1'>First</a></li>";
					// }
					// else if($addressId < 1){
					// 	print "<li><a href='?id=1'>First</a></li>";
					// }
					if($_GET["id"] > 0 ) {
						print "<li class='previous'><a href='?id=".($_GET["id"]-1)."'>Previous</a></li>";
					}
					if($_GET["id"] < $num_rows) {
						print "<li class='next'><a href='?id=".($_GET["id"]+1)."'>Next</a></li>";
					}
					// echo 
					// "<div><a href='?id=".$rand."' class='btn btn-primary' role='button' data-toggle='tooltip' data-placement='bottom' title='Random Video'>
					// 	<span class='glyphicon glyphicon-refresh'>
					// 	</span>
					// </a></div>"
				?>
			  </ul>
			  <?php } ?>
			</nav>
			
			<form action='' method='POST'>
				<a class="btn btn-primary" role="button" data-toggle="collapse" data-target="#collapseExample">
			  All Songs
			</a>
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample1">
			  Search
			</button>
				<label class= "hidden-xs hidden-sm"for="btnChris"> I Know This! - </label>
			    <button type="submit" name="btnChris" id="btnChris" class="btn btn-success hidden-xs hidden-sm"></span>Christian</button>
			    <button type="submit" name="btnBen" id="btnBen" class="btn btn-primary hidden-xs hidden-sm"></span>Benjamin</button>
			    <button type="submit" name="btnMyriah" id="btnMyriah" class="btn btn-info hidden-xs hidden-sm"></span>Myriah</button>
			    <button type="submit" name="btnRoxanne" id="btnRoxanne" class="btn btn-danger hidden-xs hidden-sm"></span>Roxanne</button>
			    <button type="submit" name="btnGilbert" id="btnGilbert" class="btn btn-warning hidden-xs hidden-sm"></span>Gilbert</button>
			</form>
			<?php 
			
			if(isset($_POST['btnChris'])){
				$sqlChris = sprintf("INSERT INTO `PersonSong`(`Person_Id`, `Song_Id`) VALUES (1,%s)",mysql_real_escape_string($addressId));
				$sqlChrisQ = mysql_query($sqlChris);
				if($sqlChrisQ){
					echo "Added";
				}else {
					echo "You already know this!";
				}

			}

			if(isset($_POST['btnBen'])){
				$sqlChris = sprintf("INSERT INTO `PersonSong`(`Person_Id`, `Song_Id`) VALUES (4,%s)",mysql_real_escape_string($addressId));
				$sqlChrisQ = mysql_query($sqlChris);
				if($sqlChrisQ){
					echo "Added";
				}else {
					echo "You already know this!";
				}
			}

			if(isset($_POST['btnMyriah'])){
				$sqlChris = sprintf("INSERT INTO `PersonSong`(`Person_Id`, `Song_Id`) VALUES (2,%s)",mysql_real_escape_string($addressId));
				$sqlChrisQ = mysql_query($sqlChris);
				if($sqlChrisQ){
					echo "Added";
				}else {
					echo "You already know this!";
				}
			}

			if(isset($_POST['btnRoxanne'])){
				$sqlChris = sprintf("INSERT INTO `PersonSong`(`Person_Id`, `Song_Id`) VALUES (3,%s)",mysql_real_escape_string($addressId));
				$sqlChrisQ = mysql_query($sqlChris);
				if($sqlChrisQ){
					echo "Added";
				}else {
					echo "You already know this!";
				}
			}

			if(isset($_POST['btnGilbert'])){
				$sqlChris = sprintf("INSERT INTO `PersonSong`(`Person_Id`, `Song_Id`) VALUES (5,%s)",mysql_real_escape_string($addressId));
				$sqlChrisQ = mysql_query($sqlChris);
				if($sqlChrisQ){
					echo "Added";
				}else {
					echo "You already know this!";
				}
			}

			?>

			<?php
			$sqlAll = mysql_query("SELECT Song.Song_Id AS SongId, Song.Song_Name AS SongName, Artist.Artist As ArtistArtist, Song.Url AS SongURL FROM Song INNER JOIN Artist On Song.Artist_Id=Artist.Artist_Id ORDER By ArtistArtist");
			?>
			<div class="collapse" id="collapseExample">
				<div class="panel">
					<div class="panel-heading">
						<h3></h3>
					</div>
					<table class="table table-striped table-hover">
						<tr>
						    <th>Artist</th>
					    	<th>Title</th>
					    	<th class="hidden-xs hidden-sm">Know It</th>
					    	<th class="visible-xs visible-sm"></th>
					    	<th>Play</th>
						</tr>
					    <?php while($rows = mysql_fetch_array($sqlAll)) { ?>
						    <tr>
						        <td><?php echo $rows['ArtistArtist']; ?></td>
						        <td><?php echo ucwords($rows['SongName']); ?></td>
								<td>
									<?php 
									$sqlPersonSong = mysql_query("SELECT Person.Name AS PersonName, PersonSong.Person_Id AS PersonID, PersonSong.Song_Id AS SongID, Person.Facebook_Id AS FacebookID FROM PersonSong INNER JOIN Person ON PersonSong.Person_Id=Person.Person_Id WHERE PersonSong.Song_Id ='".$rows['SongId']."'"); ?>
									<div class="hidden-xs hidden-sm">
										<?php 
										$numRows = 1;
										while($rowFacebookImg = mysql_fetch_array($sqlPersonSong)) { ?>
										<a href="#">
											<img class="circleImage img-circle" alt="Brand" src="http://graph.facebook.com/<?php print $rowFacebookImg['FacebookID'] ?>/picture?type=square&width=200&height=200" 
											data-toggle='tooltip' data-placement='top' title='<?php print $rowFacebookImg['PersonName'] ?>'>
										</a>
										<?php } ?>
									</div>
								</td>
								<td>
						        	<div>
						        		<a href="?id=<?php print $rows['SongId'] ?> "class='btn btn-primary' role='button'>
											<span class='glyphicon glyphicon-play-circle'>
											</span>
										</a>
									</div>
								</td>
				      		</tr>
				      <?php } ?>
				      
				    </table>
				</div>
			</div>
			<div class="collapse" id="collapseExample1">
				<h3></h3>
				
				<div class="row">
					<!-- Search by Song Name -->
					<div class="col-sm-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Search Song by Song Name</h3>
							</div>
							<div class="panel-body">
							    <form class="form-inline">
								  	<div class="form-group">
								  		<div class=" col-sm-12">
										    <!-- <label for="nameOfSongSearch">Name of Song</label> -->
										    <input type="text" class="form-control" id="nameOfSongSearch" name="nameOfSongSearch" autocomplete="off" placeholder="Name of Song">
										</div>

								  	</div>
								  	<button type="submit" class="btn btn-default"><span class='glyphicon glyphicon-search'></span> Search</button>
								  	<div id="results" class="list-group"></div>
								</form>

								
							</div>
							<?php
								if (isset($_GET["nameOfSongSearch"])){
									$term = $_GET["nameOfSongSearch"];
								}
								if (!empty($_REQUEST['nameOfSongSearch'])) {
								$term = mysql_real_escape_string($_REQUEST['nameOfSongSearch']); 
								}
								$sqlSongName = mysql_query("SELECT Song.Song_Id AS SongId, Song.Song_Name AS SongName, Artist.Artist As ArtistArtist FROM Song INNER JOIN Artist On Song.Artist_Id=Artist.Artist_Id WHERE Song.Song_Name LIKE '%".$term."%'");
							?>
						</div>
					</div>
					

					<!-- Search by Artist -->
					<div class="col-sm-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Search Song by Artist</h3>
							</div>
							<div class="panel-body">
							    <form class="form-inline">
								  	<div class="form-group">
									    <label for="nameOfArtistSearch">Name of Artist</label>
									    <input type="text" class="form-control" id="nameOfArtistSearch" name="nameOfArtistSearch">
								  	</div>
								  	<button type="submit" class="btn btn-default"><span class='glyphicon glyphicon-search'></span> Search</button>
								</form>
							</div>
							<?php
								if (isset($_GET["nameOfArtistSearch"])){
									$term = $_GET["nameOfArtistSearch"];
								}
								if (!empty($_REQUEST['nameOfArtistSearch'])) {
								$term = mysql_real_escape_string($_REQUEST['nameOfArtistSearch']); 
								}
								$sqlArtistName = mysql_query("SELECT Song.Song_Id AS SongId, Song.Song_Name AS SongName, Artist.Artist As ArtistArtist FROM Song INNER JOIN Artist On Song.Artist_Id=Artist.Artist_Id WHERE Artist.Artist LIKE '%".$term."%'");
							?>
						</div>
					</div>

					<!-- Search by language -->
					<div class="col-sm-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Search Song by Language</h3>
							</div>
							<div class="panel-body">
							    <form class="form-inline">
							    	<label for="nameOfLanguageSearch">Language</label>
								  	<select class="form-control" id="nameOfLanguageSearch" name="nameOfLanguageSearch">
										<option value="1">Maltese</option>
										<option value="2">English</option>
										<option value="4">Italian</option>
									</select>
								  	<button type="submit" class="btn btn-default"><span class='glyphicon glyphicon-search'></span> Search</button>
								</form>
							</div>
							<?php
								if (isset($_GET["nameOfLanguageSearch"])){
									$term = $_GET["nameOfLanguageSearch"];
								}
								if (!empty($_REQUEST['nameOfLanguageSearch'])) {
								$term = mysql_real_escape_string($_REQUEST['nameOfLanguageSearch']); 
								}
								$sqlLanguageName = mysql_query("SELECT Song.Song_Id AS SongId, Song.Song_Name AS SongName, Artist.Artist As ArtistArtist, Song.Language_Id FROM Song INNER JOIN Artist On Song.Artist_Id=Artist.Artist_Id WHERE Song.Language_Id LIKE '%".$term."%'");
							?>
						</div>
					</div>

				</div>
			</div>
			<?php if (isset($_GET["nameOfSongSearch"])){?>
				<h3></h3>
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Search Results for "<?php echo $term?>"</h3>
					</div>
					<table class="table table-hover table-striped">
						<tr>
						    <th>Artist</th>
					    	<th>Title</th>
					    	<th class="hidden-xs hidden-sm">Know It</th>
					    	<th class="visible-xs visible-sm"></th>
						    <th>Play</th>
		
						</tr>
					    <?php 
					    $check1 = 0;
					    while($rowSongName = mysql_fetch_array($sqlSongName)) { $check1 = 1;?>
						    <tr>
						        <td><?php echo $rowSongName['ArtistArtist']; ?></td>
						        <td><?php echo ucwords($rowSongName['SongName']); ?></td>
	<!-- 					        <td>
						        	<div>
						        		<a href="?id=<?php print $rowSongName['SongId'] ?> "class='btn btn-primary' role='button'>
											<span class='glyphicon glyphicon-play-circle'>
											</span>
										</a>
									</div>
								</td> -->
								<td>
									<?php 
									$sqlPersonSong = mysql_query("SELECT Person.Name AS PersonName, PersonSong.Person_Id AS PersonID, PersonSong.Song_Id AS SongID, Person.Facebook_Id AS FacebookID FROM PersonSong INNER JOIN Person ON PersonSong.Person_Id=Person.Person_Id WHERE PersonSong.Song_Id ='".$rowSongName['SongId']."'"); ?>
									<div class="hidden-xs hidden-sm">
										<?php 
										$numRows = 1;
										while($rowFacebookImg = mysql_fetch_array($sqlPersonSong)) { ?>
										<a href="#">
											<img class="circleImage img-circle" alt="Brand" src="http://graph.facebook.com/<?php print $rowFacebookImg['FacebookID'] ?>/picture?type=square&width=200&height=200" 
											data-toggle='tooltip' data-placement='top' title='<?php print $rowFacebookImg['PersonName'] ?>'>
										</a>
										<?php } ?>
									</div>
								</td>
								<td>
						        	<div>
						        		<a href="?id=<?php print $rowSongName['SongId'] ?> "class='btn btn-primary' role='button'>
											<span class='glyphicon glyphicon-play-circle'>
											</span>
										</a>
									</div>
								</td>
				      		</tr>
				      <?php } 
				      if($check1==0){ ?>
					    	<div class="alert alert-warning" role="alert">Nothing found</div>
					    <?php }?>
				    </table>
				</div>
			<?php } ?>
			<?php if (isset($_GET["nameOfArtistSearch"])){?>
				<h3></h3>
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Search Results for "<?php echo $term?>"</h3>
					</div>
					<table class="table table-striped table-hover">
						<tr>
						    <th>Artist</th>
					    	<th>Title</th>
					    	<th class="hidden-xs hidden-sm">Know It</th>
					    	<th class="visible-xs visible-sm"></th>
						    <th>Play</th>	
						</tr>
					     <?php 
					    $check2 = 0;
					     while($rowArtistName = mysql_fetch_array($sqlArtistName)) { $check2 = 1;?>
						    <tr>
						        <td><?php echo $rowArtistName['ArtistArtist']; ?></td>
						        <td><?php echo ucwords($rowArtistName['SongName']); ?></td>
	<!-- 					        <td>
						        	<div>
						        		<a href="?id=<?php print $rowArtistName['SongId'] ?> "class='btn btn-primary' role='button'>
											<span class='glyphicon glyphicon-play-circle'>
											</span>
										</a>
									</div>
								</td> -->
								<td>
									<?php 
									$sqlPersonSong = mysql_query("SELECT Person.Name AS PersonName, PersonSong.Person_Id AS PersonID, PersonSong.Song_Id AS SongID, Person.Facebook_Id AS FacebookID FROM PersonSong INNER JOIN Person ON PersonSong.Person_Id=Person.Person_Id WHERE PersonSong.Song_Id ='".$rowArtistName['SongId']."'"); ?>
									<div class="hidden-xs hidden-sm">
										<?php 
										$numRows = 1;
										while($rowFacebookImg = mysql_fetch_array($sqlPersonSong)) { ?>
										<a href="#">
											<img class="circleImage img-circle" alt="Brand" src="http://graph.facebook.com/<?php print $rowFacebookImg['FacebookID'] ?>/picture?type=square&width=200&height=200" 
											data-toggle='tooltip' data-placement='top' title='<?php print $rowFacebookImg['PersonName'] ?>'>
										</a>
										<?php } ?>
									</div>
								</td>
								<td>
						        	<div>
						        		<a href="?id=<?php print $rowArtistName['SongId'] ?> "class='btn btn-primary' role='button'>
											<span class='glyphicon glyphicon-play-circle'>
											</span>
										</a>
									</div>
								</td>
				      		</tr>
				      <?php } 
				      if($check2==0){ ?>
					    	<div class="alert alert-warning" role="alert">Nothing found</div>
					    <?php }?>
				    </table>
				</div>
			<?php } ?>
			<?php if (isset($_GET["nameOfLanguageSearch"])){?>
				<h3></h3>
				<div class="panel">
					
					<table class="table table-striped table-hover">
						<tr>
						    <th>Artist</th>
					    	<th>Title</th>
					    	<th class="hidden-xs hidden-sm">Know It</th>
					    	<th class="visible-xs visible-sm"></th>
						    <th>Play</th>	
						</tr>
					     <?php 
					    $check3 = 0;
					     while($rowLanguageName = mysql_fetch_array($sqlLanguageName)) {  $check3 = 1;?>
						    <tr>
						        <td><?php echo $rowLanguageName['ArtistArtist']; ?></td>
						        <td><?php echo ucwords($rowLanguageName['SongName']); ?></td>
	<!-- 					        <td>
						        	<div>
						        		<a href="?id=<?php print $rowLanguageName['SongId'] ?> "class='btn btn-primary' role='button'>
											<span class='glyphicon glyphicon-play-circle'>
											</span>
										</a>
									</div>
								</td> -->
								<td>
									<?php 
									$sqlPersonSong = mysql_query("SELECT Person.Name AS PersonName, PersonSong.Person_Id AS PersonID, PersonSong.Song_Id AS SongID, Person.Facebook_Id AS FacebookID FROM PersonSong INNER JOIN Person ON PersonSong.Person_Id=Person.Person_Id WHERE PersonSong.Song_Id ='".$rowLanguageName['SongId']."'"); ?>
									<div class="hidden-xs hidden-sm">
										<?php 
										$numRows = 1;
										while($rowFacebookImg = mysql_fetch_array($sqlPersonSong)) { ?>
										<a href="#">
											<img class="circleImage img-circle" alt="Brand" src="http://graph.facebook.com/<?php print $rowFacebookImg['FacebookID'] ?>/picture?type=square&width=200&height=200" 
											data-toggle='tooltip' data-placement='top' title='<?php print $rowFacebookImg['PersonName'] ?>'>
										</a>
										<?php } ?>
									</div>
								</td>
								<td>
						        	<div>
						        		<a href="?id=<?php print $rowLanguageName['SongId'] ?> "class='btn btn-primary' role='button'>
											<span class='glyphicon glyphicon-play-circle'>
											</span>
										</a>
									</div>
								</td>
				      		</tr>
				      <?php } 
				      if($check3==0){ ?>
					    	<div class="alert alert-warning" role="alert">Nothing found</div>
					    <?php }?>
				    </table>
				</div>
			<?php } ?>
		</div>
		<script src="js/script.js"></script>
		<script>
			$(document).ready(function(){
			    $('[data-toggle="tooltip"]').tooltip();   
			});
		</script>
		
		<div class="pixel1"></div>
		<nav class="navbar navbar-default navbar-fixed-bottom">
			<div class="container">
				<?php 
				if (isset($_GET["id"])){
						$_GET["id"] = $_GET["id"];
					}
				$sqlPersonSong = mysql_query("SELECT Person.Name AS PersonName, PersonSong.Person_Id AS PersonID, PersonSong.Song_Id AS SongID, Person.Facebook_Id AS FacebookID FROM PersonSong INNER JOIN Person ON PersonSong.Person_Id=Person.Person_Id WHERE PersonSong.Song_Id ='".$_GET["id"]."'"); ?>
				<div class="navbar-header">
					<?php 
					$numRows = 1;
					while($rowLanguageName = mysql_fetch_array($sqlPersonSong)) { ?>
					<a class="navbar-brand " href="#">
						<img class="circleImage img-circle" alt="Brand" src="http://graph.facebook.com/<?php print $rowLanguageName['FacebookID'] ?>/picture?type=square&width=200&height=200" 
						data-toggle='tooltip' data-placement='top' title='<?php print $rowLanguageName['PersonName'] ?>'>
					</a>

					<?php 
					$numRows++;
					} ;
					?>
					<?php
					$numRows = 5-$numRows;
					for ($i=0;$i<=$numRows;$i++){
						echo "<a class='navbar-brand ' href='#''>
								<img class='circleImage' alt='Brand' src='images/circle.png'>
							</a>";
					}
					?>
				</div>
				<?php if($_GET["id"] > 0 && $_GET["id"] <= $num_rows){
					echo 
					"<p class='navbar-text hidden-xs hidden-sm'>". $row['ArtistArtist']." - ".ucwords($row['SongName'])."</p>";
				}else{
					echo 
					"<p class='navbar-text hidden-xs hidden-sm'> No Song Found - Try a Random Video </p>";
				} ?>
				

				<div class="btn-group navbar-right">					
					<a href='?id=<?php echo $rand  ?>' class='btn btn-primary navbar-btn' role='button'>
						<span class='glyphicon glyphicon-refresh'>
						</span>
						<span class="hidden-xs hidden-sm"> Random Song</span>
					</a>
					<button type="button" class="btn btn-primary navbar-btn" data-toggle="modal" data-target=".addSong">
						<span class='glyphicon glyphicon-edit'>
						</span>
						<span class="hidden-xs hidden-sm"> Add Song</span>
					</button> 
				</div>

				<div class="modal fade addSong" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						    <div class="modal-header">
							    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							    <h4 class="modal-title" id="myModalLabel">Add Karaoke Video</h4>
						    </div>
						    <div class="modal-body">
						    	<form action='' id="addForm" class="form-horizontal" method="post">
						    		<div class="form-group <?php echo $frmErrDiv ?>">
						    			<div class="col-sm-12">
								    		<div class="alert alert-danger" role="alert">
								    			<?php echo $formErrors ?>
								    		</div>
								    	</div>
								    </div>
							    	<div class="form-group">
							    		<div class="col-sm-8">
								    		<label for="idSongName">Song Title </label><span class="error"> * <?php echo $songNameErr;?></span>
	    									<input type="text" class="form-control" name="idSongName" id="idSongName" placeholder="The name of the song. eg. Never Gonna Give You Up" value="<?php echo $songName;?>">
	    								</div>
							    	</div>
							    	<div class="form-group">
							    		<div class="col-sm-8">
								    		<label for="idSongUrl">YouTube URL</label><span class="error"> * <?php echo $songUrlErr;?></span>
	    									<input type="text" class="form-control" name="idSongUrl" id="idSongUrl" placeholder="eg. https://www.youtube.com/watch?v=nMDXPAM8RwE" value="<?php echo $songUrl;?>">
	    								</div>
	    								<div class="col-sm-4">
							    			<label for="idLanguage">Language</label>
										  	<select class="form-control" id="idLanguage" name="idLanguage">
										  		<option value="2">English</option>
												<option value="1">Maltese</option>
												<option value="4">Italian</option>
											</select>
							    		</div>
							    	</div>
							    	<div class="form-group">
							    		<div class="col-sm-12">
								    		<div class="alert alert-info" role="alert">
								    			<p><b>Important!</b> When entering the artist first check the <b>existing list</b>. Enter a new artist in the 'New Artist Check' field if you do not find the artist you need.</p>
								    			<p>If the border is <b>red</b> check the existing list again.</p>
								    		</div>
								    	</div>
							    		<div class="col-sm-6">
									    	<?php
											$options = '<option value="">Select Artist...</option>';

											$filterArtist=mysql_query("SELECT DISTINCT Artist.Artist_Id AS ArtistId, Artist.Artist AS ArtistName FROM Artist ORDER BY ArtistName");
											while($rowArtist = mysql_fetch_array($filterArtist)) {
												if($rowArtist['ArtistId'] == $_POST["idOldArtist"]){
													$selected =" selected ";
												}
												else{
													$selected = "";
												}
											    $options .="<option ".$selected." value=" .  $rowArtist['ArtistId'] . ">" . $rowArtist['ArtistName'] . "</option>";
											}

											$menu=" <label for='idOldArtist'>Artist from Existing</label><span class='error'>".$oldArtistErr."</span>
											    <select class='form-control' name='idOldArtist' id='idOldArtist'>
											      " . $options . "
											    </select>";

											echo $menu;

											?>
										</div>
										<div class="col-sm-6">
							    			<label for="idNewArtist">New Artist Check</label><span class="error"> <?php echo $newArtistErr;?></span>
							    			<input type="text" class="form-control" name="idNewArtist" id="idNewArtist" autocomplete="off" value="<?php echo $newArtist; ?>">
							    			<img class="pull-right" id="tick" src="images/tick.png" width="16" height="16"/>
											<img class="pull-right" id="cross" src="images/cross.png" width="16" height="16"/>
							    		</div>
									</div>
									<div class="form-group">
										<div class="col-sm-6">
											<label class="radio-inline">
												<input type="radio" name="radioArtist" id="radioArtist1" <?php if (isset($radio) && $radio=="1"){ echo "checked";}?> value="1"> Existing Artist
											</label>
											<label class="radio-inline">
											 	<input type="radio" name="radioArtist" id="radioArtist2" <?php if (isset($radio) && $radio=="2"){ echo "checked";}?> value="2"> New Artist
											</label>
											<span class="error1"> * <?php echo $radioErr;?></span>
										</div>
									</div>
									<button type="submit" class="btn btn-success" name="submit-button" id="submit-button">Submit</button>
									<div class="result"></div>
						    	</form>
						    </div>
						    <div class="modal-footer">
							    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							    <button type="button" class="btn btn-primary">Save changes</button>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</body>
	<?php mysql_close();?>
</html>