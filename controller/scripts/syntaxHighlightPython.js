let codeElements = document.getElementById("cod");
console.log(codeElements);

    const singleQuotesReg = /'(.*?)'/g;
    doubleQuotesReg = /"(.*?)"/g,
    specialReg = /\b(False|None|True|and|as|assert|break|main|continue|def|del|elif|else|excemt|finally|for|from|global|if|import|in|is|lambda|nonlocal|not|or|pass|raise|return|try|while|with|yield|type)(?=[^\w])/g,
    functionsReg = /\b(print|range|read|raw_input|main)/g,
    inlineCommentReg = /(\#.*)/g;

    codeElements = codeElements.innerHTML;
    codeElements = codeElements.replace(doubleQuotesReg,'<span class="string">"$1"</span>');
    codeElements = codeElements.replace(singleQuotesReg, "<span class=\"string\">'$1'</span>");
    codeElements = codeElements.replace(specialReg,'<span class="special-C">$1</span>');
    codeElements = codeElements.replace(functionsReg, '<span class="Cfunctions">$1</span>');
    codeElements = codeElements.replace(inlineCommentReg,'<span class="special-comment">$1</span>');

    document.getElementById("cod").innerHTML = codeElements;
