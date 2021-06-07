// Bind to the submit event of our form
$("option").click(function() {
    const $form = $(this);
    const data = $form.serialize();
    

    const req = $.ajax({
        url: "/Projet_CrossLaPro/WEB/API/request.php",
        type: "post",
        data: data
    });

    req.done(function (response, textStatus, jqXHR){
        console.log("req sent successfully");
    })

    req.fail(function (jqXHR, textStatus, errorThrown){
        console.log("req failed");
    })  
});