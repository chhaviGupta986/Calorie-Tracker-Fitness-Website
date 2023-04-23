// var item;
// var unit;
function activate(clicked_id){
  // document.getElementById("dropdown").hidden=false;
  document.getElementById("qty").disabled=false;
  let btn = document.getElementById(clicked_id);
  let val = btn.value; //stores item name
  // item=val;
  let btn1=document.getElementById(-(clicked_id));
  let val1=btn1.value;
  document.getElementById("table").hidden = true;
  document.getElementById("head").hidden = true;
  document.getElementById("back").hidden = false;
  document.getElementById("calc").hidden = false;
  document.getElementById("item_name").hidden = false;
  document.getElementById("item_name").value = val;
  // document.getElementById("dropdown").hidden = false;
  // document.getElementById("dropdown").value = val1;
  // document.getElementsByClassName("dropdown1").value = val1;
  const collection = document.getElementsByClassName("dropdown1");
  for (let i = 0; i < collection.length; i++) {
  collection[i].value = val1;
}
}
