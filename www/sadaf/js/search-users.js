function go_to_profile(username) {
    window.open('Profile.php?username=' + username, "_self");
}

function request_to_follow(username, userId, status) {
    document.getElementById("selected-user").value = userId;
    document.getElementById("request-status").value = status;
}

$(document).on('click', ".req-btn", function (event) {
    event.stopPropagation();
});

$(document).on("click", ".row-link", function () {
    let username = $(this).data('username');
    go_to_profile(username);
});

$(document).on("click", ".modal-btn", function (event) {
    let username = $(this).data('username');
    let status = $(this).data('status');
    let user_id = $(this).data('id');

    if (status === 0) {
        $(".modal-body #modal-message").text("آیا می‌خواهید درخواست دنبال کردن «" + username + "» را لغو کنید؟");
    } else {
        $(".modal-body #modal-message").text("آیا می‌خواهید «" + username + "» را دنبال نکنید؟");
    }

    document.getElementById("selected-user").value = user_id;
    document.getElementById("request-status").value = status;
    event.stopPropagation();
});