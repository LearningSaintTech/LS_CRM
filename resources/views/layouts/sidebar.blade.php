<div class="icnav">
    <div class="icnav-scroll">
        <ul class="metismenu" id="menu">
            {{-- <li class="menu-title" data-i18n="Learning Saint">Learning Saint</li> --}}
            <li>
                <a class="has-arrow" href="{{ route('dashboard') }}" aria-expanded="false">
                    <div class="menu-icon">
                        <i class="fi fi-rr-home"></i>
                    </div>
                    <span class="nav-text" data-i18n="Dashboard">Dashboard</span>
                </a>
                {{-- <ul aria-expanded="false">
                    <li><a href="{{ route('dashboard') }}" data-i18n="Dashboard Light">Dashboard Light</a></li>
                    <li><a href="{{ route('dashboard') }}" data-i18n="Dashboard Dark">Dashboard Dark</a></li>
                </ul> --}}
            </li>
            {{-- start  by amarjeet kushwaha all menu should be same --}}


            @can('View Customer')
             <x-sidebar-menu-item  route="employee.list" icon="fi fi-rs-employees"  text="Employees" />
            @endcan    

            <x-sidebar-menu-item route="blog.list" icon="fi fi-rs-book" text="BLog"/>

            <x-sidebar-menu-item  route="settings.index" icon="fi fi-rr-settings"  text="Setting" />

            {{-- end  by amarjeet kushwaha --}}

            <li>
                <a href="core-hr.html" aria-expanded="false">
                    <div class="menu-icon">
                        <i class="fi fi-rr-hr"></i>
                    </div>
                    <span class="nav-text" data-i18n="Core HR">Core HR</span>
                </a>
            </li>
            <li>
                <a href="finance.html" aria-expanded="false">
                    <div class="menu-icon">
                        <i class="fi fi-rr-file-invoice-dollar"></i>
                    </div>
                    <span class="nav-text" data-i18n="Finance">Finance</span>
                </a>
            </li>

            <li>
                <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                    <div class="menu-icon">
                        <i class="fi fi-rr-note"></i>
                    </div>
                    <span class="nav-text" data-i18n="Task">Task</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="task.html" data-i18n="Task">Task</a></li>
                    <li><a href="task-summary.html" data-i18n="Task Summary">Task Summary</a></li>
                </ul>
            </li>
            <li>
                <a href="performance.html" aria-expanded="false">
                    <div class="menu-icon">
                        <i class="fi fi-rs-dashboard"></i>
                    </div>
                    <span class="nav-text" data-i18n="Performance">Performance</span>
                </a>
            </li>

            <li>
                <a href="project.html" aria-expanded="false">
                    <div class="menu-icon">
                        <i class="fi fi-rr-workflow-alt"></i>
                    </div>
                    <span class="nav-text" data-i18n="Projects">Projects</span>
                </a>
            </li>
            <li>
                <a href="reports.html" aria-expanded="false">
                    <div class="menu-icon">
                        <i class="fi fi-rr-file-medical-alt"></i>
                    </div>
                    <span class="nav-text" data-i18n="Reports">Reports</span>
                </a>
            </li>
            <li>
                <a href="manage-client.html" aria-expanded="false">
                    <div class="menu-icon">
                        <i class="fi fi-rr-user-gear"></i>
                    </div>
                    <span class="nav-text" data-i18n="Manage Clients">Manage Clients</span>
                </a>
            </li>
            <li>
                <a href="blog.html" aria-expanded="false">
                    <div class="menu-icon">
                        <i class="fi fi-rr-blog-text"></i>
                    </div>
                    <span class="nav-text" data-i18n="Blog">Blog</span>
                </a>
            </li>
            <li class="menu-title" data-i18n="OUR FEATURES">OUR FEATURES</li>
            <li>
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <div class="menu-icon">
                        <i class="fi fi-rs-comment-user"></i>
                    </div>
                    <span class="nav-text" data-i18n="Apps">Apps</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="chat.html" data-i18n="Chat">Chat</a></li>
                    <li>
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false"
                            data-i18n="Users Manager">Users Manager</a>
                        <ul aria-expanded="false">
                            <li><a href="#" data-i18n="User">User</a></li>
                            <li><a href="#" data-i18n="Roles Listing">Roles Listing </a></li>
                            <li><a href="#" data-i18n="Add Roles">Add Roles</a></li>
                            <li><a href="#" data-i18n="App Profile">App Profile</a></li>
                            <li><a href="#" data-i18n="App Profile 2">App Profile 2</a></li>
                            <li><a href="#" data-i18n="Edit Profile">Edit Profile</a></li>
                            <li><a href="#" data-i18n="Post Details">Post Details</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false"
                            data-i18n="Customer Manager">Customer Manager</a>
                        <ul aria-expanded="false">
                            <li><a href="#" data-i18n="Customer List">Customer List</a></li>
                            <li><a href="customer-profile.html" data-i18n="Customer Profile">Customer Profile</a></li>
                        </ul>
                    </li>
                    <li><a href="contacts.html" data-i18n="Contacts">Contacts</a></li>
                    <li>
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false"
                            data-i18n="Email">Email</a>
                        <ul aria-expanded="false">
                            <li><a href="email-compose.html" data-i18n="Compose"> Compose</a></li>
                            <li><a href="email-inbox.html" data-i18n="Inbox">Inbox</a></li>
                            <li><a href="email-read.html" data-i18n="Read">Read</a></li>
                        </ul>
                    </li>
                    <li><a href="app-calender.html" data-i18n="Calendar">Calendar</a></li>
                    <li>
                        <a class="has-arrow" href="javascript:void(0);" aria-expanded="false"
                            data-i18n="Shop">Shop</a>
                        <ul aria-expanded="false">
                            <li><a href="ecom-product-grid.html" data-i18n="Product Grid">Product Grid</a></li>
                            <li><a href="ecom-product-list.html" data-i18n="Product List">Product List</a></li>
                            <li><a href="ecom-product-detail.html" data-i18n="Product Details">Product Details</a>
                            </li>
                            <li><a href="ecom-product-order.html" data-i18n="Order">Order</a></li>
                            <li><a href="ecom-checkout.html" data-i18n="Checkout">Checkout</a></li>
                            <li><a href="ecom-invoice.html" data-i18n="Invoice">Invoice</a></li>
                            <li><a href="ecom-customers.html" data-i18n="Customers">Customers</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                    <div class="menu-icon">
                        <i class="fi fi-rs-user"></i>
                    </div>
                    <span class="nav-text" data-i18n="Profile">Profile</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="profile/overview.html" data-i18n="Overview">Overview</a></li>
                    <li><a href="profile/projects.html" data-i18n="Projects">Projects</a></li>
                    <li><a href="profile/projects-details.html" data-i18n="Projects Details">Projects Details</a></li>
                    <li><a href="profile/campaigns.html" data-i18n="Campaigns">Campaigns</a></li>
                    <li><a href="profile/documents.html" data-i18n="Documents">Documents</a></li>
                    <li><a href="profile/followers.html" data-i18n="Followers">Followers</a></li>
                    <li><a href="profile/activity.html" data-i18n="Activity">Activity</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <div class="menu-icon">
                        <i class="fi fi-rr-user-skill-gear"></i>
                    </div>
                    <span class="nav-text" data-i18n="Account">Account</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="account/overview.html" data-i18n="Overview">Overview</a></li>
                    <li><a href="account/settings.html" data-i18n="Settings">Settings</a></li>
                    <li><a href="account/security.html" data-i18n="Security">Security</a></li>
                    <li><a href="account/activity.html" data-i18n="Activity">Activity</a></li>
                    <li><a href="account/billing.html" data-i18n="Billing">Billing</a></li>
                    <li><a href="account/statements.html" data-i18n="Statements">Statements</a></li>
                    <li><a href="account/referrals.html" data-i18n="Referrals">Referrals</a></li>
                    <li><a href="account/api-keys.html" data-i18n="Api Keys">Api Keys</a></li>
                    <li><a href="account/logs.html" data-i18n="Logs">Logs</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                    <div class="menu-icon">
                        <i class="fi fi-rs-microchip-ai"></i>
                    </div>
                    <span class="nav-text" data-i18n="AIKit">AIKit</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="aikit/auto-write.html" data-i18n="Auto Writer">Auto Writer</a></li>
                    <li><a href="aikit/scheduled.html" data-i18n="Scheduler">Scheduler</a></li>
                    <li><a href="aikit/repurpose.html" data-i18n="Repurpose">Repurpose</a></li>
                    <li><a href="aikit/rss.html" data-i18n="RSS">RSS</a></li>
                    <li><a href="aikit/chatbot.html" data-i18n="Chatbot">Chatbot</a></li>
                    <li><a href="aikit/fine-tune-models.html" data-i18n="Fine tune Models">Fine tune Models</a></li>
                    <li><a href="aikit/prompt.html" data-i18n="AI Menu Prompts">AI Menu Prompts</a></li>
                    <li><a href="aikit/setting.html" data-i18n="Settings">Settings</a></li>
                    <li><a href="aikit/import.html" data-i18n="Export/Import Settings">Export/Import Settings</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <div class="menu-icon">
                        <i class="fi fi-rr-workflow-setting-alt"></i>
                    </div>
                    <span class="nav-text" data-i18n="CMS">CMS</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="cms/content.html" data-i18n="Content">Content</a></li>
                    <li><a href="cms/content-add.html" data-i18n="Add Content">Add Content</a></li>
                    <li><a href="cms/menu.html" data-i18n="Menus">Menus</a></li>
                    <li><a href="cms/email-template.html" data-i18n="Email Template">Email Template</a></li>
                    <li><a href="cms/add-email.html" data-i18n="Add Email">Add Email</a></li>
                    <li><a href="cms/blog.html" data-i18n="Blog">Blog</a></li>
                    <li><a href="cms/blog-category.html" data-i18n="Blog Category">Blog Category</a></li>
                    <li><a href="cms/add-blog.html" data-i18n="Add Blog">Add Blog</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
                    <div class="menu-icon">
                        <i class="fi fi-rr-web-design"></i>
                    </div>
                    <span class="nav-text" data-i18n="Pages">Pages</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="page-login.html" data-i18n="Login">Login</a></li>
                    <li><a href="page-register.html" data-i18n="Register">Register</a></li>
                    <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false"
                            data-i18n="Error">Error</a>
                        <ul aria-expanded="false">
                            <li><a href="page-error-400.html" data-i18n="Error 400">Error 400</a></li>
                            <li><a href="page-error-403.html" data-i18n="Error 403">Error 403</a></li>
                            <li><a href="page-error-404.html" data-i18n="Error 404">Error 404</a></li>
                            <li><a href="page-error-500.html" data-i18n="Error 500">Error 500</a></li>
                            <li><a href="page-error-503.html" data-i18n="Error 503">Error 503</a></li>
                        </ul>
                    </li>
                    <li><a href="page-lock-screen.html" data-i18n="Lock Screen">Lock Screen</a></li>
                    <li><a href="empty-page.html" data-i18n="Empty Page">Empty Page</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="icnav-footer">
        <a href="https://hexabox.dexignlab.com/doc" target="_blank" class="btn btn-docs btn-success w-100">
            <span>Docs & Components</span>
            <i class="fa-solid fa-arrow-up rotate-x"></i>
        </a>
    </div>
</div>
