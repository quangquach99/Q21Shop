$(document).ready(function() {
    $(".delete-user").click(function(e) {
        let result = confirm("You sure want to drop this user???");
        if(!result) {
            e.preventDefault();
        }
    });
    // $(".delete-category").click(function(e) {
    //     let result = confirm("You sure want to drop this category???");
    //     if(!result) {
    //         e.preventDefault();
    //     }
    // });
});