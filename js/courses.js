$(document).ready(function () {
    let filters = {
        sort: null,
        keyword: null,
    }

    function loadCourses() {
        $.ajax({
            url: "/bright-courses/ajax.php",
            method: "GET",
            dataType: "json",
            data: {
                action: "get_courses",
                ...filters,
            },
            success: function (response) {
                $('#courses-list').empty();
                response.data.forEach((course) => {
                    let courseHtml = `
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="course-item h-100 d-flex flex-column">
                                <img src="${course.image}" alt="" class="thumb" />
                                <div class="info">
                                    <div class="head">
                                        <h3 class="title">${course.title}</h3>
                                        <div class="rating">
                                            <img src="./assets/icon/Star 6.svg" alt="" class="star" />
                                            <span class="value">${course.rating}</span>
                                        </div>
                                    </div>
                                    <p class="desc">${course.description}</p>
                                    <div class="foot">
                                        <span class="price">$${course.price}</span>
                                        <button class="button">Book Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                    $('#courses-list').append(courseHtml);
                });
            },
            error: function (xhr, status, error) {
                console.error("Error loading courses:", error);
            }
        });
    }
    loadCourses();

    $(".courses-sort").click(function (e) {
        e.preventDefault();

        filters.sort = $(this).data("sort");
        loadCourses();

        $(".courses-sort").removeClass("active");
        $(this).addClass("active");
    });

    $("#search-box").on("keyup", function () {
        filters.keyword = $(this).val();
        loadCourses();
    });

    function loadSubjects() {
        $.ajax({
            url: "/bright-courses/ajax.php",
            method: "GET",
            dataType: "json",
            data: {
                action: "get_subjects",
            },
            success: function (response) {
                response.data.forEach((subject) => {
                    let subjectHtml = `
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                ${subject.name}
                            </label>
                        </div>
                    `;

                    $('#subjects-list').append(subjectHtml);
                });
            },
            error: function (xhr, status, error) {
                console.error("Error loading subjects:", error);
            }
        });
    }
    loadSubjects();
});