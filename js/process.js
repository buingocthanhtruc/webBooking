$(document).ready(function(){
    $("#submitFormBook").on("click", function(e){
        e.preventDefault();
        for( let i = 0 ;i< document.querySelectorAll("[id_product]").length ;i++){
            console.log( "value :"+document.querySelectorAll("[id_product]")[i].value);
        }
    })
});
