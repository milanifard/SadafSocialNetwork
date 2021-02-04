function go_to_profile(username, root) {
    console.log("go to profile page: " + root + " + " + username);

    /* TODO: H.Habashi
     * go to profile page using username
     */
}

function request_to_follow(username, userId, status) {
    console.log("send notification for user: " + username + " (" + userId + ") : " + status);
    document.getElementById("selected-user").value = userId;
    document.getElementById("request-status").value = status;
    event.stopPropagation();

    /* TODO: M.Vahdati
     * send notification logic
     */
}

$(document).on("click", ".modal-btn", function () {
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
});