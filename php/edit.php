<?php
	require __DIR__ . "/partials/secured.php";
	$model = (isset($_POST['model']))?$_POST['model']:null;

	switch ($model) {
		case 'user':
			$user = User::auth($_SESSION['user']->username,$_POST['oldPassword']);
			if(!$user) {
				$_SESSION['eError'] = "La password inserita è errata";
				header("Location: ../profile.php");
				break;
			}

			if(isset($_POST['username']) && $_POST['username'] != "")
				$user->username = $_POST['username'];

			if(isset($_POST['password']) && $_POST['password'] != "") {
				$pwd = $_POST['password'];
				$editCryptStrategy = new Crypto($pwd,"");
				$hashedPwd = $editCryptStrategy->doCrypt();
				$user->password = $hashedPwd;
			}

			$user->update();
			$db->close();
			header("Location: ../profile.php");
			break;

		case 'document':
			$docId = $_POST['docId'];
			$document = Document::read($docId);
			if($_SESSION['user']->id != $document->author) {
				header("Location: ../home.php");
				break;
			}
			$newDescription = $_POST['description'];
			$newTitle = $_POST['title'];
			$document->title = $newTitle;
			$document->description = $newDescription;
			$document->update();
			$db->close();
			header("Location: ../document.php?id=$docId");
			break;
		default: break;
	}
