// External Dependencies
// this is what shows in the DIVI Editor
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './hero.css';

class Hero extends Component {

  static slug = 'utmc_hero';

  render() {
    return (
        <Fragment>
            <div className={`utm-hero__container utm-hero__container--${this.props.style} utm-hero__kicker__orientation--${this.props.kickerorientation} utm-hero__wrapper--${this.props.orientation}`}>
                {this.props.kicker?
                    <div className={`utm-hero__kicker__container utm-hero__kicker__container--${this.props.kickerorientation}`}>
                    <div className="utm-hero__kicker__wrapper">
                        <div className="utm-hero__kicker__icon">
                            <img src="/wp-content/themes/divi-child/assets/images/starbox.svg" alt="starbox"></img>
                        </div>
                        <div className="utm-hero__kicker">
                            <div className="utm-hero__kicker__text utm-hero__kicker__text--dark">
                                <div className={`utm-hero__kicker__text--${this.props.kickerorientation}`}>{this.props.kicker}</div>
                            </div>
                        </div>
                    </div>
                </div>
                    : null}

                    <div className="utm-hero__content-half">
                        <div className="utm-hero__content">
                            <div className="utm-hero__headline">{this.props.heading}</div>
                            <div className="utm-hero__body">{this.props.textarea}</div>
                        {/*check to see if there is a URL for link, otherwise null*/}
                            {this.props.button_url&&this.props.button_text?
                            <div className="utm-hero__link">
                                <div className="utm-hero__link">
                                    <a className="utm-btn" href={this.props.button_url}>{this.props.button_text}</a>
                                </div>
                            </div>
                            : null}
                    </div>
                    </div>
                <div class="utm-hero__image-half">
                      <img src={this.props.heroimage} alt={this.props.alt}></img></div>
            </div>

        </Fragment>
    );
  }
}

export default Hero;
