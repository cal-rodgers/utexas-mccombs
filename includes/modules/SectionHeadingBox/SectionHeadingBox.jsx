// External Dependencies
// this is what shows in the DIVI Editor
import React, { Component, Fragment } from 'react';

// Internal Dependencies
// import './sectionheadingbox.css';

class SectionHeadingBox extends Component {
  static slug = 'utmc_section_heading_box';

  render() {
    const headingId = `section-heading-box-preview`;
    return (
      <Fragment>
        <section className="utm-section_heading_box" role="region" aria-labelledby={headingId}>
          <div className="utm-section_heading_box__container">
            <header className="utm-section_heading_box__container__heading">
              <h4 id={headingId}>{this.props.heading}</h4>
            </header>
            <div className="utm-section_heading_box__container__starDiv" aria-hidden="true">
              <svg
                className="star--svg utm-section_heading_box__container__starDiv__svg"
                viewBox="0 0 49 48"
                role="presentation"
                xmlns="http://www.w3.org/2000/svg"
              >
                <g transform="translate(-1 -1)" fill="#BE5827" fillRule="evenodd">
                  <path
                    d="M49.396 24.723c-.004.422-.011.84-.023 1.256-.355 12.5-4.436 22.332-24.175 22.332S1.378 38.479 1.024 25.979A61.26 61.26 0 0 1 1 24.723c.004-.422.01-.84.023-1.255.354-12.501 4.435-22.332 24.174-22.332s23.82 9.83 24.175 22.332c.012.415.02.833.023 1.255"
                    id="a"
                    fill="#333f48"
                  />
                </g>
                <g transform="translate(-1 -1)" fill="white" fillRule="evenodd">
                  <path
                    id="b"
                    d="m25.5 11.138-2.991 9.68h-9.681l7.832 5.983-2.992 9.682L25.5 30.5l7.832 5.983L30.34 26.8l7.832-5.983h-9.68z"
                    fill="white"
                  />
                </g>
              </svg>
            </div>
          </div>
        </section>
      </Fragment>
    );
  }
}

export default SectionHeadingBox;
