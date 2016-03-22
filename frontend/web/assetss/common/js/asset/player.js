// ####### VDO PLAYER ###### //
function youtube_parser(url){
	var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
	var match = url.match(regExp);
	if (match&&match[7].length==11){
		return match[7];
	}else{
		alert("Invalid video source.")
	}
	return -1;
}
function playVIDEO(el,_path){
	var _prefix = $("script[rel=player]").attr('src').match(/^(\.\.\/){1,}/g),
		_rip = (_prefix==null)?"":_prefix[0],
		_url = $('#site_url').val()+"player",
		_fl = _rip,
		_v = $("base").attr('href');

	var _yt = 0, _src = "";
	if(_path.indexOf(".mp4")==-1){
		_yt = 1;
		_src = youtube_parser(_path);
	}else{
		_src = _path.replace(".mp4","");
	}
		//_fl = _path.replace("../","");
		
	var request = $.ajax({
			type: "GET",
			url:_url,
			data:{ 'yt':_yt, 'src':_src, 'fl':_rip, 'v':_v },
			beforeSend:function(){ el.removeClass("show"); },
			success :function(data){
				el.html(data).addClass('show');
			}
	});
	request.done(function(data){});
	request.fail(function(){});
	request.always(function(){});
}