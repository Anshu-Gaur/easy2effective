const services = [
    "all in one platform services like:-",
    "insurance",
    "property dealer",
    "travel assistance"
];

let index = 0;
let charIndex = 0;
let currentText = "";
let isDeleting = false;

function typeEffect(){
    currentText = services[index];

    if(isDeleting){
        charIndex--;
        if(charIndex === 0){
            isDeleting = false;
            index = (index + 1) % services.length;
        }
    } else {
        charIndex++;
        if(charIndex === currentText.length){
            isDeleting = true;
            setTimeout(typeEffect, 1200);
            return;
        }
    }
    document.getElementById("typed").innerText = currentText.substring(0, charIndex+1);
    setTimeout(typeEffect, isDeleting ? 40 : 90);
}
typeEffect();