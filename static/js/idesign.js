(function(){
	if ( window.IDesign ) var IDesign = window.IDesign;
	
	var IDesign = window.IDesign = function() {return new IDesign.init();};
	
	IDesign.apply = function(o, c, defaults){
	    if(defaults){IDesign.apply(o, defaults);}
	    if(o && c && typeof c == 'object'){for(var p in c){o[p] = c[p];}}
	    return o;
	};
	
	IDesign.CheckData = function(strSearch, data) {
		if (data != null) {
			for(var i=0; i<data.length; ++i) {
				if (data[i].toLowerCase() == strSearch.toLowerCase()) return true;
			}
		}
		return false;
	};
	
	IDesign.apply(IDesign, {
		
		boxid: 0,
		version: '1.0.0',
		
		init: function() {return this.version;},
		
		getPageSize: function(){
			var xScroll, yScroll;
			
			if (window.innerHeight && window.scrollMaxY) {	
				xScroll = window.innerWidth + window.scrollMaxX;
				yScroll = window.innerHeight + window.scrollMaxY;
			} else if (document.body.scrollHeight > document.body.offsetHeight){
				xScroll = document.body.scrollWidth;
				yScroll = document.body.scrollHeight;
			} else {
				xScroll = document.body.offsetWidth;
				yScroll = document.body.offsetHeight;
			}
			
			var windowWidth, windowHeight;
			
			if (self.innerHeight) {
				if(document.documentElement.clientWidth){
					windowWidth = document.documentElement.clientWidth; 
				} else {
					windowWidth = self.innerWidth;
				}
				windowHeight = self.innerHeight;
			} else if (document.documentElement && document.documentElement.clientHeight) {
				windowWidth = document.documentElement.clientWidth;
				windowHeight = document.documentElement.clientHeight;
			} else if (document.body) {
				windowWidth = document.body.clientWidth;
				windowHeight = document.body.clientHeight;
			}	
			
			if(yScroll < windowHeight){
				pageHeight = windowHeight;
			} else { 
				pageHeight = yScroll;
			}
			
			if(xScroll < windowWidth){	
				pageWidth = xScroll;		
			} else {
				pageWidth = windowWidth;
			}

			arrayPageSize = new Array(pageWidth,pageHeight,windowWidth,windowHeight) 
			return arrayPageSize;
		},
		
		getPageScroll: function(){
			var xScroll, yScroll;

			if (self.pageYOffset) {
				yScroll = self.pageYOffset;
				xScroll = self.pageXOffset;
			} else if (document.documentElement && document.documentElement.scrollTop){
				yScroll = document.documentElement.scrollTop;
				xScroll = document.documentElement.scrollLeft;
			} else if (document.body) {
				yScroll = document.body.scrollTop;
				xScroll = document.body.scrollLeft;	
			}

			arrayPageScroll = new Array(xScroll,yScroll) 
			return arrayPageScroll;
		},
		
		emailCheck: function (str) {
			var at="@"
			var dot="."
			var lat=str.indexOf(at)
			var lstr=str.length
			var ldot=str.indexOf(dot)
			if (str.indexOf(at)==-1) return false;
			if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr) return false;
			if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr) return false;
			if (str.indexOf(at,(lat+1))!=-1) return false;
			if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot) return false;
			if (str.indexOf(dot,(lat+2))==-1) return false;
			if (str.indexOf(" ")!=-1) return false;
			return true					
		},
		
		extractArgument: function(params, name) {
			var ix = -1;
			var iy = -1;
			if (params.length != 0) {
				args = params.toLowerCase();
				arg = name.toLowerCase() + "=";
				ix = args.indexOf(arg);
				if (ix != -1) {
					ix += arg.length;
					iy = args.substring(ix, args.length).indexOf("&");
					if (iy == -1)
						iy = args.length;
					else
						iy += ix;
				}
			}
			return ix != -1 ? (ix < iy ? params.substring(ix, iy) : "") : null;
		},
		
		loadingFull: function() {
			var pageSize = IDesign.getPageSize();
			$('<div id="id-loading-overlay" style="position:absolute;left:0px;top:0px;width:'+pageSize[0]+'px;height:'+pageSize[1]+'px;"></div').appendTo($('body'));
			$('<div id="id-loading-content" style="position:absolute;top:50%;left:50%;margin-top:-32px;margin-left:-32px;width:32px;height:32px;background:url(images/loading_blue.gif) no-repeat center center;"></div').appendTo($('body'));
		},
		
		loadingFullRemove: function() {
			$('#id-loading-overlay').remove();
			$('#id-loading-content').remove();
		},
		
		rand32: function (){return Math.floor(Math.random()*4294967295);},
		
		noop: function() {}
			
	});
	
	IDesign.ui = IDesign.ui || {};
	IDesign.util = IDesign.util || {};
})();

IDesign.util.JSON = new (function(){
    var useHasOwn = {}.hasOwnProperty ? true : false;
    
    var pad = function(n) {
        return n < 10 ? "0" + n : n;
    };
    
    var m = {
        "\b": '\\b',
        "\t": '\\t',
        "\n": '\\n',
        "\f": '\\f',
        "\r": '\\r',
        '"' : '\\"',
        "\\": '\\\\'
    };

    var encodeString = function(s){
        if (/["\\\x00-\x1f]/.test(s)) {
            return '"' + s.replace(/([\x00-\x1f\\"])/g, function(a, b) {
                var c = m[b];
                if(c){
                    return c;
                }
                c = b.charCodeAt();
                return "\\u00" +
                    Math.floor(c / 16).toString(16) +
                    (c % 16).toString(16);
            }) + '"';
        }
        return '"' + s + '"';
    };
    
    var encodeArray = function(o){
        var a = ["["], b, i, l = o.length, v;
            for (i = 0; i < l; i += 1) {
                v = o[i];
                switch (typeof v) {
                    case "undefined":
                    case "function":
                    case "unknown":
                        break;
                    default:
                        if (b) {
                            a.push(',');
                        }
                        a.push(v === null ? "null" : IDesign.util.JSON.encode(v));
                        b = true;
                }
            }
            a.push("]");
            return a.join("");
    };
    
    var encodeDate = function(o){
        return '"' + o.getFullYear() + "-" +
                pad(o.getMonth() + 1) + "-" +
                pad(o.getDate()) + "T" +
                pad(o.getHours()) + ":" +
                pad(o.getMinutes()) + ":" +
                pad(o.getSeconds()) + '"';
    };
    
    this.encode = function(o){
        if(typeof o == "undefined" || o === null){
            return "null";
        }else if(o instanceof Array){
            return encodeArray(o);
        }else if(o instanceof Date){
            return encodeDate(o);
        }else if(typeof o == "string"){
            return encodeString(o);
        }else if(typeof o == "number"){
            return isFinite(o) ? String(o) : "null";
        }else if(typeof o == "boolean"){
            return String(o);
        }else {
            var a = ["{"], b, i, v;
            for (i in o) {
                if(!useHasOwn || o.hasOwnProperty(i)) {
                    v = o[i];
                    switch (typeof v) {
                    case "undefined":
                    case "function":
                    case "unknown":
                        break;
                    default:
                        if(b){
                            a.push(',');
                        }
                        a.push(this.encode(i), ":",
                                v === null ? "null" : this.encode(v));
                        b = true;
                    }
                }
            }
            a.push("}");
            return a.join("");
        }
    };
    
    this.decode = function(json){
        return eval("(" + json + ')');
    };
})();

IDesign.encode = IDesign.util.JSON.encode;
IDesign.decode = IDesign.util.JSON.decode;

Function.prototype.bind = function() {
  var __method = this, args = $A(arguments), object = args.shift();
  return function() {
    return __method.apply(object, args.concat($A(arguments)));
  }
};

Function.prototype.bindAsEventListener = function(object) {
  var __method = this, args = $A(arguments), object = args.shift();
  return function(event) {
    return __method.apply(object, [( event || window.event)].concat(args).concat($A(arguments)));
  }
}

var $A = Array.from = function(iterable) {
  if (!iterable) return [];
  if (iterable.toArray) {
    return iterable.toArray();
  } else {
    var results = [];
    for (var i = 0, length = iterable.length; i < length; i++)
      results.push(iterable[i]);
    return results;
  }
};