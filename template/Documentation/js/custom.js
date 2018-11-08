$(document).ready(function () {

    //Fixed Header
    $('#menu').scrollToFixed({
        dontSetWidth : true
    });

  	 // Menu Scrolling and Linking
     $("#menu a").click(function(evn){
        evn.preventDefault();
        $('html,body').scrollTo(this.hash, this.hash); 
    });
        var aChildren = $("#menu li").children(); // find the a children of the list items
        var aArray = []; // create the empty aArray
        for (var i=0; i < aChildren.length; i++) {    
            var aChild = aChildren[i];
            var ahref = $(aChild).attr('href');
            aArray.push(ahref);
        } 
        
        $(window).scroll(function(){
            var windowPos = $(window).scrollTop(); // get the offset of the window from the top of page
            var windowHeight = $(window).height(); // get the height of the window
            var docHeight = $(document).height();
            
            for (var i=0; i < aArray.length; i++) {
                var theID = aArray[i];
                var divPos = $(theID).offset().top; // get the offset of the div from the top of page
                var divHeight = $(theID).height(); // get the height of the div in question
                if (windowPos >= divPos && windowPos < (divPos + divHeight)) {
                    $("a[href='" + theID + "']").addClass("a-active");
                } else {
                    $("a[href='" + theID + "']").removeClass("a-active");
                }
            }
            
            if(windowPos + windowHeight == docHeight) {
                if (!$("#menu li:last-child a").hasClass("a-active")) {
                    var navActiveCurrent = $("#hdr-wrapper").attr("href");
                    $("a[href='" + navActiveCurrent + "']").removeClass("a-active");
                    $("#menu li:last-child a").addClass("a-active");
                }
            }
        });

       
        prettyPrint();
    });
