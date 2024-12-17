@extends('layout')

@section('front-content')

    <header class="site-header optech-header-section" id="sticky-menu">
        <div class="optech-header-top bg-light1">
            <div class="container">
                <div class="optech-header-info-wrap">
                    <div class="optech-header-info dark-color ">
                        <ul>
                            <li><i class="ri-map-pin-2-fill"></i>2774 Oak Drive, Plattsburgh, New York</li>
                            <li><a href="tel:123"><i class="ri-phone-fill"></i>518-564-3200</a></li>
                            <li><a href="mailto:name@email.com"><i class="ri-mail-fill"></i>tecbolt@example.com</a></li>
                        </ul>
                    </div>

                    <div class="optech-header-info-right two">
                        <div class="cur_lun_login_item ">
              <span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM12 11.25C11.3096 11.25 10.75 10.6904 10.75 10C10.75 9.30964 11.3096 8.75 12 8.75C12.6904 8.75 13.25 9.30964 13.25 10C13.25 10.4142 13.5858 10.75 14 10.75C14.4142 10.75 14.75 10.4142 14.75 10C14.75 8.74122 13.9043 7.67998 12.75 7.35352V6.5C12.75 6.08579 12.4142 5.75 12 5.75C11.5858 5.75 11.25 6.08579 11.25 6.5V7.35352C10.0957 7.67998 9.25 8.74122 9.25 10C9.25 11.5188 10.4812 12.75 12 12.75C12.6904 12.75 13.25 13.3096 13.25 14C13.25 14.6904 12.6904 15.25 12 15.25C11.3096 15.25 10.75 14.6904 10.75 14C10.75 13.5858 10.4142 13.25 10 13.25C9.58579 13.25 9.25 13.5858 9.25 14C9.25 15.2588 10.0957 16.32 11.25 16.6465V17.5C11.25 17.9142 11.5858 18.25 12 18.25C12.4142 18.25 12.75 17.9142 12.75 17.5V16.6465C13.9043 16.32 14.75 15.2588 14.75 14C14.75 12.4812 13.5188 11.25 12 11.25Z"
                        fill="#0a165e" />
                </svg>
              </span>
                            <select class="js-example-basic-single" name="state">
                                <option value="AL">USD</option>
                                <option value="WY">EUR</option>
                                <option value="WY">INR</option>
                            </select>
                        </div>

                        <div class="cur_lun_login_item">
              <span>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.87643 2.47813C7.18954 4.3671 6.75001 7.02637 6.75001 10C6.75001 10.3796 6.75718 10.754 6.7711 11.1224C7.79627 11.2054 8.87923 11.25 10 11.25C11.1208 11.25 12.2038 11.2054 13.2289 11.1224C13.2429 10.754 13.25 10.3796 13.25 10C13.25 7.02637 12.8105 4.3671 12.1236 2.47813C11.779 1.53057 11.3865 0.816517 10.9883 0.353377C10.8696 0.215345 10.7565 0.106123 10.6496 0.0207619C10.4349 0.00699121 10.2183 0 10 0C9.78177 0 9.56516 0.00699124 9.3504 0.020762C9.24349 0.106123 9.13042 0.215345 9.01175 0.353377C8.61357 0.816517 8.221 1.53057 7.87643 2.47813ZM13.1315 12.6346C12.1291 12.71 11.0797 12.75 10 12.75C8.92028 12.75 7.87096 12.71 6.86854 12.6346C7.04293 14.5326 7.40024 16.2123 7.87643 17.5219C8.221 18.4694 8.61357 19.1835 9.01175 19.6466C9.13042 19.7847 9.24348 19.8939 9.35039 19.9792C9.56516 19.993 9.78177 20 10 20C10.2183 20 10.4349 19.993 10.6496 19.9792C10.7565 19.8939 10.8696 19.7847 10.9883 19.6466C11.3865 19.1835 11.779 18.4694 12.1236 17.5219C12.5998 16.2123 12.9571 14.5326 13.1315 12.6346ZM5.26493 10.968C5.25504 10.6486 5.25001 10.3257 5.25001 10C5.25001 6.8985 5.70592 4.05777 6.46674 1.96552C6.67341 1.39719 6.90681 0.872262 7.16688 0.407001C3.12245 1.59958 0.144576 5.28026 0.00512695 9.67717C0.882073 10.0753 2.09222 10.433 3.56698 10.7066C4.104 10.8062 4.67155 10.8938 5.26493 10.968ZM0.0879116 11.3317C1.0045 11.6736 2.09274 11.9587 3.29339 12.1814C3.94235 12.3018 4.63038 12.4051 5.3503 12.4893C5.5238 14.6072 5.91514 16.5176 6.46674 18.0345C6.67341 18.6028 6.90681 19.1277 7.16688 19.593C3.43599 18.4929 0.612705 15.2755 0.0879116 11.3317ZM14.6497 12.4893C15.3697 12.4051 16.0577 12.3018 16.7066 12.1814C17.9073 11.9587 18.9955 11.6736 19.9121 11.3317C19.3873 15.2755 16.564 18.4929 12.8332 19.593C13.0932 19.1277 13.3266 18.6028 13.5333 18.0345C14.0849 16.5176 14.4762 14.6072 14.6497 12.4893ZM19.9949 9.67717C19.118 10.0753 17.9078 10.433 16.4331 10.7066C15.896 10.8062 15.3285 10.8938 14.7351 10.968C14.745 10.6486 14.75 10.3257 14.75 10C14.75 6.8985 14.2941 4.05777 13.5333 1.96552C13.3266 1.39719 13.0932 0.872265 12.8332 0.407004C16.8776 1.59958 19.8555 5.28026 19.9949 9.67717Z"
                        fill="#0a165e" />
                </svg>
              </span>
                            <select class="js-example-basic-single" name="state">
                                <option value="AL">ENG</option>
                                <option value="WY">SPN</option>
                                <option value="WY">BNG</option>
                                <option value="WY">RUS</option>
                            </select>
                        </div>

                        <div class="cur_lun_login_item">
              <span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11ZM12 21C15.866 21 19 19.2091 19 17C19 14.7909 15.866 13 12 13C8.13401 13 5 14.7909 5 17C5 19.2091 8.13401 21 12 21Z"
                        fill="#0a165e" />
                </svg>
              </span>
                            <a href="./login.html" class="login-btn">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="optech-header-bottom bg-white">
            <div class="container">
                <nav class="navbar site-navbar">
                    <!-- Brand Logo-->
                    <div class="brand-logo">
                        <a href="index.html">
                            <img src="assets/images/logo/logo-dark.svg" alt="" class="light-version-logo">
                        </a>
                    </div>
                    <div class="menu-block-wrapper">
                        <div class="menu-overlay"></div>
                        <nav class="menu-block" id="append-menu-header">
                            <div class="mobile-menu-head">
                                <div class="go-back">
                                    <i class="fa fa-angle-left"></i>
                                </div>
                                <div class="current-menu-title"></div>
                                <div class="mobile-menu-close">&times;</div>
                            </div>
                            <ul class="site-menu-main">
                                <li class="nav-item nav-item-has-children">
                                    <a href="#" class="nav-link-item drop-trigger">Home <i class="ri-arrow-down-s-fill"></i></a>
                                    <ul class="sub-menu" id="submenu-1">
                                        <li class="sub-menu--item">
                                            <a href="index.html">
                                                <span class="menu-item-text">Main Demo</span>
                                            </a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="index-02.html">
                                                <span class="menu-item-text">IT Solutions</span>
                                            </a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="index-03.html">
                                                <span class="menu-item-text">Tech Agency</span>
                                            </a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="index-04.html">
                                                <span class="menu-item-text">Startup Home</span>
                                            </a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="index-05.html">
                                                <span class="menu-item-text">IT Consulting</span>
                                            </a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="index-06.html">
                                                <span class="menu-item-text">Software Company</span>
                                            </a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="index-07.html">
                                                <span class="menu-item-text">Digital Agency</span>
                                            </a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="index-08.html">
                                                <span class="menu-item-text">Tech Company</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item nav-item-has-children">
                                    <a href="#" class="nav-link-item drop-trigger">Pages <i class="ri-arrow-down-s-fill"></i></a>
                                    <ul class="sub-menu" id="submenu-2">
                                        <li class="sub-menu--item">
                                            <a href="about-us.html">
                                                <span class="menu-item-text">About Us</span>
                                            </a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="pricing.html">
                                                <span class="menu-item-text">Pricing</span>
                                            </a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="dashbord.html">
                                                <span class="menu-item-text">Dashboard</span>
                                            </a>
                                        </li>
                                        <li class="sub-menu--item nav-item-has-children">
                                            <a href="#" data-menu-get="h3" class="drop-trigger">blog <i class="ri-arrow-down-s-fill"></i></a>
                                            <ul class="sub-menu shape-none" id="submenu-3">
                                                <li class="sub-menu--item">
                                                    <a href="blog.html">
                                                        <span class="menu-item-text">Blog</span>
                                                    </a>
                                                </li>
                                                <li class="sub-menu--item">
                                                    <a href="blog-grid.html">
                                                        <span class="menu-item-text">Blog grid</span>
                                                    </a>
                                                </li>
                                                <li class="sub-menu--item">
                                                    <a href="single-blog.html">
                                                        <span class="menu-item-text">blog details</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sub-menu--item nav-item-has-children">
                                            <a href="#" data-menu-get="h3" class="drop-trigger">Service<i class="ri-arrow-down-s-fill"></i>
                                            </a>
                                            <ul class="sub-menu shape-none" id="submenu-4">
                                                <li class="sub-menu--item">
                                                    <a href="service.html">
                                                        <span class="menu-item-text">service</span>
                                                    </a>
                                                </li>
                                                <li class="sub-menu--item">
                                                    <a href="single-service.html">
                                                        <span class="menu-item-text">service details</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sub-menu--item nav-item-has-children">
                                            <a href="#" data-menu-get="h3" class="drop-trigger">Team<i class="ri-arrow-down-s-fill"></i>
                                            </a>
                                            <ul class="sub-menu shape-none" id="submenu-5">
                                                <li class="sub-menu--item">
                                                    <a href="team.html">
                                                        <span class="menu-item-text">team</span>
                                                    </a>
                                                </li>
                                                <li class="sub-menu--item">
                                                    <a href="single-team.html">
                                                        <span class="menu-item-text">team details</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sub-menu--item nav-item-has-children">
                                            <a href="#" data-menu-get="h3" class="drop-trigger">Utility<i class="ri-arrow-down-s-fill"></i>
                                            </a>
                                            <ul class="sub-menu shape-none" id="submenu-7">
                                                <li class="sub-menu--item">
                                                    <a href="faq.html">
                                                        <span class="menu-item-text">faq</span>
                                                    </a>
                                                </li>
                                                <li class="sub-menu--item">
                                                    <a href="errors-404.html">
                                                        <span class="menu-item-text">Error 404</span>
                                                    </a>
                                                </li>
                                                <li class="sub-menu--item">
                                                    <a href="testimonial.html">
                                                        <span class="menu-item-text">testimonial</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sub-menu--item nav-item-has-children">
                                            <a href="#" data-menu-get="h3" class="drop-trigger">Shop<i class="ri-arrow-down-s-fill"></i>
                                            </a>
                                            <ul class="sub-menu shape-none" id="submenu-8">
                                                <li class="sub-menu--item">
                                                    <a href="shop.html">
                                                        <span class="menu-item-text">shop</span>
                                                    </a>
                                                </li>
                                                <li class="sub-menu--item">
                                                    <a href="single-shop.html">
                                                        <span class="menu-item-text">Shop Details</span>
                                                    </a>
                                                </li>
                                                <li class="sub-menu--item">
                                                    <a href="my-cart.html">
                                                        <span class="menu-item-text">My Cart</span>
                                                    </a>
                                                </li>
                                                <li class="sub-menu--item">
                                                    <a href="checkout.html">
                                                        <span class="menu-item-text">Checkout</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item nav-item-has-children">
                                    <a href="#" class="nav-link-item drop-trigger">Portfolio <i class="ri-arrow-down-s-fill"></i></a>
                                    <ul class="sub-menu shape-none" id="submenu-6">
                                        <li class="sub-menu--item">
                                            <a href="portfolio-01.html">
                                                <span class="menu-item-text">Portfolio Grid</span>
                                            </a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="portfolio-02.html">
                                                <span class="menu-item-text">Portfolio masonry</span>
                                            </a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="single-portfolio.html">
                                                <span class="menu-item-text">Single Portfolio</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item nav-item-has-children">
                                    <a href="#" class="nav-link-item drop-trigger">Blog <i class="ri-arrow-down-s-fill"></i></a>
                                    <ul class="sub-menu" id="submenu-9">
                                        <li class="sub-menu--item">
                                            <a href="blog.html">
                                                <span class="menu-item-text">blog</span>
                                            </a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="blog-grid.html">
                                                <span class="menu-item-text">Blog grid</span>
                                            </a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="single-blog.html">
                                                <span class="menu-item-text">blog Details</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="contact-us.html" class="nav-link-item">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-btn header-btn-l1 ms-auto d-none d-xs-inline-flex">
                        <div class="optech-header-icon">
                            <div class="optech-header-search">
                                <i class="ri-search-line"></i>
                            </div>
                            <div class="optech-header-cart">
                <span>
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M18.1906 6.00295L15.6009 2.55004C15.3524 2.21867 14.8823 2.15152 14.5509 2.40004C14.2196 2.64857 14.1524 3.11867 14.4009 3.45004L16.3134 6H7.68847L9.60093 3.45004C9.84946 3.11867 9.7823 2.64857 9.45093 2.40004C9.11956 2.15152 8.64946 2.21867 8.40093 2.55004L5.81125 6.00295C3.91268 6.07556 2.40486 7.481 2.07031 9.25H21.9315C21.5969 7.48103 20.0891 6.07561 18.1906 6.00295ZM20.2829 18.808C19.903 20.6666 18.2815 22 16.4011 22H7.60066C5.7203 22 4.09876 20.6666 3.71893 18.808L2.08401 10.808C2.08006 10.7887 2.07625 10.7693 2.07258 10.75H21.9292C21.9255 10.7693 21.9217 10.7887 21.9178 10.808L20.2829 18.808ZM9.00073 13.25C9.41495 13.25 9.75073 13.5858 9.75073 14L9.75073 18C9.75073 18.4142 9.41495 18.75 9.00073 18.75C8.58652 18.75 8.25073 18.4142 8.25073 18L8.25073 14C8.25073 13.5858 8.58652 13.25 9.00073 13.25ZM15.7507 14C15.7507 13.5858 15.4149 13.25 15.0007 13.25C14.5865 13.25 14.2507 13.5858 14.2507 14V18C14.2507 18.4142 14.5865 18.75 15.0007 18.75C15.4149 18.75 15.7507 18.4142 15.7507 18V14Z"
                          fill="#0A165E" />
                  </svg>

                </span>
                                <span class="cart_number">3</span>
                            </div>
                            <a class="optech-default-btn optech-header-btn" href="contact-us.html" data-text="Get in Touch"><span
                                    class="btn-wraper">Get in Touch</span></a>
                        </div>
                    </div>
                    <!-- mobile menu trigger -->
                    <div class="mobile-menu-trigger">
                        <span></span>
                    </div>
                    <!--/.Mobile Menu Hamburger Ends-->
                </nav>
            </div>
        </div>
    </header>

    <div class="optech-header-search-section">
        <div class="container">
            <div class="optech-header-search-box">
                <input type="search" placeholder="Search here...">
                <button id="header-search" type="button"><i class="ri-search-line"></i></button>
                <p>Type above and press Enter to search. Press Close to cancel.</p>
            </div>
        </div>
        <div class="optech-header-search-close">
            <i class="ri-close-line"></i>
        </div>
    </div>
    <div class="search-overlay"></div>
    <!--End landex-header-section -->



    <div class="optech-hero-section6">
        <div class="optech-hero-slider">
            <div class="optech-hero-slider-item" style="background-image: url(assets/images/hero/hero-bg3.png)">
                <div class="container">
                    <div class="optech-hero-content center sm">
                        <h5>We provide professional IT services</h5>
                        <h1>Affordable big IT & technology solutions</h1>
                        <div class="optech-extra-mt">
                            <a class="optech-default-btn" href="contact-us.html" data-text="Work With Us"><span
                                    class="btn-wraper">Work With Us</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="optech-hero-slider-item" style="background-image: url(assets/images/hero/hero-bg2.png)">
                <div class="container">
                    <div class="optech-hero-content center sm">
                        <div class="animated">
                            <h5>We provide professional IT services</h5>
                            <h1>Software crafting for digital success</h1>
                        </div>
                        <div class="optech-extra-mt animated">
                            <a class="optech-default-btn" href="contact-us.html" data-text="Work With Us"><span
                                    class="btn-wraper">Work With Us</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->

    <div class="section large-padding-tb4 overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="optech-thumb extra-mr">
                        <img data-aos="fade-up" data-aos-duration="600" src="assets/images/v2/thumb1.png" alt="">
                        <div class="optech-thumb-position" data-aos="fade-up" data-aos-duration="800">
                            <img src="assets/images/v2/thumb2.png" alt="">
                        </div>
                        <div class="optech-shape1">
                            <img src="assets/images/shape/shape1.svg" alt="">
                        </div>
                        <div class="optech-shape2">
                            <img src="assets/images/shape/shape2.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="optech-default-content ml40">
                        <h2>Exclusive technology to provide IT solutions</h2>
                        <p>Each demo built with Teba will look different. You can customize almost anything in the appearance of
                            your website with only a few clicks. Each demo built with Teba will look different.</p>
                        <div class="optech-icon-list">
                            <ul>
                                <li><i class="ri-check-line"></i>Easily Build Custom Reports And Dashboards</li>
                                <li><i class="ri-check-line"></i>Legacy Software Modernization</li>
                                <li><i class="ri-check-line"></i>Software For The Open Enterprise</li>
                            </ul>
                        </div>
                        <div class="optech-extra-mt">
                            <a class="optech-default-btn" href="about-us.html" data-text="More About Us"><span class="btn-wraper">More
                  About Us</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->

    <div class="sectin bg-light1 optech-section-padding">
        <div class="container">
            <div class="optech-section-title center">
                <h2>Our awesome services to give you success</h2>
            </div>
            <div class="optech-4column-slider2" data-aos="fade-up" data-aos-duration="800">
                <div class="optech-iconbox-wrap">
                    <div class="optech-iconbox-icon">
                        <img src="assets/images/iconbox/icon4.svg" alt="">
                    </div>
                    <div class="optech-iconbox-data">
                        <h5>Data Tracking <br> Security</h5>
                        <p>Developing a comprehensive IT strategy that aligns.</p>
                        <a class="optech-icon-btn" href="single-service.html"><i class="icon-show ri-arrow-right-line"></i>
                            <span>Learn More</span> <i class="icon-hide ri-arrow-right-line"></i></a>
                    </div>
                </div>
                <div class="optech-iconbox-wrap">
                    <div class="optech-iconbox-icon">
                        <img src="assets/images/iconbox/icon5.svg" alt="">
                    </div>
                    <div class="optech-iconbox-data">
                        <h5>Web & Mobile App <br> Development</h5>
                        <p>Developing a comprehensive IT strategy that aligns.</p>
                        <a class="optech-icon-btn" href="single-service.html"><i class="icon-show ri-arrow-right-line"></i>
                            <span>Learn More</span> <i class="icon-hide ri-arrow-right-line"></i></a>
                    </div>
                </div>
                <div class="optech-iconbox-wrap">
                    <div class="optech-iconbox-icon">
                        <img src="assets/images/iconbox/icon6.svg" alt="">
                    </div>
                    <div class="optech-iconbox-data">
                        <h5> IT Management <br> Service</h5>
                        <p>Developing a comprehensive IT strategy that aligns.</p>
                        <a class="optech-icon-btn" href="single-service.html"><i class="icon-show ri-arrow-right-line"></i>
                            <span>Learn More</span> <i class="icon-hide ri-arrow-right-line"></i></a>
                    </div>
                </div>
                <div class="optech-iconbox-wrap">
                    <div class="optech-iconbox-icon">
                        <img src="assets/images/iconbox/icon7.svg" alt="">
                    </div>
                    <div class="optech-iconbox-data">
                        <h5>UI/UX & Branding <br> Identity</h5>
                        <p>Developing a comprehensive IT strategy that aligns.</p>
                        <a class="optech-icon-btn" href="single-service.html"><i class="icon-show ri-arrow-right-line"></i>
                            <span>Learn More</span> <i class="icon-hide ri-arrow-right-line"></i></a>
                    </div>
                </div>
                <div class="optech-iconbox-wrap">
                    <div class="optech-iconbox-icon">
                        <img src="assets/images/iconbox/icon8.svg" alt="">
                    </div>
                    <div class="optech-iconbox-data">
                        <h5>Digital Marketing <br> Services</h5>
                        <p>Developing a comprehensive IT strategy that aligns.</p>
                        <a class="optech-icon-btn" href="single-service.html"><i class="icon-show ri-arrow-right-line"></i>
                            <span>Learn More</span> <i class="icon-hide ri-arrow-right-line"></i></a>
                    </div>
                </div>
                <div class="optech-iconbox-wrap">
                    <div class="optech-iconbox-icon">
                        <img src="assets/images/iconbox/icon6.svg" alt="">
                    </div>
                    <div class="optech-iconbox-data">
                        <h5>Web & Mobile App <br> Development</h5>
                        <p>Developing a comprehensive IT strategy that aligns.</p>
                        <a class="optech-icon-btn" href="single-service.html"><i class="icon-show ri-arrow-right-line"></i>
                            <span>Learn More</span> <i class="icon-hide ri-arrow-right-line"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End section -->

    <div class="section optech-section-padding">
        <div class="container">
            <div class="optech-section-title center">
                <h2>Explore our recent projects</h2>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="500">
                    <div class="optech-portfolio-wrap">
                        <div class="optech-portfolio-thumb">
                            <img src="assets/images/p1/p1.png" alt="">
                            <a class="optech-portfolio-btn" href="single-portfolio.html">
                                <span class="p-btn-wraper"><i class="ri-arrow-right-up-line"></i></span>
                            </a>
                            <div class="optech-portfolio-data">
                                <a href="single-portfolio.html">
                                    <h4>Digital Product Design</h4>
                                </a>
                                <p>Design, Graphics</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="700">
                    <div class="optech-portfolio-wrap">
                        <div class="optech-portfolio-thumb">
                            <img src="assets/images/p1/p2.png" alt="">
                            <a class="optech-portfolio-btn" href="single-portfolio.html">
                                <span class="p-btn-wraper"><i class="ri-arrow-right-up-line"></i></span>
                            </a>
                            <div class="optech-portfolio-data">
                                <a href="single-portfolio.html">
                                    <h4>Cyber Security Analysis</h4>
                                </a>
                                <p>Security, Technology</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="900">
                    <div class="optech-portfolio-wrap">
                        <div class="optech-portfolio-thumb">
                            <img src="assets/images/p1/p3.png" alt="">
                            <a class="optech-portfolio-btn" href="single-portfolio.html">
                                <span class="p-btn-wraper"><i class="ri-arrow-right-up-line"></i></span>
                            </a>
                            <div class="optech-portfolio-data">
                                <a href="single-portfolio.html">
                                    <h4>Health App Development</h4>
                                </a>
                                <p>Development, Software</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="500">
                    <div class="optech-portfolio-wrap">
                        <div class="optech-portfolio-thumb">
                            <img src="assets/images/p1/p4.png" alt="">
                            <a class="optech-portfolio-btn" href="single-portfolio.html">
                                <span class="p-btn-wraper"><i class="ri-arrow-right-up-line"></i></span>
                            </a>
                            <div class="optech-portfolio-data">
                                <a href="single-portfolio.html">
                                    <h4>Marketing Agency Website</h4>
                                </a>
                                <p>Development, Marketing</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8" data-aos="fade-up" data-aos-duration="700">
                    <div class="optech-portfolio-wrap">
                        <div class="optech-portfolio-thumb">
                            <img src="assets/images/p1/p5.png" alt="">
                            <a class="optech-portfolio-btn" href="single-portfolio.html">
                                <span class="p-btn-wraper"><i class="ri-arrow-right-up-line"></i></span>
                            </a>
                            <div class="optech-portfolio-data">
                                <a href="single-portfolio.html">
                                    <h4>Project for Marketing</h4>
                                </a>
                                <p>Marketing, Business</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="optech-center-btn">
                    <a class="optech-default-btn" href="portfolio-01.html" data-text="View Our All Works"><span
                            class="btn-wraper">View Our All Works</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->

    <div class="section optech-section-padding bg-light1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="optech-default-content mr40">
                        <h2>Let’s build an awesome project together</h2>
                        <p>Each demo built with Teba will look different. You can customize almost anything in the appearance of
                            your website with only a few clicks. Each demo built with Teba will look different.</p>
                        <div class="optech-contact-info-column">
                            <div class="optech-contact-info">
                                <i class="ri-map-pin-2-fill"></i>
                                <h5>Address</h5>
                                <p>1791 Yorkshire Circle Kitty<br>
                                    Hawk, NC 279499</p>
                            </div>
                            <div class="optech-contact-info">
                                <i class="ri-mail-fill"></i>
                                <h5>Contact</h5>
                                <a href="mailto:name@email.com">info@mthemeus.com</a>
                                <a href="tel:123">518-564-3200</a>
                            </div>
                        </div>
                        Office Hours: Mon – Sat: 8:00 AM – 10:00 PM
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-duration="800">
                    <div class="optech-main-form bg-white ml60">
                        <h3>Fill The Contact Form</h3>
                        <p>Feel free to contact with us, we don’t spam your email</p>
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="optech-main-field">
                                        <input type="text" placeholder="Your name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="optech-main-field">
                                        <input type="number" placeholder="Phone number">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="optech-main-field">
                                        <input type="email" placeholder="Email address">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="optech-main-field">
                                        <textarea name="textarea" placeholder="Write your message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button id="optech-main-form-btn" type="button" data-text="Send Message"> <span
                                            class="btn-wraper">Send Message</span> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->

    <div class="section optech-section-padding">
        <div class="container">
            <div class="optech-section-title center">
                <h2>Our expert team is always ready to help you</h2>
            </div>
        </div>
        <div class="optech-4column-slider" data-aos="fade-up" data-aos-duration="800">
            <div class="optech-team-wrap border_all mb-0">
                <div class="optech-team-thumb">
                    <img src="assets/images/team/team5.png" alt="">
                    <div class="optech-social-icon-box style-three position">
                        <ul>
                            <li>
                                <a href="https://www.linkedin.com/">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/">
                                    <i class="ri-twitter-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/">
                                    <i class="ri-instagram-fill"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="optech-team-data">
                    <a href="single-team.html">
                        <h5>Barbara Dundas</h5>
                    </a>
                    <p>Digital Marketer</p>
                </div>
            </div>
            <div class="optech-team-wrap border_all mb-0">
                <div class="optech-team-thumb">
                    <img src="assets/images/team/team1.png" alt="">
                    <div class="optech-social-icon-box style-three position">
                        <ul>
                            <li>
                                <a href="https://www.linkedin.com/">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/">
                                    <i class="ri-twitter-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/">
                                    <i class="ri-instagram-fill"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="optech-team-data">
                    <a href="single-team.html">
                        <h5>Marvin McKinney</h5>
                    </a>
                    <p>CEO & Founder</p>
                </div>
            </div>
            <div class="optech-team-wrap border_all mb-0">
                <div class="optech-team-thumb">
                    <img src="assets/images/team/team2.png" alt="">
                    <div class="optech-social-icon-box style-three position">
                        <ul>
                            <li>
                                <a href="https://www.linkedin.com/">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/">
                                    <i class="ri-twitter-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/">
                                    <i class="ri-instagram-fill"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="optech-team-data">
                    <a href="single-team.html">
                        <h5>Sophia Rodriguez</h5>
                    </a>
                    <p>Creative Director</p>
                </div>
            </div>
            <div class="optech-team-wrap border_all mb-0">
                <div class="optech-team-thumb">
                    <img src="assets/images/team/team3.png" alt="">
                    <div class="optech-social-icon-box style-three position">
                        <ul>
                            <li>
                                <a href="https://www.linkedin.com/">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/">
                                    <i class="ri-twitter-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/">
                                    <i class="ri-instagram-fill"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="optech-team-data">
                    <a href="single-team.html">
                        <h5>Marvin McKinney</h5>
                    </a>
                    <p>Lead Developer</p>
                </div>
            </div>
            <div class="optech-team-wrap border_all mb-0">
                <div class="optech-team-thumb">
                    <img src="assets/images/team/team4.png" alt="">
                    <div class="optech-social-icon-box style-three position">
                        <ul>
                            <li>
                                <a href="https://www.linkedin.com/">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/">
                                    <i class="ri-twitter-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/">
                                    <i class="ri-instagram-fill"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="optech-team-data">
                    <a href="single-team.html">
                        <h5>Alexander Cameron</h5>
                    </a>
                    <p>Product Designer</p>
                </div>
            </div>
            <div class="optech-team-wrap border_all mb-0">
                <div class="optech-team-thumb">
                    <img src="assets/images/team/team6.png" alt="">
                    <div class="optech-social-icon-box style-three position">
                        <ul>
                            <li>
                                <a href="https://www.linkedin.com/">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/">
                                    <i class="ri-twitter-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/">
                                    <i class="ri-instagram-fill"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="optech-team-data">
                    <a href="single-team.html">
                        <h5>Zachary Collins</h5>
                    </a>
                    <p>Cyber Specialist</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->

    <div class="section bg-cover optech-section-padding" style="background-image: url(assets/images/cta/cta-bg2.png)">
        <div class="container">
            <div class="optech-cta-wrap">
                <div class="optech-cta-content center">
                    <h2>Let’s work together</h2>
                    <p>Each demo built with Teba will look different. You can customize anything appearance of your website with
                        only a few clicks</p>
                    <div class="optech-extra-mt" data-aos="fade-up" data-aos-duration="800">
                        <a class="optech-default-btn" href="contact-us.html" data-text="Let’s Start a Project"><span
                                class="btn-wraper">Let’s Start a Project</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->

    <div class="section optech-section-padding2 bg-light1">
        <div class="container">
            <div class="optech-section-title">
                <div class="row">
                    <div class="col-xxl-5 col-lg-7">
                        <h2>Recent blog & articles about technology</h2>
                    </div>
                    <div class="col-xxl-7 col-lg-5 d-flex align-items-center justify-content-end">
                        <div class="optech-title-btn">
                            <a class="optech-default-btn" href="blog.html" data-text="View All Posts"><span class="btn-wraper">View
                  All Posts</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="600">
                    <div class="optech-blog-wrap border-0 bg-white">
                        <a href="single-blog.html">
                            <div class="optech-blog-thumb">
                                <img src="assets/images/blog/blog6.png" alt="">
                            </div>
                        </a>
                        <div class="optech-blog-content reduced-padding">
                            <div class="optech-blog-meta">
                                <ul>
                                    <li><a href="single-blog.html">Technology</a></li>
                                    <li><a href="single-blog.html">26 June 2023</a></li>
                                </ul>
                            </div>
                            <a href="single-blog.html">
                                <h4>Planning your online business goals with a specialist</h4>
                            </a>
                            <a class="optech-icon-btn" href="single-blog.html"><i class="icon-show ri-arrow-right-line"></i>
                                <span>Learn More</span> <i class="icon-hide ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="800">
                    <div class="optech-blog-wrap border-0 bg-white">
                        <a href="single-blog.html">
                            <div class="optech-blog-thumb">
                                <img src="assets/images/blog/blog7.png" alt="">
                            </div>
                        </a>
                        <div class="optech-blog-content reduced-padding">
                            <div class="optech-blog-meta">
                                <ul>
                                    <li><a href="single-blog.html">Technology</a></li>
                                    <li><a href="single-blog.html">26 June 2023</a></li>
                                </ul>
                            </div>
                            <a href="single-blog.html">
                                <h4>Boost your startup business with our digital agency</h4>
                            </a>
                            <a class="optech-icon-btn" href="single-blog.html"><i class="icon-show ri-arrow-right-line"></i>
                                <span>Learn More</span> <i class="icon-hide ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="1000">
                    <div class="optech-blog-wrap border-0 bg-white">
                        <a href="single-blog.html">
                            <div class="optech-blog-thumb">
                                <img src="assets/images/blog/blog8.png" alt="">
                            </div>
                        </a>
                        <div class="optech-blog-content reduced-padding">
                            <div class="optech-blog-meta">
                                <ul>
                                    <li><a href="single-blog.html">Technology</a></li>
                                    <li><a href="single-blog.html">26 June 2023</a></li>
                                </ul>
                            </div>
                            <a href="single-blog.html">
                                <h4>Proactive customer experience in the business</h4>
                            </a>
                            <a class="optech-icon-btn" href="single-blog.html"><i class="icon-show ri-arrow-right-line"></i>
                                <span>Learn More</span> <i class="icon-hide ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->


    <!-- Footer  -->

    <footer class="optech-footer-section optech-section-padding-top">
        <div class="container">
            <div class="optech-infobox-wrap extra-padding">
                <div class="row">
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="600">
                        <a href="tel:123">
                            <div class="optech-infobox-item light-color">
                                <div class="optech-infobox-icon">
                                    <i class="ri-phone-fill"></i>
                                </div>
                                <div class="optech-infobox-data">
                                    <p>Call anytime</p>
                                    <h5>518-564-3200</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="800">
                        <a href="mailto:name@email.com">
                            <div class="optech-infobox-item light-color">
                                <div class="optech-infobox-icon">
                                    <i class="ri-mail-fill"></i>
                                </div>
                                <div class="optech-infobox-data">
                                    <p>Email address</p>
                                    <h5>tachup@example.com</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="1000">
                        <div class="optech-infobox-item light-color">
                            <div class="optech-infobox-icon">
                                <i class="ri-time-fill"></i>
                            </div>
                            <div class="optech-infobox-data">
                                <p>Office Hours</p>
                                <h5>8:00 AM – 10:00 PM</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="optech-footer-top optech-section-padding-bottom">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <div class="optech-footer-menu dark-color">
                            <div class="optech-footer-title dark-color">
                                <h5>Quick Links</h5>
                            </div>
                            <ul>
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="team.html">Our Team</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                                <li><a href="blog.html">Blogs</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-5">
                        <div class="optech-footer-menu dark-color ml30">
                            <div class="optech-footer-title dark-color">
                                <h5>Services</h5>
                            </div>
                            <ul>
                                <li><a href="">UI/UX Design</a></li>
                                <li><a href="">App Development</a></li>
                                <li><a href="">Digital Marketing</a></li>
                                <li><a href="">Web Development</a></li>
                                <li><a href="">Cyber Security</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <div class="optech-footer-menu dark-color">
                            <div class="optech-footer-title dark-color">
                                <h5>Information</h5>
                            </div>
                            <ul>
                                <li><a href="">Working Process</a></li>
                                <li><a href="">Privacy Policy</a></li>
                                <li><a href="">Terms & Conditions</a></li>
                                <li><a href="faq.html">Faqs</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="optech-subscription-column">
                            <div class="optech-footer-title dark-color">
                                <h5>Subscribe Our Newsletter</h5>
                                <p>Get ready to work together for the better solution for your business</p>
                            </div>
                            <div class="optech-subscription">
                                <form action="#">
                                    <input type="email" placeholder="Enter your email">
                                    <button id="optech-subscription-btn" type="button" data-text="Subscribe">
                                        <span class="btn-wraper">Subscribe</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="optech-footer-bottom">
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="optech-copywright dark-color">
                            <p> Copyright © 2024 MirrorTheme. All rights reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="optech-social-icon-box right-align style-two">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/">
                                        <i class="ri-linkedin-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/">
                                        <i class="ri-instagram-fill"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


@endsection

