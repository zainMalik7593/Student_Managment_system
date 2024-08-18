document.querySelector('form').addEventListener('submit', function(event) {

    // Clear previous error messages
    document.querySelector('.name_feedback').textContent = '';
    document.querySelector('.father_feedback').textContent = '';
    document.querySelector('.email_feedback').textContent = '';
    document.querySelector('.age_feedback').textContent = '';
    document.querySelector('.picture_feedback').textContent = '';

    // Get form values
    var name = document.querySelector('.name').value;
    var fatherName = document.querySelector('.father').value;
    var email = document.querySelector('.email').value;
    var age = document.querySelector('.age').value;
    var picture = document.querySelector('.picture').value;

    // Validation flags
    var valid = true;

    // Name validation
    if (!/^[a-zA-Z\s]+$/.test(name)) {
        document.querySelector('.name_feedback').textContent = 'Please enter a valid name (letters and spaces only).';
        $(".name_feedback").show()
        valid = false;
    }

    // Father's Name validation
    if (!/^[a-zA-Z\s]+$/.test(fatherName)) {
        document.querySelector('.father_feedback').textContent = 'Please enter a valid father\'s name (letters and spaces only).';
        $(".father_feedback").show()
        valid = false;
    }

    // Email validation
    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailPattern.test(email)) {
        let emaill = document.querySelector('.email_feedback').textContent = 'Please enter a valid email address.';
        $(".email_feedback").show()
        valid = false;
    }

    // Age validation
    if (!/^\d+$/.test(age) || age < 1 || age > 120) {
        document.querySelector('.age_feedback').textContent = 'Please enter a valid age (1-120).';
        $(".age_feedback").show()
        valid = false;
    }
    
    if (valid) {
        console.log('Form submitted successfully!');
    }  else {
        event.preventDefault();
        console.log('Form can not submitted successfully!');
    }
});