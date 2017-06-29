// Wait for the DOM to be ready
// $.validator.addMethod('mypassword', function(value, element) {
//         return this.optional(element) || (value.match(/[a-z]/) && value.match(/[0-9]/) && value.match(/[A-Z]/));
//     },
//     'Password must contain at least one numeric, lowercase and uppercase');


// $.validator.addMethod('nodigits', function(value, element) {
//         // return this.optional(element) || (value.match(/^[a-z]/) || value.match(/[A-Z]/));
//         return this.optional(element) || (value.match(/^([^0-9]*)$/));
        
//     },	
//     'Password must contain only characters');


$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='Question']").validate({
    // Specify validation rules
    rules: {

      Question: "required",
      
      Option_1: {
      	required:true,
      },

      Option_2: {
      	required: true,
      },

      Option_3: {
        required: true,
      },

      Option_4: {
        required: true,
      },

      Answer: {
        required: true,
        number: true,
        range:[1,4]

      }
    },
    
    messages: {

      Question: "This field is required",
      
      Answer: {
        number: "Please enter a valid number",
        range: "Invalid Number [1-4]",
        required: "This field is required"
      }
      
    },
    
    submitHandler: function(form) {
      form.submit();
    }
  });
});