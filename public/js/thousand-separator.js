$(document).ready(function () {

    $(document).on('input', '.thousand-separator', function (e) {
        // Remove non-numeric characters except for dots and commas
        let cleanedValue = $(this).val().replace(/[^0-9.,]/g, '');

        // Replace commas with an empty string to get the numeric value
        let numericValue = parseFloat(cleanedValue.replace(/,/g, ''));

        // Check if the numeric value is a valid number
        if (!isNaN(numericValue)) {
            // Update the input field with the formatted value
            $(this).val(numericValue.toLocaleString('en'));

            // Output the real integer value to the console
            console.log(parseInt(cleanedValue.replace(/,/g, ''), 10));
        } else {
            // If the input is not a valid number, you can handle it as needed
            // For example, you may choose to clear the input field or display an error message
            $(this).val('');
            console.log('Invalid input');
        }
    });




});