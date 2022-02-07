$(".change-button").click(function() {
    var $item = $(this).closest("tr")   // Finds the closest row <tr> 
                       .find(".find")     // Gets a descendent with class="find"
                       .text();         // Retrieves the text within <td>

    $(".result").append($item);       // Outputs the answer

    $.ajax({
        url:"profile.php",
        method:"post",
        data:{item : JSON.stringify(item)},
        success:function(res){
            console.log(res);
        }
    })
});
