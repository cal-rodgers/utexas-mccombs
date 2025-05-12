// External Dependencies
// this is what shows in the DIVI Editor
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './quote.css';

class Quote extends Component {

  static slug = 'utmc_quote';

  render() {
    return (
        <Fragment>

            <div className={`utm-quote utm-quote__container utm-quote__container--${this.props.orientation}`}>
                <div className="utm-quote__content">
                    {/*check to see if there is a kicker, otherwise null*/}
                    {this.props.kicker?
                    <div className="utm-quote__kicker">{this.props.kicker}</div>
                        : null}
                    {this.props.textarea?
                    <div className="utm-quote__quote">{this.props.textarea}</div>
                        : null}
                    {/*check for author content - add em dash character (&#8212;) before - if not, null*/}
                    {this.props.author?
                        <div className="utm-quote__author">{this.props.author}</div>
                        : null}

                        {/*check to see if there is a URL for link, otherwise null*/}
                        {this.props.button_url&&this.props.button_text?
                            <div className="utm-quote__link">
                                <div className="utm-quote__link">
                                    <a className="utm-btn utm-btn--link utm-btn--link-arrow" href={this.props.button_url}>{this.props.button_text}<span
                                        className="utm-btn--arrow"></span></a>
                                </div>
                            </div>
                            : null}

            </div>
                {/*check to see if there is an image, otherwise null for image and alt*/}
                {this.props.quoteimage?
                <div className="utm-quote__image__wrapper">
                <div className="utm-quote__image">

                {/*{this.props.quoteimage?*/}
                    <div className="utm-quote__image">  <img src={this.props.quoteimage} alt={this.props.alt}></img></div>

                </div>
                </div>
                    : null}
            </div>
        </Fragment>
    );
  }
}

export default Quote;
