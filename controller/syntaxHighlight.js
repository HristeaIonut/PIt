let codeElements = document.getElementById("cod");
console.log(codeElements);

const strReg1 = /"(.*?)"/g,
    strReg2 = /'(.*?)'/g,
    specialReg = /\b(new|var|if|do|function|while|switch|for|foreach|in|continue|break)(?=[^\w])/g,
    specialJsGlobReg = /\b(document|window|Array|String|Object|Number|\$)(?=[^\w])/g,
    specialJsReg = /\b(getElementsBy(TagName|ClassName|Name)|getElementById|typeof|instanceof|return)(?=[^\w])/g,
    specialMethReg = /\b(indexOf|match|replace|toString|length)(?=[^\w])/g,
    specialPhpReg = /\b(define|echo|print_r|var_dump)(?=[^\w])/g,
    specialCommentReg = /(\/\*.*\*\/)/g,
    inlineCommentReg = /(\/\/.*)/g;

const htmlTagReg = /(&lt;[^\&]*&gt;)/g;

const sqlReg = /\b(CREATE|ALL|DATABASE|TABLE|GRANT|PRIVILEGES|IDENTIFIED|FLUSH|SELECT|UPDATE|DELETE|INSERT|FROM|WHERE|ORDER|BY|GROUP|LIMIT|INNER|OUTER|AS|ON|COUNT|CASE|TO|IF|WHEN|BETWEEN|AND|OR)(?=[^\w])/g;
    codeElements = codeElements.innerHTML;
    codeElements = codeElements.replace(strReg1, '<span class="string">"$1"</span>');
    codeElements = codeElements.replace(strReg2,"<span class=\"string\">'$1'</span>");
    codeElements = codeElements.replace(specialReg,'<span class="special">$1</span>');
    codeElements = codeElements.replace(specialJsGlobReg,'<span class="special-js-glob">$1</span>');
    codeElements = codeElements.replace(specialJsReg,'<span class="special-js">$1</span>');
    codeElements = codeElements.replace(specialMethReg,'<span class="special-js-meth">$1</span>');
    codeElements = codeElements.replace(htmlTagReg,'<span class="special-html">$1</span>');
    codeElements = codeElements.replace(sqlReg,'<span class="special-sql">$1</span>');
    codeElements = codeElements.replace(specialPhpReg,'<span class="special-php">$1</span>');
    codeElements = codeElements.replace(specialCommentReg,'<span class="special-comment">$1</span>');
    codeElements = codeElements.replace(inlineCommentReg,'<span class="special-comment">$1</span>');

    document.getElementById("cod").innerHTML = codeElements;
