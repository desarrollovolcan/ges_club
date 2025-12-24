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
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Drag and Drop</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                   <div class="col-md-6">
					<div class="card dz-draggble">
						<div class="card-header flex-wrap">
							<h5 class="card-title">Draggable Basic </h5>
							<div class="dz-toolbar nav nav-pills" id="pills-tab01" role="tablist">
								<a class="btn btn-primary btn-sm active" data-bs-toggle="pill" id="PreviewTab01" href="#pills-Preview01" aria-controls="pills-Preview01" role="tab" aria-selected="false">Preview</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="HtmlTab01" href="#pills-HTML01" aria-controls="pills-HTML01" role="tab" aria-selected="true">HTML</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="JavascriptTab01" href="#pills-Javascript01" aria-controls="pills-Javascript01" role="tab" aria-selected="false">Javascript</a>
								<a class="btn btn-primary btn-sm mt-xl-0 mt-md-2" data-bs-toggle="pill" id="CssTab01" href="#pills-Css01" aria-controls="pills-Css01" role="tab" aria-selected="false">Scss</a>
							</div>
						</div>
						<div class="card-body" id="dz-drap-container">
							<!-- DZ Element Container -->
							<div class="dz-element tab-content" id="pills-tabContent01">
								<div class="dz-preview tab-pane fade show active" role="tabpanel" id="pills-Preview01" aria-labelledby="PreviewTab01">
									<div id="draggable" class="ui-widget-content">
										<p>Drag me around</p>
									</div>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-HTML01" aria-labelledby="HtmlTab01">
<pre class="prettyprint lang-html linenums"><code class="language-html">
	&lt;div id="draggable" class="ui-widget-content"&gt;
	&lt;p&gt;Drag me around&lt;/p&gt;
  &lt;/div&gt;
</code>
</pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Javascript01" aria-labelledby="JavascriptTab01">
<pre class="prettyprint lang-js linenums"><code class="language-html">
	&lt;script&gt;
	$( "#draggable" ).draggable();

	&lt;/script&gt;
</code>

</pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Css01">
<pre class="prettyprint lang-css linenums"><code class="language-html">
	border: 1px solid var(--border);
    background: var(--rgba-primary-1);
    width: 200px;
    height: 200px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    border-radius: 8px;
    box-shadow: rgba(90, 69, 170, 0.09) 0px 8px 24px;
    color: var(--primary);
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
				<div class="col-md-6">
					<div class="card dz-draggble">
						<div class="card-header flex-wrap">
							<h5 class="card-title">Custom container</h5>
							<div class="dz-toolbar nav nav-pills" id="pills-tab02" role="tablist">
								<a class="btn btn-primary btn-sm active" data-bs-toggle="pill" id="PreviewTab02" href="#pills-Preview02" aria-controls="pills-Preview02" role="tab" aria-selected="false">Preview</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="HtmlTab02" href="#pills-HTML02" aria-controls="pills-HTML02" role="tab" aria-selected="true">HTML</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="JavascriptTab02" href="#pills-Javascript02" aria-controls="pills-Javascript02" role="tab" aria-selected="false">Javascript</a>
								<a class="btn btn-primary btn-sm mt-xl-0 mt-md-2" data-bs-toggle="pill" id="CssTab02" href="#pills-Css02" aria-controls="pills-Css02" role="tab" aria-selected="false">Scss</a>
							</div>
						</div>
						<div class="card-body"  id="dz-drap-container-1">
							<!-- DZ Element Container -->
							<div class="dz-element tab-content" id="pills-tabContentOne">
								<div class="dz-preview tab-pane fade show active" role="tabpanel">
									<div class="dz-preview tab-pane fade show active" role="tabpanel" id="pills-Preview02">
										<div id="draggable-1" class="ui-widget-content">
											<p>Drag me around</p>
										  </div>
									</div>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-HTML02" aria-labelledby="HtmlTab02">
<pre class="prettyprint lang-html linenums"><code class="language-html">

	&lt;div id="draggable-1" class="ui-widget-content"&gt;
	&lt;p&gt;Drag me around&lt;/p&gt;
  &lt;/div&gt;
</code>
	
</pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Javascript02" aria-labelledby="JavascriptTab02">
<pre class="prettyprint lang-js linenums"><code class="language-html">
	&lt;script&gt;
	$( "#draggable-1" ).draggable();

	&lt;/script&gt;
</code>

</pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Css02">
									<pre class="prettyprint lang-css linenums"><code class="language-html">
border: 1px solid var(--border);
background: var(--rgba-primary-1);
width: 200px;
height: 200px;
text-align: center;
display: flex;
flex-direction: column;
justify-content: center;
border-radius: 8px;
box-shadow: rgba(90, 69, 170, 0.09) 0px 8px 24px;
color: var(--primary);
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
				<div class="col-md-6">
					<div class="card dz-draggble">
						<div class="card-header flex-wrap">
							<h5 class="card-title">Blocked axis</h5>
							<div class="dz-toolbar nav nav-pills" id="pills-tab03" role="tablist">
								<a class="btn btn-primary btn-sm active" data-bs-toggle="pill" id="PreviewTab03" href="#pills-Preview03" aria-controls="pills-Preview03" role="tab" aria-selected="false">Preview</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="HtmlTab03" href="#pills-HTML03" aria-controls="pills-HTML03" role="tab" aria-selected="true">HTML</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="JavascriptTab03" href="#pills-Javascript03" aria-controls="pills-Javascript03" role="tab" aria-selected="false">Javascript</a>
								<a class="btn btn-primary btn-sm mt-xl-0 mt-md-2" data-bs-toggle="pill" id="CssTab03" href="#pills-Css03" aria-controls="pills-Css03" role="tab" aria-selected="false">Scss</a>
							</div>
						</div>
						<div class="card-body">
							<!-- DZ Element Container -->
							<div class="dz-element tab-content" id="pills-tabContent03">
								<div class="dz-preview tab-pane fade show active" role="tabpanel" id="pills-Preview03" aria-labelledby="PreviewTab03">
									<div class="d-flex align-items-center justify-content-around flex-wrap">
										<div id="draggable-2" class="draggable ui-widget-content">
											<p>I can be dragged only vertically</p>
										</div>
										   
										<div id="draggable-3" class="draggable ui-widget-content mt-sm-0 mt-3">
											<p>I can be dragged only horizontally</p>
										</div>
									</div>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-HTML03" aria-labelledby="HtmlTab03">
<pre class="prettyprint lang-html linenums"><code class="language-html">
	&lt;div id="draggable-2" class="ui-widget-content"&gt;
	&lt;p&gt;Drag me around&lt;/p&gt;
  &lt;/div&gt;
  &lt;div id="draggable-3" class="ui-widget-content"&gt;
	&lt;p&gt;Drag me around&lt;/p&gt;
  &lt;/div&gt;
</code>
	
</pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Javascript03" aria-labelledby="JavascriptTab03">
<pre class="prettyprint lang-js linenums"><code class="language-html">

	&lt;script&gt;
	$( "#draggable-2" ).draggable({ axis: "y" });
	$( "#draggable-3" ).draggable({ axis: "x" });
	&lt;/script&gt;
</code>

</pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Css03">
									<pre class="prettyprint lang-css linenums"><code class="language-html">
border: 1px solid var(--border);
background: var(--rgba-primary-1);
width: 200px;
height: 200px;
text-align: center;
display: flex;
flex-direction: column;
justify-content: center;
border-radius: 8px;
box-shadow: rgba(90, 69, 170, 0.09) 0px 8px 24px;
color: var(--primary);
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
				<div class="col-md-6">
					<div class="card dz-draggble">
						<div class="card-header flex-wrap">
							<h5 class="card-title">Disabled</h5>
							<div class="dz-toolbar nav nav-pills" id="pills-tab04" role="tablist">
								<a class="btn btn-primary btn-sm active" data-bs-toggle="pill" id="PreviewTab04" href="#pills-Preview04" aria-controls="pills-Preview04" role="tab" aria-selected="false">Preview</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="HtmlTab04" href="#pills-HTML04" aria-controls="pills-HTML04" role="tab" aria-selected="true">HTML</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="JavascriptTab04" href="#pills-Javascript04" aria-controls="pills-Javascript04" role="tab" aria-selected="false">Javascript</a>
								<a class="btn btn-primary btn-sm mt-xl-0 mt-md-2" data-bs-toggle="pill" id="CssTab04" href="#pills-Css04" aria-controls="pills-Css04" role="tab" aria-selected="false">Scss</a>
							</div>
						</div>
						<div class="card-body">
							<!-- DZ Element Container -->
							<div class="dz-element tab-content" id="pills-tabContent04">
								<div class="dz-preview tab-pane fade show active" role="tabpanel" id="pills-Preview04" aria-labelledby="PreviewTab04">
									<div id="draggable-4" class="ui-widget-content">
										<p>Drag me around</p>
									</div>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-HTML04" aria-labelledby="HtmlTab04">
<pre class="prettyprint lang-html linenums"><code class="language-html">
&lt;div id="draggable-4" class="ui-widget-content"&gt;
&lt;p&gt;Drag me around&lt;/p&gt;
&lt;/div&gt;

</code>
</pre>	
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Javascript04" aria-labelledby="JavascriptTab04">
<pre class="prettyprint lang-js linenums"><code class="language-html">
	&lt;script&gt;
	$("#draggable-4").draggable("disable")
	&lt;/script&gt;

</code>

</pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Css04">
									<pre class="prettyprint lang-css linenums"><code class="language-html">
border: 1px solid var(--border);
background: var(--rgba-primary-1);
width: 200px;
height: 200px;
text-align: center;
display: flex;
flex-direction: column;
justify-content: center;
border-radius: 8px;
box-shadow: rgba(90, 69, 170, 0.09) 0px 8px 24px;
color: var(--primary);
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
				<div class="col-md-6">
					<div class="card dz-draggble">
						<div class="card-header flex-wrap">
							<h5 class="card-title">Sortable basic example</h5>
							<div class="dz-toolbar nav nav-pills" id="pills-tab05" role="tablist">
								<a class="btn btn-primary btn-sm active" data-bs-toggle="pill" id="PreviewTab05" href="#pills-Preview05" aria-controls="pills-Preview05" role="tab" aria-selected="false">Preview</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="HtmlTab05" href="#pills-HTML05" aria-controls="pills-HTML05" role="tab" aria-selected="true">HTML</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="JavascriptTab05" href="#pills-Javascript05" aria-controls="pills-Javascript05" role="tab" aria-selected="false">Javascript</a>
								<a class="btn btn-primary btn-sm mt-xl-0 mt-md-2" data-bs-toggle="pill" id="CssTab05" href="#pills-Css05" aria-controls="pills-Css05" role="tab" aria-selected="false">Scss</a>
							</div>
						</div>
						<div class="card-body">
							<!-- DZ Element Container -->
							<div class="dz-element tab-content" id="pills-tabContent05">
								<div class="dz-preview tab-pane fade show active" role="tabpanel" id="pills-Preview05" aria-labelledby="PreviewTab05">
									<ul id="sortable">
										<li class="ui-state-default">Item 1</li>
										<li class="ui-state-default">Item 2</li>
										<li class="ui-state-default">Item 3</li>
										<li class="ui-state-default">Item 4</li>
										<li class="ui-state-default">Item 5</li>
										
									  </ul>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-HTML05" aria-labelledby="HtmlTab05">
<pre class="prettyprint lang-html linenums"><code class="language-html">
	&lt;ul id="sortable"&gt;
	&lt;li class="ui-state-default"&gt;Item 1&lt;/li&gt;
	&lt;li class="ui-state-default"&gt;Item 2&lt;/li&gt;
	&lt;li class="ui-state-default"&gt;Item 3&lt;/li&gt;
	&lt;li class="ui-state-default"&gt;Item 4&lt;/li&gt;
	&lt;li class="ui-state-default"&gt;Item 5&lt;/li&gt;
	
	&lt;/ul&gt;

</code>
</pre>

								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Javascript05" aria-labelledby="JavascriptTab05">
<pre class="prettyprint lang-js linenums"><code class="language-html">
	&lt;script&gt;
	$( "#sortable" ).sortable({
		revert: true
	  });
	&lt;/script&gt;

</code>

</pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Css05">
									<pre class="prettyprint lang-css linenums"><code class="language-html">
border: 1px solid var(--border);
background: var(--rgba-primary-1);
width: 200px;
height: 200px;
text-align: center;
display: flex;
flex-direction: column;
justify-content: center;
border-radius: 8px;
box-shadow: rgba(90, 69, 170, 0.09) 0px 8px 24px;
color: var(--primary);
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
				<div class="col-md-6">
					<div class="card">
						<div class="card-header flex-wrap">
							<h5 class="card-title">Sortable Grid</h5>
							<div class="dz-toolbar nav nav-pills" id="pills-tab06" role="tablist">
								<a class="btn btn-primary btn-sm active" data-bs-toggle="pill" id="PreviewTab06" href="#pills-Preview06" aria-controls="pills-Preview06" role="tab" aria-selected="false">Preview</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="HtmlTab06" href="#pills-HTML06" aria-controls="pills-HTML06" role="tab" aria-selected="true">HTML</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="JavascriptTab06" href="#pills-Javascript06" aria-controls="pills-Javascript06" role="tab" aria-selected="false">Javascript</a>
								<a class="btn btn-primary btn-sm mt-xl-0 mt-md-2" data-bs-toggle="pill" id="CssTab06" href="#pills-Css06" aria-controls="pills-Css06" role="tab" aria-selected="false">Scss</a>
							</div>
						</div>
						<div class="card-body">
							<!-- DZ Element Container -->
							<div class="dz-element tab-content" id="pills-tabContent06">
								<div class="dz-preview tab-pane fade show active" role="tabpanel" id="pills-Preview06" aria-labelledby="PreviewTab06">
									<div id="sortable-grid">
										<div class="grid-item">Item 1</div>
										<div class="grid-item">Item 2</div>
										<div class="grid-item">Item 3</div>
										<div class="grid-item">Item 4</div>
										<div class="grid-item">Item 5</div>
										<div class="grid-item">Item 6</div>
										<div class="grid-item">Item 7</div>
										<div class="grid-item">Item 8</div>
										<div class="grid-item">Item 9</div>
										
									  </div>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-HTML06" aria-labelledby="HtmlTab06">
<pre class="prettyprint lang-html linenums"><code class="language-html">
	&lt;div id="sortable-grid"&gt;
	&lt;div class="grid-item"&gt;Item 1&lt;/div&gt;
	&lt;div class="grid-item"&gt;Item 2&lt;/div&gt;
	&lt;div class="grid-item"&gt;Item 3&lt;/div&gt;
	&lt;div class="grid-item"&gt;Item 4&lt;/div&gt;
	&lt;div class="grid-item"&gt;Item 5&lt;/div&gt;
	&lt;div class="grid-item"&gt;Item 6&lt;/div&gt;
	&lt;div class="grid-item"&gt;Item 7&lt;/div&gt;
	&lt;div class="grid-item"&gt;Item 8&lt;/div&gt;
	&lt;div class="grid-item"&gt;Item 9&lt;/div&gt;

	&lt;/div&gt;

</code>
	
</pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Javascript06" aria-labelledby="JavascriptTab06">
<pre class="prettyprint lang-js linenums"><code class="language-html">
	&lt;script&gt;
	const sortableGrid = document.getElementById('sortable-grid');
		new Sortable(sortableGrid, {
		animation: 150,
		ghostClass: 'sortable-ghost',
		swapThreshold: 0.5,
		draggable: '.grid-item',
		handle: '.grid-item'
		});
</code>

</pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Css06">
									<pre class="prettyprint lang-css linenums"><code class="language-html">
border: 1px solid var(--border);
background: var(--rgba-primary-1);
width: 200px;
height: 200px;
text-align: center;
display: flex;
flex-direction: column;
justify-content: center;
border-radius: 8px;
box-shadow: rgba(90, 69, 170, 0.09) 0px 8px 24px;
color: var(--primary);
									</code>
									
									</pre>
																	</div>
							</div>
							</div>
							<!-- DZ Element Container End -->
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
	
			
		$( "#draggable" ).draggable();
		$( "#draggable-2" ).draggable({ axis: "y" });
		$( "#draggable-3" ).draggable({ axis: "x" });
 
        $("#draggable-1").draggable({
            containment: "#dz-drap-container-1", // Contain within the #dz-drap-container
            scroll: false // Prevent scrolling
        });
		$("#draggable").draggable({
            containment: "#dz-drap-container", // Contain within the #dz-drap-container
            scroll: false // Prevent scrolling
        });

		// Disable draggable functionality for draggable-2
      
         
        

		$( "#sortable" ).sortable({
      		revert: true
   		 });
    


	const sortableGrid = document.getElementById('sortable-grid');
		new Sortable(sortableGrid, {
		animation: 150,
		ghostClass: 'sortable-ghost',
		swapThreshold: 0.5,
		draggable: '.grid-item',
		handle: '.grid-item'
		});
		
</script>

</body>
</html>
