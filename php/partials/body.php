<script type="text/javascript" src="js/components/body.js"></script>
<body onload="bodyMain(superBody);" id="superBody">
	<header>
		<h1><a href="./">Spacebooks</a></h1>
	</header>

	<nav>
		<ul id="navToggle">
			<li><a >Menu</a></li>
		</ul>

		<ul id="nav">
			<li id="logo"><a href="./home.php">SPACEBOOKS</a></li>
			<li <?php if($thisUrl == "/profile.php") echo "class='active' " ?> id="picture"><a id="toggleProfile" href="#profile"><img src="<?= $user->picture ?>" alt="Profile">Benvenuto, <?= " " . $user->username ?></a></li>
			<?php
				foreach ($menuVoices as $name => $address) {
					if($name == "admin" && $user->role != "admin") continue;
					if($name == "modera" && $user->role != "moderator") continue;
					$name = ucfirst($name);
					echo "<li ";
					if($address == $thisUrl) echo "class='active'";
					echo "><a href='.$address' >$name</a></li>"; 
				}
			?>

			<li class="right" id="searchButton"><a id="toggleSearch" href="#search">Esplora</a></li>
		</ul>
	</nav>


	<aside id="profile">

			<div id="pictureContainer">
				<img id="bigPicture" src="<?= $user->picture ?>" width="100" height="100" alt="Profile">
				<span id="changePicButton"  class="change">Change</span>

				<form method="POST" id="upPicture" action="php/newpic.php" enctype="multipart/form-data">
					<input id="fileInput" type="file" name="pic">
				</form>

			
			</div>

			<div class="closeButton" id="close"></div>

			<header>
				<h2><?= $user->name . ' ' . $user->surname?></h2>
			</header>

			<ul id="sideButtons">
				<li><a class="prettyButton" href="profile.php">Il tuo profilo</a></li>
				<li><a class="prettyButton" href="./php/logout.php">Esci</a></li>
			</ul>
	</aside>


	<aside id="search">
			<header>
				<h2>Ricerca</h2>
			</header>

			<div id="closeSearch" class="closeButton"></div>

			<form id="searchForm" method="POST">
				<label for="data">Cosa vuoi cercare?</label>
				<input class="light" id="data" name="data" type="text" autocomplete="off">
				<ul class="shadow resultList" id="resultList">	
				</ul>
			</form>
	</aside>
