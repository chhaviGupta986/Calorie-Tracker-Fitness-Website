// const searchButton = document.getElementById('search-button');
// const searchInput = document.getElementById('search-input');
// searchButton.addEventListener('click', () => {
//   const inputValue = searchInput.value;
//   alert(inputValue);
// });

// function food_info(){
// var e = document.getElementById("#dropdown");
// var value = e.value;
// // var text = e.options[e.selectedIndex].text;
// // console.log(text);
// console.log(value);
//   }
var item;
var unit;
function activate(clicked_id){
  document.getElementById("dropdown").disabled=false;
  document.getElementById("qty").disabled=false;
  let btn = document.getElementById(clicked_id);
  let val = btn.value; //stores item name
  item=val;
  document.getElementById("table").hidden = true;
  document.getElementById("head").hidden = true;
  document.getElementById("back").hidden = false;
  document.getElementById("calc").hidden = false;
  document.getElementById("item_name").hidden = false;
  document.getElementById("item_name").value = val;
}

// function calories(){
//   var u = document.getElementById("dropdown");
//   var value = u.options[u.selectedIndex].value;
//   var text = u.options[u.selectedIndex].text;
//   unit=value;
//   var qty_entered = document.getElementById("qty").value;
//   console.log(qty_entered);
//   console.log(unit);
//   console.log(item);
// }
// const clearInput = () => {
//     const input = document.getElementsByTagName("input")[0];
//     input.value = "";
//   }
  
//   const clearBtn = document.getElementById("clear-btn");
//   clearBtn.addEventListener("click", clearInput);