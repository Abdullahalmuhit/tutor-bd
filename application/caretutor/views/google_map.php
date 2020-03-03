<?php echo $header;?>
<body>

    <style media="screen">
        #wrapper {
            font-family: 'Montserrat', sans-serif;
            padding-left: 0;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        #wrapper.toggled {
            padding-left: 40%;
        }

        #sidebar-wrapper {
            z-index: 1000;
            position: absolute;
            left: 40%;
            width: 0;
            height: 700px;
            margin-left: -40%;
            overflow-y: auto;
            background: #f4f4f2;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        #wrapper.toggled #page-content-wrapper {
            position: absolute;
            margin-right: -40%;
        }

        #wrapper.toggled #sidebar-wrapper {
            width: 40%;
        }
        #wrapper.toggled #page-content-wrapper {
            position: relative;
            margin-right: 0;
        }
        .map-h3 {
            margin-bottom: 0;
            margin-top: 3px;
            text-transform: uppercase;
            font-size: 15px;
            font-weight: bold;
        }
        .item {
            -moz-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.05);
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.05);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.05);
            -moz-border-radius: 0px;
            -webkit-border-radius: 0px;
            border-radius: 3px;
            -moz-transition: 0.4s;
            -webkit-transition: 0.4s;
            transition: 0.4s;
            cursor: pointer;
            background-color: #fff;
            display: table;
            padding: 10px;
            margin-bottom: 10px;
            width: 100%;
        }
        .item p {
            filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=60);
            opacity: 0.7;
            font-size: 12px;
        }

        .item label {
            filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=60);
            opacity: 0.7;
            font-size: 12px;
        }

        /* width */
        ::-webkit-scrollbar {
            width: 4px;
            height: 1px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #fff;
            border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #f4f4f2;
        }

        .toggle-navigation {
            display: inline-block;
            height: 12px;
            margin: 0px 0px 5px 10px;
            position: relative;
        }

        .toggle-navigation:hover {
            cursor: pointer;
        }

        .toggle-navigation {
            -moz-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.05);
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.05);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.05);
            background-color: #f4f4f2;
            bottom: 0;
            height: 27px;
            margin: auto;
            position: absolute;
            top: 0;
            z-index: 1;
        }

        .toggle-navigation .icon .line {
            -moz-transition: 0.2s ease-in-out all;
            -webkit-transition: 0.2s ease-in-out all;
            transition: 0.2s ease-in-out all;
            background-color: #474747;
            direction: block;
            height: 2px;
            margin-bottom: 3px;
            width: 15px;
        }

        .toggle-navigation .icon {
            padding: 7px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-control {
            height: 35px;
            border-radius: 3px;
        }
    </style>

    <div id="wrapper" class="toggled" style="margin-top: 60px">

        <div id="sidebar-wrapper">
            <div style="padding: 20px;">
                <div class="clearfix" style="margin-bottom: 20px">
                    <h3 class="pull-left map-h3">job board</h3>
                    <a href="javascript::" class="pull-right" data-toggle="collapse" data-target="#advanced_filter_collapse">Advanced Filter</a>
                </div>
                <div class="clearfix collapse" id="advanced_filter_collapse">
                    <div class="item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <select class="form-control filter" id="city_id">
                                        <?php foreach ($city as $key => $value): ?>
                                            <option value="<?php echo $value->id ?>"><?php echo $value->city ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Location</label>
                                    <select class="form-control" name="">
                                        <option value="">select one</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control filter" id="category_id">
                                        <?php foreach ($category as $key => $value): ?>
                                            <option value="<?php echo $value->id ?>"><?php echo $value->category ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Class</label>
                                    <select class="form-control" name="">
                                        <option value="">select one</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="filterJobBoard">
                    <div class="clearfix">

                        <?php foreach ($paginate_jobs as $key => $job): ?>
                            <div class="item" data-toggle="collapse" data-target="#collapse_<?php echo $job->id; ?>">
                                <p><b>job id: <?php echo $job->id ?></b></p>
                                <h3 class="map-h3">Need a tutor for <?php echo $job->sub_cat; ?> student</h3>
                                <p style="margin-bottom: 10px! important"><i class="fa fa-map-marker"></i> <?php echo $job->city; ?>, <?php echo $job->location; ?></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><b>Category:</b> <?php echo $job->category; ?> <br> <b>Gender:</b> <?php echo $job->student_gender; ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><b>Class:</b> <?php echo $job->sub_cat; ?> <br> <b>Curriculum:</b> </p>
                                    </div>
                                </div>
                                <div id="collapse_<?php echo $job->id; ?>" class="collapse" style="margin-top: 10px">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><b><?php echo $job->days_per_week; ?> days per week</b></p>
                                            <p><b>Salary:</b> <?php echo $job->salary_range; ?> tk <br> <b>Tutor Gender Preference: </b> <?php echo $job->preferred_gender; ?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><b>Subjects:</b> <?php echo $job->subs; ?> <br> <b>No. of Students:</b> <?php echo $job->no_of_student; ?> </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <p><?php echo $job->other_req; ?> </p>
                                        </div>
                                        <div class="col-md-5 text-right">
                                            <?php if ($job->latitude != 0 && $job->longitude != 0): ?>
                                                <button type="button" data-map_lat="<?php echo $job->latitude ?>" data-map_lng="<?php echo $job->longitude ?>" class="btn btn-xs btn-danger map_zoom_in" name="button">Zoom In</button>
                                            <?php endif; ?>
                                            <button type="button" class="btn btn-xs btn-primary applyJobSignInButton" data-job_id="<?php echo $job->id ?>" name="button">Apply Now</button>
                                            <p>posted on <?php echo date('jS F, Y',strtotime($job->created_at)); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div id="page-content-wrapper">
            <div class="toggle-navigation" id="menu-toggle">
                <div class="icon">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
            </div>
            <div id="filterMap">
                <div id="custom-map" style="height: 700px"></div>
            </div>
            <!-- <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a> -->
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <div class="modal fade" id="applyJobSignInModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal_loading" id="modal_loading" style="display: none;">
            <img src="<?php echo base_url(); ?>assets/panel/img/spinners/spinner_large.gif" alt="" width="64" height="64">
        </div>
        <div class="modal-dialog" style="margin-top: 50px !important;">
            <!--<div class="modal-content" style="border-radius: 0px !important;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel" style="color: #0072bf;">Sign In</h3>
                    <hr/>
                </div>
                <form class="form-horizontal apply_job_signin_form" id="apply_job_signin_form" method="post" role="form">
                    <input type="hidden" name="job_id" id="modal_job_id" />
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
                                <input type="email" class="form-control" required="required" name="tutor_email" placeholder="Please provide your email id" />
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 input_margin_bottom">
                                <input type="password" class="form-control" required="required" name="tutor_password" placeholder="Enter your password" />
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-back" id="back_to_first_form" style="display: none;">Back</button>
                        <button type="submit" name="submit_first" class="btn btn-caretutors apply_job_signin" id="apply_job_signin">Continue</button>
                    </div>
                </form>
            </div>-->
        </div>
    </div>


    <?php $this->load->view('frontend_menu'); ?>
	<?php echo $footer;?>

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
                // icon: '<?php echo base_url('assets/img/marker.gif') ?>',
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

    <!-- <script type="text/javascript">
    	$( "body" ).delegate( ".map_zoom_in", "click", function() {

    		var lat = $(this).data('map_lat');
    		var lng = $(this).data('map_lng');

    		var myLatLng = {lat: lat, lng: lng};

    		var map = new google.maps.Map(document.getElementById('custom-map'), {
    			zoom: 16,
    			center: myLatLng
    		});

    		var marker = new google.maps.Marker({
    			position: myLatLng,
    			map: map,
    			// title: 'Hello World!'
    		});
    	});
    </script> -->


    <script>
        $("#menu-toggle").on('click', function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        $(".filter").on('click', function(e) {
            var city_id = $('#city_id').val();
            var category_id = $('#category_id').val();

            var data = { 'city_id' : city_id, 'category_id' : category_id };
            $.ajax({
                url: "<?php echo site_url('landing/getMapFilterDataJobBoard'); ?>",
                type: "post",
                data : data,
                success: function(data) {
                    // $('#filterMap').html(data.map);
                    $('#filterJobBoard').html(data);
                }
            });
            $.ajax({
                url: "<?php echo site_url('landing/getMapFilterDataMap'); ?>",
                type: "post",
                data : data,
                success: function(data) {
                    // $('#filterMap').html(data.map);
                    $('#filterMap').html(data);
                }
            });
        });
    </script>
