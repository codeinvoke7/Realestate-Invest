

    <!-- ==== header start ==== -->
    <?php require "partials/header.php" ?>
    <!-- ==== #header end ==== -->

    <!-- ==== banner section start ==== -->
    <section class="banner__alt bg__img" data-background="views/./assets/images/banner/banner-two-bg.png">
        <div class="container">
            <div class="banner__alt__area">
                <h1 class="neutral-top neutral-bottom">Browse Properties</h1>
            </div>
        </div>
    </section>
    <!-- ==== banner section end ==== -->

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

    <!-- ==== properties grid section start ==== -->
    <section class="properties__filter section__space__bottom">
        <div class="container wow fadeInUp">
            <div class="properties__filter__wrapper">
                <h6>Showing <span>505</span> properties</h6>
                <div class="grid__wrapper">
                    <select class="grid__select">
                        <option data-display="Sort By">Sort By</option>
                        <option value="grid">Date</option>
                        <option value="list">Price</option>
                    </select>
                    <a href="javascript:void(0)" class="grid__btn grid__view grid__btn__active">
                        <i class="fa-solid fa-grip"></i>
                    </a>
                    <a href="javascript:void(0)" class="grid__btn grid__list">
                        <i class="fa-solid fa-bars"></i>
                    </a>
                </div>
            </div>
            <div class="row property__grid__area__wrapper">
                
            <?php
                                    $sql = $conn->query("SELECT * FROM projects WHERE 1");
                                    if(mysqli_num_rows($sql) < 1){
                                    ?>
                                    <p>No property found</p>
                                    <?php 
                                    }else{
                                        while ($row = mysqli_fetch_assoc($sql)) {
                                           ?>
                        <div class="col-xl-4 col-md-6 property__grid__area__wrapper__inner">
                    <div class="property__list__wrapper property__grid">
                        <div class="row d-flex align-items-center">
                            <div class="property__grid__area__wrapper__inner__two">
                                <div class="property__item__image column__space--secondary">
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
                        </div>
                        </div>
                        </div>
                        </div>
                        <?php 
                                        }
                                    }
                                    ?>
                        
            </div>
            <div class="cta__btn">
                <a href="property-details.html" class="button button--effect">Load More</a>
            </div>
        </div>
    </section>
    <!-- ==== properties grid section end ==== -->

    <!-- ==== footer section start ==== -->
    <?php require "partials/footer.php" ?>
    <!-- ==== #footer section end ==== -->

   