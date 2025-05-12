// External Dependencies
// This is what shows in the DIVI Editor
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './coursetable.css';

class CourseTable extends Component {
    static slug = 'utmc_coursetable';

    render() {
        const concentrationFilter = this.props.concentration_filter_slug ? this.props.concentration_filter_slug : 'all';
        const message = this.props.message ? this.props.message : '';

        return (
            <Fragment>
                <div className="utm-coursetable">
                    <p>{this.props.placeholder}</p>
                </div>
                <div className="utm-coursetable">
                    <p>Concentration: <strong>{concentrationFilter}</strong></p>
                </div>
                {message && (
                    <div className="utm-coursetable-message">
                        <p>No sessions message: <strong>{message}</strong></p>
                    </div>
                )}
            </Fragment>
        );
    }
}

export default CourseTable;

