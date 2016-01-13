/* 
 * Copyright (c) 2011 Eclipse Services a division of Quadrivium, Inc.
 * All rights reserved.
 */

var adSrchBaseURL="http://host6.eclipseservices.com:8100/pittnews/online/publish/";

function displayAds() {
	document.getElementById('ap_ads').innerHTML = this.responseText;
}
function displayErr() {
	alert("An error has occured searching for ads.");
}
function xmlDspAds() {
	if (this.readyState==4){
		if (this.status==200 || window.location.href.indexOf("http")==-1){
			document.getElementById("ap_ads").innerHTML=this.responseText;
		}
		else{
			alert("An error has occured searching for ads.");
		}
	}
}
function ladProgres() {}

function doAdSearch(url) {
	var hdiv = null;

	var srchReq = new XMLHttpRequest();
	if("withCredentials" in srchReq)
	{
		srchReq.open( "GET", adSrchBaseURL + url, false );
		srchReq.onreadystatechange=xmlDspAds;
		srchReq.send();
	} else
	if (XDomainRequest) {
		srchReq = new XDomainRequest();
		srchReq.timeout = 10000;
		srchReq.open("GET", adSrchBaseURL + url);
		srchReq.onload=displayAds;
		srchReq.onerror=displayErr;
		srchReq.ontimeout=displayErr;
		srchReq.onprogress=ladProgres;
		srchReq.send();
	}
}
function loadAdSearch() {
	doAdSearch("adsearch.do");
}
function getSearchParams() {
	var params = "";
	var searchElems = document.getElementById("AdSearchForm").elements;
	for (var i = 0; i < searchElems.length; ++i) {
		var srchInput = searchElems[i];
		if (srchInput.type != "submit" && srchInput.type != "button" && srchInput.value != "") {
			if (params.length > 0)
					params += "&";
			params += srchInput.name + "=" + encodeURI(srchInput.value);
		}
	}
	return params;
}
function postAdSearch(url, params) {
	var hdiv = null;

	var srchReq = new XMLHttpRequest();
	if("withCredentials" in srchReq)
	{
		srchReq.open( "POST", adSrchBaseURL + url, false );
		srchReq.onreadystatechange=xmlDspAds;
		srchReq.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		srchReq.send(params);
	} else
	if (XDomainRequest) {
		srchReq = new XDomainRequest();
		srchReq.open("POST", adSrchBaseURL + url + "?" + params);
		srchReq.onload=displayAds;
		srchReq.onerror=displayErr;
		srchReq.ontimeout=displayErr;
		srchReq.onprogress=ladProgres;
		srchReq.send();
	}
}
function setLocalHRef(element, hash) {
	element.href=document.location.href.split('#')[0] + "#" + hash
}
window.onload=loadAdSearch;