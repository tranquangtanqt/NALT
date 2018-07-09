var input = document.getElementById('inputtext');
input.onkeydown = function(event) {
	var kCode = event.keyCode || event.which;
	if(kCode == 13){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("list").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "ajax_add_todos/" + input.value, true);
		xmlhttp.send();

		input.value = "";
	}
}

function dong(id) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("list").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "ajax_delete_todos/" + id, true);
	xmlhttp.send();
}

var list = document.getElementById('list');

clickCount = 0;
function edit(id) {
	clickCount++;
	var li = document.getElementById('li' + id);
	var lb = li.getElementsByTagName('label')[0];
	if (clickCount === 1) {
		singleClickTimer = setTimeout(function() {
			clickCount = 0;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("list").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", "ajax_edit_check_todos/" + id, true);
			xmlhttp.send();
		}, 200);
	} 
	else if (clickCount === 2) {
		clearTimeout(singleClickTimer);
		clickCount = 0;
		li.removeChild(lb);
		var ip = document.createElement('input');
		ip.classList.add('inp');
		ip.value = lb.innerHTML;
		li.appendChild(ip);
		ip.focus();
		ip.onkeydown = function(event){
			var k = event.keyCode || event.which;
			if(k == 13 && ip.value != ''){
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("list").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET", "ajax_edit_content_todos/" + id + "/" + ip.value, true);
				xmlhttp.send();
			}
		}
	}
}