document.querySelector('form').addEventListener('submit', function(event) {

    // Clear previous error messages
    $('.name_feedback').text(" ");
    $('.father_feedback').text(" ");
    $('.email_feedback').text(" ");
    $('.age_feedback').text(" ");
    $('.picture_feedback').text(" ");

    // Get form values
    let name = $('.name').val();
    let fatherName = $('.father').val();
    let email = $('.email').val();
    let age = $('.age').val();
    let picture = $('.picture').val();

    // Validation flags
    let valid = true;

    // Name validation
    if (!/^[a-zA-Z\s]+$/.test(name)) {
        $('.name_feedback').text('Please enter a valid name (letters and spaces only).');
        $(".name_feedback").show()
        valid = false;
    }

    // Father's Name validation
    if (!/^[a-zA-Z\s]+$/.test(fatherName)) {
        $('.father_feedback').text('Please enter a valid fathername (letters and spaces only).');
        $(".father_feedback").show()
        valid = false;
    }

    // Email validation
    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailPattern.test(email)) {
        $('.email_feedback').text('Please enter a valid email address.');
        $(".email_feedback").show()
        valid = false;
    }

    // Age validation
    if (!/^\d+$/.test(age) || age < 1 || age > 120) {
        $('.age_feedback').text('Please enter a valid age (1-120).');
        $(".age_feedback").show()
        valid = false;
    }

     // Picture validation
     if (!/(\.jpg|\.jpeg|\.png)$/i.test(picture)) {
        $('.picture_feedback').text('Please enter a Picture ext (jpg,jpeg,png)only');
        $(".picture_feedback").show()
        valid = false;
    }
    
    if (valid) {
        console.log('Form submitted successfully!');
    }  else {
        event.preventDefault();
        console.log('Form can not submitted successfully!');
    }
   
});