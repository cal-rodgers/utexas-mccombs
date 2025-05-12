# UT McCombs - Custom Divi Modules

## [2.01] - 2025-04-28
### Added
- Cleaned up JumpMenu and JumpMenuItems modules
  - Removed commented-out code and unused options
  - Improved code formatting and documentation
  - Enhanced JSX structure and React component organization
  - Added proper HTML escaping for URLs and text
  - Simplified component rendering logic

### Enhanced
- SectionHeading module accessibility:
  - Improved semantic HTML structure using `<section>` and `<header>` elements
  - Added proper ARIA attributes with aria-labelledby
  - Added role="region" to section elements for better screen reader navigation
  - Implemented sequential heading IDs for better screen reader navigation
  - Updated link container to use semantic `<p>` tag
  - Added aria-hidden to decorative arrow elements
- SectionHeadingBox module accessibility:
  - Converted outer div to semantic `<section>` element
  - Added proper ARIA attributes with aria-labelledby
  - Added role="region" to section elements for better screen reader navigation
  - Added semantic `<header>` element while maintaining h4 heading level
  - Added unique IDs for heading references
  - Improved SVG accessibility by marking decorative elements
  - Added proper HTML escaping for security
- LinkBox module accessibility and styling:
  - Converted outer div to semantic `<section>` element with role="region"
  - Added proper ARIA attributes with aria-labelledby
  - Added semantic `<header>` element with h2 heading
  - Implemented unique heading IDs using static counter
  - Converted link container to semantic `<ul>` with proper list items
  - Added role="list" to link container for better navigation
  - Added aria-hidden to decorative border elements
  - Added proper HTML escaping for security
  - Improved link styling with flexbox layout
  - Enhanced visual spacing and alignment
  - Fixed bullet point display issues
  - Added smooth transitions for interactive elements

## [0.1.52] - 2025-01-15
### Fixed
- Instructor field display in mobile view:
  - Properly handles multiple instructor names
  - Maintains correct label alignment
  - Enables text wrapping for long content

## [0.1.51] - 2025-01-15
### Enhanced
- Course table responsive design:
  - Improved date formatting: Stacked dates with line breaks in table view, hyphenated in button data
  - Added consistent white background and black bottom border to table headers
  - Adjusted vertical alignment of all cell content
  - Optimized enroll button display:
    - Full width in mobile view
    - Improved vertical padding (24px desktop, 5px mobile)
    - Removed height constraints for better mobile display
  - Fixed spacing issues in table layout

## [0.1.50] - 2024-12-10
### Changed
- Updates to MaxCharacter - CTA, Split Hero - remove count

## [0.1.49] - 2024-12-10
### Changed
- Updates to MaxCharacter - CTA, Split Hero

## [0.0.48] - 2024-12-04
### Fixed
- CourseTableAll - update so shows placeholder if no courses found for Concentration filter

## [0.0.47] - 2024-11-06
### Added
- CourseTableAll - add Concentration filter by slug (single or multiple)

## [0.0.46] - 2024-10-16
### Added
- Updates to CourseTableAll, CourseTable - add responsive class to markup

## [0.0.45] - 2024-10-15
### Changed
- Updates to CourseTableAll - updated logic
- CourseTable - add concentration by taxonomy

## [0.0.44] - 2024-10-09
### Added
- Updates to CourseTableAll - add concentration filter and updated logic

## [0.0.43] - 2024-10-07
### Changed
- Updates to CourseTableAll

## [0.0.41] - 2024-07-30
### Added
- Updates to MaxChar - add CTA, Split Hero, Section Heading Box
- Remaining Hero, Alert, Card, HomeHero, JumpMenu, LinkBox, Quote

## [0.0.40] - 2024-07-26
### Added
- Updates to CourseTable - add On Demand Condition, add custom message field

## [0.0.39] - 2024-07-23
### Fixed
- CourseTable, CourseTableAll - if there are no sessions triggers a message

## [0.0.38] - 2024-07-15
### Fixed
- CTA to use wp_kses_post instead of esc_html

## [0.0.37] - 2024-07-15
### Fixed
- CTA issues with Course

## [0.0.36] - 2024-07-15
### Fixed
- Unclosed div error on CourseTable and CourseTableAll

## [0.0.35] - 2024-07-11
### Changed
- Label for CourseTable (formerly BuyButton), CourseTableAll (formerly CourseTable)

## [0.0.34] - 2024-06-24
### Added
- BuyButton and Course Table modules for ecommerce, snipcart

## [0.0.33] - 2024-06-14
### Changed
- Update FacultyLinks module and style

## [0.0.32] - 2024-06-05
### Added
- Introduce FacultyLinks module

## [0.0.31] - 2024-05-09
### Added
- Introduce maxChar capability with configurable backend
- Updates to modules

## [0.0.30] - 2024-05-03
### Added
- Updates to Quote, Add preliminary options

## [0.0.29] - 2024-05-01
### Changed
- Updates to Hero, JumpMenu

## [0.0.28] - 2024-04-30
### Changed
- Updates to LinkBox, Form Style

## [0.0.27] - 2024-03-27
### Changed
- Updates to LinkBox, Form Style

## [0.0.26] - 2024-03-25
### Added
- HomeHero, Linkbox

## [0.0.25] - 2024-03-20
### Changed
- Updates to Split Hero, Hero

## [0.0.24] - 2024-03-19
### Added
- Section Heading Box Module
### Changed
- Updates to Split Hero, Hero

## [0.0.23] - 2024-03-12
### Changed
- Updates to Split Hero

## [0.0.22] - 2024-03-07
### Changed
- Updates to Split Hero

## [0.0.21] - 2024-03-06
### Changed
- Updates to Hero

## [0.0.20] - 2024-03-05
### Changed
- Updates to Split Hero

## [0.0.19] - 2024-02-28
### Added
- Split Hero preliminary
### Changed
- Updates to CTA, Card, Jump Menu, Alert for batch 2
- Updates global style sheet in child theme

## [0.0.18] - 2024-02-22
### Changed
- Updates to CTA, Jump Menu
- Updates global style sheet in child theme

## [0.0.17] - 2024-02-21
### Added
- CTA, Jump Menu Modules
- Global style sheet in child theme

## [0.0.16] - 2024-02-16
### Changed
- Additional updates to card and css specificity

## [0.0.15] - 2024-02-16
### Changed
- Updates to card and css specificity

## [0.0.14] - 2024-02-15
### Changed
- Updates to card

## [0.0.13] - 2024-02-13
### Changed
- Updates to hero

## [0.0.12] - 2024-02-12
### Added
- Jump Menu preliminary
### Fixed
- Null title on section header
### Changed
- Reorder link label, link url for Section Header, Hero, Quote

## [0.0.11] - 2024-02-09
### Added
- Hero module

## [0.0.10] - 2024-02-06
### Changed
- Update statistic styles per QA

## [0.0.9] - 2024-02-05
### Added
- Alert module

## [0.0.8] - 2024-02-05
### Added
- Video preliminary without video
### Fixed
- Button class on Section Header
### Changed
- Remove links to help for modules
- Make Heading field labeling consistent

## [0.0.7] - 2024-02-04
### Changed
- Convert all modules to textarea
### Added
- Footer section

## [0.0.6] - 2024-01-31
### Added
- Quote Module - Initial release

## [0.0.5] - 2024-01-28
### Changed
- Updated Card - Add animated arrow buttons
### Added
- Hero Module - Preliminary without Kicker

## [0.0.4] - 2024-01-26
### Added
- Statistic Module
- Section Header - Variant - Boxed (not complete)

## [0.0.3] - 2024-01-24
### Added
- Section Header - Variant - Standard with Link Arrow

## [0.0.2] - 2024-01-23
### Added
- Card - Variant - Image Top
- Card - Variant - White

## [0.0.1] - 2024-01-16
### Added
- Card - Variant - Orange

## [0.0.0] - 2024-01-12
### Added
- Initial Version for Testing
