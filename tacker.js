let time = document.querySelector(".time"),
    greeting = document.querySelector(".greeting");
    function addZeros(value){
      return value<10 ? `0${value}` : value;
  }
  setInterval(function(){
      let Mydate = new Date(),
      hours = Mydate.getHours(),
      ampm = hours >= 12 ? "PM" : "AM",
      minut=Mydate.getMinutes(),
      seconds=Mydate.getSeconds();
      hours=hours>12 ? Mydate.getHours() % 12 : hours;
      time.textContent=`${addZeros(hours)}:${minut}:${addZeros (seconds)} ${ampm}`;
      let newHour = Mydate.getHours();
  
     if(newHour >=12 && newHour <16){
         greeting.textContent="GOOD AFTERNOON";}
     else if (newHour< 12){
         greeting.textContent="GOOD MORNING";
     }
     else if (newHour >=16 && newHour<23){
         greeting.textContent="GOOD EVENING";
     }
  },1000)
  const dayNumber = new Date().getDate();
    const year = new Date().getFullYear();
    const dayName = new Date().toLocaleString("default", {weekday: "long"});
    const monthName = new Date().toLocaleString("default", {month: "long"});

    document.querySelector(".month-name").innerHTML = monthName;
    document.querySelector(".day-name").innerHTML = dayName;
    document.querySelector(".date-number").innerHTML = dayNumber;
    document.querySelector(".year").innerHTML = year;

// qoutes
let slidetext = document.querySelector(".slidetext");
let textArray = [ "Too many people spend money they earned..to buy things they don’t want..to impress people that they don’t like. –Will Rogers","A wise person should have money in their head, but not in their heart. –Jonathan Swift","Wealth consists not in having great possessions, but in having few wants. –Epictetus","Money often costs too much. –Ralph Waldo Emerson","An investment in knowledge pays the best interest. –Benjamin Franklin","Money is only a tool. It will take you wherever you wish, but it will not replace you as the driver. –Ayn Rand"]
let pointerT = 0;

function changeText(text){
    slidetext.textContent = text;
}

setInterval(
    ()=>{
        if (pointerT == textArray.length) pointerT = 0;
            changeText(textArray[pointerT]);
            pointerT++;
    }, 5000
);