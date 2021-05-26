let codeElements = document.getElementById("cod");
console.log(codeElements);
     doubleQuotesReg = /"(.*?)"/g;


    codeElements = codeElements.innerHTML;
    codeElements = codeElements.replace(doubleQuotesReg,'<span id="quotes">"$1"</span>');

    document.getElementById("cod").innerHTML = codeElements;
