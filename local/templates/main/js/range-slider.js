var rangeSlider = document.getElementById('range-slider');

if (rangeSlider) {
   var min = Number.parseInt(rangeSlider.dataset.min)
   var max = Number.parseInt(rangeSlider.dataset.max)
   var start = Number.parseInt(rangeSlider.dataset.start)
   var finish = Number.parseInt(rangeSlider.dataset.finish)
   noUiSlider.create(rangeSlider, {
      start: [start, finish],
      connect: true,
      step: 1,
      margin: 1,
      range: {
         'min': [min],
         'max': [max]
      },
      format: wNumb({
         decimals: 0,
         thousand: ' ',
      })
   })

   const inputMin = document.getElementById('priceMin')
   const inputMax = document.getElementById('priceMax')
   const inputs = [inputMin, inputMax]
   rangeSlider.noUiSlider.on('update', function (values, handle) {
      // console.log(inputs[handle].value);
      //    console.log(values[handle]);

      //    let withSpace = values[handle].toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")
      inputs[handle].value = values[handle]
   })

   const serRangeSlider = (i, value) => {
      let array = [null, null]
      array[i] = value

      rangeSlider.noUiSlider.set(array)
   }

   inputs.forEach((el, index) => {
      el.addEventListener('change', (e) => {
         serRangeSlider(index, e.currentTarget.value)
      })
   })
}

var rangeSliderHours = document.getElementById('range-slider-hours');

if (rangeSliderHours) {
   var minHour = Number.parseInt(rangeSliderHours.dataset.min)
   var maxHour = Number.parseInt(rangeSliderHours.dataset.max)
   var startHour = Number.parseInt(rangeSliderHours.dataset.start)
   var finishHour = Number.parseInt(rangeSliderHours.dataset.finish)
   noUiSlider.create(rangeSliderHours, {
      start: [startHour, finishHour],
      connect: true,
      step: 1,
      margin: 5,
      range: {
         'min': [minHour],
         'max': [maxHour]
      },
      format: wNumb({
         decimals: 1,
         thousand: '.',
      })
   })

   const hourMin = document.getElementById('hourMin')
   const hourMax = document.getElementById('hourMax')
   const inputsHour = [hourMin, hourMax]
   rangeSliderHours.noUiSlider.on('update', function (values, handle) {
      // console.log(inputs[handle].value);
      //    console.log(values[handle]);

      //    let withSpace = values[handle].toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")
      inputsHour[handle].value = values[handle]
   })

   const serRangeSlider = (i, value) => {
      let array = [null, null]
      array[i] = value

      rangeSliderHours.noUiSlider.set(array)
   }

   inputsHour.forEach((el, index) => {
      el.addEventListener('change', (e) => {
         serRangeSlider(index, e.currentTarget.value)
      })
   })
}

var numberMask = IMask(
   document.getElementById('priceMin'),
   {
     mask: Number,
     min: 0,
      max: 1000000,
     scale: 0,
     thousandsSeparator: ' ',
   });

var numberMask = IMask(
   document.getElementById('priceMax'),
   {
     mask: Number,
     min: 0,
      max: 1000000,
      scale: 0,
     thousandsSeparator: ' '
   });