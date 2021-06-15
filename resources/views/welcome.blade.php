<head>
    <title>ReMS</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('public/dashb/css/homepage.css') }}" rel="stylesheet" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="menu">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button> 
          <a class="navbar-brand" href="#"><i class="fa fa-globe"></i></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="{{ route('login') }}">Login</a></li> 
          </ul> 
        </div><!--/.nav-collapse -->
      </div>
    </div>

<div class="container-fluid splash" id="splash">
  <div class="container">
    <h1>ReMS</h1> 
    <p>ReMS is a platform that offers virtual learning to students in various schools. Our competent teachers ensures quality education is given to students.</p> 
    <h1 class="intro-text"><span class="lead" id="typed">What we do:</span></h1>
    <span class="continue"><a href="#about"><i class="fa fa-angle-down"></i></a></span>
  </div>
</div>
  
  <!-- About Section -->
  <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About Me</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p class="content-text">Hey there! I am a junior software developer based in Mumbai, India. I work with some of the popular front end technologies to create beautiful websites that get noticed. I seek experience to gain more knowledge in the web development field.
                    </p>
                </div>
                <div class="col-lg-4">
                    <p class="content-text">If you are in need of a beautiful simple website, I'm your guy. I look forward to talking to you soon!</p>
             </div>
            
            </div>
        </div>
    </section>

    <!-- Contact form -->
	<div class="container-fluid contact-me-container content-section" id="contact">
		<div class="container">
			<h1 class="intro-text text-center">Contact Me</h1>
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-user"></i></div>
							<input type="text" class="form-control" id="name" placeholder="Name">
						</div>
					</div>
					
					<div class="form-group">
						<div class="input-group">
              <div class="input-group-addon"><i class="fa fa-at"></i></div>
							<input type="text" class="form-control" id="email" placeholder="Email ID">
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-phone"></i></div>
							<input type="text" class="form-control" id="phone" placeholder="Phone Number">
						</div>
					</div>
				</div>

				<div class="col-sm-12">
					<textarea class="form-control" rows="5" placeholder="Message"></textarea>
				</div>
			</div>

			<div class="text-center">
				<button class="btn btn-default submit-button btn-lg btn-primary"><i class="fa fa-paper-plane"></i> Send</button>
			</div>
		</div>
	</div>


<!-- Footer -->
	<footer>
		<div class="container footer-container">
			<div class="row footer-row">
      <hr class="copyright">
      <h4><i class="fa fa-copyright"></i> COPYRIGHTS 2017 ALL RIGHTS RESERVED</h4>
		</div>
	</footer>

    
    <!-- Bootstrap core JavaScript -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
  </body>
  <script>
$( window ).resize( function() {
  centerSplash();
});

!function($){

    "use strict";

    var Typed = function(el, options){

        // chosen element to manipulate text
        this.el = $(el);
        // options
        this.options = $.extend({}, $.fn.typed.defaults, options);

        // text content of element
        this.text = this.el.text();

        // typing speed
        this.typeSpeed = this.options.typeSpeed;

        // amount of time to wait before backspacing
        this.backDelay = this.options.backDelay;

        // input strings of text
        this.strings = this.options.strings;

        // character number position of current string
        this.strPos = 0;

        // current array position
        this.arrayPos = 0;

        // current string based on current values[] array position
        this.string = this.strings[this.arrayPos];

        // number to stop backspacing on.
        // default 0, can change depending on how many chars
        // you want to remove at the time
        this.stopNum = 0;

        // Looping logic
        this.loop = this.options.loop;
        this.loopCount = this.options.loopCount;
        this.curLoop = 1;
        if (this.loop === false){
            // number in which to stop going through array
            // set to strings[] array (length - 1) to stop deleting after last string is typed
            this.stopArray = this.strings.length-1;
        }
        else{
            this.stopArray = this.strings.length;
        }

        // All systems go!
        this.init();
        this.build();
    }

        Typed.prototype =  {

            constructor: Typed

            , init: function(){
                // begin the loop w/ first current string (global self.string)
                // current string will be passed as an argument each time after this
                this.typewrite(this.string, this.strPos);
            }

            , build: function(){
                this.el.after("<span id=\"typed-cursor\">|</span>");
            }

            // pass current string state to each function
            , typewrite: function(curString, curStrPos){

                // varying values for setTimeout during typing
                // can't be global since number changes each time loop is executed
                var humanize = Math.round(Math.random() * (100 - 30)) + this.typeSpeed;
                var self = this;

                // ------------- optional ------------- //
                // backpaces a certain string faster
                // ------------------------------------ //
                // if (self.arrayPos == 1){
                //  self.backDelay = 50;
                // }
                // else{ self.backDelay = 500; }

                // containg entire typing function in a timeout
                setTimeout(function() {

                    // make sure array position is less than array length
                    if (self.arrayPos < self.strings.length){

                        // start typing each new char into existing string
                        // curString is function arg
                        self.el.text(self.text + curString.substr(0, curStrPos));

                        // check if current character number is the string's length
                        // and if the current array position is less than the stopping point
                        // if so, backspace after backDelay setting
                        if (curStrPos > curString.length && self.arrayPos < self.stopArray){
                            clearTimeout(clear);
                            var clear = setTimeout(function(){
                                self.backspace(curString, curStrPos);
                            }, self.backDelay);
                        }

                        // else, keep typing
                        else{
                            // add characters one by one
                            curStrPos++;
                            // loop the function
                            self.typewrite(curString, curStrPos);
                            // if the array position is at the stopping position
                            // finish code, on to next task
                            if (self.loop === false){
                                if (self.arrayPos === self.stopArray && curStrPos === curString.length){
                                    // animation that occurs on the last typed string
                                    // fires callback function
                                    var clear = self.options.callback();
                                    clearTimeout(clear);
                                }
                            }
                        }
                    }
                    // if the array position is greater than array length
                    // and looping is active, reset array pos and start over.
                    else if (self.loop === true && self.loopCount === false){
                        self.arrayPos = 0;
                        self.init();
                    }
                        else if(self.loopCount !== false && self.curLoop < self.loopCount){
                            self.arrayPos = 0;
                            self.curLoop = self.curLoop+1;
                            self.init();
                        }

                // humanized value for typing
                }, humanize);

            }

            , backspace: function(curString, curStrPos){

                // varying values for setTimeout during typing
                // can't be global since number changes each time loop is executed
                var humanize = Math.round(Math.random() * (100 - 30)) + this.typeSpeed;
                var self = this;

                setTimeout(function() {

                    // ----- this part is optional ----- //
                    // check string array position
                    // on the first string, only delete one word
                    // the stopNum actually represents the amount of chars to
                    // keep in the current string. In my case it's 14.
                     if (self.arrayPos == 1, 2, 3, 4){
                        self.stopNum = 0;
                     }
                    //every other time, delete the whole typed string
                     //else{
                        //self.stopNum = 0;
                     //}

                    // ----- continue important stuff ----- //
                    // replace text with current text + typed characters
                    self.el.text(self.text + curString.substr(0, curStrPos));

                    // if the number (id of character in current string) is
                    // less than the stop number, keep going
                    if (curStrPos > self.stopNum){
                        // subtract characters one by one
                        curStrPos--;
                        // loop the function
                        self.backspace(curString, curStrPos);
                    }
                    // if the stop number has been reached, increase
                    // array position to next string
                    else if (curStrPos <= self.stopNum){
                        clearTimeout(clear);
                        var clear = self.arrayPos = self.arrayPos+1;
                        // must pass new array position in this instance
                        // instead of using global arrayPos
                        self.typewrite(self.strings[self.arrayPos], curStrPos);
                    }

                // humanized value for typing
                }, humanize);

            }

        }

    $.fn.typed = function (option) {
        return this.each(function () {
          var $this = $(this)
            , data = $this.data('typed')
            , options = typeof option == 'object' && option
          if (!data) $this.data('typed', (data = new Typed(this, options)))
          if (typeof option == 'string') data[option]()
        });
    }

    $.fn.typed.defaults = {
        strings: ["Hello, hola, hi! ", "Welcome to my website ", "Go on, scroll down", ":)"],
        // typing and backspacing speed
        typeSpeed: 50, // speed decreases as number increased
        // time before backspacing
        backDelay: 100,
        // loop
        loop: true,
        // false = infinite
        loopCount: false,
        // ending callback function
        callback: function(){ null }
    }


}(window.jQuery);


$(function(){

        $("#typed").typed({
            strings: ["Web Development","Remote Assistance","Virtual Classes","School Management Systems"], //Strings to display when typing
            typeSpeed: 40,
            backDelay: 600,
            loop: true,
            // defaults to false for infinite loop
            loopCount: false,
            callback: function(){ foo(); }
        });

        function foo(){ console.log("Callback"); }

    });
</script>
</html>
