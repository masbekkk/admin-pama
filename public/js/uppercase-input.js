$(document).ready(function () {
    $(document).on('input', '.form-control', function (e) {
        let el = e.target;

        if (el.tagName.toLowerCase() !== 'select') {
            setTimeout(function() {
                let inputValue = el.value.toUpperCase();
                if (inputValue !== el.value) {
                    el.value = inputValue;
                }
            }, 0);
        }
    });

})