let codeElements = document.getElementById("cod");
console.log(codeElements);
//TODO: solve multiline comments

    const singleQuotesReg = /'(.*?)'/g,
    doubleQuotesReg = /"(.*?)"/g,
    specialReg = /\b(assert|break|byte|case|catch|const|continue|default|do|else|enum|extends|final|finally|for|goto|if|implements|import|instanceof|interface|while)(?=[^\w])/g,
    modifiersReg = /\b(abstract|private|public|protected)/g,
    variableTypeReg = /\b(main|boolean|char|double|float|int|native|string|true|root|new|args)(?=[^\w])/g,
    functionsReg = /\b(out|in|println|printer)/g,
    //specialCommentReg = /\/\*(\*(?!\/)|[^*])*\*\//g,
    inlineCommentReg = /(\/\/.*)/g,
    sqlReg = /\b(CREATE|ALL|DATABASE|TABLE|GRANT|PRIVILEGES|IDENTIFIED|FLUSH|SELECT|UPDATE|DELETE|INSERT|FROM|WHERE|ORDER|BY|GROUP|LIMIT|INNER|OUTER|AS|ON|COUNT|CASE|TO|IF|WHEN|BETWEEN|AND|OR)(?=[^\w])/g;


    codeElements = codeElements.innerHTML;
    codeElements = codeElements.replace(doubleQuotesReg,'<span id="quotes">"$1"</span>');
    codeElements = codeElements.replace(singleQuotesReg, "<span id=\"quotes\">'$1'</span>");
    codeElements = codeElements.replace(specialReg,'<span id="special-C">$1</span>');
    codeElements = codeElements.replace(modifiersReg,'<span id="special-Java">$1</span>');
    codeElements = codeElements.replace(variableTypeReg,'<span id="variables">$1</span>');
    codeElements = codeElements.replace(functionsReg, '<span id="Cfunctions">$1</span>');
    codeElements = codeElements.replace(sqlReg,'<span id="special-sql">$1</span>');
    //codeElements = codeElements.replace(specialCommentReg,'<span id="special-comment">$1</span>');
    codeElements = codeElements.replace(inlineCommentReg,'<span id="special-comment">$1</span>');

    document.getElementById("cod").innerHTML = codeElements;
