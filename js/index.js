var $ = jQuery.noConflict();
function getElementByXpath(path) {
    return document.evaluate(path, document, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null).singleNodeValue;
}  
function showfeed(amount) {
    $.ajax({
        type:'POST', 
        url: 'api/showfeed.php', 
        data: {amount: amount},
        success: function(response) {
            getElementByXpath("/html/body/div[1]/r-c[2]/c1-1[1]").innerHTML += response;
        }
    });
}
function showAdsR() {
    $.ajax({
        type:'POST', 
        url: 'api/showads.php', 
        data: {side: 'right'},
        success: function(response) {
            getElementByXpath("/html/body/div[1]/r-c[2]/c1-1[3]").innerHTML += response;
        }
    });
}
function showAdsL() {
    $.ajax({
        type:'POST', 
        url: 'api/showads.php', 
        data: {side: 'left'},
        success: function(response) {
            getElementByXpath("/html/body/div[1]/r-c[2]/c1-1[2]").innerHTML += response;
        }
    });
}
function loadonload() {
    showfeed(20);
    showAdsL();
    showAdsR();
}
// function showInfoWhenLoad() {
//     $.ajax({
//         type:'POST', 
//         url: 'api/showinitialmessage.php', 
//         success: function(response) {
//             var returnedData = JSON.(response);
//             alert(returnedData);
//         }
//     }); 
// }