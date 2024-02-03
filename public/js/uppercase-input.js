$(document).ready(function () {
    $(document).on('input', '.form-control', function (e) {
        let el = e.target;

        setTimeout(function () {
            let inputValue = el.value.toUpperCase();
            if (inputValue !== el.value) {
                el.value = inputValue;
            }
        }, 0);
    });

})