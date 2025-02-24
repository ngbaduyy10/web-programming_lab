$(document).ready(function () {
    $("#register-form").submit(function (e) {
        e.preventDefault();

        const username = $("#username").val();
        const password = $("#password").val();
        const email = $("#email").val();

        $.ajax({
            url: "/bright-courses/ajax/auth.ajax.php",
            method: "POST",
            dataType: "json",
            data: {
                action: "register",
                username,
                password,
                email,
            },
            success: function (response) {
                if (response.success) {
                    window.location.href = "/bright-courses/home.php";
                } else {
                    alert(response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error("Error registering user:", error);
            }
        })
    })

    $("#login-form").submit(function (e) {
        e.preventDefault();

        const email = $("#email").val();
        const password = $("#password").val();

        $.ajax({
            url: "/bright-courses/ajax/auth.ajax.php",
            method: "POST",
            dataType: "json",
            data: {
                action: "login",
                email,
                password,
            },
            success: function (response) {
                if (response.success) {
                    window.location.href = "/bright-courses/home.php";
                } else {
                    alert(response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error("Error logging in user:", error);
            }
        })
    })
})