var FormField = function() {

    function initTinyMce() {
        function elFinderBrowser (field_name, url, type, win) {
            tinymce.activeEditor.windowManager.open({
                file: adminUrl('elfinder'),
                title: 'File Manager',
                width: 900,
                height: 450,
                resizable: 'yes'
            }, {
                setUrl: function (url) {
                    win.document.getElementById(field_name).value = url;
                }
            });
            return false;
        }

        tinymce.init({
            selector: "textarea.editor",
            theme: "modern",
            content_css: window.siteCss,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern imagetools"
            ],
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            toolbar2: "template | forecolor backcolor emoticons",
            image_advtab: true,
            file_browser_callback : elFinderBrowser,
            templates: adminUrl('template/list'),
            image_dimensions: false,
            relative_urls: false,
        });
    }

    function initSelect2Tag() {
        var elements = $('.select2tag');

        if (!elements.length) return;

        for (var i = 0; i < elements.length; i++) {
            var value = elements.eq(i).val();
            var tags = value.split(',');
            elements.eq(i).select2({
                tags: tags,
                tokenSeparators: [","]
            });
        }
    }

    function initDatePicker() {
        var elements = $('.date-picker')

        if (!elements.length) return;

        elements.datepicker({
            autoclose: true
        });
    }

    function initDateTimePicker() {
        var elements = $('.datetime-picker')

        if (!elements.length) return;

        elements.datetimepicker({
            format: "YYYY-MM-DD HH:mm:ss"
        });
    }

    function initTimePicker() {
        var elements = $('.time-picker')

        if (!elements.length) return;

        elements.timepicker({
            showSeconds: false,
            // defaultTime: false,
            minuteStep: 1,
        });
    }

    function initTwoWindowMultiSelect() {
        var elements = $('.multi-select')

        if (!elements.length) return;

        elements.multiSelect();
    }

    function initSwitch() {
        var elements = $('.make-switch')

        if (!elements.length) return;

        elements.bootstrapSwitch();
    }

    function initTemplate(template, container, button) {
        var container = $(container),
            template = $(template)[0].innerHTML;
        $(button).click(function (e) {
            e.preventDefault();
            var tempTemplate = template.replace(new RegExp('{#}', 'g'), container.children().length + 1);
            container.append($(tempTemplate));
        });
    }

    function initGmap() {
        var elements = $('.google-map')

        if (!elements.length) return;

        $.each(elements, function(key, element) {
            var map_id = $(element).attr('data-inputid'),
                location = $(element).attr('data-location'),
                lt = null,
                lg = null;

            if (location !== undefined) {
                location = location.split(',');
                if (location.length === 2) {
                    console.log(location);
                    lt = location[0];
                    lg = location[1];
                }
            }

            gmapField(map_id, lt, lg);
        });
    }

    function gmapField(map_id, lt, lg) {
        var mapOptions = {
            scrollwheel: false,
            center: new google.maps.LatLng(-1.38, 116.69),
            mapTypeControl: false,
            streetViewControl: false,
            scaleControl: true,
            zoom: 5
        };
        var map = new google.maps.Map(document.getElementById(map_id + "-map-canvas"),
            mapOptions);

        var marker = new google.maps.Marker({
              map: map
        });

        var container = document.createElement('div');
        container.setAttribute('class', 'input-group');
        var btn = document.createElement('div');
        btn.innerHTML = '<span class="input-group-btn"><span class="btn blue" id="gmap_geocoding_btn"><i class="fa fa-search"></i></span></span>';
        var input = document.createElement('input');
        input.setAttribute('id','pac-input');
        input.setAttribute('class','form-control');
        input.setAttribute('type', 'text');
        input.setAttribute('placeholder', 'Search Places');
        container.appendChild(input);
        container.appendChild(btn.firstChild);

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(container);

        var searchBox = new google.maps.places.SearchBox(input);

        google.maps.event.addListener(searchBox, 'places_changed', function() {
            var places = searchBox.getPlaces();
            if (places.length == 0) {
                return;
            }

            var bounds = new google.maps.LatLngBounds();
            for (var i = 0, place; place = places[i]; i++) {
              bounds.extend(place.geometry.location);
            }
            map.fitBounds(bounds);
        });

        google.maps.event.addListener(map,'click', function(event) {
            mapDocument = document.getElementById(map_id);
            mapDocument.value = event.latLng.lat() + ',' + event.latLng.lng();
            marker.setPosition(event.latLng);

            map.panTo(event.latLng);
        });

        if (lt != null && lg != null) {
            lat_lng = new google.maps.LatLng(lt,lg);
            marker.setPosition(lat_lng);
            map.setZoom(10);
            map.panTo(lat_lng);
        }
    }

    return {
        init: function() {
            initSelect2Tag();
            initDatePicker();
            initDateTimePicker();
            initTimePicker();
            initTwoWindowMultiSelect();
            initSwitch();
            initTinyMce();
            initGmap();
        },
        initTemplate: initTemplate
    };
}();
