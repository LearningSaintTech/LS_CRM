<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRM</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="dexignlabs">
    <meta name="robots" content="index, follow">
    <meta name="format-detection" content="telephone=no">
    <meta name="keywords" content="CRM">
    <meta name="description" content="CRM">

    <!-- OPENGRAPH META -->
    <meta property="og:title" content="CRM">
    <meta property="og:description" content="CRM">
    <meta property="og:image" content="https://hexabox.dexignlab.com/xhtml/social-image.png">
    <meta property="og:url" content="https://hexabox.dexignlab.com/">
    <meta property="og:type" content="website">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="https://hexabox.dexignlab.com/xhtml/social-image.png">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="https://hexabox.dexignlab.com/xhtml/page-login.html">
    <link href="{{ url('assets/vendor/@yaireo/tagify/dist/tagify.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/metismenu/dist/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/@flaticon/flaticon-uicons/css/all/all.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">


    <!-- Start - Style CSS -->
    <link class="main-plugins" href="{{ url('assets/css/plugins.css') }}" rel="stylesheet">
    <link class="main-css" href="{{ url('assets/css/style.css') }}" rel="stylesheet">
    <!-- End - Style CSS -->

</head>

<body>

    <!-- Start - Preloader -->
    <div class="ic_preloader" id="ic_preloader">
        <div class="spinner">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- End - Preloader -->

    <!-- Start - Authentication Wrapper -->
    <div class="auth-wrapper">
        <div class="row">
            <div class="col-xl-6 col-lg-6 order-lg-1">
                <div class="auth-info text-center">
                    <div class="mb-5 mx-auto col-xxl-6">
                        <div class="brand-logo mb-3">
                            <svg class="logo-abbr" width="26" height="28" viewBox="0 0 26 28" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.7002 21.3959C11.7002 23.2237 11.7003 25.0515 11.6998 26.8792C11.6998 26.9941 11.7011 27.1096 11.69 27.2236C11.6319 27.8192 11.238 28.0037 10.7265 27.7033C8.84575 26.5987 6.95798 25.5061 5.07503 24.4052C3.78792 23.6527 2.49338 22.912 1.22394 22.1307C0.579454 21.734 0.312351 21.051 0.163525 20.3476C0.0628203 19.8717 0.0276414 19.3743 0.0253859 18.8863C0.0101364 15.5859 0.0103542 12.2855 0.00929385 8.985C0.00919286 8.66909 -0.0766978 8.30189 0.275725 8.11069C0.630101 7.91842 0.929739 8.12665 1.23296 8.30542C2.93186 9.3071 4.63512 10.3014 6.33822 11.296C7.31084 11.8639 8.29053 12.42 9.25834 12.996C9.80354 13.3204 10.3391 13.6626 10.8644 14.0184C11.4737 14.4311 11.6866 15.0552 11.6898 15.7559C11.6986 17.6359 11.6928 19.5159 11.6928 21.3959C11.6953 21.3959 11.6977 21.3959 11.7002 21.3959Z"
                                    fill="var(--bs-primary)"></path>
                                <path
                                    d="M25.6234 14.1081C25.6234 15.8518 25.6489 17.5959 25.6156 19.339C25.5869 20.8431 24.8493 21.948 23.5512 22.6911C21.5313 23.8474 19.5128 25.0063 17.4936 26.1639C16.5156 26.7246 15.5389 27.2875 14.5586 27.8441C13.9628 28.1824 13.5041 27.9622 13.4197 27.2792C13.3803 26.961 13.4109 26.634 13.4119 26.311C13.4145 25.4651 13.4294 24.619 13.4182 23.7733C13.4078 22.9958 13.6852 22.4268 14.3983 22.033C16.0336 21.1302 17.6448 20.1835 19.2623 19.2487C19.4781 19.124 19.6826 18.9756 19.8769 18.8191C20.2235 18.54 20.3805 18.1727 20.3793 17.7227C20.3745 15.9264 20.3797 14.1301 20.3817 12.3338C20.3819 12.1354 20.3807 11.9368 20.3884 11.7386C20.4163 11.0208 20.6844 10.4784 21.3657 10.1224C22.4846 9.53765 23.5697 8.88831 24.6699 8.26757C24.7787 8.20614 24.8888 8.14344 25.0052 8.09943C25.3152 7.98221 25.6025 8.14336 25.664 8.46987C25.685 8.58149 25.6816 8.69855 25.6817 8.81313C25.6827 10.5781 25.6824 12.3431 25.6824 14.1081C25.6627 14.1081 25.643 14.1081 25.6234 14.1081Z"
                                    fill="var(--bs-primary)"></path>
                                <path opacity="0.25"
                                    d="M13.0025 0.00151014C13.6015 -0.0206893 14.3033 0.203206 14.9535 0.5845C17.818 2.26445 20.6791 3.95014 23.5378 5.63994C24.0618 5.94965 24.0537 6.41092 23.51 6.75576C23.0519 7.04624 22.5688 7.29727 22.0946 7.56196C21.4017 7.94876 20.7065 8.3315 20.013 8.71724C19.5444 8.97789 19.0627 8.90335 18.6276 8.68374C17.9487 8.34107 17.293 7.9496 16.6421 7.55476C15.7407 7.00802 14.8647 6.41887 13.9557 5.88576C13.2056 5.4459 12.4158 5.38203 11.6376 5.84507C10.0582 6.78481 8.475 7.7186 6.90802 8.67869C6.41784 8.97902 5.94894 8.95078 5.48663 8.70423C4.69462 8.28187 3.92316 7.82111 3.14122 7.37973C2.8413 7.21044 2.53328 7.05538 2.23429 6.8845C1.57183 6.50588 1.57494 5.89202 2.24741 5.50149C2.85227 5.15022 3.47365 4.82718 4.07555 4.47108C6.16937 3.23232 8.26168 1.99089 10.3465 0.737018C11.1171 0.273524 11.933 0.00235166 13.0025 0.00151014Z"
                                    fill="var(--bs-dark)"></path>
                                <path
                                    d="M18.4755 14.8425C18.4755 15.4478 18.4624 16.0534 18.4797 16.6581C18.4935 17.1406 18.3341 17.5065 17.906 17.7543C17.2026 18.1614 16.5074 18.5826 15.8064 18.994C15.2034 19.3479 14.5989 19.6994 13.9906 20.0441C13.8922 20.0998 13.7122 20.1753 13.6708 20.1358C13.563 20.033 13.4529 19.8737 13.4475 19.7329C13.4253 19.1596 13.442 18.5848 13.4446 18.0105C13.4476 17.3213 13.4291 16.6311 13.4631 15.9435C13.4798 15.606 13.5635 15.2632 13.6715 14.9411C13.8103 14.5273 14.1343 14.276 14.5186 14.0677C15.6558 13.451 16.7777 12.8059 17.9065 12.1736C18.2088 12.0043 18.2956 12.0272 18.4123 12.3535C18.4777 12.5364 18.5167 12.7378 18.5207 12.9319C18.5339 13.5685 18.5257 14.2056 18.5257 14.8425C18.509 14.8425 18.4922 14.8425 18.4755 14.8425Z"
                                    fill="var(--bs-dark)"></path>
                                <path opacity="0.5"
                                    d="M12.5674 12.7909C12.1932 12.6002 11.7695 12.4066 11.3678 12.1749C10.4726 11.6588 9.58824 11.1239 8.69971 10.5963C8.32295 10.3725 8.31599 10.1117 8.69513 9.8961C9.90225 9.2096 11.1172 8.53687 12.3211 7.84468C12.6573 7.65137 12.9366 7.65727 13.2766 7.86121C14.3867 8.52682 15.5168 9.15874 16.6378 9.80604C17.0913 10.0679 17.1041 10.4204 16.6413 10.6788C15.4656 11.3356 14.2789 11.973 13.093 12.6113C12.9587 12.6836 12.8013 12.7126 12.5674 12.7909Z"
                                    fill="var(--bs-dark)"></path>
                            </svg>
                            <svg class="brand-title" width="86" height="16" viewBox="0 0 86 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.946822 15.0002V0.454789H4.02211V6.45621H10.265V0.454789H13.3332V15.0002H10.265V8.99172H4.02211V15.0002H0.946822ZM20.7835 15.2133C19.6613 15.2133 18.6954 14.986 17.8857 14.5315C17.0808 14.0722 16.4606 13.4235 16.0249 12.5855C15.5893 11.7427 15.3715 10.746 15.3715 9.59541C15.3715 8.47326 15.5893 7.48841 16.0249 6.64087C16.4606 5.79333 17.0737 5.13282 17.8644 4.65933C18.6599 4.18585 19.5927 3.94911 20.6627 3.94911C21.3824 3.94911 22.0524 4.06511 22.6727 4.29712C23.2977 4.52439 23.8422 4.86767 24.3062 5.32695C24.7749 5.78623 25.1395 6.36388 25.3999 7.0599C25.6604 7.75119 25.7906 8.56085 25.7906 9.48888V10.3198H16.5789V8.44485H22.9426C22.9426 8.00924 22.8479 7.62335 22.6585 7.28718C22.4691 6.951 22.2063 6.68822 21.8701 6.49882C21.5387 6.30469 21.1528 6.20763 20.7124 6.20763C20.2532 6.20763 19.846 6.31416 19.4909 6.52723C19.1405 6.73557 18.8659 7.01729 18.667 7.3724C18.4681 7.72278 18.3663 8.11341 18.3616 8.54428V10.3269C18.3616 10.8667 18.461 11.3331 18.6599 11.7261C18.8635 12.1191 19.1499 12.4221 19.5193 12.6352C19.8886 12.8483 20.3266 12.9548 20.8332 12.9548C21.1694 12.9548 21.4771 12.9074 21.7565 12.8127C22.0358 12.718 22.2749 12.576 22.4738 12.3866C22.6727 12.1972 22.8242 11.9652 22.9284 11.6906L25.7267 11.8752C25.5846 12.5476 25.2934 13.1347 24.8531 13.6366C24.4175 14.1338 23.854 14.522 23.1627 14.8014C22.4762 15.076 21.6831 15.2133 20.7835 15.2133ZM30.0981 4.09115L32.1009 7.90507L34.1535 4.09115H37.2572L34.0967 9.5457L37.3424 15.0002H34.2529L32.1009 11.2289L29.9845 15.0002H26.8595L30.0981 9.5457L26.9731 4.09115H30.0981ZM42.1063 15.2062C41.4102 15.2062 40.79 15.0855 40.2455 14.844C39.701 14.5978 39.2701 14.2356 38.9529 13.7573C38.6404 13.2744 38.4841 12.6731 38.4841 11.9534C38.4841 11.3473 38.5954 10.8383 38.8179 10.4264C39.0405 10.0144 39.3435 9.68301 39.727 9.43206C40.1105 9.18112 40.5461 8.99172 41.0338 8.86388C41.5262 8.73604 42.0423 8.64608 42.5821 8.59399C43.2166 8.52771 43.728 8.46615 44.1162 8.40933C44.5045 8.34778 44.7862 8.25782 44.9614 8.13945C45.1366 8.02108 45.2242 7.84589 45.2242 7.61388V7.57127C45.2242 7.12146 45.0821 6.77344 44.798 6.52723C44.5187 6.28102 44.1209 6.15791 43.6048 6.15791C43.0603 6.15791 42.6271 6.27865 42.3051 6.52013C41.9832 6.75687 41.7701 7.05517 41.6659 7.41502L38.8676 7.18774C39.0097 6.52486 39.289 5.95195 39.7057 5.46899C40.1224 4.9813 40.6598 4.60725 41.3179 4.34683C41.9808 4.08168 42.7478 3.94911 43.6191 3.94911C44.2251 3.94911 44.8051 4.02013 45.3591 4.16218C45.9178 4.30422 46.4126 4.52439 46.8435 4.82269C47.2791 5.12098 47.6224 5.50451 47.8733 5.97326C48.1243 6.43727 48.2497 6.99361 48.2497 7.64229V15.0002H45.3804V13.4875H45.2952C45.12 13.8284 44.8856 14.129 44.5921 14.3894C44.2985 14.6451 43.9458 14.8464 43.5338 14.9931C43.1219 15.1352 42.646 15.2062 42.1063 15.2062ZM42.9727 13.1181C43.4178 13.1181 43.8108 13.0305 44.1517 12.8554C44.4926 12.6754 44.7602 12.434 44.9543 12.1309C45.1484 11.8279 45.2455 11.4846 45.2455 11.1011V9.94343C45.1508 10.005 45.0206 10.0618 44.8548 10.1139C44.6939 10.1612 44.5116 10.2062 44.308 10.2488C44.1044 10.2867 43.9008 10.3222 43.6972 10.3554C43.4936 10.3838 43.3089 10.4098 43.1432 10.4335C42.7881 10.4856 42.478 10.5684 42.2128 10.6821C41.9477 10.7957 41.7417 10.9496 41.5949 11.1437C41.4481 11.3331 41.3747 11.5698 41.3747 11.8539C41.3747 12.2659 41.5239 12.5807 41.8222 12.7985C42.1252 13.0116 42.5087 13.1181 42.9727 13.1181ZM50.6539 15.0002V0.454789H56.4777C57.5478 0.454789 58.4403 0.613407 59.1553 0.930642C59.8702 1.24788 60.4076 1.68822 60.7675 2.25166C61.1273 2.81038 61.3073 3.45432 61.3073 4.18348C61.3073 4.75166 61.1936 5.25119 60.9664 5.68206C60.7391 6.1082 60.4266 6.45858 60.0289 6.7332C59.6359 7.00308 59.1861 7.19485 58.6794 7.30848V7.45053C59.2334 7.4742 59.7519 7.63045 60.2348 7.91928C60.7225 8.2081 61.1179 8.61293 61.4209 9.13377C61.7239 9.64986 61.8754 10.2654 61.8754 10.9804C61.8754 11.7521 61.6837 12.4411 61.3002 13.0471C60.9214 13.6484 60.3603 14.1243 59.6169 14.4747C58.8736 14.8251 57.9574 15.0002 56.8683 15.0002H50.6539ZM53.7291 12.486H56.2362C57.0932 12.486 57.7182 12.3227 58.1112 11.996C58.5042 11.6645 58.7007 11.2242 58.7007 10.675C58.7007 10.2725 58.6037 9.91738 58.4095 9.60962C58.2154 9.30185 57.9384 9.06038 57.5786 8.88519C57.2235 8.71 56.7997 8.6224 56.3073 8.6224H53.7291V12.486ZM53.7291 6.54144H56.009C56.4304 6.54144 56.8044 6.46805 57.1311 6.32127C57.4626 6.16975 57.723 5.95668 57.9124 5.68206C58.1065 5.40744 58.2036 5.07837 58.2036 4.69485C58.2036 4.16928 58.0165 3.74551 57.6425 3.42354C57.2732 3.10157 56.7476 2.94058 56.0658 2.94058H53.7291V6.54144ZM68.7487 15.2133C67.6454 15.2133 66.6914 14.9789 65.8865 14.5102C65.0863 14.0367 64.4684 13.3786 64.0328 12.5358C63.5972 11.6882 63.3794 10.7057 63.3794 9.58831C63.3794 8.46142 63.5972 7.47657 64.0328 6.63377C64.4684 5.78623 65.0863 5.12808 65.8865 4.65933C66.6914 4.18585 67.6454 3.94911 68.7487 3.94911C69.8519 3.94911 70.8036 4.18585 71.6038 4.65933C72.4087 5.12808 73.029 5.78623 73.4646 6.63377C73.9002 7.47657 74.118 8.46142 74.118 9.58831C74.118 10.7057 73.9002 11.6882 73.4646 12.5358C73.029 13.3786 72.4087 14.0367 71.6038 14.5102C70.8036 14.9789 69.8519 15.2133 68.7487 15.2133ZM68.7629 12.8696C69.2648 12.8696 69.6838 12.7275 70.02 12.4434C70.3561 12.1546 70.6095 11.7616 70.7799 11.2644C70.9551 10.7673 71.0427 10.2015 71.0427 9.56701C71.0427 8.93254 70.9551 8.36672 70.7799 7.86956C70.6095 7.3724 70.3561 6.97941 70.02 6.69058C69.6838 6.40176 69.2648 6.25735 68.7629 6.25735C68.2562 6.25735 67.8301 6.40176 67.4845 6.69058C67.1436 6.97941 66.8855 7.3724 66.7103 7.86956C66.5399 8.36672 66.4546 8.93254 66.4546 9.56701C66.4546 10.2015 66.5399 10.7673 66.7103 11.2644C66.8855 11.7616 67.1436 12.1546 67.4845 12.4434C67.8301 12.7275 68.2562 12.8696 68.7629 12.8696ZM78.2231 4.09115L80.2259 7.90507L82.2785 4.09115H85.3822L82.2217 9.5457L85.4674 15.0002H82.3779L80.2259 11.2289L78.1095 15.0002H74.9845L78.2231 9.5457L75.0981 4.09115H78.2231Z"
                                    fill="var(--bs-dark)"></path>
                            </svg>
                        </div>
                        <p class="info-text">The CRM dashboard visualizes customer-related metrics and trends over time,
                            providing valuable insights for better decision-making.</p>
                    </div>
                    <div class="auth-media">
                        <img class="w-100 img-fluid" src="assets/images/login.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 mx-auto align-self-center">
                <div class="auth-form">
                    <div class="text-center mb-4">
                        <h3 class="mb-0">Sign In</h3>
                        <p class="mb-0">Log in to continue your journey!</p>
                    </div>
                    <form action="index.html">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control form-control-lg" placeholder="hello@example.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="position-relative">
                                <input type="password" autocomplete="current-password"
                                    class="form-control form-control-lg ic-password"
                                    placeholder="Enter your password">
                                <span class="show-pass position-absolute top-50 end-0 me-2 translate-middle">
                                    <span class="show"><i class="fa fa-eye-slash"></i></span>
                                    <span class="hide"><i class="fa fa-eye"></i></span>
                                </span>
                            </div>
                        </div>
                        <div class="d-flex gap-2 flex-wrap justify-content-between mb-4 mb-lg-5">
                            <div class="form-check custom-checkbox mb-0">
                                <input type="checkbox" class="form-check-input" id="customCheckBox1" required="">
                                <label class="form-check-label" for="customCheckBox1">Remember me</label>
                            </div>
                            <a href="page-forgot-password.html" class="btn-link text-primary">Forgot Password?</a>
                        </div>
                        <div class="text-center mb-4">
                            <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">Sign In</button>
                        </div>
                        <div class="text-center border-bottom border-grey position-relative my-3">
                            <span
                                class="small bg-body-secondary position-absolute top-50 start-50 translate-middle px-2 ">Or
                                continue with</span>
                        </div>
                        <div class="d-flex align-self-center justify-content-center gap-2 py-3">
                            <a target="_blank" href="https://www.facebook.com/"
                                class="btn btn-sm btn-facebook btn-square rounded-circle"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a target="_blank" href="https://www.google.com/"
                                class="btn btn-sm btn-google btn-square rounded-circle"><i
                                    class="fab fa-google"></i></a>
                            <a target="_blank" href="https://twitter.com/"
                                class="btn btn-sm btn-twitter btn-square rounded-circle"><i
                                    class="fab fa-x-twitter"></i></a>
                            <a target="_blank" href="https://www.linkedin.com/"
                                class="btn btn-sm btn-linkedin btn-square rounded-circle"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                        <p class="text-center">Not registered?
                            <a class="btn-link text-primary" href="page-register.html">Register</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ url('assets/vendor/metismenu/dist/metisMenu.min.js') }}"></script>
    <script src="{{ url('assets/vendor/@yaireo/tagify/dist/tagify.js') }}"></script>
    <script src="{{ url('assets/js/icnav-init.js') }}"></script>
    <script src="{{ url('assets/js/custom.js') }}"></script>

</body>

</html>
