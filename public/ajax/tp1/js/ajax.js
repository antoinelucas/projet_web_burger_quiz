'use strict';

/*console.log('toto');*/
ajaxRequest('GET', 'php/timestamp.php', displayTimestamp);
setInterval(ajaxRequest, 100,'GET', 'php/timestamp.php', displayTimestamp); //permet de faire la requete toutes les 1000ms

//-------------------------------------------------------------------------------------------------------------
//--------------------------AjaxRequest-------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------

function ajaxRequest(type, request, callback, data = null){
  var xhr;
  xhr = new XMLHttpRequest();
  if(type == 'GET' && data != null){
    request += '?' + data;    // 'php/timestamp.php?data1=toto&data2=23'
  }
  xhr.open(type,request, true);

  xhr.onload = function(){
    switch (xhr.status) {
      case 200:
      case 201:
        //console.log(xhr.responseText);
        callback(xhr.responseText);
        break;
      default:
        httpErrors(xhr.status);
        //console.log('Http error:' + xhr.status);
    }
  };
  xhr.send(null);
}

//-------------------------------------------------------------------------------------------------------------
//--------------------------callback-------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------

function displayTimestamp(ajaxResponse) {
  var text;
  text = '<strong>' + ajaxResponse + '</strong>';
  //document.getElementById('timestamp').innerHTML= text;
  $('#timestamp').html(text); // --> jQuery
}
