<?php

class UTMC_BuyButton extends ET_Builder_Module {

    public $slug       = 'utmc_buybutton';
    public $vb_support = 'on';

    protected $module_credits = array(
        'author'     => 'Simple[A]',
        'author_uri' => '',
    );

    public function init() {
        $this->name = esc_html__( 'UT McCombs - CourseTable', 'utmc-buybutton' );
        // Add CSS file enqueue with version number
        wp_enqueue_style('buybutton-style', plugin_dir_url(__FILE__) . 'buybutton.css', array(), '0.1.0');
    }

    // Module's Necessary Fields
    public function get_fields() {
        return array(

            'placeholder'     => array(
                'label'           => esc_html__( 'Placeholder', 'utmc-buybutton' ),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'default'         => 'Placeholder for CourseTable - course detail page.',
                'description'     => esc_html__( 'Placeholder text for BuyButton module.', 'utmc-buybutton' ),
                'toggle_slug'     => 'main_content',
                'dynamic_content' => 'text',
            ),

            'message' => array(
                'label'           => esc_html__('Course Table - No Session Message', 'utmc-buybutton'),
                'type'            => 'tiny_mce',
                'option_category' => 'basic_option',
                'default'         => 'CourseTable "no session" message.',
                'description'     => esc_html__('Enter "No Session Message" text here, HTML supported.', 'utmc-buybutton'),
                'toggle_slug'     => 'main_content',
            ),

        );
    }

    public function render_table() {
        $course_sessions = get_field('course_session');
        $has_upcoming_sessions_or_on_demand = false;
        $message  = $this->props['message'];

        // Initialize the HTML table string
        $html_output = '<div class="courseCatalog--section">
        <div class="courseCatalog">
        <div class="table-responsive">
           <table class="responsive">
                <thead>
                    <tr>
                        <th class="courseCatalog--class">Class</th>
                        <th class="courseCatalog--concentration">Concentration</th>
                        <th class="courseCatalog--date">Date</th>
                        <th class="courseCatalog--location">Location</th>
                        <th class="courseCatalog--instructors">Instructors</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>';

        // Check if $course_sessions is an array
        if (is_array($course_sessions)) {
            // Loop through the course sessions and build the table rows
            foreach ($course_sessions as $session) {
                $instructors = [];
                if (isset($session["course_session_instructor"]) && is_array($session["course_session_instructor"])) {
                    foreach ($session["course_session_instructor"] as $instructor) {
                        $instructors[] = $instructor["course_session_instructor_name"];
                    }
                }
                $instructors_list = implode("<br>", $instructors);

                $coursename = get_field('course_name');
                $coursetitle = sprintf('<a href="%2$s">%1$s</a>', $coursename, get_permalink());
                $coursedescription = esc_html(get_field('course_description'));
                $courseconcentration = get_field('course_concentration');
              $course_concentration_taxonomy = get_field('course_concentration_taxonomy');
              $course_concentration_taxonomy_label = $course_concentration_taxonomy ? esc_html(get_term($course_concentration_taxonomy)->name) : '';
                $coursesessionid = $session["course_session_id"];
                $coursesessionprice = $session["course_session_price"];
                $coursesessionlocation = $session["course_session_location"];
                $session_course_format = isset($session['session_course_format']) ? $session['session_course_format'] : '';

                // Check if the session is "on_demand" or if the date is in the future
                if (!$session["course_session_start_date"]) {
                    $coursedate = "On Demand";
                } else {
                    // Format the course date display
                    $session_format = isset($session["course_session_format"]) ? $session["course_session_format"] : '';
                    $coursedate = ($session_format === 'on_demand' || !$session["course_session_start_date"]) ?
                        "On Demand" :
                        esc_html($session["course_session_start_date"]) . " - " . esc_html($session["course_session_end_date"]);

                    // Convert session start date to DateTime object
                    $start_date_obj = DateTime::createFromFormat('m/d/Y', $session["course_session_start_date"]);
                    $end_date_obj = DateTime::createFromFormat('m/d/Y', $session["course_session_end_date"]);
                    $current_date_obj = new DateTime();

                    // Only show session if start date is in the future
                    if ($start_date_obj >= $current_date_obj) {
                        $has_upcoming_sessions_or_on_demand = true;
                    } else {
                        continue; // Skip past sessions
                    }
                }

                $coursebutton = sprintf(
                    '			
                    <button data-item-max-quantity="1" 
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
                    $coursesessionid,
                    $coursedescription,
                    $coursesessionprice,
                    $course_concentration_taxonomy_label,
                    $coursename,
                    $coursedate, // Now sanitized
                    $coursesessionlocation
                );

                $enroll_link = !empty($session["course_session_enroll_link"]) ? sprintf('<a href="%s" target="_blank"><button class="courseCatalog__button">Enroll*</button></a>', esc_url($session["course_session_enroll_link"])) : $coursebutton;
                // Append each row to the HTML output string
                $html_output .= '<tr>';
                $html_output .= '<td class="courseCatalog--class" data-label="Class">' . $coursetitle . '</td>';
                $html_output .= '<td class="courseCatalog--concentration" data-label="Concentration">' . $course_concentration_taxonomy_label . '</td>';
                $html_output .= '<td class="courseCatalog--date" data-label="Date">' . $coursedate . '</td>';
                $html_output .= '<td class="courseCatalog--location" data-label="Location">' . esc_html($coursesessionlocation) . '</td>';
                $html_output .= '<td class="courseCatalog--instructors" data-label="Instructors">' . $instructors_list . '</td>';
                $html_output .= '<td>' . $enroll_link . '</td>';
                $html_output .= '</tr>';
                $has_upcoming_sessions_or_on_demand = true;
            }
        }

        // Close the HTML table tags
        $html_output .= '</tbody></table></div></div></div>';

        // If there are no upcoming sessions or "on_demand" sessions, show the message
        if (!$has_upcoming_sessions_or_on_demand) {
            $html_output = $message;
        }

        return $html_output;
    }

    // Module Rendering in php
    public function render($attrs, $content = null, $render_slug) {
        $doitall = sprintf('<div>%1$s</div>', $this->render_table());
        $module = $doitall;
        return $module;
    }

}

new UTMC_BuyButton;
