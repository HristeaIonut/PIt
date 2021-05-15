let codeElements = document.getElementById("cod");
console.log(codeElements);

const htmlTagReg = /(&lt;[^\&]*&gt;)/g;

    codeElements = codeElements.innerHTML;
    codeElements = codeElements.replace(htmlTagReg,'<span class="special-html">$1</span>');

    document.getElementById("cod").innerHTML = codeElements;
