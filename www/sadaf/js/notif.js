function accept_req(id) {
    document.getElementById("selected-req-id").value = id;
    document.getElementById("selected-req-action").value = 1;
}

function reject_req(id) {
    document.getElementById("selected-req-id").value = id;
    document.getElementById("selected-req-action").value = 0;
}