
	
	
	
	
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
	console.log("LOG1");
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
	var li ;
	var sql; 
	var sqlID;

	var likes, dislikes;
	
	number = parseInt(x.getAttribute('number'));;

	if ( id < 3000 ){
		
	var targetDiv = document.getElementById(id);
	
	var targetDiv2 = document.getElementById(parseInt(id)+2000);
			li = 1;
			sqlID = parseInt(id) - 1000;
	} else {
		
	var targetDiv = document.getElementById(id-2000);
	var targetDiv2 = document.getElementById(id);
	li = 0;	
	sqlID = parseInt(id)-3000;
	}

	likes = parseInt(targetDiv.getAttribute('like'));
	dislikes = parseInt(targetDiv2.getAttribute('dislike'));
	
	if(li == 1 && x.src.includes('/like.png')){ //like
		if(targetDiv2.src.includes('/unlike2.png'))
		dislikes--;
		
		targetDiv.src="icons/like2.png";	
		targetDiv2.src="icons/unlike.png";
		sql = 1;		
		
		likes++;
	
	}	
	else if ( li == 1 && x.src.includes('/like2.png')) //unlike
	{
		targetDiv.src="icons/like.png";	
		targetDiv2.src="icons/unlike.png";		
		sql = 0;		
		likes--;
	} 
	else if ( li == 0  && x.src.includes('/unlike.png'))//dislike
	{
		if(targetDiv.src.includes('/like2.png'))
		likes--;
				
		targetDiv.src="icons/like.png";	
		targetDiv2.src="icons/unlike2.png";		
		sql = -1;		
		dislikes++;
	} 
	else if ( li == 0 && x.src.includes('/unlike2.png'))//undislike 
	{
		targetDiv.src="icons/like.png";	
		targetDiv2.src="icons/unlike.png";
		sql = 0;		
		dislikes--;
	} 

	targetDiv2.setAttribute('dislike',dislikes);
	targetDiv.setAttribute('like',likes  );



	console.log("Like:");
		console.log(likes);
		console.log("Dislike:");
		console.log(dislikes);
		console.log("");

	$.ajax({
		url: "like.php",
		type: "POST",
		data: {
			img_id: sqlID,
			rating_id: sql 

		},
	});		
	calculateBar(number,likes , dislikes);
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


  function calculateBar(number,likes,dislikes){

	
	var total= likes+dislikes;
    //Simple math to calculate percentages
	if(total == 0 ){
	var percentageLikes=50;
	var percentageDislikes=50;
	} else {	
	var percentageLikes=(likes/total)*100;
	var percentageDislikes=(dislikes/total)*100;
	}
    //We need to apply the widths to our elements
	//var first  = document.getElementById(id).getElementById('bar').getElementById('likesBar');
	//var second = document.getElementById('bar');
//	first.style.width=percentageLikes.toString()+"%";
	//document.querySelector('id.dislikesBar').style.width=percentageDislikes.toString()+"%";
	var first = document.getElementsByClassName('likesBar');
	var second = document.getElementsByClassName('dislikesBar');
	first[number].style.width=percentageLikes.toString()+"%";
	second[number].style.width=percentageDislikes.toString()+"%";
}






