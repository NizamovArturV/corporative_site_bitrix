// $(document).on('click', '.filter-selector__wrap', function (e){//     let input = e.target.closest('.filter-selector__wrap').firstElementChild////     let value = e.target.dataset.value;//     if (value) {//         input.value = value//     }// })//Выбрать все$(document).on('change', '.all_select', function () {    let checkboxes = $(this).closest('.filter-selector__hidden').find('input'),        checkedAll = this.checked;    for (var i = 0; i < checkboxes.length; i++) {        checkboxes[i].checked = checkedAll;    }})//Сбросить$(document).on('click', '.filter-selector__buttons-remove', function () {    let checkboxes = $(this).closest('.filter-selector__wrap').find('.filter-selector__hidden').find('input');    for (var i = 0; i < checkboxes.length; i++) {        checkboxes[i].checked = false;    }    $(this).closest('.filter-selector__wrap').find('.all').text('Выбрано (0)')})//Сколько выбрано$(document).on('change', '.filter-selector__hidden input', function () {    let checkboxes = $(this).closest('.filter-selector__hidden').find('input');    let count = 0;    if (checkboxes[0].checked) {        count = checkboxes.length - 1;    } else {        for (var i = 0; i < checkboxes.length; i++) {            if (checkboxes[i].checked) {                count++;            }        }    }    $(this).closest('.filter-selector__wrap').find('.all').text('Выбрано (' + count + ')')})$(document).on('click', '.filter-selector__buttons-hide', function (){        $(this).closest('.filter-selector__wrap').find('.filter-selector__btn-show').removeClass('active')})$(document).on('click', '.filter-selector__btn-show', function (){        $(this).closest('form').submit();})$(document).on('click', '.sorting__hidden', function (e){    let select = e.target;    let sortBy = select.dataset.sort;    let sortOrder = select.dataset.order;    if (sortBy) {        $('#SORT_BY').val(sortBy);        $('#SORT_ORDER').val(sortOrder);        $('.filter').submit();    }})var rangeSlider = document.getElementById('range-slider');if (rangeSlider) {    const inputMinTrue = document.getElementById('priceMinTrue')    const inputMaxTrue = document.getElementById('priceMaxTrue')    const inputsTrue = [inputMinTrue, inputMaxTrue]    rangeSlider.noUiSlider.on('update', function (values, handle) {        inputsTrue[handle].value = values[handle].replace(/[^0-9]/g, '')    })}var rangeSliderHours = document.getElementById('range-slider-hours');if (rangeSliderHours) {    const inputMinTrueHour = document.getElementById('hourMinTrue')    const inputMaxTrueHour = document.getElementById('hourMaxTrue')    const inputsTrueHour = [inputMinTrueHour, inputMaxTrueHour]    rangeSliderHours.noUiSlider.on('update', function (values, handle) {        inputsTrueHour[handle].value = values[handle].replace(/[^0-9]/g, '')        console.log(inputsTrueHour[handle].value)    })}// $(document).on('click' , '.about-program__btn', function () {//     $('.b24-widget-button-icon-container').click();//     var openChat = function (){//         console.log(123)//         console.log($('.b24-widget-button-openline_livechat'))//         $('.b24-widget-button-openline_livechat').click();//     }//     setTimeout(openChat, 2500)//// })// $(document).on('click', '.btn_purple', function () {//     console.log(this.closest('.about-program__btn'))//     if (this.innerText === 'Оформить') {//         $('.b24-widget-button-icon-container').click();//     }// })$(document).on('click', '.about-program__btn', function () {    $('.b24-widget-button-icon-container').click();})$(document).on('click', '.cookie__btn', function () {    $.ajax({        url: '/api/setCookie.php',        type:     "POST",        dataType: "json",        data: {agree: 'Y'},        success: function(response) {            if (response.status === 'success') {                $('.cookie').removeClass('active');            }        },        error: function(response) { // Данные не отправлены            // console.log(response)        }    });})$(document).on('change', '.js-search-input', function () {    $('#search').val(this.value)})