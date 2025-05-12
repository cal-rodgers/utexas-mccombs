<?php
/*
Plugin Name: UT McCombs
Description: UT McCombs Custom Divi Modules
Version:     2.01 - 2025-04-28
Author:      Simple[A]
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: utmc-utexas-mccombs
Domain Path: /languages

*/

add_filter('et_epanel_tab_names','utmc_add_epanel_tab');
function utmc_add_epanel_tab($tabs)
{
$tabs["utmc_my_tab"] = "McCombs Modules";
return $tabs;
}

add_filter('et_epanel_layout_data', 'utmc_add_epanel_tab_content');
function utmc_add_epanel_tab_content($layout_data)
{
    $layout_data[] = [
        "name" => "wrap_utmc_my_tab",
        "type" => "contenttab-wrapstart",
    ];
    // Add Sub Tabs
    $layout_data[] =["type" => "subnavtab-start"];

    $layout_data[] = [
        "name" => "utmc_general_settings",
        "type" => "subnav-tab",
        "desc" => "General Settings",
    ];

//    $layout_data[] = [
//        "name" => "utmc_marketo_form_settings",
//        "type" => "subnav-tab",
//        "desc" => "Marketo Form Settings",
//    ];

//    $layout_data[] = [
//        "name" => "utmc_tab_alert",
//        "type" => "subnav-tab",
//        "desc" => "Alert",
//    ];
//
//    $layout_data[] = [
//        "name" => "utmc_tab_card",
//        "type" => "subnav-tab",
//        "desc" => "Card",
//    ];
//
//    $layout_data[] = [
//        "name" => "utmc_tab_hero",
//        "type" => "subnav-tab",
//        "desc" => "Hero",
//    ];

//    $layout_data[] = [
//        "name" => "utmc_tab_home_hero",
//        "type" => "subnav-tab",
//        "desc" => "Home Hero",
//    ];

//    $layout_data[] = [
//        "name" => "utmc_tab_quicklinks",
//        "type" => "subnav-tab",
//        "desc" => "QuickLinks (JumpMenu)",
//    ];

//    $layout_data[] = [
//        "name" => "utmc_tab_linkbox",
//        "type" => "subnav-tab",
//        "desc" => "LinkBox",
//    ];

//    $layout_data[] = [
//        "name" => "utmc_tab_quote",
//        "type" => "subnav-tab",
//        "desc" => "Quote",
//    ];

    $layout_data[] = [
        "name" => "utmc_tab_statistic",
        "type" => "subnav-tab",
        "desc" => "Statistic",
    ];

    $layout_data[] = [
        "name" => "utmc_tab_sectionheading",
        "type" => "subnav-tab",
        "desc" => "SectionHeading",
    ];

    $layout_data[] = [
        "name" => "utmc_tab_sectionheading_box",
        "type" => "subnav-tab",
        "desc" => "SectionHeadingBox",
    ];

    $layout_data[] = [
        "name" => "utmc_tab_cta",
        "type" => "subnav-tab",
        "desc" => "CTA",
    ];

//    $layout_data[] = [
//        "name" => "utmc_tab_hero",
//        "type" => "subnav-tab",
//        "desc" => "Hero",
//    ];

    $layout_data[] = [
        "name" => "utmc_tab_split_hero",
        "type" => "subnav-tab",
        "desc" => "Content and Image Feature (SplitHero)",
    ];



    $layout_data[] = ["type" => "subnavtab-end"];

    /*************************
     * general sub tab content *
     *************************/
    $layout_data[] = [
        "name" => "utmc_general_settings",
        "type" => "subcontent-start",
    ];

//    $layout_data[] = [
//        "name" => "General Checkbox Field",
//        "id" => "utmc_general_checkbox_field",
//        "type" => "checkbox",
//        "std" => "on",
//        "desc" => "Description of Field - Allow over maxChar, show negative number",
//    ];

    $layout_data[] = [
        "name" => "Max Character Warning",
        "id" => "utmc_max_char_warn",
        "type" => "text",
        "std" => "5",
        "desc" => "MaxCharacter Warning - Must be a number!",
        "validation_type" => "number"
    ];

    $layout_data[] = [
        "name" => "Warning Color",
        "id" => "utmc_max_char_warn_color",
        "type" => "et_color_palette",
        "std" => "#FF2222",
        "items_amount" => 1,
        "desc" => "Select warning color",
    ];

    $layout_data[] = [
        "name" => "Max Character Enforcement Default",
        "id" => "utmc_max_char_enforce",
        "type" => "select",
        "options" => [
            'absolute' => "Absolute",
            'flexible' => "Flexible",
            'unlimited' => "Unlimited",
        ],
        "std" => "flexible",
        'et_save_values' => true,
        "desc" => "Absolute - can't exceed max, Flexible - allows more characters than maximum, shows negative number after max, Unlimited - no maximum.",
    ];

    //close the sub tab content
    $layout_data[] = [
        "name" => "utmc_general_settings",
        "type" => "subcontent-end",
    ];

    /*************************
     * marketo form *
     *************************/
//    $layout_data[] = [
//        "name" => "utmc_marketo_form_settings",
//        "type" => "subcontent-start",
//    ];
//
//
//    $layout_data[] = [
//        "name" => "Marketo Form Privacy Message",
//        "id" => "utmc_marketo_form_message",
//        "type" => "textarea",
//        "std" => "I have read and accept the University of Texas at Austin privacy policy. ",
//        "desc" => "Enter form privacy message.",
//    ];


    //close the sub tab content
//    $layout_data[] = [
//        "name" => "utmc_marketo_form_settings",
//        "type" => "subcontent-end",
//    ];

    /*************************
     * quicklinks tab content *
     *************************/
//    $layout_data[] = [
//        "name" => "utmc_tab_quicklinks",
//        "type" => "subcontent-start",
//    ];
//
//
//    $layout_data[] = [
//        "name" => "Kicker",
//        "id" => "utmc_quicklinks_kicker",
//        "type" => "text",
//        "std" => "25",
//        "desc" => "Kicker - Maximum Chars - Must be a number!",
//        "validation_type" => "number"
//    ];
//
//    $layout_data[] = [
//        "name" => "Kicker - Max Character Enforcement",
//        "id" => "utmc_quicklinks_kicker_enforce",
//        "type" => "select",
//        "options" => [
//            'absolute' => "Absolute",
//            'flexible' => "Flexible",
//            'unlimited' => "Unlimited",
//        ],
//        "std" => "flexible",
//        'et_save_values' => true,
//        "desc" => "Absolute - can't exceed max, Flexible - allows more characters than maximum, shows negative number after max, Unlimited - no maximum.",
//    ];


    //close the sub tab content
//    $layout_data[] = [
//        "name" => "utmc_tab_quicklinks",
//        "type" => "subcontent-end",
//    ];


    /*************************
     * first sub tab content *
     *************************/
//    $layout_data[] = [
//        "name" => "utmc_my_tab_first",
//        "type" => "subcontent-start",
//    ];
//
//    $layout_data[] = [
//        "name" => "My Checkbox Field",
//        "id" => "utmc_my_checkbox_field",
//        "type" => "checkbox",
//        "std" => "on",
//        "desc" => "Description of Field - Allow over maxChar, show negative number",
//    ];
//
//    $layout_data[] = [
//        "name" => "My Text Field",
//        "id" => "utmc_my_text_field",
//        "type" => "text",
//        "std" => "30",
//        "desc" => "Description of Field - Max Chars - Must be a number!",
//        "validation_type" => "number"
//    ];

    //close the sub tab content
//    $layout_data[] = [
//        "name" => "utmc_my_tab_first",
//        "type" => "subcontent-end",
//    ];


    /*************************
     * section header tab content *
     *************************/
    $layout_data[] = [
        "name" => "utmc_tab_sectionheading",
        "type" => "subcontent-start",
    ];


    $layout_data[] = [
        "name" => "Heading",
        "id" => "utmc_section_header_heading",
        "type" => "text",
        "std" => "25",
        "desc" => "Heading - Maximum Chars - Must be a number!",
        "validation_type" => "number"
    ];

    $layout_data[] = [
        "name" => "Heading - Max Character Enforcement",
        "id" => "utmc_section_header_heading_enforce",
        "type" => "select",
        "options" => [
            'absolute' => "Absolute",
            'flexible' => "Flexible",
            'unlimited' => "Unlimited",
        ],
        "std" => "flexible",
        'et_save_values' => true,
        "desc" => "Absolute - can't exceed max, Flexible - allows more characters than maximum, shows negative number after max, Unlimited - no maximum.",
    ];

    $layout_data[] = [
        "name" => "Button Text",
        "id" => "utmc_section_header_button",
        "type" => "text",
        "std" => "30",
        "desc" => "Button Text - Maximum Chars - Must be a number!",
        "validation_type" => "number"
    ];

    $layout_data[] = [
        "name" => "Button Text - Max Character Enforcement",
        "id" => "utmc_section_header_button_enforce",
        "type" => "select",
        "options" => [
            'absolute' => "Absolute",
            'flexible' => "Flexible",
            'unlimited' => "Unlimited",
        ],
        "std" => "flexible",
        'et_save_values' => true,
        "desc" => "Absolute - can't exceed max, Flexible - allows more characters than maximum, shows negative number after max, Unlimited - no maximum.",
    ];


    //close the sub tab content
    $layout_data[] = [
        "name" => "utmc_tab_sectionheading",
        "type" => "subcontent-end",
    ];

    /*************************
     * section header box tab content *
     *************************/
    $layout_data[] = [
        "name" => "utmc_tab_sectionheading_box",
        "type" => "subcontent-start",
    ];


    $layout_data[] = [
        "name" => "Heading Box",
        "id" => "utmc_section_header_heading_box",
        "type" => "text",
        "std" => "35",
        "desc" => "Heading Box - Maximum Chars - Must be a number!",
        "validation_type" => "number"
    ];

    $layout_data[] = [
        "name" => "Heading Box - Max Character Enforcement",
        "id" => "utmc_section_header_heading_enforce_box",
        "type" => "select",
        "options" => [
            'absolute' => "Absolute",
            'flexible' => "Flexible",
            'unlimited' => "Unlimited",
        ],
        "std" => "flexible",
        'et_save_values' => true,
        "desc" => "Absolute - can't exceed max, Flexible - allows more characters than maximum, shows negative number after max, Unlimited - no maximum.",
    ];


    //close the sub tab content
    $layout_data[] = [
        "name" => "utmc_tab_sectionheading_box",
        "type" => "subcontent-end",
    ];

    /*************************
     * cta tab content *
     *************************/
    $layout_data[] = [
        "name" => "utmc_tab_cta",
        "type" => "subcontent-start",
    ];


    $layout_data[] = [
        "name" => "CTA Heading",
        "id" => "utmc_cta_heading",
        "type" => "text",
        "std" => "75",
        "desc" => "CTA Heading - Maximum Chars - Must be a number!",
        "validation_type" => "number"
    ];

    $layout_data[] = [
        "name" => "CTA Heading - Max Character Enforcement",
        "id" => "utmc_cta_heading_enforce",
        "type" => "select",
        "options" => [
            'absolute' => "Absolute",
            'flexible' => "Flexible",
            'unlimited' => "Unlimited",
        ],
        "std" => "flexible",
        'et_save_values' => true,
        "desc" => "Absolute - can't exceed max, Flexible - allows more characters than maximum, shows negative number after max, Unlimited - no maximum.",
    ];

    $layout_data[] = [
        "name" => "CTA Body",
        "id" => "utmc_cta_body",
        "type" => "text",
        "std" => "250",
        "desc" => "CTA Body - Maximum Chars - Must be a number!",
        "validation_type" => "number"
    ];

    $layout_data[] = [
        "name" => "CTA Body - Max Character Enforcement",
        "id" => "utmc_cta_body_enforce",
        "type" => "select",
        "options" => [
            'absolute' => "Absolute",
            'flexible' => "Flexible",
            'unlimited' => "Unlimited",
        ],
        "std" => "flexible",
        'et_save_values' => true,
        "desc" => "Absolute - can't exceed max, Flexible - allows more characters than maximum, shows negative number after max, Unlimited - no maximum.",
    ];

    //close the sub tab content
    $layout_data[] = [
        "name" => "utmc_tab_cta",
        "type" => "subcontent-end",
    ];


    /*************************
     * hero tab content *
     *************************/
//    $layout_data[] = [
//        "name" => "utmc_tab_hero",
//        "type" => "subcontent-start",
//    ];
//
//
//    $layout_data[] = [
//        "name" => "Hero Heading",
//        "id" => "utmc_hero_heading",
//        "type" => "text",
//        "std" => "35",
//        "desc" => "Hero Heading - Maximum Chars - Must be a number!",
//        "validation_type" => "number"
//    ];
//
//    $layout_data[] = [
//        "name" => "Hero Heading - Max Character Enforcement",
//        "id" => "utmc_hero_heading_enforce",
//        "type" => "select",
//        "options" => [
//            'absolute' => "Absolute",
//            'flexible' => "Flexible",
//            'unlimited' => "Unlimited",
//        ],
//        "std" => "flexible",
//        'et_save_values' => true,
//        "desc" => "Absolute - can't exceed max, Flexible - allows more characters than maximum, shows negative number after max, Unlimited - no maximum.",
//    ];
//
//    $layout_data[] = [
//        "name" => "Hero Body",
//        "id" => "utmc_hero_body",
//        "type" => "text",
//        "std" => "400",
//        "desc" => "Hero Body - Maximum Chars - Must be a number!",
//        "validation_type" => "number"
//    ];
//
//    $layout_data[] = [
//        "name" => "Hero Body - Max Character Enforcement",
//        "id" => "utmc_hero_body_enforce",
//        "type" => "select",
//        "options" => [
//            'absolute' => "Absolute",
//            'flexible' => "Flexible",
//            'unlimited' => "Unlimited",
//        ],
//        "std" => "flexible",
//        'et_save_values' => true,
//        "desc" => "Absolute - can't exceed max, Flexible - allows more characters than maximum, shows negative number after max, Unlimited - no maximum.",
//    ];

//    $layout_data[] = [
//        "name" => "Hero Kicker",
//        "id" => "utmc_hero_kicker",
//        "type" => "text",
//        "std" => "40",
//        "desc" => "Hero Kicker - Maximum Chars - Must be a number!",
//        "validation_type" => "number"
//    ];
//
//    $layout_data[] = [
//        "name" => "Hero Kicker - Max Character Enforcement",
//        "id" => "utmc_hero_kicker_enforce",
//        "type" => "select",
//        "options" => [
//            'absolute' => "Absolute",
//            'flexible' => "Flexible",
//            'unlimited' => "Unlimited",
//        ],
//        "std" => "flexible",
//        'et_save_values' => true,
//        "desc" => "Absolute - can't exceed max, Flexible - allows more characters than maximum, shows negative number after max, Unlimited - no maximum.",
//    ];


    //close the sub tab content
//    $layout_data[] = [
//        "name" => "utmc_tab_hero",
//        "type" => "subcontent-end",
//    ];

    /*************************
     * split hero tab content *
     *************************/
    $layout_data[] = [
        "name" => "utmc_tab_split_hero",
        "type" => "subcontent-start",
    ];


    $layout_data[] = [
        "name" => "Split Hero Heading",
        "id" => "utmc_split_hero_heading",
        "type" => "text",
        "std" => "25",
        "desc" => "CTA Heading - Maximum Chars - Must be a number!",
        "validation_type" => "number"
    ];

    $layout_data[] = [
        "name" => "Split Hero Heading - Max Character Enforcement",
        "id" => "utmc_split_hero_heading_enforce",
        "type" => "select",
        "options" => [
            'absolute' => "Absolute",
            'flexible' => "Flexible",
            'unlimited' => "Unlimited",
        ],
        "std" => "flexible",
        'et_save_values' => true,
        "desc" => "Absolute - can't exceed max, Flexible - allows more characters than maximum, shows negative number after max, Unlimited - no maximum.",
    ];

    $layout_data[] = [
        "name" => "Split Hero Body",
        "id" => "utmc_split_hero_body",
        "type" => "text",
        "std" => "120",
        "desc" => "Split Hero Body - Maximum Chars - Must be a number!",
        "validation_type" => "number"
    ];

    $layout_data[] = [
        "name" => "Split Hero Body - Max Character Enforcement",
        "id" => "utmc_split_hero_body_enforce",
        "type" => "select",
        "options" => [
            'absolute' => "Absolute",
            'flexible' => "Flexible",
            'unlimited' => "Unlimited",
        ],
        "std" => "flexible",
        'et_save_values' => true,
        "desc" => "Absolute - can't exceed max, Flexible - allows more characters than maximum, shows negative number after max, Unlimited - no maximum.",
    ];


//    $layout_data[] = [
//        "name" => "Split Hero Kicker",
//        "id" => "utmc_split_hero_kicker",
//        "type" => "text",
//        "std" => "25",
//        "desc" => "Split Hero Kicker - Maximum Chars - Must be a number!",
//        "validation_type" => "number"
//    ];
//
//    $layout_data[] = [
//        "name" => "Split Hero Kicker - Max Character Enforcement",
//        "id" => "utmc_split_hero_kicker_enforce",
//        "type" => "select",
//        "options" => [
//            'absolute' => "Absolute",
//            'flexible' => "Flexible",
//            'unlimited' => "Unlimited",
//        ],
//        "std" => "flexible",
//        'et_save_values' => true,
//        "desc" => "Absolute - can't exceed max, Flexible - allows more characters than maximum, shows negative number after max, Unlimited - no maximum.",
//    ];

    //close the sub tab content
    $layout_data[] = [
        "name" => "utmc_tab_split_hero",
        "type" => "subcontent-end",
    ];


    /*************************
     * statistic tab content *
     *************************/
    $layout_data[] = [
        "name" => "utmc_tab_statistic",
        "type" => "subcontent-start",
    ];


    $layout_data[] = [
        "name" => "Figure",
        "id" => "utmc_statistic_figure",
        "type" => "text",
        "std" => "5",
        "desc" => "Figure - Maximum Chars - Must be a number!",
        "validation_type" => "number"
    ];

    $layout_data[] = [
        "name" => "Figure - Max Character Enforcement",
        "id" => "utmc_statistic_figure_enforce",
        "type" => "select",
        "options" => [
            'absolute' => "Absolute",
            'flexible' => "Flexible",
            'unlimited' => "Unlimited",
        ],
        "std" => "flexible",
        'et_save_values' => true,
        "desc" => "Absolute - can't exceed max, Flexible - allows more characters than maximum, shows negative number after max, Unlimited - no maximum.",
    ];

    $layout_data[] = [
        "name" => "Heading",
        "id" => "utmc_statistic_heading",
        "type" => "text",
        "std" => "25",
        "desc" => "Heading - Maximum Chars - Must be a number!",
        "validation_type" => "number"
    ];
    $layout_data[] = [
        "name" => "Heading - Max Character Enforcement",
        "id" => "utmc_statistic_heading_enforce",
        "type" => "select",
        "options" => [
            'absolute' => "Absolute",
            'flexible' => "Flexible",
            'unlimited' => "Unlimited",
        ],
        "std" => "flexible",
        'et_save_values' => true,
        "desc" => "Absolute - can't exceed max, Flexible - allows more characters than maximum, shows negative number after max, Unlimited - no maximum.",
    ];

    $layout_data[] = [
        "name" => "Body",
        "id" => "utmc_statistic_body",
        "type" => "text",
        "std" => "55",
        "desc" => "Body - Maximum Chars - Must be a number!",
        "validation_type" => "number"
    ];

    $layout_data[] = [
        "name" => "Body - Max Character Enforcement",
        "id" => "utmc_statistic_body_enforce",
        "type" => "select",
        "options" => [
            'absolute' => "Absolute",
            'flexible' => "Flexible",
            'unlimited' => "Unlimited",
        ],
        "std" => "flexible",
        'et_save_values' => true,
        "desc" => "Absolute - can't exceed max, Flexible - allows more characters than maximum, shows negative number after max, Unlimited - no maximum.",
    ];

    $layout_data[] = [
        "name" => "Source",
        "id" => "utmc_statistic_source",
        "type" => "text",
        "std" => "50",
        "desc" => "Source - Maximum Chars - Must be a number!",
        "validation_type" => "number"
    ];

    $layout_data[] = [
        "name" => "Source - Max Character Enforcement",
        "id" => "utmc_statistic_source_enforce",
        "type" => "select",
        "options" => [
            'absolute' => "Absolute",
            'flexible' => "Flexible",
            'unlimited' => "Unlimited",
        ],
        "std" => "flexible",
        'et_save_values' => true,
        "desc" => "Absolute - can't exceed max, Flexible - allows more characters than maximum, shows negative number after max, Unlimited - no maximum.",
    ];

    //close the sub tab content
    $layout_data[] = [
        "name" => "utmc_tab_statistic",
        "type" => "subcontent-end",
    ];


    $layout_data[] = [
        "name" => "wrap_utmc_my_tab",
        "type" => "contenttab-wrapend",
    ];

    return $layout_data;
}

function utmc_enqueue_script() {
	$options_data = array(
							'warn'=>et_get_option('utmc_max_char_warn') ?  et_get_option('utmc_max_char_warn') : 5, 
							'color'=>et_get_option('utmc_max_char_warn_color') ?  et_get_option('utmc_max_char_warn_color') : '' 
						 );
	/**********************************
     * Section Heading Module Setting *
     **********************************/					 
	$options_data['heading'] = array(
		'max' =>  et_get_option('utmc_section_header_heading') ?  et_get_option('utmc_section_header_heading') : 25,
		'enforce' => et_get_option('utmc_section_header_heading_enforce') ?  et_get_option('utmc_section_header_heading_enforce') : (et_get_option('utmc_max_char_enforce') ?  et_get_option('utmc_max_char_enforce') : 'flexible'),
	);
	
	$options_data['button_text'] = array(
		'max' =>  et_get_option('utmc_section_header_button') ?  et_get_option('utmc_section_header_button') : 25,
		'enforce' => et_get_option('utmc_section_header_button_enforce') ?  et_get_option('utmc_section_header_button_enforce') : (et_get_option('utmc_max_char_enforce') ?  et_get_option('utmc_max_char_enforce') : 'flexible'),
	);

    /**********************************
     * Section Heading Box Module Setting *
     **********************************/
    $options_data['heading_box'] = array(
        'max' =>  et_get_option('utmc_section_header_heading_box') ?  et_get_option('utmc_section_header_heading_box') : 35,
        'enforce' => et_get_option('utmc_section_header_heading_enforce_box') ?  et_get_option('utmc_section_header_heading_enforce_box') : (et_get_option('utmc_max_char_enforce') ?  et_get_option('utmc_max_char_enforce') : 'flexible'),
    );

    /**********************************
     * CTA Module Setting *
     **********************************/
    $options_data['cta_heading'] = array(
        'max' =>  et_get_option('utmc_cta_heading') ?  et_get_option('utmc_cta_heading') : 35,
        'enforce' => et_get_option('utmc_cta_heading_enforce') ?  et_get_option('utmc_cta_heading_enforce') : (et_get_option('utmc_max_char_enforce') ?  et_get_option('utmc_max_char_enforce') : 'flexible'),
    );

    $options_data['cta_body'] = array(
        'max' =>  et_get_option('utmc_cta_body') ?  et_get_option('utmc_cta_body') : 125,
        'enforce' => et_get_option('utmc_cta_body_enforce') ?  et_get_option('utmc_cta_body_enforce') : (et_get_option('utmc_max_char_enforce') ?  et_get_option('utmc_max_char_enforce') : 'flexible'),
    );

    /**********************************
     * Hero Module Setting *
     **********************************/
//    $options_data['hero_heading'] = array(
//        'max' =>  et_get_option('utmc_hero_heading') ?  et_get_option('utmc_hero_heading') : 35,
//        'enforce' => et_get_option('utmc_hero_heading_enforce') ?  et_get_option('utmc_hero_heading_enforce') : (et_get_option('utmc_max_char_enforce') ?  et_get_option('utmc_max_char_enforce') : 'flexible'),
//    );
//
//    $options_data['hero_body'] = array(
//        'max' =>  et_get_option('utmc_hero_body') ?  et_get_option('utmc_hero_body') : 400,
//        'enforce' => et_get_option('utmc_hero_body_enforce') ?  et_get_option('utmc_hero_body_enforce') : (et_get_option('utmc_max_char_enforce') ?  et_get_option('utmc_max_char_enforce') : 'flexible'),
//    );

//    $options_data['hero_kicker'] = array(
//        'max' =>  et_get_option('utmc_hero_kicker') ?  et_get_option('utmc_hero_kicker') : 50,
//        'enforce' => et_get_option('utmc_hero_kicker_enforce') ?  et_get_option('utmc_hero_kicker_enforce') : (et_get_option('utmc_max_char_enforce') ?  et_get_option('utmc_max_char_enforce') : 'flexible'),
//    );

    /**********************************
     * Split Hero Module Setting *
     **********************************/
    $options_data['split_hero_heading'] = array(
        'max' =>  et_get_option('utmc_split_hero_heading') ?  et_get_option('utmc_split_hero_heading') : 35,
        'enforce' => et_get_option('utmc_cta_heading_enforce') ?  et_get_option('utmc_cta_heading_enforce') : (et_get_option('utmc_max_char_enforce') ?  et_get_option('utmc_max_char_enforce') : 'flexible'),
    );

    $options_data['split_hero_body'] = array(
        'max' =>  et_get_option('utmc_split_hero_body') ?  et_get_option('utmc_split_hero_body') : 125,
        'enforce' => et_get_option('utmc_split_hero_body_enforce') ?  et_get_option('utmc_split_hero_body_enforce') : (et_get_option('utmc_max_char_enforce') ?  et_get_option('utmc_max_char_enforce') : 'flexible'),
    );

//    $options_data['split_hero_kicker'] = array(
//        'max' =>  et_get_option('utmc_split_hero_kicker') ?  et_get_option('utmc_split_hero_kicker') : 30,
//        'enforce' => et_get_option('utmc_split_hero_kicker_enforce') ?  et_get_option('utmc_split_hero_kicker_enforce') : (et_get_option('utmc_max_char_enforce') ?  et_get_option('utmc_max_char_enforce') : 'flexible'),
//    );

	 
	 /***************************
     * Statistic Module Setting *
     ***************************/					 
	$options_data['figure'] = array(
		'max' =>  et_get_option('utmc_statistic_figure') ?  et_get_option('utmc_statistic_figure') : 25,
		'enforce' => et_get_option('utmc_statistic_figure_enforce') ?  et_get_option('utmc_statistic_figure_enforce') : (et_get_option('utmc_max_char_enforce') ?  et_get_option('utmc_max_char_enforce') : 'flexible'),
	);
	
	$options_data['heading'] = array(
		'max' =>  et_get_option('utmc_statistic_heading') ?  et_get_option('utmc_statistic_heading') : 25,
		'enforce' => et_get_option('utmc_statistic_heading_enforce') ?  et_get_option('utmc_statistic_heading_enforce') : (et_get_option('utmc_max_char_enforce') ?  et_get_option('utmc_max_char_enforce') : 'flexible'),
	);
	
	$options_data['textarea'] = array(
		'max' =>  et_get_option('utmc_statistic_body') ?  et_get_option('utmc_statistic_body') : 25,
		'enforce' => et_get_option('utmc_statistic_body_enforce') ?  et_get_option('utmc_statistic_body_enforce') : (et_get_option('utmc_max_char_enforce') ?  et_get_option('utmc_max_char_enforce') : 'flexible'),
	);
	
	$options_data['source'] = array(
		'max' =>  et_get_option('utmc_statistic_source') ?  et_get_option('utmc_statistic_source') : 25,
		'enforce' => et_get_option('utmc_statistic_source_enforce') ?  et_get_option('utmc_statistic_source_enforce') : (et_get_option('utmc_max_char_enforce') ?  et_get_option('utmc_max_char_enforce') : 'flexible'),
	);
	/*************************
     * End Settings *
   *************************/
	
	// Convert array to JSON format
	$json_data = json_encode($options_data);

    // Localize the script with JSON data
	wp_enqueue_script('utmc-script', plugins_url('includes/fields/options.js', dirname(__FILE__)), array('jquery'), null, true);
	wp_localize_script('utmc-script', 'utmc_option', $json_data);
}
add_action('wp_enqueue_scripts', 'utmc_enqueue_script');

if ( ! function_exists( 'utmc_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function utmc_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/UtexasMccombs.php';
}
add_action( 'divi_extensions_init', 'utmc_initialize_extension' );
endif;
