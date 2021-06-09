
function emptyCode() {
    let code = document.getElementById("textarea");
    let checked = document.getElementById("checking");
    if(code.value.trim() === '')
        alert("Let's not fill the server with empty file \u{1F608}");
    return true;
}
