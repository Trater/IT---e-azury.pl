(function(){
    //Login/Signup modal window - by CodyHouse.co
	function ModalSignin( element ) {
		this.element = element;
		this.blocks = this.element.getElementsByClassName('js-signin-modal-block');
		this.switchers = this.element.getElementsByClassName('js-signin-modal-switcher')[0].getElementsByTagName('a'); 
		this.triggers = document.getElementsByClassName('js-signin-modal-trigger');
		this.hidePassword = this.element.getElementsByClassName('js-hide-password');
		this.init();
	};

	ModalSignin.prototype.init = function() {
		var self = this;
		//open modal/switch form
		for(var i =0; i < this.triggers.length; i++) {
			(function(i){
				self.triggers[i].addEventListener('click', function(event){
					if( event.target.hasAttribute('data-signin') ) {
						event.preventDefault();
						self.showSigninForm(event.target.getAttribute('data-signin'));
					}
				});
			})(i);
		}
		

		//close modal
		this.element.addEventListener('click', function(event){
			if( hasClass(event.target, 'js-signin-modal') || hasClass(event.target, 'js-close') ) {
				event.preventDefault();
				removeClass(self.element, 'cd-signin-modal--is-visible');
			}
		});
		//close modal when clicking the esc keyboard button
		document.addEventListener('keydown', function(event){
			(event.which=='27') && removeClass(self.element, 'cd-signin-modal--is-visible');
		});

		//hide/show password
		for(var i =0; i < this.hidePassword.length; i++) {
			(function(i){
				self.hidePassword[i].addEventListener('click', function(event){
					self.togglePassword(self.hidePassword[i]);
				});
			})(i);
		} 

		
	//IMPORTANT - REMOVE THIS - it's just to show/hide error messages in the demo
		/*this.blocks[0].getElementsByTagName('form')[0].addEventListener('submit', function(event){
			event.preventDefault();
			console.log("BŁAD");
			
			//self.toggleError(document.getElementById('signin-email'), true);
		});*/
		this.blocks[1].getElementsByTagName('form')[0].addEventListener('submit', function(event){
			
	var nameLength = document.getElementById("signup-username").value.length

	//var mysql      = require('mysql');

	
	if((nameLength<3)||(nameLength)>20)
	{	
		event.preventDefault();
		self.toggleError(document.getElementById('signup-username'), true);
	}
	else
	self.toggleError(document.getElementById('signup-username'), false);


	if ( document.getElementById("check").checked == false){
	console.log("terms");
		event.preventDefault();		
		document.getElementById("check2").classList.add("error");
	}
	

	if  (document.getElementById("signup-email").value == 0)
	{
		self.toggleError(document.getElementById('signup-email'), true);
		event.preventDefault();
		
	}
	else
	self.toggleError(document.getElementById('signup-email'), false);

	console.log(document.getElementById("signup-password").value.length);

	if  (document.getElementById("signup-password").value.length == 0 )
	{
		self.toggleError(document.getElementById('signup-password'), true);
		event.preventDefault();		
	}
	else
	self.toggleError(document.getElementById('signup-password'), false);



		});
	};

	ModalSignin.prototype.togglePassword = function(target) {
		var password = target.previousElementSibling;
		( 'password' == password.getAttribute('type') ) ? password.setAttribute('type', 'text') : password.setAttribute('type', 'password');
		target.textContent = ( 'Ukryj' == target.textContent ) ? 'Pokaż' : 'Ukryj';
		putCursorAtEnd(password);
	}

	ModalSignin.prototype.showSigninForm = function(type) {
		// show modal if not visible
		!hasClass(this.element, 'cd-signin-modal--is-visible') && addClass(this.element, 'cd-signin-modal--is-visible');
		// show selected form
		for( var i=0; i < this.blocks.length; i++ ) {
			this.blocks[i].getAttribute('data-type') == type ? addClass(this.blocks[i], 'cd-signin-modal__block--is-selected') : removeClass(this.blocks[i], 'cd-signin-modal__block--is-selected');
		}
		//update switcher appearance
		var switcherType = (type == 'signup') ? 'signup' : 'login';
		for( var i=0; i < this.switchers.length; i++ ) {
			this.switchers[i].getAttribute('data-type') == switcherType ? addClass(this.switchers[i], 'cd-selected') : removeClass(this.switchers[i], 'cd-selected');
		} 
	};

	ModalSignin.prototype.toggleError = function(input, bool) {
		// used to show error messages in the form
		toggleClass(input, 'cd-signin-modal__input--has-error', bool);
		toggleClass(input.nextElementSibling, 'cd-signin-modal__error--is-visible', bool);
	}

	var signinModal = document.getElementsByClassName("js-signin-modal")[0];
	if( signinModal ) {
		new ModalSignin(signinModal);
	}

	// toggle main navigation on mobile
	var mainNav = document.getElementsByClassName('js-main-nav')[0];
	if(mainNav) {
		mainNav.addEventListener('click', function(event){
			if( hasClass(event.target, 'js-main-nav') ){
				var navList = mainNav.getElementsByTagName('ul')[0];
				toggleClass(navList, 'cd-main-nav__list--is-visible', !hasClass(navList, 'cd-main-nav__list--is-visible'));
			} 
		});
	}
	
	//class manipulations - needed if classList is not supported
	function hasClass(el, className) {
	  	if (el.classList) return el.classList.contains(className);
	  	else return !!el.className.match(new RegExp('(\\s|^)' + className + '(\\s|$)'));
	}
	function addClass(el, className) {
		var classList = className.split(' ');
	 	if (el.classList) el.classList.add(classList[0]);
	 	else if (!hasClass(el, classList[0])) el.className += " " + classList[0];
	 	if (classList.length > 1) addClass(el, classList.slice(1).join(' '));
	}
	function removeClass(el, className) {
		var classList = className.split(' ');
	  	if (el.classList) el.classList.remove(classList[0]);	
	  	else if(hasClass(el, classList[0])) {
	  		var reg = new RegExp('(\\s|^)' + classList[0] + '(\\s|$)');
	  		el.className=el.className.replace(reg, ' ');
	  	}
	  	if (classList.length > 1) removeClass(el, classList.slice(1).join(' '));
	}
	function toggleClass(el, className, bool) {
		if(bool) addClass(el, className);
		else removeClass(el, className);
	}

	//credits http://css-tricks.com/snippets/jquery/move-cursor-to-end-of-textarea-or-input/
	function putCursorAtEnd(el) {
    	if (el.setSelectionRange) {
      		var len = el.value.length * 2;
      		el.focus();
      		el.setSelectionRange(len, len);
    	} else {
      		el.value = el.value;
    	}
	};
	
	
})();
/*
function ModalSignin( element ) {
	this.element = element;
	this.blocks = this.element.getElementsByClassName('js-signin-modal-block');
	this.switchers = this.element.getElementsByClassName('js-signin-modal-switcher')[0].getElementsByTagName('a'); 
	this.triggers = document.getElementsByClassName('js-signin-modal-trigger');
	this.hidePassword = this.element.getElementsByClassName('js-hide-password');
	this.init();
}; 

ModalSignin.prototype.toggleError = function(input, bool) {
	// used to show error messages in the form
	toggleClass(input, 'cd-signin-modal__input--has-error', bool);
	toggleClass(input.nextElementSibling, 'cd-signin-modal__error--is-visible', bool);
}


function myModal(f)
{
    var nameValue = document.getElementById("signup-username").value;
	var nameLength = document.getElementById("signup-username").value.length
	console.log(nameLength);
	var  erverythingGood = 1;
	if((nameLength<3)||(nameLength)>20)
	{				
		console.log("ERROR");			
	toggleClass(document.getElementById('signup-username'), 'cd-signin-modal__input--has-error', true);
	toggleClass(document.getElementById('signup-username').nextElementSibling, 'cd-signin-modal__error--is-visible', true);
} else {
	toggleClass(document.getElementById('signup-username'), 'cd-signin-modal__input--has-error', false);
	toggleClass(document.getElementById('signup-username').nextElementSibling, 'cd-signin-modal__error--is-visible', false);
}




*//*
let mysql = require('mysql');

var connection = mysql.createConnection({
	host: "localhost",
	user: "root",
	password: "",
	database: "it"
  });
  
 

  var adr = document.getElementById("signup-email").value;
  var sql = 'SELECT * FROM users WHERE user_email = ' + mysql.escape(adr);
  connection.query(sql, function (err, result) {
	if (err) throw err;
	console.log(result);
  });

connection.end(); 
	if 	(erverythingGood)
	{

	}
		
	
	
    return false;
}

//class manipulations - needed if classList is not supported
function hasClass(el, className) {
	if (el.classList) return el.classList.contains(className);
	else return !!el.className.match(new RegExp('(\\s|^)' + className + '(\\s|$)'));
}
function addClass(el, className) {
  var classList = className.split(' ');
   if (el.classList) el.classList.add(classList[0]);
   else if (!hasClass(el, classList[0])) el.className += " " + classList[0];
   if (classList.length > 1) addClass(el, classList.slice(1).join(' '));
}
function removeClass(el, className) {
  var classList = className.split(' ');
	if (el.classList) el.classList.remove(classList[0]);	
	else if(hasClass(el, classList[0])) {
		var reg = new RegExp('(\\s|^)' + classList[0] + '(\\s|$)');
		el.className=el.className.replace(reg, ' ');
	}
	if (classList.length > 1) removeClass(el, classList.slice(1).join(' '));
}
function toggleClass(el, className, bool) {
  if(bool) addClass(el, className);
  else removeClass(el, className);
}

//credits http://css-tricks.com/snippets/jquery/move-cursor-to-end-of-textarea-or-input/
function putCursorAtEnd(el) {
  if (el.setSelectionRange) {
		var len = el.value.length * 2;
		el.focus();
		el.setSelectionRange(len, len);
  } else {
		el.value = el.value;
  }
};

*/