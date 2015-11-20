<!DOCTYPE html>
<?php
	require "./php/partials/secured.php";
?>
<html lang="en">
<?php
	include "./php/partials/header.php";
	include "./php/partials/body.php";
?>

	<main>
		<header><h2>Creazione documento</header>

		<form  id="createForm" method="POST" action="php/upload.php" enctype="multipart/form-data">
			<article data-fragment data-name="Informazioni Principali" class="left">
				<header><h3>Informazioni principali</h3></header>

					<div class="left">
						<label>Copertina (clicca per cambiare)</label>
						<div id="uploader" class="fileInput pictureInput">
							<img src="" alt="cover picture">
							<input type="file" name="cover" id="file">
							<progress max="100" value="0"></progress>
						</div><br>

					</div>
					
					<div class="left">
						<label for="title">Titolo</label><br>
						<input class="light" type="text" name="title" id="title">
						<label for="price">Prezzo</label><br>
						<input class="light" type="number" name="price" id="price">
						<label for="tags">Tags (separa i tag con ;)</label><br>
						<input class="light" type="text" name="tags" id="tags">
						<input type="hidden" name="description">
						<button id="submitForm" type="submit">Create</button>
					</div>
			</article>

			<article data-fragment data-name="Descrizione" class="right">
				<header><h3>Descrizione</h3></header>
				<div class="comboButton">
					<button class="prettyButton" onclick="command(event)" id="bold">Grassetto</button>
					<button class="prettyButton" onclick="command(event)" id="underline">Sottolineato</button>
					<button class="prettyButton" onclick="command(event)" id="italic">Corsivo</button>
				</div>
				<div contenteditable="true" id="description"></div>
			</article>

			<article data-fragment data-name="Files" class="right">
				<header><h3>Aggiunta file</h3></header>
				<p>
					Fai click col tasto sinistro su "Aggiungi File" ( oppure toccalo sullo schermo) per aggiungere un nuovo file al tuo documento.
					Fai click col tasto destro su un file (o tieni premuto su di esso) per rimuoverlo.
				</p>
					<div id="initial" class="fileInput fileUploader" >
						<span>Aggiungi file</span>
					</div>

			</article>
		</form>

	</main>


<script type="text/javascript" src="./js/components/create.js"></script>
<script type="text/javascript">Create();

	var bold = document.getElementById("bold");
	function command(event) {
		event.preventDefault();
		var command = event.target.id;
		document.execCommand(command);
	}

</script>