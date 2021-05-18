let codeElements = document.getElementById("cod");
console.log(codeElements);

const htmlTagReg = /(&lt;[^\&]*&gt;)/g,
specialReg = /\b(class|src|href|charset|http-equiv|content|name|role|typeof|property|title)(?=[^\w])/g;

    codeElements = codeElements.innerHTML;
    
    codeElements = codeElements.replace(htmlTagReg,'<span id="special-html">$1</span>');
    codeElements = codeElements.replace(specialReg,'<span id="quotes">$1</span>');

    document.getElementById("cod").innerHTML = codeElements;
