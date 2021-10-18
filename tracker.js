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
         greeting.textContent="Good Afternoon";}
     else if (newHour< 12){
         greeting.textContent="Good Morning";
     }
     else if (newHour >=16 && newHour<23){
         greeting.textContent="Good Evening";
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
//window.alert("Welcome To My Expense Tracker Pips!!!!")
const balance = document.getElementById('balance');
const money_plus = document.getElementById('money-plus');
const money_minus = document.getElementById('money-minus');
const list = document.getElementById('list');
const form = document.getElementById('form');
const text = document.getElementById('text');
const amount = document.getElementById('amount');
const tit = document.getElementById('tit');

// const dummyTransactions = [
//   { id: 1, text: 'Flower', amount: -20 },
//   { id: 2, text: 'Salary', amount: 300 },
//   { id: 3, text: 'Book', amount: -10 },
//   { id: 4, text: 'Camera', amount: 150 }
// ];

const localStorageTransactions = JSON.parse(
  localStorage.getItem('transactions')
);

let transactions =
  localStorage.getItem('transactions') !== null ? localStorageTransactions : [];

// Add transaction
function addTransaction(e) {
  e.preventDefault();

  if (text.value.trim() === '' || amount.value.trim() === '') {
    alert('Please add a text and amount');
  } else {
    const transaction = {
      id: generateID(),
      text: text.value,
      tit: tit.value,
      amount: +amount.value
    };

    transactions.push(transaction);

    addTransactionDOM(transaction);

    // updateValues();

    updateLocalStorage();

    tit.value = '';
    text.value = '';
    amount.value = '';
  }
}

// Generate random ID
function generateID() {
  return Math.floor(Math.random() * 100000000);
}

// Add transactions to DOM list
function addTransactionDOM(transaction) {
  // Get sign
  const sign = transaction.amount < 0 ? '-' : '+';

  const item = document.createElement('li');

  // Add class based on value
  item.classList.add(transaction.amount < 0 ? 'minus' : 'plus');

  item.innerHTML = `
  ${transaction.tit } ${transaction.text} <span>${sign}${Math.abs(
    transaction.amount
  )}</span> <button class="delete-btn" onclick="removeTransaction(${
    transaction.id
  })">x</button>
  `;

  list.appendChild(item);
}

// Update the balance, income and expense
// function updateValues() {
//   const amounts = transactions.map(transaction => transaction.amount);

//   const total = amounts.reduce((acc, item) => (acc += item), 0).toFixed(2);

//   const income = amounts
//     .filter(item => item > 0)
//     .reduce((acc, item) => (acc += item), 0)
//     .toFixed(2);

//   const expense = (
//     amounts.filter(item => item < 0).reduce((acc, item) => (acc += item), 0) *
//     -1
//   ).toFixed(2);

//   balance.innerText = `#${total}`;
//   money_plus.innerText = `#${income}`;
//   money_minus.innerText = `#${expense}`;
// }

// Remove transaction by ID
function removeTransaction(id) {
  transactions = transactions.filter(transaction => transaction.id !== id);

  updateLocalStorage();

  init();
}

// Update local storage transactions
function updateLocalStorage() {
  localStorage.setItem('transactions', JSON.stringify(transactions));
}

// Init app
function init() {
  list.innerHTML = '';

  transactions.forEach(addTransactionDOM);
  updateValues();
}

init();

form.addEventListener('submit', addTransaction);
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
// bar
const bar = document.querySelector('.bar')

const display = (state) => {
  let x = state.expense

  exTotl.textContent = x.total === 0 ? `# 0.00` : ` - ${fNum(x.total)}`
  exSum.textContent = x.length == 0 ? 'No Income Yet' : `${x.length} Expense Items`


bar.innerHTML = x.list.map(li => `
    <span class='spot' style="background-color: rgb(${li.color.r}, ${li.color.g}, ${li.color.b}); width: ${li.barPercent}%"></span>
  `).join('')
}