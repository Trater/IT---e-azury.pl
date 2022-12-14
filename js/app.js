
	
	
	
	
	function Slideshow( element ) {
		this.el = document.querySelector( element );
		this.init();
	}
	
	Slideshow.prototype = {
		init: function() {
			this.wrapper = this.el.querySelector( ".slider-wrapper" );
			this.slides = this.el.querySelectorAll( ".slide" );
			this.previous = this.el.querySelector( ".slider-previous" );
			this.next = this.el.querySelector( ".slider-next" );
			this.index = 0;
			this.total = this.slides.length;
			this.timer = null;
			
			this.action();
			this.stopStart();	
		},
		_slideTo: function( slide ) {
			var currentSlide = this.slides[slide];
			currentSlide.style.opacity = 1;
			
			for( var i = 0; i < this.slides.length; i++ ) {
				var slide = this.slides[i];
				if( slide !== currentSlide ) {
					slide.style.opacity = 0;
				}
			}
		},
		action: function() {
			var self = this;
			self.timer = setInterval(function() {
				self.index++;
				if( self.index == self.slides.length ) {
					self.index = 0;
				}
				self._slideTo( self.index );
				
			}, 7000);
		},
		/*
		stopStart: function() {
			var self = this;
			self.el.addEventListener( "mouseover", function() {
				clearInterval( self.timer );
				self.timer = null;
				
			}, false);
			self.el.addEventListener( "mouseout", function() {
				self.action();
				
			}, false);
		}
		*/
		
	};
	
	document.addEventListener( "DOMContentLoaded", function() {
		
		var slider = new Slideshow( "#main-slider" );
		
	});
	
	




$(window).scroll(function(){
    if($(this).scrollTop() > 358){
        $('.navigationBar').addClass('sticky')
		document.getElementById("placeHolder").style.display = "block";
    } else{
        $('.navigationBar').removeClass('sticky')
		document.getElementById("placeHolder").style.display = "none";
    }
});





function changeFollow(x) {
	var id = x.id;
	if(x.src.includes('/followed.png')){
	x.src="icons/unfollowed.png";
	console.log("LOG");
	$.ajax({
		url: "fav_del.php",
		type: "POST",
		data: {
			img_id: id			
		},
	});	
	
	} else {
	x.src="icons/followed.png";	
	
	$.ajax({
		url: "fav_add.php",
		type: "POST",
		data: {
			img_id: id			
		},
	});
}
  }
  function changeLike(x) {
	var id = x.id;
	var like ;
	var sql; 
	var sqlID;
	if ( id < 3000 ){
		
	var targetDiv = document.getElementById(id);
	
	var targetDiv2 = document.getElementById(parseInt(id)+2000);
			like = 1;
			sqlID = parseInt(id) - 1000;
	} else {
		
	var targetDiv = document.getElementById(id-2000);
	var targetDiv2 = document.getElementById(id);
	like = 0;
	sqlID = parseInt(id)-3000;
	}
	

	if(like == 1 && x.src.includes('/like.png')){ //like
		targetDiv.src="icons/like2.png";	
		targetDiv2.src="icons/unlike.png";
		sql = 1;
	}	
	else if ( like == 1 && x.src.includes('/like2.png')) //unlike
	{
		targetDiv.src="icons/like.png";	
		targetDiv2.src="icons/unlike.png";
		sql = 0;
	} 
	else if ( like == 0  && x.src.includes('/unlike.png'))//dislike
	{
		targetDiv.src="icons/like.png";	
		targetDiv2.src="icons/unlike2.png";
		sql = -1;
	} 
	else if ( like == 0 && x.src.includes('/unlike2.png'))//undislike 
	{
		targetDiv.src="icons/like.png";	
		targetDiv2.src="icons/unlike.png";
		sql = 0;
	} 
	$.ajax({
		url: "like.php",
		type: "POST",
		data: {
			img_id: sqlID,
			rating_id: sql 

		},
	});	
	console.log(sqlID);
	console.log(sql);
	
  }






  function deletePattern(x) {

	//x.src="icons/unfollowed.png";
	console.log(x.id);
	x.style.pointerEvents = "none";
	x.classList.add("kappa");
	x.style.backgroundColor = "red";
	var id = x.id;	

	
	$.ajax({
		url: "del.php",
		type: "POST",
		data: {
			img_id: id			
		},
	});	


  }

  
/*
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();
       console.log(scroll)
    if (scroll > 375) {
        //clearHeader, not clearheader - caps H
        $('.navigationBar').addClass('sticky')		
    }else{
        $('.navigationBar').removeClass('sticky')
    }
}); 
*/



function validateForm() {
	var x = document.forms["form_wyszukiwanie"]["wyszukiwanie"].value;
	if (x == "") {
	  alert("Nic nie wprowadziłeś!");
	  return false;
	}
  }