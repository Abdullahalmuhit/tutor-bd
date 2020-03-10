
 

/***SideNav***/

function openNav() {
  document.getElementById("mySidenav").style.width = "480px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

/***SideNav FAQ***/

$(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function(){
          $(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });
        
        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
          $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function(){
          $(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
    });


/***Sticky Manu***/

    
function academictutorialmenuon() {
        var acctutorialemenu = document.getElementById('academic-tutorial-sub-menu');
    
        acctutorialemenu.style.opacity = "1";
        acctutorialemenu.style.visibility = "unset";
        acctutorialemenu.style.transition = "0.4s ease-in-out";
    
        var videotutorialemenu = document.getElementById('video-tutorial-sub-menu');
    
        videotutorialemenu.style.opacity = "1";
        videotutorialemenu.style.visibility = "unset";
    
        
        var videosubmenu = document.getElementById('tutorial-sub-menu');
    
        videosubmenu.style.opacity = "1";
        videosubmenu.style.visibility = "unset";


        

    }

academictutorialmenuon();

function academictutorialmenuoff() {
        var acctutorialemenu = document.getElementById('academic-tutorial-sub-menu');

        acctutorialemenu.style.opacity = "0";
       acctutorialemenu.style.visibility = "hidden";
        acctutorialemenu.style.transition = "0.4s ease-in-out";
    
        var videotutorialemenu = document.getElementById('video-tutorial-sub-menu');
    
        videotutorialemenu.style.opacity = "0";
        videotutorialemenu.style.visibility = "hidden";
        
        var videosubmenu = document.getElementById('tutorial-sub-menu');
    
        videosubmenu.style.opacity = "0";
        videosubmenu.style.visibility = "hidden";
    
    }

academictutorialmenuoff();






 
      /* writing tutorial js start */
        function wringtutorialmenuon() {
            
            var writingtutorialemenu = document.getElementById('writing-tutorial-sub-menu');
          
            writingtutorialemenu.style.opacity = "1";
           writingtutorialemenu.style.visibility = "unset";
            writingtutorialemenu.style.transition = "0.4s ease-in-out";
            
            var videosubmenu2 = document.getElementById('tutorial-sub-menu');
    
            videosubmenu2.style.opacity = "1";
            videosubmenu2.style.visibility = "unset";

        }
        wringtutorialmenuon();

        function writingtutorialmenuoff() {
           var writingtutorialemenu = document.getElementById('writing-tutorial-sub-menu');
            
          
            writingtutorialemenu.style.opacity = "0";
           writingtutorialemenu.style.visibility = "hidden";
            writingtutorialemenu.style.transition = "0.4s ease-in-out";
            
            
            var videosubmenu2 = document.getElementById('tutorial-sub-menu');
    
            videosubmenu2.style.opacity = "0";
            videosubmenu2.style.visibility = "hidden";

        }
        writingtutorialmenuoff();





















        /* writing tutorial js start */
        function wringtutorialmenuon2() {
            
  
            
            var writingtut2 = document.getElementById('writing-tutorial-sub-menu');
    
            writingtut2.style.opacity = "1";
            writingtut2.style.visibility = "unset";
            
            var academicClass = document.getElementById('academic-tutorial-sub-menu-2');
    
            academicClass.style.opacity = "1";
            academicClass.style.visibility = "unset";
            
            var videosubmenu2 = document.getElementById('tutorial-sub-menu');
    
            videosubmenu2.style.opacity = "1";
            videosubmenu2.style.visibility = "unset";

        }
        wringtutorialmenuon2();

        function writingtutorialmenuoff2() {

            
            
            var writingtut2 = document.getElementById('writing-tutorial-sub-menu');
    
            writingtut2.style.opacity = "0";
            writingtut2.style.visibility = "hidden";
            
            var academicClass = document.getElementById('academic-tutorial-sub-menu-2');
    
            academicClass.style.opacity = "0";
            academicClass.style.visibility = "hidden";
            
            var videosubmenu2 = document.getElementById('tutorial-sub-menu');
    
            videosubmenu2.style.opacity = "0";
            videosubmenu2.style.visibility = "hidden";

        }
        writingtutorialmenuoff2();

 

  
