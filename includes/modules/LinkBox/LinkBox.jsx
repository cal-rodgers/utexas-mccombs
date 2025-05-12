// External Dependencies
import React, { Component, Fragment } from 'react';
// Internal Dependencies
import './linkbox.css';

class LinkBox extends Component {
  static slug = 'utmc_linkbox';

  render() {
    const headingId = 'utmc-link-box-preview-heading';
    
    return (
      <Fragment>
        <section 
          className="utm-linkbox utm-linkbox__container" 
          role="region" 
          aria-labelledby={this.props.heading ? headingId : undefined}
        >
          {this.props.heading && (
            <header className="utm-linkbox__heading-box">
              <h2 id={headingId} className="utm-linkbox__heading-box__heading">
                {this.props.heading}
              </h2>
              <span className="utm-linkbox__border-line" aria-hidden="true"></span>
              <span className="utm-linkbox__box" aria-hidden="true"></span>
            </header>
          )}
          <ul className="utm-linkbox__flex" role="list">
            {this.props.content}
          </ul>
        </section>
      </Fragment>
    );
  }
}

export default LinkBox;
