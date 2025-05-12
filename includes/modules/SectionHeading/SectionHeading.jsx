// External Dependencies
// this is what shows in the DIVI Editor
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './sectionheading.css';

class SectionHeading extends Component {
  static slug = 'utmc_section_heading';

  render() {
    const headingId = `section-heading-preview`;
    return (
      <Fragment>
        <section className={`utm-section_heading utm-section_heading--${this.props.style}`} role="region" aria-labelledby={headingId}>
          <header className="utm-section_heading__content">
            <h2 id={headingId} className="utm-section_heading__headline">
              {this.props.heading}
            </h2>
            {this.props.button_url && this.props.button_text ? (
              <p className="utm-section_heading__link">
                <a className="utm-btn utm-btn--link utm-btn--link-arrow" href={this.props.button_url}>
                  {this.props.button_text}
                  <span className="utm-btn--arrow" aria-hidden="true"></span>
                </a>
              </p>
            ) : null}
          </header>
        </section>
      </Fragment>
    );
  }
}

export default SectionHeading;
