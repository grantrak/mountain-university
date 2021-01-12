<?php  

add_action('rest_api_init', 'universityRegisterSearch');

function universityRegisterSearch() {
    register_rest_route('university/v1', 'search', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'universitySearchResults',
    ));
}

function universitySearchResults($data) {
    $mainQuery = new WP_Query(array(
        'post_type' => array('post', 'page', 'program', 'professor', 'event', 'campus'),
        's' => sanitize_text_field($data['term']) 
    ));

    $mainQueryResults = array(
        'generalInfo' => array(),
        'professors' => array(),
        'programs' => array(),
        'events' => array(),
        'campuses' => array()
    );

    while($mainQuery->have_posts()) {
        $mainQuery->the_post();

        if (get_post_type() == 'post' OR get_post_type() == 'page') {
            array_push($mainQueryResults['generalInfo'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'postType' => get_post_type(),
                'authorName' => get_the_author()
            ));
        }

        if (get_post_type() == 'program') {
            $relatedCampus = get_field('related_campus');
            if($relatedCampus) {
                foreach($relatedCampus as $campus) {
                    array_push($mainQueryResults['campuses'], array(
                        'title' => get_the_title($campus),
                        'permalink' => get_the_permalink($campus)
                    ));
                }
            }
            
            array_push($mainQueryResults['programs'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'id' => get_the_id()
            ));
        }

        if (get_post_type() == 'campus') {
            array_push($mainQueryResults['campuses'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink()
            ));
        }

        if (get_post_type() == 'professor') {
            array_push($mainQueryResults['professors'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'image' => get_the_post_thumbnail_url()
            ));
        }

        if (get_post_type() == 'event') {
            $eventDate = new DateTime(get_field('event_date'));
            $description = NULL;
            if (has_excerpt()) {
                $description =  get_the_excerpt(  );
            } else {
                $description =  wp_trim_words(get_the_content(), 15);
            }
            array_push($mainQueryResults['events'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'month' => $eventDate->format('M'),
                'day' => $eventDate->format('d'),
                'description' => $description
            ));
        }

        
    }

    $programRelationshipQuery = new WP_Query(array(
        'post_type' => array('professor', 'event'),
        'meta_query' => array(
            array(
                'key' => 'related_program',
                'compare' => 'LIKE',
                'value' => '"' . $mainQueryResults['programs'][0]['id'] . '"'
            )
        )
    ));

    while($programRelationshipQuery->have_posts()) {
        $programRelationshipQuery->the_post();

        if (get_post_type() == 'event') {
            $eventDate = new DateTime(get_field('event_date'));
            $description = NULL;
            if (has_excerpt()) {
                $description =  get_the_excerpt(  );
            } else {
                $description =  wp_trim_words(get_the_content(), 15);
            }
            array_push($mainQueryResults['events'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'month' => $eventDate->format('M'),
                'day' => $eventDate->format('d'),
                'description' => $description
            ));
        }

        if (get_post_type() == 'professor') {
            array_push($mainQueryResults['professors'], array(
                'title' => get_the_title(),
                'permalink' => get_the_permalink(),
                'image' => get_the_post_thumbnail_url()
            ));
        }

    }

    $mainQueryResults['professors'] = array_values( array_unique($mainQueryResults['professors'], SORT_REGULAR));

    $mainQueryResults['events'] = array_values( array_unique($mainQueryResults['events'], SORT_REGULAR));

    return $mainQueryResults;
}