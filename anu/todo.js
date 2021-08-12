let id = 0;
let time = document.querySelector(".time"),
    greeting = document.querySelector(".greeting"),
    task = document.querySelector(".task"),
    tasks_container = document.querySelector(".tasks-container"),
    view_container = document.querySelector(".view-container"),
    add_container = document.querySelector(".add-container");
    
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
       greeting.textContent="Good Afternoon";}
   else if (newHour< 12){
       greeting.textContent="Good Morning";
   }
   else if (newHour >=16 && newHour<23){
       greeting.textContent="Good Evening";
   }
},1000)

function add_task(){
add_container.style.display="block";
}
function close_add(){
    add_container.style.display="none";
}
let tasks=[];
function save_task(){
 id++;
 let dummy_array = [id, task.value];
 tasks.push(dummy_array);
 console.log(tasks)
 
}
function view_task(){
    view_container.style.display="block";
    if(tasks.length == 0){
        tasks_container.innerHTML+="<span>There are no task yet</span>";
    }else{
        tasks_container.innerHTML="";
        for(let i = 0; i < tasks.length; i++){
            tasks_container.innerHTML+=`<div class='.task'><span>${tasks[i][1]}</span><button onclick="delete_task(${tasks[i][0]})">Delete</button></div>`;
        }
}
function close_view(){
    view_container.style.display="none";
}
}
function delete_task(id){
    tasks_container.innerHTML="";
    tasks = tasks.filter(task => task[0] != id);
    tasks.forEach(
        task => {
            tasks_container.innerHTML+=`<div class='.task'><span>${task[1]}</span><button onclick="delete_task(${task[0]})">Delete</button></div>`;

        }
    )
    
}
