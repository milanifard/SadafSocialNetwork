function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#pimage')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function unfollow(id){
    document.getElementById("friend-id").value = id;
    event.stopPropagation();
}

function block(id){
    document.getElementById("friend-id2").value = id;
    event.stopPropagation();
}

function go_to_profile(username, root) {
    window.open('Profile.php?username=' + username, "_self");
}