// External Dependencies
// this is what shows in the DIVI Editor
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './buybutton.css';

class BuyButton extends Component {

    static slug = 'utmc_buybutton';

    render() {
        return (
            <Fragment>
                <div className="utm-buybutton">
                    <p>{this.props.placeholder}</p>
                    <br/>
                </div>
                <p>(The following message will be displayed if there are no future sessions for this course)</p>
                <div className="utm-coursetable--message">
                    <div dangerouslySetInnerHTML={{__html: this.props.message}}/>
                </div>
            </Fragment>
        );
    }
}

export default BuyButton;

