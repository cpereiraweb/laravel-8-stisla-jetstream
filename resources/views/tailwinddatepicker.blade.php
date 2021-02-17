<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <div class="h-screen w-screen flex items-center justify-center bg-gray-200 ">
  <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

  <style>
    [x-cloak] {
      display: none;
    }
  </style>

  <div class="antialiased sans-serif">
      <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
          <div class="container mx-auto px-4 py-2 md:py-10">
              <div class="mb-5 w-64">

                  <label for="datepicker" class="font-bold mb-1 text-gray-700 block">Select Date</label>
                  <div class="relative border border-gray-900">
                      <input type="hidden" name="date" x-ref="date">
                      <input
                          type="text"
                          readonly
                          x-model="datepickerValue"
                          @click="showDatepicker = !showDatepicker"
                          @keydown.escape="showDatepicker = false"
                          class="w-full pl-4 pr-10 py-3 leading-none rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                          placeholder="Selecione">

                          <div class="absolute top-0 right-0 px-3 py-2">
                              <svg class="h-6 w-6 text-gray-400"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                              </svg>
                          </div>


                          <!-- <div x-text="no_of_days.length"></div>
                          <div x-text="32 - new Date(year, month, 32).getDate()"></div>
                          <div x-text="new Date(year, month).getDay()"></div> -->

                          <div
                              class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0"
                              style="width: 17rem"
                              x-show.transition="showDatepicker"
                              @click.away="showDatepicker = false">

                              <div class="flex justify-between items-center mb-2">
                                  <div>
                                      <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                                      <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                                  </div>
                                  <div>
                                      <button
                                          type="button"
                                          class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full"
                                          :class="{'cursor-not-allowed opacity-25': month == 0 }"
                                          :disabled="month == 0 ? true : false"
                                          @click="month--; getNoOfDays()">
                                          <svg class="h-6 w-6 text-gray-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                          </svg>
                                      </button>
                                      <button
                                          type="button"
                                          class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full"
                                          :class="{'cursor-not-allowed opacity-25': month == 11 }"
                                          :disabled="month == 11 ? true : false"
                                          @click="month++; getNoOfDays()">
                                          <svg class="h-6 w-6 text-gray-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                          </svg>
                                      </button>
                                  </div>
                              </div>

                              <div class="flex flex-wrap mb-3 -mx-1">
                                  <template x-for="(day, index) in DAYS" :key="index">
                                      <div style="width: 14.26%" class="px-1">
                                          <div
                                              x-text="day"
                                              class="text-gray-800 font-medium text-center text-xs"></div>
                                      </div>
                                  </template>
                              </div>

                              <div class="flex flex-wrap -mx-1">
                                  <template x-for="blankday in blankdays">
                                      <div
                                          style="width: 14.28%"
                                          class="text-center border p-1 border-transparent text-sm"
                                      ></div>
                                  </template>
                                  <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                      <div style="width: 14.28%" class="px-1 mb-1">
                                          <div
                                              @click="getDateValue(date)"
                                              x-text="date"
                                              class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100"
                                              :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }"
                                          ></div>
                                      </div>
                                  </template>
                              </div>
                          </div>

                  </div>
              </div>

          </div>
      </div>

      <script>
          const MONTH_NAMES = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
          const DAYS = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'];

          function app() {
              return {
                  showDatepicker: false,
                  datepickerValue: '',

                  month: '',
                  year: '',
                  no_of_days: [],
                  blankdays: [],
                  days: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],

                  initDate() {
                      let today = new Date();
                      this.month = today.getMonth();
                      this.year = today.getFullYear();
                      // this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
                      this.datepickerValue = new Intl.DateTimeFormat('pt-BR').format(today);
                  },

                  isToday(date) {
                      const today = new Date();
                      const d = new Date(this.year, this.month, date);

                      return today.toDateString() === d.toDateString() ? true : false;
                  },

                  getDateValue(date) {
                      let selectedDate = new Date(this.year, this.month, date);
                      // this.datepickerValue = selectedDate.toDateString();
                      this.datepickerValue = new Intl.DateTimeFormat('pt-BR').format(selectedDate);

                      // this.$refs.date.value = selectedDate.getFullYear() +"-"+ ('0'+ selectedDate.getMonth()).slice(-2) +"-"+ ('0' + selectedDate.getDate()).slice(-2);
                      this.$refs.date.value =  ('0' + selectedDate.getDate()).slice(-2) +"-"+ ('0'+ selectedDate.getMonth()).slice(-2) +"-"+ selectedDate.getFullYear();

                      console.log(this.$refs.date.value);
                      console.log(new Intl.DateTimeFormat('pt-BR').format(selectedDate));

                      this.showDatepicker = false;
                  },

                  getNoOfDays() {
                      let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                      // find where to start calendar day of week
                      let dayOfWeek = new Date(this.year, this.month).getDay();
                      let blankdaysArray = [];
                      for ( var i=1; i <= dayOfWeek; i++) {
                          blankdaysArray.push(i);
                      }

                      let daysArray = [];
                      for ( var i=1; i <= daysInMonth; i++) {
                          daysArray.push(i);
                      }

                      this.blankdays = blankdaysArray;
                      this.no_of_days = daysArray;
                  }
              }
          }
      </script>
    </div>
</div>
</body>
</html>
