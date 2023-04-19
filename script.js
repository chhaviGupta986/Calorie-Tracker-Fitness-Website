
function validateForm() {
  // Get the value of the input field with id="email"
  var email = document.getElementById("email").value;
  // Get the value of the input field with id="password"
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  // Regular expression to check if the email is in the correct format
  var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  var usernameRegex = /^[A-Za-z][A-Za-z0-9_]{4,14}$/;
  // var usernameRegex = /^[A-Za-z]\w{4,14}$/;
  var passwordRegex = /^(?=.*\d)(?=.*[!@#$%^&*_])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;


  // Check if the email is empty
  if (username.length < 5 || username.length > 15) {
    alert("Username must be between 5 to 15 characters.");
    return false;
  }
  if (!username.match(usernameRegex)) {
    alert("Username must begin with an alphabet and contain only alphanumeric characters and/or underscores");
    return false;
  }
  if (email == "") {
    alert("Email field must be filled out.");
    return false;
  }
  // Check if the email is in the correct format
  if (!email.match(emailRegex)) {
    alert("Please enter a valid email addres.s");
    return false;
  }
  // if (password == "") {
  //   alert("Password field must be filled out");
  //   return false;
  // }
  if (!password.match(passwordRegex)) {
    alert("Password must contain min 8 letters, at least 1 symbol, upper & lower case letters & a number.");
    return false;
  }

  // Check if the password is empty

  // Send a request to the server to check the user's credentials
  // If the credentials are correct, return true to submit the form
  // If the credentials are incorrect, display an error message and return false to prevent the form from being submitted
  return true;

}