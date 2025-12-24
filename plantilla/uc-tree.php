<?php 
	 require_once __DIR__ . '/config/dz.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo !empty($DexignZoneSettings['pagelevel'][$CurrentPage]['title']) ? $DexignZoneSettings['pagelevel'][$CurrentPage]['title'].' | ' : '' ; echo $DexignZoneSettings['site_level']['site_title'] ?></title>
	<?php include 'elements/meta.php';?>
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="<?php echo $DexignZoneSettings['site_level']['favicon']?>">
	<?php include 'elements/page-css.php'; ?>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
   <?php include 'elements/preloader.php'; ?>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
		<?php include 'elements/nav-header.php'; ?>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Chat box start
        ***********************************-->
				<?php include 'elements/chatbox.php'; ?>

		<!--**********************************
            Chat box End
        ***********************************-->


		
		
        <!--**********************************
            Header start
        ***********************************-->
      		<?php include 'elements/header.php'; ?>

                    
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
		<?php include 'elements/sidebar.php'; ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Plugins</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Tree</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                   <div class="col-xl-6">
					<div class="card">
						<div class="card-header flex-wrap">
							<h5 class="card-title">Basic Example 1 </h5>
							<div class="dz-toolbar nav nav-pills" id="pills-tab01" role="tablist">
								<a class="btn btn-primary btn-sm active" data-bs-toggle="pill" id="PreviewTab01" href="#pills-Preview01" aria-controls="pills-Preview01" role="tab" aria-selected="false">Preview</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="HtmlTab01" href="#pills-HTML01" aria-controls="pills-HTML01" role="tab" aria-selected="true">HTML</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="JavascriptTab01" href="#pills-Javascript01" aria-controls="pills-Javascript01" role="tab" aria-selected="false">Javascript</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="CssTab01" href="#pills-Css01" aria-controls="pills-Css01" role="tab" aria-selected="false">Scss</a>
							</div>
						</div>
						<div class="card-body">
							<!-- DZ Element Container -->
							<div class="dz-element tab-content" id="pills-tabContent01">
								<div class="dz-preview tab-pane fade show active" role="tabpanel" id="pills-Preview01" aria-labelledby="PreviewTab01">
									<div id="dz_tree" class="tree-demo">
					<ul>
						<li data-jstree='{ "opened" : true }'>xhtml
							<ul>
								<li data-jstree='{ "selected" : false }'>css</li>
								<li data-jstree='{ "selected" : false }'>icons
									<ul>
										<li data-jstree='{ "opened" : true }'>avasta</li>
										<li data-jstree='{ "opened" : true }'>feather</li>
										<li data-jstree='{ "opened" : true }'>flaticon</li>
										<li data-jstree='{ "opened" : true }'>font-awesome-old</li>
										<li data-jstree='{ "opened" : true }'>helveticaNeue</li>
										<li data-jstree='{ "opened" : true }'>icomoon</li>
										<li data-jstree='{ "opened" : true }'>line-awesome</li>
										<li data-jstree='{ "opened" : true }'>material-design-iconic-font</li>
										<li data-jstree='{ "opened" : true }'>simple-line-icons</li>
										<li data-jstree='{ "opened" : true }'>themify-icons</li>
									</ul>
								</li>
								<li data-jstree='{ "selected" : false }'>images
									<ul>
										<li data-jstree='{ "opened" : true }'>avatar</li>
										<li data-jstree='{ "opened" : true }'>big</li>
										<li data-jstree='{ "opened" : true }'>card</li>
										<li data-jstree='{ "opened" : true }'>product</li>
										<li data-jstree='{ "opened" : true }'>profile</li>
										<li data-jstree='{ "opened" : true }'>tab</li>
									</ul>
								</li>
								<li data-jstree='{ "selected" : false }'>js
									<ul>
										<li data-jstree='{ "opened" : true }'>dashboard</li>
										<li data-jstree='{ "opened" : true }'>plugins-init</li>
									</ul>
								</li>
								<li data-jstree='{ "selected" : false }'>scss
									<ul>
										<li data-jstree='{ "opened" : true }'>abstracts</li>
										<li data-jstree='{ "opened" : true }'>base</li>
										<li data-jstree='{ "selected" : false }'>components
											<ul>
												<li data-jstree='{ "opened" : true }'>app</li>
												<li data-jstree='{ "opened" : true }'>charts</li>
												<li data-jstree='{ "opened" : true }'>forms</li>
												<li data-jstree='{ "opened" : true }'>ico</li>
												<li data-jstree='{ "opened" : true }'>map</li>
												<li data-jstree='{ "opened" : true }'>tables</li>
												<li data-jstree='{ "opened" : true }'>uc</li>
												<li data-jstree='{ "opened" : true }'>ui</li>
												<li data-jstree='{ "opened" : true }'>widget</li>
											</ul>
										</li>
										<li data-jstree='{ "selected" : false }'>layout
											<ul>
												<li data-jstree='{ "opened" : true }'>footer</li>
												<li data-jstree='{ "opened" : true }'>header</li>
												<li data-jstree='{ "opened" : true }'>rtl</li>
												<li data-jstree='{ "opened" : true }'>sidebar</li>
												<li data-jstree='{ "opened" : true }'>theme</li>
												<li data-jstree='{ "opened" : true }'>typography</li>
												<li data-jstree='{ "opened" : true }'>version-dark</li>
												<li data-jstree='{ "opened" : true }'>version-transparent</li>
											</ul>
										</li>
										<li data-jstree='{ "opened" : true }'>pages</li>
									</ul>
								</li>
								<li data-jstree='{ "selected" : false }'>vendor
									<ul>
										<li data-jstree='{ "opened" : true }'>amcharts</li>
										<li data-jstree='{ "opened" : true }'>animate</li>
										<li data-jstree='{ "opened" : true }'>aos</li>
										<li data-jstree='{ "opened" : true }'>apexchart</li>
										<li data-jstree='{ "opened" : true }'>bootstrap</li>
										<li data-jstree='{ "opened" : true }'>bootstrap4-notify</li>
										<li data-jstree='{ "opened" : true }'>bootstrap-daterangepicker</li>
										<li data-jstree='{ "opened" : true }'>bootstrap-material-datetimepicker</li>
										<li data-jstree='{ "opened" : true }'>bootstrap-multiselect</li>
										<li data-jstree='{ "opened" : true }'>bootstrap-select</li>
										<li data-jstree='{ "opened" : true }'>bootstrap-tagsinput</li>
										<li data-jstree='{ "opened" : true }'>bootstrap-touchspin</li>
										<li data-jstree='{ "opened" : true }'>bootstrap-v4-rtl</li>
										<li data-jstree='{ "opened" : true }'>chart.js</li>
										<li data-jstree='{ "opened" : true }'>chartist</li>
										<li data-jstree='{ "opened" : true }'>chartist-plugin-tooltips</li>
										<li data-jstree='{ "opened" : true }'>clockpicker</li>
										<li data-jstree='{ "opened" : true }'>datatables</li>
										<li data-jstree='{ "opened" : true }'>dropzone</li>
										<li data-jstree='{ "opened" : true }'>flot</li>
										<li data-jstree='{ "opened" : true }'>flot-spline</li>
										<li data-jstree='{ "opened" : true }'>fullcalendar</li>
										<li data-jstree='{ "opened" : true }'>global</li>
										<li data-jstree='{ "opened" : true }'>highlightjs</li>
										<li data-jstree='{ "opened" : true }'>jquery</li>
										<li data-jstree='{ "opened" : true }'>jquery-asColor</li>
										<li data-jstree='{ "opened" : true }'>jquery-asColorPicker</li>
										<li data-jstree='{ "opened" : true }'>jquery-asGradient</li>
										<li data-jstree='{ "opened" : true }'>jquery-sparkline</li>
										<li data-jstree='{ "opened" : true }'>jquery-steps</li>
										<li data-jstree='{ "opened" : true }'>jqueryui</li>
										<li data-jstree='{ "opened" : true }'>jquery-validation</li>
										<li data-jstree='{ "opened" : true }'>jqvmap</li>
										<li data-jstree='{ "opened" : true }'>metismenu</li>
										<li data-jstree='{ "opened" : true }'>moment</li>
										<li data-jstree='{ "opened" : true }'>morris</li>
										<li data-jstree='{ "opened" : true }'>nestable2</li>
										<li data-jstree='{ "opened" : true }'>nouislider</li>
										<li data-jstree='{ "opened" : true }'>peity</li>
										<li data-jstree='{ "opened" : true }'>perfect-scrollbar</li>
										<li data-jstree='{ "opened" : true }'>pickadate</li>
										<li data-jstree='{ "opened" : true }'>raphael</li>
										<li data-jstree='{ "opened" : true }'>select2</li>
										<li data-jstree='{ "opened" : true }'>summernote</li>
										<li data-jstree='{ "opened" : true }'>svganimation</li>
										<li data-jstree='{ "opened" : true }'>sweetalert2</li>
										<li data-jstree='{ "opened" : true }'>toastr</li>
										<li data-jstree='{ "opened" : true }'>wnumb</li>
									</ul>
								</li>
								<li data-jstree='{ "type" : "file" }'>index.php</li>
								<li data-jstree='{ "type" : "file" }'>index-2.php</li>
								<li data-jstree='{ "type" : "file" }'>market.php</li>
								<li data-jstree='{ "type" : "file" }'>coin-details.php</li>
								<li data-jstree='{ "type" : "file" }'>portofolio.php</li>
								<li data-jstree='{ "type" : "file" }'>.....</li>
							</ul>
						</li>
					</ul>
				</div>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-HTML01" aria-labelledby="HtmlTab01">
<pre class="prettyprint lang-html linenums"><code class="language-html">
	&lt;div id="dz_tree" class="tree-demo"&gt;
&lt;ul&gt;
	&lt;li data-jstree='{ "opened" : true }'&gt;xhtml
		&lt;ul&gt;
			&lt;li data-jstree='{ "selected" : false }'&gt;css&lt;/li&gt;
			&lt;li data-jstree='{ "selected" : false }'&gt;icons
				&lt;ul&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;avasta&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;feather&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;flaticon&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;font-awesome-old&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;helveticaNeue&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;icomoon&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;line-awesome&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;material-design-iconic-font&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;simple-line-icons&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;themify-icons&lt;/li&gt;
				&lt;/ul&gt;
			&lt;/li&gt;
			&lt;li data-jstree='{ "selected" : false }'&gt;images
				&lt;ul&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;avatar&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;big&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;card&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;product&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;profile&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;tab&lt;/li&gt;
				&lt;/ul&gt;
			&lt;/li&gt;
			&lt;li data-jstree='{ "selected" : false }'&gt;js
				&lt;ul&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;dashboard&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;plugins-init&lt;/li&gt;
				&lt;/ul&gt;
			&lt;/li&gt;
			&lt;li data-jstree='{ "selected" : false }'&gt;scss
				&lt;ul&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;abstracts&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;base&lt;/li&gt;
					&lt;li data-jstree='{ "selected" : false }'&gt;components
						&lt;ul&gt;
							&lt;li data-jstree='{ "opened" : true }'&gt;app&lt;/li&gt;
							&lt;li data-jstree='{ "opened" : true }'&gt;charts&lt;/li&gt;
							&lt;li data-jstree='{ "opened" : true }'&gt;forms&lt;/li&gt;
							&lt;li data-jstree='{ "opened" : true }'&gt;ico&lt;/li&gt;
							&lt;li data-jstree='{ "opened" : true }'&gt;map&lt;/li&gt;
							&lt;li data-jstree='{ "opened" : true }'&gt;tables&lt;/li&gt;
							&lt;li data-jstree='{ "opened" : true }'&gt;uc&lt;/li&gt;
							&lt;li data-jstree='{ "opened" : true }'&gt;ui&lt;/li&gt;
							&lt;li data-jstree='{ "opened" : true }'&gt;widget&lt;/li&gt;
						&lt;/ul&gt;
					&lt;/li&gt;
					&lt;li data-jstree='{ "selected" : false }'&gt;layout
						&lt;ul&gt;
							&lt;li data-jstree='{ "opened" : true }'&gt;footer&lt;/li&gt;
							&lt;li data-jstree='{ "opened" : true }'&gt;header&lt;/li&gt;
							&lt;li data-jstree='{ "opened" : true }'&gt;rtl&lt;/li&gt;
							&lt;li data-jstree='{ "opened" : true }'&gt;sidebar&lt;/li&gt;
							&lt;li data-jstree='{ "opened" : true }'&gt;theme&lt;/li&gt;
							&lt;li data-jstree='{ "opened" : true }'&gt;typography&lt;/li&gt;
							&lt;li data-jstree='{ "opened" : true }'&gt;version-dark&lt;/li&gt;
							&lt;li data-jstree='{ "opened" : true }'&gt;version-transparent&lt;/li&gt;
						&lt;/ul&gt;
					&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;pages&lt;/li&gt;
				&lt;/ul&gt;
			&lt;/li&gt;
			&lt;li data-jstree='{ "selected" : false }'&gt;vendor
				&lt;ul&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;amcharts&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;animate&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;aos&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;apexchart&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;bootstrap&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;bootstrap4-notify&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;bootstrap-daterangepicker&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;bootstrap-material-datetimepicker&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;bootstrap-multiselect&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;bootstrap-select&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;bootstrap-tagsinput&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;bootstrap-touchspin&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;bootstrap-v4-rtl&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;chart.js&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;chartist&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;chartist-plugin-tooltips&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;clockpicker&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;datatables&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;dropzone&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;flot&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;flot-spline&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;fullcalendar&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;global&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;highlightjs&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;jquery&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;jquery-asColor&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;jquery-asColorPicker&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;jquery-asGradient&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;jquery-sparkline&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;jquery-steps&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;jqueryui&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;jquery-validation&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;jqvmap&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;metismenu&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;moment&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;morris&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;nestable2&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;nouislider&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;peity&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;perfect-scrollbar&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;pickadate&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;raphael&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;select2&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;summernote&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;svganimation&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;sweetalert2&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;toastr&lt;/li&gt;
					&lt;li data-jstree='{ "opened" : true }'&gt;wnumb&lt;/li&gt;
				&lt;/ul&gt;
			&lt;/li&gt;
			&lt;li data-jstree='{ "type" : "file" }'&gt;index.php&lt;/li&gt;
			&lt;li data-jstree='{ "type" : "file" }'&gt;index-2.php&lt;/li&gt;
			&lt;li data-jstree='{ "type" : "file" }'&gt;market.php&lt;/li&gt;
			&lt;li data-jstree='{ "type" : "file" }'&gt;coin-details.php&lt;/li&gt;
			&lt;li data-jstree='{ "type" : "file" }'&gt;portofolio.php&lt;/li&gt;
			&lt;li data-jstree='{ "type" : "file" }'&gt;.....&lt;/li&gt;
		&lt;/ul&gt;
	&lt;/li&gt;
&lt;/ul&gt;
&lt;/div&gt;
</code></pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Javascript01" aria-labelledby="JavascriptTab01">
<pre class="prettyprint lang-js linenums"><code class="language-html">
	&lt;script&gt;
	$("#dz_tree").jstree({
		"core": {
			"themes": {
				"responsive": false
			}
		},
		"types": {
			"default": {
				"icon": "fa fa-folder"
			},
			"file": {
				"icon": "fa fa-file-text"
			}
		},
		"plugins": ["types"]
	});
	&lt;/script&gt;
	

</code>

</pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Css01">
<pre class="prettyprint lang-css linenums"><code class="language-html">

	/* Code */
.code{
	padding: 6px 12px;
    background-color: #232323;
    margin: 10px 0;
	display: block;
	color: #fff;
}
.jstree-default .jstree-anchor {
	color: #3F4254;
	padding: 0 8px 0 4px; 
}
.jstree-default .jstree-icon {
	color: #ffad0e;
	font-size: 1.3rem; 
}
.jstree-default .jstree-icon.fa {
    font-size: 1.2rem; 
}
.jstree-default .jstree-icon.la {
   font-size: 1.5rem; 
}
.jstree-default .jstree-disabled {
	line-height: auto;
	opacity: 0.7; 
	height: auto;
	cursor: not-allowed;
}
.jstree-default .jstree-disabled .jstree-icon {
    color: #3F4254; 
}	
.jstree-default .fa-file-text {
    color: #969696;
}	
.jstree-default .jstree-clicked {
	border: 0;
	box-shadow: none; 
	background: #F3F6F9;
	-webkit-box-shadow: none;
}
.jstree-default .jstree-hovered {
	box-shadow: none; 
	border: 0;
	background-color: var(--light);
	-webkit-box-shadow: none;
}
.jstree-default .jstree-wholerow-clicked,
.jstree-default .jstree-wholerow-clicked {
	box-shadow: none; 
	background: #EBEDF3;
	-webkit-box-shadow: none;
}
.jstree-default .jstree-wholerow-hovered,
.jstree-default.jstree-wholerow .jstree-wholerow-hovered {
	border: 0;
	box-shadow: none; 
	-webkit-box-shadow: none;
	background-color: #F3F6F9;
}
.jstree-open > .jstree-anchor > .fa-folder:before {
	content: "\f07c"; 
	color:#ffad0e;
	margin-left: 2px;
}
.jstree-open > .jstree-anchor > .la-folder:before {
	margin-left: 2px;
	color:#ffad0e;	
	content: "\f200"; 
}
.jstree-default .jstree-clicked{
   background: transparent;	
}
.jstree-anchor{
	background: transparent;
    margin: 0!important;
    padding: 0!important;
    color: var(--text-dark)!important;
}
</code>

</pre>
								</div>
							</div>
							<!-- DZ Element Container End -->
						</div>
						<div class="card-footer text-muted">
							2 days ago
						</div>
					</div>
				</div>
				<div class="col-xl-6">
					<div class="card">
						<div class="card-header flex-wrap">
							<h5 class="card-title">Basic Example 2</h5>
							<div class="dz-toolbar nav nav-pills" id="pills-tab02" role="tablist">
								<a class="btn btn-primary btn-sm active" data-bs-toggle="pill" id="PreviewTab02" href="#pills-Preview02" aria-controls="pills-Preview02" role="tab" aria-selected="false">Preview</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="HtmlTab02" href="#pills-HTML02" aria-controls="pills-HTML02" role="tab" aria-selected="true">HTML</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="JavascriptTab02" href="#pills-Javascript02" aria-controls="pills-Javascript02" role="tab" aria-selected="false">Javascript</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="CssTab02" href="#pills-Css02" aria-controls="pills-Css02" role="tab" aria-selected="false">Scss</a>
							</div>
						</div>
						<div class="card-body">
							<!-- DZ Element Container -->
							<div class="dz-element tab-content" id="pills-tabContentOne">
								<div class="dz-preview tab-pane fade show active" role="tabpanel" id="pills-Preview02" aria-labelledby="PreviewTab02">
									<div id="dz_tree-1">
										<ul>
											<li data-jstree='{ "opened" : true }'>One</li>
											<li data-jstree='{ "opened" : true }'>Two</li>
											<li data-jstree='{ "opened" : true }'>Three
												<ul>
													<li data-jstree='{ "opened" : true }'>Second-one</li>
													<li data-jstree='{ "opened" : true }'>Second-two</li>
													<li data-jstree='{ "opened" : true }'>Second-three
														<ul>
															<li data-jstree='{ "opened" : true }'>Third-one
																<ul>
																	<li data-jstree='{ "opened" : true }'>Fourth-one</li>
																	<li data-jstree='{ "opened" : true }'>Fourth-two</li>
																	<li data-jstree='{ "opened" : true }'>Fourth-three</li>
																</ul>
															</li>
															<li data-jstree='{ "opened" : true }'>Third-two</li>
															<li data-jstree='{ "opened" : true }'>Third-three
																<ul>
																	<li data-jstree='{ "opened" : true }'>Fourth-one</li>
																	<li data-jstree='{ "opened" : true }'>Fourth-two</li>
																	<li data-jstree='{ "opened" : true }'>Fourth-three</li>
																</ul>
															</li>
														</ul>
													</li>
												</ul>
											</li>
										</ul>
									</div>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-HTML02" aria-labelledby="HtmlTab02">
<pre class="prettyprint lang-html linenums"><code class="language-html">
	&lt;div id="dz_tree-1"&gt;
	&lt;ul&gt;
		&lt;li data-jstree='{ "opened" : true }'&gt;One&lt;/li&gt;
		&lt;li data-jstree='{ "opened" : true }'&gt;Two&lt;/li&gt;
		&lt;li data-jstree='{ "opened" : true }'&gt;Three
			&lt;ul&gt;
				&lt;li data-jstree='{ "opened" : true }'&gt;Second-one&lt;/li&gt;
				&lt;li data-jstree='{ "opened" : true }'&gt;Second-two&lt;/li&gt;
				&lt;li data-jstree='{ "opened" : true }'&gt;Second-three
					&lt;ul&gt;
						&lt;li data-jstree='{ "opened" : true }'&gt;Third-one
							&lt;ul&gt;
								&lt;li data-jstree='{ "opened" : true }'&gt;Fourth-one&lt;/li&gt;
								&lt;li data-jstree='{ "opened" : true }'&gt;Fourth-two&lt;/li&gt;
								&lt;li data-jstree='{ "opened" : true }'&gt;Fourth-three&lt;/li&gt;
							&lt;/ul&gt;
						&lt;/li&gt;
						&lt;li data-jstree='{ "opened" : true }'&gt;Third-two&lt;/li&gt;
						&lt;li data-jstree='{ "opened" : true }'&gt;Third-three
							&lt;ul&gt;
								&lt;li data-jstree='{ "opened" : true }'&gt;Fourth-one&lt;/li&gt;
								&lt;li data-jstree='{ "opened" : true }'&gt;Fourth-two&lt;/li&gt;
								&lt;li data-jstree='{ "opened" : true }'&gt;Fourth-three&lt;/li&gt;
							&lt;/ul&gt;
						&lt;/li&gt;
					&lt;/ul&gt;
				&lt;/li&gt;
			&lt;/ul&gt;
		&lt;/li&gt;
	&lt;/ul&gt;
&lt;/div&gt;
</code></pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Javascript02" aria-labelledby="JavascriptTab02">
<pre class="prettyprint lang-js linenums"><code class="language-html">
	&lt;script&gt;
	$(document).ready(function(){
		$('#dz_tree-1').jstree();
	  });

	&lt;/script&gt;
	
</code>

</pre>
								</div>
<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Css02">
<pre class="prettyprint lang-css linenums"><code class="language-html">

	/* Code */
.code{
	padding: 6px 12px;
    background-color: #232323;
    margin: 10px 0;
	display: block;
	color: #fff;
}
.jstree-default .jstree-anchor {
	color: #3F4254;
	padding: 0 8px 0 4px; 
}
.jstree-default .jstree-icon {
	color: #ffad0e;
	font-size: 1.3rem; 
}
.jstree-default .jstree-icon.fa {
    font-size: 1.2rem; 
}
.jstree-default .jstree-icon.la {
   font-size: 1.5rem; 
}
.jstree-default .jstree-disabled {
	line-height: auto;
	opacity: 0.7; 
	height: auto;
	cursor: not-allowed;
}
.jstree-default .jstree-disabled .jstree-icon {
    color: #3F4254; 
}	
.jstree-default .fa-file-text {
    color: #969696;
}	
.jstree-default .jstree-clicked {
	border: 0;
	box-shadow: none; 
	background: #F3F6F9;
	-webkit-box-shadow: none;
}
.jstree-default .jstree-hovered {
	box-shadow: none; 
	border: 0;
	background-color: var(--light);
	-webkit-box-shadow: none;
}
.jstree-default .jstree-wholerow-clicked,
.jstree-default .jstree-wholerow-clicked {
	box-shadow: none; 
	background: #EBEDF3;
	-webkit-box-shadow: none;
}
.jstree-default .jstree-wholerow-hovered,
.jstree-default.jstree-wholerow .jstree-wholerow-hovered {
	border: 0;
	box-shadow: none; 
	-webkit-box-shadow: none;
	background-color: #F3F6F9;
}
.jstree-open > .jstree-anchor > .fa-folder:before {
	content: "\f07c"; 
	color:#ffad0e;
	margin-left: 2px;
}
.jstree-open > .jstree-anchor > .la-folder:before {
	margin-left: 2px;
	color:#ffad0e;	
	content: "\f200"; 
}
.jstree-default .jstree-clicked{
   background: transparent;	
}
.jstree-anchor{
	background: transparent;
    margin: 0!important;
    padding: 0!important;
    color: var(--text-dark)!important;
}
</code>

</pre>
								</div>
							</div>
							<!-- DZ Element Container End -->
						</div>
						<div class="card-footer text-muted">
							2 days ago
						</div>
					</div>
				</div>
				<div class="col-xl-6">
					<div class="card">
						<div class="card-header flex-wrap">
							<h5 class="card-title">Basic Example 3</h5>
							<div class="dz-toolbar nav nav-pills" id="pills-tab03" role="tablist">
								<a class="btn btn-primary btn-sm active" data-bs-toggle="pill" id="PreviewTab03" href="#pills-Preview03" aria-controls="pills-Preview03" role="tab" aria-selected="false">Preview</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="HtmlTab03" href="#pills-HTML03" aria-controls="pills-HTML03" role="tab" aria-selected="true">HTML</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="JavascriptTab03" href="#pills-Javascript03" aria-controls="pills-Javascript03" role="tab" aria-selected="false">Javascript</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="CssTab03" href="#pills-Css03" aria-controls="pills-Css03" role="tab" aria-selected="false">Scss</a>
							</div>
						</div>
						<div class="card-body">
							<!-- DZ Element Container -->
							<div class="dz-element tab-content" id="pills-tabContent03">
								<div class="dz-preview tab-pane fade show active" role="tabpanel" id="pills-Preview03" aria-labelledby="PreviewTab03">
									<div id="dz_tree-2">
										<ul>
											<li data-jstree='{ "opened" : true }'>One</li>
											<li data-jstree='{ "opened" : true }'>Two</li>
											<li data-jstree='{ "opened" : true }'>Three
												<ul>
													<li data-jstree='{ "opened" : true }'>Second-one</li>
													<li data-jstree='{ "opened" : true }'>Second-two</li>
													<li data-jstree='{ "opened" : true }'>Second-three
														<ul>
															<li data-jstree='{ "opened" : true }'>Third-one
																<ul>
																	<li data-jstree='{ "opened" : true }'>Fourth-one</li>
																	<li data-jstree='{ "opened" : true }'>Fourth-two</li>
																	<li data-jstree='{ "opened" : true }'>Fourth-three</li>
																</ul>
															</li>
															<li data-jstree='{ "opened" : true }'>Third-two</li>
															<li data-jstree='{ "opened" : true }'>Third-three
																<ul>
																	<li data-jstree='{ "opened" : true }'>Fourth-one</li>
																	<li data-jstree='{ "opened" : true }'>Fourth-two</li>
																	<li data-jstree='{ "opened" : true }'>Fourth-three</li>
																</ul>
															</li>
														</ul>
													</li>
												</ul>
											</li>
										</ul>
									</div>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-HTML03" aria-labelledby="HtmlTab03">
<pre class="prettyprint lang-html linenums"><code class="language-html">
	&lt;div id="dz_tree-2"&gt;
	&lt;ul&gt;
		&lt;li data-jstree='{ "opened" : true }'&gt;One&lt;/li&gt;
		&lt;li data-jstree='{ "opened" : true }'&gt;Two&lt;/li&gt;
		&lt;li data-jstree='{ "opened" : true }'&gt;Three
			&lt;ul&gt;
				&lt;li data-jstree='{ "opened" : true }'&gt;Second-one&lt;/li&gt;
				&lt;li data-jstree='{ "opened" : true }'&gt;Second-two&lt;/li&gt;
				&lt;li data-jstree='{ "opened" : true }'&gt;Second-three
					&lt;ul&gt;
						&lt;li data-jstree='{ "opened" : true }'&gt;Third-one
							&lt;ul&gt;
								&lt;li data-jstree='{ "opened" : true }'&gt;Fourth-one&lt;/li&gt;
								&lt;li data-jstree='{ "opened" : true }'&gt;Fourth-two&lt;/li&gt;
								&lt;li data-jstree='{ "opened" : true }'&gt;Fourth-three&lt;/li&gt;
							&lt;/ul&gt;
						&lt;/li&gt;
						&lt;li data-jstree='{ "opened" : true }'&gt;Third-two&lt;/li&gt;
						&lt;li data-jstree='{ "opened" : true }'&gt;Third-three
							&lt;ul&gt;
								&lt;li data-jstree='{ "opened" : true }'&gt;Fourth-one&lt;/li&gt;
								&lt;li data-jstree='{ "opened" : true }'&gt;Fourth-two&lt;/li&gt;
								&lt;li data-jstree='{ "opened" : true }'&gt;Fourth-three&lt;/li&gt;
							&lt;/ul&gt;
						&lt;/li&gt;
					&lt;/ul&gt;
				&lt;/li&gt;
			&lt;/ul&gt;
		&lt;/li&gt;
	&lt;/ul&gt;
&lt;/div&gt;
</code></pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Javascript03" aria-labelledby="JavascriptTab03">
<pre class="prettyprint lang-js linenums"><code class="language-html">
	&lt;script&gt;
	$('#dz_tree-2').jstree({
		"plugins": ["checkbox"],
		"checkbox": {
		  "three_state": false,
		  "cascade": "down"
		},
		"core": {
		  "themes": {
			"responsive": false
		  }
		}
	  });
	&lt;/script&gt;
	

</code>

</pre>
								</div>
<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Css03">
<pre class="prettyprint lang-css linenums"><code class="language-html">

	/* Code */
.code{
	padding: 6px 12px;
    background-color: #232323;
    margin: 10px 0;
	display: block;
	color: #fff;
}
.jstree-default .jstree-anchor {
	color: #3F4254;
	padding: 0 8px 0 4px; 
}
.jstree-default .jstree-icon {
	color: #ffad0e;
	font-size: 1.3rem; 
}
.jstree-default .jstree-icon.fa {
    font-size: 1.2rem; 
}
.jstree-default .jstree-icon.la {
   font-size: 1.5rem; 
}
.jstree-default .jstree-disabled {
	line-height: auto;
	opacity: 0.7; 
	height: auto;
	cursor: not-allowed;
}
.jstree-default .jstree-disabled .jstree-icon {
    color: #3F4254; 
}	
.jstree-default .fa-file-text {
    color: #969696;
}	
.jstree-default .jstree-clicked {
	border: 0;
	box-shadow: none; 
	background: #F3F6F9;
	-webkit-box-shadow: none;
}
.jstree-default .jstree-hovered {
	box-shadow: none; 
	border: 0;
	background-color: var(--light);
	-webkit-box-shadow: none;
}
.jstree-default .jstree-wholerow-clicked,
.jstree-default .jstree-wholerow-clicked {
	box-shadow: none; 
	background: #EBEDF3;
	-webkit-box-shadow: none;
}
.jstree-default .jstree-wholerow-hovered,
.jstree-default.jstree-wholerow .jstree-wholerow-hovered {
	border: 0;
	box-shadow: none; 
	-webkit-box-shadow: none;
	background-color: #F3F6F9;
}
.jstree-open > .jstree-anchor > .fa-folder:before {
	content: "\f07c"; 
	color:#ffad0e;
	margin-left: 2px;
}
.jstree-open > .jstree-anchor > .la-folder:before {
	margin-left: 2px;
	color:#ffad0e;	
	content: "\f200"; 
}
.jstree-default .jstree-clicked{
   background: transparent;	
}
.jstree-anchor{
	background: transparent;
    margin: 0!important;
    padding: 0!important;
    color: var(--text-dark)!important;
}
</code>

</pre>
								</div>
							</div>
							<!-- DZ Element Container End -->
						</div>
						<div class="card-footer text-muted">
							2 days ago
						</div>
					</div>
				</div>
				<div class="col-xl-6">
					<div class="card">
						<div class="card-header flex-wrap">
							<h5 class="card-title">Basic Example 4</h5>
							<div class="dz-toolbar nav nav-pills" id="pills-tab04" role="tablist">
								<a class="btn btn-primary btn-sm active" data-bs-toggle="pill" id="PreviewTab04" href="#pills-Preview04" aria-controls="pills-Preview04" role="tab" aria-selected="false">Preview</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="HtmlTab04" href="#pills-HTML04" aria-controls="pills-HTML04" role="tab" aria-selected="true">HTML</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="JavascriptTab04" href="#pills-Javascript04" aria-controls="pills-Javascript04" role="tab" aria-selected="false">Javascript</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="CssTab04" href="#pills-Css04"  role="tab">Scss</a>
							</div>
						</div>
						<div class="card-body">
							<!-- DZ Element Container -->
							<div class="dz-element tab-content" id="pills-tabContent04">
								<div class="dz-preview tab-pane fade show active" role="tabpanel" id="pills-Preview04" aria-labelledby="PreviewTab04">
									<div id="dz_tree-3">
										<ul>
											<li data-jstree='{ "opened" : true }'>One</li>
											<li data-jstree='{ "opened" : true }'>Two</li>
											<li data-jstree='{ "opened" : true, "disabled": true }'>Three <!-- This node is disabled -->
												<ul>
													<li data-jstree='{ "opened" : true }'>Second-one</li>
													<li data-jstree='{ "opened" : true }'>Second-two</li>
													<li data-jstree='{ "opened" : true }'>Second-three
														<ul>
															<li data-jstree='{ "opened" : true }'>Third-one</li>
															<li data-jstree='{ "opened" : true, "disabled": true }'>Third-two</li> <!-- This node is disabled -->
															<li data-jstree='{ "opened" : true }'>Third-three
																<ul>
																	<li data-jstree='{ "opened" : true }'>Fourth-one</li>
																	<li data-jstree='{ "opened" : true }'>Fourth-two</li>
																	<li data-jstree='{ "opened" : true }'>Fourth-three</li>
																</ul>
															</li>
														</ul>
													</li>
												</ul>
											</li>
										</ul>
									</div>
									
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-HTML04" aria-labelledby="HtmlTab04">
<pre class="prettyprint lang-html linenums"><code class="language-html">
	&lt;div id="dz_tree-3"&gt;
	&lt;ul&gt;
		&lt;li data-jstree='{ "opened" : true }'&gt;One&lt;/li&gt;
		&lt;li data-jstree='{ "opened" : true }'&gt;Two&lt;/li&gt;
		&lt;li data-jstree='{ "opened" : true }'&gt;Three
			&lt;ul&gt;
				&lt;li data-jstree='{ "opened" : true }'&gt;Second-one&lt;/li&gt;
				&lt;li data-jstree='{ "opened" : true }'&gt;Second-two&lt;/li&gt;
				&lt;li data-jstree='{ "opened" : true }'&gt;Second-three
					&lt;ul&gt;
						&lt;li data-jstree='{ "opened" : true }'&gt;Third-one
							&lt;ul&gt;
								&lt;li data-jstree='{ "opened" : true }'&gt;Fourth-one&lt;/li&gt;
								&lt;li data-jstree='{ "opened" : true }'&gt;Fourth-two&lt;/li&gt;
								&lt;li data-jstree='{ "opened" : true }'&gt;Fourth-three&lt;/li&gt;
							&lt;/ul&gt;
						&lt;/li&gt;
						&lt;li data-jstree='{ "opened" : true }'&gt;Third-two&lt;/li&gt;
						&lt;li data-jstree='{ "opened" : true }'&gt;Third-three
							&lt;ul&gt;
								&lt;li data-jstree='{ "opened" : true }'&gt;Fourth-one&lt;/li&gt;
								&lt;li data-jstree='{ "opened" : true }'&gt;Fourth-two&lt;/li&gt;
								&lt;li data-jstree='{ "opened" : true }'&gt;Fourth-three&lt;/li&gt;
							&lt;/ul&gt;
						&lt;/li&gt;
					&lt;/ul&gt;
				&lt;/li&gt;
			&lt;/ul&gt;
		&lt;/li&gt;
	&lt;/ul&gt;
&lt;/div&gt;
</code></pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Javascript04" aria-labelledby="JavascriptTab04">
<pre class="prettyprint lang-js linenums"><code class="language-html">
	&lt;script&gt;
	$('#dz_tree-3').jstree({
        "core": {
            "themes": {
                "responsive": false
            }
        }
    });
	&lt;/script&gt;

</code>

</pre>
								</div>
							</div>
							<!-- DZ Element Container End -->
						</div>
						<div class="card-footer text-muted">
							2 days ago
						</div>
					</div>
				</div>
			
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <?php include 'elements/footer.php'; ?>
        <!--**********************************
            Footer end
        ***********************************-->

       

        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
<?php include 'elements/page-js.php'; ?>
	
    
	
	<script>

	
	$("#dz_tree").jstree({
		"core": {
			"themes": {
				"responsive": false
			}
		},
		"types": {
			"default": {
				"icon": "fa fa-folder"
			},
			"file": {
				"icon": "fa fa-file-text"
			}
		},
		"plugins": ["types"]
	});

	$(document).ready(function(){
    $('#dz_tree-1').jstree();
  });
  $('#dz_tree-2').jstree({
      "plugins": ["checkbox"],
      "checkbox": {
        "three_state": false,
        "cascade": "down"
      },
      "core": {
        "themes": {
          "responsive": false
        }
      }
    });
	$(document).ready(function(){
    $('#dz_tree-3').jstree({
        "core": {
            "themes": {
                "responsive": false
            }
        }
    });
});


</script>
    
   
</body>
</html>