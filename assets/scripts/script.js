$(document).ready(function(){
    $("#dropdown_button").on("click", function(){
        $(".dropdown_menu").toggleClass("show");
    })

    $("#change_info").on("click", function(){
        $("input").attr("readonly", false);
    })
})