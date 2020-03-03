    <div id="custom-map" style="height: 700px"></div>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPgyQ1fqOQy3kgl2xgRgXDeow1C7cot_0&callback=initMap"></script>
    <script>

        var neighborhoods = JSON.parse('<?php echo json_encode($jobs); ?>');
        console.log(neighborhoods);

        var markers = [];
        var map;

        // var stylez = [
        //     {
        //         featureType: "all",
        //         stylers: [
        //             { hue: "#0675c1" },
        //             { saturation: -75 }
        //         ]
        //     },
        //     {
        //         featureType: "poi",
        //         elementType: "label",
        //         stylers: [
        //             { visibility: "off" }
        //         ]
        //     }
        // ];

        var stylez = [ {"featureType":"road","elementType":"labels","stylers":[{"visibility":"simplified"},{"lightness":20}]},{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"all","stylers":[{"saturation":-100},{"visibility":"on"},{"lightness":10}]},{"featureType":"road.local","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"road.local","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":50}]},{"featureType":"water","elementType":"all","stylers":[{"hue":"#0675c1"},{"saturation":30},{"lightness":49}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"hue":"#0675c1"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"hue":"#0675c1"}]}, {featureType:'road.highway',elementType:'all',stylers:[{hue:'#0675c1'},{saturation:-92},{lightness:60},{visibility:'on'}]}, {featureType:'landscape.natural',elementType:'all',stylers:[{hue:'#0675c1'},{saturation:-71},{lightness:-18},{visibility:'on'}]},  {featureType:'poi',elementType:'all',stylers:[{hue:'#0675c1'},{saturation:-70},{lightness:20},{visibility:'on'}]} ];


        function initMap() {

            setTimeout(drop, 2000)

            var styledMapType = new google.maps.StyledMapType( stylez, {name: 'Styled Map'});


            map = new google.maps.Map(document.getElementById('custom-map'), {
                zoom: 12,
                center: {lat: 23.7974941, lng: 90.4226661},
                mapTypeControlOptions: {
                    mapTypeIds: [google.maps.MapTypeId.ROADMAP, "Edited"]
                },
            });

            infowindow = new google.maps.InfoWindow();

            //Associate the styled map with the MapTypeId and set it to display.
            map.mapTypes.set("Edited", styledMapType);
            map.setMapTypeId('Edited');
        }

        function drop() {
            clearMarkers();
            for (var i = 0; i < neighborhoods.length; i++) {
                addMarkerWithTimeout(neighborhoods[i].job_id, neighborhoods[i].lat, neighborhoods[i].lng, i * 200);
            }
        }

        function addMarkerWithTimeout(job_id, lat, lng, timeout) {

            var initiateMarker = new google.maps.Marker({
                position: {lat: parseFloat(lat), lng: parseFloat(lng)},
                map: map,
                icon: '<?php echo base_url('assets/img/marker.gif') ?>',
                animation: google.maps.Animation.DROP
            });

            initiateMarker.addListener('click', function() {
                infowindow.open(map, initiateMarker);
                $.ajax({
                    url: "<?php echo site_url('landing/getGoogleMapContent'); ?>",
                    type: "post",
                    data : { 'job_id' : job_id },
                    success: function(content) {
                        infowindow.setContent(content);
                    }
                });
            });

            window.setTimeout(function() {
                markers.push(initiateMarker);
            }, timeout);
        }

        function clearMarkers() {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
            markers = [];
        }

        function smoothZoom (map, level, cnt, mode) {
            // alert('Count: ' + cnt + 'and Max: ' + level);

            // If mode is zoom in
            if(mode == true) {

                if (cnt >= level) {
                    return;
                }
                else {
                    var z = google.maps.event.addListener(map, 'zoom_changed', function(event){
                        google.maps.event.removeListener(z);
                        smoothZoom(map, level, cnt + 1, true);
                    });
                    setTimeout(function(){map.setZoom(cnt)}, 250);
                }
            } else {
                if (cnt <= level) {
                    return;
                }
                else {
                    var z = google.maps.event.addListener(map, 'zoom_changed', function(event) {
                        google.maps.event.removeListener(z);
                        smoothZoom(map, level, cnt - 1, false);
                    });
                    setTimeout(function(){map.setZoom(cnt)}, 250);
                }
            }
        }

        $( "body" ).delegate( ".map_zoom_in", "click", function() {

            var job_id = $(this).data('job_id');
            var lat = $(this).data('map_lat');
            var lng = $(this).data('map_lng');

            // smoothZoom(map, 12, map.getZoom(), false);
            smoothZoom(map, 20, map.getZoom(), true);

        });

    </script>
