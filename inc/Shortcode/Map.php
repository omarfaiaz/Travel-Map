<?php

/**
 * Deactivate
 */

namespace Inc\Shortcode;
use WP_Query;
class Map
{
    public static function tm_map_sidebar()
    {
        $arg = [
            'post_type'            => 'service',
            'post_status'         => 'publish',
            'order'                => 'ASC',
            'orderby'            => 'name',
            'posts_per_page'    => -1
        ];
        $service = new WP_Query($arg);
        $i = 0;
?>
        <script>
            const stores = {
                "type": "FeatureCollection",
                "features": [
                    <?php
                    if ($service->have_posts()) {
                        while ($service->have_posts()) {

                            $service->the_post();
                            $name = get_the_title();
                            $city = get_field('city');
                            $type = get_field('transportation_type');
                            $lat = get_field('latitude');
                            $long = get_field('longitude');
                            $desc = get_field('description');

                    ?> {
                                "type": "Feature",
                                "geometry": {
                                    "type": "Point",
                                    "coordinates": [<?php echo esc_html($lat); ?>, <?php echo esc_html($long); ?>]
                                },
                                "properties": {
                                    "name": "<?php echo trim($name); ?>",
                                    "city": "<?php echo trim($city); ?>",
                                    "desc": "<?php echo trim($desc); ?>",
                                    "type": "<?php echo trim($type); ?>"
                                }
                            },
                    <?php

                            $i++;
                        }
                    }
                    wp_reset_postdata();
                    ?>

                ]

            }
        </script>

<?php
    }
}
