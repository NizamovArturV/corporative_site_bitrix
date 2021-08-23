new WOW().init();
/* Удаление id disable_transition для загрузки всех анимаций */
$(window).on('load', function () {
    $("body").removeAttr("id");
});

// if ($('.main')) {
//     $(".main").onepage_scroll();
// }

/* Маска на поле ввода телефона */
if ($("input").is("#phone")) {
    $("#phone").click(function () {
        $(this).setCursorPosition(3)
    }).mask("+7(999) 999-9999", { autoclear: false })
}

if ($("input").is("#phone1")) {
    $("#phone1").click(function () {
        $(this).setCursorPosition(3)
    }).mask("+7(999) 999-9999", { autoclear: false })
}

/* Маска на поле ввода e-mail */
if ($("input").is("#email")) {
    $("#email").blur(function () {

        var email = $(this).val(); // Получаем e-mail пользователя
        var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;

        if (pattern.test(email)) {
            (this).classList.add('valid')
        } else {
            (this).classList.remove('valid')
        }
    })
}

if ($("input").is("#email1")) {
    $("#email1").blur(function () {

        var email = $(this).val(); // Получаем e-mail пользователя
        var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;

        if (pattern.test(email)) {
            (this).classList.add('valid')
        } else {
            (this).classList.remove('valid')
        }
    })
}

$(document).ready(function () {
    $('.js-menu-btn').on('click', function () {
        $(this).toggleClass('active')
        $('.js-menu').toggleClass('active')
        $('body').toggleClass('no-scroll')
    })

    $('.question-form__field-wrap input').filter(function () {
        return this.value.length !== 0;
    }).closest('.question-form__field').addClass('change')
});


$(document).on('input', '.question-form__field-wrap input', function () {
    if (this.value !== '') {
        this.parentElement.classList.add('change')
    } else {
        this.parentElement.classList.remove('change')
    }
})


let phone = document.querySelector('#phone')
if (phone) {
    phone.addEventListener('blur', function () {

        if (this.value !== '') {
            phone.parentElement.classList.add('change')
        } else {
            phone.parentElement.classList.remove('change')
        }
    })
}

let phone1 = document.querySelector('#phone1')
if (phone1) {
    phone.addEventListener('blur', function () {

        if (this.value !== '') {
            phone.parentElement.classList.add('change')
        } else {
            phone.parentElement.classList.remove('change')
        }
    })
}

$(document).ready(function () {

    let name = $('.slide__description .slide-link')
    let title = document.querySelector('.slide__description .slide__description-title')
    let subtitle = document.querySelector('.slide__description p')
    let srcAnchor = document.querySelector('.slide__description a')
    let linkImage = document.querySelector('.slide__image img')

    function createElementPagination(parent) {
        let newDiv = document.createElement('div')

        let img = $('.slide__image img')[0].src
        let link = $('.slide-link')[0].href

        newDiv.classList.add('slide__button-wrap')
        newDiv.innerHTML = `
            <a href="javascript:void(0)" 
               class="slide__button"
               data-subtitle="${subtitle.innerHTML}"
               data-link="${link}" 
               data-img="${img}"
               data-name="${name[0].innerHTML}"
            >
                <div class="slide-hidden">
                    ${title.innerHTML}
                </div>
                ${name[0].innerHTML}
            </a>
        `
        parent.append(newDiv)
    }

    $(document).on('click', '.slide__button-wrap', function () {

        // передаем href
        srcAnchor.setAttribute('href', this.children[0].dataset.link)
        // передаем название кнопки
        name[0].innerHTML = this.children[0].dataset.name
        // передаем заголовок
        title.innerHTML = this.children[0].querySelector('.slide-hidden').innerHTML
        // передаем описание
        subtitle.innerHTML = this.children[0].dataset.subtitle
        // передаем урл изображения
        linkImage.setAttribute('src', this.children[0].dataset.img)

        //Удаляем элемент на который нажали
        this.remove()

        // Создаем новый элемент в конце списка (данные добавляются в функции createElementPagination)
        createElementPagination(document.querySelector('.slide__buttons'))
    })

});

document.querySelectorAll('.about-program__row').forEach(item => {
    item.addEventListener('click', function () {
        item.classList.toggle('active')
    })
})

let filter = document.querySelectorAll('.filter-selector')
filter.forEach(item => {
    item.addEventListener('click', function () {
        item.parentElement.classList.toggle('active')
    })
})


let filterWrap1 = document.querySelector('#filterWrap1')
let filterWrap2 = document.querySelector('#filterWrap2')

if ((filterWrap1) || (filterWrap2)) {

    filterWrap1.addEventListener('click', function (e) {
        if (e.target.classList.contains('filter-selector__field')) {
            filterWrap1.querySelector('.filter-selector').innerText = e.target.innerText
            this.classList.remove('active')
        }
    })

    filterWrap2.addEventListener('click', function (e) {
        if (e.target.classList.contains('filter-selector__field')) {
            filterWrap2.querySelector('.filter-selector').innerText = e.target.innerText
            this.classList.remove('active')
        }
    })

    if ($('#filterWrap1').not('.active')) {
        console.log('321');
    }

    let timeout1;
    let counter1 = 0;
    document.querySelectorAll('.js-filterWrap1 input').forEach(input => {
        input.addEventListener('click', function () {

            $('#filterWrap1 .filter-selector__btn-show').removeClass('active')

            if ($(this).is(':checked')) {
                counter1++;

                if (counter1 > 0) {
                    $('#filterWrap1 .filter-selector__buttons-remove').addClass('active')
                }
                $('#filterWrap1 .filter-selector__btn-show').addClass('active')
            } else {
                counter1--;

                if (counter1 < 1) {
                    $('#filterWrap1 .filter-selector__buttons-remove').removeClass('active')
                }
            }

            clearTimeout(timeout1)
            timeout1 = setTimeout(() => {
                $('#filterWrap1 .filter-selector__btn-show').removeClass('active')
            }, 4000)
        })
    })

    let timeout2;
    let counter2 = 0;
    document.querySelectorAll('.js-filterWrap2 input').forEach(input => {
        input.addEventListener('click', function () {
            $('#filterWrap2 .filter-selector__btn-show').removeClass('active')

            if ($(this).is(':checked')) {
                counter2++;

                if (counter2 > 0) {
                    $('#filterWrap2 .filter-selector__buttons-remove').addClass('active')
                }
                $('#filterWrap2 .filter-selector__btn-show').addClass('active')
            } else {
                counter2--;

                if (counter2 < 1) {
                    $('#filterWrap2 .filter-selector__buttons-remove').removeClass('active')
                }
            }

            clearTimeout(timeout2)
            timeout2 = setTimeout(() => {
                $('#filterWrap2 .filter-selector__btn-show').removeClass('active')
            }, 4000)
        })
    })

    /* ОТСЛЕДИТЬ СОСТОЯИНИЕ (КЛАСС) У #filterWrap2 .filter-selector__btn-show И ДОБАВИТЬ SETTIMEOUT ЕСЛИ ЕСТЬ АКТИВНЫЙ КЛАСС */

    document.querySelectorAll('#filterWrap1 .filter-checkbox__wrap').forEach(input => {
        input.addEventListener('click', function () {
            var obj = this // берем интересующий элемент
            var height = obj.offsetHeight / 2;
            var posY = obj.offsetTop;  // верхний отступ эл-та от родителя
            // var posX = obj.offsetLeft; // левый отступ эл-та от родителя
            // var posAbs = posY + height;
            // var scroll = obj.scrollTop;

            var parentPos = document.querySelector('.js-hidden1').getBoundingClientRect().top,
            childPos = obj.getBoundingClientRect().top;

            relativePosTop = childPos - parentPos + height + 25;

          
   
            var attribute = 'top: ' + relativePosTop + 'px;';
            document.querySelector('#filterWrap1 .filter-selector__btn-show').setAttribute('style', attribute)
            // console.log(height);
            // console.log(posY);
            // console.log(posAbs);
            // console.log(scroll);
         
        })
    })

   

    // console.log(parentPos);

    document.querySelectorAll('#filterWrap2 .filter-checkbox__wrap').forEach(input => {
        input.addEventListener('click', function () {
            var obj = this // берем интересующий элемент
            var height = obj.offsetHeight/2;
            var posY = obj.offsetTop;  // верхний отступ эл-та от родителя
            // var posX = obj.offsetLeft; // левый отступ эл-та от родителя
            // var posAbs = posY + height - 28;
            var scroll = obj.getBoundingClientRect().top;

            var parentPos = document.querySelector('.js-hidden2').getBoundingClientRect().top,
            childPos = obj.getBoundingClientRect().top;

            relativePosTop = childPos - parentPos + height + 25;

       
            var element = obj.offsetParent;
            var attribute = 'top: ' + relativePosTop + 'px;';
            document.querySelector('#filterWrap2 .filter-selector__btn-show').setAttribute('style', attribute)
        })
    })

    p = $('.filter-selector__hidden').scrollTop;
    console.log(p);


    $(document).on('click', (e) => {
        var containerFilter = $('#filterWrap1');
        if ((containerFilter.has(e.target).length === 0) && (containerFilter.hasClass('active'))) {
            containerFilter.removeClass('active')
            $('#filterWrap1 .filter-selector__buttons-remove').removeClass('active')
            $('#filterWrap1 .filter-selector__btn-show').removeClass('active')
        }
    })

    $(document).on('click', (e) => {
        var containerFilter = $('#filterWrap2');
        if ((containerFilter.has(e.target).length === 0) && (containerFilter.hasClass('active'))) {
            containerFilter.removeClass('active')
            $('#filterWrap2 .filter-selector__buttons-remove').removeClass('active')
            $('#filterWrap2 .filter-selector__btn-show').removeClass('active')
        }
    })
}

if ($('.filter-selector__buttons-hide')) {
    $('.filter-selector__buttons-hide').on('click', function () {
        $(this.parentElement.parentElement).removeClass('active')
    })
}

let filterMobileBtn = document.querySelector('.sorting__mobile')
let filterMobile = document.querySelector('.catalog-filter-body')
let filterClose = document.querySelector('.catalog-filter__icon-close')

if (filterMobileBtn !== null) {
    filterMobileBtn.addEventListener('click', function () {
        filterMobileBtn.classList.toggle('active')

        if (filterMobileBtn.classList.contains('active')) {
            filterMobile.classList.add('active')
        } else {
            filterMobile.classList.remove('active')
        }
    })
}
if (filterMobileBtn !== null) {
    filterClose.addEventListener('click', function () {
        filterMobile.classList.remove('active')
        filterMobileBtn.classList.remove('active')
    })
}

let sorting = document.querySelectorAll('.sorting__selector')
sorting.forEach(item => {
    item.addEventListener('click', function () {
        item.parentElement.classList.toggle('active')
    })
})

document.querySelectorAll('.js-filter').forEach(item => {
    item.addEventListener('click', function () {
        item.parentElement.classList.toggle('opened')
    })
})

document.querySelectorAll('.contacts__block-input input').forEach(input => {
    input.addEventListener('input', function () {
        if (this.value !== '') {
            input.parentElement.classList.add('change')
        } else {
            input.parentElement.classList.remove('change')
        }
    })
})

$(function () {

    $('ul.tabs__caption').on('click', 'li:not(.active)', function () {
        $(this)
            .addClass('active').siblings().removeClass('active')
            .closest('div.tabs').find('div.tabs__content').removeClass('active').eq($(this).index()).addClass('active');
    });
});

$(document).click(function (e) {
    var container = $(".sorting__selector-wrapper");
    if (container.has(e.target).length === 0) {
        $('.sorting__selector-wrapper').removeClass('active');
    }
});

/* ВОСПРОИЗВЕДЕНИЕ ВИДЕО */
const btnOk = document.querySelector('.news-opened__video-btn');
const btnStop = document.querySelector('.btn-stop');
const wrapperVideo = document.getElementById('video1');

if (btnOk) {
    btnOk.addEventListener('click', function () {
        wrapperVideo.play();
        wrapperVideo.setAttribute('controls', 'controls')
        this.classList.add('hide')

        wrapperVideo.addEventListener('ended', function () {
            btnOk.classList.remove('hide')
        })
    })
}

if ('.second-block-top__close' && '.second-block-top__open') {
    $('.second-block-top__open').on('click', function () {
        $(this).parent().addClass('hide')
        $('.second-block-top__text-desktop').addClass('active')
    })

    $('.second-block-top__close').on('click', function () {
        $(this).parent().removeClass('active')
        $('.second-block-top__text-mobile').removeClass('hide')
    })
}

if ($('.first-block__btn')) {
    $('.first-block__btn').on('click', () => {
        $('.question-form__layout').addClass('active')
    })
}

$(document).on('click', '.question-form__layout-wrapper', (e) => {
    var containerForm = $(".question-form__layout");
    if ((containerForm.has(e.target).length === 0) || ($(e.target).hasClass('question-form__btn')) || ($(e.target).hasClass('question-form__close'))) {
        $('.question-form__layout').removeClass('active');
    }
})









