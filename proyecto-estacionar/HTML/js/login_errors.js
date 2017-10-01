function set_login_error(div,error,input,input_value) {

// Display error message
  label = '<label style="color:red;">' + error + "</label>";
  $(div).append(label);

// update login form (inputs)
  $(input).val(input_value);
}
