let codeElements = document.getElementById("cod");
console.log(codeElements);

    const singleQuotesReg = /'(.*?)'/g,
    doubleQuotesReg = /"(.*?)"/g,
    includeReg = /(include)/g,
    hashTagReg = /(#)/g,
    specialReg = /\b(auto|case|continue|do|default|const|else|if|for|goto|return|static|switch|try|catch|class|using|namespace|std|case)(?=[^\w])/g,
    variableTypeReg = /\b(int|char|double|float|signed|unsigned|string|main|long|short|struct|union|void)(?=[^\w])/g,
    functionsReg = /\b(printf|scanf)/g,
    specialCommentReg = /\/\*(\*(?!\/)|[^*])*\*\//g,
    inlineCommentReg = /(\/\/.*)/g,
    librariesReg = /<[^>]*>/g;


    codeElements = codeElements.innerHTML;
    codeElements = codeElements.replace(librariesReg,'<span id="libraries">$1</span>');
    codeElements = codeElements.replace(doubleQuotesReg,'<span id="quotes">"$1"</span>');
    codeElements = codeElements.replace(singleQuotesReg, "<span id=\"quotes\">'$1'</span>");
    codeElements = codeElements.replace(includeReg,'<span id="include">$1</span>');
    codeElements = codeElements.replace(hashTagReg,'<span id="include">$1</span>');
    codeElements = codeElements.replace(specialReg,'<span id="special-C">$1</span>');
    codeElements = codeElements.replace(variableTypeReg,'<span id="variables">$1</span>');
    codeElements = codeElements.replace(functionsReg, '<span id="Cfunctions">$1</span>');
    codeElements = codeElements.replace(specialCommentReg,'<span id="special-comment">$1</span>');
    codeElements = codeElements.replace(inlineCommentReg,'<span id="special-comment">$1</span>');

    document.getElementById("cod").innerHTML = codeElements;
