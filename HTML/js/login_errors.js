function show_login_error(div,error) {
// Display error message
  label = '<label style="color:red;">' + error + "</label>";
  $(div).append(label);
}

function set_value_from_post(input,input_value) {
  // update login form (inputs)
    $(input).val(input_value);
}

function set_checkbox_from_post(input,input_value) {
  // update login form (inputs)
  if (input_value) {
    $('input[name=recordarme]').prop('checked', true);
  } else {
    $('input[name=recordarme]').prop('checked', false);
  }
}
