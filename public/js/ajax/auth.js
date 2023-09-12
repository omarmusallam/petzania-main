$("#loginform").on("submit", function (e) {
    e.preventDefault();

    $(".invalid-email").text("");
    $(".invalid-password").text("");
    let csrfToken = $('meta[name="csrf-token"]').attr("content");

    $.ajax({
        method: "POST",
        url: $(this).prop("action"),
        data: new FormData(this),
        dataType: "JSON",
        contentType: false,
        cache: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": csrfToken, // Include the CSRF token in the headers
        },
        success: function (response) {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });

            Toast.fire({
                icon: "success",
                title: response.success,
            });
         

            setTimeout(() => {
                window.location.replace(response.redirect);
            }, 1500);

            // window.location.replace(baseUrl);
        },
        error: function (error) {
            if (error?.responseJSON?.errors?.email) {
                $(".form-control").addClass("is-invalid");
                $(".invalid-email").addClass("error");
                $(".invalid-email strong").text(
                    error.responseJSON.errors.email[0]
                );
            }
            if (error?.responseJSON?.errors?.password) {
                $(".invalid-password").addClass("error");
                $(".invalid-password strong").text(
                    error.responseJSON.errors.email[0]
                );
            }
        },
    });
});
