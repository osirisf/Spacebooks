function AsyncReq(url,callback) {
	this.url = url;
	this.client = new XMLHttpRequest();
	this.client.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200) {
			callback(this.responseText);
		} else {
			if(this.status == 404)
				callback(false);
		}
	}
}


AsyncReq.prototype.GET = function(params) {
	var query = this.url;
	if(params.length)
		 query += "?";
	for(var i = 0; i < params.length; ++i) {
		query+= params[i].id + "=" + params[i].value;
		if(i != params.length - 1) {
			query+="&";
		}
	}
	if(!query) return;
	this.client.open("GET",query,true);
	this.client.send();
}

AsyncReq.prototype.POST = function(params,type) {
	var data = "";
	this.client.open("POST",this.url,true);
	this.client.setRequestHeader("Content-type",type);
	for(var i in params) {
		data +=params[i].id + "=" + params[i].value;

		if(i != params.length - 1) {
			data+="&";
		}
	}
	this.client.send(data);
}
