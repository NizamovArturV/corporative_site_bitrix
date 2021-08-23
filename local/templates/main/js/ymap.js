// 
ymaps.ready(init);


function init() {
    // Создание карты.
    var myMap = new ymaps.Map("map", {
        center: centerMap,
        zoom: 10,
        controls: ['zoomControl'],
        options: {
            maxZoom: 15,
        }
    });

    //на мобильных устройствах... (проверяем по userAgent браузера)
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        //... отключаем перетаскивание карты
        myMap.behaviors.disable('drag');
    }

    var MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
        '<div style="color: black; position: absolute; right: 42px; top: -5px; ">$[properties.geoObjects.length]</div>');

    let clusterer

    clusterer = new ymaps.Clusterer({
        clusterIcons: [
            {
                href: pathToImageCluster,
                size: [90, 90],
                offset: [-45, -45]
            },
            {
                href: pathToImageCluster,
                size: [60, 60],
                offset: [-30, -30]
            }],
        // Эта опция отвечает за размеры кластеров.
        // В данном случае для кластеров, содержащих до 100 элементов,
        // будет показываться маленькая иконка. Для остальных - большая.
        clusterNumbers: [30],
        // clusterIconContentLayout: null,
        groupByCoordinates: false,
        clusterDisableClickZoom: true,
        clusterHideIconOnBalloonOpen: false,
        geoObjectHideIconOnBalloonOpen: false,
        clusterIconContentLayout: MyIconContentLayout
    })

    window.myObjects = ymaps.geoQuery({
        type: "FeatureCollection",
        features: dataMap,
    })

    clusterer.add(myObjects._objects)
    myMap.geoObjects.add(clusterer)

// if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
//     //... отключаем перетаскивание карты
//     // $("#tab2").on('click', function () {
//     // setTimeout(init, 500)
//     // })
//     myMap.setBounds(myMap.geoObjects.getBounds());
// } else {
//     myMap.setBounds(clusterer.getBounds(), {
//         checkZoomRange: true
//     });
// }
    
    myMap.setBounds(clusterer.getBounds(), {
        // checkZoomRange: true
    });

    // создаем метки
    // window.myObjects = ymaps.geoQuery({
    //     type: "FeatureCollection",
    //     features: dataMap,
    // }).addToMap(myMap);


    // // Объекты
    // const objectList = document.querySelectorAll('.js-options-obj .place-map-filter-options__item');

    // // Районы
    // const objectArea = document.querySelectorAll('.js-options-area .place-map-filter-options__item');

    // Список улиц
    const placeList = document.querySelectorAll('.subdivisions__row');

    //скрываем или показываем карточки
    function showCards(curReg, curType, curName) {
        let blocks = document.querySelectorAll('[data-city]');
        for (let i = 0; i < blocks.length; i++) { // проходим циклом по всем элементам объекта
            if (blocks[i].dataset.city.indexOf(curReg) == -1 && curReg !== null && curReg !== '') {
                blocks[i].style.display = "none";

            }
            // else if (blocks[i].dataset.types !== curType && curType !== null && curType !== '') {
            //     blocks[i].style.display = "none";
            // } else if (blocks[i].dataset.nameorg.indexOf(curName) == -1 && blocks[i].dataset.prewie.indexOf(curName) == -1 && curName !== '') {
            //     blocks[i].style.display = "none";
            //    } 
            else {
                blocks[i].style.display = "block";
                clusterer.add(myObjects._objects)
            }
        }
    }

    function checkState() {
        // создаем переменные
        var shownObjects,
            // region = $('#region').val(),
            // typeS = $('#typeS').val(),
            nameOrg = $('#search').val().toLowerCase(),
            filter_r = new ymaps.GeoQueryResult();
        // filter_t = new ymaps.GeoQueryResult(),
        // filter_n = new ymaps.GeoQueryResult(),
        // filter_n_e = new ymaps.GeoQueryResult();


        // проверяем с какими данными мы вообще работаем и в зависимости от этого убераем ненужные метки
        var variant = 0;

        // if (region != null && region !== '') {
        //     variant += 1;
        // }
        // if (typeS != null && typeS !== '') {
        //     variant += 10;
        // }
        if (nameOrg !== '') {
            variant += 1;
        }

        switch (variant) {
            case 1:
                filter_r = myObjects.search('options.city rlike"' + nameOrg + '"').add(filter_r);
                // shownObjects = filter_r.addToMap(myMap);
                shownObjects = filter_r;

                showCards(nameOrg);
                break;
            // case 10:
            //     filter_t = myObjects.search('options.typeS="' + typeS + '"').add(filter_t);
            //     shownObjects = filter_t.addToMap(myMap);
            //     showCards(region, typeS, nameOrg);
            //     break;
            // case 11:
            //     filter_r = myObjects.search('options.region="' + region + '"').add(filter_r);
            //     filter_t = myObjects.search('options.typeS="' + typeS + '"').add(filter_t);
            //     shownObjects = filter_r.intersect(filter_t).addToMap(myMap);
            //     showCards(region, typeS, nameOrg);
            //     break;
            // case 100:
            //     filter_n = myObjects.search('properties.hintContent rlike"' + nameOrg + '"').add(filter_n);
            //     filter_n_e = myObjects.search('options.prewie rlike"' + nameOrg + '"').add(filter_n_e);
            //     shownObjects = filter_n.add(filter_n_e).addToMap(myMap);
            //     console.log(shownObjects);
            //     showCards(region, typeS, nameOrg);
            //     break;
            // case 101:
            //     filter_n = myObjects.search('properties.hintContent rlike"' + nameOrg + '"').add(filter_n);
            //     filter_r = myObjects.search('options.region="' + region + '"').add(filter_r);
            //     shownObjects = filter_n.intersect(filter_r).addToMap(myMap);
            //     showCards(region, typeS, nameOrg);
            //     break;
            // case 110:
            //     filter_n = myObjects.search('properties.hintContent rlike"' + nameOrg + '"').add(filter_n);
            //     filter_t = myObjects.search('options.typeS="' + typeS + '"').add(filter_t);
            //     shownObjects = filter_n.intersect(filter_t).addToMap(myMap);
            //     showCards(region, typeS, nameOrg);
            //     break;
            // case 111:
            //     filter_r = myObjects.search('options.region="' + region + '"').add(filter_r);
            //     filter_n = myObjects.search('properties.hintContent rlike"' + nameOrg + '"').add(filter_n);
            //     filter_t = myObjects.search('options.typeS="' + typeS + '"').add(filter_t);
            //     shownObjects = filter_r.intersect(filter_n).intersect(filter_t).addToMap(myMap);
            //     showCards(region, typeS, nameOrg);
            //     break;
            case 0:
                shownObjects = myObjects;
                showCards(nameOrg);
                break;
        }
        // оставляем на карте только найденые метки
        // console.log(shownObjects);
        // console.log(myObjects);
        // console.log(myObjects.remove(shownObjects));

        clusterer.remove(myObjects._objects)
        clusterer.add(shownObjects._objects)

        myMap.setBounds(clusterer.getBounds(), {
            checkZoomRange: true
        });
    }

    // следим за изменениями выпадающих списков
    // $('#region').change(checkState);
    // $('#typeS').change(checkState);
    $('#search').keyup(checkState);


    // clusterer.add(myObjects._objects)
    // myMap.geoObjects.add(clusterer)
    // создаем метки
    // window.myObjects = ymaps.geoQuery({
    //     type: "FeatureCollection",
    //     features: dataMap,
    // }).addToMap(myMap);

    // При клике на точку показать справа в списке
    myMap.geoObjects.events.add('click', function (e) {
        // Получение ссылки на дочерний объект, на котором произошло событие.
        var object = e.get('target');

        placeList.forEach(item => {
            if (object.properties._data.id === item.dataset.id) {

                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }

        })
    });

    // placeList.forEach(item => {
    //     item.addEventListener('click', function () {
    //         item.classList.toggle('active')
    //     })
    // })

    const mapList = document.querySelectorAll('.subdivisions__row');

    mapList.forEach(element => {
        element.addEventListener('click', () => {
            mapList.forEach(item => {
                item.classList.remove('active')
            })

            element.classList.add('active')
        })
    })

    // При клике на список справа показать точку
    function clickAdressAndOpenBaloon() {
        placeList.forEach(item => {
            if (item.classList.contains('active')) {
                window.myObjects._objects.forEach(point => {
                    if (point.properties._data.id === this.dataset.id) {

                        // Центрировать карту при клике на точку
                        myMap.setCenter([point.geometry._coordinates[0], point.geometry._coordinates[1]], 17, {
                            duration: 300
                        })

                        // Открыть balloon с задержкой
                        setTimeout(() => {
                            point.balloon.open();
                        }, 500)
                    }
                })
            }
        })
    }

    // Закрыть balloon если кликнули на карту
    myMap.events.add('click', e => e.get('target').balloon.close());

    // objectList.forEach(item => {
    //     item.addEventListener('click', checkState)
    // })

    // objectArea.forEach(item => {
    //     item.addEventListener('click', checkState)
    // })

    placeList.forEach(item => {
        item.addEventListener('click', clickAdressAndOpenBaloon)
    })
}

const mapList = document.querySelectorAll('.subdivisions__row');

mapList.forEach(element => {
    element.addEventListener('click', () => {
        mapList.forEach(item => {
            item.classList.remove('active')
        })

        element.classList.add('active')
    })
});

// if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
//     //... отключаем перетаскивание карты
//     // $("#tab2").on('click', function () {
//     setTimeout(init, 1500)
//     // })
// } else {
//     ymaps.ready(init);
// }


if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    //... отключаем перетаскивание карты
    $('.subdivisions__row').on('click', function () {
        // setTimeout(init, 100)
        $('#tab1').removeClass('active')
        $('.contacts-subdivisions-left').removeClass('active')
        $('#tab2').addClass('active')
        $('.contacts-subdivisions-map').addClass('active')
    })
}
