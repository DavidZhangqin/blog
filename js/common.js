$(window).load(function(){
    $("pre").addClass("prettyprint linenums");
    prettyPrint();

    $('#category a:first').click(function(){
        $('#category ul').slideToggle();
    });
    $('#tag a:first').click(function(){
        $('#tag div').slideToggle();
    })
});
