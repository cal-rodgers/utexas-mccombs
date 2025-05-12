// External Dependencies
// this is what shows in the DIVI Editor
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './split-hero.css';


class SplitHero extends Component {

  static slug = 'utmc_split_hero';


  render() {
    return (
        <Fragment>
                <div className={`utm-split_hero__outer--${this.props.orientation} utm-split_hero__container` }>
                        <div class="utm-split_hero__content">
                            <div className="utm-split_hero__heading">{this.props.heading}</div>
                            <div className="utm-split_hero__body">{this.props.textarea}</div>
                            <div className="utm-split_hero__links">
                                {this.props.content}
                            </div>
                        </div>
                        {this.props.splitimage ?
                            <div className={`utm-split_hero__image_wrapper--${this.props.orientation}`}>
                                <div className="utm-split_hero__image">
                                    <div className={`utm-split_hero__image--${this.props.orientation}`}>
                                        <img className={`utm-split_hero__image--${this.props.orientation}__img`} src={this.props.splitimage} alt={this.props.alt}></img>
                                    </div>
                                </div>

                            </div>
                            : null}

                    {this.props.kicker ?
                        <div
                            className={`utm-split_hero__kicker__container utm-split_hero__kicker__container--${this.props.orientation}`}>
                            <div className="utm-split_hero__kicker__icon">
                                <img src="/wp-content/themes/divi-child/assets/images/starbox.svg"
                                     alt="starbox"></img>
                            </div>
                            <div class="utm-split_hero__kicker">
                                <div className="utm-split_hero__kicker__text">
                                    <div
                                        className={`utm-split_hero__kicker__text--${this.props.orientation}`}>{this.props.kicker}</div>
                                </div>
                            </div>
                        </div>
                        : null}
                </div>
        </Fragment>

  );
  }
  }

  export default SplitHero;
