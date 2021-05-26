let codeElements = document.getElementById("cod");
console.log(codeElements);

const strReg1 = /"(.*?)"/g,
    strReg2 = /'(.*?)'/g,
    specialReg = /\b(new|if|do|function|while|switch|for|foreach|in|continue|break)(?=[^\w])/g,
    specialJsGlobReg = /\b(document|window|Array|quotes|Object|Number|\$)(?=[^\w])/g,
    specialJsReg = /\b(getElementsBy(TagName|ClassName|Name)|getElementById|typeof|instanceof|return|const|var)(?=[^\w])/g,
    specialMathReg = /\b(indexOf|match|replace|toquotes|length)(?=[^\w])/g,
    specialPhpReg = /\b(define|echo|print_r|var_dump)(?=[^\w])/g,
    //match all special comments
    specialCommentReg = /\*.*\*/g,
    //match all inline comments
    inlineCommentReg = /(\/\/.*)/g;

const htmlTagReg = /(&lt;[^\&]*&gt;)/g;

const sqlReg = /\b(CREATE|ALL|DATABASE|TABLE|GRANT|PRIVILEGES|IDENTIFIED|FLUSH|SELECT|UPDATE|DELETE|INSERT|FROM|WHERE|ORDER|BY|GROUP|LIMIT|INNER|OUTER|AS|ON|COUNT|CASE|TO|IF|WHEN|BETWEEN|AND|OR)(?=[^\w])/g;
    codeElements = codeElements.innerHTML;
    codeElements = codeElements.replace(strReg1, '<span id="quotes">"$1"</span>');
    codeElements = codeElements.replace(strReg2,"<span id=\"quotes\">'$1'</span>");
    codeElements = codeElements.replace(specialReg,'<span id="special">$1</span>');
    codeElements = codeElements.replace(specialJsGlobReg,'<span id="special-js-glob">$1</span>');
    codeElements = codeElements.replace(specialJsReg,'<span id="special-js">$1</span>');
    codeElements = codeElements.replace(specialMathReg,'<span id="special-js-meth">$1</span>');
    codeElements = codeElements.replace(htmlTagReg,'<span id="special-html">$1</span>');
    codeElements = codeElements.replace(sqlReg,'<span id="special-sql">$1</span>');
    codeElements = codeElements.replace(specialPhpReg,'<span id="special-php">$1</span>');
    codeElements = codeElements.replace(specialCommentReg,'<span id="special-comment">$1</span>');
    codeElements = codeElements.replace(inlineCommentReg,'<span id="special-comment">$1</span>');

    document.getElementById("cod").innerHTML = codeElements;
