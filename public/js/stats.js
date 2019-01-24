var dynamicColors = function() {
    var r = Math.floor(Math.random() * 255);
    var g = Math.floor(Math.random() * 255);
    var b = Math.floor(Math.random() * 255);
    return "rgb(" + r + "," + g + "," + b + ")";
};

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
    if($('#barChart')[0]){
        $.ajax({
            type:'get',
            url:'/statistics',
            success: function(data) {
                var d = new Date(),test=[];
                var n = d.getFullYear()-10;
                var colorBar = [],
                    borderBar = [],
                    intitule = [],
                    count = new Array();
                for (var i = 0; i < data.equipes.length; i++) {
                    count[i]=new Array(0,0,0,0,0,0,0,0,0,0,0);
                }
                for(var i=0; i<data.equipes.length; i++){
                    for(var j=0; j<data.nombres.length; j++){
                        if (data.nombres[j].intitule == data.equipes[i]) {
                            count[i][data.nombres[j].year-n]=data.nombres[j].count;
                        }
                    }
                }
               
                for (var i = 0; i <data.equipes.length; i++) {
                    colorBar.push(dynamicColors());
                    borderBar.push(dynamicColors());


                }

                var options = {
                    maintainAspectRatio: false,
                    title : {
                        display : true,
                        position : "top",
                        text : "Projets par equipes",
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
                                beginAtZero: true,
                                callback: function (value) { if (Number.isInteger(value)) { return value; } },
                                stepSize: 1
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

                var data = {
                    labels : data.years,
                    datasets : dataSett
                };
                var ctx = $('#barChart');
                var chart = new Chart(ctx[0], {
                    type : "bar",
                    data : data,
                    options : options
                });
            },
            error: function(data) {

                console.log(data);
            },
        });
    }
});

$(function () {
    if($('#statPie')[0]){
        $.ajax({

            type: "get",
            url: "/statPie",
            success: function(data) {

                var coloR = [];
                var nombres = [];

               

                for (var i=0;i<data.nmbrEquipe;i++) {
                    coloR.push(dynamicColors());

                }

                for (var i = 0; i <data.nombres.length; i++) {
                    nombres.push(data["nombres"][i].count);
                }

                var options = {
                    maintainAspectRatio: false,
                    title : {
                        display : true,
                        position : "top",
                        text : "Membres par équipe",
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

                var ctx = $('#statPie');
                var barGraph = new Chart(ctx[0], {
                    type: 'pie',
                    data: chartData,
                    options: options
                });
            },
            error: function(data) {
                console.log(data);
            },
        });
    }
});

$(document).ready(function() {
    if($('#statPieArticle')[0]){
        $.ajax({

            type: "get",
            url: "/stat-pie-article",
            success: function(data) {
                var coloR = [];
                var nombres = [];
                var type =[];
               
    console.log(data);
                for (var i=0;i<data.countArticle.length;i++) {
                    coloR.push(dynamicColors());

                }

                for (var i = 0; i <data.countArticle.length; i++) {
                    nombres.push(data["countArticle"][i].count);
                    type.push(data["countArticle"][i].type);
                }
                var options = {
                    maintainAspectRatio: false,
                    title : {
                        display : true,
                        position : "top",
                        text : "Articles publiées",
                        fontSize : 18,
                        fontColor : "#111"
                    },
                    legend : {
                        display : true,
                        position : "bottom"
                    }
                };
                var chartData = {

                    labels: type,
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
                var barGraph = new Chart(ctx[0], {
                    type: 'pie',
                    data: chartData,
                    options: options
                });
            },
            error: function(data) {
                console.log(data);
            },
        });
    }
});
$(function () {
    if($('#chartThese')[0]){
        $.ajax({

            type: "get",
            url: "/statThese",
            success: function(data) {
                var colorDebut = [],
                    colorFin = [],
                    borderDebut = [],
                    borderFin = [],
                    theseEncour = [];
                for (var i = 0; i <=10; i++) {
                    colorDebut.push("rgba(10, 20, 30, 0.3)");
                    colorFin.push("rgba(50, 150, 250, 0.3)");
                    borderDebut.push("rgba(10, 20, 30, 1)");
                    borderFin.push("rgba(50, 150, 250, 1)");
                    theseEncour.push(data.these[i][0].nombre);
                }
            console.log(data);
                var options = {
                    maintainAspectRatio: false,
                    title : {
                        display : true,
                        position : "top",
                        text : "Thèses en cours/soutenus",
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
                                beginAtZero: true,
                                callback: function (value) { if (Number.isInteger(value)) { return value; } },
                                stepSize: 1
                            }
                        }]
                    }
                };
      
                var data = {
                    labels : data.years,
                    datasets : [
                        {
                            label : "These en cours",
                            data : theseEncour,
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

                var ctx = $('#chartThese');
                var chart = new Chart( ctx[0], {
                    type : "bar",
                    data : data,
                    options : options
                });
            },
            error: function(data) {
                console.log(data);
            },
        });
    }
});

$(function () {
    if($('#stat-equipe-article')[0]){
        $.ajax({

            type: "get",
            url: "/stat-bar-article",
            success: function(data) {
                var d = new Date(),test=[];
                var n = d.getFullYear()-10;

                var colorBar = [],
                    borderBar = [],
                    count = new Array();
                for (var i = 0; i < data.equipes.length; i++) {
                    count[i]=new Array(0,0,0,0,0,0,0,0,0,0,0);
                }
                for(var i=0; i<data.equipes.length; i++){
                    for(var j=0; j<data.nombres.length; j++){
                        if (data.nombres[j].intitule == data.equipes[i]) {
                            count[i][data.nombres[j].year-n]=data.nombres[j].count;
                        }
                    }
                }
                for (var i = 0; i <data.equipes.length; i++) {
                    var c = dynamicColors();
                    colorBar.push(c);
                    borderBar.push(c);
                }

                var options = {
                    maintainAspectRatio: false,
                    title : {
                        display : true,
                        position : "top",
                        text : "Articles publiés par equipe",
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
                                beginAtZero: true,
                                callback: function (value) { if (Number.isInteger(value)) { return value; } },
                                stepSize: 1
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

                var data = {
                    labels : data.years,
                    datasets : dataSett
                };

                var ctx = $('#stat-equipe-article');
                var chart = new Chart( ctx[0], {
                    type : "bar",
                    data : data,
                    options : options
                });
            },
            error: function(data) {
                console.log(data);
            },
        });
    }
});
//stat-bar-stacked-article
$(function () {
    if($('#barArticle-stacked')[0]){
        $.ajax({

            type: "get",
            url: "/stat-bar-stacked-article",
            success: function(data) {


                var d = new Date(),test=[];
                var n = d.getFullYear()-10;
                var countRevu = new Array();
                var typeArticle = ["revue", "chapitre", "article long", "article court", "poster", "livre","brevet"];

                for(var i=0;i<7;i++){

                    countRevu[i]=new Array(0,0,0,0,0,0,0,0,0,0,0);
                }
                for(var i=0; i<7; i++){
                    for(var j=0; j<data.countArticle.length; j++){
                        if (data.countArticle[j].type == typeArticle[i]) {
                            countRevu[i][data.countArticle[j].annee-n]+=data.countArticle[j].count;
                        }
                    }
                }
                
                var colorBar = [],
                    borderBar = [];

                for (var i = 0; i < 7; i++) {
                    var c = dynamicColors();
                    colorBar.push(dynamicColors());
                    borderBar.push(dynamicColors());

                }
                var options = {
                    maintainAspectRatio: false,
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Article publiés par type'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{ stacked: true }],
                        yAxes: [{ 
                            stacked: true,
                            ticks : {
                            beginAtZero: true,
                            callback: function (value) { if (Number.isInteger(value)) { return value; } },
                            stepSize: 1
                        } }]
                    }
                };
                var data = {
                    labels : data.years,
                    datasets : [
                        {
                            label : "Revue",
                            data : countRevu[0],
                            backgroundColor : colorBar[0],
                            borderColor : borderBar[0],
                            borderWidth : 1
                        },
                        {
                            label : "Chapitre",
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
                            label : "Poster",
                            data : countRevu[4],
                            backgroundColor : colorBar[4],
                            borderColor : borderBar[4],
                            borderWidth : 1
                        },
                        {
                            label : "Livre",
                            data : countRevu[5],
                            backgroundColor : colorBar[5],
                            borderColor : borderBar[5],
                            borderWidth : 1
                        },
                        {
                            label : "Brevet",
                            data : countRevu[6],
                            backgroundColor : colorBar[6],
                            borderColor : borderBar[6],
                            borderWidth : 1
                        }
                    ]
                };

                var ctx = $('#barArticle-stacked');
                var chart = new Chart( ctx[0], {
                    type : "bar",
                    data : data,
                    options : options
                });
            },
            error: function(data) {
                console.log(data);
            },
        });
    }
});