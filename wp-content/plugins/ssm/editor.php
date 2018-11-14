<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript">
		function ssmType(evt, cityName) {
    // Declare all variables
    var i, ssmtabcontent, ssmtablinks;	

   	 // Get all elements with class="ssmtabcontent" and hide them
    	ssmtabcontent = document.getElementsByClassName("ssmtabcontent");
    	for (i = 0; i < ssmtabcontent.length; i++) {
        ssmtabcontent[i].style.display = "none";
    	}

    	// Get all elements with class="ssmtablinks" and remove the class "ssmactive"
    	ssmtablinks = document.getElementsByClassName("ssmtablinks");
    	for (i = 0; i < ssmtablinks.length; i++) {
        ssmtablinks[i].className = ssmtablinks[i].className.replace(" ssmactive", "");
    	}

    	// Show the current tab, and add an "ssmactive" class to the link that opened the tab
    	document.getElementById(cityName).style.display = "block";
	    evt.currentTarget.className += " ssmactive";
		}
</script>
</head>
<body>
	<!--success message-->
<span class="copied">Copied!</span>
<!--tab area-->
<div class="ssm-container">
            <div class="ssm-header">
                <div class="ssmbrand">
                    <h1>Section Style Manager Pro</h1>
                </div> <div class="ssmcustomizerlink">
					<?php printf(
            		__( '<a href="%s">Advanced Customizers</a>.', 'textdomain' ),
            		admin_url( 'customize.php?autofocus[panel]=ssm_advanced_panel' )
       				); ?>
                </div>
            </div>
			<div class="ssmnav">
				<div class="ssmtab">
						<a href="javascript:void(0)" class="ssmtablinks" onclick="ssmType(event, 'Basic')" id="defaultOpen">Basic</a>
						<a href="javascript:void(0)" class="ssmtablinks" onclick="ssmType(event, 'Advanced')">Advanced</a>
						<a href="javascript:void(0)" class="ssmtablinks" onclick="ssmType(event, 'Transparent')">Transparent</a>
				</div>
				<div>
					<a class="supportmail" href="mailto:help@boltthemes.com" title="Get Support"></a>
					<a href="https://boltthemes.com" class="visitbt" title="Visit Bolt Themes"></a>
					<a href="https://facebook.com/boltthemes" class="likebt" title="Like us on Facebook"></a>
				</div>
			</div>
<div id="Basic" class="ssmtabcontent">
  <div class="ssmtitle"><h3>Basic</h3></div>
 	<div class="ssmpanel">
		 <h3>Triangle Sections</h3>
	<p>Add this code to section CSS CLASS box to use the triangle section styles.</p>
		<ul>
		<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/09/tritop1.png" />
		<h2>Triangle Top</h2>
		<div class="div1">ssm-tri-top</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div1">Copy Class</button>	
		</li>
		<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/09/tribottom1.png" />
		<h2>Triangle Bottom</h2>
		<div class="div2">ssm-tri-bottom</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div2">Copy Class</button>	
		</li>
		<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/09/triboth1.png" />
		<h2>Triangle top & bottom</h2>
		<div class="div3">ssm-tri-both</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div3">Copy Class</button>	
		</li>
		</ul>
		<div class="ssmpanel">
		<h3>Diagional Sections</h3>
		<p>Add this code to section CSS CLASS box to use the diagional section styles.</p>
		<ul>
		<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/09/diagionaltop.png" />
		<h2>Diagonal Top</h2>
		<div class="div4">ssm-diagonal-top</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div4">Copy Class</button>	
		</li>
		<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/09/diagionalbottom.png" />
		<h2>Diagonal Bottom</h2>
		<div class="div5">ssm-diagonal-bottom</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div5">Copy Class</button>	
		</li>
		<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/09/diagionalboth.png" />
		<h2>Diagonal top & bottom</h2>
		<div class="div6">ssm-diagonal-both</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div6">Copy Class</button>	
		</li>
		</ul>
		</div>
		<div class="ssmpanel">
			<h3>Half Circle Sections</h3>
			<p>Add this code to section CSS CLASS box to use the half circle section styles.</p>			
		<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/09/halfcircletop.png" />
		<h2>Half Circle Top</h2>
		<div class="div7">ssm-half-circle-top</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div7">Copy Class</button>	
		</li>
		<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/09/halfcirclebottom.png" />
		<h2>Half Circle Bottom</h2>
		<div class="div8">ssm-half-circle-bottom</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div8">Copy Class</button>	
		</li>
		<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/09/halfcircleboth.png" />
		<h2>Half Circle top & bottom</h2>
		<div class="div9">ssm-half-circle-both</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div9">Copy Class</button>	
		</li>
		</ul>
		</div>
		<div class="ssmpanel">
			<h3>Round Split Sections</h3>
			<p>Add this code to section CSS CLASS box to use the round split section styles.</p>
			<ul>
		<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/09/round-split.png" />
		<h2>Round Split</h2>
		<div class="div10">ssm-rnd-split-on</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div10">Copy Class</button>	
		</li>
		<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/09/Untitled-1.png" />
		<h2>Rounded Split with corners</h2>
		<div class="div11">ssm-rnd-split</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div11">Copy Class</button>	
		</li>
			</ul>
		</div>
		<div class="ssmpanel">
			<h3>Angle</h3>
			<p>Add this code to section CSS CLASS box to use the Angle section styles.</p>
			<ul>
			<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/09/angle-left.png" />
		<h2>Angle Left</h2>
		<div class="div12">ssm-angle-left</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div12">Copy Class</button>	
		</li>
		<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/09/angle-right.png" />
		<h2>Angle right</h2>
		<div class="div13">ssm-angle-right</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div13">Copy Class</button>	
		</li>
		<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/09/angle-both.png" />
		<h2>Angle Left & Right</h2>
		<div class="div14">ssm-angle-both</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div14">Copy Class</button>	
		</li>
			</ul>
		</div>
	</div> 

	
</div>

<div id="Advanced" class="ssmtabcontent">
  <div class="ssmtitle"><h3>Advanced</h3></div>
 	<div class="ssmpanel">
		 <h3>Advanced Styles</h3>
		 <ul>
			<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/10/ssm-bxs.png" />
		<h2>Boxes</h2>
		<div class="div15">ssm-bxs</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div15">Copy Class</button>	
		</li>
		<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/10/ssm-cst.png" />
		<h2>Castle</h2>
		<div class="div16">ssm-cse</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div16">Copy Class</button>	
		</li>
		<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/10/ssm-dots.png" />
		<h2>Dots</h2>
		<div class="div17">ssm-dots</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div17">Copy Class</button>	
		</li>
		</ul>
	</div>
	<div class="ssmpanel">
		<h3></h3>
		<ul>
		<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/10/ssm-dbl.png" />
		<h2>Double Lines</h2>
		<div class="div18">ssm-double-lines</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div18">Copy Class</button>	
		</li>
		<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/10/ssm-fc.png" />
		<h2>Folded Corner</h2>
		<div class="div19">ssm-fc</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div19">Copy Class</button>	
		</li>
		<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/10/ssm-izz.png" />
		<h2>inc zig-zag</h2>
		<div class="div20">ssm-inczigzag</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div20">Copy Class</button>	
		</li>
		</ul>
	</div>
	<div class="ssmpanel">
		<h3></h3>
		<ul>
			<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/10/ssm-mt.png" />
		<h2>Muiltiple Triangle</h2>
		<div class="div21">ssm-mt</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div21">Copy Class</button>	
		</li>
		<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/10/ssm-rde.png" />
		<h2>Rounded Edges</h2>
		<div class="div22">ssm-rnde</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div22">Copy Class</button>	
		</li>
		<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/10/ssm-slt.png" />
		<h2>Slit</h2>
		<div class="div23">ssm-slit</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div23">Copy Class</button>	
		</li>
		</ul>
	</div>
	<div class="ssmpanel">
		<h3></h3>
		<ul>
		<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/10/ssm-zz.png" />
		<h2>Zig-Zag</h2>
		<div class="div24">ssm-zz</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div24">Copy Class</button>	
		</li>
		</ul>
	</div>
</div>

<div id="Transparent" class="ssmtabcontent">
  <div class="ssmtitle"><h3>Transparent</h3></div>
 	<div class="ssmpanel">
		 <h3>Transparent Styles</h3>
		 <ul>
		<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/10/ssm-ttb.png" />
		<h2>Big transparent Triangle</h2>
		<div class="div25">ssm-ttb</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div25">Copy Class</button>	
		</li>
		<li class="ssm-card">
		<img src="http://foskermedia.com/wp-content/uploads/2015/10/ssm-tst.png" />
		<h2>Transparent Triangle</h2>
		<div class="div26">ssm-tts</div>
    	<button class="btn" data-clipboard-action="copy" data-clipboard-target=".div26">Copy Class</button>	
		</li>
		</ul>
	</div>
</div>
        </div>
<!--success message-->
<span class="copied">Copied!</span>
<!--Clipboard JS -->
<script src="<?php echo plugins_url('clipboard.min.js', __FILE__); ?>"></script>
<script>

    var clipboard = new Clipboard('.btn');

    clipboard.on('success', function(e) {
        console.log(e);
    });

    clipboard.on('error', function(e) {
        console.log(e);
	});
( function($) {
	var clip = new Clipboard('.btn');
	clip.on('success', function(e) {
    $('.copied').show();
		$('.copied').fadeOut(3000);
});
} ) ( jQuery );
    </script> 
</body>
<script>
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</html> 