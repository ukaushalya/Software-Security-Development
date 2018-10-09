//User validation method
function User_Validation() {
  var name = document.forms["loginForm"]["user_name"].value;
  var password = document.forms["loginForm"]["p_word"].value;

  if (name != "Udeshika"  || password != "123"){
    alert("Incorrect username or password");
    return false;
  }
}
