// External Dependencies
// this is what shows in the DIVI Editor
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './card.css';


class Card extends Component {

  static slug = 'utmc_card';

  render() {
    return (
        <Fragment>

            <div className={`utm-card utm-card__outer utm-card--${this.props.variant}`} >

                <div className="utm-card__wrapper">
                    {/*check to see if variant is orange and if so show mobile headline*/}
                    {/*{this.props.variant === 'orange'?*/}
                    <div className="utm-card__headline__mobile">{this.props.heading}</div>
                        {/*: null}*/}
                    {/*check to see if there is an image, otherwise null for image and alt*/}
                    {this.props.cardimage?
                    <div className="utm-card__image">  <img src={this.props.cardimage} alt={this.props.alt}></img></div>
                        : null}
                    <div className="utm-card__content">
                        <div className="utm-card__headline">{this.props.heading}</div>
                        <div className="utm-card__body">{this.props.textarea}</div>

                        {/*check to see if there is a URL for link, otherwise null*/}
                        {this.props.button_url&&this.props.button_text?
                            <div className="utm-card__link" >
                                {/*<a className={`utm-btn utm-card--${this.props.variant} utm-btn--${this.props.button_style} utm-btn--link-arrow`} href={this.props.button_url}>{this.props.button_text}<span*/}
                                {/*    className="utm-btn--arrow"></span></a>*/}
                                <a className={`utm-btn utm-card--${this.props.variant} utm-btn--link utm-btn--link-arrow`} href={this.props.button_url}>{this.props.button_text}<span
                                    className="utm-btn--arrow"></span></a>
                        </div>
                            : null}
                    </div>
                </div>
                </div>

        </Fragment>

    );
  }
}

export default Card;
