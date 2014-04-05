<html>
<head>
  <script type='text/javascript' src='https://www.google.com/jsapi'></script>
  <script type='text/javascript'>
   google.load('visualization', '1', {'packages': ['geomap']});
   google.setOnLoadCallback(drawMap);

    function drawMap() {
      var data = google.visualization.arrayToDataTable([
        ['Country', 'srValue'],
        ['Germany', 200],
        ['United States', 300],
        ['Brazil', 400],
        ['Canada', 500],
        ['France', 600],
        ['RU', 700]
      ]);

      var options = {
          showLegend: true,
          showZoomOut: true,
          region: "world"
//          zoomOutLabel: "click to zoom in"
      };
      options['dataMode'] = 'regions';

      var container = document.getElementById('map_canvas');
      var geomap = new google.visualization.GeoMap(container);
      geomap.draw(data, options);
      google.visualization.events.addListener(
        geomap, 'regionClick', function(e) {
        options['region'] = e['region'];
        geomap.draw(data, options);
      }); 
      
      google.visualization.events.addListener(
        geomap, 'zoomOut', function(e) {
        options['region'] = "world";
        geomap.draw(data, options);
      }); 
    };
  </script>
</head>

<body>
  <div id='map_canvas' style="width: 900px; height: 500px;"></div>
</body>