// function onSignIn(googleUser) {
//   var profile = googleUser.getBasicProfile();
//   $("#name").text(profile.getName());
//   $("#email").text(profile.getEmail());
//   $("#image").attr('src',profile.getImageUrl());
// }
console.log("UMMMMM 1");
function onSignIn(googleUser){
  console.log("Helllolol");
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
    var profile = googleUser.getBasicProfile();
  $("#name").text(profile.getName());
//   $("#name").hi;
  $("#email").text(profile.getEmail());
  $("#image").attr('src',profile.getImageUrl());
  $(".data").css("display","block");
}
console.log("UMMMMM 2");
// console.log("UMMMMM 3");
