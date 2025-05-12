<?php
// Updated version to exclude courses without a selected concentration when concentration_filter_slug is specified
class UTMC_CourseTable extends ET_Builder_Module {

  public $slug       = 'utmc_coursetable';
  public $vb_support = 'on';

  protected $module_credits = array(
      'author'     => 'Simple[A]',
      'author_uri' => '',
  );

  public function init() {
    $this->name = esc_html__( 'UT McCombs - CourseTableAll', 'utmc-coursetable' );
    // Add version number to force cache refresh
    wp_enqueue_style('coursetable-style', plugin_dir_url(__FILE__) . 'coursetable.css', array(), '0.1.51');
//    wp_enqueue_style('coursetable-style', plugin_dir_url(__FILE__) . 'coursetable.css', array(), time());
  }

  // Module's Necessary Fields
  public function get_fields() {
    // Get unique concentration values for dropdown options
    $concentrations = $this->get_concentration_options();

    // Add "All" option at the top
    $concentrations = array_merge(array('all' => 'All'), $concentrations);

    return array(

        'placeholder'     => array(
            'label'           => esc_html__( 'Placeholder', 'utmc-coursetable' ),
            'type'            => 'text',
            'option_category' => 'basic_option',
            'default'         => 'Placeholder for CourseTableAll',
            'description'     => esc_html__( 'Placeholder text for CourseTable module.', 'utmc-coursetable' ),
            'toggle_slug'     => 'main_content',
            'dynamic_content' => 'text',
        ),

        'concentration_filter_slug' => array(
            'label'           => esc_html__( 'Concentration Filter Slug', 'utmc-coursetable' ),
            'type'            => 'text',
            'option_category' => 'basic_option',
            'description'     => esc_html__( 'Enter specific concentration slugs to filter courses by. Separate multiple slugs with commas.', 'utmc-coursetable' ),
            'toggle_slug'     => 'main_content',
        ),

        'message' => array(
            'label'           => esc_html__('Course Table - No Session Message', 'utmc-coursetable'),
            'type'            => 'tiny_mce',
            'option_category' => 'basic_option',
            'default'         => 'No sessions found for this course.',
            'description'     => esc_html__('Enter "No Session Message" text here, HTML supported.', 'utmc-coursetable'),
            'toggle_slug'     => 'main_content',
        ),

    );
  }

  // Function to get unique concentration values for dropdown options
  private function get_concentration_options() {
    $concentrations = array();

    // Get all terms from the ACF taxonomy field for 'concentrations'
    $terms = get_terms(array(
        'taxonomy' => 'concentrations',
        'hide_empty' => false,
    ));

    if (!is_wp_error($terms) && !empty($terms)) {
      foreach ($terms as $term) {
        $concentrations[$term->slug] = esc_html($term->name);
      }
    }

    return $concentrations;
  }

  // Function to generate the HTML output for the custom post type "Course"
  function display_courses($concentration_filter_slug = '', $no_sessions_message = '') {
    // Define the query arguments
    $args = array(
        'post_type' => 'course',
        'posts_per_page' => -1, // Adjust as needed
        'post_status' => 'publish'
    );

    // If concentration filter slug is provided, use it in the query
    if (!empty($concentration_filter_slug)) {
      $slug_array = array_map('sanitize_text_field', array_map('trim', explode(',', $concentration_filter_slug)));
      $args['tax_query'] = array(
          array(
              'taxonomy' => 'concentrations',
              'field'    => 'slug',
              'terms'    => $slug_array,
              'operator' => 'IN',
          ),
      );
    }

    // Custom query to fetch courses
    $query = new WP_Query($args);

    // Initialize an array to hold course sessions
    $course_sessions_array = [];
    $current_date_obj = new DateTime();

    // Check if there are any posts to display
    if ($query->have_posts()) {
      // Loop through the posts
      while ($query->have_posts()) {
        $query->the_post();

        // Fetch the custom fields using ACF
        $course_name = esc_html(get_field('course_name'));
        $course_concentration = esc_html(get_field('course_concentration'));
        $course_concentration_taxonomy = get_field('course_concentration_taxonomy');
        $course_concentration_taxonomy_label = $course_concentration_taxonomy ? esc_html(get_term($course_concentration_taxonomy)->name) : '';

        // Skip this course if concentration_filter_slug is specified and the course has no concentration taxonomy value
        if (!empty($concentration_filter_slug) && empty($course_concentration_taxonomy)) {
          continue;
        }

        $course_sessions = get_field('course_session');
        $post_url = esc_url(get_permalink());

        // Check if course sessions exist and process them
        if (is_array($course_sessions) && !empty($course_sessions)) {
          foreach ($course_sessions as $session) {
            $session_start_date = isset($session['course_session_start_date']) ? sanitize_text_field($session['course_session_start_date']) : '';
            $session_end_date = isset($session['course_session_end_date']) ? sanitize_text_field($session['course_session_end_date']) : '';
            $session_location = isset($session['course_session_location']) ? esc_html($session['course_session_location']) : '';
            $session_instructors = isset($session['course_session_instructor']) ? $session['course_session_instructor'] : [];
            $session_id = isset($session['course_session_id']) ? sanitize_text_field($session['course_session_id']) : '';
            $session_price = isset($session['course_session_price']) ? floatval($session['course_session_price']) : '';
            $session_course_format = isset($session['session_course_format']) ? sanitize_text_field($session['session_course_format']) : '';
            $coursedescription = esc_html(get_field('course_description'));

            // Convert session start date to DateTime object
            $start_date_obj = $session_start_date ? DateTime::createFromFormat('m/d/Y', $session_start_date) : null;

            // Skip sessions if not "on_demand" and the start date is in the future
            if ($session_course_format !== 'on_demand' && $start_date_obj && $start_date_obj < $current_date_obj) {
              continue;
            }

            // Determine the course date display
            $coursedate = ($session_course_format === 'on_demand' || !$session_start_date) ?
                "On Demand" :
                $session_start_date . " - <br> " . $session_end_date;

            // Clean the course date for button data
            $coursedateclean = strip_tags($coursedate);
            // Create display version of the date with proper HTML escaping
            $coursedatedisplay = ($session_course_format === 'on_demand' || !$session_start_date) ?
                "On Demand" :
                esc_html($session_start_date) . " " . esc_html($session_end_date);


            // Combine instructor names into a single string
            $instructor_names = [];
            if (is_array($session_instructors)) {
              foreach ($session_instructors as $instructor) {
                if (isset($instructor['course_session_instructor_name'])) {
                  $instructor_names[] = esc_html($instructor['course_session_instructor_name']);
                }
              }
            }
            $instructors_list = implode("<br> ", $instructor_names);

            $coursebutton = sprintf(
                '<button data-item-max-quantity="1" 
							data-item-id="%1$s" 
							data-item-price="%3$s" 
							data-item-description="%2$s" 
							data-item-name="%5$s" 
							data-item-custom1-name="Location" 
							data-item-custom1-type="readonly" 
							data-item-custom1-value="%7$s" 
							data-item-custom2-name="Session Date" 
							data-item-custom2-type="readonly" 
							data-item-custom2-value="%6$s" 
							data-item-custom3-name="Subject Area" 
							data-item-custom3-type="hidden" 
							data-item-custom3-value="%4$s" 
							data-item-custom4-name="Course Material" 
							data-item-custom4-type="hidden" 
							data-item-custom4-value="<p>Pre-Reads will be available two weeks prior to class.</p>" 
							class="snipcart-add-item courseCatalog__button">Enroll</button>',
                esc_attr($session_id), $coursedescription, esc_attr($session_price), esc_attr($course_concentration_taxonomy_label), esc_attr($course_name), $coursedateclean, esc_html($session_location)
            );

            $enroll_link = !empty($session["course_session_enroll_link"]) ? sprintf('<a href="%s" target="_blank"><button class="courseCatalog__button">Enroll*</button></a>', esc_url($session["course_session_enroll_link"])) : $coursebutton;

            $course_sessions_array[] = [
                'post_url' => $post_url,
                'course_name' => $course_name,
                'course_concentration' => $course_concentration,
                'course_concentration_taxonomy' => $course_concentration_taxonomy_label,
                'coursedate' => $coursedate,
                'session_location' => $session_location,
                'instructors_list' => $instructors_list,
                'enroll_link' => $enroll_link,
                'start_date_obj' => $start_date_obj,
                'session_course_format' => $session_course_format,
                'coursedatedisplay' => $coursedatedisplay,
            ];
          }
        }
      }
    }

    usort($course_sessions_array, function ($a, $b) {
      if ($a['session_course_format'] === 'on_demand') {
        return 1;
      }
      if ($b['session_course_format'] === 'on_demand') {
        return -1;
      }
      return $a['start_date_obj'] <=> $b['start_date_obj'];
    });

    wp_reset_postdata();

    // If no sessions were found, return the "no sessions found" message
    if (empty($course_sessions_array)) {
      return sprintf('<div class="no-sessions-message">%s</div>', $no_sessions_message);
    }

    $html_output = '<div class="courseCatalog--section">
						<div class="courseCatalog">
							<table class="responsive" role="table" aria-label="Course Catalog">
								<thead>
									<tr>
										<th scope="col" class="courseCatalog--class">Class</th>
										<th scope="col" class="courseCatalog--concentration">Concentration</th>
										<th scope="col" class="courseCatalog--date">Date</th>
										<th scope="col" class="courseCatalog--location">Location</th>
										<th scope="col" class="courseCatalog--instructors">Instructors</th>
										<th scope="col" class="courseCatalog--enroll">Enroll</th>
									</tr>
								</thead>
								<tbody>';

    foreach ($course_sessions_array as $session) {
      $html_output .= sprintf(
          '<tr>
					<td class="courseCatalog--class" data-label="Class"><a href="%s">%s</a></td>
					<td class="courseCatalog--concentration" data-label="Concentration">%s</td>
					<td class="courseCatalog--date" data-label="Date">%s</td>
					<td class="courseCatalog--location" data-label="Location">%s</td>
					<td class="courseCatalog--instructors" data-label="Instructors">%s</td>
					<td class="courseCatalog--enroll" data-label="Enroll">%s</td>
				</tr>',
          esc_url($session['post_url']),
          esc_html($session['course_name']),
          esc_html($session['course_concentration_taxonomy']),
          $session['coursedatedisplay'],
          esc_html($session['session_location']),
          $session['instructors_list'],
          $session['enroll_link']
      );
    }

    $html_output .= '</tbody></table></div></div>';
    wp_reset_postdata();

    return $html_output;
  }

  public function render($attrs, $content = null, $render_slug) {
    $concentration_filter_slug = isset($attrs['concentration_filter_slug']) ? sanitize_text_field($attrs['concentration_filter_slug']) : '';
    $no_sessions_message = isset($attrs['message']) ? $attrs['message'] : 'No sessions found for this concentration.';
    $doitall = sprintf('<div>%1$s</div>', $this->display_courses($concentration_filter_slug, $no_sessions_message));
    return $doitall;
  }

}

new UTMC_CourseTable;
