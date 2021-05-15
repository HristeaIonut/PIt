
function emptyCode() {
    let code = document.getElementById("textarea");
    let checked = document.getElementById("checking");
    if(code.value.trim() === '')
        alert("Let's not fill the server with empty file \u{1F608}");
    else if(checked.style.color === 'red')
        alert("Please check the captcha box  \u{1F46E} \u{270B}");
    return true;
}
