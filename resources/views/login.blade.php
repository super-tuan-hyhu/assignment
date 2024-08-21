<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Allaia | Bootstrap eCommerce Template - ThemeForest</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="assetss/css/bootstrap.min.css" rel="stylesheet">
    <link href="assetss/css/style.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="assetss/css/account.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="assetss/css/custom.css" rel="stylesheet">

</head>

<body>
    <div id="page">
        <main class="bg_gray">

            <div class="container margin_30">
                <div class="page_header">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Category</a></li>
                            <li>Page active</li>
                        </ul>
                    </div>
                    <h1>Sign In or Create an Account</h1>
                </div>
                <!-- /page_header -->
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6 col-md-8">
                        <div class="box_account">
                            <h3 class="client">Already Client</h3>
                            @if(session('messageError'))
                                <h3 class="text-danger">{{ session('messageError') }}</h3>
                            @endif
                            <form action="{{ route('postLogin') }}" method="post">
                                @csrf
                                <div class="form_container">
                                    <div class="row no-gutters">
                                        <div class="col-lg-6 pr-lg-1">
                                            <a href="#0" class="social_bt facebook">Login with Facebook</a>
                                        </div>
                                        <div class="col-lg-6 pl-lg-1">
                                            <a href="#0" class="social_bt google">Login with Google</a>
                                        </div>
                                    </div>
                                    <div class="divider"><span>Or</span></div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email*">
                                        @error('email')
                                            <span class="text-danger mt-5">{{ $message }}</span>
                                        @enderror
                                        
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" id="password"  placeholder="Password*">
                                        @error('password')
                                            <span class="text-danger mt-5">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="clearfix add_bottom_15">
                                        <div class="checkboxes float-start">
                                            <label class="container_check">Remember me
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="float-end "><a class="forgot" href="{{ route('register') }}">Register</a></div>
                                    </div>
                                    <div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>
                                    <div id="forgot_pw">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email_forgot" id="email_forgot" placeholder="Type your email">
                                        </div>
                                        <p>A new password will be sent shortly.</p>
                                        <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
                                    </div>
                                </div>
                            </form>

                            <!-- /form_container -->
                        </div>
                        <!-- /box_account -->

                        <!-- /row -->
                    </div>

                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </main>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <h3 data-bs-target="#collapse_1">Quick Links</h3>
                        <div class="collapse dont-collapse-sm links" id="collapse_1">
                            <ul>
                                <li><a href="about.html">About us</a></li>
                                <li><a href="help.html">Faq</a></li>
                                <li><a href="help.html">Help</a></li>
                                <li><a href="account.html">My account</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 data-bs-target="#collapse_2">Categories</h3>
                        <div class="collapse dont-collapse-sm links" id="collapse_2">
                            <ul>
                                <li><a href="listing-grid-1-full.html">Clothes</a></li>
                                <li><a href="listing-grid-2-full.html">Electronics</a></li>
                                <li><a href="listing-grid-1-full.html">Furniture</a></li>
                                <li><a href="listing-grid-3.html">Glasses</a></li>
                                <li><a href="listing-grid-1-full.html">Shoes</a></li>
                                <li><a href="listing-grid-1-full.html">Watches</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 data-bs-target="#collapse_3">Contacts</h3>
                        <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                            <ul>
                                <li><i class="ti-home"></i>97845 Baker st. 567<br>Los Angeles - US</li>
                                <li><i class="ti-headphone-alt"></i>+94 423-23-221</li>
                                <li><i class="ti-email"></i><a href="#0">info@allaia.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 data-bs-target="#collapse_4">Keep in touch</h3>
                        <div class="collapse dont-collapse-sm" id="collapse_4">
                            <div id="newsletter">
                                <div class="form-group">
                                    <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
                                    <button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i></button>
                                </div>
                            </div>
                            <div class="follow_us">
                                <h5>Follow Us</h5>
                                <ul>
                                    <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/twitter_icon.svg" alt="" class="lazy"></a></li>
                                    <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/facebook_icon.svg" alt="" class="lazy"></a></li>
                                    <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/instagram_icon.svg" alt="" class="lazy"></a></li>
                                    <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/youtube_icon.svg" alt="" class="lazy"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row-->
                <hr>
                <div class="row add_bottom_25">
                    <div class="col-lg-6">
                        <ul class="footer-selector clearfix">
                            <li>
                                <div class="styled-select lang-selector">
                                    <select>
                                        <option value="English" selected>English</option>
                                        <option value="French">French</option>
                                        <option value="Spanish">Spanish</option>
                                        <option value="Russian">Russian</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="styled-select currency-selector">
                                    <select>
                                        <option value="US Dollars" selected>US Dollars</option>
                                        <option value="Euro">Euro</option>
                                    </select>
                                </div>
                            </li>
                            <li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/cards_all.svg" alt="" width="198" height="30" class="lazy"></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="additional_links">
                            <li><a href="#0">Terms and conditions</a></li>
                            <li><a href="#0">Privacy</a></li>
                            <li><span>© 2022 Allaia</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- page -->

    <div id="toTop"></div><!-- Back to top button -->

    <!-- COMMON SCRIPTS -->
    <script src="assetss/js/common_scripts.min.js"></script>
    <script src="assetss/js/main.js"></script>

    <script>
        // Client type Panel
        $('input[name="client_type"]').on("click", function() {
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
            $(".box").not(targetBox).hide();
            $(targetBox).show();
        });
    </script>
</body>

</html>


