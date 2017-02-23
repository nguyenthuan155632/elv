
// function getHatenaBookmarkCount(entryUrl, selcter) {
//   entryUrl = 'http://api.b.st-hatena.com/entry.count?url=' + encodeURIComponent(entryUrl);
//   $.ajax({
//     url:entryUrl,
//     dataType:'jsonp',
//   }).then(
//     function(result){ $(selcter).text(result || 0); },
//     function(){ $(selcter).text('0'); }
//   );
// }
// //Facebookのシェア数
// function getFacebookCount(entryUrl, selcter) {
//   entryUrl = 'https://graph.facebook.com/' + encodeURIComponent(entryUrl)
//   $.ajax({
//     url:entryUrl,
//     dataType:'jsonp'
//   }).then(
//     function(result){ $(selcter).text(result.shares || 0); },
//     function(){ $(selcter).text('0'); }
//   );
// }
// function getSocialCountTwitter(url, selcter) {
//   $.ajax({
//   url:'https://jsoon.digitiminimi.com/twitter/count.json',
//   dataType:'jsonp',
//   data:{
//     url:url
//   }}).then(
//   function(res){$( selcter ).text( res.count || 0 );},
//   function(){$( selcter ).text('0');}
//   );
// }
// $(function(){
//   //getSocialCountTwitter(window.location.href, '.twitter-number');
//   //getHatenaBookmarkCount(window.location.href, '.bookmark-number');
//   //getFacebookCount(window.location.href, '.facebook-number');

//   //linkSNS = $('.latest-content ul li:first-child .title a').attr('href');
//   //getFacebookCount(linkSNS, '.facebook-no');
//   //getSocialCountTwitter(linkSNS, '.twitter-no');
//   //getHatenaBookmarkCount(linkSNS, '.bookmark-no');
// });
$(document).ready(function() {
$('.latest-content ul li .latest-list').mouseover(function() {
  $('.latest-hover', this).css('display', 'block');
  
  //sns = $('.latest-img a', this).attr('href');
  //getFacebookCount(sns, '.facebook-no-hover');
  //getSocialCountTwitter(sns, '.twitter-no-hover');
  //getHatenaBookmarkCount(sns, '.bookmark-no-hover');
});

$('.latest-content ul li .latest-list').mouseout(function() {
  $('.latest-hover').css('display', 'none');
});
});



