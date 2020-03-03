<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lattitude longitude</title>
        <style>
        .loader {
          border: 16px solid #f3f3f3;
          border-radius: 50%;
          border-top: 16px solid #3498db;
          width: 120px;
          height: 120px;
          -webkit-animation: spin 2s linear infinite; /* Safari */
          animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
          0% { -webkit-transform: rotate(0deg); }
          100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
        }
        </style>
    </head>
    <body>
        <input type="number" placeholder="from id" id="from_id" value="">
        <input type="number" id="to_id" placeholder="to_id" value="">
        <button type="button" id="saveLatLon">Save Latitude and Longitude</button>
        <div class="loader" style="display: none"></div>
        <h1 id="countLatLon"></h1>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function() {
              $('#saveLatLon').on('click', function(){
                  var from_id = $('#from_id').val();
                  var to_id  = $('#to_id').val();
                  var key = 'AIzaSyBk_wP61GTl3wBNUTvMIjeFrXgM9cEeGPs';
                  $('.loader').show();

                    $.ajax({
                        url: '<?php echo site_url('temp/findDataForLatLon') ?>',
                        type: 'POST',
                        data: {from_id: from_id, to_id: to_id},
                        success: function(data) {
                            var jsonData = JSON.parse(data);
                            for (var i = 0; i < jsonData.length; i++) {
                                var address = jsonData[i].location+', '+jsonData[i].city+', Bangladesh';
                                var location_id = jsonData[i].location_id;
                                $.ajax({
                                    url:"https://maps.googleapis.com/maps/api/geocode/json?key="+key+"&address="+address+"&sensor=false",
                                    type: "POST",
                                    async: false,
                                    success:function(res){
                                        if (res.status != 'OK') {
                                            console.log('no lat lon found, LOCATION_ID='+location_id);
                                        } else {
                                            $.ajax({
                                                url: '<?php echo site_url('temp/saveDataForLatLon') ?>',
                                                type: 'POST',
                                                async: true,
                                                data: {
                                                    location_id : location_id,
                                                    latitude    : res.results[0].geometry.location.lat,
                                                    longitude   : res.results[0].geometry.location.lng
                                                },
                                                success:function(response){
                                                    console.log('ok');
                                                }
                                            });
                                        }
                                    }
                                });

                                union_id = '';
                            }
                        },
                        complete:function(data){
                            $('.loader').hide();
                            alert('successfully saved');
                            location.reload();
                        }
                    });

                });
            });
        </script>
    </body>
</html>
