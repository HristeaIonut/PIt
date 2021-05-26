let codeElements = document.getElementById("cod");
console.log(codeElements);
     doubleQuotesReg = /"(.*?)"/g,
    specialReg = /\b(if|else|elif|then|fi|case|esac|for|select|while|until|do|done|in|function|time)(?=[^\w])/g,
    functionsReg = /\b(echo|cat|read)/g,
    commandsReg = /(\-.)/g,
    inlineCommentReg = /(\#.*)/g;


    codeElements = codeElements.innerHTML;
    codeElements = codeElements.replace(doubleQuotesReg,'<span id="quotes">"$1"</span>');
    codeElements = codeElements.replace(specialReg,'<span id="special-C">$1</span>');
    codeElements = codeElements.replace(commandsReg,'<span id="special-C">$1</span>');
    codeElements = codeElements.replace(functionsReg, '<span id="Cfunctions">$1</span>');
    codeElements = codeElements.replace(inlineCommentReg,'<span id="special-comment">$1</span>');

    document.getElementById("cod").innerHTML = codeElements;
