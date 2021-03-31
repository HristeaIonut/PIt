function myFunction() {
    const x = document.getElementById("insert-label");
    const y = document.getElementById("field-password");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "block";
    } else {
        x.style.display = "none";
        y.style.display = "none";
    }
}