function loadModifiedPaste(filename){
    var ajax = new XMLHttpRequest();
    var method = "POST";
    var url = "../controller/scripts/modified_pastes.php";
    var async = true;
    ajax.open(method, url, async);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("filename="+filename);
    ajax.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            var pastes = JSON.parse(this.responseText);
            var html = "";
            console.log(pastes);
            for(var i = pastes.length-1; i >= 0; i--){
                var paste = pastes[i];
                html += "<tr><td>"
                html += "<a class=\"paste\" href=\"../Pastes/";
                html += paste;
                html += "\">";
                paste = paste.replace('.html', '');
                paste = paste.replace('.php', '');
                html += paste;
                html += "</a></tr></td>";
            }
            document.getElementById("modified-pastes").innerHTML = html;
        }
    }
}
