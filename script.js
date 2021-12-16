let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');

menu.onclick = () =>{

  menu.classList.toggle('fa-times');
  navbar.classList.toggle('active');

}

window.onscroll = () =>{

  menu.classList.remove('fa-times');
  navbar.classList.remove('active');

  if(window.scrollY > 60){
    document.querySelector('#scroll-top').classList.add('active');
  }else{
    document.querySelector('#scroll-top').classList.remove('active');
  }

}

function loader(){
  document.querySelector('.loader-container').classList.add('fade-out');
}

function fadeOut(){
  setInterval(loader, 3000);
}

window.onload = fadeOut();

// qoutes
let slidetext = document.querySelector(".row");
let textArray = [ "A healthy, balanced diet can be based on local eating patterns, using locally available foods and respecting local eating customs",
" Snacks are recommended for people with high needs for food energy and nutrients and for people who may not be able to eat enough food at one time to meet their needs, such as small children or people who are ill",
" Most vegetables are low in calories and fat",
"Legumes are low in fat",
" Eating whole grains as a single food (such as brown rice and oatmeal) or as an ingredient in foods may reduce the risk of certain heart diseases. ",
" People who may need to reduce their fat and calorie intake can select lower-fat varieties which still provide other important nutrients.  People who may need to reduce their fat and calorie intake can select lower-fat varieties which still provide other important nutrients.",
" A good meal is a combination of different foods containing carbohydrates, protein, fats, vitamins and minerals",
"Meeting our body’s nutritional needs should be an important reason for our food choice",
" With careful food selection, a person can obtain all the nutrients they need while enjoying a variety of foods and still maintain a healthy body weigh",
"Making good meals begins with good planning and good food shopping"]
let pointerT = 0;

function changeText(text){
    slidetext.textContent = text;
}

setInterval(
    ()=>{
        if (pointerT == textArray.length) pointerT = 0;
            changeText(textArray[pointerT]);
            pointerT++;
    }, 8000
);

