<html>
	<head>
		<title>Karaoke</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">	
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>	
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="css/site.css">

		<style>
			html{
			    overflow-y: scroll;
			}
			.circleImage{
				width:100%;
				max-width: 1.25em;
			}
		</style>
	</head>
	<body>
		<div class="jumbotron">
			<div class="container">
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
					echo 
						"<h2>". $row['ArtistArtist']." - ".ucwords($row['SongName']) . 
							" <a href='". $row['SongURL']."' target='_blank' class='btn btn-primary' role='button' data-toggle='tooltip' data-placement='top' title='Open video in new tab'>
								<span class='glyphicon glyphicon-new-window'>
								</span>
							</a>
						</h2>";
					//}
				?>
				
			</div>
		</div>
		<div class="container">
			
			<?php
		    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
		    $id = $matches[1];

			
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

					if($addressId >= $num_rows){
						echo "<li><a href='?id=1'>First</a></li>";
					}
					else if($addressId < 1){
						print "<li><a href='?id=1'>First</a></li>";
					}
					else {
						print "<li class='previous'><a href='?id=".($_GET["id"]-1)."'>Previous</a></li>";
						print "<li class='next'><a href='?id=".($_GET["id"]+1)."'>Next</a></li>";
					}
					//print "<br/> <b><a href='?id=".$rand."'>Random Song</a></b><br/>";

					echo 
					"<div><a href='?id=".$rand."' class='btn btn-primary' role='button' data-toggle='tooltip' data-placement='bottom' title='Random Video'>
						<span class='glyphicon glyphicon-refresh'>
						</span>
					</a></div>"
				?>
			  </ul>
			</nav>
			<a class="btn btn-primary" role="button" data-toggle="collapse" data-target="#collapseExample">
			  All Songs
			</a>
			<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample1">
			  Search
			</button>
			<?php
			$sqlAll = mysql_query("SELECT Song.Song_Id AS SongId, Song.Song_Name AS SongName, Artist.Artist As ArtistArtist, Song.Url AS SongURL FROM Song INNER JOIN Artist On Song.Artist_Id=Artist.Artist_Id ORDER By ArtistArtist");
			?>
			<div class="collapse" id="collapseExample">
				<div class="panel">
					<div class="panel-heading">
						<h3></h3>
					</div>
					<table class="table table-striped">
						<tr>
						    <th>Artist</th>
					    	<th>Title</th>
					    	<th></th>	
						</tr>
					    <?php while($rows = mysql_fetch_array($sqlAll)) { ?>
						    <tr>
						        <td><?php echo $rows['ArtistArtist']; ?></td>
						        <td><?php echo ucwords($rows['SongName']); ?></td>
						        <td><div><a href="?id=<?php print $rows['SongId'] ?> "class='btn btn-primary' role='button'>
								<span class='glyphicon glyphicon-play-circle'>
								</span>
								</a></div></td>
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
									    <label for="nameOfSongSearch">Name of Song</label>
									    <input type="text" class="form-control" id="nameOfSongSearch" name="nameOfSongSearch">
								  	</div>
								  	<button type="submit" class="btn btn-default"><span class='glyphicon glyphicon-search'></span> Search</button>
								</form>
							</div>
							<?php
								if (isset($_GET["nameOfSongSearch"])){
									$term = $_GET["nameOfSongSearch"];
								}
								if (!empty($_REQUEST['nameOfSongSearch'])) {
								$term = mysql_real_escape_string($_REQUEST['nameOfSongSearch']); 
								}
								$sqlSongName = mysql_query("SELECT Song.Song_Id AS SongId, Song.Song_Name AS SongName, Artist.Artist As ArtistArtist FROM Song INNER JOIN Artist On Song.Artist_Id=Artist.Artist_Id WHERE Song.Song_Name LIKE '%".$term."%' ORDER By ArtistArtist");
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
								$sqlArtistName = mysql_query("SELECT Song.Song_Id AS SongId, Song.Song_Name AS SongName, Artist.Artist As ArtistArtist FROM Song INNER JOIN Artist On Song.Artist_Id=Artist.Artist_Id WHERE Artist.Artist LIKE '%".$term."%' ORDER By ArtistArtist");
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
								$sqlLanguageName = mysql_query("SELECT Song.Song_Id AS SongId, Song.Song_Name AS SongName, Artist.Artist As ArtistArtist, Song.Language_Id FROM Song INNER JOIN Artist On Song.Artist_Id=Artist.Artist_Id WHERE Song.Language_Id LIKE '%".$term."%' ORDER By ArtistArtist");
							?>
						</div>
					</div>

				</div>
			</div>
			<?php if (isset($_GET["nameOfSongSearch"])){?>
				<h3></h3>
				<table class="table table-striped">
					<tr>
					    <th>Artist</th>
				    	<th>Title</th>
				    	<th></th>	
					</tr>
				    <?php 
				    if(mysql_fetch_array($sqlSongName) == false){ ?>
				    	<div class="alert alert-warning" role="alert">Nothing found</div>
				    <?php }
				    while($rowSongName = mysql_fetch_array($sqlSongName)) { ?>
					    <tr>
					        <td><?php echo $rowSongName['ArtistArtist']; ?></td>
					        <td><?php echo ucwords($rowSongName['SongName']); ?></td>
					        <td><div><a href="?id=<?php print $rowSongName['SongId'] ?> "class='btn btn-primary' role='button'>
							<span class='glyphicon glyphicon-play-circle'>
							</span>
							</a></div></td>
			      		</tr>
			      <?php } ?>
			    </table>
			<?php } ?>
			<?php if (isset($_GET["nameOfArtistSearch"])){?>
				<h3></h3>
				<table class="table table-striped">
				     <?php 
				    if(mysql_fetch_array($sqlArtistName) == false){ ?>
				    	<div class="alert alert-warning" role="alert">Nothing found</div>
				    <?php }
				     while($rowArtistName = mysql_fetch_array($sqlArtistName)) { ?>
					    <tr>
					        <td><?php echo $rowArtistName['ArtistArtist']; ?></td>
					        <td><?php echo ucwords($rowArtistName['SongName']); ?></td>
					        <td><div><a href="?id=<?php print $rowArtistName['SongId'] ?> "class='btn btn-primary' role='button'>
							<span class='glyphicon glyphicon-play-circle'>
							</span>
							</a></div></td>
			      		</tr>
			      <?php } ?>
			    </table>
			<?php } ?>
			<?php if (isset($_GET["nameOfLanguageSearch"])){?>
				<h3></h3>
				<table class="table table-striped">
					<tr>
					    <th>Artist</th>
				    	<th>Title</th>
				    	<th></th>	
					</tr>
				     <?php 
				    if(mysql_fetch_array($sqlLanguageName) == false){ ?>
				    	<div class="alert alert-warning" role="alert">Nothing found</div>
				    <?php }
				     while($rowLanguageName = mysql_fetch_array($sqlLanguageName)) { ?>
					    <tr>
					        <td><?php echo $rowLanguageName['ArtistArtist']; ?></td>
					        <td><?php echo ucwords($rowLanguageName['SongName']); ?></td>
					        <td><div><a href="?id=<?php print $rowLanguageName['SongId'] ?> "class='btn btn-primary' role='button'>
							<span class='glyphicon glyphicon-play-circle'>
							</span>
							</a></div></td>
			      		</tr>
			      <?php } ?>
			    </table>
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
				<?php $sqlPersonSong = mysql_query("SELECT Person.Name AS PersonName, PersonSong.Person_Id AS PersonID, PersonSong.Song_Id AS SongID, Person.Facebook_Id AS FacebookID FROM PersonSong INNER JOIN Person ON PersonSong.Person_Id=Person.Person_Id WHERE PersonSong.Song_Id ='2'"); ?>
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
					for ($i=1;$i<=$numRows;$i++){
						echo "<a class='navbar-brand ' href='#''>
								<img class='circleImage' alt='Brand' src='images/circle.png'>
							</a>";
					}
					?>
<!-- 					<a class="navbar-brand " href="#">
						<img class="circleImage" alt="Brand" src="images/circle.png">
					</a>
					<a class="navbar-brand " href="#">
						<img class="circleImage" alt="Brand" src="images/circle.png">
					</a>
					<a class="navbar-brand " href="#">
						<img class="circleImage" alt="Brand" src="images/circle.png">
					</a>
					<a class="navbar-brand " href="#">
						<img class="circleImage" alt="Brand" src="images/circle.png">
					</a> -->
				</div>				
			</div>
		</nav>
	</body>
	<?php mysql_close();?>
</html>