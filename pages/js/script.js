
function showRSS(str)
{
if (str.length==0)
  {
  document.getElementById("rssOutput").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("rssOutput").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","livesearch.php?q="+str,true);
xmlhttp.send();
}

function editbox()
{

    var txtseller = document.getElementById("sellerno");
    var txtproduct = document.getElementById("product");
    var txtprice = document.getElementById("price");
    var btnsave = document.getElementById('save');
    txtseller.readOnly =false;
    txtproduct.readOnly =false;
    txtprice.readOnly =false;
    btnsave.disabled = false;

}
var app = angular.module('myApp', []);
app.controller('Read', ['$scope', '$http', function ($scope, $http){
  $http.get("unreadmsg.php").then(function(respond){
      $scope.myData = respond.data;
      $scope.count = respond.data.length;
  });

  $scope.clearEmail = function(){
      $scope.count = 0;
      $.ajax({
          type: "POST",
          url: "editmail.php"
      });
  }
}]);
app.controller('cardAngCtrl', ['$scope', '$http', function ($scope, $http) {
  $http.get('cardinfojson.php')
  .success(function(data) {
      $scope.contents = data;
      console.log($scope.contents);
  });
}]);
app.controller('personCtrl', ['$scope', '$http', function ($scope, $http) {
  $http.get('personjson.php')
  .success(function(data) {
      $scope.contents = data;
      console.log($scope.contents);
  });
}]);
app.controller('xmltransactions', function($scope, $http){
  $http.get("transaction.php").then(function(respond){
      console.log(respond);
      var arr = [];
      var parser = new DOMParser ();
      var xmlDoc = parser.parseFromString(respond.data, 'text/xml');
      console.log(xmlDoc);
      var transaction = xmlDoc.getElementsByTagName('transaction');

          for (var i = 0 ; i < transaction.length; i++)
          {
              var transvalue = transaction[i].getElementsByTagName('transno')[0].innerHTML;
              var uidvalue = transaction[i].getElementsByTagName('uid')[0].innerHTML;
              var datvalue = transaction[i].getElementsByTagName('date')[0].innerHTML;
              var sellervalue = transaction[i].getElementsByTagName('sellerno')[0].innerHTML;
              var productvalue = transaction[i].getElementsByTagName('product')[0].innerHTML;
              var pricevalue = transaction[i].getElementsByTagName('price')[0].innerHTML;
              var numbervalue = transaction[i].getElementsByTagName('number')[0].innerHTML;
              arr.push({
                  transno: transvalue, uid: uidvalue, date: datvalue,
                  sellerno: sellervalue, product: productvalue,
                  price: pricevalue, number: numbervalue});


          }
          $scope.myData5 = arr;
          console.log($scope.myData5);
      });
});
