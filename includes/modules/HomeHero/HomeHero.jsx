// External Dependencies
// this is what shows in the DIVI Editor
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './homehero.css';

class HomeHero extends Component {

  static slug = 'utmc_homehero';

  render() {
    return (
        <Fragment>
            <div className="utm-homehero-section">
                <div className="utm-homehero-section__container">
                    <img className="hero-section__container__heroImg" src={this.props.homeheroimage} alt={this.props.alt}></img>
                    <div className="utm-homehero-section__container__heroContent">
                        <h1 className="utm-homehero-section__container__heroContent__heroHeading">
                            {this.props.headingone}
                            <br/>
                            <span>{this.props.headingtwo}</span>
                        </h1>
                    </div>
                </div>
            </div>
        </Fragment>
    );
  }
}

export default HomeHero;
