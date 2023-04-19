console.log("hio"); 
function dateval(){
    console.log("hihihi");
    var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();
if (dd < 10) {
   dd = '0' + dd;
}
if (mm < 10) {
   mm = '0' + mm;
} 
today = yyyy + '-' + mm + '-' + dd;
var max= (yyyy-15)+ '-' + mm + '-' + dd;
// document.getElementById("datefield").value= max;
console.log(today);
console.log(max);
document.getElementById("datefield").setAttribute("max", max);
document.getElementById("datefield").setAttribute("value", max);
};

function checkfunc(){
let r1=document.getElementById("reason1").checked;
//  console.log(r1);
let r2=document.getElementById("reason2").checked;
//  console.log(r2);
let r3=document.getElementById("reason3").checked;
//  console.log(r3);
let r4=document.getElementById("reason4").checked;
//  console.log(r4);
console.log(r1 || r2 || r3 || r4);
if(r1 || r2 || r3 || r4){
  return true;
}
else{
  alert("Please select atleast 1 reason");
  return false;
}
}
