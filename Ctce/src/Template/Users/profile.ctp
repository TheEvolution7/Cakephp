<div class="page-title-section section section-padding-top-0">
    <div class="page-breadcrumb position-static">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'home']) ?>">Home</a></li>
                <li class="current">Profile</li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Title Section End -->

<!-- Profile Section Start  -->
<div class="profile-section section section-padding-bottom">
    <div class="container">
        <div class="row align-items-lg-center">
            <div class="col-xl-5 col-md-6">
                <div class="profile-image">
                    <img src="<?= $this->Url->build('/uploads/users/' . $user->id . DS .$user->image) ?>">
                </div>
            </div>
            <div class="col-xl-6 col-md-6 offset-xl-1">
                <div class="profile-info">
                    <h2 class="profile-name"><?= $user->full_name ?></h2>
                    <div class="author-career">Advanced Educator</div>
                    <p class="author-bio"><?= $user->description ?></p>

                    <h5 class="profile-contact-title">Contact</h5>
                    <span class="contact-info-text">
                        <span class="phone">Phone number: <strong><?= $user->phone_number ?></strong> </span>
                    <br>
                    <span class="email">Email: <strong><?= $user->email ?></strong></span>
                    </span>
                    <ul class="author-social-networks">
                        <li class="item">
                            <a href="JavaScript:Void(0);" target="_blank" class="social-link"> <i class="fab fa-twitter social-link-icon"></i> </a>
                        </li>
                        <li class="item">
                            <a href="JavaScript:Void(0);" target="_blank" class="social-link"> <i class="fab fa-facebook-f social-link-icon"></i> </a>
                        </li>
                        <li class="item">
                            <a href="JavaScript:Void(0);" target="_blank" class="social-link"> <i class="fab fa-instagram social-link-icon"></i> </a>
                        </li>
                        <li class="item">
                            <a href="JavaScript:Void(0);" target="_blank" class="social-link"> <i class="fab fa-pinterest social-link-icon"></i> </a>
                        </li>
                        <li class="item">
                            <a href="JavaScript:Void(0);" target="_blank" class="social-link"> <i class="fab fa-youtube social-link-icon"></i> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Profile Section End  -->

<!-- Learn Press Profile Section Start -->
<div class="learn-press-profile-section section section-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="learn-press-profile-nav">
                    <h3>Courses</h3>
                </div>
                <div class="profile-content-courses">
                    <div class="lp-tab-menu">
                        <ul class="nav">
                            <li><a class="active" data-bs-toggle="tab" href="#curriculum">Curriculum</a></li>
                            <li><a data-bs-toggle="tab" href="#outline">Outline</a></li>
                        </ul>
                        <a href="#" class="btn btn-primary btn-hover-secondary">All Courses</a>
                    </div>
                    <div class="tab-content">
                        <div id="curriculum" class="tab-pane fade show active">
                            <div class="learn-press-subtab-content">
                                <ul class="lp-sub-menu nav justify-content-center">
                                    <li><a class="active show" data-bs-toggle="tab" href="#all">All</a></li>
                                    <li><a data-bs-toggle="tab" href="#publish">Publish</a></li>
                                    <li><a data-bs-toggle="tab" href="#pending">Pending</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div id="all" class="tab-pane fade show active">
                                        <!-- Courses Wrapper Start -->
                                        <div class="row row-cols-md-2 row-cols-1 max-mb-n30">

                                            <!-- Course Start -->
                                            <div class="col max-mb-30" data-aos="fade-up">
                                                <div class="course-3">
                                                    <div class="thumbnail">
                                                        <a href="#" class="image"><img src="assets/images/new/courses-5.png"
                                                                alt="Course Image"></a>
                                                    </div>
                                                    <div class="info">
                                                        <span class="price">$29<span>.00</span></span>
                                                        <h3 class="title"><a href="#">Massachusetts 2 Hour Lead Safe Practices</a></h3>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <span class="star-rating">
                                                                <span class="rating-active">ratings</span>
                                                            </span>
                                                            <span>263 Reviews</span>
                                                        </div>
                                                        <p class="meta">This class offers two hours of instruction in lead-safe renovation practices for
                                                            Massachusetts Construction Supervisor Licensees. It fulfills the one hour of
                                                            required training in this topic during the first renewal cycle and one hour of
                                                            elective content or two hours of elective content if not in the first renewal cycle.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Course End -->

                                            <!-- Course Start -->
                                            <div class="col max-mb-30" data-aos="fade-up">
                                                <div class="course-3">
                                                    <div class="thumbnail">
                                                        <a href="#" class="image"><img src="assets/images/new/courses-6.png"
                                                                alt="Course Image"></a>
                                                    </div>
                                                    <div class="info">
                                                        <span class="price">$29<span>.00</span></span>
                                                        <h3 class="title"><a href="#">Massachusetts 2 Hour Building Code Review</a></h3>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <span class="star-rating">
                                                                <span class="rating-active">ratings</span>
                                                            </span>
                                                            <span>263 Reviews</span>
                                                        </div>
                                                        <p class="meta">This course provides the Massachusetts contractor with 2 hours of credit toward
                                                            renewing their Construction Supervisor License. In the course, we focus on the state
                                                            amendments to the 2015 International Building Code, as adopted in the 9th edition of
                                                            the Massachusetts State Building Code, Base Volume. Once you're finished with this
                                                            course, you'll be 2 credit hours closer to renewing your license, all at your own
                                                            pace!</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Course End -->

                                            <!-- Course Start -->
                                            <div class="col max-mb-30" data-aos="fade-up">
                                                <div class="course-3">
                                                    <div class="thumbnail">
                                                        <a href="#" class="image"><img src="assets/images/new/courses-4.png"
                                                                alt="Course Image"></a>
                                                    </div>
                                                    <div class="info">
                                                        <span class="price">$79<span>.00</span></span>
                                                        <h3 class="title"><a href="#">Massachusetts 6 Hour Construction Supervisor License CE </a></h3>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <span class="star-rating">
                                                                <span class="rating-active">ratings</span>
                                                            </span>
                                                            <span>263 Reviews</span>
                                                        </div>
                                                        <p class="meta">This 6 hour course is approved by the Massachusetts Board of Building Regulations and
                                                            Standards, BBRS, and is designed for Construction Supervisor licensees to meet 6
                                                            hours of your renewal continuing education requirements.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Course End -->

                                            <!-- Course Start -->
                                            <div class="col max-mb-30" data-aos="fade-up">
                                                <div class="course-3">
                                                    <div class="thumbnail">
                                                        <a href="#" class="image"><img src="assets/images/new/courses-3.png"
                                                                alt="Course Image"></a>
                                                    </div>
                                                    <div class="info">
                                                        <span class="price">$79<span>.00</span></span>
                                                        <h3 class="title"><a href="#">Massachusetts 6 Hour Specialty CSL Renewal Course</a></h3>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <span class="star-rating">
                                                                <span class="rating-active">ratings</span>
                                                            </span>
                                                            <span>263 Reviews</span>
                                                        </div>
                                                        <p class="meta">This class offers six hours of instruction in the most recent building codes and
                                                            practices required for Massachusetts Construction Supervisor Specialty License
                                                            Renewals, with a special focus on Residential Building Codes. It fulfills two hours
                                                            of required code review, one hour of required content on the Massachusetts Energy
                                                            Code, and one hour of required content on best practices for construction
                                                            businesses. The course also provides two hours of OSHA Safety Training, which
                                                            comprises one hour of required content and one hour of elective content.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Course End -->

                                        </div>
                                        <!-- Courses Wrapper End -->
                                    </div>
                                    <div id="publish" class="tab-pane fade">
                                        <!-- Courses Wrapper Start -->
                                        <div class="row row-cols-md-2 row-cols-1 max-mb-n30">

                                            <!-- Course Start -->
                                            <div class="col max-mb-30" data-aos="fade-up">
                                                <div class="course-3">
                                                    <div class="thumbnail">
                                                        <a href="#" class="image"><img src="assets/images/new/courses-5.png"
                                                                alt="Course Image"></a>
                                                    </div>
                                                    <div class="info">
                                                        <span class="price">$29<span>.00</span></span>
                                                        <h3 class="title"><a href="#">Massachusetts 2 Hour Lead Safe Practices</a></h3>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <span class="star-rating">
                                                                <span class="rating-active">ratings</span>
                                                            </span>
                                                            <span>263 Reviews</span>
                                                        </div>
                                                        <p class="meta">This class offers two hours of instruction in lead-safe renovation practices for
                                                            Massachusetts Construction Supervisor Licensees. It fulfills the one hour of
                                                            required training in this topic during the first renewal cycle and one hour of
                                                            elective content or two hours of elective content if not in the first renewal cycle.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Course End -->

                                            <!-- Course Start -->
                                            <div class="col max-mb-30" data-aos="fade-up">
                                                <div class="course-3">
                                                    <div class="thumbnail">
                                                        <a href="#" class="image"><img src="assets/images/new/courses-6.png"
                                                                alt="Course Image"></a>
                                                    </div>
                                                    <div class="info">
                                                        <span class="price">$29<span>.00</span></span>
                                                        <h3 class="title"><a href="#">Massachusetts 2 Hour Building Code Review</a></h3>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <span class="star-rating">
                                                                <span class="rating-active">ratings</span>
                                                            </span>
                                                            <span>263 Reviews</span>
                                                        </div>
                                                        <p class="meta">This course provides the Massachusetts contractor with 2 hours of credit toward
                                                            renewing their Construction Supervisor License. In the course, we focus on the state
                                                            amendments to the 2015 International Building Code, as adopted in the 9th edition of
                                                            the Massachusetts State Building Code, Base Volume. Once you're finished with this
                                                            course, you'll be 2 credit hours closer to renewing your license, all at your own
                                                            pace!</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Course End -->

                                            <!-- Course Start -->
                                            <div class="col max-mb-30" data-aos="fade-up">
                                                <div class="course-3">
                                                    <div class="thumbnail">
                                                        <a href="#" class="image"><img src="assets/images/new/courses-4.png"
                                                                alt="Course Image"></a>
                                                    </div>
                                                    <div class="info">
                                                        <span class="price">$79<span>.00</span></span>
                                                        <h3 class="title"><a href="#">Massachusetts 6 Hour Construction Supervisor License CE </a></h3>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <span class="star-rating">
                                                                <span class="rating-active">ratings</span>
                                                            </span>
                                                            <span>263 Reviews</span>
                                                        </div>
                                                        <p class="meta">This 6 hour course is approved by the Massachusetts Board of Building Regulations and
                                                            Standards, BBRS, and is designed for Construction Supervisor licensees to meet 6
                                                            hours of your renewal continuing education requirements.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Course End -->

                                            <!-- Course Start -->
                                            <div class="col max-mb-30" data-aos="fade-up">
                                                <div class="course-3">
                                                    <div class="thumbnail">
                                                        <a href="#" class="image"><img src="assets/images/new/courses-3.png"
                                                                alt="Course Image"></a>
                                                    </div>
                                                    <div class="info">
                                                        <span class="price">$79<span>.00</span></span>
                                                        <h3 class="title"><a href="#">Massachusetts 6 Hour Specialty CSL Renewal Course</a></h3>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <span class="star-rating">
                                                                <span class="rating-active">ratings</span>
                                                            </span>
                                                            <span>263 Reviews</span>
                                                        </div>
                                                        <p class="meta">This class offers six hours of instruction in the most recent building codes and
                                                            practices required for Massachusetts Construction Supervisor Specialty License
                                                            Renewals, with a special focus on Residential Building Codes. It fulfills two hours
                                                            of required code review, one hour of required content on the Massachusetts Energy
                                                            Code, and one hour of required content on best practices for construction
                                                            businesses. The course also provides two hours of OSHA Safety Training, which
                                                            comprises one hour of required content and one hour of elective content.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Course End -->

                                        </div>
                                        <!-- Courses Wrapper End -->
                                    </div>
                                    <div id="pending" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="learn-press-message success">
                                                    <i class="fa"></i>No courses!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="outline" class="tab-pane fade">
                            <div class="learn-press-subtab-content">
                                <ul class="lp-sub-menu nav justify-content-center">
                                    <li><a class="active show" data-bs-toggle="tab" href="#allList">All</a></li>
                                    <li><a data-bs-toggle="tab" href="#finished">Finished</a></li>
                                    <li><a data-bs-toggle="tab" href="#passed">Passed</a></li>
                                    <li><a data-bs-toggle="tab" href="#failed">Failed</a></li>
                                    <li><a data-bs-toggle="tab" href="#notEnrolled">Not enrolled</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="allList" class="tab-pane fade show active">
                                        <div class="row">
                                            <div class="col-12 scroll">
                                                <table class="lp-list-table table">
                                                    <thead>
                                                        <tr>
                                                            <th class="column-course">Course</th>
                                                            <th class="column-date">Date</th>
                                                            <th class="column-passing-grade">Passing Grade</th>
                                                            <th class="column-status">Progress</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="column-course">
                                                                <a href="JavaScript:Void(0);">Kentucky 6 Hour HVAC CE Package 3</a>
                                                            </td>
                                                            <td class="column-date">Oct 15, 2021</td>
                                                            <td class="column-passing-grade">80%</td>
                                                            <td class="column-status">
                                                                <span class="result-percent">33.3%</span>
                                                                <span class="lp-label label-in-progress">In     Progress 
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="column-course">
                                                                <a href="">Alabama HVAC Continuing Education</a>
                                                            </td>
                                                            <td class="column-date">Sep 10, 2021</td>
                                                            <td class="column-passing-grade">80%</td>
                                                            <td class="column-status">
                                                                <span class="result-percent">100%</span>
                                                                <span class="lp-label label-passed">Passed</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="column-course">
                                                                <a href="JavaScript:Void(0);"> FLORIDA 7HR 1ST TIME CE FOR HVAC CONTRACTORS</a>
                                                            </td>
                                                            <td class="column-date">Sep 19, 2021</td>
                                                            <td class="column-passing-grade">80%</td>
                                                            <td class="column-status">
                                                                <span class="result-percent">25%</span>
                                                                <span class="lp-label label-failed">Failed</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr class="list-table-nav">
                                                            <td colspan="2" class="nav-text">Displaying 1 to 3 of 3 courses.</td>
                                                            <td colspan="2" class="nav-pages"></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="finished" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-12 scroll">
                                                <table class="lp-list-table table">
                                                    <thead>
                                                        <tr>
                                                            <th class="column-course">Course</th>
                                                            <th class="column-date">Date</th>
                                                            <th class="column-passing-grade">Passing Grade</th>
                                                            <th class="column-status">Progress</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="column-course">
                                                                <a href="">Introduction to Javascript for Beginners</a>
                                                            </td>
                                                            <td class="column-date">Dec 19, 2019</td>
                                                            <td class="column-passing-grade">80%</td>
                                                            <td class="column-status">
                                                                <span class="result-percent">100%</span>
                                                                <span class="lp-label label-passed">Passed</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="column-course">
                                                                <a href="JavaScript:Void(0);"> Academic Listening and Note-taking</a>
                                                            </td>
                                                            <td class="column-date">Dec 19, 2019</td>
                                                            <td class="column-passing-grade">80%</td>
                                                            <td class="column-status">
                                                                <span class="result-percent">25%</span>
                                                                <span class="lp-label label-failed">Failed</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr class="list-table-nav">
                                                            <td colspan="2" class="nav-text">Displaying 1 to 3 of 3 courses.</td>
                                                            <td colspan="2" class="nav-pages"></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="passed" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-12 scroll">
                                                <table class="lp-list-table table">
                                                    <thead>
                                                        <tr>
                                                            <th class="column-course">Course</th>
                                                            <th class="column-date">Date</th>
                                                            <th class="column-passing-grade">Passing Grade</th>
                                                            <th class="column-status">Progress</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="column-course">
                                                                <a href="">Introduction to Javascript for Beginners</a>
                                                            </td>
                                                            <td class="column-date">Dec 19, 2019</td>
                                                            <td class="column-passing-grade">80%</td>
                                                            <td class="column-status">
                                                                <span class="result-percent">100%</span>
                                                                <span class="lp-label label-passed">Passed</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr class="list-table-nav">
                                                            <td colspan="2" class="nav-text">Displaying 1 to 3 of 3 courses.</td>
                                                            <td colspan="2" class="nav-pages"></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="failed" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-12 scroll">
                                                <table class="lp-list-table table">
                                                    <thead>
                                                        <tr>
                                                            <th class="column-course">Course</th>
                                                            <th class="column-date">Date</th>
                                                            <th class="column-passing-grade">Passing Grade</th>
                                                            <th class="column-status">Progress</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="column-course">
                                                                <a href="JavaScript:Void(0);"> Academic Listening and Note-taking</a>
                                                            </td>
                                                            <td class="column-date">Dec 19, 2019</td>
                                                            <td class="column-passing-grade">80%</td>
                                                            <td class="column-status">
                                                                <span class="result-percent">25%</span>
                                                                <span class="lp-label label-failed">Failed</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr class="list-table-nav">
                                                            <td colspan="2" class="nav-text">Displaying 1 to 3 of 3 courses.</td>
                                                            <td colspan="2" class="nav-pages"></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="notEnrolled" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="learn-press-message success">
                                                    <i class="fa"></i>No courses!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>