
var domExt = ['com', 'net', 'org', 'biz', 'info', 'name', 'us', 'in', 'cn', 'asia', 'eu', 'cc', 'web.id', 'or.id', 'co.id', 'sch.id', 'ac.id', 'go.id', 'net.id', 'mil.id', 'ac', 'ag', 'com.au', 'net.au', 'org.au', 'bz', 'cd', 'com.cn', 'net.cn', 'org.cn', 'de', 'hk', 'com.hk', 'net.hk', 'org.hk', 'co.in', 'net.in', 'org.in', 'gen.in', 'firm.in', 'ind.in', 'io', 'it', 'jobs', 'jp', 'kr', 'co.kr', 'la', 'li', 'me', 'mn', 'mobi', 'my', 'com.my', 'net.my', 'org.my', 'name.my', 'co.nz', 'net.nz', 'org.nz', 'ph', 'com.ph', 'net.ph', 'org.ph', 'pk', 'com.pk', 'net.pk', 'org.pk', 'sc', 'sg', 'com.sg', 'net.sg', 'org.sg', 'edu.sg', 'sh', 'co.th', 'tm', 'travel', 'tv', 'tw', 'com.tw', 'org.tw', 'game.tw', 'ebiz.tw', 'club.tw', 'co.uk', 'org.uk', 'me.uk', 'vc', 'vn', 'ws'];
var defExt = ['com'];
var themeUrl = "http://idwebhost.com/themes/beta/";
var emailInfo = "info@idwebhost.com";
var OnKeyRequestBuffer = 
{
	bufferText: false,
	bufferTime: 1300,
	modified : function(strId){
		setTimeout('OnKeyRequestBuffer.compareBuffer("'+strId+'","'+xajax.$(strId).value+'");', this.bufferTime);
	},

	compareBuffer : function(strId, strText){
		if (strText == xajax.$(strId).value && strText != this.bufferText){
			this.bufferText = strText;
			OnKeyRequestBuffer.makeRequest(strId);
		}
	},

	makeRequest : function(strId){
		if( xajax.$(strId).value.length >= 4 ){
			submitWhois();
		}
	}
}
