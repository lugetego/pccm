window.addEventListener("load", (event) => {

    function temasHiddenAttrib(temas, value) {
        for (let i = 0; i < temas.length; i++) {
            temas[i].hidden = value;
        }
    }

    const temasElements = document.getElementById("temas-selectos");
    const selectElement = document.querySelector(".course-selector");

    temasElements.hidden = true;

    selectElement.addEventListener("change", (event) => {

        if(event.target.value.includes("Temas") || event.target.value.includes("Seminario")) {
            temasElements.hidden = false;
        }
        else {
            temasElements.hidden = true;
        }
    })
});




/*let elm = document.getElementById('registro_vegetariano');
document.getElementById("div_registro_vegetariano").hidden = true;
document.getElementById("div2_registro_vegetariano").hidden = false;

document.getElementById("registro_vegetariano").addEventListener(
    "click",
    () => {
        if ( elm.checked ) {
            document.getElementById("div_registro_vegetariano").hidden = false;
            document.getElementById("div2_registro_vegetariano").hidden = true;
        }
        else {
            document.getElementById("div_registro_vegetariano").hidden = true;
            document.getElementById("div2_registro_vegetariano").hidden = false;
        }
    },
    false
);*/



