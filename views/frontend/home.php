

    <!-- ==== header start ==== -->
    <?php require "partials/header.php" ?>
    <!-- ==== #header end ==== -->

    <!-- ==== hero section start ==== -->
    <section class="hero pos__rel over__hi bg__img" data-background="views/./assets/images/hero/light-bg.png">
        <div class="container">
            <div class="hero__area">
                <div class="row">
                    <div class="col-lg-6 col-xxl-5">
                        <div class="hero__content">
                            <h5 class="neutral-top">A smarter, better way to invest</h5>
                            <h1>Real Estate Investment For <span>Everyone</span> </h1>
                            <p class="primary neutral-bottom">
                                Buy shares of rental properties, earn monthly income, and watch your money grow
                            </p>
                            <div class="hero__cta__group">
                                <a href="properties.html" class="button button--effect">Start Exploring</a>
                                <a href="business-loan.html" class="button button--secondary button--effect">Get
                                    Funding</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xxl-6 offset-xxl-1">
                        <div class="hero__illustration d-none d-lg-block">
                            <img src="views/assets/images/hero/hero-illustration.png" alt="Hero Illustration" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #hero section end ==== -->

    <!-- ==== property filter start ==== -->
    <div class="property__filter">
        <div class="container">
            <div class="property__filter__area">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-12 col-xl-6">
                        <div class="property__search__wrapper">
                            <form action="#" method="post">
                                <div class="input">
                                    <input type="search" name="property__search" id="propertySearch"
                                        placeholder="Search for properties" />
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                                <button type="submit" class="button button--effect">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3">
                        <div class="property__select__wrapper">
                            <select class="location__select">
                                <option data-display="Location">Select Location</option>
                                <option value="angeles">Los Angeles</option>
                                <option value="francis">San Francisco, CA</option>
                                <option value="weldon">The Weldon</option>
                                <option value="diego">San Diego</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3">
                        <div class="property__select__wrapper">
                            <select class="property__select">
                                <option data-display="Property">Property Type</option>
                                <option value="commercial">Commercial</option>
                                <option value="residential">Residential</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ==== #property filter end ==== -->
    
    <!-- ==== all properties in grid section start ==== -->
    <section class="properties__grid section__space">
        <div class="container">
            <div class="properties__grid__area wow fadeInUp">
                <div class="title__with__cta">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-8">
                            <h2>All Properties</h2>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-start text-lg-end">
                                <a href="properties.html" class="button button--secondary button--effect">Browse All
                                    Properties</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="property__grid__wrapper">
                    <div class="row">
                    <?php
                                    $sql = $conn->query("SELECT * FROM projects WHERE 1");
                                    if(mysqli_num_rows($sql) < 1){
                                    ?>
                                    <p>No property found</p>
                                    <?php 
                                    }else{
                                        while ($row = mysqli_fetch_assoc($sql)) {
                                           ?>
                        <div class="col-lg-4 col-xl-4">
                            <div class="property__grid__single">
                                <div class="img__effect">
                                    <a href="property-details.html">
                                        <img src="./uploads/projects/<?= $row['thumbnail'] ?>" alt="Property" />
                                    </a>
                                </div>
                                <div class="property__grid__single__inner">
                                    
                                    
                                    
                                    <h4><?= $row['title'] ?></h4>
                                    <p class="sub__info"><i class="fa-solid fa-location-dot"></i><?= $row['address'] ?> </p>
                                    <div class="progress__type">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="project__has"><span class="project__has__investors">17
                                                Investors</span> |
                                            <span class="project__has__investors__amount"><i
                                                    class="fa-solid fa-dollar-sign"></i> 7,94,196</span> <span
                                                class="project__has__investors__percent">(14.73%)</span>
                                        </p>
                                        <div class="item__info">
                                        <div class="item__info__single">
                                        <p>Min Invest</p>
                                            <h6><?= $row['min-invest']?></h6>
                                        </div>
                                        <div class="item__info__single">
                                            <p>Max Invest</p>
                                            <h6><?= $row['max-invest']?></h6>
                                        </div>
                                    </div>
                                    </div>
                                    
                                    <div class="invest__cta__wrapper">
                                        <div class="countdown__wrapper">
                                         
                                        <div class="item__info__single">
                                            <p><?= $row['duration'] == 'monthly' ? 'Monthly return' : 'Annual Return' ?></p>
                                            <h6><?= $row['profit'] ?>%</h6>
                                        </div>

                                        </div>
                                        <?php 
                                        if (isset($_SESSION['user_name'])) {
                                           ?>
                                        <div class="invest__cta">
                                            <a href="property-details?prop=<?= $row['id'] ?>" class="button button--effect">
                                                Invest Now
                                            </a>
                                        </div>
                                        <?php
                                        }else{
                                            ?>
                                            <div class="invest__cta">
                                            <a href="login" class="button button--effect">
                                                Invest Now
                                            </a>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                
                            </div>
                        </div><?php 
                                        }
                                    }
                                    ?>
                        
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #all properties in grid section end ==== -->

    <!-- ==== profit overview section start ==== -->
    <section class="profit section__space">
        <div class="container">
            <div class="profit__area wow fadeInUp">
                <div class="section__header">
                    <h5 class="neutral-top">Built to help smart investors invest smarter</h5>
                    <h2>We handle the heavy lifting so you
                        can sit back, relax, and profit.</h2>
                    <p class="neutral-bottom">We make institutional quality real estate accessible to investors, in a
                        simple
                        and transparent way.</p>
                </div>
                <div class="profit__item__wrapper">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="profit__single__item alt shadow__effect">
                                <div class="img__box">
                                    <img src="views/assets/images/overview/passive-income.png" alt="Passive Income" />
                                </div>
                                <div class="item__content">
                                    <h4>Passive Income</h4>
                                    <p>Earn rental income and receive deposits quarterly</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profit__single__item shadow__effect">
                                <div class="img__box">
                                    <img src="views/assets/images/overview/secure.png" alt="secure" />
                                </div>
                                <div class="item__content">
                                    <h4>Secure & Cost-efficient</h4>
                                    <p>Digital security is legally compliant and tangible for qualified investors</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profit__item__wrapper">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="profit__single__item alt shadow__effect">
                                <div class="img__box">
                                    <img src="views/assets/images/overview/transparency.png" alt="Transparency" />
                                </div>
                                <div class="item__content">
                                    <h4>Transparency</h4>
                                    <p>Easily consult the full documentation for each property.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profit__single__item shadow__effect">
                                <div class="img__box">
                                    <img src="views/assets/images/overview/support.png" alt="Support" />
                                </div>
                                <div class="item__content">
                                    <h4>Support</h4>
                                    <p>Earn rental income and receive deposits quarterly</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #profit overview section end ==== -->

    <!-- ==== start step section start ==== -->
    <section class="start section__space__top bg__img" data-background="views/./assets/images/step/start-bg.png">
        <div class="container">
            <div class="start__area wow fadeInUp">
                <div class="section__header">
                    <h5 class="neutral-top">We're changing the way you invest.</h5>
                    <h2>It's Easy to Get Started.</h2>
                    <p class="neutral-bottom">Signing up with Revest is simple and only takes a few minutes. We can
                        automatically connect with more than 3,500 banks, so no complicated paperwork is required to
                        fund your account.</p>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xl-4">
                        <div class="start__single__item column__space--secondary">
                            <div class="img__box">
                                <img src="views/assets/images/step/browse.png" alt="Browse Properties" />
                                <div class="step__count">
                                    <h4>01</h4>
                                </div>
                            </div>
                            <h4>Browse Properties</h4>
                            <p class="neutral-bottom">Select a property that fits your goal from our huge variety of
                                hand-picked properties.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="start__single__item column__space--secondary">
                            <div class="img__box arrow__container">
                                <img src="views/assets/images/step/invest.png" alt="View Details & Invest" />
                                <div class="step__count">
                                    <h4>02</h4>
                                </div>
                            </div>
                            <h4>View Details & Invest</h4>
                            <p class="neutral-bottom">View detailed metrics for that property like Rental Yield, etc.
                                and invest like institutions.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="start__single__item">
                            <div class="img__box">
                                <img src="views/assets/images/step/earn.png" alt="Earn and Track" />
                                <div class="step__count">
                                    <h4>03</h4>
                                </div>
                            </div>
                            <h4>Earn and Track</h4>
                            <p class="neutral-bottom">You have full visibility into the performance of your investment.
                                Track your total current.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #start step section end ==== -->

    <!-- ==== numbers section start ==== -->
    <section class="numbers section__space bg__img" data-background="views/./assets/images/globe.png">
        <div class="container">
            <div class="numbers__area wow fadeInUp">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6">
                        <div class="content column__space">
                            <h5 class="neutral-top">With Revest anyone can invest!</h5>
                            <h2>Numbers Said
                                More Than Words</h2>
                            <p>our low minimums give you the flexibility to invest the right amount, at the right time,
                                to meet your goals.</p>
                            <a href="properties.html" class="button button--effect">Start Exploring</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row d-flex align-items-start align-items-lg-center">
                            <div class="col-sm-6">
                                <div class="numbers__single shadow__effect">
                                    <img src="views/assets/images/platforms.png" alt="platform" />
                                    <h3><span class="counter">3000</span>+</h3>
                                    <p class="neutral-bottom">Investors Using Platform</p>
                                </div>
                                <div class="numbers__single shadow__effect__secondary">
                                    <img src="views/assets/images/returns.png" alt="Returns" />
                                    <h3><span class="counter">18</span>%</h3>
                                    <p class="neutral-bottom">Returns upto</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="numbers__single alt shadow__effect__secondary">
                                    <img src="views/assets/images/experience.png" alt="Experience" />
                                    <h3 class="counter">45</h3>
                                    <p class="neutral-bottom">Years Experience</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #numbers section end ==== -->

    <!-- ==== testimonial section start ==== -->
    <section class="testimonial section__space pos__rel over__hi bg__img"
        data-background="views/./assets/images/testimonial/dot-map.png">
        <div class="container">
            <div class="testimonial__area">
                <div class="section__header">
                    <h5 class="neutral-top">Investors Trust Us</h5>
                    <h2>Trusted by Over 40,000 Worldwide
                        Customer since 2022</h2>
                    <p class="neutral-bottom">We divide each property into shares so anyone can get started. Kindly
                        check
                        out our Investors say about revest.</p>
                </div>
                <div class="testimonial__item__wrapper">
                    <div class="testimonial__support">
                        <div class="testimonial__item bg__img" data-background="views/./assets/images/testimonial/quote.png">
                            <div class="testimonial__author__ratings">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="tertiary">Very trustworthy and clearly platform to invest in real state. Safe
                                investment with monthly payouts. Really recommended!</p>
                            <div class="testimonial__author">
                                <div class="testimonial__author__info">
                                    <div class="avatar__wrapper">
                                        <img src="views/assets/images/testimonial/avatar.png" alt="Allan Murphy" />
                                    </div>
                                    <div>
                                        <h5>Allan Murphy</h5>
                                        <p class="neutral-bottom">United States</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial__support">
                        <div class="testimonial__item bg__img" data-background="views/./assets/images/testimonial/quote.png">
                            <div class="testimonial__author__ratings">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="tertiary">Very trustworthy and clearly platform to invest in real state. Safe
                                investment with monthly payouts. Really recommended!</p>
                            <div class="testimonial__author">
                                <div class="testimonial__author__info">
                                    <div class="avatar__wrapper">
                                        <img src="views/assets/images/testimonial/avatar.png" alt="Allan Murphy" />
                                    </div>
                                    <div>
                                        <h5>Allan Murphy</h5>
                                        <p class="neutral-bottom">United States</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial__support">
                        <div class="testimonial__item bg__img" data-background="views/./assets/images/testimonial/quote.png">
                            <div class="testimonial__author__ratings">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="tertiary">Very trustworthy and clearly platform to invest in real state. Safe
                                investment with monthly payouts. Really recommended!</p>
                            <div class="testimonial__author">
                                <div class="testimonial__author__info">
                                    <div class="avatar__wrapper">
                                        <img src="views/assets/images/testimonial/avatar.png" alt="Allan Murphy" />
                                    </div>
                                    <div>
                                        <h5>Allan Murphy</h5>
                                        <p class="neutral-bottom">United States</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial__support">
                        <div class="testimonial__item bg__img" data-background="views/./assets/images/testimonial/quote.png">
                            <div class="testimonial__author__ratings">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="tertiary">Very trustworthy and clearly platform to invest in real state. Safe
                                investment with monthly payouts. Really recommended!</p>
                            <div class="testimonial__author">
                                <div class="testimonial__author__info">
                                    <div class="avatar__wrapper">
                                        <img src="views/assets/images/testimonial/avatar.png" alt="Allan Murphy" />
                                    </div>
                                    <div>
                                        <h5>Allan Murphy</h5>
                                        <p class="neutral-bottom">United States</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial__support">
                        <div class="testimonial__item bg__img" data-background="views/./assets/images/testimonial/quote.png">
                            <div class="testimonial__author__ratings">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="tertiary">Very trustworthy and clearly platform to invest in real state. Safe
                                investment with monthly payouts. Really recommended!</p>
                            <div class="testimonial__author">
                                <div class="testimonial__author__info">
                                    <div class="avatar__wrapper">
                                        <img src="views/assets/images/testimonial/avatar.png" alt="Allan Murphy" />
                                    </div>
                                    <div>
                                        <h5>Allan Murphy</h5>
                                        <p class="neutral-bottom">United States</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #testimonial section end ==== -->

    <!-- ==== market section start ==== -->
    <section class="market section__space over__hi">
        <div class="container">
            <div class="market__area">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 col-xl-5">
                        <div class="market__thumb thumb__rtl column__space">
                            <img src="views/assets/images/market-illustration.png" alt="Explore the Market" />
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6 offset-xl-1">
                        <div class="content">
                            <h5 class="neutral-top">Real exposure to the real estate market</h5>
                            <h2>You Invest. Revest
                                Does the Rest</h2>
                            <p>Transparent Real Estate Investing Through Revest.Join us and
                                experience a smarter,better way to invest in real estate</p>
                            <a href="properties.html" class="button button--effect">Start Exploring</a>
                            <img src="views/assets/images/arrow.png" alt="Go to" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #market section end ==== -->

    <!-- ==== footer section start ==== -->
    <?php require "partials/footer.php" ?>
    <!-- ==== #footer section end ==== -->

  