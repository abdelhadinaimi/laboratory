$(function () {
  //Initialize Select2 Elements
  $('.select2').select2()

  //Datemask dd/mm/yyyy
  $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
  //Datemask2 mm/dd/yyyy
  $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
  //Money Euro
  $('[data-mask]').inputmask()

  //Date range picker
  $('#reservation').daterangepicker()
  //Date range picker with time picker
  $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
  //Date range as a button
  $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
  )

  //Date picker
  $('#datepicker').datepicker({
    autoclose: true
  })

  //iCheck for checkbox and radio inputs
  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass   : 'iradio_minimal-blue'
  })
  //Red color scheme for iCheck
  $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
    checkboxClass: 'icheckbox_minimal-red',
    radioClass   : 'iradio_minimal-red'
  })
  //Flat red color scheme for iCheck
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass   : 'iradio_flat-green'
  })

  //Colorpicker
  $('.my-colorpicker1').colorpicker()
  //color picker with addon
  $('.my-colorpicker2').colorpicker()

  //Timepicker
  $('.timepicker').timepicker({
    showInputs: false
  })
});

$(function () { 
    $.ajax({
      type:'get',
      url:'/statistics',
        success: function(data) {
            var d = new Date(),test=[];
            var n = d.getFullYear()-10;
            console.log(data);
            var colorBar = [],
                borderBar = [],
                intitule = [],
                count = new Array();
            for (var i = 0; i < data.equipes.length; i++) {
                count[i]=new Array(0,0,0,0,0,0,0,0,0,0,0);
            }
            for(var i=0; i<data.equipes.length; i++){
                for(var j=0; j<data.nombres.length; j++){
                    //console.log(data.nombres[j].type+ " "+typeArticle[i]);
                    if (data.nombres[j].intitule == data.equipes[i]) {
                        count[i][data.nombres[j].year-n]=data.nombres[j].count;
                    }
                }
            }
            var dynamicColors = function() {
                var r = Math.floor(Math.random() * 255);
                var g = Math.floor(Math.random() * 255);
                var b = Math.floor(Math.random() * 255);
                return "rgb(" + r + "," + g + "," + b + ")";
            };
            for (var i = 0; i <data.equipes.length; i++) {
                colorBar.push(dynamicColors());
                borderBar.push(dynamicColors());


            }
            console.log(count);
            var options = {
                title : {
                    display : true,
                    position : "top",
                    text : "Projet par equipes",
                    fontSize : 18,
                    fontColor : "#111"
                },
                legend : {
                    display : true,
                    position : "bottom"
                },
                scales : {
                    yAxes : [{
                        ticks : {
                            min : 0
                        }
                    }]
                }
            };
            var dataSett = [];
            for (var i = 0; i < data.equipes.length; i++) {
                dataSett[i]={
                    label : data.equipes[i],
                    data : count[i],
                    backgroundColor : colorBar[i],
                    borderColor : borderBar[i],
                    borderWidth : 1
                };
            }
            console.log(dataSett);
            var data = {
                labels : data.years,
                datasets : dataSett
            };
            //console.log(chartData);
            var ctx = $('#barChart');
            var chart = new Chart( ctx, {
                type : "bar",
                data : data,
                options : options
            });
        },
        error: function(data) {

            console.log(data);
        },
    });
});

$(document).ready(function() {
   $.ajax({
      
      type: "get",
      url: "/statPie",
      success: function(data) {
         console.log(data);
         var coloR = [];
         var nombres = [];

         var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
         };

         for (var i=0;i<data.nmbrEquipe;i++) {
            coloR.push(dynamicColors());

         }
         console.log(coloR);
         for (var i = 0; i <data.nombres.length; i++) {
           nombres.push(data["nombres"][i].count);
         }
         console.log(nombres);
         console.log(data.equipes);
         var options = {
    title : {
      display : true,
      position : "top",
      text : "Nombre membre d'équipe",
      fontSize : 18,
      fontColor : "#111"
    },
    legend : {
      display : true,
      position : "bottom"
    }
  };
         var chartData = {

            labels: data.equipes,
            datasets: [{
               label: 'nombres ',
               //strokeColor:backGround,

               backgroundColor: coloR,

               borderColor: 'rgba(200, 200, 200, 0.75)',
               //hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
               hoverBorderColor: 'rgba(200, 200, 200, 1)',
               data: nombres
            }]
         };
         console.log(chartData);
         var ctx = $('#statPie');
         var barGraph = new Chart(ctx, {
            type: 'pie',
            data: chartData,
            options: options
         });
      },
      error: function(data) {

         console.log(data);
      },
   });
});

$(document).ready(function() {
   $.ajax({
      
      type: "get",
      url: "/stat-pie-article",
      success: function(data) {
         var coloR = [];
         var nombres = [];
         console.log(data);
         var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
         };

         for (var i=0;i<data.type.length;i++) {
            coloR.push(dynamicColors());

         }
         console.log(coloR);
         for (var i = 0; i <data.countArticle.length; i++) {
           nombres.push(data["countArticle"][i].count);
         }
         var options = {
    title : {
      display : true,
      position : "top",
      text : "Nombre membre d'équipe",
      fontSize : 18,
      fontColor : "#111"
    },
    legend : {
      display : true,
      position : "bottom"
    }
  };
         var chartData = {

            labels: data.type,
            datasets: [{
               label: 'nombres ',
               //strokeColor:backGround,

               backgroundColor: coloR,

               borderColor: 'rgba(200, 200, 200, 0.75)',
               //hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
               hoverBorderColor: 'rgba(200, 200, 200, 1)',
               data: nombres
            }]
         };
         var ctx = $('#statPieArticle');
         var barGraph = new Chart(ctx, {
            type: 'pie',
            data: chartData,
            options: options
         });
      },
      error: function(data) {

         console.log(data);
      },
   });
});
$(document).ready(function() {
   $.ajax({
      
      type: "get",
      url: "/statThese",
      success: function(data) {
        var colorDebut = [],
            colorFin = [],
            borderDebut = [],
            borderFin = [];
        for (var i = 0; i <=10; i++) {
          colorDebut.push("rgba(10, 20, 30, 0.3)");
          colorFin.push("rgba(50, 150, 250, 0.3)");
          borderDebut.push("rgba(10, 20, 30, 1)");
          borderFin.push("rgba(50, 150, 250, 1)");
        }
         console.log(data);
         var options = {
          title : {
            display : true,
            position : "top",
            text : "Thèses en cours/ soutenus",
            fontSize : 18,
            fontColor : "#111"
          },
          legend : {
            display : true,
            position : "bottom"
          },
          scales : {
            yAxes : [{
              ticks : {
                min : 0
              }
            }]
          }
        };
         var data = {
          labels : data.years,
          datasets : [
            {
              label : "debut these",
              data : data.debuThese,
              backgroundColor : colorDebut,
              borderColor : borderDebut,
              borderWidth : 1
            },
            {
              label : "Fin these",
              data : data.finThese,
              backgroundColor : colorFin,
              borderColor : borderFin,
              borderWidth : 1
            }
          ]
        };
        //console.log(chartData);
        var ctx = $('#chartThese');
        var chart = new Chart( ctx, {
          type : "bar",
          data : data,
          options : options
          });
      },
      error: function(data) {

         console.log(data);
      },
   });
});
  
$(document).ready(function() {
   $.ajax({
      
      type: "get",
      url: "/stat-bar-article",
      success: function(data) {
        var d = new Date(),test=[];
        var n = d.getFullYear()-10;
        console.log(data);
        var colorBar = [],
            borderBar = [],
            intitule = [],
            count = new Array();
            for (var i = 0; i < data.equipes.length; i++) {
              count[i]=new Array(0,0,0,0,0,0,0,0,0,0,0);
            }
            for(var i=0; i<data.equipes.length; i++){
              for(var j=0; j<data.nombres.length; j++){
                //console.log(data.nombres[j].type+ " "+typeArticle[i]);
                if (data.nombres[j].intitule == data.equipes[i]) {
                    count[i][data.nombres[j].year-n]=data.nombres[j].count;
                }
              }
            }
             var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
         };
        for (var i = 0; i <data.equipes.length; i++) {
          colorBar.push(dynamicColors());
          borderBar.push(dynamicColors());

          
        }
         console.log(count);
         var options = {
          title : {
            display : true,
            position : "top",
            text : "Bar Graph",
            fontSize : 18,
            fontColor : "#111"
          },
          legend : {
            display : true,
            position : "bottom"
          },
          scales : {
            yAxes : [{
              ticks : {
                min : 0
              }
            }]
          }
        };
        var dataSett = [];
        for (var i = 0; i < data.equipes.length; i++) {
          dataSett[i]={
              label : data.equipes[i],
              data : count[i],
              backgroundColor : colorBar[i],
              borderColor : borderBar[i],
              borderWidth : 1
            };
        }
        console.log(dataSett);
         var data = {
          labels : data.years,
          datasets : dataSett
        };
        //console.log(chartData);
        var ctx = $('#stat-equipe-article');
        var chart = new Chart( ctx, {
          type : "bar",
          data : data,
          options : options
          });
      },
      error: function(data) {

         console.log(data);
      },
   });
}); 
//stat-bar-stacked-article
$(document).ready(function() {
   $.ajax({
      
      type: "get",
      url: "/stat-bar-stacked-article",
      success: function(data) {

        console.log(data);
        var d = new Date(),test=[];
        var n = d.getFullYear()-10;
        var countRevu = new Array();
        var typeArticle = ["revue", "chapitre", "Article long", "Article court", "poster", "Publication(Revue)","brevet"];

            for(var i=0;i<7;i++){
              
                countRevu[i]=new Array(0,0,0,0,0,0,0,0,0,0,0);
            }
            for(var i=0; i<7; i++){
              for(var j=0; j<data.countArticle.length; j++){
                //console.log(data.countArticle[j].type+ " "+typeArticle[i]);
                if (data.countArticle[j].type == typeArticle[i]) {
                    countRevu[i][data.countArticle[j].annee-n]=data.countArticle[j].count;
                }
              }
            }
            console.log(countRevu);
        
            var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
         };
        var colorBar = [],
            borderBar = [],
            intitule = [],
            count = [];

        for (var i = 0; i <data.countArticle.length; i++) {
          colorBar.push(dynamicColors());
          borderBar.push(dynamicColors());
          
        }
         var options ={
          responsive: true,
          title: {
            display: true,
            text: 'Article publies par types'
          },
          tooltips: {
            mode: 'index',
            intersect: true
          },
          scales: {
            xAxes: [{
              stacked: true,
            }]
          }
        };
         var data = {
          labels : data.years,
          datasets : [
            {
              label : "revue",
              data : countRevu[0],
              backgroundColor : colorBar[0],
              borderColor : borderBar[0],
              borderWidth : 1
            },
            {
              label : "chapitre",
              data : countRevu[1],
              backgroundColor : colorBar[1],
              borderColor : borderBar[1],
              borderWidth : 1
            },
            {
              label : "Article long",
              data : countRevu[2],
              backgroundColor : colorBar[2],
              borderColor : borderBar[2],
              borderWidth : 1
            },
            {
              label : "Article court",
              data : countRevu[3],
              backgroundColor : colorBar[3],
              borderColor : borderBar[3],
              borderWidth : 1
            },
            {
              label : "poster",
              data : countRevu[4],
              backgroundColor : colorBar[4],
              borderColor : borderBar[4],
              borderWidth : 1
            },
            {
              label : "Publication(Revue)",
              data : countRevu[5],
              backgroundColor : colorBar[5],
              borderColor : borderBar[5],
              borderWidth : 1
            },
            {
              label : "brevet",
              data : countRevu[6],
              backgroundColor : colorBar[6],
              borderColor : borderBar[6],
              borderWidth : 1
            }
          ]
        };
        //console.log(chartData);
        var ctx = $('#barArticle-stacked');
        var chart = new Chart( ctx, {
          type : "bar",
          data : data,
          options : options
          });
      },
      error: function(data) {

         console.log(data);
      },
   });
});