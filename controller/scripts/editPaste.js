function mySwitch() {
    const nonEditable = document.getElementById("cod");
    const editable = document.getElementById("edit");
    const button = document.getElementById("submit")
    const checkBox = document.getElementById("Checkbox");
    if(checkBox.checked == true){
        nonEditable.style.display = "none";
        editable.style.display = "block";
        button.style.display = "block";
    }
    else{
        console.log("pere");
        nonEditable.style.display = "block";
        editable.style.display = "none";
        button.style.display = "none";
    }
}