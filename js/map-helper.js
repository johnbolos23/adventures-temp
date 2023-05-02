(function( $ ) {
    function initMap( $el ) {
    
        // Find marker elements within map.
        var $markers = $el.find('.marker');
    
        // Create gerenic map.
        var mapArgs = {
            zoom        : $el.data('zoom') || 16,
            mapTypeId   : google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map( $el[0], mapArgs );
    
        // Add markers.
        map.markers = [];
        $markers.each(function(){
            initMarker( $(this), map );
        });
    
        // Center map based on markers.
        centerMap( map );
    
        // Return map instance.
        return map;
    }
    
    /**
     * initMarker
     *
     * Creates a marker for the given jQuery element and map.
     *
     * @date    22/10/19
     * @since   5.8.6
     *
     * @param   jQuery $el The jQuery element.
     * @param   object The map instance.
     * @return  object The marker instance.
     */

    var previousWindow = false;
    var previousMarker = false;
    var previousNormalSize = false;
    
    function initMarker( $marker, map ) {
    
        // Get position from marker.
        var lat = $marker.data('lat');
        var lng = $marker.data('lng');
        var mapMarker = '<?xml version="1.0"?><svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg"><g filter="url(#filter0_d_221_2916)"><circle cx="17.2644" cy="13.2644" r="13.2644" fill="white"/></g><g filter="url(#filter1_d_221_2916)"><circle cx="17.2655" cy="13.2645" r="6.38655" fill="'+ $marker.data('color') +'"/></g><defs><filter id="filter0_d_221_2916" x="0.0698149" y="0" width="34.3892" height="34.3892" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/><feOffset dy="3.93019"/><feGaussianBlur stdDeviation="1.96509"/><feComposite in2="hardAlpha" operator="out"/><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.12 0"/><feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_221_2916"/><feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_221_2916" result="shape"/></filter><filter id="filter1_d_221_2916" x="7.93127" y="3.93029" width="18.6685" height="18.6685" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/><feOffset/><feGaussianBlur stdDeviation="1.47382"/><feComposite in2="hardAlpha" operator="out"/><feColorMatrix type="matrix" values="0 0 0 0 0.858824 0 0 0 0 0.27451 0 0 0 0 0.25098 0 0 0 0.5 0"/><feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_221_2916"/><feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_221_2916" result="shape"/></filter></defs></svg>';
        var latLng = {
            lat: parseFloat( lat ),
            lng: parseFloat( lng )
        };

        var markerTitle = $marker.data('title');

        var normalSize = { url: 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent(mapMarker), scaledSize: new google.maps.Size(26, 26) };

        var largeSize = { url: 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent(mapMarker), scaledSize: new google.maps.Size(41, 41) };
    
        // Create marker instance.
        var marker = new google.maps.Marker({
            position : latLng,
            map: map,
            title: markerTitle,
            // icon: mapMarker
            icon: normalSize
        });
    
        // If marker contains HTML, add it to an infoWindow.
        if( $marker.html() ){
    
            // Create info window.
            var infowindow = new google.maps.InfoWindow({
                content: $marker.html()
            });
    
            

            // Show info window when marker is clicked.
            if( $marker.data('layout-type') === 'gateway' ){
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open( map, marker );
                });

                google.maps.event.trigger(marker,'click');
            }else{
                google.maps.event.addListener(marker, 'mouseover', function() {
                    if( previousWindow ){
                        previousWindow.close();
                    }
                    if( previousMarker ){
                        previousMarker.setIcon(previousNormalSize);
                    }
                    previousNormalSize = normalSize;
                    previousWindow = infowindow;
                    previousMarker = marker;
    
                    this.setIcon(largeSize);
                    infowindow.open( map, marker );
                });
    
                google.maps.event.addListener(infowindow,'closeclick',function(){
                    marker.setIcon(normalSize);
                });
            }
            
        }

        // Append to reference for later use.
        map.markers.push( marker );
    }
    
    /**
     * centerMap
     *
     * Centers the map showing all markers in view.
     *
     * @date    22/10/19
     * @since   5.8.6
     *
     * @param   object The map instance.
     * @return  void
     */
    function centerMap( map ) {
    
        // Create map boundaries from all map markers.
        var bounds = new google.maps.LatLngBounds();
        map.markers.forEach(function( marker ){
            bounds.extend({
                lat: marker.position.lat(),
                lng: marker.position.lng()
            });
        });
    
        // Case: Single marker.
        if( map.markers.length == 1 ){
            map.setCenter( bounds.getCenter() );
    
        // Case: Multiple markers.
        } else{
            map.fitBounds( bounds );
        }
    }
    
    // Render maps on page load.
    $(document).ready(function(){
        $('.custom-map').each(function(){
            var map = initMap( $(this) );
        });
    });

    function initialize() {
        var input = document.getElementById('searchTextField');
        var autocomplete = new google.maps.places.Autocomplete(input);

        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('cityLat').value = place.geometry.location.lat();
            document.getElementById('cityLng').value = place.geometry.location.lng();
            //alert("This function is working!");
            //alert(place.name);
           // alert(place.address_components[0].long_name);

           $('#customBranchSearch').submit();

        });
    }
      
    // google.maps.event.addDomListener(window, 'load', initialize);
    
})(jQuery);
