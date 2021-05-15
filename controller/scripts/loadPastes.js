function loadPaste(){
    var ajax = new XMLHttpRequest();
    var method = "Get";
    var url = "../controller/scripts/data.php";
    var async = true;
    ajax.open(method, url, async);
    ajax.send();
    ajax.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            var pastes = JSON.parse(this.responseText);
            var html = "";
            for(var i = pastes.length-1; i >= 0; i--){
                var paste = pastes[i];
                html += "<tr><td>"
                html += "<a class=\"paste\" href=\"../Pastes/";
                html += paste;
                html += "\">";
                paste = paste.replace('.html', '');
                html += paste;
                html += "</a></tr></td>";
            }
            document.getElementById("pastes").innerHTML = html;
        }
    }
}
loadPaste();