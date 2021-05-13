let codeElements = document.getElementById("cod");
console.log(codeElements);
//TODO: solve multiline comments

    //const singleQuotesReg = /'(.*?)'/g,
    doubleQuotesReg = /"(.*?)"/g;
    specialReg = /\b(assert|break|byte|case|catch|const|continue|default|do|else|enum|extends|final|finally|for|goto|if|implements|import|instanceof|interface|while)(?=[^\w])/g,
    modifiersReg = /\b(abstract|private|public|protected)/g,
    variableTypeReg = /\b(main|boolean|char|double|float|int|native|String|true|root|new|args)(?=[^\w])/g,
    functionsReg = /\b(out|in|println|printer)/g,
    //specialCommentReg = /\/\*(\*(?!\/)|[^*])*\*\//g,
    inlineCommentReg = /(\/\/.*)/g,
    sqlReg = /\b(CREATE|ALL|DATABASE|TABLE|GRANT|PRIVILEGES|IDENTIFIED|FLUSH|SELECT|UPDATE|DELETE|INSERT|FROM|WHERE|ORDER|BY|GROUP|LIMIT|INNER|OUTER|AS|ON|COUNT|CASE|TO|IF|WHEN|BETWEEN|AND|OR)(?=[^\w])/g;


    codeElements = codeElements.innerHTML;
    codeElements = codeElements.replace(doubleQuotesReg,'<span class="string">"$1"</span>');
    codeElements = codeElements.replace(singleQuotesReg, "<span class=\"string\">'$1'</span>");
    codeElements = codeElements.replace(specialReg,'<span class="special-C">$1</span>');
    codeElements = codeElements.replace(modifiersReg,'<span class="special-Java">$1</span>');
    codeElements = codeElements.replace(variableTypeReg,'<span class="variables">$1</span>');
    codeElements = codeElements.replace(functionsReg, '<span class="Cfunctions">$1</span>');
    codeElements = codeElements.replace(sqlReg,'<span class="special-sql">$1</span>');
    //codeElements = codeElements.replace(specialCommentReg,'<span class="special-comment">$1</span>');
    codeElements = codeElements.replace(inlineCommentReg,'<span class="special-comment">$1</span>');

    document.getElementById("cod").innerHTML = codeElements;
