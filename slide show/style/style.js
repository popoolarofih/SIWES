let slidetext = document.querySelector(".slidetext");
let container = document.querySelector(".container");
let textArray = [ "I repeat!!!! this is not a test","This is just the begining","This will end your life","Brace yourself","For the worst exprience of your life",":)"]
let imageArray = ["image/pix1.jpg","image/pix2.jpg","image/pix3.jpg","image/pix4.jpg","image/pix5.jpg","image/pix6.jpg","image/pix7.jpg","image/pix8.jpg"]
let pointerT = 0;
let pointerI = 0;
function changeText(text){
    slidetext.textContent = text;

}
function changeimage(url){
    container.style.backgroundImage = `url("${url}")`;
} 
setInterval(
    ()=>{
        if (pointerT == textArray.length) pointerT = 0;
        if (pointerI == imageArray.length) pointerI = 0;
            changeText(textArray[pointerT]);
            changeimage(imageArray[pointerI]);
            pointerT++;
            pointerI++;

       
    }, 2000
);