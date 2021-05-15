let codeElements = document.getElementById("cod");
console.log(codeElements);

    const singleQuotesReg = /'(.*?)'/g,
    doubleQuotesReg = /"(.*?)"/g;
    specialReg = /\b(active|checked|default|disabled|empty|enabled|first|child|focus|link|not|only|root|target|valid|visited)(?=[^\w])/g,
    variableTypeReg = /\b(color|style|margin|padding|font|family|size|weight|height|width|background|border|radius|left|right|align|hover|display|bottom|center|align|text|header|footer|box)(?=[^\w])/g,
    otherReg = /\b(px|solid|none|pointer|input|rgb)/g,
    specialCommentReg = /\/\*(\*(?!\/)|[^*])*\*\//g,
    inlineCommentReg = /(\/\/.*)/g;


    codeElements = codeElements.innerHTML;
    codeElements = codeElements.replace(doubleQuotesReg,'<span class="string">"$1"</span>');
    codeElements = codeElements.replace(singleQuotesReg, "<span class=\"string\">'$1'</span>");
    codeElements = codeElements.replace(specialReg,'<span class="special-C">$1</span>');
    codeElements = codeElements.replace(variableTypeReg,'<span class="variables">$1</span>');
    codeElements = codeElements.replace(otherReg,'<span class="special-C">$1</span>');
    codeElements = codeElements.replace(specialCommentReg,'<span class="special-comment">$1</span>');
    codeElements = codeElements.replace(inlineCommentReg,'<span class="special-comment">$1</span>');

    document.getElementById("cod").innerHTML = codeElements;
