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
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Star rating</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                   <div class="col-xl-6">
					<div class="card">
						<div class="card-header flex-wrap">
							<h5 class="card-title mb-2 mb-sm-0">Basic Example 1 </h5>
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
									<label for="input-1" class="control-label">Rate This</label>
									<input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="1">
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-HTML01" aria-labelledby="HtmlTab01">
									<pre class="prettyprint lang-js linenums"><code class="language-html">
&lt;label for="input-1" class="control-label"&gt;Rate This&lt;/label&gt;
&lt;input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="1"&gt;
</code></pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Javascript01" aria-labelledby="JavascriptTab01">
<pre class="prettyprint lang-js linenums"><code class="language-html">
	&lt;script&gt;
	$('#input-1').rating({displayOnly: true, step: 0.5});
	&lt;/script&gt;

</code>

</pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Css01">
<pre class="prettyprint lang-css linenums"><code class="language-html">
	.rating-container .star{
		font-size: 18px;
	}
	.rating-container .caption .label{
		background-color: var(--primary);
		color:$white;
	}
	.rating-md {
		font-size: 28px;
		line-height: 18px;
	}
</code></pre>
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
							<h5 class="card-title mb-2 mb-sm-0">Basic Example 2</h5>
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
									<label for="input-2" class="control-label">Rate This</label>
									<input id="input-2" name="input-2" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1">
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-HTML02" aria-labelledby="HtmlTab02">
<pre class="prettyprint lang-html linenums"><code class="language-html">
&lt;label for="input-2" class="control-label"&gt;Rate This&lt;/label&gt;
&lt;input id="input-2" name="input-2" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1"&gt;
</code></pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Javascript02" aria-labelledby="JavascriptTab02">
<pre class="prettyprint lang-js linenums"><code class="language-html">
	&lt;script&gt;
	$('#input-2').rating({displayOnly: true, step: 0.5});
	&lt;/script&gt;


</code>

</pre>                            </div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Css02" aria-labelledby="CssTab02">
<pre class="prettyprint lang-css linenums"><code class="language-html">
	.rating-container .star{
		font-size: 18px;
	}
	.rating-container .caption .label{
		background-color: var(--primary);
		color:$white;
	}
	.rating-md {
		font-size: 28px;
		line-height: 18px;
	}
</code></pre>
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
							<h5 class="card-title mb-2 mb-sm-0">Basic Example 3</h5>
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
									<table>
										<tr>
											<td style="padding-right:10px">
											<label for="input-3" class="control-label">Likes</label>
											</td>
											<td>
											<input id="input-3" name="input-3" value="4" class="rating-loading">
											</td>
										</tr>
									</table>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-HTML03" aria-labelledby="HtmlTab03">
<pre class="prettyprint lang-html linenums"><code class="language-html">
&lt;table&gt;
	&lt;tr&gt;
		&lt;td style="padding-right:10px"&gt;
		&lt;label for="input-3" class="control-label"&gt;Likes&lt;/label&gt;
		&lt;/td&gt;
		&lt;td&gt;
		&lt;input id="input-3" name="input-3" value="4" class="rating-loading"&gt;
		&lt;/td&gt;
	&lt;/tr&gt;
&lt;/table&gt;
</code></pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Javascript03" aria-labelledby="JavascriptTab03">
<pre class="prettyprint lang-js linenums"><code class="language-html">
&lt;script&gt;
$(document).ready(function(){
    $('#input-3').rating({displayOnly: true, step: 0.5});
});
&lt;/script&gt;
</code></pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Css03" aria-labelledby="CssTab03">
<pre class="prettyprint lang-css linenums"><code class="language-html">
	.rating-container .star{
		font-size: 18px;
	}
	.rating-container .caption .label{
		background-color: var(--primary);
		color:$white;
	}
	.rating-md {
		font-size: 28px;
		line-height: 18px;
	}
</code></pre>
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
							<h5 class="card-title mb-2 mb-sm-0">Basic Example 4</h5>
							<div class="dz-toolbar nav nav-pills" id="pills-tab04" role="tablist">
								<a class="btn btn-primary btn-sm active" data-bs-toggle="pill" id="PreviewTab04" href="#pills-Preview04" aria-controls="pills-Preview04" role="tab" aria-selected="false">Preview</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="HtmlTab04" href="#pills-HTML04" aria-controls="pills-HTML04" role="tab" aria-selected="true">HTML</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="JavascriptTab04" href="#pills-Javascript04" aria-controls="pills-Javascript04" role="tab" aria-selected="false">Javascript</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="CssTab04" href="#pills-Css04" aria-controls="pills-Css04" role="tab" aria-selected="false">Scss</a>
							</div>
						</div>
						<div class="card-body">
							<!-- DZ Element Container -->
							<div class="dz-element tab-content" id="pills-tabContent04">
								<div class="dz-preview tab-pane fade show active" role="tabpanel" id="pills-Preview04" aria-labelledby="PreviewTab04">
									<label for="input-4" class="control-label">Rate This</label>
									<input id="input-4" name="input-4" class="rating rating-loading" data-show-clear="false" data-show-caption="true">
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-HTML04" aria-labelledby="HtmlTab04">
<pre class="prettyprint lang-html linenums"><code class="language-html">
&lt;label for="input-4" class="control-label"&gt;Rate This&lt;/label&gt;
&lt;input id="input-4" name="input-4" class="rating rating-loading" data-show-clear="false" data-show-caption="true"&gt;
</code></pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Javascript04" aria-labelledby="JavascriptTab04">
<pre class="prettyprint lang-js linenums"><code class="language-html">
	&lt;script&gt;
	$(document).ready(function(){
		$('#input-4').rating({displayOnly: true, step: 0.5});
	});
	&lt;/script&gt;

</code>

</pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Css04" aria-labelledby="CssTab04">
<pre class="prettyprint lang-css linenums"><code class="language-html">
	.rating-container .star{
		font-size: 18px;
	}
	.rating-container .caption .label{
		background-color: var(--primary);
		color:$white;
	}
	.rating-md {
		font-size: 28px;
		line-height: 18px;
	}
</code></pre>
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
							<h5 class="card-title mb-2 mb-sm-0">Basic Example 5</h5>
							<div class="dz-toolbar nav nav-pills" id="pills-tab05" role="tablist">
								<a class="btn btn-primary btn-sm active" data-bs-toggle="pill" id="PreviewTab05" href="#pills-Preview05" aria-controls="pills-Preview05" role="tab" aria-selected="false">Preview</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="HtmlTab05" href="#pills-HTML05" aria-controls="pills-HTML05" role="tab" aria-selected="true">HTML</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="JavascriptTab05" href="#pills-Javascript05" aria-controls="pills-Javascript05" role="tab" aria-selected="false">Javascript</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="CssTab05" href="#pills-Css05" aria-controls="pills-Css05" role="tab" aria-selected="false">Scss</a>
							</div>
						</div>
						<div class="card-body">
							<!-- DZ Element Container -->
							<div class="dz-element tab-content" id="pills-tabContent05">
								<div class="dz-preview tab-pane fade show active" role="tabpanel" id="pills-Preview05" aria-labelledby="PreviewTab05">
									<label for="input-5" class="control-label">Rate This</label>
									<input id="input-5" name="input-5" class="rating-loading" data-show-clear="false" data-show-caption="true">
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-HTML05" aria-labelledby="HtmlTab05">
<pre class="prettyprint lang-html linenums"><code class="language-html">
&lt;label for="input-5" class="control-label"&gt;Rate This&lt;/label&gt;
&lt;input id="input-5" name="input-5" class="rating-loading" data-show-clear="false" data-show-caption="true"&gt;
</code></pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Javascript05" aria-labelledby="JavascriptTab05">
<pre class="prettyprint lang-js linenums"><code class="language-html">
&lt;script&gt;
$(document).ready(function(){
    $('#input-5').rating({clearCaption: 'No stars yet'});
});
&lt;/script&gt;
</code></pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Css05" aria-labelledby="CssTab05">
<pre class="prettyprint lang-css linenums"><code class="language-html">
	.rating-container .star{
		font-size: 18px;
	}
	.rating-container .caption .label{
		background-color: var(--primary);
		color:$white;
	}
	.rating-md {
		font-size: 28px;
		line-height: 18px;
	}
</code></pre>
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
							<h5 class="card-title mb-2 mb-sm-0">Basic Example 6</h5>
							<div class="dz-toolbar nav nav-pills" id="pills-tab06" role="tablist">
								<a class="btn btn-primary btn-sm active" data-bs-toggle="pill" id="PreviewTab06" href="#pills-Preview06" aria-controls="pills-Preview06" role="tab" aria-selected="false">Preview</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="HtmlTab06" href="#pills-HTML06" aria-controls="pills-HTML06" role="tab" aria-selected="true">HTML</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="JavascriptTab06" href="#pills-Javascript06" aria-controls="pills-Javascript06" role="tab" aria-selected="false">Javascript</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="CssTab06" href="#pills-Css06" aria-controls="pills-Css06" role="tab" aria-selected="false">Scss</a>
							</div>
						</div>
						<div class="card-body">
							<!-- DZ Element Container -->
							<div class="dz-element tab-content" id="pills-tabContent06">
								<div class="dz-preview tab-pane fade show active" role="tabpanel" id="pills-Preview06" aria-labelledby="PreviewTab06">
									<label for="input-6" class="control-label">Readonly Input</label>
									<input id="input-6" name="input-6" class="rating rating-loading" value="0" data-min="0" data-max="5" data-step="1" data-readonly="true">
									 
									<label for="input-7" class="control-label">Disabled Input</label>
									<input id="input-7" class="rating rating-loading" value="0" data-min="0" data-max="5" data-step="1" data-disabled="true">
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-HTML06" aria-labelledby="HtmlTab06">
<pre class="prettyprint lang-html linenums"><code class="language-html">&lt;label for="input-6" class="control-label"&gt;Readonly Input&lt;/label&gt;
&lt;input id="input-6" name="input-6" class="rating rating-loading" value="0" data-min="0" data-max="5" data-step="1" data-readonly="true"&gt;
 
&lt;label for="input-7" class="control-label"&gt;Disabled Input&lt;/label&gt;
&lt;input id="input-7" class="rating rating-loading" value="0" data-min="0" data-max="5" data-step="1" data-disabled="true"&gt;
</code>
</pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Javascript06" aria-labelledby="JavascriptTab06">
<pre class="prettyprint lang-js linenums"><code class="language-html">

	&lt;script&gt;
	$(document).ready(function(){
		$('#input-6').rating({clearCaption: 'No stars yet'});
		$('#input-7').rating({clearCaption: 'No stars yet'});
	});
	&lt;/script&gt;
</code></pre>
								</div>
									<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Css06" aria-labelledby="CssTab06">
	<pre class="prettyprint lang-css linenums"><code class="language-html">
		.rating-container .star{
			font-size: 18px;
		}
		.rating-container .caption .label{
			background-color: var(--primary);
			color:$white;
		}
		.rating-md {
			font-size: 28px;
			line-height: 18px;
		}
	</code></pre>
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
							<h5 class="card-title mb-2 mb-sm-0">Basic Example 7 </h5>
							<div class="dz-toolbar nav nav-pills" id="pills-tab09" role="tablist">
								<a class="btn btn-primary btn-sm active" data-bs-toggle="pill" id="PreviewTab09" href="#pills-Preview09" aria-controls="pills-Preview09" role="tab" aria-selected="false">Preview</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="HtmlTab09" href="#pills-HTML09" aria-controls="pills-HTML09" role="tab" aria-selected="true">HTML</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="JavascriptTab09" href="#pills-Javascript09" aria-controls="pills-Javascript09" role="tab" aria-selected="false">Javascript</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="CssTab09" href="#pills-Css09" aria-controls="pills-Css09" role="tab" aria-selected="false">Scss</a>
							</div>
						</div>
						<div class="card-body">
							<!-- DZ Element Container -->
							<div class="dz-element tab-content" id="pills-tabContent09">
								<div class="dz-preview tab-pane fade show active" role="tabpanel" id="pills-Preview09" aria-labelledby="PreviewTab09">
									<form action="#basic-example-9" method="post">
										<input id="input-9" name="input-9" required class="rating-loading">
										<hr>
										<button type="submit" class="btn btn-primary">Submit</button>&nbsp;
										<button type="reset" class="btn btn-outline-secondary">Reset</button>
									</form>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-HTML09" aria-labelledby="HtmlTab09">
<pre class="prettyprint lang-html linenums"><code class="language-html">
&lt;form action="#basic-example-9" method="post"&gt;
	&lt;input id="input-9" name="input-9" required class="rating-loading"&gt;
	&lt;hr&gt;
	&lt;button type="submit" class="btn btn-primary"&gt;Submit&lt;/button&gt;&nbsp;
	&lt;button type="reset" class="btn btn-outline-secondary"&gt;Reset&lt;/button&gt;
&lt;/form&gt;
</code></pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Javascript09" aria-labelledby="JavascriptTab09">
<pre class="prettyprint lang-js linenums"><code class="language-html">
	&lt;script&gt;
	$(document).ready(function(){
		$('#input-9').rating({clearCaption: 'No stars yet'});
	});
	&lt;/script&gt;
	
</code>

</pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Css09" aria-labelledby="CssTab09">
<pre class="prettyprint lang-css linenums"><code class="language-html">
	.rating-container .star{
		font-size: 18px;
	}
	.rating-container .caption .label{
		background-color: var(--primary);
		color:$white;
	}
	.rating-md {
		font-size: 28px;
		line-height: 18px;
	}
</code></pre>
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
							<h5 class="card-title mb-2 mb-sm-0">Basic Example 8 </h5>
							<div class="dz-toolbar nav nav-pills" id="pills-tab08" role="tablist">
								<a class="btn btn-primary btn-sm active" data-bs-toggle="pill" id="PreviewTab08" href="#pills-Preview08" aria-controls="pills-Preview08" role="tab" aria-selected="false">Preview</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="HtmlTab08" href="#pills-HTML08" aria-controls="pills-HTML08" role="tab" aria-selected="true">HTML</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="JavascriptTab08" href="#pills-Javascript08" aria-controls="pills-Javascript08" role="tab" aria-selected="false">Javascript</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="CssTab08" href="#pills-Css08" aria-controls="pills-Css08" role="tab" aria-selected="false">Scss</a>
							</div>
						</div>
						<div class="card-body">
							<!-- DZ Element Container -->
							<div class="dz-element tab-content" id="pills-tabContent08">
								<div class="dz-preview tab-pane fade show active" role="tabpanel" id="pills-Preview08" aria-labelledby="PreviewTab08">
									<input id="input-8" name="input-8" class="rating-loading">
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-HTML08" aria-labelledby="HtmlTab08">
<pre class="prettyprint lang-html linenums"><code class="language-html">
&lt;input id="input-8" name="input-8" class="rating-loading"&gt;
</code></pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Javascript08" aria-labelledby="JavascriptTab08">
<pre class="prettyprint lang-js linenums"><code class="language-html">
&lt;script&gt;
$(document).ready(function(){
	$('#input-8').rating({rtl: true, containerClass: 'is-star'});
});
&lt;/script&gt;
</code></pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Css08" aria-labelledby="CssTab08">
<pre class="prettyprint lang-css linenums"><code class="language-html">
	.rating-container .star{
		font-size: 18px;
	}
	.rating-container .caption .label{
		background-color: var(--primary);
		color:$white;
	}
	.rating-md {
		font-size: 28px;
		line-height: 18px;
	}
</code></pre>
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
							<h5 class="card-title mb-2 mb-sm-0">Basic Example 9</h5>
							<div class="dz-toolbar nav nav-pills" id="pills-tab07" role="tablist">
								<a class="btn btn-primary btn-sm active" data-bs-toggle="pill" id="PreviewTab07" href="#pills-Preview07" aria-controls="pills-Preview07" role="tab" aria-selected="false">Preview</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="HtmlTab07" href="#pills-HTML07" aria-controls="pills-HTML07" role="tab" aria-selected="true">HTML</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="JavascriptTab07" href="#pills-Javascript07" aria-controls="pills-Javascript07" role="tab" aria-selected="false">Javascript</a>
								<a class="btn btn-primary btn-sm" data-bs-toggle="pill" id="CssTab07" href="#pills-Css07" aria-controls="pills-Css07" role="tab" aria-selected="false">Css</a>
							</div>
						</div>
						<div class="card-body">
							<!-- DZ Element Container -->
							<div class="dz-element tab-content" id="pills-tabContent07">
								<div class="dz-preview tab-pane fade show active" role="tabpanel" id="pills-Preview07" aria-labelledby="PreviewTab07">
									<label for="input-7-xs" class="control-label">Extra Small Rating</label>
									<input id="input-7-xs" class="rating rating-loading" value="1" data-min="0" data-max="5" data-step="0.5" data-size="xs"><hr>
									 
									<label for="input-7-sm" class="control-label">Small Rating</label>
									<input id="input-7-sm" class="rating rating-loading" value="2" data-min="0" data-max="5" data-step="0.5" data-size="sm"><hr>
									 
									<label for="input-7-md" class="control-label">Medium Rating</label>
									<input id="input-7-md" class="rating rating-loading" value="3" data-min="0" data-max="5" data-step="0.5" data-size="md"><hr>
									 
									<label for="input-7-lg" class="control-label">Large Rating</label>
									<input id="input-7-lg" class="rating rating-loading" value="4" data-min="0" data-max="5" data-step="0.5" data-size="lg"><hr>
									 
									<label for="input-7-xl" class="control-label">Extra Large Rating</label>
									<input id="input-7-xl" class="rating rating-loading" value="5" data-min="0" data-max="5" data-step="0.5" data-size="xl">
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-HTML07" aria-labelledby="HtmlTab07">
<pre class="prettyprint lang-html linenums"><code class="language-html">&lt;label for="input-7-xs" class="control-label"&gt;Extra Small Rating&lt;/label&gt;
&lt;input id="input-7-xs" class="rating rating-loading" value="1" data-min="0" data-max="5" data-step="0.5" data-size="xs"&gt;&lt;hr/&gt;
 
&lt;label for="input-7-sm" class="control-label"&gt;Small Rating&lt;/label&gt;
&lt;input id="input-7-sm" class="rating rating-loading" value="2" data-min="0" data-max="5" data-step="0.5" data-size="sm"&gt;&lt;hr/&gt;
 
&lt;label for="input-7-md" class="control-label"&gt;Medium Rating&lt;/label&gt;
&lt;input id="input-7-md" class="rating rating-loading" value="3" data-min="0" data-max="5" data-step="0.5" data-size="md"&gt;&lt;hr/&gt;
 
&lt;label for="input-7-lg" class="control-label"&gt;Large Rating&lt;/label&gt;
&lt;input id="input-7-lg" class="rating rating-loading" value="4" data-min="0" data-max="5" data-step="0.5" data-size="lg"&gt;&lt;hr/&gt;
 
&lt;label for="input-7-xl" class="control-label"&gt;Extra Large Rating&lt;/label&gt;
&lt;input id="input-7-xl" class="rating rating-loading" value="5" data-min="0" data-max="5" data-step="0.5" data-size="xl"&gt;
</code>
</pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Javascript07" aria-labelledby="JavascriptTab07">
<pre class="prettyprint lang-js linenums"><code class="language-html">
&lt;script&gt;
$(document).ready(function(){
	$('#input-9').rating();
});
&lt;/script&gt;
</code></pre>
								</div>
								<div class="dz-script tab-pane fade" role="tabpanel" id="pills-Css07" aria-labelledby="CssTab07">
<pre class="prettyprint lang-css linenums"><code class="language-html">
	.rating-container .star{
		font-size: 18px;
	}
	.rating-container .caption .label{
		background-color: var(--primary);
		color:$white;
	}
	.rating-md {
		font-size: 28px;
		line-height: 18px;
	}
</code></pre>
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
	<script>hljs.highlightAll();</script>
	
	<script>
$(document).ready(function(){
    $('#input-3').rating({displayOnly: true, step: 0.5});
    $('#input-5').rating({clearCaption: 'No stars yet'});
	$('#input-8').rating({rtl: true, containerClass: 'is-star'});
	$('#input-9').rating();
});
</script>
    
   
</body>
</html>