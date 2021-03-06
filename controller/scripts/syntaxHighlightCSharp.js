let codeElements = document.getElementById("cod");
console.log(codeElements);

    const singleQuotesReg = /'(.*?)'/g,
    doubleQuotesReg = /"(.*?)"/g,
    specialReg = /\b(abstract|async|break|catch|const|delegate|dynamic|explicit|fixed|from|group|is|object|out|ref|sealed|add|await|by|continue|descending|else|extern|get|if|join|namespace|on|override|remove|select|as|base|byte|blocked|checked|decimal|do|enum|false|for|implicit|internal|let|operator|params|return|set|ascending|case|default|double|equals|finally|goto|in|into|lock|null|orderby|partial|readonly|sbyte|using|System|static|void|class)(?=[^\w])/g,
    variableTypeReg = /\b(signed|unsigned|short|long|char|int|enum|float|double|main|private|public|protected|interface|global|new|bool)(?=[^\w])/g,
    inlineCommentReg = /(\/\/.*)/g;


    codeElements = codeElements.innerHTML;
    codeElements = codeElements.replace(variableTypeReg,'<span id="variables">$1</span>');
    codeElements = codeElements.replace(doubleQuotesReg,'<span id="quotes">"$1"</span>');
    codeElements = codeElements.replace(singleQuotesReg, "<span id=\"quotes\">'$1'</span>");
    codeElements = codeElements.replace(specialReg,'<span id="special-C">$1</span>');
    codeElements = codeElements.replace(inlineCommentReg,'<span id="special-comment">$1</span>');

    document.getElementById("cod").innerHTML = codeElements;
