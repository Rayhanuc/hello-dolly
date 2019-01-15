; (function($){
    $(document).ready(function(){
        $(".phpup").each(function(){
            var image = $(this).find("img").attr("src");
            $(this).attr("href", image);
        })
    });
})(jQuery);