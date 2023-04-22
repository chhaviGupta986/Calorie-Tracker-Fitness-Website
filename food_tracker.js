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
