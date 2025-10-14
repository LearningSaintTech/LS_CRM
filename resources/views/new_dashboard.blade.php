@include('common.header')
		
		<!-- Start - Content Body -->
        <main class="content-body">
			
			<!-- Start - Page Title & Breadcrumb -->
			<div class="page-title">
					<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index.html">Dashboard</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">CRM</li>
					</ol>
			</nav>
			</div>
			<!-- End - Page Title & Breadcrumb -->
			
			<div class="container-fluid">
			
				<div class="row">
					
					<!-- Start - Revenue  -->
					<div class="col-xxl-4 col-xl-12">
						<div class="row">
							<div class="col-xxl-12 col-md-6">
								<div class="card text-bg-primary overflow-hidden z-1">
									<img src="assets/images/card-bg1.png" alt="" class="position-absolute top-0 start-0 z-n1">
									<div class="card-header pb-0 border-0 align-items-start pt-4">
										<h4 class="card-title">Revenue</h4>
										<div class="clearfix">
											<select class="selectpicker form-select form-select-sm">
												<option value="Monthly">Monthly</option>
												<option value="Weekly">Weekly</option>
												<option value="Yearly">Yearly</option>
											</select>
										</div>
									</div>
									<div class="card-body pt-1">
										<h3 class="display-4 text-white fw-semibold mb-2">$34,129.03</h3>
										<div class="d-flex justify-content-between align-items-end">
											<div class="clearfix">
												<span class="text-success fw-medium fs-lg">+8.50%</span>												
												<span class="text-white fs-lg">prev month</span>												
											</div>
											<div id="chartRevenue"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xxl-12 col-md-6">
								<div class="card overflow-hidden z-1">
									<img src="assets/images/card-bg1.png" alt="" class="position-absolute top-0 start-0 z-n1">
									<div class="card-header pb-0 border-0 align-items-start pt-4">
										<h4 class="card-title">Total Sales</h4>
										<div class="clearfix">
											<select class="selectpicker form-select form-select-sm">
												<option value="Monthly">Monthly</option>
												<option value="Weekly">Weekly</option>
												<option value="Yearly">Yearly</option>
											</select>
										</div>
									</div>
									<div class="card-body pt-1">
										<h3 class="display-4 fw-semibold mb-2">$201,843.52</h3>
										<div class="d-flex justify-content-between align-items-end">
											<div class="clearfix">
												<span class="text-success fw-medium fs-lg">+8.50%</span>												
												<span class="text-gray-400 fs-lg">prev month</span>												
											</div>
											<div id="chartTotalSales"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End - Revenue  -->
					
					<!-- Start - Sales Analytics  -->
					<div class="col-xxl-5 col-xl-8">
						<div class="card">
							<div class="card-header pb-0 border-0 align-items-start">
								<h4 class="card-title">Spending Statistic </h4>
								<div class="clearfix">
									<a href="javascript:void(0);" class="btn btn-primary light"><i class="fi fi-rr-download"></i> Download</a>
								</div>
							</div>
							<div class="card-body py-0">
								<span class="fs-lg">Income</span>
								<h3 class="display-5 fw-semibold mb-0">$20,687.69 <span class="text-success fw-medium fs-lg">+8.50%</span></h3>
							</div>
							<div id="chartSpendingStatistic"></div>
							<div class="card-footer p-2 pt-0 border-0">
								<div class="row g-2">
									<div class="col-sm-4 col-6 col-xl-4">
										<div class="border rounded px-3 py-2">
											<span class="fs-sm text-gray-500">Total Revenue</span>
											<h4 class="mb-2 fw-semibold">$201,843.52</h4>
											<span class="fs-sm text-success">+6.32%</span>
										</div>
									</div>
									<div class="col-sm-4 col-6 col-xl-4">
										<div class="border rounded px-3 py-2">
											<span class="fs-sm text-gray-500">Total Sales</span>
											<h4 class="mb-2 fw-semibold">$280,547.36</h4>
											<span class="fs-sm text-danger">-2.05%</span>
										</div>
									</div>
									<div class="col-sm-4 col-12 col-xl-4">
										<div class="border rounded px-3 py-2">
											<span class="fs-sm text-gray-500">Total Profit</span>
											<h4 class="mb-2 fw-semibold">$500,468.15</h4>
											<span class="fs-sm text-success">+2.01%</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End - Sales Analytics  -->
					
					<!-- Start - Greeting Card -->
					<div class="col-xxl-3 col-xl-4 col-md-6">
						<div class="card text-center custom-card-1">
							<div class="card-body">
								<h4 class="fw-semibold fs-xl mb-0">Congratulation James</h4>
								<img class="w-100 mix-blend-darken px-xxl-2" src="assets/images/achieved.png" alt="">
								<h5 class="display-4 fw-semibold mb-1 lh-1">$1200K</h5>
								<p class="text-dark text-opacity-50 mb-2">0.95% since last year</p>
								<p class="fs-lg fw-medium px-xxl-4 lh-sm">You have reached 99.9% of your sales target today.</p>
								<p class="fs-xs text-primary fw-medium mb-0">Updated 20 minutes ago.</p>
							</div>
						</div>
					</div>
					<!-- End - Greeting Card -->
					
					<!-- Start - Customer Transaction -->
					<div class="col-xxl-8 col-xl-8 order-md-1 order-xl-0">
						<div class="card">
							<div class="card-header border-0 align-items-center pb-2">
								<h4 class="card-title">Customer Transaction</h4>
								<a href="javascript:void(0);" class="btn-link btn-link-sm link-hover-end">
									<span class="text-decoration-underline link-offset-1 me-1">View All</span>
									<i class="fi fi-rr-sign-in-alt"></i>
								</a>
							</div>
							<div class="card-body px-2 pt-0 pb-2">
								<div class="table-responsive check-wrapper">
									<table class="table table-sm table-row-rounded table-borderless table-sm-responsive text-nowrap mb-2">
										<thead>
											<tr class="text-nowrap">
												<th class="sorting-disabled">
													<div class="form-check custom-checkbox ms-0 mb-0">
														<input type="checkbox" class="form-check-input check-all" aria-label="Projects checkbox" required>
													</div>
												</th>
												<th>Customer</th>
												<th>Item</th>
												<th>Date</th>
												<th>Status</th>
												<th class="text-end">Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="form-check custom-checkbox">
														<input type="checkbox" class="form-check-input check-input" aria-label="Projects checkbox" required checked>
													</div>
												</td>
												<td>
													<div class="d-flex align-items-center">
														<img src="assets/images/avatar/small/avatar1.webp" class="avatar avatar-xs" alt="">
														<p class="mb-0 ms-2">James Carter</p>	
													</div>
												</td>
												<td>Smart LED TV</td>
												<td>24 May 2024</td>
												<td><span class="badge badge-success light">Completed</span></td>
												<td>
													<div class="d-flex gap-1 justify-content-end">
														<div class="btn btn-square btn-sm btn-primary tp-btn-light">
															<i class="fi fi-rr-eye fs-5"></i>
														</div>
														<div class="btn btn-square btn-sm btn-danger tp-btn-light">
															<i class="fi fi-rr-trash fs-5"></i>
														</div>
														<div class="dropdown">
															<button class="btn btn-square btn-sm btn-secondary tp-btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
																<i class="fi fi-rr-menu-dots fs-5"></i>
															</button>
															<div class="dropdown-menu dropdown-menu-end">
																<a class="dropdown-item" href="javascript:void(0);">Completed</a>
																<a class="dropdown-item" href="javascript:void(0);">Processing</a>
																<a class="dropdown-item" href="javascript:void(0);">On Hold</a>
															</div>
														</div>														
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="form-check custom-checkbox">
														<input type="checkbox" class="form-check-input check-input" aria-label="Projects checkbox" required>
													</div>
												</td>
												<td>
													<div class="d-flex align-items-center">
														<img src="assets/images/avatar/small/avatar2.webp" class="avatar avatar-xs" alt="">
														<p class="mb-0 ms-2">Michael Thompson</p>	
													</div>
												</td>
												<td>Portable Power Bank</td>
												<td>23 May 2024</td>
												<td><span class="badge badge-primary light">In Process</span></td>
												<td>
													<div class="d-flex gap-1 justify-content-end">
														<div class="btn btn-square btn-sm btn-primary tp-btn-light">
															<i class="fi fi-rr-eye fs-5"></i>
														</div>
														<div class="btn btn-square btn-sm btn-danger tp-btn-light">
															<i class="fi fi-rr-trash fs-5"></i>
														</div>
														<div class="dropdown">
															<button class="btn btn-square btn-sm btn-secondary tp-btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
																<i class="fi fi-rr-menu-dots fs-5"></i>
															</button>
															<div class="dropdown-menu dropdown-menu-end">
																<a class="dropdown-item" href="javascript:void(0);">Completed</a>
																<a class="dropdown-item" href="javascript:void(0);">Processing</a>
																<a class="dropdown-item" href="javascript:void(0);">On Hold</a>
															</div>
														</div>														
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="form-check custom-checkbox">
														<input type="checkbox" class="form-check-input check-input" aria-label="Projects checkbox" required>
													</div>
												</td>
												<td>
													<div class="d-flex align-items-center">
														<img src="assets/images/avatar/small/avatar3.webp" class="avatar avatar-xs" alt="">
														<p class="mb-0 ms-2">Daniel Rivera</p>	
													</div>
												</td>
												<td>Bluetooth Smartwatch</td>
												<td>22 May 2024</td>
												<td><span class="badge badge-danger light">On Hold</span></td>
												<td>
													<div class="d-flex gap-1 justify-content-end">
														<div class="btn btn-square btn-sm btn-primary tp-btn-light">
															<i class="fi fi-rr-eye fs-5"></i>
														</div>
														<div class="btn btn-square btn-sm btn-danger tp-btn-light">
															<i class="fi fi-rr-trash fs-5"></i>
														</div>
														<div class="dropdown">
															<button class="btn btn-square btn-sm btn-secondary tp-btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
																<i class="fi fi-rr-menu-dots fs-5"></i>
															</button>
															<div class="dropdown-menu dropdown-menu-end">
																<a class="dropdown-item" href="javascript:void(0);">Completed</a>
																<a class="dropdown-item" href="javascript:void(0);">Processing</a>
																<a class="dropdown-item" href="javascript:void(0);">On Hold</a>
															</div>
														</div>														
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="form-check custom-checkbox">
														<input type="checkbox" class="form-check-input check-input" aria-label="Projects checkbox" required>
													</div>
												</td>
												<td>
													<div class="d-flex align-items-center">
														<img src="assets/images/avatar/small/avatar4.webp" class="avatar avatar-xs" alt="">
														<p class="mb-0 ms-2">Robert Bennett</p>	
													</div>
												</td>
												<td>Wireless Charging Pad</td>
												<td>21 May 2024</td>
												<td><span class="badge badge-success light">Completed</span></td>
												<td>
													<div class="d-flex gap-1 justify-content-end">
														<div class="btn btn-square btn-sm btn-primary tp-btn-light">
															<i class="fi fi-rr-eye fs-5"></i>
														</div>
														<div class="btn btn-square btn-sm btn-danger tp-btn-light">
															<i class="fi fi-rr-trash fs-5"></i>
														</div>
														<div class="dropdown">
															<button class="btn btn-square btn-sm btn-secondary tp-btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
																<i class="fi fi-rr-menu-dots fs-5"></i>
															</button>
															<div class="dropdown-menu dropdown-menu-end">
																<a class="dropdown-item" href="javascript:void(0);">Completed</a>
																<a class="dropdown-item" href="javascript:void(0);">Processing</a>
																<a class="dropdown-item" href="javascript:void(0);">On Hold</a>
															</div>
														</div>														
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="form-check custom-checkbox">
														<input type="checkbox" class="form-check-input check-input" aria-label="Projects checkbox" required>
													</div>
												</td>
												<td>
													<div class="d-flex align-items-center">
														<img src="assets/images/avatar/small/avatar5.webp" class="avatar avatar-xs" alt="">
														<p class="mb-0 ms-2">Anthony Wallace</p>	
													</div>
												</td>
												<td>Noise Cancelling Earbuds</td>
												<td>20 May 2024</td>
												<td><span class="badge badge-danger light">On Hold</span></td>
												<td>
													<div class="d-flex gap-1 justify-content-end">
														<div class="btn btn-square btn-sm btn-primary tp-btn-light">
															<i class="fi fi-rr-eye fs-5"></i>
														</div>
														<div class="btn btn-square btn-sm btn-danger tp-btn-light">
															<i class="fi fi-rr-trash fs-5"></i>
														</div>
														<div class="dropdown">
															<button class="btn btn-square btn-sm btn-secondary tp-btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
																<i class="fi fi-rr-menu-dots fs-5"></i>
															</button>
															<div class="dropdown-menu dropdown-menu-end">
																<a class="dropdown-item" href="javascript:void(0);">Completed</a>
																<a class="dropdown-item" href="javascript:void(0);">Processing</a>
																<a class="dropdown-item" href="javascript:void(0);">On Hold</a>
															</div>
														</div>														
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="form-check custom-checkbox">
														<input type="checkbox" class="form-check-input check-input" aria-label="Projects checkbox" required checked>
													</div>
												</td>
												<td>
													<div class="d-flex align-items-center">
														<img src="assets/images/avatar/small/avatar6.webp" class="avatar avatar-xs" alt="">
														<p class="mb-0 ms-2">Noah Bennett</p>	
													</div>
												</td>
												<td>Digital DSLR Camera</td>
												<td>19 May 2024</td>
												<td><span class="badge badge-success light">Completed</span></td>
												<td>
													<div class="d-flex gap-1 justify-content-end">
														<div class="btn btn-square btn-sm btn-primary tp-btn-light">
															<i class="fi fi-rr-eye fs-5"></i>
														</div>
														<div class="btn btn-square btn-sm btn-danger tp-btn-light">
															<i class="fi fi-rr-trash fs-5"></i>
														</div>
														<div class="dropdown">
															<button class="btn btn-square btn-sm btn-secondary tp-btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
																<i class="fi fi-rr-menu-dots fs-5"></i>
															</button>
															<div class="dropdown-menu dropdown-menu-end">
																<a class="dropdown-item" href="javascript:void(0);">Completed</a>
																<a class="dropdown-item" href="javascript:void(0);">Processing</a>
																<a class="dropdown-item" href="javascript:void(0);">On Hold</a>
															</div>
														</div>														
													</div>
												</td>
											</tr>
											<tr>
												<td>
													<div class="form-check custom-checkbox">
														<input type="checkbox" class="form-check-input check-input" aria-label="Projects checkbox" required>
													</div>
												</td>
												<td>
													<div class="d-flex align-items-center">
														<img src="assets/images/avatar/small/avatar7.webp" class="avatar avatar-xs" alt="">
														<p class="mb-0 ms-2">Ethan Carter</p>	
													</div>
												</td>
												<td>Smart Home Speaker</td>
												<td>18 May 2024</td>
												<td><span class="badge badge-primary light">In Process</span></td>
												<td>
													<div class="d-flex gap-1 justify-content-end">
														<div class="btn btn-square btn-sm btn-primary tp-btn-light">
															<i class="fi fi-rr-eye fs-5"></i>
														</div>
														<div class="btn btn-square btn-sm btn-danger tp-btn-light">
															<i class="fi fi-rr-trash fs-5"></i>
														</div>
														<div class="dropdown">
															<button class="btn btn-square btn-sm btn-secondary tp-btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
																<i class="fi fi-rr-menu-dots fs-5"></i>
															</button>
															<div class="dropdown-menu dropdown-menu-end">
																<a class="dropdown-item" href="javascript:void(0);">Completed</a>
																<a class="dropdown-item" href="javascript:void(0);">Processing</a>
																<a class="dropdown-item" href="javascript:void(0);">On Hold</a>
															</div>
														</div>														
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- End - Customer Transaction -->
					
					<!-- Start - Recent Reviews -->
					<div class="col-xxl-4 col-xl-4 col-md-6">
						<div class="card custom-card-2">
							<div class="card-header border-0 align-items-center pb-2">
								<div class="clearfix">
									<h4 class="card-title">Recent Reviews</h4>
									<p class="card-subtitle fs-md text-gray-500">2k+ 5 Star Review</p>
								</div>
								<a href="javascript:void(0);" class="btn-link btn-link-sm link-hover-end">
									<span class="text-decoration-underline link-offset-1 me-1">View All</span>
									<i class="fi fi-rr-sign-in-alt"></i>
								</a>
							</div>
							<div class="card-body">
								<div class="card-reviews-wrapper">
									<div class="reviews-swiper-pagination"></div>
									<div class="swiper swiper-reviews">
										<div class="swiper-wrapper">
											<div class="swiper-slide">
												<div class="card-reviews">
													<div class="d-flex gap-2 align-items-center border-bottom pb-4 mb-4 border-light">
														<img src="assets/images/avatar/small/avatar1.webp" class="avatar avatar-xs rounded-circle" alt="">
														<div class="clearfix">
															<h6 class="fw-semibold mb-0">Ethan Carter</h6>
															<div class="d-flex fs-sm">
																<i class="fa-solid fa-star text-warning"></i>
																<i class="fa-solid fa-star text-warning"></i>
																<i class="fa-solid fa-star text-warning"></i>
																<i class="fa-solid fa-star text-warning"></i>
																<i class="fa-solid fa-star text-warning"></i>
															</div>
														</div>
													</div>
													<p class="mb-0 text-gray-600">Absolutely love this product! Great quality, fast shipping, and excellent customer service. It exceeded my expectations in every way. I’ll definitely be a repeat customer. Highly recommended to everyone!</p>
												</div>
											</div>
											<div class="swiper-slide">
												<div class="card-reviews">
													<div class="d-flex gap-2 align-items-center border-bottom pb-4 mb-4 border-light">
														<img src="assets/images/avatar/small/avatar2.webp" class="avatar avatar-xs rounded-circle" alt="">
														<div class="clearfix">
															<h6 class="fw-semibold mb-0">James Carter</h6>
															<div class="d-flex fs-sm">
																<i class="fa-solid fa-star text-warning"></i>
																<i class="fa-solid fa-star text-warning"></i>
																<i class="fa-solid fa-star text-warning"></i>
																<i class="fa-solid fa-star text-warning"></i>
																<i class="fa-solid fa-star text-warning"></i>
															</div>
														</div>
													</div>
													<p class="mb-0 text-gray-600">Absolutely love this product! Great quality, fast shipping, and excellent customer service. It exceeded my expectations in every way. I’ll definitely be a repeat customer. Highly recommended to everyone!</p>
												</div>
											</div>
											<div class="swiper-slide">
												<div class="card-reviews">
													<div class="d-flex gap-2 align-items-center border-bottom pb-4 mb-4 border-light">
														<img src="assets/images/avatar/small/avatar3.webp" class="avatar avatar-xs rounded-circle" alt="">
														<div class="clearfix">
															<h6 class="fw-semibold mb-0">Daniel Rivera</h6>
															<div class="d-flex fs-sm">
																<i class="fa-solid fa-star text-warning"></i>
																<i class="fa-solid fa-star text-warning"></i>
																<i class="fa-solid fa-star text-warning"></i>
																<i class="fa-solid fa-star text-warning"></i>
																<i class="fa-solid fa-star text-warning"></i>
															</div>
														</div>
													</div>
													<p class="mb-0 text-gray-600">Absolutely love this product! Great quality, fast shipping, and excellent customer service. It exceeded my expectations in every way. I’ll definitely be a repeat customer. Highly recommended to everyone!</p>
												</div>
											</div>
											<div class="swiper-slide">
												<div class="card-reviews">
													<div class="d-flex gap-2 align-items-center border-bottom pb-4 mb-4 border-light">
														<img src="assets/images/avatar/small/avatar4.webp" class="avatar avatar-xs rounded-circle" alt="">
														<div class="clearfix">
															<h6 class="fw-semibold mb-0">Robert Bennett</h6>
															<div class="d-flex fs-sm">
																<i class="fa-solid fa-star text-warning"></i>
																<i class="fa-solid fa-star text-warning"></i>
																<i class="fa-solid fa-star text-warning"></i>
																<i class="fa-solid fa-star text-warning"></i>
																<i class="fa-solid fa-star text-warning"></i>
															</div>
														</div>
													</div>
													<p class="mb-0 text-gray-600">Absolutely love this product! Great quality, fast shipping, and excellent customer service. It exceeded my expectations in every way. I’ll definitely be a repeat customer. Highly recommended to everyone!</p>
												</div>
											</div>
											<div class="swiper-slide">
												<div class="card-reviews">
													<div class="d-flex gap-2 align-items-center border-bottom pb-4 mb-4 border-light">
														<img src="assets/images/avatar/small/avatar5.webp" class="avatar avatar-xs rounded-circle" alt="">
														<div class="clearfix">
															<h6 class="fw-semibold mb-0">Anthony Wallace</h6>
															<div class="d-flex fs-sm">
																<i class="fa-solid fa-star text-warning"></i>
																<i class="fa-solid fa-star text-warning"></i>
																<i class="fa-solid fa-star text-warning"></i>
																<i class="fa-solid fa-star text-warning"></i>
																<i class="fa-solid fa-star text-warning"></i>
															</div>
														</div>
													</div>
													<p class="mb-0 text-gray-600">Absolutely love this product! Great quality, fast shipping, and excellent customer service. It exceeded my expectations in every way. I’ll definitely be a repeat customer. Highly recommended to everyone!</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							
							</div>
							<div class="card-footer border-0 d-flex justify-content-between align-items-center pb-4 pt-1">
								<div class="d-flex gap-2">
									<div class="avatar-list avatar-list-stacked">
										<img src="assets/images/avatar/small/avatar6.webp" class="avatar avatar-xs rounded-circle border border-2 border-white" alt="">
										<img src="assets/images/avatar/small/avatar7.webp" class="avatar avatar-xs rounded-circle border border-2 border-white" alt="">
										<img src="assets/images/avatar/small/avatar8.webp" class="avatar avatar-xs rounded-circle border border-2 border-white" alt="">
										<img src="assets/images/avatar/small/avatar9.webp" class="avatar avatar-xs rounded-circle border border-2 border-white" alt="">
									</div>
									<div class="clearfix">
										<h3 class="mb-0 fw-bold lh-1">2k+</h3>
										<span class="fs-xs d-block fw-medium text-gray-600">5 Star Review</span>
									</div>
								</div>
								<div class="clearfix">
									<a href="javascript:void(0);" class="btn btn-primary">Report</a>
								</div>
							</div>
						</div>
					</div>
					<!-- End - Recent Reviews -->
					
					<!-- Start - Sales Analytics -->
					<div class="col-xxl-7 col-xl-7">
						<div class="card">
							<div class="card-header pb-0 border-0 align-items-start">
								<h4 class="card-title">Sales Analytics</h4>
								<div class="clearfix">
									<select class="selectpicker form-select form-select-sm">
										<option value="Monthly">Monthly</option>
										<option value="Weekly">Weekly</option>
										<option value="Yearly">Yearly</option>
									</select>
								</div>
							</div>
							<div class="card-body ps-0 pt-2 pe-1 pb-1">
								<div id="chartSalesAnalytics"></div>
							</div>
						</div>
					</div>
					<!-- End - Sales Analytics -->
					
					<!-- Start - World Sales -->
					<div class="col-xxl-5 col-xl-5">
						<div class="card">
							<div class="card-header border-0 pb-0 d-block">
								<h4 class="card-title">World Sales</h4>
								<p class="card-subtitle">Top Selling Countries</p>
							</div>
							<div class="card-body pb-2">
								<div id="worldMap" class="worldMap"></div>
							</div>
						</div>
					</div>
					<!-- End - World Sales -->
					
				</div>
			</div>
			
		</main>
		<!-- End - Content Body -->
	
	@include('common.footer')
</body>
</html>