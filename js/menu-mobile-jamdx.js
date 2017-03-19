window.onload = function() {
	
	var burgerMenuBtn = document.querySelector('[data-js=burgerMenuBtn]');
	var mobileSearchBtn = document.querySelector('[data-js=mobileSearchBtn]');
	var mobileMenuWrapper = document.getElementById('menu-jamdx');
	var acc = document.querySelectorAll("#menu-jamdx .menu-item-has-children");
	var i;		        

	// Add mobile menu arrows and accordion functionality
	for (i = 0; i < acc.length; i++) {
	    arrowButton = document.createElement('i');
	    arrowButton.classList = 'mobile-submenu fa';

	    acc[i].appendChild(arrowButton);

	    acc[i].lastChild.onclick = function(){
	        /* Toggle between adding and removing the "active" class,
	        to highlight the button that controls the panel */
	        this.classList.toggle("mobile-submenu--closed");
	        this.parentElement.classList.toggle("submenu-list-open");
	        
	        /* Toggle between hiding and showing the active panel */
	        var panel = this.previousElementSibling;
	        if (panel.style.maxHeight){
	          panel.style.maxHeight = null;
	        } else {
	          panel.style.maxHeight = panel.scrollHeight + "px";
	        } 
	    }
	}

	// Mobile menu display
	burgerMenuBtn.onclick = function(){
		this.classList.toggle('close-menu-btn');
	    document.body.classList.toggle("mobile-menu-open");

	}

	//  Mobile search display
	mobileSearchBtn.onclick = function(){
	    document.body.classList.toggle("mobile-search-open");
	}
};