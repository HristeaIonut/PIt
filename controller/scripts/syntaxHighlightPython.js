let codeElements = document.getElementById("cod");
console.log(codeElements);

    const singleQuotesReg = /'(.*?)'/g;
    doubleQuotesReg = /"(.*?)"/g,
    specialReg = /\b(False|None|True|and|as|assert|break|main|continue|def|del|elif|else|excemt|finally|for|from|global|if|import|in|is|lambda|nonlocal|not|or|pass|raise|return|try|while|with|yield|type)(?=[^\w])/g,
    functionsReg = /\b(print|range|read|raw_input|main)/g,
    inlineCommentReg = /(\#.*)/g;

    codeElements = codeElements.innerHTML;
    codeElements = codeElements.replace(doubleQuotesReg,'<span id="quotes">"$1"</span>');
    codeElements = codeElements.replace(singleQuotesReg, "<span id=\"quotes\">'$1'</span>");
    codeElements = codeElements.replace(specialReg,'<span id="special-C">$1</span>');
    codeElements = codeElements.replace(functionsReg, '<span id="Cfunctions">$1</span>');
    codeElements = codeElements.replace(inlineCommentReg,'<span id="special-comment">$1</span>');

    document.getElementById("cod").innerHTML = codeElements;
