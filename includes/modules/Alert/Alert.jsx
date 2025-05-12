// External Dependencies
// this is what shows in the DIVI Editor
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './alert.css';

class Alert extends Component {

  static slug = 'utmc_alert';

  render() {
    return (
        <Fragment>
            <div className={`utm-alert utm-alert__wrapper utm-alert--${this.props.variant}`}>
                    <div className="utm-alert__message">{this.props.message}</div>

                {/*check to see if there is a URL for link, otherwise null*/}
                {this.props.linkurl&&this.props.linklabel?
                    <div className="utm-alert__link">
                        <a href={this.props.linkurl} className="utm-alert__link__link">| {this.props.linklabel} >></a>
                    </div>
                    : null}
                </div>


        </Fragment>
  );
  }
  }

  export default Alert;
