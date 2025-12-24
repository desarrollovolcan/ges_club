<div class="deznav">
			<div class="deznav-scroll">
				<ul class="metismenu" id="menu">
					<li class="menu-title border-top-0 pt-2">Main Menu</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-layout"></i>
							<span class="nav-text">Dashboard</span>
						</a>
						<ul aria-expanded="false" class="left">
							<li class="nav-text-icon-toggle">Dashboard</li>
							<li><a class="dz-active" href="index.php">Dashboard Light</a></li>
							<li><a class="dz-active" href="index-2.php">Dashboard Dark</a></li>
							<li><a class="dz-active" href="wallet.php">Wallet</a></li>
							<li><a class="dz-active" href="invoices.php">Invoices</a></li>
							<li><a class="dz-active" href="create-invoices.php">Create Invoice</a></li>
							<li><a class="dz-active" href="card-center.php">Card Center</a></li>
							<li><a class="dz-active" href="transaction-details.php">Transaction</a></li>
						</ul>
					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon flaticon-user-1"></i>
							<span class="nav-text">Profile</span>
						</a>
						<ul aria-expanded="false">
							<li><a class="dz-active" href="profile/overview-profile.php">Overview</a></li>
							<li><a class="dz-active" href="profile/projects.php">Projects</a></li>
							<li><a class="dz-active" href="profile/projects-details.php">Projects Details</a></li>
							<li><a class="dz-active" href="profile/campaigns.php">Campaigns</a></li>
							<li><a class="dz-active" href="profile/documents.php">Documents</a></li>
							<li><a class="dz-active" href="profile/followers.php">Followers</a></li>
							<li><a class="dz-active" href="profile/activity-profile.php">Activity</a></li>
						</ul>
					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon flaticon-app"></i>
							<span class="nav-text">Account</span>
						</a>
						<ul aria-expanded="false">
							<li><a class="dz-active" href="account/overview.php">Overview</a></li>
							<li><a class="dz-active" href="account/settings.php">Settings</a></li>
							<li><a class="dz-active" href="account/security.php">Security</a></li>
							<li><a class="dz-active" href="account/activity.php">Activity</a></li>
							<li><a class="dz-active" href="account/billing.php">Billing</a></li>
							<li><a class="dz-active" href="account/statements.php">Statements</a></li>
							<li><a class="dz-active" href="account/referrals.php">Referrals</a></li>
							<li><a class="dz-active" href="account/api-keys.php">Api keys</a></li>
							<li><a class="dz-active" href="account/logs.php">Logs</a></li>
						</ul>
					</li>
					<li>
						<a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-web-1"></i>
							<span class="nav-text">CMS</span>
						</a>
						<ul aria-expanded="false" class="left">
							<li class="nav-text-icon-toggle">CMS</li>
							<li><a class="dz-active" href="content.php">Content</a></li>
							<li><a class="dz-active" href="content-add.php">Add Content</a></li>
							<li><a class="dz-active" href="menu.php">Menus</a></li>
							<li><a class="dz-active" href="email-template.php">Email Template</a></li>
							<li><a class="dz-active" href="add-email.php">Add Email</a></li>
							<li><a class="dz-active" href="blog.php">Blog</a></li>
							<li><a class="dz-active" href="add-blog.php">Add Blog</a></li>
							<li><a class="dz-active" href="blog-category.php">Blog Category</a></li>
						</ul>
					</li>
					<li>
						<a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-chip"></i>
							<span class="nav-text">AIKit</span>
						</a>
						<ul aria-expanded="false" class="left">
							<li class="nav-text-icon-toggle">AIKit</li>
							<li><a class="dz-active" href="auto-write.php">Auto Writer</a></li>
							<li><a class="dz-active" href="scheduled.php">Scheduler</a></li>
							<li><a class="dz-active" href="repurpose.php">Repurpose</a></li>
							<li><a class="dz-active" href="rss.php">RSS</a></li>
							<li><a class="dz-active" href="chatbot.php">Chatbot</a></li>
							<li><a class="dz-active" href="fine-tune-models.php">Fine-tune Models</a></li>
							<li><a class="dz-active" href="prompt.php">AI Menu Prompts</a></li>
							<li><a class="dz-active" href="setting.php">Settings</a></li>
							<li><a class="dz-active" href="import.php">Export/Import Settings</a></li>
						</ul>
					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-blog"></i>
							<span class="nav-text">Blog</span>
						</a>
						<ul aria-expanded="false" class="left">
							<li class="nav-text-icon-toggle">Blog</li>
							<li><a class="dz-active" href="blog-post.php">Blog Post</a></li>
							<li><a class="dz-active" href="blog-home.php">Blog Home</a></li>
						</ul>
					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-user"></i>
							<span class="nav-text">User</span>
						</a>
						<ul aria-expanded="false" class="left">
							<li class="nav-text-icon-toggle">User</li>
							<li><a class="dz-active" href="app-profile.php">Profile</a></li>
							<li><a class="dz-active" href="edit-profile.php">Edit Profile</a></li>
							<li><a class="dz-active" href="post-details.php">Post Details</a></li>


						</ul>
					</li>
					<?php if (function_exists('gesclub_is_admin') && gesclub_is_admin()) { ?>
						<li>
							<a href="admin-users.php" class="ai-icon" aria-expanded="false">
								<i class="flaticon-user-1"></i>
								<span class="nav-text">Administración Usuarios</span>
							</a>
						</li>
					<?php } ?>
					<li>
						<a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-bag"></i>
							<span class="nav-text">jobs</span>
						</a>
						<ul aria-expanded="false" class="left">
							<li class="nav-text-icon-toggle">jobs</li>
							<li><a class="dz-active" href="job-view.php">Job View</a></li>
							<li><a class="dz-active" href="job-application.php">Job Application</a></li>
							<li><a class="dz-active" href="apply-job.php">Apply Job</a></li>
							<li><a class="dz-active" href="new-job.php">New Job</a></li>

						</ul>
					</li>

					<li><a href="pricing.php" class="ai-icon" aria-expanded="false">
							<i class="flaticon-price-tag"></i>
							<span class="nav-text">Pricing</span>
						</a>
					</li>
					<li class="menu-title">Apps</li>
					<li>
						<a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-chat"></i>
							<span class="nav-text">Chat</span>
						</a>
						<ul aria-expanded="false" class="left">
							<li class="nav-text-icon-toggle">Chat</li>
							<li><a class="dz-active" href="chat-home.php">Chat Home</a></li>
							<li><a class="dz-active" href="chat-modal.php">Chat Modal</a></li>

						</ul>
					</li>
					<li><a href="kanban.php" class="ai-icon" aria-expanded="false">
							<i class="flaticon-kanban"></i>
							<span class="nav-text">Kanban</span>
						</a>
					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">

							<i class="flaticon-email"></i>
							<span class="nav-text">Email</span>
						</a>
						<ul aria-expanded="false" class="left">
							<li class="nav-text-icon-toggle">Email</li>
							<li><a class="dz-active" href="email-compose.php">Compose</a></li>
							<li><a class="dz-active" href="email-inbox.php">Inbox</a></li>
							<li><a class="dz-active" href="email-read.php">Read</a></li>
						</ul>
					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-shopping-bag"></i>

							<span class="nav-text">Ecommerce</span>
						</a>
						<ul aria-expanded="false" class="left">
							<li class="nav-text-icon-toggle">Ecommerce</li>
							<li><a class="dz-active" href="ecommerce-dashboard.php">Dashboard</a></li>
							<li><a class="dz-active" href="ecommerce-setting.php">Setting</a></li>
							<li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Categories</a>
								<ul aria-expanded="false" class="left">
									<li class="nav-text-icon-toggle">Categories</li>
									<li><a class="dz-active" href="category-table.php">Category Table</a></li>
									<li><a class="dz-active" href="add-categary.php">Add Category</a></li>
									<li><a class="dz-active" href="edit-categary.php">Edit Category</a></li>
								</ul>
							</li>

							<li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Products</a>
								<ul aria-expanded="false" class="left">
									<li class="nav-text-icon-toggle">Products</li>
									<li><a class="dz-active" href="product-table.php">Product Table</a></li>
									<li><a class="dz-active" href="add-product.php">Add product</a></li>
									<li><a class="dz-active" href="edit-product.php">Edit Product</a></li>
								</ul>
							</li>
							<li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Shop</a>
								<ul aria-expanded="false" class="left">
									<li class="nav-text-icon-toggle">Shop</li>
									<li><a class="dz-active" href="ecom-product-grid.php">Product Grid</a></li>
									<li><a class="dz-active" href="ecom-product-list.php">Product List</a></li>
									<li><a class="dz-active" href="ecom-product-detail.php">Product Details</a></li>
									<li><a class="dz-active" href="ecom-product-order.php">Order</a></li>
									<li><a class="dz-active" href="ecom-checkout.php">Checkout</a></li>
									<li><a class="dz-active" href="ecom-invoice.php">Invoice</a></li>
									<li><a class="dz-active" href="ecom-customers.php">Customers</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-rocket"></i>
							<span class="nav-text">Projects</span>
						</a>
						<ul aria-expanded="false" class="left">
							<li class="nav-text-icon-toggle">Projects</li>
							<li><a class="dz-active" href="project-list.php">Project List</a></li>
							<li><a class="dz-active" href="project-card.php">Project Card</a></li>
							<li><a class="dz-active" href="add-project.php">Add Project</a></li>

						</ul>
					</li>
					<li><a href="note.php" class="ai-icon" aria-expanded="false">
							<i class="flaticon-notes"></i>
							<span class="nav-text">Notes</span>
						</a>
					</li>
					<li><a href="task.php" class="ai-icon" aria-expanded="false">
							<i class="flaticon-checkmark"></i>
							<span class="nav-text">Task</span>
						</a>
					</li>
					<li><a href="file-manger.php" class="ai-icon" aria-expanded="false">
							<i class="flaticon-approved"></i>
							<span class="nav-text">File Manager</span>
						</a>
					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-phone-book"></i>
							<span class="nav-text">Contacts</span>
						</a>
						<ul aria-expanded="false" class="left">
							<li class="nav-text-icon-toggle">Contacts</li>
							<li><a class="dz-active" href="contact-list.php">Contact List</a></li>
							<li><a class="dz-active" href="contact-card.php">Contact Card</a></li>
						</ul>
					</li>

					<li><a href="app-calender.php" class="" aria-expanded="false">
							<i class="flaticon-calendar-2"></i>
							<span class="nav-text">Calender</span>

						</a>
					</li>
					<li class="menu-title">Components</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-bar-chart"></i>
							<span class="nav-text">Charts</span>
						</a>
						<ul aria-expanded="false" class="left">
							<li class="nav-text-icon-toggle">Charts</li>
							<li><a class="dz-active" href="apex.php">Apex Chart</a></li>
							<li><a class="dz-active" href="chart-flot.php">Flot</a></li>
							<li><a class="dz-active" href="chart-morris.php">Morris</a></li>
							<li><a class="dz-active" href="chart-chartjs.php">Chartjs</a></li>
							<li><a class="dz-active" href="chart-chartist.php">Chartist</a></li>
							<li><a class="dz-active" href="chart-sparkline.php">Sparkline</a></li>
							<li><a class="dz-active" href="chart-peity.php">Peity</a></li>

						</ul>
					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-web"></i>
							<span class="nav-text">Bootstrap</span>
						</a>
						<ul aria-expanded="false" class="left">
							<li class="nav-text-icon-toggle">Bootstrap</li>
							<li><a class="dz-active" href="ui-accordion.php">Accordion</a></li>
							<li><a class="dz-active" href="ui-alert.php">Alert</a></li>
							<li><a class="dz-active" href="ui-badge.php">Badge</a></li>
							<li><a class="dz-active" href="ui-button.php">Button</a></li>
							<li><a class="dz-active" href="ui-modal.php">Modal</a></li>
							<li><a class="dz-active" href="ui-button-group.php">Button Group</a></li>
							<li><a class="dz-active" href="ui-list-group.php">List Group</a></li>
							<li><a class="dz-active" href="ui-card.php">Cards</a></li>
							<li><a class="dz-active" href="ui-carousel.php">Carousel</a></li>
							<li><a class="dz-active" href="ui-dropdown.php">Dropdown</a></li>
							<li><a class="dz-active" href="ui-popover.php">Popover</a></li>
							<li><a class="dz-active" href="ui-progressbar.php">Progressbar</a></li>
							<li><a class="dz-active" href="ui-tab.php">Tab</a></li>
							<li><a class="dz-active" href="ui-typography.php">Typography</a></li>
							<li><a class="dz-active" href="ui-pagination.php">Pagination</a></li>
							<li><a class="dz-active" href="ui-grid.php">Grid</a></li>

						</ul>
					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-puzzle"></i>
							<span class="nav-text">Plugins</span>
						</a>
						<ul aria-expanded="false" class="left">
							<li class="nav-text-icon-toggle">Plugins</li>
							<li><a class="dz-active" href="uc-select2.php">Select 2</a></li>
							<li><a class="dz-active" href="uc-nestable.php">Nestedable</a></li>
							<li><a class="dz-active" href="uc-noui-slider.php">Noui Slider</a></li>
							<li><a class="dz-active" href="uc-tree.php">Tree View</a></li>
							<li><a class="dz-active" href="uc-star-rating.php">Star Rating</a></li>
							<li><a class="dz-active" href="uc-drag-and-drop.php">Drag And Drop</a></li>
							<li><a class="dz-active" href="uc-media-player.php">Media Player</a></li>
							<li><a class="dz-active" href="uc-sweetalert.php">Sweet Alert</a></li>
							<li><a class="dz-active" href="uc-toastr.php">Toastr</a></li>
							<li><a class="dz-active" href="map-jqvmap.php">Jqv Map</a></li>
							<li><a class="dz-active" href="uc-lightgallery.php">Light Gallery</a></li>
						</ul>
					</li>
					<li><a href="widget-basic.php" class="" aria-expanded="false">
							<i class="flaticon-app"></i>
							<span class="nav-text">Widget</span>
						</a>
					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-registration"></i>
							<span class="nav-text">Forms</span>
						</a>
						<ul aria-expanded="false" class="left">
							<li class="nav-text-icon-toggle">Forms</li>
							<li><a class="dz-active" href="form-element.php">Form Elements</a></li>
							<li><a class="dz-active" href="form-wizard.php">Wizard</a></li>
							<li><a class="dz-active" href="form-ckeditor.php">CkEditor</a></li>
							<li><a class="dz-active" href="form-pickers.php">Pickers</a></li>
							<li><a class="dz-active" href="form-validation.php">Form Validate</a></li>
						</ul>
					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-grid"></i>
							<span class="nav-text">Table</span>
						</a>
						<ul aria-expanded="false" class="left">
							<li class="nav-text-icon-toggle">Table</li>
							<li><a class="dz-active" href="table-bootstrap-basic.php">Bootstrap</a></li>
							<li><a class="dz-active" href="table-datatable-basic.php">Datatable</a></li>
						</ul>
					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-file"></i>
							<span class="nav-text">Pages</span>
						</a>
						<ul aria-expanded="false" class="left">
							<li><a class="dz-active" href="page-login.php">Login</a></li>
							<li><a class="dz-active" href="page-register.php">Register</a></li>
							<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
								<ul aria-expanded="false" class="left">
									<li class="nav-text-icon-toggle">Pages</li>
									<li><a class="dz-active" href="page-error-400.php">Error 400</a></li>
									<li><a class="dz-active" href="page-error-403.php">Error 403</a></li>
									<li><a class="dz-active" href="page-error-404.php">Error 404</a></li>
									<li><a class="dz-active" href="page-error-500.php">Error 500</a></li>
									<li><a class="dz-active" href="page-error-503.php">Error 503</a></li>
								</ul>
							</li>
							<li><a class="dz-active" href="page-lock-screen.php">Lock Screen</a></li>
							<li><a class="dz-active" href="empty-page.php">Empty Page</a></li>
						</ul>
					</li>

				</ul>

				<div class="copyright">
					<p><strong>Kubayar Invoicing Admin Dashboard</strong> © <span class="current-year">2024</span> All
						Rights Reserved</p>
					<p class="fs-12">Made with <span class="heart"></span> by DexignZone</p>
				</div>
			</div>
		</div>
