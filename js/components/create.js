function Create() {
	this.createForm = document.getElementById("createForm");
	this.myUploader = new PicUploader("uploader");
	this.initialFileUploader = document.getElementById("initial");
	this.myUp = new multiUploader();
	this.myUp.addUploader(this.initialFileUploader,false);
	this.formH = new Form("createForm");
	this.formH.addConstraint("title",/^([A-Z]{1}[a-z ]{1,45})$/);
	this.formH.addConstraint("price",/^\d{1,2}$/)
	this.formH.addConstraint("tags",/^(\w+;)+$/);
	this.fragments = new Fragment("createForm");
	this.fragments.makeSelectors("a");


	this.editor = document.getElementById("description");
	this.editorOut = new Array();

	this.createForm.onsubmit = function(e) {
		e.preventDefault();
		parse(this.editor,this.editorOut);
		var strOut = editorOut.join("");
		this.description.value = strOut;
		var editorRawText = editor.textContent.replace(/\s+/g, '');
		if(editorRawText == "" || editorRawText.length < 100) {alert("La descrizione è obbligatoria e deve essere di almeno 100 caratteri"); return;}
		if(!myUp.lastUsed) {alert("Un uploader non è stato utilizzato"); return;}
		this.submit();
	}

}
var CreatorInstance = new Create();