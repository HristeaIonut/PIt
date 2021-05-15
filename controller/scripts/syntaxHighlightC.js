let codeElements = document.getElementById("cod");
console.log(codeElements);

    const singleQuotesReg = /'(.*?)'/g,
    doubleQuotesReg = /"(.*?)"/g,
    includeReg = /(include)/g,
    hashTagReg = /(#)/g,
    specialReg = /\b(auto|case|continue|do|default|const|else|if|for|goto|return|static|switch|break|while)(?=[^\w])/g,
    variableTypeReg = /\b(signed|unsigned|short|long|char|int|enum|float|double|string|main)(?=[^\w])/g,
    functionsReg = /\b(cin|cout)/g,
    specialCommentReg = /\/\*(\*(?!\/)|[^*])*\*\//g,
    inlineCommentReg = /(\/\/.*)/g,
    librariesReg = /<[^>]*>/g;


    codeElements = codeElements.innerHTML;
    codeElements = codeElements.replace(librariesReg,'<span class="libraries">$1</span>');
    codeElements = codeElements.replace(doubleQuotesReg,'<span class="string">"$1"</span>');
    codeElements = codeElements.replace(singleQuotesReg, "<span class=\"string\">'$1'</span>");
    codeElements = codeElements.replace(includeReg,'<span class="include">$1</span>');
    codeElements = codeElements.replace(hashTagReg,'<span class="include">$1</span>');
    codeElements = codeElements.replace(specialReg,'<span class="special-C">$1</span>');
    codeElements = codeElements.replace(variableTypeReg,'<span class="variables">$1</span>');
    codeElements = codeElements.replace(functionsReg, '<span class="Cfunctions">$1</span>');
    codeElements = codeElements.replace(specialCommentReg,'<span class="special-comment">$1</span>');
    codeElements = codeElements.replace(inlineCommentReg,'<span class="special-comment">$1</span>');

    document.getElementById("cod").innerHTML = codeElements;
