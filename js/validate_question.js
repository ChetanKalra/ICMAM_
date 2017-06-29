

$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='Answer']").validate({
    // Specify validation rules
    rules: {

      value: "required",
    },
    
    messages: {

      value: "This field is required",
      
    },
    
    submitHandler: function(form) {
      form.submit();
    }
  });
});