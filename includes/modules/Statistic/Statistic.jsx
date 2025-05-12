import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './statistic.css';

class Statistic extends Component {

  static slug = 'utmc_statistic';

  render() {
    return (
        <Fragment>

            <div className="utm-statistic__outer">
                {/*check to see if there is an image/icon, otherwise null for image and alt*/}
                {this.props.statimage?
                    <div className="utm-statistic__image">
                        <img src={this.props.statimage} alt={this.props.alt} width="50" height="50"></img>
                    </div>
                    : null}

                <div className="utm-statistic__wrapper">
                    <div className="utm-statistic__figure">{this.props.figure}</div>
                    <div className="utm-statistic__heading">{this.props.heading}</div>
                    <div className="utm-statistic__content">{this.props.textarea}</div>
                </div>
                <div className="utm-statistic__source">{this.props.source}</div>
                    </div>
        </Fragment>

    );
  }
}

export default Statistic;
