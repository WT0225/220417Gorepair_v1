 <script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AiwkIgR9Zk7lptVtL8VpD9LfWh-QjKI8WnpGLef9MSmEHNvAL7ytUU7dEd-fz8ok&setLang=en' async defer></script>
 
 <script>
     let map;             //MapObject用
     let searchManager;   //SearchObject用
     
     function GetMap() {
        //Map生成
        map = new Microsoft.Maps.Map('#myMap', {
            zoom: 15,
            mapTypeId: Microsoft.Maps.MapTypeId.canvasLight
        });
        //検索モジュール指定
        Microsoft.Maps.loadModule('Microsoft.Maps.Search', function () {
            //searchManagerインスタンス化（Geocode,ReverseGeocodeが使用可能にな
            searchManager = new Microsoft.Maps.Search.SearchManager(map);
            
        });
    }

    document.getElementById("convert").onclick = function(){
        //4.Geocode:住所から検索
        geocodeQuery(document.getElementById("address").value);
    };


     function geocodeQuery(query) {
    if(searchManager) {
        //住所から緯度経度を検索
        searchManager.geocode({
            where: query,       //検索文字列
            callback: function (r) { //検索結果を"( r )" の変数で取得
                //最初の検索取得結果をMAPに表示
                if (r && r.results && r.results.length > 0) {
                    lon= r.results[0].location.longitude;
                    lat = r.results[0].location.latitude;
                    document.getElementById('lon').value = lon;
                    document.getElementById('lat').value = lat;
                }
            },
            errorCallback: function (e) {
                alert("Error");
            }
        });
}
}
 </script>