 $(document).ready(function(){
	var _acc = $(".accordion"),
		_list = _acc.find(".acc-list");
	_list.find("h3").click(function(e){
		if($(this).parent().hasClass("show")){
			$(this).parent().removeClass("show");
		}else{
			_list.removeClass("show");
			$(this).parent().addClass("show");
			e.preventDefault();
		}
	});
});