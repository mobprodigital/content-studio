(function () {
    var containerEl = document.querySelector('.filteringModeMulti');

    var mixer = mixitup(containerEl);


    var filterCheck = document.querySelectorAll('.filter-check');
    if (filterCheck.length > 0) {
        for (var i = 0; i < filterCheck.length; i++) {
            filterCheck[i].addEventListener('change', function () {

                valueArr = [];
                for (var j = 0; j < filterCheck.length; j++) {
                    if (filterCheck[j].checked) {
                        valueArr.push(filterCheck[j].value);
                    }
                }
                mixer.filter(valueArr.length > 0 ? valueArr.join(',') : 'all');
            });
        }
    }
}())