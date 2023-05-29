

    <!-- ==== header start ==== -->
    <?php require "partials/header.php" ?>
    <!-- ==== #header end ==== -->

    <!-- ==== details section start ==== -->
    <?php 
                            if (isset($_GET['prop'])) {
                                $id = $_GET['prop'];
                            }
                            if(isset($_SESSION['user_id'])){
                                $user_id = $_SESSION['user_id'];
                            }
                            $sql = $conn->query("SELECT * FROM projects WHERE id = $id");
                            $row = mysqli_fetch_assoc($sql);
                            $gallery = $row['gallery'];
                            $location = $row['location'];

                            $fetchsql = $conn->query("SELECT * FROM user WHERE id = $user_id");
                            $user = mysqli_fetch_assoc($fetchsql);
                            // echo $user['email'];

                            $query = $conn->query("SELECT * FROM `transaction` WHERE user_id = $user_id AND project_id = $id");
                           
                            
                            ?>
    <div class="property__details__banner bg__img clear__top"
        data-background="views/./assets/images/banner/property-details-banner.png">
    </div>
    <section class="p__details faq section__space__bottom">
        <div class="container">
            <div class="p__details__area">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="p__details__content">
                            <a href="#gallery" class="button button--effect button--secondary"><i
                                    class="fa-solid fa-images"></i>Browse Gallery</a>
                            <div class="intro">
                                <h3><?= $row['title'] ?></h3>
                                <p><i class="fa-solid fa-location-dot"></i> <?= $row['address'] ?>
                                </p>
                            </div>
                            <div class="group__one">
                                <?php if(isset($_SESSION['user_id'])){
                                $user_id = $_SESSION['user_id'];
                            } ?>
                                <h4>Project Description</h4>
                                <p><?= $row['description'] ?></p>
                            </div>
                            <div class="group__two">
                                <h5>Reasons to invest in the project A19, Vilnius:</h5>
                                <ul>
                                    <li><img src="views/assets/images/check.png" alt="Check" /> Lofts in an attractive area -
                                        in the center of Vilnius;</li>
                                    <li><img src="views/assets/images/check.png" alt="Check" /> ixed, attractive annual rental
                                        income;</li>
                                    <li><img src="views/assets/images/check.png" alt="Check" /> The fixed interest is indexed
                                        to inflation;</li>
                                    <li><img src="views/assets/images/check.png" alt="Check" /> The fixed interest is indexed
                                        to inflation;</li>
                                    <li><img src="views/assets/images/check.png" alt="Check" /> Variable capital gains;</li>
                                    <li><img src="views/assets/images/check.png" alt="Check" /> The premises were appraised by
                                        an independent valuer at 347 000 EUR</li>
                                    <li><img src="views/assets/images/check.png" alt="Check" /> The project owner is an
                                        experienced real estate administrator.</li>
                                </ul>
                            </div>
                            <div class="terms">
                                <h5>Financial terms of the investment:</h5>
                                <div class="terms__wrapper">
                                    <div class="terms__single">
                                        <img src="views/assets/images/icons/loan.png" alt="Maximum Loan" />
                                        <p>Maximum loan term</p>
                                        <h5 class="neutral-bottom">36 Months</h5>
                                    </div>
                                    <div class="terms__single">
                                        <img src="views/assets/images/icons/charge.png" alt="Charge" />
                                        <p>Security</p>
                                        <h5 class="neutral-bottom">1st charge
                                            Mortgage</h5>
                                    </div>
                                    <div class="terms__single">
                                        <img src="views/assets/images/icons/project.png" alt="Annual" />
                                        <p>Annual Return</p>
                                        <h5 class="neutral-bottom">7%</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="group__two">
                                <h5>When investing:</h5>
                                <ul>
                                    <li><img src="views/assets/images/check.png" alt="Check" /> Up to 4999 € - the annual
                                        return is 7%.</li>
                                    <li><img src="views/assets/images/check.png" alt="Check" /> 5000 € – 14999 € - the annual
                                        return is 7.1%.</li>
                                    <li><img src="views/assets/images/check.png" alt="Check" /> 15000 € – 29999 € - the annual
                                        return is 7.2%.</li>
                                    <li><img src="views/assets/images/check.png" alt="Check" /> 30000 € – 49999 € - the annual
                                        return is 7.35%.</li>
                                    <li><img src="views/assets/images/check.png" alt="Check" /> 50000 € and more - the annual
                                        return is 7.5%.</li>
                                </ul>
                            </div>
                            <div class="terms">
                                <h5>The capital growth distribution:</h5>
                                <div class="terms__wrapper">
                                    <div class="terms__single">
                                        <img src="views/assets/images/icons/investor.png" alt="Maximum Loan" />
                                        <p>Investors</p>
                                        <h5 class="neutral-bottom">40% - 60%</h5>
                                    </div>
                                    <div class="terms__single">
                                        <img src="views/assets/images/icons/project.png" alt="Charge" />
                                        <p>Project</p>
                                        <h5 class="neutral-bottom">40%</h5>
                                    </div>
                                    <div class="terms__single">
                                        <img src="views/assets/images/icons/revest.png" alt="Annual" />
                                        <p>Revest</p>
                                        <h5 class="neutral-bottom">Up to 20%</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="owner">
                                <img src="views/assets/images/owner.png" alt="Owner" />
                                <div>
                                    <h5>The project owner (borrower)</h5>
                                    <p>MB „Rego Properties“ - is a company serving as a special vehicle for revest
                                        investments. The CEO of the company - Andrius Rimdeika is a former investment
                                        banker, who has worked in investment firms such as ”Morgan Stanley” and “Prime
                                        investment”.</p>
                                </div>
                            </div>
                            <div class="faq__group">
                                <h5 class="atr">Frequently asked questions</h5>
                                <div class="accordion" id="accordionExampleFund">
                                    <div class="accordion-item content__space">
                                        <h5 class="accordion-header" id="headingFundOne">
                                            <span class="icon_box">
                                                <img src="views/assets/images/icons/message.png" alt="Fund" />
                                            </span>
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseFundOne" aria-expanded="true"
                                                aria-controls="collapseFundOne">
                                                What is Revest?
                                            </button>
                                        </h5>
                                        <div id="collapseFundOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingFundOne" data-bs-parent="#accordionExampleFund">
                                            <div class="accordion-body">
                                                <p>combined with a handful of model sentence structures, to generate
                                                    Lorem Ipsum
                                                    which looks reasonable. The generated Lorem Ipsum is therefore
                                                    always free
                                                    from
                                                    repetition, injected humour, or</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item content__space">
                                        <h5 class="accordion-header" id="headingFundTwo">
                                            <span class="icon_box">
                                                <img src="views/assets/images/icons/message.png" alt="Fund" />
                                            </span>
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFundTwo"
                                                aria-expanded="false" aria-controls="collapseFundTwo">
                                                What are the benefits of investing via Revest?
                                            </button>
                                        </h5>
                                        <div id="collapseFundTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingFundTwo" data-bs-parent="#accordionExampleFund">
                                            <div class="accordion-body">
                                                <p>combined with a handful of model sentence structures, to generate
                                                    Lorem Ipsum
                                                    which looks reasonable. The generated Lorem Ipsum is therefore
                                                    always free
                                                    from
                                                    repetition, injected humour, or</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item content__space">
                                        <h5 class="accordion-header" id="headingFundThree">
                                            <span class="icon_box">
                                                <img src="views/assets/images/icons/message.png" alt="Fund" />
                                            </span>
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFundThree"
                                                aria-expanded="false" aria-controls="collapseFundThree">
                                                What makes Revest different?
                                            </button>
                                        </h5>
                                        <div id="collapseFundThree" class="accordion-collapse collapse"
                                            aria-labelledby="headingFundThree" data-bs-parent="#accordionExampleFund">
                                            <div class="accordion-body">
                                                <p>combined with a handful of model sentence structures, to generate
                                                    Lorem Ipsum
                                                    which looks reasonable. The generated Lorem Ipsum is therefore
                                                    always free
                                                    from
                                                    repetition, injected humour, or</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="group__one">
                                <h4>Key investment risks:</h4>
                                <p>Risk of falling prices: The price of the property might fall due to the increase in
                                    supply or decrease in demand in the area or other economic factors.Liquidity risk:
                                    The borrower might be unable to find a buyer in order to sell the property.Tenant
                                    risk: There is a risk that the asset can lose a tenant and it can take time to find
                                    replacements, which can have impact on the property's cash-flow.</p>
                                <div class="map__wrapper">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20342.411046372905!2d-74.16638039276373!3d40.719832743885284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1649562691355!5m2!1sen!2sbd"
                                        width="746" height="312" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="p__details__sidebar">
                            <div class="intro">
                           
                                
                                <h5 >Min Invest: $<span id="minInvest"><?= $row['min-invest'] ?></span> </h5>
                                <h5>Max Invest: $<span id="maxInvest"><?= $row['max-invest'] ?></span> </h5>
                                <div class="progress__type progress__type--two">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="25"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="project__info">
                                        <p class="project__has"><span class="project__has__investors">159
                                                Investors</span> | <span class="project__has__investors__amount"><i
                                                    class="fa-solid fa-dollar-sign"></i> 1,94,196</span></p>
                                        <p class="project__goal">
                                            <i class="fa-solid fa-dollar-sign"></i> 3,00,000 Goal
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="group brin">
                                <div class="acus__content">
                                    <form action=""  id="paymentForm">
                                        <div class="input input--secondary">
                                            <?php if ($row['duration'] == 'monthly') {
                                              ?>
                                              <label for="anNum">Monthly return rate(%):</label>
                                              <?php 
                                            }else{
                                                ?>
                                                <label for="anNum">Annual return rate(%):</label>
                                                <?php
                                            }
                                            ?>
                                            <input type="text" name="an__num" id="anNum"
                                                required="required" readonly value="<?= $row['profit']?>" />
                                        </div>
                                        <div>
                                        <input type="hidden" name="project_id" id="plan" value="<?= $row['id'] ?>">
                                        <input type="hidden" name="user_id" id="id" value="<?= $user['id'] ?>">
                                        <input type="hidden" name="user_email" id="email-address" value="<?= $user['email'] ?>">
                                        <input type="hidden" name="fname" id="first-name" value="<?= $user['firstname'] ?>">
                                        <input type="hidden" name="lname" id="last-name" value="<?= $user['lastname'] ?>"> 
                                        </div>
                                        <div class="input input--secondary">
                                            <label for="anNumIn">Invest</label>
                                            <input type="number" name="invest-amt" id="amount" placeholder="Enter Amount"
                                                required="required" <?php if (mysqli_num_rows($query) > 0) {echo 'readonly';}else{ echo '' ;}?> />
                                                <p id="amtLimit" style="color:red"></p>
                                        </div>
                                        <div class="input input--secondary">
                                            <label for="anNumInTwo">Earn</label>
                                            <input type="number" name="an__num_in_two" id="earn"
                                                placeholder="Input amount to see potential earning" readonly  />
                                        </div>
                                        <div class="capital">
                                            <p>Capital Growth Split:</p>
                                            <h5>40% <a href="blog.html"><i class="fa-solid fa-circle-info"></i></a>
                                            </h5>
                                        </div>
                                        <div class="item__security">
                                            <div class="icon__box">
                                                <img src="views/assets/images/home.png" alt="Security" />
                                            </div>
                                            <div class="item__security__content">
                                                <p class="secondary">Security</p>
                                                <h6>1st-Rank Mortgage</h6>
                                            </div>
                                        </div>
                                        <?php 
                                        
                                        if (mysqli_num_rows($query) > 0) {
                                           ?>
                                           <div   class="suby" style="padding: 16px; background: blue;">
                                            <p style="text-align: center; color: white;" name="invest" class="button--effect">Oops! You Already Invested</p>
                                        </div>
                                        <?php
                                        }else{
                                            ?>
                                        <div class="suby">
                                            <h5></h5>
                                            <button type="submit" name="invest" class="button button--effect"  onclick="payWithPaystack()">Invest Now</button>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </form>
                                </div>
                                <p class="text-center neutral-bottom">
                                    <a href="contact-us.html">Request a free callback</a>
                                </p>
                            </div>
                            <div class="group brini">
                                <h5 class="neutral-top">Investment Overview</h5>
                                <hr />
                                <p>Purpose of the loan To increase the company's working capital, magna a laoreet
                                    convallis, massa sapien tempor arcu, nec euismod elit justo in lacus. Maecenas
                                    mattis massa lectus, vel tincidunt augue porta non.</p>
                                <p>Duis quis orci vehicula, fermentum tortor vitae, imperdiet sem. Quisque iaculis eu
                                    odio in lobortis. Sed vel ex non erat pellentesque lobortis vel vitae diam. Donec
                                    gravida eleifend pellentesque. Curabitur dictum blandit accumsan.</p>
                                <a href="blog.html">Read More</a>
                            </div>
                            <div class="group birinit">
                                <h6>Share via Social </h6>
                                <div class="social text-start">
                                    <a href="javascript:void(0)">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="group alt__brin">
                                <h5>Key Updates <i class="fa-solid fa-bell"></i></h5>
                                <hr />
                                <div class="singl__wrapper">
                                    <div class="singl">
                                        <img src="views/assets/images/check.png" alt="Check" />
                                        <div>
                                            <p>30-Aug-2022</p>
                                            <a href="terms-conditions.html">Term Sheet Signed</a>
                                        </div>
                                    </div>
                                    <div class="singl">
                                        <img src="views/assets/images/check.png" alt="Check" />
                                        <div>
                                            <p>30-Aug-2022</p>
                                            <a href="privacy-policy.html">Listing Live</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="group alt__brin__last">
                                <h5>Reports</h5>
                                <hr />
                                <h6>Investment Note</h6>
                                <p>Property Share's Detailed Investment Note</p>
                                <a href="javascript:void(0)" class="button">DOWNLOAD INVESTMENT NOTE <i
                                        class="fa-solid fa-download"></i></a>
                                <h6>Legal Title Report</h6>
                                <p>Detailed Report on the Title diligence of the
                                    property by Amarchand Mangaldas</p>
                                <a href="javascript:void(0)" class="button">DOWNLOAD TITLE REPORT <i
                                        class="fa-solid fa-download"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #details section end ==== -->

    <!-- ==== property gallery two section start ==== -->
    <section class="p__gallery wow fadeInUp" id="gallery">
        <div class="container">
            <hr class="divider" />
            <div class="p__gallery__area section__space">
                <div class="title__with__cta">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-8">
                            <h2>Property Gallery</h2>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-start text-lg-end">
                                <a href="contact-us.html" class="button button--secondary button--effect">Request
                                    info</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row p__gallery__single">
                    <?php  foreach (json_decode($gallery) as $key => $galleryImages) {
                        ?>
                    <div class="col-md-6 col-lg-4 gallery__single__two">
                        <a href="views/assets/images/gallery/one.png">
                                <img src='uploads/projects/<?=$galleryImages?>' alt='Property Image' />
                                
                           
                        </a>
                    </div>
                <?php
                }
                            ?>
                   
                </div>
            </div>
        </div>
    </section>
    <!-- ==== property gallery two section end ==== -->

    <!-- ==== all properties in grid section start ==== -->
    <section class="properties__grid section__space">
        <div class="container">
            <div class="properties__grid__area wow fadeInUp">
                <div class="title__with__cta">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-8">
                            <h2>Browse Similar Properties</h2>
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
                                    $sql = $conn->query("SELECT * FROM projects WHERE `location` = '$location' LIMIT 3");

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
                                    
                                    
                                    
                                    <h4><?= $row['location'] ?></h4>
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
                                        <div class="invest__cta">
                                            <a href="property-details?prop=<?= $row['id'] ?>" class="button button--effect">
                                                Invest Now
                                            </a>
                                        </div>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #all properties in grid section end ==== -->

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

    