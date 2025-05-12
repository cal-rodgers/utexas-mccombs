// External Dependencies
// this is what shows in the DIVI Editor
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './cta.css';


class CTA extends Component {

  static slug = 'utmc_cta';

  render() {


    return (
        <Fragment>

                <div className={`utm-cta__outer utm-cta--${this.props.style} utm-cta--${this.props.variant}`} >
                    <div className="utm-cta__image">    {this.props.ctaimage? <img src={this.props.ctaimage} alt={this.props.alt} width="50" height="50"></img> : null}
                    </div>
                    <div className="utm-cta__wrapper">
                        <div className="utm-cta__headline">{this.props.heading}</div>
                        <div className="utm-cta__body">{this.props.textarea}</div>
                        <div className="utm-cta__link__container">{this.props.content}</div>

                    </div>
                </div>
        </Fragment>

    );
  }
}

export default CTA;
