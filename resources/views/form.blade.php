<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Wilio Survey, Quotation, Review and Register form Wizard by Ansonika.">
    <meta name="author" content="Ansonika">
    <title>Kostenfreie Renovierungsanfrage</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/images/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#ffc40d">
    <meta name="msapplication-config" content="/images/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">



    <meta property="og:image" content="/images/og-image.jpg">
    <meta property="og:image:height" content="421">
    <meta property="og:image:width" content="805">
    <meta property="og:title" content="Renovierung Langenzenn">
    <meta property="og:description" content="Wir sind als Raumgestalter Ihr Partner für Renovierung in Nürnberg, Fürth und Erlangen. Wir arbeiten ✓ pünktlich, ✓ schnell und ✓ zuverlässig. Jetzt kostenfreies Angebot anfordern.">
    <meta property="og:url" content="https://tiefel-renovierung.de">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="/form/css/bootstrap.min.css" rel="stylesheet">
	<link href="/form/css/menu.css" rel="stylesheet">
    <link href="/form/css/style.css" rel="stylesheet">
	<link href="/form/css/vendors.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="/form/css/custom.css" rel="stylesheet">
	
	<!-- MODERNIZR MENU -->
	<script src="/form/js/modernizr.js"></script>
	    <script>
var gaProperty = 'UA-136075368-1';
var disableStr = 'ga-disable-' + gaProperty;
if (document.cookie.indexOf(disableStr + '=true') > -1) {
    window[disableStr] = true;
}
function gaOptout() {
    document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
    window[disableStr] = true;
    alert('Das Tracking durch Google Analytics wurde in Ihrem Browser für diese Website deaktiviert.');
}
</script>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-136075368-1', 'auto');
ga('set', 'anonymizeIp', true);
ga('send', 'pageview');
</script>
</head>

<body>
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div><!-- /Preload -->
	
	<div id="loader_form">
		<div data-loader="circle-side-2"></div>
	</div><!-- /loader_form -->
	
	<? /*<nav>
		<ul class="cd-primary-nav">
			<li><a href="index.html" class="animated_link">Home</a></li>
			<li><a href="quotation-wizard-version.html" class="animated_link">Quote Version</a></li>
			<li><a href="review-wizard-version.html" class="animated_link">Review Version</a></li>
			<li><a href="registration-wizard-version.html" class="animated_link">Registration Version</a></li>
			<li><a href="about.html" class="animated_link">About Us</a></li>
			<li><a href="contacts.html" class="animated_link">Contact Us</a></li>
		</ul>
	</nav>
	<!-- /menu --> */ ?>
	
	<div class="container-fluid full-height">
		<div class="row row-height">
			<div class="col-lg-6 content-left">
				<div class="content-left-wrapper">
					<a href="/" id="logo"><img src="/images/logo_white.svg" alt="" width="150"></a>
					
					<div>
						
						<div id="coverContact"><h2>Kostenfreies Angebot</h2>
						<p>Wir erstellen gerne ein kostenfreies Angebot über Ihr Renovierunsprojekt. Beantworten Sie uns einfach fünf Fragen zu Ihrem Projekt und wir werden uns umgehend bei Ihnen melden.</p>
						<? /* <a href="#0" class="btn_1 rounded">Purchase this template</a> */ ?>
						<a href="#start" class="btn_1 rounded mobile_btn">Anfrage starten!</a>
						</div>
					</div>
					<div class="copy"> &copy; Copyright {{date("Y")}} - Tiefel Raumgestaltung</div>
				</div>
				<!-- /content-left-wrapper -->
			</div>
			<!-- /content-left -->

			<div class="col-lg-6 content-right" id="start">
				<div id="wizard_container">
					<div id="top-wizard">
							<div id="progressbar"></div>
						</div>
						<!-- /top-wizard -->
						<form id="wrapped" method="POST" enctype="multipart/form-data" action="/mail">
							{{csrf_field()}}
							<input id="website" name="website" type="text" value="">
							<!-- Leave for security protection, read docs for details -->
							<div id="middle-wizard">
								<div class="step">
									<h3 class="main_question"><strong>1/5</strong>Was haben Sie vor?</h3>
									<div class="form-group">
										<label class="container_check version_2">Zimmer renovieren
											<input type="checkbox" name="question_1[]" value="Zimmer renovieren" class="required" onchange="getVals(this, 'question_1');">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="form-group">
										<label class="container_check version_2">Wände malern
											<input type="checkbox" name="question_1[]" value="Wände malern" class="required" onchange="getVals(this, 'question_1');">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="form-group">
										<label class="container_check version_2">Bodenbeläge erneuern
											<input type="checkbox" name="question_1[]" value="Bodenbeläge erneuern" class="required" onchange="getVals(this, 'question_1');">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="form-group">
										<label class="container_check version_2">Vorhänge ändern
											<input type="checkbox" name="question_1[]" value="Vorhänge ändern" class="required" onchange="getVals(this, 'question_1');">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="form-group">
										<label class="container_check version_2">Markisen erneuern
											<input type="checkbox" name="question_1[]" value="Markisen erneuern" class="required" onchange="getVals(this, 'question_1');">
											<span class="checkmark"></span>
										</label>
									</div>
									
								</div>
								<!-- /step-->
								<div class="step">
									<h3 class="main_question"><strong>2/5</strong>Projektbeschreibung</h3>
									<div class="form-group add_top_30">
										<label>Beschreiben Sie das Projekt genauer</label>
										<textarea name="additional_message" class="form-control required" style="height:150px;" placeholder="Maße, Anzahl der Zimmer, Fläche in qm ..." onkeyup="getVals(this, 'additional_message');"></textarea>
									</div>
									<? /*<div class="form-group add_top_30">
										<label>Optional file upload<br><small>(Files accepted: gif, jpg, jpeg, .png, .pdf - Max file size: 50k for demo purpose, you can increase based on your host settings.)</small></label>
										<div class="fileupload">
											<input type="file" name="fileupload" accept="image/*,.pdf" onchange="getVals(this, 'fileupload');">
										</div>
									</div> */ ?>
								</div>
								<!-- /step-->
								<div class="step">
									<h3 class="main_question"><strong>3/5</strong>Wie hoch ist Ihr Budget?</h3>
									<div class="budget_slider">
										<input type="range" name="budget" min="0" max="10000" step="500" value="0" data-orientation="horizontal" onchange="getVals(this, 'budget');">
										<span>€ </span>
									</div>
									<p><strong>Warum fragen wir das?</strong><br>Wenn wir Ihr Budget kennen, können wir bereits zu unserem Erstgespräch mögliche Materialien und Produktmuster mitbringen.</p>
								</div>
								<!-- /step-->
								<div class="step">
									<h3 class="main_question"><strong>4/5</strong>Ihre Kontaktdaten</h3>
									<div class="form-group">
										<input type="text" name="firstname" class="form-control required" placeholder="Vorname">
									</div>
									<div class="form-group">
										<input type="text" name="lastname" class="form-control required" placeholder="Nachname">
									</div>
									<div class="form-group">
										<input type="email" name="email" class="form-control required" placeholder="Ihre E-Mail">
									</div>
									<div class="form-group">
										<input type="text" name="telephone" class="form-control" placeholder="Telefon">
									</div>
									<div class="form-group terms">
										<label class="container_check">Ja, ich habe die <a href="/datenschutz" target="_blank">Datenschutzerklärung</a> gelesen und bin mit der Verabeitung und Speicherung meiner Daten einverstanden.
											<input type="checkbox" name="terms" class="required">
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
								<!-- /step-->
								<div class="submit step">
									<h3 class="main_question"><strong>5/5</strong>Zusammenfassung</h3>
									<div class="summary">
										<ul>
											<li><strong>1</strong>
												<h5>Was haben Sie vor?</h5>
												<p id="question_1"></p>
											</li>
											<li><strong>2</strong>
												<h5>Projektinformationen</h5>
												<p id="additional_message"></p>
											</li>
											<li><strong>3</strong>
												<h5>Wie hoch ist Ihr Budget?</h5>
												<p><span id="budget"></span>€</p>
											</li>
										</ul>
									</div>
								</div>
								<!-- /step-->
							</div>
							<!-- /middle-wizard -->
							<div id="bottom-wizard">
								<button type="button" name="backward" class="backward">Zurück</button>
								<button type="button" name="forward" class="forward">Weiter</button>
								<button type="submit" name="process" class="submit">Absenden</button>
							</div>
							<!-- /bottom-wizard -->
						</form>
					</div>
					<!-- /Wizard container -->
			</div>
			<!-- /content-right-->
		</div>
		<!-- /row-->
	</div>
	<!-- /container-fluid -->

	<? /*<div class="cd-overlay-nav">
		<span></span>
	</div>
	<!-- /cd-overlay-nav -->

	<div class="cd-overlay-content">
		<span></span>
	</div>
	<!-- /cd-overlay-content -->

	<a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>
	<!-- /menu button --> */?>
	
	
	
	<!-- COMMON SCRIPTS -->
	<script src="/form/js/jquery-3.2.1.min.js"></script>
    <script src="/form/js/common_scripts.min.js"></script>
	<script src="/form/js/velocity.min.js"></script>
	<script src="/form/js/functions.js"></script>

	<!-- Wizard script -->
	<script src="/form/js/quotation_func.js"></script>
	<script type="text/javascript">
    window.smartlook||(function(d) {
    var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
    var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
    c.charset='utf-8';c.src='https://rec.smartlook.com/recorder.js';h.appendChild(c);
    })(document);
    smartlook('init', '64df59878b723adc43f8f37c706e6a92c2ab71fb');
</script>
</body>
</html>